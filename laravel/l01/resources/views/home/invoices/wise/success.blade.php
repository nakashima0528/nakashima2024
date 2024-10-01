@extends('layouts.home_app')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">MYPAGE TOP</a></li>
      <li class="active">PAYMENT CHECKOUT</li>
    </ol>
@endsection

@section('content')
          <h2>Invoice #{{ $invoice->id }}</h2>

          <p class="titleMessage">Payment with 'Wise' has been selected.</p>

          @include('home.invoices.wise.account')
@endsection

