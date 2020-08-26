@extends('layouts.starting')

@section('title')
    <title> Registration page </title>
@endsection

@section('description')
    <meta name="description" content="Register page description">
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('css/templates/registration-page/registration-page.min.css')}}">
@endsection

@section('main')
    <div class="col-md-4 registration-form">
            <h1>Registration</h1>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                    <div class="form-login{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                    <p id="invalid-login">InValid Login or Email</p>
                                    <span class="input">
                <input id="email" type="text" placeholder="Login or Email" name="email" value="{{ old('email') }}" required autofocus>
            </span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                    <p id="invalid-pass">InValid Password</p>
                                    <span class="input{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" placeholder="Password" name="password" required>
            </span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                    <p id="invalid-confim-pass">InValid Confirm Password</p>
                                    <span class="input">
                <input id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" required>
            </span>

                                    <select name="role" id="role">
                                        <option value="company" id="company">Company</option>
                                        <option value="recruiter" id="recruiter">Recruiter</option>
                                    </select>

                                    <div id="company-inputs">
                                            <p id="invalid-company-name">InValid Company name</p>
                                            <span class="input invalid">
                    <input type="text" placeholder="Company name" id="company_name" name="company_name" value="{{ old('company_name') }}">
                </span>
                                        @if ($errors->has('company_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                        @endif

                                        </div>

                                    <div id="recruiter-inputs">
                                            <p id="recruiter-first-name">InValid First Name</p>
                                            <span class="input">
                    <input type="text" placeholder="First Name" id="first_name" name="first_name" value="{{ old('first_name') }}" >
                </span>

                                            <p id="recruiter-last-name">InValid Second Name</p>
                                            <span class="input">
                    <input type="text" placeholder="Second Name" id="second_name" name="second_name" value="{{ old('second_name') }}" >
                </span>
                                        </div>
                                    <span>

                                    <button class="submit-btn" type="submit">
                                        Register
                                    </button>

                                    </span>
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
                                            <p>Already Have Account?  <a href="{{ url('/login') }}">Login</a></p>
                                        </div>
                                </div>
                        </div>
                </form>

        </div>
@endsection