
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name','Name',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '255', 'placeholder' => 'Enter name here...', ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

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

