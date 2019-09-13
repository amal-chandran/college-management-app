<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Http\Controllers\Controller;
use App\Slot;
use App\StudentClass;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Exception;

class AttendancesController extends Controller
{

    /**
     * Display a listing of the attendances.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $attendances = Attendance::with('teacher','studentclass','subject','slot')->paginate(25);

        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new attendance.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $teachers = User::pluck('name','id')->all();
$studentClasses = StudentClass::pluck('batch','id' )->all();
$subjects = Subject::pluck('name','id')->all();
$slots = Slot::pluck('name','id')->all();

        return view('attendances.create', compact('teachers','studentClasses','subjects','slots'));
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

    /**
     * Display the specified attendance.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $attendance = Attendance::with('teacher','studentclass','subject','slot')->findOrFail($id);

        return view('attendances.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified attendance.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $teachers = User::pluck('name','id')->all();
$studentClasses = StudentClass::pluck('batch','id' )->all();
$subjects = Subject::pluck('name','id')->all();
$slots = Slot::pluck('name','id')->all();

        return view('attendances.edit', compact('attendance','teachers','studentClasses','subjects','slots'));
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

}
