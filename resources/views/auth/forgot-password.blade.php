@extends('layouts.auth')
@section('class', 'log_in_page')
@section('content')
    <div id="log-in" class="site-form log-in-form">

        <div id="log-in-head">
            <h1>@lang('auth.Password recovery')</h1>
            <div id="logo"><a href="{{ route('index') }}"><img src="/img/logo.png" alt=""></a></div>
        </div>

        <div class="form-output">
            <x-error-validation></x-error-validation>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('failed'))
                <div class="alert alert-dender">
                    {{ session('failed') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group label-floating">
                    <label class="control-label">@lang('auth.email')</label>
                    <input name="email" class="form-control" placeholder="" type="email">
                </div>

                <button type="submit" class="btn btn-lg btn-primary full-width">@lang('auth.Send a recovery email')</button>

            </form>
        </div>
    </div>

@endsection
