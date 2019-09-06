
<div class="form-group {{ $errors->has('batch') ? 'has-error' : '' }}">
    {!! Form::label('batch','Batch',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('batch',null, ['class' => 'form-control', 'minlength' => '1', 'placeholder' => 'Enter batch here...', ]) !!}
        {!! $errors->first('batch', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('branch') ? 'has-error' : '' }}">
    {!! Form::label('branch','Branch',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('branch',null, ['class' => 'form-control', 'minlength' => '1', 'placeholder' => 'Enter branch here...', ]) !!}
        {!! $errors->first('branch', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('class_teacher_id') ? 'has-error' : '' }}">
    {!! Form::label('class_teacher_id','Class Teacher',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('class_teacher_id',$classTeachers,null, ['class' => 'form-control', 'placeholder' => 'Select class teacher', ]) !!}
        {!! $errors->first('class_teacher_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

