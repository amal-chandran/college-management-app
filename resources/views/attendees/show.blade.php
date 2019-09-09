@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($title) ? $title : 'Attendee' }}</h4>
        <div class="float-right">
        {!! Form::open([
            'method' =>'DELETE',
            'route'  => ['attendees.attendee.destroy', $attendee->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('attendees.attendee.index') }}" class="btn btn-primary" title="Show All Attendee">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                <a href="{{ route('attendees.attendee.create') }}" class="btn btn-success" title="Create New Attendee">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
            </div>
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('attendees.attendee.edit', $attendee->id ) }}" class="btn btn-primary" title="Edit Attendee">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>

                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                    [
                        'type'    => 'submit',
                        'class'   => 'btn btn-danger',
                        'title'   => 'Delete Attendee',
                        'onclick' => 'return confirm("' . 'Click Ok to delete Attendee.' . '")'
                    ])
                !!}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
            <dl class="dl-horizontal">
                                <dt>Student</dt>
            <dd>{{ isset($attendee->student->name) ? $attendee->student->name : '' }}</dd>
            <dt>Attendance</dt>
            <dd>{{ isset($attendee->attendance->created_at) ? $attendee->attendance->created_at : '' }}</dd>
            <dt>Status</dt>
            <dd>{{ $attendee->status }}</dd>

</dl>
    </div>
  </div>

@endsection