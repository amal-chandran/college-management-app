@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($subject->name) ? $subject->name : 'Subject' }}</h4>
        <div class="float-right">
        {!! Form::open([
            'method' =>'DELETE',
            'route'  => ['subjects.subject.destroy', $subject->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('subjects.subject.index') }}" class="btn btn-primary" title="Show All Subject">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                <a href="{{ route('subjects.subject.create') }}" class="btn btn-success" title="Create New Subject">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
            </div>
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('subjects.subject.edit', $subject->id ) }}" class="btn btn-primary" title="Edit Subject">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>

                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                    [
                        'type'    => 'submit',
                        'class'   => 'btn btn-danger',
                        'title'   => 'Delete Subject',
                        'onclick' => 'return confirm("' . 'Click Ok to delete Subject.' . '")'
                    ])
                !!}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
            <dl class="dl-horizontal">
                                <dt>Name</dt>
            <dd>{{ $subject->name }}</dd>
            <dt>Teacher</dt>
            <dd>{{ isset($subject->teacher->name) ? $subject->teacher->name : '' }}</dd>
            <dt>Student Class</dt>
            <dd>{{ isset($subject->studentClass->batch_name) ? $subject->studentClass->batch_name : '' }}</dd>

</dl>
    </div>
  </div>

@endsection