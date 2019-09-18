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
        <h4 class="cards-title mb-0 float-left">Permissions</h4>
        <a href="{{ route('permissions.permission.create') }}" class="btn btn-success btn-sm float-right"
            title="Create New Permission">
            <span class="fas fa-plus" aria-hidden="true"></span> Create Permissions
        </a>
    </div>
    @if(count($permissions) == 0)
    <div class="card-body p-0 text-center">
        <h4>No Permissions Available.</h4>
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
                @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>

                    <td>

                        {!! Form::open([
                        'method' =>'DELETE',
                        'route' => ['permissions.permission.destroy', $permission->id],
                        'style' => 'display: inline;',
                        ]) !!}
                        <div class="btn-group btn-group-xs float-right" role="group">
                            <a href="{{ route('permissions.permission.show', $permission->id ) }}"
                                class="btn btn-sm btn-info" title="Show Permission">
                                <span class="fas fa-eye" aria-hidden="true"></span> Open
                            </a>
                            <a href="{{ route('permissions.permission.edit', $permission->id ) }}"
                                class="btn btn-sm btn-primary" title="Edit Permission">
                                <span class="fas fa-pen" aria-hidden="true"></span> Edit
                            </a>

                            {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-sm btn-danger',
                            'title' => 'Delete Permission',
                            'onclick' => 'return confirm("' . 'Click Ok to delete Permission.' . '")'
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

    @if ($permissions->hasPages())
    <div class="card-footer">
        {!! $permissions->render() !!}
    </div>
    @endif
    @endif
</div>
@endsection