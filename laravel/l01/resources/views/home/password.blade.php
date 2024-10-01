@extends('layouts.home_app')

@section('breadcrumb')
		<ol class="breadcrumb">
			<li><a href="{{ route('home') }}">Home</a></li>
			<li class="active">CHANGE PASSWORD</li>
		</ol>
@endsection

@section('content')
					<h2>CHANGE PASSWORD</h2>

          <p class="textGray">* indicates a required field.</p>
          @if ($errors->any())
          <div class="errorMessage">There was a problem processing your request. Please see below.</div>
          @endif

					{!! Form::open(['route' => ['home.password.update'], 'method' => 'patch', 'class' => 'homeForm mt3']) !!}
						@csrf
						<div class="formGroup">
							<label>Current Password *</label>
              {!! Form::password('current_password', $errors->has('current_password') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
	@if ($errors->has('current_password'))
							<p class="homeForm__error">{{ $errors->first('current_password') }}</p>
	@endif

						</div>
						<div class="formGroup">
							<label>New Password *</label>
							{!! Form::password('new_password', $errors->has('new_password') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
	@if ($errors->has('new_password'))
							<p class="homeForm__error">{{ $errors->first('new_password') }}</p>
	@endif

						</div>
						<div class="formGroup">
							<label>Confirm Password *</label>
							{!! Form::password('new_password_confirmation', $errors->has('new_password_confirmation') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
	@if ($errors->has('new_password_confirmation'))
							<p class="homeForm__error">{{ $errors->first('new_password_confirmation') }}</p>
	@endif

						</div>
						<div class="formBtn">
							<button class="arrowBtn" type="submit">Submit</button>
						</div>
					{!! Form::close() !!}

@endsection
