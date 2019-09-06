@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($title) ? $title : 'Student Class' }}</h4>
        <div class="float-right">
        {!! Form::open([
            'method' =>'DELETE',
            'route'  => ['student_classes.student_class.destroy', $studentClass->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('student_classes.student_class.index') }}" class="btn btn-primary" title="Show All Student Class">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                <a href="{{ route('student_classes.student_class.create') }}" class="btn btn-success" title="Create New Student Class">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
            </div>
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('student_classes.student_class.edit', $studentClass->id ) }}" class="btn btn-primary" title="Edit Student Class">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>

                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                    [
                        'type'    => 'submit',
                        'class'   => 'btn btn-danger',
                        'title'   => 'Delete Student Class',
                        'onclick' => 'return confirm("' . 'Click Ok to delete Student Class.' . '")'
                    ])
                !!}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
            <dl class="dl-horizontal">
                                <dt>Batch</dt>
            <dd>{{ $studentClass->batch }}</dd>
            <dt>Branch</dt>
            <dd>{{ $studentClass->branch }}</dd>
            <dt>Class Teacher</dt>
            <dd>{{ isset($studentClass->classTeacher->name) ? $studentClass->classTeacher->name : '' }}</dd>

</dl>
    </div>
  </div>

@endsection