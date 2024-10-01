@extends('layouts.home_app')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">JAPAN ADDRESS</li>
    </ol>
@endsection

@section('content')

          <h2 class="mt3">JAPAN ADDRESS</h2>

  @if(Auth::user()->identity == config('const.check.cd.ON'))
          <h3>Your Japan address for online shopping</h3>
          <div class="homeGrayBox mt1">
            <p>〒106-0045<br>東京都港区麻布十番3丁目7番12－302号<br>JP CONCIERGE ({{ Helper::getAccountNo(Auth::user()->id) }})</p>
          </div>
          <h3 class="mt2">Japanese telephone number to retailers</h3>
          <div class="homeGrayBox mt1">
            <p>070-8935-1286</p>
          </div>
          <div class="homeAddressCaution">
            <h3>Caution</h3>
            <p class="">Please be aware of the following conditions when using Shipping Concierge Service.</p>
            <ul>
              <li>No “cash on delivery” parcels</li>
              <li>No perishable and heat-sensitive items</li>
              <li>No prohibited items, e.g. sprays, perfumes and batteries (Please refer to <a href="https://www.post.japanpost.jp/int/use/restriction/index_en.html" class="linkStyle2" target="_blank" rel="noopener noreferrer">JAPAN POST for further details</a>.)</li>
              <li>No precision instruments</li>
              <li>Disable unattended delivery option</li>
              <li>Customs clearance by the recipient</li>
            </ul>
          </div>
  @else
          <div class="homeGrayFrame">
            <div class="homeCautionMessage">JAPAN ADDRESS will be available when Shipping Concierge Service is used on its own.</div>
            <p class="mt2">For the Shipping Concierge Service used independently, please note that identity verification is a legal requirement in Japan. More information can be found in the <a href="{{ route('home.identity') }}" class="linkStyle">IDENTITY VERIFICATION</a>. Your understanding and cooperation are highly appreciated.<br><br>
            <a href="/pdf/JPCManual.pdf" target="_blank" rel="noopener noreferrer" class="linkStyle">Instructions for use</a> of our services are available at the bottom of the menu.</p>
          </div>
  @endif

@endsection
