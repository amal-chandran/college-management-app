@extends('layouts.main') 
@section('content')
<div class="container">

    <div class="card mt-5 mx-auto w-50">
        <div class="card-header">Login</div>
        <div class="card-body">

            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class=" control-label">Email</label>

                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>                    @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class=" control-label">Password</label>

                    <input id="password" type="password" class="form-control" name="password" required> @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                </div>

                <div class="form-group d-flex justify-content-between mb-2 align-items-center ">
                    <div class="checkbox">
                        <label class="mb-0">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                    </div>
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">
                                    Login
                                </button>


                </div>
            </form>
        </div>
    </div>

</div>
@endsection