@extends('layouts.home_app')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li class="active">Home</li>
    </ol>
@endsection

@section('content')

          <div class="homeBanner">
            <img src="/img/home/banner01.png" alt="For 3 parcels, up to 10 kg per parcel"> 
            <img src="/img/home/banner02.png" alt="For 4 parcels, up to 30 kg per parcel"> 
          </div>
          <p class="contactLink mt2"><a href="{{ route('home.contact') }}">For a 25% OFF SERVICE PLUS voucher, please contact JP CONCIERGE.</a></p>

          <div class="homeService mt3">
          <a href="{{ route('home.pcs') }}" class="homeService__personal"><img src="/img/home/personal.png" alt="PERSONAL CONCIERGE SERVICE"></a>
            <a href="{{ route('home.scs') }}" class="homeService__shipping"><img src="/img/home/shipping.png" alt="SHIPPING CONCIERGE SERVICE"></a>
          </div>
          <h2 class="mt3">News & Information</h2>
          <ul class="homeNewsList">
            <li>
              <time>2024.05.20</time>
              <p>We're boosting online transaction security as required by the Japanese government. Soon, you can enable 3D Secure for smoother, more secure payments.</p>
            </li>
            <li>
              <time>2024.05.20</time>
              <p>The Official Japan Tourism Resources Directory is Now Available. The first release covers Hokkaido, Tokyo, Kyoto, Osaka, and Okinawa, with more prefectures to be added soon.</p>
            </li>
           <!-- <li>
              <time>2024.01.24</time>
              <p>This is dummy text. Here is the text for the announcement.</p>
            </li> -->
          </ul>

          <div class="homeVipBanner">
            <a href="{{ route('home.vip') }}" class="linkHover">
              <picture class="image">
                <source srcset="/img/home/banner_vip@sp.png" media="(max-width: 767px)">
                <img src="/img/home/banner_vip.png" alt="VIP BANNER">
              </picture>
            </a>
          </div>

@endsection
