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
        <h4 class="cards-title mb-0 float-left">Roles</h4>
        <a href="{{ route('roles.role.create') }}" class="btn btn-success btn-sm float-right" title="Create New Role">
            <span class="fas fa-plus" aria-hidden="true"></span> Create Roles
        </a>
    </div>
    @if(count($roles) == 0)
    <div class="card-body p-0 text-center">
        <h4>No Roles Available.</h4>
    </div>
    @else
    <div class="card-body p-0">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Name</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>

                    <td>

                        {!! Form::open([
                        'method' =>'DELETE',
                        'route' => ['roles.role.destroy', $role->id],
                        'style' => 'display: inline;',
                        ]) !!}
                        <div class="btn-group btn-group-xs float-right" role="group">
                            <a href="{{ route('roles.role.show', $role->id ) }}" class="btn btn-sm btn-info"
                                title="Show Role">
                                <span class="fas fa-eye" aria-hidden="true"></span> Open
                            </a>
                            <a href="{{ route('roles.role.edit', $role->id ) }}" class="btn btn-sm btn-primary"
                                title="Edit Role">
                                <span class="fas fa-pen" aria-hidden="true"></span> Edit
                            </a>

                            {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-sm btn-danger',
                            'title' => 'Delete Role',
                            'onclick' => 'return confirm("' . 'Click Ok to delete Role.' . '")'
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

    @if ($roles->hasPages())
    <div class="card-footer">
        {!! $roles->render() !!}
    </div>
    @endif
    @endif
</div>
@endsection