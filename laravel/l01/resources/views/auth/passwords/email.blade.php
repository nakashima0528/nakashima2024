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
      <p>Please enter and submit your email address. We will send you an email containing instructions on how to reset your password.</p>

      @if ($errors->any())
      <div class="errorMessage">There was a problem processing your request. Please see below.</div>
      @endif

      <form method="post" action="{{ url('/password/email') }}" class="loginForm mt3">
        @csrf
        <div class="formGroup">
        <input type="email" class="loginForm__control {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" placeholder="Email">
        @if ($errors->has('email'))
        <p class="loginForm__error">{{ $errors->first('email') }}</p>
        @endif
        </div>
        <div class="formBtn">
        <button class="arrowBtn" type="submit">Submit</button>
        </div>
      </form>

    </div>
@endsection
