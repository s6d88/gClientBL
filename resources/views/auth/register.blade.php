@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <!-- Default form register -->
            <form class="text-center border border-light m-4 p-4" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                <p class="h4 mb-4">Sign up</p>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-6  control-label">Name</label>

                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- E-mail -->
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                   <label for="email" class="col-md-6  control-label">E-Mail Address</label>

                   <div class="col-md-12">
                       <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                       @if ($errors->has('email'))
                           <span class="help-block">
                               <strong>{{ $errors->first('email') }}</strong>
                           </span>
                       @endif
                   </div>
               </div>

                <!-- Password -->
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-6  control-label">Password</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password-confirm" class="col-md-6  control-label">Confirm Password</label>

                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>


                <!-- Sign up button -->
                <button class="btn btn-info my-4 btn-block mx-auto" type="submit">Sign in</button>

                <!-- Social register -->
                <p>or sign up with:</p>

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

                <hr>

                <!-- Terms of service -->
                <p>By clicking
                    <em>Sign up</em> you agree to our
                    <a href="#" target="_blank">terms of service</a>

            </form>
            <!-- Default form register -->
            
        </div>
    </div>
</div>
@endsection
