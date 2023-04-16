@extends('layouts.auth')

@section('class', 'log_in_page')

@section('content')
    <!--======= register_in_page =======-->
    <div id="log-in" class="site-form log-in-form">

        <div id="log-in-head">
            <h1>ثبت نام</h1>
            <div id="logo"><a href="{{ route('index') }}"><img src="/img/logo.png" alt=""></a></div>
        </div>

        <div class="form-output">
            <form action="" method="POST">
                @csrf
                <div class="form-group label-floating">
                    <label class="control-label">@lang('auth.name')</label>
                    <input name="name" class="form-control" placeholder="" type="text">
                </div>

                <div class="form-group label-floating">
                    <label class="control-label">@lang('auth.email')</label>
                    <input name="email" class="form-control" placeholder="" type="email">
                </div>

                <div class="form-group label-floating">
                    <label class="control-label">@lang('auth.password')</label>
                    <input name="password" class="form-control" placeholder="" type="password">
                </div>

                <div class="form-group label-floating">
                    <label class="control-label">@lang('auth.password_confirmation')</label>
                    <input name="password_confirmation" class="form-control" placeholder="" type="password">
                </div>

                <button class="btn btn-lg btn-primary full-width">@lang('auth.register')</button>

                <div class="or"></div>

                <a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fa fa-facebook"
                        aria-hidden="true"></i>ورود با فیس بوک</a>

                <a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter"
                        aria-hidden="true"></i>ورود با توییتر</a>


                <p> @lang('auth.Do You have an account?') <a href="{{ route('login') }}"> @lang('auth.login') </a> </p>
            </form>
        </div>
    </div>
    <!--======= // register_in_page =======-->
@endsection
