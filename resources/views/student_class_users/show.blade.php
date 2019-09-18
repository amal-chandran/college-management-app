@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($title) ? $title : 'Student Class User' }}</h4>
        <div class="float-right">
            {!! Form::open([
            'method' =>'DELETE',
            'route' => ['student_class_users.student_class_user.destroy', $studentClassUser->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('student_class_users.student_class_user.index') }}" class="btn btn-primary"
                    title="Show All Student Class User">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                <a href="{{ route('student_class_users.student_class_user.create') }}" class="btn btn-success"
                    title="Create New Student Class User">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
            </div>
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('student_class_users.student_class_user.edit', $studentClassUser->id ) }}"
                    class="btn btn-primary" title="Edit Student Class User">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>

                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                [
                'type' => 'submit',
                'class' => 'btn btn-danger',
                'title' => 'Delete Student Class User',
                'onclick' => 'return confirm("' . 'Click Ok to delete Student Class User.' . '")'
                ])
                !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Student Class</dt>
            <dd>{{ isset($studentClassUser->studentClass->batch_name) ? $studentClassUser->studentClass->batch_name : '' }}
            </dd>
            <dt>User</dt>
            <dd>{{ isset($studentClassUser->user->name) ? $studentClassUser->user->name : '' }}</dd>

        </dl>
    </div>
</div>

@endsection