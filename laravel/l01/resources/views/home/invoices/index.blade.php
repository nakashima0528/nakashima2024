@extends('layouts.home_app')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">PAYMENT CHECKOUT</li>
    </ol>
@endsection

@section('content')
          <h2>PAYMENT CHECKOUT</h2>
  @if(count($invoices) > 0)

          <ul class="invoiceList">
    @foreach ($invoices as $invoice)
            <li>
              <div class="invoiceList__header">
                <h3><strong>Invoice No.</strong> #{{ $invoice->id }}</h3>
                <label class="invoiceStatus invoiceStatus--{{ $invoice->status }}">{{ config('const.invoice.status_list.'.$invoice->status) }}</label>
              </div>
              <div class="invoiceList__body">
      @php
        $i = 0;
      @endphp      
      @foreach ($invoice->invoiceDetails as $invoiceDetail)

        @php
          $i++;
        @endphp      
        @if ($i < 4)
          @if($invoiceDetail->type == config('const.invoice_details.type.ANY'))

                <p class="invoiceList__bodyText01">{{ $invoiceDetail->name }}</p>
          @else

                <p class="invoiceList__bodyText01">{{ config('const.invoice_details.type_list.'.$invoiceDetail->type) }}</p>
          @endif
        @endif

      @endforeach
      @if($i > 3)
                <p class="invoiceList__bodyText02">and {{ $i - 3 }} more item(s)</p>
      @endif

              </div>
              <div class="invoiceList__footer">
      @if($invoice->paid)

                <time>Paid on {{ Helper::getParcelDate($invoice->paid) }}</time>
      @else

                <p>&nbsp;</p>
     @endif

                {!! Form::open(['route' => ['home.invoice.show'], 'method' => 'post']) !!}
                    {!! Form::hidden('id', $invoice->id) !!}
                    {!! Form::button('Detail', ['type' => 'submit', 'class' => 'arrowBtnEdit']) !!}
                {!! Form::close() !!}
              </div>
            </li>
    @endforeach

          </ul>
  @else

          <p>No invoice is registered.</p>
  @endif

  {!! $invoices->links() !!}

@endsection
