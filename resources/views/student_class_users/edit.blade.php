@extends('layouts.dashboard')

@section('content')

<div class="card">
        <div class="card-header">
            <h4 class="float-left">{{ !empty($title) ? $title : 'Student Class User' }}</h4>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('student_class_users.student_class_user.index') }}" class="btn btn-primary" title="Show All Student Class User">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>

                <a href="{{ route('student_class_users.student_class_user.create') }}" class="btn btn-success" title="Create New Student Class User">
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

            {!! Form::model($studentClassUser, [
                'method' => 'PUT',
                'route' => ['student_class_users.student_class_user.update', $studentClassUser->id],
                'class' => 'form-horizontal',
                'name' => 'edit_student_class_user_form',
                'id' => 'edit_student_class_user_form',
                
            ]) !!}

            @include ('student_class_users.form', ['studentClassUser' => $studentClassUser,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
      </div>
@endsection