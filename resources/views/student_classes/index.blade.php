@extends('layouts.dashboard')

@section('content')

@if(Session::has('success_message'))
<div class="alert alert-success">
    <span class="fas fa-check"></span>
    {!! session('success_message') !!}

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
@endif

<div class="card">
    <div class="card-header">
        <h4 class="cards-title mb-0 float-left">Student Classes</h4>
        @can('create-student-class')
        <a href="{{ route('student_classes.student_class.create') }}" class="btn btn-success btn-sm float-right"
            title="Create New Student Class">
            <span class="fas fa-plus" aria-hidden="true"></span> Create Student Classes
        </a>
        @endcan
    </div>
    @if(count($studentClasses) == 0)
    <div class="card-body p-0 text-center">
        <h4>No Student Classes Available.</h4>
    </div>
    @else
    <div class="card-body p-0">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Batch</th>
                    <th>Branch</th>
                    <th>Class Teacher</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($studentClasses as $studentClass)
                <tr>
                    <td>{{ $studentClass->batch }}</td>
                    <td>{{ $studentClass->branch }}</td>
                    <td>{{ isset($studentClass->classTeacher->name) ? $studentClass->classTeacher->name : '' }}</td>

                    <td>
                        <div class="float-right">

                            {!! Form::open([
                            'method' =>'DELETE',
                            'route' => ['student_classes.student_class.destroy', $studentClass->id],
                            'style' => 'display: inline;',
                            ]) !!}
                            <a href="{{ route('attendances.attendance.report_class_day',[$studentClass->id]) }}"
                                class="btn btn-sm mr-2 btn-primary" title="Show All Student Class">
                                <span class="fas fa-clock" aria-hidden="true"></span> Day Report
                            </a>
                            <a href="{{ route('attendances.attendance.report_class_complete',[$studentClass->id]) }}"
                                class="btn btn-sm mr-2 btn-primary" title="Show All Student Class">
                                <span class="fas fa-clock" aria-hidden="true"></span> Full Report
                            </a>
                            @can('manage-students-student-class')

                            <a href="{{ route('student_class_users.student_class_user.manage', $studentClass->id ) }}"
                                class="btn mr-2 btn-sm btn-primary" title="Edit Student Class">
                                <span class="fas fa-pen" aria-hidden="true"></span> Students Manage
                            </a>
                            @endcan
                            <div class="btn-group btn-group-xs float-right" role="group">
                                @can('view-student-class')
                                <a href="{{ route('student_classes.student_class.show', $studentClass->id ) }}"
                                    class="btn btn-sm btn-info" title="Show Student Class">
                                    <span class="fas fa-eye" aria-hidden="true"></span> Open
                                </a>
                                @endcan
                                @can('edit-student-class')
                                <a href="{{ route('student_classes.student_class.edit', $studentClass->id ) }}"
                                    class="btn btn-sm btn-primary" title="Edit Student Class">
                                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                                </a>
                                @endcan
                                @can('delete-student-class')

                                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                                [
                                'type' => 'submit',
                                'class' => 'btn btn-sm btn-danger',
                                'title' => 'Delete Student Class',
                                'onclick' => 'return confirm("' . 'Click Ok to delete Student Class.' . '")'
                                ])
                                !!}
                                @endcan
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($studentClasses->hasPages())
    <div class="card-footer">
        {!! $studentClasses->render() !!}
    </div>
    @endif
    @endif
</div>
@endsection