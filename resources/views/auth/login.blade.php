@extends('layouts.auth')

@section('class', 'log_in_page')

@section('content')
    <div id="log-in" class="site-form log-in-form">
        <div id="log-in-head">
            <h1>@lang('auth.login')</h1>
            <div id="logo"><a href="01-home.html"><img src="/img/logo.png" alt=""></a></div>
        </div>

        <div class="form-output">
            <x-error-validation></x-error-validation>

            <form action="" method="POST">
                @csrf
                <div class="form-group label-floating">
                    <label class="control-label">@lang('auth.email')</label>
                    <input name="email" class="form-control" placeholder="" type="email">
                </div>

                <div class="form-group label-floating">
                    <label class="control-label">@lang('auth.password')</label>
                    <input name="password" class="form-control" placeholder="" type="password">
                </div>

                <div class="remember">
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox">
                            @lang('auth.remember me')
                        </label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot">@lang('auth.forget your password?')</a>
                </div>

                <button class="btn btn-lg btn-primary full-width">@lang('auth.login')</button>

                <div class="or"></div>

                <a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fa fa-facebook"
                        aria-hidden="true"></i>ورود با فیس بوک</a>

                <a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter"
                        aria-hidden="true"></i>ورود با توییتر</a>


                <p>@lang('auth.Dont you have an account?')<a href="{{ route('register') }}">@lang('auth.register user')</a> </p>
            </form>
        </div>
    </div>
@endsection
