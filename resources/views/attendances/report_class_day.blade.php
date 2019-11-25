@extends('layouts.dashboard')



@section('content')
<div class="card p-4">
    <div>
        <div class="mb-4">
            {!! Form::open([
            'route' => ['attendances.attendance.report_class_day',$studentClass->id],
            'class' => 'form-horizontal',
            'name' => 'create_attendance_form',
            'id' => 'create_attendance_form',
            'method'=>'get'
            ])
            !!}
            <div class="form-group">
                {!! Form::label('attendance_date','Class Date',['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('attendance_date',null, ['class' => 'form-control datepicker ', 'placeholder' =>
                    'Enter
                    marked at
                    here...', ]) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit('Load', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <hr>
        <table class="table table-bordered" id="report">
            <thead>
                <tr>
                    <th style="text-align:center;" colspan="{{count($heads)}}">Attendance Report -
                        {{$studentClass->batch_name}}</th>
                </tr>
                <tr>
                    <th style="text-align:center;" colspan="{{count($heads)}}">Report:
                        {{$attendance_date}}</th>
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
            "ajax": '{{request()->fullUrl()}}',
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