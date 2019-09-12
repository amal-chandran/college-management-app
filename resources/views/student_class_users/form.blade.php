
<div class="form-group {{ $errors->has('student_class_id') ? 'has-error' : '' }}">
    {!! Form::label('student_class_id','Student Class',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('student_class_id',$studentClasses,null, ['class' => 'form-control', 'placeholder' => 'Select student class', ]) !!}
        {!! $errors->first('student_class_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    {!! Form::label('user_id','User',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('user_id',$users,null, ['class' => 'form-control', 'placeholder' => 'Select user', ]) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

