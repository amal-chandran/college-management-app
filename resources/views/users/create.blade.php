@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h3 class="float-left mb-0">Create New User</h3>
        <div class="btn-group btn-group-sm float-right" role="group">
            <a href="{{ route('users.user.index') }}" class="btn btn-primary" title="Show All User">
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
        'route' => 'users.user.store',
        'class' => 'form-horizontal',
        'name' => 'create_user_form',
        'id' => 'create_user_form',

        ])
        !!}

        @include ('users.form', ['user' => null,])
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection