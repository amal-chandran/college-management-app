@extends('layouts.dashboard')

@section('content')

<div class="card">
        <div class="card-header">
            <h4 class="float-left">{{ !empty($title) ? $title : 'Attendee' }}</h4>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('attendees.attendee.index') }}" class="btn btn-primary" title="Show All Attendee">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>

                <a href="{{ route('attendees.attendee.create') }}" class="btn btn-success" title="Create New Attendee">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
            </div>
        </div>
        <div class="card-body">
                @if ($errors->any())
                <ul class="list-unstyled alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::model($attendee, [
                'method' => 'PUT',
                'route' => ['attendees.attendee.update', $attendee->id],
                'class' => 'form-horizontal',
                'name' => 'edit_attendee_form',
                'id' => 'edit_attendee_form',
                
            ]) !!}

            @include ('attendees.form', ['attendee' => $attendee,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
      </div>
@endsection