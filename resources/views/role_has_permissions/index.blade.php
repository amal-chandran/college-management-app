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
        <h4 class="cards-title mb-0 float-left">Role Has Permissions</h4>
        <a href="{{ route('role_has_permissions.role_has_permission.create') }}"
            class="btn btn-success btn-sm float-right" title="Create New Role Has Permission">
            <span class="fas fa-plus" aria-hidden="true"></span> Create Role Has Permissions
        </a>
    </div>
    @if(count($roleHasPermissions) == 0)
    <div class="card-body p-0 text-center">
        <h4>No Role Has Permissions Available.</h4>
    </div>
    @else
    <div class="card-body p-0">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Permission</th>
                    <th>Role</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($roleHasPermissions as $roleHasPermission)
                <tr>
                    <td>{{ isset($roleHasPermission->Permission->name) ? $roleHasPermission->Permission->name : '' }}
                    </td>
                    <td>{{ isset($roleHasPermission->Role->name) ? $roleHasPermission->Role->name : '' }}</td>

                    <td>

                        {!! Form::open([
                        'method' =>'DELETE',
                        'route' => ['role_has_permissions.role_has_permission.destroy',
                        $roleHasPermission->permission_id,$roleHasPermission->role_id],
                        'style' => 'display: inline;',
                        ]) !!}
                        <div class="btn-group btn-group-xs float-right" role="group">
                            <a href="{{ route('role_has_permissions.role_has_permission.show', [$roleHasPermission->permission_id ,$roleHasPermission->role_id]) }}"
                                class="btn btn-sm btn-info" title="Show Role Has Permission">
                                <span class="fas fa-eye" aria-hidden="true"></span> Open
                            </a>
                            <a href="{{ route('role_has_permissions.role_has_permission.edit', [$roleHasPermission->permission_id ,$roleHasPermission->role_id]) }}"
                                class="btn btn-sm btn-primary" title="Edit Role Has Permission">
                                <span class="fas fa-pen" aria-hidden="true"></span> Edit
                            </a>

                            {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-sm btn-danger',
                            'title' => 'Delete Role Has Permission',
                            'onclick' => 'return confirm("' . 'Click Ok to delete Role Has Permission.' . '")'
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

    @if ($roleHasPermissions->hasPages())
    <div class="card-footer">
        {!! $roleHasPermissions->render() !!}
    </div>
    @endif
    @endif
</div>
@endsection