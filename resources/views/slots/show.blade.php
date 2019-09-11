@extends('layouts.dashboard')

@section('content')


<div class="card">
    <div class="card-header">
        <h4 class="mb-0 float-left">{{ isset($slot->name) ? $slot->name : 'Slot' }}</h4>
        <div class="float-right">
        {!! Form::open([
            'method' =>'DELETE',
            'route'  => ['slots.slot.destroy', $slot->id]
            ]) !!}
            <div class="btn-group mr-1 btn-group-sm" role="group">
                <a href="{{ route('slots.slot.index') }}" class="btn btn-primary" title="Show All Slot">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>
                <a href="{{ route('slots.slot.create') }}" class="btn btn-success" title="Create New Slot">
                    <span class="fas fa-plus" aria-hidden="true"></span> Create New
                </a>
            </div>
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('slots.slot.edit', $slot->id ) }}" class="btn btn-primary" title="Edit Slot">
                    <span class="fas fa-pen" aria-hidden="true"></span> Edit
                </a>

                {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                    [
                        'type'    => 'submit',
                        'class'   => 'btn btn-danger',
                        'title'   => 'Delete Slot',
                        'onclick' => 'return confirm("' . 'Click Ok to delete Slot.' . '")'
                    ])
                !!}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
    <div class="card-body">
            <dl class="dl-horizontal">
                                <dt>Student Class</dt>
            <dd>{{ isset($slot->studentClass->batch) ? $slot->studentClass->batch : '' }}</dd>
            <dt>Subject</dt>
            <dd>{{ isset($slot->subject->name) ? $slot->subject->name : '' }}</dd>
            <dt>Name</dt>
            <dd>{{ $slot->name }}</dd>
            <dt>Day</dt>
            <dd>{{ $slot->day }}</dd>

</dl>
    </div>
  </div>

@endsection