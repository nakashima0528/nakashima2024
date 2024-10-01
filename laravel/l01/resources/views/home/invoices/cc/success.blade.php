@extends('layouts.home_app')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">MYPAGE TOP</a></li>
      <li class="active">PAYMENT CHECKOUT</li>
    </ol>
@endsection

@section('content')
          <h2>Invoice #{{ $invoice->id }}</h2>

          <p class="titleMessage">Payment has been processed successfully.</p>
          <div class="align-center mt3">
            <a href="{{ route('home.invoices') }}" class="arrowBtn">PAYMENT CHECKOUT</a>
          </div>
@endsection

