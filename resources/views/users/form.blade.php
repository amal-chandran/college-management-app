
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name','Name',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '191', 'required' => true, 'placeholder' => 'Enter name here...', ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    {!! Form::label('email','Email',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('email',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '191', 'required' => true, 'placeholder' => 'Enter email here...', ]) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    {!! Form::label('password','Password',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::password('password', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter password here...', ]) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

