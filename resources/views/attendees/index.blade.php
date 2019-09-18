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
        <h4 class="cards-title mb-0 float-left">Attendees</h4>
        <a href="{{ route('attendees.attendee.create') }}" class="btn btn-success btn-sm float-right"
            title="Create New Attendee">
            <span class="fas fa-plus" aria-hidden="true"></span> Create Attendees
        </a>
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
                    <th>Attendance</th>
                    <th>Status</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendees as $attendee)
                <tr>
                    <td>{{ isset($attendee->student->name) ? $attendee->student->name : '' }}</td>
                    <td>{{ isset($attendee->attendance->created_at) ? $attendee->attendance->created_at : '' }}</td>
                    <td>{{ $attendee->status }}</td>

                    <td>

                        {!! Form::open([
                        'method' =>'DELETE',
                        'route' => ['attendees.attendee.destroy', $attendee->id],
                        'style' => 'display: inline;',
                        ]) !!}
                        <div class="btn-group btn-group-xs float-right" role="group">
                            <a href="{{ route('attendees.attendee.show', $attendee->id ) }}" class="btn btn-sm btn-info"
                                title="Show Attendee">
                                <span class="fas fa-eye" aria-hidden="true"></span> Open
                            </a>
                            <a href="{{ route('attendees.attendee.edit', $attendee->id ) }}"
                                class="btn btn-sm btn-primary" title="Edit Attendee">
                                <span class="fas fa-pen" aria-hidden="true"></span> Edit
                            </a>

                            {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-sm btn-danger',
                            'title' => 'Delete Attendee',
                            'onclick' => 'return confirm("' . 'Click Ok to delete Attendee.' . '")'
                            ])
                            !!}
                        </div>
                        {!! Form::close() !!}
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
</div>
@endsection