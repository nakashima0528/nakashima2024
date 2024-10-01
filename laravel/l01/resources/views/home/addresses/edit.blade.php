@extends('layouts.home_app')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">ADDRESS BOOK</li>
    </ol>
@endsection

@section('content')
          <h2>ADDRESS BOOK</h2>
          <p class="textGray">* indicates a required field.</p>
  @if ($errors->any())
          <div class="errorMessage">There was a problem processing your request. Please see below.</div>
  @endif

          {!! Form::model($address, ['route' => 'home.address.update', 'method' => 'patch', 'class' => 'homeForm mt2']) !!}

            {!! Form::hidden('id', $address->id) !!}
            @include('home.addresses.fields')

          {!! Form::close() !!}

@endsection