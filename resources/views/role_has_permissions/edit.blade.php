@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="float-left">{{ !empty($title) ? $title : 'Role Has Permission' }}</h4>

        <div class="btn-group btn-group-sm float-right" role="group">

            <a href="{{ route('role_has_permissions.role_has_permission.index') }}" class="btn btn-primary"
                title="Show All Role Has Permission">
                <span class="fas fa-th-list" aria-hidden="true"></span> All List
            </a>

            <a href="{{ route('role_has_permissions.role_has_permission.create') }}" class="btn btn-success"
                title="Create New Role Has Permission">
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

        {!! Form::model($roleHasPermission, [
        'method' => 'PUT',
        'route' => ['role_has_permissions.role_has_permission.update', $roleHasPermission->permission_id,
        $roleHasPermission->role_id],
        'class' => 'form-horizontal',
        'name' => 'edit_role_has_permission_form',
        'id' => 'edit_role_has_permission_form',

        ]) !!}

        @include ('role_has_permissions.form', ['roleHasPermission' => $roleHasPermission,])

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection