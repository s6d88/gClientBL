@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <!-- Default form login -->
            <form class="text-center border border-light m-4 p-4" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                <p class="h4 mb-4">Sign in</p>

                <!-- Email -->
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                

                <!-- Password -->
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="d-flex justify-content-around">
                    <div class="form-group">
                            <div class="col-md-12 col-md-offset-4 custom-control custom-checkbox">
                                <div class="checkbox" class="custom-control-input">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-4">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4 mx-auto " type="submit">Sign in</button>

                <!-- Register -->
                <p>Not a member?
                    <a href="{{url('/register')}} ">Register</a>
                </p>

                <!-- Social login -->
                <p>or sign in with:</p>

                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-facebook-f"></i>
                </a>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-twitter"></i>
                </a>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-github"></i>
                </a>

            </form>
            <!-- Default form login -->
            
        </div>
    </div>
</div>
@endsection
