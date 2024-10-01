@extends('layouts.home_app')

@section('breadcrumb')
		<ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">EDIT EMAIL ADDRESS</li>
    </ol>
@endsection

@section('content')
          <h2>EDIT EMAIL ADDRESS</h2>

					<P>Please enter a new email and proceed. You will receive a link to simply click for verification shortly.</p>

	@if ($errors->any())
					<div class="errorMessage">There was a problem processing your request. Please see below.</div>
	@endif
					<form method="post" action="{{ route('home.pesonal.email.send') }}" class="loginForm mt3">
						@csrf
						<div class="formGroup">
							<input type="email" class="loginForm__control {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" placeholder="Email">
							@if ($errors->has('email'))
							<p class="loginForm__error">{{ $errors->first('email') }}</p>
							@endif
						</div>
						<div class="formBtn">
							<button class="arrowBtn" type="submit">Proceed</button>
						</div>
					</form>
@endsection
