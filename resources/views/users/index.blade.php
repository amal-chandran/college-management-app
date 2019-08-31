@extends('layouts.dashboard')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="card">
        <div class="card-header">
          <h4 class="cards-title mb-0 float-left">Users</h4>
            <a href="{{ route('users.user.create') }}" class="btn btn-success btn-sm float-right" title="Create New User">
                <span class="fas fa-plus" aria-hidden="true"></span> Create Users
            </a>
        </div>
        @if(count($users) == 0)
        <div class="card-body p-0 text-center">
            <h4>No Users Available.</h4>
        </div>
        @else
        <div class="card-body p-0">
          <table class="table table-condensed">
                <thead>
                    <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>

                        <td>

                            {!! Form::open([
                                'method' =>'DELETE',
                                'route'  => ['users.user.destroy', $user->id],
                                'style'  => 'display: inline;',
                            ]) !!}
                                <div class="btn-group btn-group-xs float-right" role="group">
                                    <a href="{{ route('users.user.show', $user->id ) }}" class="btn btn-sm btn-info" title="Show User">
                                        <span class="fas fa-eye" aria-hidden="true"></span> Open
                                    </a>
                                    <a href="{{ route('users.user.edit', $user->id ) }}" class="btn btn-sm btn-primary" title="Edit User">
                                        <span class="fas fa-pen" aria-hidden="true"></span> Edit
                                    </a>

                                    {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                                        [
                                            'type'    => 'submit',
                                            'class'   => 'btn btn-sm btn-danger',
                                            'title'   => 'Delete User',
                                            'onclick' => 'return confirm("' . 'Click Ok to delete User.' . '")'
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

@if ($users->hasPages())
<div class="card-footer">
    {!! $users->render() !!}
</div>
@endif
        @endif
      </div>
@endsection