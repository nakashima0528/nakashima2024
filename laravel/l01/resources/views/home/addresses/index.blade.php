@extends('layouts.home_app')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">ADDRESS BOOK</li>
    </ol>
@endsection

@section('content')
          <h2>ADDRESS BOOK</h2>
  @if(Auth::user()->identity == config('const.check.cd.ON'))
          <dl class="addressBox addressBox--current">
            <dt><label>Address book name：</label><span>{{ $currentAddress->name }}</span></dt>
            <dd>
              <p class="fwb">{{ $currentAddress->recipient }}</p>
              <p>{{ Helper::getFullAddress($currentAddress) }}</p>
            </dd>
    @if($currentAddress->default == config('const.check.cd.ON'))				
            <label class="addressBox__default"></label>
    @endif
          </dl>
          <p>To change Current Address in case that you move to a new place, please <a href="{{ route('home.contact') }}" class="linkStyle">CONTACT JP CONCIERGE</a> and you will be  asked to complete identity verification by submitting a copy of your new official document(s).</p>
    @if($currentAddress->default == config('const.check.cd.OFF'))
          {!! Form::open(['route' => ['home.address.default'], 'method' => 'post']) !!}
            {!! Form::hidden('id', $currentAddress->id) !!}
            {!! Form::button('Set Default address', ['type' => 'submit', 'class' => 'arrowLink mt1']) !!}
          {!! Form::close() !!}
    @endif
  @else
          <div class="homeGrayFrame">
            <div class="homeCautionMessage">Current address is suspended due to a process of identity verification.</div>
            <p class="mt2">JP CONCIERGE will activate your current address on ADDRESS BOOK as soon as the process is completed.<br><br>
            If you prefer proxy buying, identity verification is NOT required. Please simply add new shipping addresses and set one as default address where the parcel will be delivered.</p>
          </div>
  @endif
          <div class="formBtn">
             <a href="{{ route('home.address.create') }}" class="arrowBtn">Add A New Shipping Address</a>
          </div>
          <p class="align-center mt1">Up to 5 shipping addresses can be registered.</p>

          <div class="addressSippingAddresses">
  @foreach($sippingAddresses as $address)
            <dl class="addressBox">
              <dt><label>Address book name：</label><span>{{ $address->name }}</span></dt>
              <dd>
                <p class="fwb">{{ $address->recipient }}</p>
                <p>{{ Helper::getFullAddress($address) }}</p>
              </dd>
    @if($address->default == config('const.check.cd.ON'))				
              <label class="addressBox__default"></label>
    @endif
            </dl>
            <div class="addressBox2">
              <div class="addressBox2__default">
    @if($address->default == config('const.check.cd.OFF'))
              {!! Form::open(['route' => ['home.address.default'], 'method' => 'post']) !!}
                {!! Form::hidden('id', $address->id) !!}
                {!! Form::button('Set Default address', ['type' => 'submit', 'class' => 'arrowLink']) !!}
              {!! Form::close() !!}
    @endif
              </div>
              <div class="addressBox2__button">
                <button class="arrowBtnEdit arrowBtnDel" data-id="{{ $address->id }}">Delete</button>
                <a href="{{ route('home.address.edit',$address->id) }}" class="arrowBtnEdit">Edit</a>
              </div>
            </div>
  @endforeach					
          </div>

          <div class="homeDialog" id="dialog">
            <button class="homeDialog__close dialogClose"></button>
            <p class="homeDialog__text01">If you want to remove this shipping address, please select Yes.</p>

            {!! Form::open(['route' => ['home.address.destroy'], 'method' => 'delete']) !!}
              @csrf
              <input type="hidden" name="id" id="addressId">

              <div class="homeDialog__box01">
                <button class="homeDialog__button" type="submit">Yes</button>
                <button class="homeDialog__button homeDialog__button--no dialogClose" type="button">No</button>
              </div>
            {!! Form::close() !!}

          </div>

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
        width:910,
        resizable:true,
      });
      $(".arrowBtnDel").on("click", function() {
        $("#dialog").dialog("open");
        $("#addressId").val($(this).data('id'));
      });
      $(".dialogClose").on("click", function() {
        $("#dialog").dialog("close");
      });
    } );
  </script>
@endpush
