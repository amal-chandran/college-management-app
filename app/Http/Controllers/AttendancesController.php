<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Http\Controllers\Controller;
use App\Slot;
use App\StudentClass;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Datatables;
use Exception;
use App\DataTables\AttendancesDataTable;
use Illuminate\Support\Facades\Auth;
use App\Attendee;
// use Yajra\DataTables\Datatables;

class AttendancesController extends Controller
{

    /**
     * Display a listing of the attendances.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->user()->hasAnyRole(['teacher', 'class-teacher'])) {

            $attendances = Attendance::with('teacher', 'studentclass', 'subject', 'slot')->where('teacher_id', '=', $request->user()->id)->paginate(25);
        } else {

            $attendances = Attendance::with('teacher', 'studentclass', 'subject', 'slot')->paginate(25);
        }

        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new attendance.
     *
     * @return Illuminate\View\View
     */
    public function create(Request $request)
    {
        $teachers = User::role(['teacher', 'class-teacher'])->pluck('name', 'id')->all();

        $studentClasses = StudentClass::selectRaw(
            'concat(batch,"(",branch,")") as batch_branch,id'
        )->pluck('batch_branch', 'id')->all();

        if ($request->user()->hasAnyRole(['teacher', 'class-teacher'])) {
            $subjects = Subject::where('teacher_id', '=', $request->user()->id)->pluck('name', 'id')->all();
        } else {
            $subjects = Subject::join('users', 'users.id', '=', 'subjects.teacher_id')->selectRaw(
                'concat(subjects.name,"(",users.name,")") as subject_user,subjects.id'
            )->pluck('subject_user', 'id')->all();
        }


        if ($request->user()->hasAnyRole(['teacher', 'class-teacher'])) {
            $slots = Slot::join(
                'subjects',
                function ($join) use ($request) {
                    $join->on('subjects.id', '=', 'slots.subject_id')
                        ->where('subjects.teacher_id', '=', $request->user()->id);
                }
            )->selectRaw(
                'concat(slots.name,"(",subjects.name,")") as slot_subject,slots.id'
            )->pluck('slot_subject', 'id')->all();
        } else {
            $slots = Slot::pluck('name', 'id')->all();
        }

        return view('attendances.create', compact('teachers', 'studentClasses', 'subjects', 'slots'));
    }

    /**
     * Store a new attendance in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->affirm($request);
        try {
            $data = $this->getData($request);

            Attendance::create($data);

            return redirect()->route('attendances.attendance.index')
                ->with('success_message', 'Attendance was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function report(Request $request,   $student_class_id, $subject_id)
    {
        if ($request->ajax()) {

            $dateHeads = Attendance::where([['student_class_id', '=', $student_class_id], ['subject_id', '=', $subject_id],])->get();

            if (Auth::user()->hasRole('student')) {
                $studentsList = collect([Auth::user()]);
            } else {
                $students = StudentClass::find($student_class_id);
                $studentsList = $students->students;
            }

            $studentsList = $studentsList->map(function ($student) use ($dateHeads) {
                $studentDataRow = collect(['id' => $student->id, 'name' => $student->name]);
                $studentDataAttendance = collect();

                $presentDays = 0;
                $totalDays = count($dateHeads);


                foreach ($dateHeads as $dateHead) {
                    $status = Attendee::where('attendance_id', '=', $dateHead->id)->where('student_id', '=', $student->id)->pluck('status')->get(0);
                    if ($status == "present") {
                        $presentDays++;
                    }
                    $studentDataAttendance->put($this->getMarkedAtHuman($dateHead->marked_at), $status);
                }
                $attendancePercentage = round(($presentDays / $totalDays) * 100, 2);

                $studentDataRow->put('percentage', $attendancePercentage);
                $studentDataRow = $studentDataRow->merge($studentDataAttendance);

                return $studentDataRow;
            });

            return  Datatables::collection(collect($studentsList))->make(true);
        }

        $heads = collect(['id', 'name', 'percentage']);
        $dateHeads = Attendance::where([['student_class_id', '=', $student_class_id], ['subject_id', '=', $subject_id],])->pluck("marked_at")->all();

        $dateHeads = collect($dateHeads)->map(function ($dateHead) {
            return $this->getMarkedAtHuman($dateHead);
        });
        $heads = $heads->concat($dateHeads);
        $studentClass = StudentClass::find($student_class_id);
        $subject = Subject::find($subject_id);

        return view("attendances.report")->with([
            'heads' => $heads->toArray(),
            'studentClass' => $studentClass,
            "subject" => $subject
        ]);
    }

    public function report_class_day(Request $request, $student_class_id)
    {
        $attendance_date = $request->input('attendance_date', date('Y-m-d'));

        if ($request->ajax()) {
            $attendanceList = Attendance::where('student_class_id', '=', $student_class_id)->whereDate('marked_at', $attendance_date)->get();

            $students = StudentClass::find($student_class_id);
            $studentsList = $students->students;


            $studentsList = $studentsList->map(function ($student) use ($attendanceList) {
                $studentDataRow = collect(['id' => $student->id, 'name' => $student->name]);
                $studentDataAttendance = collect();


                foreach ($attendanceList as $attendance) {
                    $status = Attendee::where('attendance_id', '=', $attendance->id)->where('student_id', '=', $student->id)->pluck('status')->get(0);
                    $studentDataAttendance->put($attendance->slot->name, $status);
                }

                $studentDataRow = $studentDataRow->merge($studentDataAttendance);

                if (!$studentDataAttendance->isEmpty()) {
                    $studentDataRow = $studentDataRow->merge($studentDataAttendance);
                } else {
                    $studentDataRow = collect();
                }

                return $studentDataRow;
            });

            $studentsList = $studentsList->filter(function ($val, $key) {
                return !$val->isEmpty();
            });

            return  Datatables::collection(collect($studentsList))->make(true);
        }

        $heads = collect(['id', 'name']);
        $attendanceList = Attendance::where('student_class_id', '=', $student_class_id)->whereDate('marked_at', $attendance_date)->get();

        $attendanceList = collect($attendanceList)->map(function ($attendance) {
            return $attendance->slot->name;
        });
        $heads = $heads->concat($attendanceList);
        $studentClass = StudentClass::find($student_class_id);

        return view("attendances.report_class_day")->with([
            'heads' => $heads->toArray(),
            'studentClass' => $studentClass,
            'attendance_date' => $attendance_date
        ]);
    }


    public function report_class_complete(Request $request, $student_class_id)
    {

        $availableDates = Attendance::selectRaw("DATE_FORMAT(MAX(marked_at),'%Y-%m-%d') as maxDate,DATE_FORMAT(MIN(marked_at),'%Y-%m-%d') as minDate")->get();

        $minMaxDate = array('min' => date('Y-m-d'), "max" => date('Y-m-d', strtotime('-1 month')));

        if (!$availableDates->isEmpty()) {
            $availableDates = $availableDates[0];
            $minMaxDate = array('min' => $availableDates['minDate'], "max" => $availableDates['maxDate']);
        }

        $attendance_ranges = $request->input('attendance_ranges', null);

        if ($attendance_ranges == null) {
            $start_date = trim($minMaxDate['min']);
            $end_date = trim($minMaxDate['max']);
        } else {
            list($start_date, $end_date) = explode("to", $attendance_ranges);
            $start_date = trim($start_date);
            $end_date = trim($end_date);
        }

        if ($request->ajax()) {

            $subjectsTotal = Subject::join(
                'attendances',
                function ($join) use ($start_date, $end_date) {
                    $join->on('subjects.id', '=', 'attendances.subject_id')
                        ->whereRaw("DATE_FORMAT(`marked_at`,'%Y-%m-%d') BETWEEN ? AND ?", [$start_date, $end_date]);
                }
            )
                ->where('subjects.student_class_id', '=', $student_class_id)
                ->groupBy('subjects.name')
                ->selectRaw('COUNT(`subjects`.`id`) as `attendance_count`,`subjects`.`name`')
                ->pluck('attendance_count', 'name')
                ->all();

            $students = StudentClass::find($student_class_id);
            $studentsList = $students->students;


            $studentsList = $studentsList->map(function ($student) use ($start_date, $end_date, $student_class_id, $subjectsTotal) {
                $studentDataRow = collect(['id' => $student->id, 'name' => $student->name]);
                $studentDataAttendance = collect();

                $subjects = Subject::join(
                    'attendances',
                    function ($join) use ($start_date, $end_date) {
                        $join->on('subjects.id', '=', 'attendances.subject_id')
                            ->whereRaw("DATE_FORMAT(`marked_at`,'%Y-%m-%d') BETWEEN ? AND ?", [$start_date, $end_date]);
                    }
                )
                    ->join(
                        'attendees',
                        function ($join) use ($student) {
                            $join->on('attendances.id', '=', 'attendees.attendance_id')
                                ->where('attendees.student_id', '=', $student->id)
                                ->where('attendees.status', '=', 'present');
                        }
                    )
                    ->where('subjects.student_class_id', '=', $student_class_id)
                    ->groupBy('subjects.name')
                    ->selectRaw('COUNT(`subjects`.`id`) as `attendance_count`,`subjects`.`name`')
                    ->get();

                foreach ($subjects as $subject_attendance) {
                    $percentageDays = round($subject_attendance->attendance_count / $subjectsTotal[$subject_attendance->name] * 100, 2);
                    $checkState = $percentageDays > 75 ? "E" : "NE";
                    $studentDataAttendance->put($subject_attendance->name, "${percentageDays} ($checkState)");
                }

                if (!$studentDataAttendance->isEmpty()) {
                    $studentDataRow = $studentDataRow->merge($studentDataAttendance);
                } else {
                    $studentDataRow = collect();
                }

                return $studentDataRow;
            });
            $studentsList = $studentsList->filter(function ($val, $key) {
                return !$val->isEmpty();
            });
            return  Datatables::collection(collect($studentsList))->make(true);
        }

        $heads = collect(['id', 'name']);
        $subjectsClass = Subject::join(
            'attendances',
            function ($join) use ($start_date, $end_date) {
                $join->on('subjects.id', '=', 'attendances.subject_id')
                    ->whereRaw("DATE_FORMAT(`marked_at`,'%Y-%m-%d') BETWEEN ? AND ?", [$start_date, $end_date]);
            }
        )
            ->where('subjects.student_class_id', '=', $student_class_id)
            ->groupBy('subjects.name')
            ->selectRaw('COUNT(`subjects`.`id`) as `attendance_count`,`subjects`.`name`')
            ->get();

        $subjectsClass = collect($subjectsClass)->map(function ($subjectClass) {
            return $subjectClass->name;
        });
        $heads = $heads->concat($subjectsClass);
        $studentClass = StudentClass::find($student_class_id);

        return view("attendances.report_class_complete")->with([
            'heads' => $heads->toArray(),
            'studentClass' => $studentClass,
            "start_date" => $start_date,
            "end_date" => $end_date,
            "minMaxDate" => $minMaxDate
        ]);
    }

    /**
     * Display the specified attendance.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($attendance_id)
    {
        $attendance = Attendance::with('teacher', 'studentclass', 'subject', 'slot')->findOrFail($attendance_id);
        $attendees = User::join("user_has_roles", 'users.id', '=', 'user_has_roles.user_id')
            ->join("roles", function ($join) {
                $join->on('roles.id', '=', 'user_has_roles.role_id')->where("roles.name", "=", "student");
            })
            ->join('student_class_user', 'users.id', '=', 'student_class_user.user_id')
            ->join('attendances', function ($join) use ($attendance_id) {
                $join->on('student_class_user.student_class_id', '=', 'attendances.student_class_id')
                    ->where('attendances.id', '=', $attendance_id);
            })
            ->leftJoin('attendees', function ($join) use ($attendance_id) {
                $join->on('users.id', '=', 'attendees.student_id')
                    ->where('attendees.attendance_id', '=', $attendance_id);
            })
            ->select("users.*", 'attendees.status', 'attendees.id as attendees_id')
            ->paginate(25);


        return view('attendances.show', compact('attendance', 'attendees', 'attendance_id'));
    }

    /**
     * Show the form for editing the specified attendance.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);

        $teachers = User::role(['teacher', 'class-teacher'])->pluck('name', 'id')->all();

        $studentClasses = StudentClass::selectRaw(
            'concat(batch,"(",branch,")") as batch_branch,id'
        )->pluck('batch_branch', 'id')->all();

        if ($request->user()->hasAnyRole(['teacher', 'class-teacher'])) {
            $subjects = Subject::where('teacher_id', '=', $request->user()->id)->pluck('name', 'id')->all();
        } else {
            $subjects = Subject::join('users', 'users.id', '=', 'subjects.teacher_id')->selectRaw(
                'concat(subjects.name,"(",users.name,")") as subject_user,subjects.id'
            )->pluck('subject_user', 'id')->pluck('subject_user', 'id')->all();
        }

        if ($request->user()->hasAnyRole(['teacher', 'class-teacher'])) {
            $slots = Slot::join(
                'subjects',
                function ($join) use ($request) {
                    $join->on('subjects.id', '=', 'slots.subject_id')
                        ->where('subjects.teacher_id', '=', $request->user()->id);
                }
            )->selectRaw(
                'concat(slots.name,"(",subjects.name,")") as slot_subject,slots.id'
            )->pluck('slot_subject', 'id')->all();
        } else {
            $slots = Slot::pluck('name', 'id')->all();
        }

        return view('attendances.edit', compact('attendance', 'teachers', 'studentClasses', 'subjects', 'slots'));
    }

    /**
     * Update the specified attendance in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

        $this->affirm($request);
        try {
            $data = $this->getData($request);

            $attendance = Attendance::findOrFail($id);
            $attendance->update($data);

            return redirect()->route('attendances.attendance.index')
                ->with('success_message', 'Attendance was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified attendance from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $attendance = Attendance::findOrFail($id);
            $attendance->delete();

            return redirect()->route('attendances.attendance.index')
                ->with('success_message', 'Attendance was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Validate the given request with the defined rules.
     *
     * @param  Illuminate\Http\Request  $request
     *
     * @return boolean
     */
    protected function affirm(Request $request)
    {
        $rules = [
            'teacher_id' => 'nullable',
            'student_class_id' => 'nullable',
            'subject_id' => 'nullable',
            'slot_id' => 'nullable',
            'marked_at' => 'date_format:Y-m-d h:i:s A|nullable',
        ];


        return $this->validate($request, $rules);
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $data = $request->only(['teacher_id', 'student_class_id', 'subject_id', 'slot_id', 'marked_at']);

        return $data;
    }
    public function getMarkedAtHuman($value)
    {
        return \DateTime::createFromFormat('Y-m-d h:i:s A', $value)->format('d_M');
    }
}
