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
        <dl class="row">
            <div class="col">
                <dt>Marked At</dt>
                <dd>{{ $attendance->marked_at }}</dd>
            </div>
            <div class="col">
                <dt>Teacher</dt>
                <dd>{{ isset($attendance->teacher->name) ? $attendance->teacher->name : '' }}</dd>
            </div>
            <div class="col">

                <dt>Student Class</dt>
                <dd>{{ isset($attendance->studentClass->batch_name) ? $attendance->studentClass->batch_name : '' }}</dd>
            </div>
            <div class="col">

                <dt>Subject</dt>
                <dd>{{ isset($attendance->subject->name) ? $attendance->subject->name : '' }}</dd>
            </div>
            <div class="col">

                <dt>Slot</dt>
                <dd>{{ isset($attendance->slot->name) ? $attendance->slot->name : '' }}</dd>

            </div>
        </dl>
    </div>
  </div>


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
            {!! Form::open([
                'route' => 'attendees.attendee.storeOrUpdate',
                'class' => 'form-horizontal',
                'name' => 'create_attendance_form',
                'id' => 'create_attendance_form',

                ])
            !!}
          <div class="card-header">
            <h4 class="cards-title mb-0 float-left">Attendees</h4>
            {!! Form::hidden('attendance_id',$attendance_id) !!}
           {!! Form::button('<span class="fas fa-plus" aria-hidden="true"></span> Save',[
                "class"=>"btn btn-success btn-sm float-right",
                "type"=>"submit"
            ]) !!}

          </div>
          @if(count($attendees) == 0)
          <div class="card-body p-0 text-center">
              <h4>No Attendees Available.</h4>
          </div>
          @else
          <div class="card-body p-0">

            <table class="table table-condensed">
                  <thead>
                      <tr>
                              <th>Student</th>
                              <th>Status</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($attendees as $attendee)
                      <tr>
                              <td>{{ isset($attendee->name) ? $attendee->name : '' }}</td>
                              <td>
            {!! Form::hidden("student_id[{$attendee->id}]",$attendee->id) !!}
        <div class="row">
            <div class="radio col">
                <label>
                    {!! Form::radio("status[{$attendee->id}]", 'present',  (old('status', isset($attendee->status) ? $attendee->status : null) == 'present' ? true : true) , ['id' => 'status_present', 'class' => '', ]) !!}
                    Present
                </label>
            </div>
            <div class="radio col">
                <label>
                    {!! Form::radio("status[{$attendee->id}]", 'absent',  (old('status', isset($attendee->status) ? $attendee->status : null) == 'absent' ? true : null) , ['id' => 'status_absent', 'class' => '', ]) !!}
                    Absent
                </label>
            </div>
        </div>
                            </td>
                      </tr>
                  @endforeach
                  </tbody>
            </table>

        </div>

  @if ($attendees->hasPages())
  <div class="card-footer">
      {!! $attendees->render() !!}
  </div>
  @endif
          @endif
          {!! Form::close() !!}
        </div>

@endsection