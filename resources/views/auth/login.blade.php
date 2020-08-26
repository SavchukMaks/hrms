@extends('layouts.starting')

@section('title')
    <title> Title Login page </title>
@endsection

@section('description')
    <meta name="description" content="Login page description">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/templates/login-page/login-page.min.css')}}">
@endsection

@section('main')
    <div class="col-md-4 login-form">
        <h1>Login</h1>

        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-login">

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <p id="invalid-login">InValid Login or Email</p>
                        <span class="input {{ $errors->has('email') ? ' invalid' : '' }}">
                            <input id="email" type="text" placeholder="Login or Email" name="email" value="{{ old('email') }}" required>
                        </span>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <p id="invalid-pass">InValid Password</p>
                        <span class="input {{ $errors->has('password') ? ' invalid' : '' }}">
                            <input id="password" type="password" placeholder="Password" name="password" required>
                        </span>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <a href="{{ route('user_password_reset') }}" class="forgot-password">Forgot password?</a>

                @if($errors->has('need-re-captcha') || (isset($needReCaptcha) && $needReCaptcha))
                    <div class="col-md-6">
                        <span class="help-block">
                            <strong>{{ $errors->first('need-re-captcha') }}</strong>
                        </span>
                        <div class="g-recaptcha" style="margin-bottom: 18px;" data-sitekey="6LclyCsUAAAAADi8LHePRPlBx9KKObR7bo-WM9Jr"></div>
                    </div>
                @endif

                @if ($errors->has('g-recaptcha-response'))
                    {{ $errors->first('g-recaptcha-response') }}
                @endif

                <div class="col-md-6">
                    <span>
                       <button class="submit-btn" type="submit" >Login</button>
                    </span>
                </div>

                <div class="social-login">
                    <p>or</p>
                    <div class="list-social">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="login-form-register">
                    <p>Not Have Account? <a href="{{ url('/register') }}">Register</a></p>
                </div>
            </div>
        </form>
    </div>
@endsection