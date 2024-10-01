@extends('layouts.app')
@section('canonical', config('const.site_url'))
@section('title', 'Discover Japan with JP Concierge: Personalized Hospitality and Shipping Solutions')
@section('header', 'JP CONCIERGE, A Japanese Hospitality Service For You | Register to find out more')
@section('body_class', 'top headerfix')
@section('ogp')
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="{{ config('const.site_title') }}">
  <meta property="og:title" content="Discover Japan with JP Concierge: Personalized Hospitality and Shipping Solutions">
  <meta property="og:description" content="{{ config('const.site_description'); }}">
  <meta property="og:url" content="{{ config('const.site_url') }}">
  <meta property="og:image" content="{{ config('const.site_url') }}/img/ogp.png">
  <meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')
  <div id="loading">
    <div id="animation">
      <img src="/img/top/loading.gif" alt="loading">
    </div><!-- #animation -->
  </div><!-- #loading -->

  <section class="secTopMain swiper">
    <ul class="mainSlider swiper-wrapper">
      <li class="swiper-slide">
        <picture class="image">
          <source srcset="/img/top/slide01sp.jpg" media="(max-width: 767px)">
          <img src="/img/top/slide01.jpg" alt="Slide01">
        </picture>
        <picture class="key01">
          <source srcset="/img/top/main01sp.png" media="(max-width: 767px)">
          <img src="/img/top/main01.png" alt="The spellbinding experiences with JP CONCIERGE">
        </picture>
      </li>
      <li class="swiper-slide">
        <picture class="image">
          <source srcset="/img/top/slide02sp.jpg" media="(max-width: 767px)">
          <img src="/img/top/slide02.jpg" alt="Slide02">
        </picture>
        <picture class="key02">
          <source srcset="/img/top/main02sp.png" media="(max-width: 767px)">
          <img src="/img/top/main02.png" alt="Shipping… Personal… A variety of arrangements by the foremost experts at your service">
        </picture>
      </li>
      <li class="swiper-slide">
        <picture class="image">
          <source srcset="/img/top/slide03sp.jpg" media="(max-width: 767px)">
          <img src="/img/top/slide03.jpg" alt="Slide03">
        </picture>
        <picture class="key03">
          <source srcset="/img/top/main03sp.png" media="(max-width: 767px)">
          <img src="/img/top/main03.png" alt="JP CONCIERGE is a Japanese hospitality service for you">
        </picture>
      </li>
    </ul>
  </section>

  <section class="secService">
    <div class="wrapL">
      <div class="secService__box01">
        <div>
          <h2 class="secService__iamge01"><img src="/img/top/personal.png" alt="PERSONAL CONCIERGE SERVICE"></h2>
          <p class="topText">Personal Concierge Service is an on-demand hospitality for Japan no matter where you may be. Our team can make a variety of arrangements on your behalf such as proxy buying, travel assistance, and problem solving at your service. For private use, we offer to create an experience that is as individual as you are, while our team can also assist to lower costs and burdens associated with business arrangements in Japan.<br><br>
            <a href="{{ url('/login') }}">The service fee will be calculated according to a concierge rate per hour</a>, which is pragmatic, valuable and considerate.</p> 
        </div>
        <div>
          <h2 class="secService__iamge02"><img src="/img/top/shipping.png" alt="SHIPPING CONCIERGE SERVICE"></h2>
          <p class="topText">Shipping Concierge Service is a parcel forwarding service matched with Japanese hospitality to anywhere you wish across the world. Perhaps you know exactly what you wish to buy online in Japan, but need a local address and some assistance for shipment.<br><br>
            There will be a transparent, per parcel <a href="https://www.post.japanpost.jp/cgi-charge/index.php?lang=_en" target="_blank" rel="noopener noreferrer">shipping charge applied by Japan Post</a> (EMS or SAL) depending on  the country/region of destination and shipping conditions in addition to a <a href="{{ url('/login') }}">service fee based on weight of the parcel from 500 JPY.</a><br>Other couriers such as DHL, FedEx and UPS are also available upon request.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="secInsights">
    <div class="wrap">
      <h2 class="secInsights__box">
        <picture>
          <source srcset="/img/top/insights@sp.png" media="(max-width: 767px)">
          <img src="/img/top/insights.png" alt="JP CONCIERGE INSIGHTS">
        </picture>
      </h2>
      <p class="topText">At JP Concierge, we transcend conventional service boundaries, embodying Japanese hospitality as seasoned creators of unparalleled experiences. We transform inconveniences and craft moments that exceed expectations. Our expertise is harnessed to magnify the sense of liberty and pleasure in every experience.<br><br>We cultivate relationships anchored in trust. JP Concierge surpasses the notion of mere service—we operate as partners, seamlessly aligning with the discerning aspirations of our clientele.<br><br>Discover hospitality that goes beyond the ordinary, where every detail reflects our commitment to creating unforgettable experiences. JP Concierge is your partner in crafting joyful and lasting memories in every facet of your Japan experience.</p>
    </div>
    <div class="wrapL">
      <ul class="secInsights__list">
        <li>
          <a href="{{ url('/insights') }}#INSIGHT01">
            <img src="/img/insights/insight01_thum.jpg" alt="INSIGHT01" loading="lazy">
            <h3>Hokkaido's Coastal Symphony</h3>
          </a>
        </li>
        <li>
          <a href="{{ url('/insights') }}#INSIGHT02">
            <img src="/img/insights/insight02_thum.jpg" alt="INSIGHT02" loading="lazy">
            <h3>Blossoming Canvas:<br>Shikisai-no-oka</h3>
          </a>
        </li>
        <li>
          <a href="{{ url('/insights') }}#INSIGHT03">
            <img src="/img/insights/insight03_thum.jpg" alt="INSIGHT03" loading="lazy">
            <h3>The Moss Temple</h3>
          </a>
        </li>
        <li>
          <a href="{{ url('/insights') }}#INSIGHT04">
            <img src="/img/insights/insight04_thum.jpg" alt="INSIGHT04" loading="lazy">
            <h3>Decoding the Culinary Charm of Japan</h3>
          </a>
        </li>
      </ul>
      <div class="secInsights__box01">
        <a href="{{ url('/insights') }}">View Details</a>
      </div>
    </div>
  </section>

  <section class="secTourism">
    <div class="wrapL">
      <div class="secTourism__box">
        <div class="secTourism__box01">
          <img src="/img/top/map.png" alt="Map of Japan" loading="lazy">
        </div>
        <div class="secTourism__box02">
          <img src="/img/top/tourism.png" alt="Official Japan Tourism Resourse Directory" class="secTourism__key" loading="lazy">
          <p class="mt3">JP Concierge is your trusted partner in Japan, committed to catering to the needs of international guests. Our introduced Official Japan Tourism Resources Directory serves as an invaluable shortcut, offering essential guidance for your journey directly from official channels.</p>
          <div class="secTourism__link">
            <a href="{{ route('tourism') }}">View Details</a>
          </div>
        </div>
      </div>
    </div>
    <div class="secTourism__slide tourism_swiper">
      <ul class="tourismSlider swiper-wrapper">
        <li class="swiper-slide"><img src="/img/top/tourism_slide01.webp" alt="tourism_slide01" loading="lazy"></li>
        <li class="swiper-slide tourismSlider__tourismSlider"><img src="/img/top/tourism_slide02.webp" alt="tourism_slide02" loading="lazy"></li>
        <li class="swiper-slide"><img src="/img/top/tourism_slide03.webp" alt="tourism_slide03" loading="lazy"></li>
        <li class="swiper-slide tourismSlider__tourismSlider"><img src="/img/top/tourism_slide04.webp" alt="tourism_slide04" loading="lazy"></li>
        <li class="swiper-slide"><img src="/img/top/tourism_slide05.webp" alt="tourism_slide05" loading="lazy"></li>
        <li class="swiper-slide tourismSlider__tourismSlider"><img src="/img/top/tourism_slide06.webp" alt="tourism_slide06" loading="lazy"></li>
        <li class="swiper-slide"><img src="/img/top/tourism_slide07.webp" alt="tourism_slide07" loading="lazy"></li>
        <li class="swiper-slide tourismSlider__tourismSlider"><img src="/img/top/tourism_slide08.webp" alt="tourism_slide08" loading="lazy"></li>
      </ul>
    </div>
  </section>

  <section class="secAbout">
    <div class="wrapL">
      <div class="secAbout__box01">
        <h2 class="secAbout__box02">
          <picture>
            <source srcset="/img/top/about@sp.png" media="(max-width: 767px)">
            <img src="/img/top/about.png" alt="ABOUT JP CONCIERGE">
          </picture>
        </h2>
        <p class="topText">JP Concierge is your portal to Japan's diverse experiences, no matter where you are. Founded by a team dedicated to hospitality, our mission is to provide comfort and convenience to international guests seeking the best of Japan.<br><br>
In 2020, amidst the unprecedented challenges posed by the global pandemic, our team began laying the foundation for JP Concierge. Leveraging our experiences and insights, we refined our expertise and deepened our understanding of the diverse needs of international guests. This culminated in the registration of passage LLC (Corporate Number: 3010403028626) as a company, with a registered office at 6F Aoyama Marutake Building, 3-1-36 Minami Aoyama, Minato-ku Tokyo.<br><br>
In October 2022, we introduced JP Concierge—an online platform designed to connect individuals worldwide with the wonders of Japan. Under the leadership of Eri SETO, an adroit business consultant with a background in international financial services, who pursued further studies in hospitality at <a href="https://www.glion.edu/" target="_blank" rel="noopener noreferrer">GIHE</a>, we set out to offer two main services: Personal Concierge Service, providing assistance with travel arrangements, reservations, and recommendations; and Shipping Concierge Service, facilitating hassle-free shipping of goods from Japan to anywhere in the world.</p>


        <div class="secAbout__box03">
          <img src="/img/top/EriSeto.png" alt="Eri SETO">
          <p>Eri SETO<br>Founder of passage LLC</p>
        </div>
      </div>
    </div>
  </section>

  <section class="secLink">
    <div class="wrap">
      <a href="{{ url('/login') }}" class="linkSignIn">Sign In</a>
      <a href="{{ url('/register') }}" class="linkRegister">Register</a>
    </div>
  </section>

@endsection

@push('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
@endpush
@push('scripts')
  <script src="/js/loading.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8.3.1/swiper-bundle.min.js"></script>
  <script>

    const swiper_main = new Swiper(".swiper", {
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      speed: 2000,
      effect: "fade",
    });

    const swiper_tourism = new Swiper(".tourism_swiper", {
      loop: true, // ループ有効
      slidesPerView: 1.5, // 一度に表示する枚数
      spaceBetween: 80,
      speed: 6000, // ループの時間
      allowTouchMove: false, // スワイプ無効
      autoplay: {
        delay: 0, // 途切れなくループ
      },
      breakpoints: {
        800: {
          slidesPerView: 3,
          spaceBetween: 100,
        },
        1000: {
          slidesPerView: 3.5,
          spaceBetween: 100,
        },
        1200: {
          slidesPerView: 4,
          spaceBetween: 100,
        },
        1400: {
          slidesPerView: 4.5,
          spaceBetween: 100,
        },
        1600: {
          slidesPerView: 5,
          spaceBetween: 100,
        }
      }     
    });
  </script>
@endpush