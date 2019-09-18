@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="float-left">{{ !empty($subject->name) ? $subject->name : 'Subject' }}</h4>

        <div class="btn-group btn-group-sm float-right" role="group">

            <a href="{{ route('subjects.subject.index') }}" class="btn btn-primary" title="Show All Subject">
                <span class="fas fa-th-list" aria-hidden="true"></span> All List
            </a>

            <a href="{{ route('subjects.subject.create') }}" class="btn btn-success" title="Create New Subject">
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

        {!! Form::model($subject, [
        'method' => 'PUT',
        'route' => ['subjects.subject.update', $subject->id],
        'class' => 'form-horizontal',
        'name' => 'edit_subject_form',
        'id' => 'edit_subject_form',

        ]) !!}

        @include ('subjects.form', ['subject' => $subject,])

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection