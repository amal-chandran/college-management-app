@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($title) ? $title : 'Role Has Permission' }}</h4>
        <div class="float-right">
            {!! Form::open([
            'method' =>'DELETE',
            'route' => ['role_has_permissions.role_has_permission.destroy',
            $roleHasPermission->permission_id,$roleHasPermission->role_id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('role_has_permissions.role_has_permission.index') }}" class="btn btn-primary"
                    title="Show All Role Has Permission">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                <a href="{{ route('role_has_permissions.role_has_permission.create') }}" class="btn btn-success"
                    title="Create New Role Has Permission">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
            </div>
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('role_has_permissions.role_has_permission.edit', [$roleHasPermission->permission_id,$roleHasPermission->role_id] ) }}"
                    class="btn btn-primary" title="Edit Role Has Permission">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>

                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                [
                'type' => 'submit',
                'class' => 'btn btn-danger',
                'title' => 'Delete Role Has Permission',
                'onclick' => 'return confirm("' . 'Click Ok to delete Role Has Permission.' . '")'
                ])
                !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Permission</dt>
            <dd>{{ isset($roleHasPermission->Permission->name) ? $roleHasPermission->Permission->name : '' }}</dd>
            <dt>Role</dt>
            <dd>{{ isset($roleHasPermission->Role->name) ? $roleHasPermission->Role->name : '' }}</dd>

        </dl>
    </div>
</div>

@endsection