@extends('layouts.login_app')
@section('canonical', url('/register'))
@section('title', 'Register')

@section('breadcrumb')

    <ol class="breadcrumb">
      <li><a href="/">TOP</a></li>
      <li class="active">Register</li>
    </ol>
@endsection

@section('content')
      <div class="wrap">
        <h2><img src="/img/login/register.png" alt="Register" class="loginKey03"></h2>
        <p>Please enter your email address and proceed to create a JP CONCIERGE account.</p>

        <form method="post" action="{{ url('/register') }}" class="loginForm mt3" id="form">
          @csrf
          <div class="formGroup">
            <input type="email" class="loginForm__control {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" placeholder="Email">
            @if ($errors->has('email'))
            <p class="loginForm__error">{{ $errors->first('email') }}</p>
            @endif
            @if ($errors->has('g-recaptcha-response'))
            <p class="loginForm__error">{{ $errors->first('g-recaptcha-response') }}</p>
            @endif
          </div>
          <div class="formBtn">
            <button class="arrowBtn" type="submit" id="submit_button">Proceed</button>
          </div>
          {!! no_captcha()->input() !!}
        </form>

      </div>

{!! no_captcha()->script() !!}
{!! no_captcha()->getApiScript() !!}
<script>
    const btn = document.getElementById('submit_button');
    btn.addEventListener('click', function (e) {
        e.preventDefault();
        grecaptcha.ready(function () {
            grecaptcha.execute('{{config("no-captcha.sitekey")}}',{action:'submit'}).then(function (token) {
                document.getElementById('g-recaptcha-response').value = token;
                document.getElementById('form').submit();
            })
        })
    }, false);
</script>
@endsection