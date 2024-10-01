@extends('layouts.home_app')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">PAYMENT METHOD</li>
    </ol>
@endsection

@section('content')
          <h2>PAYMENT METHOD</h2>

          <h3 class="paymentTitle">Credit Card</h3>
  @isset($defaultCard)

        <div class="paymentCcBox01">{{ $defaultCard["number"] }}</div>
          <div class="paymentCcBox02">
            <button class="arrowBtnEdit arrowBtnDel">Delete</button>
            <a href="{{ route('home.payment.cc.create') }}" class="arrowBtnEdit">Change</a>
          </div>

          <div class="homeDialog" id="dialog">
            <button class="homeDialog__close dialogClose"></button>
            <p class="homeDialog__text01">If you want to remove this card, please select Yes.</p>
            {!! Form::open(['route' => ['home.payment.cc.destroy'], 'method' => 'post']) !!}
              @csrf
              <div class="homeDialog__box01">
                <button class="homeDialog__button" type="submit">Yes</button>
                <button class="homeDialog__button homeDialog__button--no dialogClose" type="button">No</button>
              </div>
            {!! Form::close() !!}

          </div>
  @else

          <div class="paymentCcBox03">
            <a href="{{ route('home.payment.cc.create') }}" class="arrowBtn">Proceed To Add A Credit Card</a>
          </div>
  @endif

          <h3 class="paymentTitle mt3"><img src="/img/home/logo_wise.png" class="logoWise"></h3>
          <p>If you would like to use 'Wise' as your payment method, the recipient information will be displayed during the <a href="{{ route('home.invoices') }}" class="linkStyle">PAYMENT CHECKOUT</a>.</p>

@endsection

@push('css')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@push('scripts')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
    $(function() {
      $("#dialog").dialog({
        autoOpen: false,
        modal:true,
        draggable:true,
        height:'auto',
        width: 910,
        resizable:true,
      });
      $(".arrowBtnDel").on("click", function() {
        $("#dialog").dialog("open");
      });
      $(".dialogClose").on("click", function() {
        $("#dialog").dialog("close");
      });
    } );
  </script>
@endpush
