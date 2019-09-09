
<div class="form-group {{ $errors->has('student_id') ? 'has-error' : '' }}">
    {!! Form::label('student_id','Student',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('student_id',$students,null, ['class' => 'form-control', 'placeholder' => 'Select student', ]) !!}
        {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('attendance_id') ? 'has-error' : '' }}">
    {!! Form::label('attendance_id','Attendance',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('attendance_id',$attendances,null, ['class' => 'form-control', 'placeholder' => 'Select attendance', ]) !!}
        {!! $errors->first('attendance_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    {!! Form::label('status','Status',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="radio">
            <label for='status_present'>
                {!! Form::radio('status', 'present',  (old('status', isset($attendee->status) ? $attendee->status : null) == 'present' ? true : null) , ['id' => 'status_present', 'class' => '', ]) !!}
                Present
            </label>
        </div>
        <div class="radio">
            <label for='status_absent'>
                {!! Form::radio('status', 'absent',  (old('status', isset($attendee->status) ? $attendee->status : null) == 'absent' ? true : null) , ['id' => 'status_absent', 'class' => '', ]) !!}
                Absent
            </label>
        </div>

        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

