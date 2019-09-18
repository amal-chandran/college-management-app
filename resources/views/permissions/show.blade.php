@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($permission->name) ? $permission->name : 'Permission' }}</h4>
        <div class="float-right">
            {!! Form::open([
            'method' =>'DELETE',
            'route' => ['permissions.permission.destroy', $permission->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('permissions.permission.index') }}" class="btn btn-primary"
                    title="Show All Permission">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                <a href="{{ route('permissions.permission.create') }}" class="btn btn-success"
                    title="Create New Permission">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
            </div>
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('permissions.permission.edit', $permission->id ) }}" class="btn btn-primary"
                    title="Edit Permission">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>

                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                [
                'type' => 'submit',
                'class' => 'btn btn-danger',
                'title' => 'Delete Permission',
                'onclick' => 'return confirm("' . 'Click Ok to delete Permission.' . '")'
                ])
                !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $permission->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $permission->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $permission->updated_at }}</dd>

        </dl>
    </div>
</div>

@endsection