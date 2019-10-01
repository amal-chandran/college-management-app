@extends('layouts.dashboard')



@section('content')
<div class="card p-4">
    <div>
        <table class="table table-bordered" id="report">
            <thead>
                <tr>
                    <th style="text-align:center;" colspan="{{count($heads)}}">Attendance Report - {{$studentClass->batch_name}}</th>
                </tr>
                <tr>
                    <th style="text-align:center;" colspan="{{count($heads)}}">{{$subject->name}}</th>
                </tr>
                <tr>
                    @foreach ($heads as $item)
                    <th>{{$item}}</th>
                    @endforeach
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#report').DataTable( {
            "ajax": '{{request()->url()}}',
            columns:[@foreach ($heads as $item){"data":"{{$item}}"},@endforeach]
        });
        $('#report').on('init.dt',function () {

            $("table").tableExport({
                position:"top",
            });
        })
    } );
</script>
@endpush