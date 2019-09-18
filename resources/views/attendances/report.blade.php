@extends('layouts.dashboard')



@section('content')
<div class="card p-4">
    <div>
        {!! $dataTable->table() !!}
    </div>
</div>
@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
@endpush