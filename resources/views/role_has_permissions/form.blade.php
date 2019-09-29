
<div class="form-group {{ $errors->has('permission_id') ? 'has-error' : '' }}">
    {!! Form::label('permission_id','Permission',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('permission_id',$Permissions,null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select permission', ]) !!}
        {!! $errors->first('permission_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
    {!! Form::label('role_id','Role',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('role_id',$Roles,null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select role', ]) !!}
        {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

