@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="float-left">{{ !empty($role->name) ? $role->name : 'Role' }}</h4>

        <div class="btn-group btn-group-sm float-right" role="group">

            <a href="{{ route('roles.role.index') }}" class="btn btn-primary" title="Show All Role">
                <span class="fas fa-th-list" aria-hidden="true"></span> All List
            </a>

            <a href="{{ route('roles.role.create') }}" class="btn btn-success" title="Create New Role">
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

        {!! Form::model($role, [
        'method' => 'PUT',
        'route' => ['roles.role.update', $role->id],
        'class' => 'form-horizontal',
        'name' => 'edit_role_form',
        'id' => 'edit_role_form',

        ]) !!}

        @include ('roles.form', ['role' => $role,])

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection