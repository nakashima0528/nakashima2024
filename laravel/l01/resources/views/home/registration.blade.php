@extends('layouts.login_app')

@section('breadcrumb')

    <ol class="breadcrumb">
      <li><a href="/">TOP</a></li>
      <li class="active">Registration Form</li>
    </ol>
@endsection

@section('content')
      <div class="wrap">
        <h2><img src="/img/login/registration.png" alt="Registration Form" class="loginKey06"></h2>
        <p>We sincerely appreciate your trust and support. As the operator of JP Concierge, passage LLC is a duly registered Japanese corporation (Corporate Number: 3010403028626). We're delighted to inform you that services extended to non-residents typically enjoy an exemption from consumption tax. To ensure a seamless experience, kindly provide the necessary information using single-byte alphanumeric characters. Your account will be suspended at our discretion if we do not receive any contact from you within two weeks of your registration.
	<br><br>Thank you for choosing JP Concierge to meet your needs. We look forward to serving you.</p>

        <div class="registrationBox">
          <p class="textGray">* indicates a required field.</p>
          @if ($errors->any())
          <div class="errorMessage">There was a problem processing your request. Please see below.</div>
          @endif

          {!! Form::model($user, ['route' => ['registration.update'], 'method' => 'patch', 'class' => 'homeForm mt2']) !!}
            @csrf
            {!! Form::hidden('status', config('const.user.status.MEMBER')) !!}

            <div class="formGroup">
              <label>Title *</label>
	            {!! Form::select('title', config('const.user.title_list'), null, $errors->has('title') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('title'))
              <p class="homeForm__error">{{ $errors->first('title') }}</p>
              @endif
            </div>

            <div class="formGroup">
              <label>Forename(s) *</label>
              {!! Form::text('forename', null, $errors->has('forename') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('forename'))
              <p class="homeForm__error">{{ $errors->first('forename') }}</p>
              @endif
            </div>

            <div class="formGroup">
              <label>Surname *</label>
              {!! Form::text('surname', null, $errors->has('surname') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('surname'))
              <p class="homeForm__error">{{ $errors->first('surname') }}</p>
              @endif
            </div>

            <div class="formGroup">
              <label>Date of birth *</label>
              {!! Form::date('birth', '1980-01-01', $errors->has('birth') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('birth'))
              <p class="homeForm__error">{{ $errors->first('birth') }}</p>
              @endif
            </div>

            <div class="formGroup">
              <label>Email address *</label>
              {!! Form::email('email', null, ['class' => 'homeForm__control','readonly' => 'readonly']) !!}
              @if ($errors->has('email'))
              <p class="homeForm__error">{{ $errors->first('email') }}</p>
              @endif
            </div>

            <div class="formGroup">
              <label>Password *</label>
              {!! Form::password('password', $errors->has('password') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control', 'placeholder' => 'least 8 characters, at least 1 uppercase letter and 1 lowercase letter.']) !!}
              @if ($errors->has('password'))
              <p class="homeForm__error">{{ $errors->first('password') }}</p>
              @endif
            </div>

            <div class="formGroup">
              <label>Confirm Password *</label>
              {!! Form::password('password_confirmation', $errors->has('password_confirmation') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('password_confirmation'))
              <p class="homeForm__error">{{ $errors->first('password_confirmation') }}</p>
              @endif
            </div>

            <hr class="homeForm__hr">

            <div class="formGroup">
              <label>Country/Region *</label>
              {!! Form::text('country', null, $errors->has('country') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('country'))
              <p class="homeForm__error">{{ $errors->first('country') }}</p>
              @endif
            </div>

            <div class="formGroup">
              <label>Address line 1 *</label>
              {!! Form::text('address1', null, $errors->has('address1') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('address1'))
              <p class="homeForm__error">{{ $errors->first('address1') }}</p>
              @endif
            </div>

            <div class="formGroup">
              <label>Address line 2</label>
              {!! Form::text('address2', null, $errors->has('address2') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('address2'))
              <p class="homeForm__error">{{ $errors->first('address2') }}</p>
              @endif
            </div>

            <div class="formGroup">
              <label>Town/City *</label>
              {!! Form::text('city', null, $errors->has('city') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('city'))
              <p class="homeForm__error">{{ $errors->first('city') }}</p>
              @endif
            </div>

            <div class="formGroup">
              <label>County/State/Province</label>
              {!! Form::text('county', null, $errors->has('county') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('county'))
              <p class="homeForm__error">{{ $errors->first('county') }}</p>
              @endif
            </div>

            <div class="formGroup">
              <label>Postal code/Zip *</label>
              {!! Form::text('post', null, $errors->has('post') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
              @if ($errors->has('post'))
              <p class="homeForm__error">{{ $errors->first('post') }}</p>
              @endif
            </div>

            <p class="mt3">By submitting this form, you agree to the terms of our <a href="/privacy" class="linkStyle" target="_blank" rel="noopener noreferrer">Privacy Policy</a> and <a href="/terms" class="linkStyle" target="_blank" rel="noopener noreferrer">Terms of Service.</a></p>

            <div class="formBtn">
              <button class="arrowBtn" type="submit">Create Your Account</button>
            </div>

          {!! Form::close() !!}
        </div>

      </div>
@endsection