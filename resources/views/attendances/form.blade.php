
<div class="form-group {{ $errors->has('teacher_id') ? 'has-error' : '' }}">
    {!! Form::label('teacher_id','Teacher',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('teacher_id',$teachers,null, ['class' => 'form-control', 'placeholder' => 'Select teacher', ]) !!}
        {!! $errors->first('teacher_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('student_class_id') ? 'has-error' : '' }}">
    {!! Form::label('student_class_id','Student Class',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('student_class_id',$studentClasses,null, ['class' => 'form-control', 'placeholder' => 'Select student class', ]) !!}
        {!! $errors->first('student_class_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('subject_id') ? 'has-error' : '' }}">
    {!! Form::label('subject_id','Subject',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('subject_id',$subjects,null, ['class' => 'form-control', 'placeholder' => 'Select subject', ]) !!}
        {!! $errors->first('subject_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

