@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($title) ? $title : 'Attendance' }}</h4>
        <div class="float-right">
        {!! Form::open([
            'method' =>'DELETE',
            'route'  => ['attendances.attendance.destroy', $attendance->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('attendances.attendance.index') }}" class="btn btn-primary" title="Show All Attendance">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                <a href="{{ route('attendances.attendance.create') }}" class="btn btn-success" title="Create New Attendance">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
            </div>
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('attendances.attendance.edit', $attendance->id ) }}" class="btn btn-primary" title="Edit Attendance">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>

                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                    [
                        'type'    => 'submit',
                        'class'   => 'btn btn-danger',
                        'title'   => 'Delete Attendance',
                        'onclick' => 'return confirm("' . 'Click Ok to delete Attendance.' . '")'
                    ])
                !!}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
            <dl class="dl-horizontal">
                                <dt>Teacher</dt>
            <dd>{{ isset($attendance->teacher->name) ? $attendance->teacher->name : '' }}</dd>
            <dt>Student Class</dt>
            <dd>{{ isset($attendance->studentClass->batch) ? $attendance->studentClass->batch : '' }}</dd>
            <dt>Subject</dt>
            <dd>{{ isset($attendance->subject->name) ? $attendance->subject->name : '' }}</dd>
            <dt>Slot</dt>
            <dd>{{ isset($attendance->slot->name) ? $attendance->slot->name : '' }}</dd>
            <dt>Marked At</dt>
            <dd>{{ $attendance->marked_at }}</dd>

</dl>
    </div>
  </div>

@endsection