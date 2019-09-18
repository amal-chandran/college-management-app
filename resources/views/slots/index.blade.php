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
        <h4 class="cards-title mb-0 float-left">Slots</h4>
        <a href="{{ route('slots.slot.create') }}" class="btn btn-success btn-sm float-right" title="Create New Slot">
            <span class="fas fa-plus" aria-hidden="true"></span> Create Slots
        </a>
    </div>
    @if(count($slots) == 0)
    <div class="card-body p-0 text-center">
        <h4>No Slots Available.</h4>
    </div>
    @else
    <div class="card-body p-0">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Student Class</th>
                    <th>Subject</th>
                    <th>Name</th>
                    <th>Day</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($slots as $slot)
                <tr>
                    <td>{{ isset($slot->studentClass->batch_name) ? $slot->studentClass->batch_name : '' }}</td>
                    <td>{{ isset($slot->subject->name) ? $slot->subject->name : '' }}</td>
                    <td>{{ $slot->name }}</td>
                    <td>{{ $slot->day }}</td>

                    <td>

                        {!! Form::open([
                        'method' =>'DELETE',
                        'route' => ['slots.slot.destroy', $slot->id],
                        'style' => 'display: inline;',
                        ]) !!}
                        <div class="btn-group btn-group-xs float-right" role="group">
                            <a href="{{ route('slots.slot.show', $slot->id ) }}" class="btn btn-sm btn-info"
                                title="Show Slot">
                                <span class="fas fa-eye" aria-hidden="true"></span> Open
                            </a>
                            <a href="{{ route('slots.slot.edit', $slot->id ) }}" class="btn btn-sm btn-primary"
                                title="Edit Slot">
                                <span class="fas fa-pen" aria-hidden="true"></span> Edit
                            </a>

                            {!! Form::button('<span class="fas fa-trash" aria-hidden="true"></span> Delete',
                            [
                            'type' => 'submit',
                            'class' => 'btn btn-sm btn-danger',
                            'title' => 'Delete Slot',
                            'onclick' => 'return confirm("' . 'Click Ok to delete Slot.' . '")'
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

    @if ($slots->hasPages())
    <div class="card-footer">
        {!! $slots->render() !!}
    </div>
    @endif
    @endif
</div>
@endsection