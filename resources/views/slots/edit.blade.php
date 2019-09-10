@extends('layouts.dashboard')

@section('content')

<div class="card">
        <div class="card-header">
            <h4 class="float-left">{{ !empty($slot->name) ? $slot->name : 'Slot' }}</h4>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('slots.slot.index') }}" class="btn btn-primary" title="Show All Slot">
                    <span class="fas fa-th-list" aria-hidden="true"></span> All List
                </a>

                <a href="{{ route('slots.slot.create') }}" class="btn btn-success" title="Create New Slot">
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

            {!! Form::model($slot, [
                'method' => 'PUT',
                'route' => ['slots.slot.update', $slot->id],
                'class' => 'form-horizontal',
                'name' => 'edit_slot_form',
                'id' => 'edit_slot_form',
                
            ]) !!}

            @include ('slots.form', ['slot' => $slot,])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
      </div>
@endsection