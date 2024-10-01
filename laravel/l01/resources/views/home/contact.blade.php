@extends('layouts.home_app')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">CONTACT JP CONCIERGE</li>
    </ol>
@endsection

@section('content')
          <h2>CONTACT JP CONCIERGE</h2>

          <p>The JP Concierge Team is dedicated to providing personalized and timely assistance during our service hours (Monday to Friday, 9:00 am to 5:00 pm, UTC+9). For efficient responses, please ensure your messages contain specific details, such as a URL if necessary. Sharing budget details allows us to offer tailored assistance.<br>If you find our emails in your spam folder, kindly mark them 'Not spam' to receive important updates. Thank you for considering our services.</p>

          <p class="mt2">* indicates a required field.</p>
          @if ($errors->any())
          <div class="errorMessage">There was a problem processing your request. Please see below.</div>
          @endif

          {!! Form::open(['route' => ['home.contact'], 'method' => 'post', 'class' => 'homeForm mt3', 'files' => true]) !!}
            @csrf
            <div class="formGroup">
              <label>Subject *</label>
              {!! Form::select('subject', config('const.contact.subject.list'), null, $errors->has('subject') ? ['class' => 'homeForm__control is-invalid','placeholder' => 'Please select'] : ['class' => 'homeForm__control','placeholder' => 'Please select']) !!}
  @if ($errors->has('subject'))
              <p class="homeForm__error">{{ $errors->first('subject') }}</p>
  @endif

            </div>
            <div class="formGroup">
              <label>Comments/message *</label>
              {!! Form::textarea('message', null, $errors->has('message') ? ['class' => 'homeForm__control is-invalid'] : ['class' => 'homeForm__control']) !!}
  @if ($errors->has('message'))
              <p class="homeForm__error">{{ $errors->first('message') }}</p>
  @endif

            </div>
            <div class="formGroup">
              <label>Attach a file ( pdf, jpg, gif, png )</label>
              <div class="formGroup__box01">
                {!! Form::text('', null, $errors->has('attach') ? ['class' => 'homeForm__control is-invalid attachText','id' => 'attachText'] : ['class' => 'homeForm__control attachText','id' => 'attachText']) !!}
                <button class="attachBtn" id="attachBtn" type="button">Attach a file</button>
              </div>
              {!! Form::file('attach', ['class' => 'homeForm__control attachFile', 'id'=>'attachFile']) !!}
  @if ($errors->has('attach'))
              <p class="homeForm__error">{{ $errors->first('attach') }}</p>
  @endif

            </div>
            <div class="formBtn">
              <button class="arrowBtn" type="submit">Submit</button>
            </div>
          {!! Form::close() !!}
@endsection

@push('scripts')
  <script type="text/javascript">
    $(function(){
      $('#attachFile').on('change', function () {
        var file = $(this).prop('files')[0];
        $('#attachText').val(file.name);
      });
      $('#attachText').on('click', function () {
        $('#attachFile').trigger("click");
      });
      $('#attachBtn').on('click', function () {
        $('#attachFile').trigger("click");
      });
    });
  </script>
@endpush
