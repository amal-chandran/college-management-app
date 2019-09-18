<div class="form-group {{ $errors->has('student_class_id') ? 'has-error' : '' }}">
    {!! Form::label('student_class_id','Student Class',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('student_class_id',$studentClasses,null, ['class' => 'form-control', 'placeholder' => 'Select
        student class', ]) !!}
        {!! $errors->first('student_class_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('subject_id') ? 'has-error' : '' }}">
    {!! Form::label('subject_id','Subject',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('subject_id',$subjects,null, ['class' => 'form-control', 'placeholder' => 'Select subject', ])
        !!}
        {!! $errors->first('subject_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name','Name',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '255', 'placeholder'
        => 'Enter name here...', ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('day') ? 'has-error' : '' }}">
    {!! Form::label('day','Day',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('day',['Sunday' => 'Sunday',
        'Monday' => 'Monday',
        'Tuesday' => 'Tuesday',
        'Wednesday' => 'Wednesday',
        'Thursday' => 'Thursday',
        'Friday' => 'Friday',
        'Saturday' => 'Saturday'],null, ['class' => 'form-control', 'placeholder' => 'Select day', ]) !!}
        {!! $errors->first('day', '<p class="help-block">:message</p>') !!}
    </div>
</div>