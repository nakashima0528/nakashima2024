@extends('layouts.login_app')

@section('breadcrumb')

    <ol class="breadcrumb">
      <li><a href="/">TOP</a></li>
      <li class="active">Thank you</li>
    </ol>
@endsection

@section('content')
      <div class="wrap">
        <h2><img src="/img/login/thanks.png" alt="Thank you" class="loginKey04"></h2>
        <p class="titleMessage">An email has been sent with a link for online registration.</p>
        <p>Thank you for expressing an interest in JP CONCIERGE. We emailed you with a link to online registration. Please note that upon receipt, the link is valid for 24 hours.</p>

        <form method="GET" action="/resend" class="loginForm">
          @csrf
          <div class="formBtn">
            <button class="arrowBtn" type="submit">Resend</button>
          </div>
        </form>
      </div>
@endsection
