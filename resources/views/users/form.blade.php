<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!! Form::label('name','Name',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '191', 'required' =>
        true, 'placeholder' => 'Enter name here...', ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    {!! Form::label('email','Email',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('email',null, ['class' => 'form-control', 'minlength' => '1', 'maxlength' => '191', 'required' =>
        true, 'placeholder' => 'Enter email here...', ]) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if ($edit)

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">

    {!! Form::label('password','Password',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter password
        here...', "disabled"=>true]) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="d-flex mt-3 ">
        <div class="mx-2">
            {!! Form::checkbox('password-update','update',false, [ 'placeholder' => 'Enter password
            here...','id'=>'password-update' ])
            !!}
        </div>
        <label for="password-update" class="mx-2 control-label">
            Update Password
        </label>
    </div>
</div>
@else
{!! Form::hidden('password-update','update', [ 'placeholder' => 'Enter password
here...','id'=>'password-update' ])
!!}
<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    {!! Form::label('password','Password',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::password('password', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter
        password
        here...', ]) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif
<div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
    {!! Form::label('roles','Role',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('roles',$roles,null, ['class' => 'form-control', 'placeholder' => 'Select Role', ]) !!}
        {!! $errors->first('roles', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function () {
        var state=Boolean($('#password-update').attr('checked'));
        $('#password').attr('disabled',!state);

        $('#password-update').on('click',function () {
            var state=Boolean($('#password').attr('disabled'));
            $('#password').attr('disabled',!state);
        });
    });
</script>
@endpush