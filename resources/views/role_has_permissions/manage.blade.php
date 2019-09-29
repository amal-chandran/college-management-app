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

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="cards-title mb-0 float-left">Available Permissions</h4>
            </div>
            @if(count($nonAllotedPermissions) == 0)
            <div class="card-body p-0 text-center">
                <h4>No Permissions Available.</h4>
            </div>
            @else
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Permissions</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nonAllotedPermissions as $Permissions)
                        <tr>

                            <td>{{ isset($Permissions->name) ? $Permissions->name : '' }}</td>
                            <td>

                                {!! Form::open([
                                'method' =>'POST',
                                'route' => ['role_has_permissions.role_has_permission.store'],
                                'style' => 'display: inline;',
                                ]) !!}
                                <div class="float-right" role="group">
                                    {!! Form::hidden('permission_id',$Permissions->id) !!}
                                    {!! Form::hidden('role_id',$roleID) !!}
                                    {!! Form::button('<span class="fas fa-plus" aria-hidden="true"></span> Add',
                                    [
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-success',
                                    'title' => 'Add User',
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

            @if ($nonAllotedPermissions->hasPages())
            <div class="card-footer">
                {!! $nonAllotedPermissions->render() !!}
            </div>
            @endif
            @endif
        </div>
    </div>
    <div class="col">

        <div class="card">
            <div class="card-header">
                <h4 class="cards-title mb-0 float-left">Allocated</h4>
            </div>
            @if(count($allotedPermissions) == 0)
            <div class="card-body p-0 text-center">
                <h4>No Permissions Available.</h4>
            </div>
            @else
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Permissions</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allotedPermissions as $Permissions)
                        <tr>

                            <td>{{ isset($Permissions->name) ? $Permissions->name : '' }}</td>
                            <td>

                                {!! Form::open([
                                'method' =>'DELETE',
                                'route' => ['role_has_permissions.role_has_permission.destroy',
                                $Permissions->id,$roleID],
                                'style' => 'display: inline;',
                                ]) !!}
                                <div class=" float-right" role="group">

                                    {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                                    [
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-danger',
                                    'title' => 'Delete Student Class User',
                                    'onclick' => 'return confirm("' . 'Click Ok to delete Student Class User.' . '")'
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

            @if ($allotedPermissions->hasPages())
            <div class="card-footer">
                {!! $allotedPermissions->render() !!}
            </div>
            @endif
            @endif
        </div>
    </div>
</div>


@endsection