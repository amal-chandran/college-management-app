@extends('layouts.dashboard')

@section('content')


<div class="card">
        <div class="card-header">
          <h3 class="float-left mb-0">Create New Student Class</h3>
          <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('student_classes.student_class.index') }}" class="btn btn-primary" title="Show All Student Class">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
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

            {!! Form::open([
                'route' => 'student_classes.student_class.store',
                'class' => 'form-horizontal',
                'name' => 'create_student_class_form',
                'id' => 'create_student_class_form',
                
                ])
            !!}

            @include ('student_classes.form', ['studentClass' => null,])
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
      </div>
@endsection