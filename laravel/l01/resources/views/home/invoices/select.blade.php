@extends('layouts.home_app')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">PAYMENT CHECKOUT</li>
    </ol>
@endsection

@section('content')
          <h2>Invoice #{{ $invoice->id }}</h2>

          <h3>Please select a payment method.</h3>

          <form action="{{route('home.invoice.proceed')}}" class="homeForm" id="homeForm" method="POST" onSubmit="return befoerProceed();">
            @csrf
            {!! Form::hidden('id', $invoice->id) !!}
            <div class="homeBox01">
              <div class="formGroup">
                <label>Wise</label>
                <label for="method01">
                  <input type="radio" name="method" id="method01" value="{{ config('const.invoice.method.WISE') }}" checked>
                  <span for="method01" class="methodWise"><img src="/img/home/logo_wise.png" class="logoWise"></span>
                </label>

              </div>
              <div class="formGroup">
                <label>Credit Card</label>
  @isset($defaultCard)
                <input type="hidden" name="error_message" id="error_message">
                <input type="hidden" name="payment_id" id="payment_id">
                <label for="method02">
                  <input type="radio" name="method" id="method02" value="{{ config('const.invoice.method.STRIPE') }}">
                  <span for="method02" class="methodCC">{{ $defaultCard["number"] }}</span>
                </label>
  @else

                <p>No credit card details have been added. Kindly add your credit card information through the <a href="{{ route('home.payment') }}" class="linkStyle">PAYMENT METHOD</a>.</p>
  @endif

              </div>
            </div>
            <div class="formBtn">
              <button type="submit" class="arrowBtn">Proceed with this payment method.</button>
            </div>
          </form>
@endsection


@push('scripts')
  <script src="https://js.stripe.com/v3/"></script>
  <script>

      function befoerProceed() {

        // wise
        if(document.getElementById("method01").checked){
          return true;
        }

        var stripe_public_key = '<?= config('const.stripe_public_key') ?>';
        const stripe = Stripe(stripe_public_key);
        stripe
          .confirmCardPayment('{{ $client_secret }}')
          .then(function(result) {
            if (result.error) {
              document.getElementById("error_message").value = result.error.message;
            }else{
              document.getElementById("payment_id").value = result.paymentIntent.id;
            }
            document.getElementById("homeForm").submit();
       });
        return false;
      }

  </script>
@endpush
