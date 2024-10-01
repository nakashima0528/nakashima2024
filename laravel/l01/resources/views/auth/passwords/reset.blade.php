@extends('layouts.login_app')

@section('breadcrumb')

  <ol class="breadcrumb">
    <li><a href="/">TOP</a></li>
    <li class="active">Password Request</li>
  </ol>
@endsection

@section('content')
    <div class="wrap">
      <h2><img src="/img/login/password.png" alt="Password Reset" class="loginKey05"></h2>
      <p>Please enter your new password below.</p>
      <p class="mt1">Password must be 8 or more characters, including at least one uppercase and one lowercase.</p>

      @if ($errors->any())
      <div class="errorMessage">There was a problem processing your request. Please see below.</div>
      @endif

      <form method="post" action="{{ url('/password/reset') }}" class="loginForm mt3">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="formGroup">
        <input type="email" class="loginForm__control {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" placeholder="Email">
        @if ($errors->has('email'))
        <p class="loginForm__error">{{ $errors->first('email') }}</p>
        @endif
        </div>
        <div class="formGroup">
        <input type="password" class="loginForm__control {{ $errors->has('password')?'is-invalid':''}}" name="password" placeholder="Password">
        @if ($errors->has('password'))
        <p class="loginForm__error">{{ $errors->first('password') }}</p>
        @endif
        </div>
        <div class="formGroup">
        <input type="password" name="password_confirmation" class="loginForm__control" placeholder="Password Confirmation">
        @if ($errors->has('password_confirmation'))
        <p class="loginForm__error">{{ $errors->first('password_confirmation') }}</p>
        @endif
        </div>
        <div class="formBtn">
          <button class="arrowBtn" type="submit">Submit</button>
        </div>
      </form>

    </div>
@endsection