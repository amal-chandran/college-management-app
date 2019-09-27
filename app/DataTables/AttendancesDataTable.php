<?php

namespace App\DataTables;

use App\User;
use Yajra\Datatables\Services\DataTable;
use App\Attendance;
use App\StudentClass;
use Auth;
use App\Attendee;

class AttendancesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @return \Yajra\Datatables\Engines\BaseEngine
     */
    public function dataTable()
    {
        return $this->datatables
            ->collection($this->query());
        // ->addColumn('action', 'attendances.action');
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $dateHeads = Attendance::where([['student_class_id', '=', $this->student_class_id], ['subject_id', '=', $this->subject_id],])->get();

        if (Auth::user()->hasRole('student')) {
            $studentsList = collect([Auth::user()]);
        } else {
            $students = StudentClass::find($this->student_class_id);
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
            $attendancePercentage = ($presentDays / $totalDays) * 100;

            $studentDataRow->put('percentage', $attendancePercentage);
            $studentDataRow = $studentDataRow->merge($studentDataAttendance);

            return $studentDataRow;
        });

        return $this->applyScopes($studentsList);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax('')
            // ->addAction(['width' => '80px'])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'asc']],
                'buttons' => [
                    // 'create',
                    'export',
                    'print',
                    'reset',
                    'reload',
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        $heads = collect(['id', 'name', 'percentage']);
        $dateHeads = Attendance::where([['student_class_id', '=', $this->student_class_id], ['subject_id', '=', $this->subject_id],])->pluck("marked_at")->all();

        $dateHeads = collect($dateHeads)->map(function ($dateHead) {
            return $this->getMarkedAtHuman($dateHead);
        });
        $heads = $heads->concat($dateHeads);

        return $heads->toArray();
    }
    public function getMarkedAtHuman($value)
    {
        return \DateTime::createFromFormat('Y-m-d h:i:s A', $value)->format('d_M');
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'attendances_' . time();
    }
}
