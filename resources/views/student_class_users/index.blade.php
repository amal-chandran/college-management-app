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
          <h4 class="cards-title mb-0 float-left">Student Class Users</h4>
            <a href="{{ route('student_class_users.student_class_user.create') }}" class="btn btn-success btn-sm float-right" title="Create New Student Class User">
                <span class="fas fa-plus" aria-hidden="true"></span> Create Student Class Users
            </a>
        </div>
        @if(count($studentClassUsers) == 0)
        <div class="card-body p-0 text-center">
            <h4>No Student Class Users Available.</h4>
        </div>
        @else
        <div class="card-body p-0">
          <table class="table table-condensed">
                <thead>
                    <tr>
                            <th>Student Class</th>
                            <th>User</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($studentClassUsers as $studentClassUser)
                    <tr>
                            <td>{{ isset($studentClassUser->studentClass->batch_name) ? $studentClassUser->studentClass->batch_name : '' }}</td>
                            <td>{{ isset($studentClassUser->user->name) ? $studentClassUser->user->name : '' }}</td>

                        <td>

                            {!! Form::open([
                                'method' =>'DELETE',
                                'route'  => ['student_class_users.student_class_user.destroy', $studentClassUser->id],
                                'style'  => 'display: inline;',
                            ]) !!}
                                <div class="btn-group btn-group-xs float-right" role="group">
                                    <a href="{{ route('student_class_users.student_class_user.show', $studentClassUser->id ) }}" class="btn btn-sm btn-info" title="Show Student Class User">
                                        <span class="fas fa-eye" aria-hidden="true"></span> Open
                                    </a>
                                    <a href="{{ route('student_class_users.student_class_user.edit', $studentClassUser->id ) }}" class="btn btn-sm btn-primary" title="Edit Student Class User">
                                        <span class="fas fa-pen" aria-hidden="true"></span> Edit
                                    </a>

                                    {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                                        [
                                            'type'    => 'submit',
                                            'class'   => 'btn btn-sm btn-danger',
                                            'title'   => 'Delete Student Class User',
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

@if ($studentClassUsers->hasPages())
<div class="card-footer">
    {!! $studentClassUsers->render() !!}
</div>
@endif
        @endif
      </div>
@endsection