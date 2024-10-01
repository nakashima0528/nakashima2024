@extends('admin.layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('users.show', [$user->id]) }}">{{ Helper::getAccountNo($user->id) }}</a>
    </li>
    <li class="breadcrumb-item active">Mail [{{ config('const.infomationmail.template.system_settings.'.$type.'.name') }}]</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
  @if ($errors->any())
      <div class="alert alert-danger">There was a problem processing your request. Please see below.</div>
  @endif
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-envelope fa-lg"></i>
              <strong>Send</strong>
            </div>
            <div class="card-body">
              {!! Form::open(['route' => 'users.mail.send']) !!}
              {!! Form::hidden('user_id', $user->id) !!}

              <!-- Email Field -->
              <div class="form-group col-sm-12">
                  {!! Form::label('email', 'To:') !!}
                  <p>{{ $user->email }}</p>
              </div>

              <!-- Subject Field -->
              <div class="form-group col-sm-12">
                {!! Form::label('subject', 'Subject:') !!}
                {!! Form::text('subject', old('subject', $subject), ['class' => 'form-control']) !!}
              @if ($errors->has('subject'))
                <p class="form-error">{{ $errors->first('subject') }}</p>
              @endif
              </div>
              <!-- Subject Field -->
              <div class="form-group col-sm-12">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::text('salutation', old('salutation', $salutation), ['class' => 'form-control']) !!}
              @if ($errors->has('salutation'))
                <p class="form-error">{{ $errors->first('salutation') }}</p>
              @endif
              </div>
              <!-- Body Field -->
              <div class="form-group col-sm-12">
                {!! Form::textarea('body', old('body', $body), ['class' => 'form-control textarea--M']) !!}
              @if ($errors->has('body'))
                <p class="form-error">{{ $errors->first('body') }}</p>
              @endif
              </div>
              <!-- Sign in Button Field -->
              <div class="form-group col-sm-12">
                {!! Form::label('button', 'Sign in button:') !!}
                {!! Form::checkbox('button', '1', true, ['class' => 'form-control checkbox--M']) !!}
              </div>
              <!-- Footer Field -->
              <div class="form-group col-sm-12">
                {!! Form::label('footer', 'Footer:') !!}
                {!! Form::textarea('footer', old('footer', $footer), ['class' => 'form-control textarea--S']) !!}
              @if ($errors->has('footer'))
                <p class="form-error">{{ $errors->first('footer') }}</p>
              @endif
              </div>

							<!-- Submit Field -->
							<div class="form-group col-sm-12">
                @can(config('const.admin.role.GENERAL'))
								{!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
                @endcan
                <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-secondary">Cancel</a>
							</div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
