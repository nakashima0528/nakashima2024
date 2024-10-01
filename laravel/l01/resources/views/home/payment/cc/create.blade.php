@extends('layouts.home_app')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">MYPAGE TOP</a></li>
      <li><a href="{{ route('home.payment') }}">PAYMENT METHOD</a></li>
      <li class="active">ADD A CREDIT CARD</li>
    </ol>
@endsection

@section('content')
          <!--h2>ADD A CREDIT CARD</h2-->

          <h3>Please enter your credit card details.</h3>
  @if (session('errors'))
          <div class="alert alert-danger" role="alert">
            {{ session('errors') }}
          </div>
  @endif

          <img src="/img/home/cc.png" class="registerableCC mt3" alt="Registerable credit card">

          <form action="{{route('home.payment.cc.store')}}" class="homeForm" id="form_payment" method="POST">
            @csrf
            <div class="formGroup">
              <label for="name">Name on card</label>
              <input type="text" name="cardName" id="cardName" class="homeForm__control" value="" placeholder="Name">
            </div>

            <div class="formGroup">
              <label for="name">Card number</label>
              <div id="cardNumber" class="homeForm__control"></div>
            </div>

            <div class="formGroup">
              <label for="name">Expiry date</label>
              <div id="expiration" class="homeForm__control"></div>
            </div>

            <div class="formGroup">
              <label for="name">CVC (Security code)</label>
              <div id="securityCode" class="homeForm__control"></div>
            </div>

            <div class="formBtn">
              <button type="submit" id="create_token" class="arrowBtn">Add A Credit Card</button>
            </div>
          </form>
@endsection

@push('scripts')
  <script src="https://js.stripe.com/v3/"></script>
  <script>
      var stripe_public_key = '<?= config('const.stripe_public_key') ?>';
  </script>
  <script src="{{asset('js/payment.js')}}"></script>
@endpush
