@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($role->name) ? $role->name : 'Role' }}</h4>
        <div class="float-right">
        {!! Form::open([
            'method' =>'DELETE',
            'route'  => ['roles.role.destroy', $role->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('roles.role.index') }}" class="btn btn-primary" title="Show All Role">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                <a href="{{ route('roles.role.create') }}" class="btn btn-success" title="Create New Role">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
            </div>
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('roles.role.edit', $role->id ) }}" class="btn btn-primary" title="Edit Role">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>

                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                    [
                        'type'    => 'submit',
                        'class'   => 'btn btn-danger',
                        'title'   => 'Delete Role',
                        'onclick' => 'return confirm("' . 'Click Ok to delete Role.' . '")'
                    ])
                !!}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
            <dl class="dl-horizontal">
                                <dt>Name</dt>
            <dd>{{ $role->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $role->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $role->updated_at }}</dd>

</dl>
    </div>
  </div>

@endsection