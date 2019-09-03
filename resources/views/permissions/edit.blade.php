@extends('layouts.dashboard')

@section('content')

<div class="card">
        <div class="card-header">
            <h4 class="float-left">{{ !empty($permission->name) ? $permission->name : 'Permission' }}</h4>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('permissions.permission.index') }}" class="btn btn-primary" title="Show All Permission">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>

                <a href="{{ route('permissions.permission.create') }}" class="btn btn-success" title="Create New Permission">
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

            {!! Form::model($permission, [
                'method' => 'PUT',
                'route' => ['permissions.permission.update', $permission->id],
                'class' => 'form-horizontal',
                'name' => 'edit_permission_form',
                'id' => 'edit_permission_form',
                
            ]) !!}

            @include ('permissions.form', ['permission' => $permission,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
      </div>
@endsection