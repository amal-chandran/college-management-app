@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($user->name) ? $user->name : 'User' }}</h4>
        <div class="float-right">
            {!! Form::open([
            'method' =>'DELETE',
            'route' => ['users.user.destroy', $user->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('users.user.index') }}" class="btn btn-primary" title="Show All User">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                @can('create-slots')
                <a href="{{ route('users.user.create') }}" class="btn btn-success" title="Create New User">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
                @endcan
            </div>
            <div class="btn-group btn-group-sm" role="group">
                @can('edit-slots')
                <a href="{{ route('users.user.edit', $user->id ) }}" class="btn btn-primary" title="Edit User">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>
                @endcan

                @can('delete-slots')
                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                [
                'type' => 'submit',
                'class' => 'btn btn-danger',
                'title' => 'Delete User',
                'onclick' => 'return confirm("' . 'Click Ok to delete User.' . '")'
                ])
                !!}
                @endcan
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $user->name }}</dd>
            <dt>Email</dt>
            <dd>{{ $user->email }}</dd>
            <dt>Created</dt>
            <dd>{{ $user->created_at }}</dd>

        </dl>
    </div>
</div>

@endsection