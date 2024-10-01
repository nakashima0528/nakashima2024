@extends('layouts.home_app')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">PAYMENT CHECKOUT</li>
    </ol>
@endsection

@section('content')
          <h2>PAYMENT CHECKOUT</h2>

          <div class="parcelBox">
            <div class="parcelBox__header">
              <h3><em>Invoice No.</em>#{{ $invoice->id }}</h3><label class="invoiceStatus invoiceStatus--{{ $invoice->status }}">{{ config('const.invoice.status_list.'.$invoice->status) }}</label>
            </div>
  @if(isset($parcel))
            {!! Form::open(['route' => ['home.parcel.show'], 'method' => 'post']) !!}
              {!! Form::hidden('id', $parcel->id) !!}
              {!! Form::button('Parcel No. #'.$parcel->id, ['type' => 'submit', 'class' => 'arrowBtnLink']) !!}
            {!! Form::close() !!}

            <hr class="parcelHt">
  @endif

            <p class="parcelDate">Issued on {{ Helper::getParcelDate($invoice->issued) }}</p>
            <p class="parcelDate">Payment due by {{ Helper::getPaymentDueDate($invoice->issued) }}</p>
  @if($invoice->paid)

            <p class="parcelDate">Paid on {{ Helper::getParcelDate($invoice->paid) }}</p>
  @endif

            <hr class="parcelHt">
  @if($invoice->type == config('const.invoice.type.SCS'))
            
            <dl class="parcelDl">
              <dt><h3>Additional storage charge</h3></dt>
              <dd>
                <p>{{ number_format(Helper::findInvoiseDetail($invoice->invoiceDetails,config('const.invoice_details.type.STORAGE'))) }} JPY ({{ Helper::findInvoiseDetailName($invoice->invoiceDetails,config('const.invoice_details.type.STORAGE')) }})</p>
              </dd>
            </dl>

            <dl class="parcelDl">
    @if($invoice->status == config('const.invoice.status.PENDING'))

@php
$shipments = config('const.shipment.list');
if(!$parcel->other_postage){
  array_splice($shipments,2,1); // OTHERE削除
}
@endphp

              <dt class="shippingSelectDt">
                <h3>Shipping cost</h3>
                {!! Form::open(['route' => ['home.parcel.sipping'], 'method' => 'patch', 'id' => 'shipmentSelectForm']) !!}
                  {!! Form::hidden('invoice_id', $invoice->id) !!}
                  {!! Form::select('shipment', $shipments, $parcel->shipment, ['id' => 'shipmentSelect']) !!}
                {!! Form::close() !!}
              </dt>
              <dd>
                <p><span>{{ number_format(Helper::findInvoiseDetail($invoice->invoiceDetails,config('const.invoice_details.type.SHIPPING'))) }}</span> JPY  (Please select your desired shipping cost.) </p>
              </dd>
      @push('scripts')
  <script type="text/javascript">
    $(function(){
      $('#shipmentSelect').change(function () {
        $('#shipmentSelectForm').submit();
      });
    });
  </script>
      @endpush
    @else

              <dt><h3>Shipping cost</h3></dt>
              <dd>
                <p><span>{{ number_format(Helper::findInvoiseDetail($invoice->invoiceDetails,config('const.invoice_details.type.SHIPPING'))) }}</span> JPY</p>
              </dd>
    @endif

            </dl>

            <dl class="parcelDl">
              <dt><h3>Shipping concierge service fee</h3></dt>
              <dd>
                <p><span>{{ number_format(Helper::findInvoiseDetail($invoice->invoiceDetails,config('const.invoice_details.type.SCS'))) }}</span> JPY</p>
              </dd>
            </dl>

    @foreach($invoice->invoiceDetails as $invoiceDetail)
      @if($invoiceDetail->type == config('const.invoice_details.type.ANY'))
            <dl class="parcelDl">
              <dt><h3>{{ $invoiceDetail->name }}</h3></dt>
              <dd>
                <p><span>{{ number_format($invoiceDetail->value) }} JPY</p>
              </dd>
            </dl>
      @endif
    @endforeach

  @else
    @foreach($invoice->invoiceDetails as $invoiceDetail)

            <dl class="parcelDl">
              <dt><h3>{{ $invoiceDetail->name }}</h3></dt>
              <dd>
                <p><span>{{ number_format($invoiceDetail->value) }} JPY</p>
              </dd>
            </dl>
    @endforeach
  @endif

            <div class="totalPaymentBox"><label>Total payment</label><em>{{ number_format(Helper::getTotlePayment($invoice->invoiceDetails)) }}</em> JPY</div>  

  @if($invoice->status == config('const.invoice.status.PENDING'))

            <div class="parcelBox__button">
              {!! Form::open(['route' => ['home.invoice.select'], 'method' => 'post']) !!}
                {!! Form::hidden('id', $invoice->id) !!}
                {!! Form::button('CHECKOUT SECURELY', ['type' => 'submit', 'class' => 'arrowBtn']) !!}
              {!! Form::close() !!}
            </div>
  @endif

          </div>

  @if($invoice->method == config('const.invoice.method.WISE'))

    @include('home.invoices.wise.account')
  
  @endif

@endsection
