@extends('layouts.login_app')
@section('canonical', url('/login'))
@section('title', 'Sign In')

@section('breadcrumb')

    <ol class="breadcrumb">
      <li><a href="/">TOP</a></li>
      <li class="active">Sign In</li>
    </ol>
@endsection

@section('content')
      <div class="wrap">
        <div class="loginBox">
          <div class="loginBox__left">
            <h2><img src="/img/login/signIn.png" alt="Sign In" class="loginKey01"></h2>
            <form method="POST" action="{{ route('login') }}" class="loginForm">
              @csrf
              <div class="formGroup">
                <input type="email" class="loginForm__control {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" placeholder="Email">
                @if ($errors->has('email'))
                <p class="loginForm__error">{{ $errors->first('email') }}</p>
                @endif
              </div>
              <div class="formGroup">
                <input type="password" class="loginForm__control {{ $errors->has('password')?'is-invalid':'' }}" name="password" placeholder="Password">
                @if ($errors->has('password'))
                <p class="loginForm__error">{{ $errors->first('password') }}</p>
                @endif
              </div>
              <div class="formBtn">
                <button class="arrowBtn" type="submit">Sign In</button>
              </div>
              <p class="mt2"><a class="arrowLink" href="{{ url('/password/reset') }}">Password Request</a></p>
            </form>
          </div>
          <div class="loginBox__center"></div>
          <div class="loginBox__rigth">
            <h2><img src="/img/login/createAnAccount.png" alt="Create An Account" class="loginKey02"></h2>
            <a class="arrowBtn arrowBtn--type2" href="{{ url('/register') }}">Register</a>
          </div>
        </div>
      </div>
@endsection
