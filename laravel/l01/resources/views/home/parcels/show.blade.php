@extends('layouts.home_app')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">PARCEL INFORMATION</li>
    </ol>
@endsection

@section('content')
          <h2>PARCEL INFORMATION</h2>

          <div class="parcelBox">
            <div class="parcelBox__header">
              <h3><em>Parcel No.</em>#{{ $parcel->id }}</h3><label class="parcelStatus parcelStatus--{{ $parcel->status }}">{{ config('const.parcel.status_list.'.$parcel->status) }}</label>
            </div>
            <p class="parcelDate">Stored on {{ Helper::getParcelDate($parcel->stored) }}</p>
  @if(isset($parcel->invoice->paid) && $parcel->invoice->paid)

            <p class="parcelDate">Under Process on {{ Helper::getParcelDate($parcel->invoice->paid) }}</p>
  @endif
  @if($parcel->shipped)

            <p class="parcelDate">Shipped Parcel on {{ Helper::getParcelDate($parcel->shipped) }}</p>
  @endif
  @if($parcel->reference)

            <p class="parcelDate">Tracking number: {{ $parcel->reference }}</p>
  @endif

  @if(count($parcel->parcelItems) > 0)

            <div class="parcelBox__details">
              <h3>Parcel Details</h3>

              <table class="parcelBox__detailsTable pc">
                <thead>
                  <tr>
                    <th>Description</th>
                    <th>&nbsp;</th>
                    <th>Number of items</th>
                    <th>&nbsp;</th>
                    <th>Value</th>
                  </tr>
                </thead>
                <tbody>
    @foreach ($parcel->parcelItems as $parcelItem)

                  <tr>
                    <td>{{ $parcelItem->name }}</td>
                    <td></td>
                    <td>{{ number_format($parcelItem->quantity) }}</td>
                    <td></td>
                    <td>{{ number_format($parcelItem->value) }} JPY</td>
                  </tr>
    @endforeach

                </tbody>
              </table>
              <table class="parcelBox__detailsTable sp">
                <thead>
                  <tr>
                    <th>Description / Number of items / Value</th>
                  </tr>
                </thead>
                <tbody>
    @foreach ($parcel->parcelItems as $parcelItem)

                  <tr>
                    <td>{{ $parcelItem->name }} / {{ number_format($parcelItem->quantity) }} / {{ number_format($parcelItem->value) }} JPY</td>
                  </tr>
    @endforeach

                </tbody>
              </table>
            </div>
  @else

            <hr class="parcelHt">
  @endif

            <dl class="parcelDl">
              <dt><h3>Address book</h3></dt>
              <dd>
                <p>{{ isset($parcel->address) ? $parcel->address->name : '' }}</p>
                <p class="parcelDl__text01">{{ Helper::getFullAddress($parcel->address) }}</p>
  @if(($parcel->status == config('const.parcel.status.CHANGE') || $parcel->status == config('const.parcel.status.PENDING')) && count($selectAddresses) > 1)

                <button class="chengeAddress" id="chengeAddress" data-parcel="{{ $parcel->id }}" data-address="{{ $parcel->address->id }}">→ Change shipping address</button>
                <div class="homeDialog" id="dialog">
                  <button class="homeDialog__close dialogClose"></button>
                  <p class="homeDialog__text01">Please select the shipping address.</p>
                  <div class="homeCautionMessage mt1">If you change the shipping address set in “Default address”, JP CONCIERGE will reissue the invoice within 2 business days after confirming the new shipping cost.</div>

                  {!! Form::open(['route' => 'home.parcel.update', 'method' => 'patch', 'class' => 'homeForm mt2']) !!}
                    @csrf
                    {!! Form::hidden('id', $parcel->id) !!}
                    {!! Form::hidden('status', config('const.parcel.status.CHANGE')) !!}

                    <div class="formGroup">
                      {!! Form::select('address_id', $selectAddresses, $parcel->address_id, ['class' => 'homeForm__control']) !!}
                    </div>
                    <div class="homeDialog__box01">
                      <button class="homeDialog__button" type="submit">Yes</button>
                      <button class="homeDialog__button homeDialog__button--no dialogClose" type="button">No</button>
                    </div>
                    <p class="mt2 align-center"><a href="{{ route('home.addresses') }}" class="arrowLink" >Click here to edit ADDRESS BOOK</a></p>
                  {!! Form::close() !!}

                </div>
    @push('css')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @endpush
    @push('scripts')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
    $(function(){
      $("#dialog").dialog({
        autoOpen: false,
        modal: true,
        draggable: true,
        width: Math.min(910, $(window).width() * .92),
        maxWidth: 910,
        height: 'auto',
        resizable: true,
      });
      $("#chengeAddress").on("click", function() {
        $("#dialog").dialog("open");
      });
      $(".dialogClose").on("click", function() {
        $("#dialog").dialog("close");
      });
    });
  </script>
    @endpush

  @endif

              </dd>
            </dl>
            <dl class="parcelDl">
              <dt><h3>Free storage</h3></dt>
              <dd>
                <p>{{ config('const.scs.freestrage') }} days</p>
              </dd>
            </dl>
            <dl class="parcelDl">
              <dt><h3>Additional storage days</h3></dt>
              <dd>
                <p>{{ number_format($parcel->additional) }} days</p>
              </dd>
            </dl>
            <dl class="parcelDl">
              <dt><h3>Weight</h3></dt>
              <dd>
                <p>{{ number_format($parcel->weight) }} g</p>
              </dd>
            </dl>
  @if(isset($parcel->invoice) && $parcel->invoice->status > config('const.invoice.status.PREPARING'))
            <div class="parcelBox__button">
              {!! Form::open(['route' => ['home.invoice.show'], 'method' => 'post']) !!}
                {!! Form::hidden('id', $parcel->invoice->id) !!}
                {!! Form::button('Invoice', ['type' => 'submit', 'class' => 'arrowBtn']) !!}
              {!! Form::close() !!}
            </div>
  @endif
             <p class="mt3">Customs will be presented with the "Value" shown in the Parcel Details. <a href="{{ route('home.contact') }}" class="linkStyle">Please feel free to contact us</a> if you wish to declare your own customs value in JPY or have any other requests.</p>

          </div>
@endsection
