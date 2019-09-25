@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="float-left">{{ !empty($user->name) ? $user->name : 'User' }}</h4>

        <div class="btn-group btn-group-sm float-right" role="group">

            <a href="{{ route('users.user.index') }}" class="btn btn-primary" title="Show All User">
                <span class="fas fa-th-list" aria-hidden="true"></span> All List
            </a>

            @can('create-users')
            <a href="{{ route('users.user.create') }}" class="btn btn-success" title="Create New User">
                <span class="fas fa-plus" aria-hidden="true"></span> Create New
            </a>
            @endcan
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

        {!! Form::model($user, [
        'method' => 'PUT',
        'route' => ['users.user.update', $user->id],
        'class' => 'form-horizontal',
        'name' => 'edit_user_form',
        'id' => 'edit_user_form',

        ]) !!}

        @include ('users.form', ['user' => $user,])

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection