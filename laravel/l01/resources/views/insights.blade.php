@extends('layouts.app')
@section('canonical', route('insights'))
@section('title', 'JP CONCIERGE INSIGHTS')
@section('body_class', 'insights headerfix')
@section('ogp')
  <meta property="og:type" content="article">
  <meta property="og:site_name" content="{{ config('const.site_title') }}">
  <meta property="og:title" content="JP CONCIERGE INSIGHTS | {{ config('const.site_title'); }}">
  <meta property="og:description" content="Guidance about JP CONCIERGE INSIGHTS. {{ config('const.site_description'); }}">
  <meta property="og:url" content="{{ route('insights') }}">
  <meta property="og:image" content="{{ config('const.site_url') }}/img/ogp.png">
  <meta name="twitter:card" content="summary_large_image">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="/">TOP</a></li>
      <li class="active">JP CONCIERGE INSIGHTS</li>
    </ol>
@endsection

@section('content')

  <div class="wrap mt3">
    <h1><img src="/img/top/insights.png" alt="JP CONCIERGE INSIGHTS" class="insightsKey01"></h1>
    <p class="mt2">Embark on a personalized journey to discover the essence of local Japan, right from your current location. Our dedicated JP Concierge Team, nestled in central Tokyo, is poised to curate bespoke experiences tailored to your preferences, ensuring an authentic and seamless exploration across Japan.<br><br>We warmly invite you to unlock the full potential of your membership by reaching out to us. There are no admission fees or fixed costs—just the assurance of exceptional service. As a token of our commitment, we're delighted to match prices with any competing service, provided they offer a comparable experience at a more favorable cost. Your satisfaction is our utmost priority, and we eagerly anticipate the opportunity to enhance every aspect of your experience.</p>
  </div>

  <div class="mt70"></div>
  <a id="INSIGHT01"></a>
  <section class="secInsight">
    <div class="wrap">
      <div class="insightBox">
        <img src="/img/insights/insight01.jpg" alt="INSIGHT01" class="insightBox__image">
        <div class="insightBox__text">
          <?php $url = 'https://www.kanko-shakotan.jp/en/'; ?>
          <h2>Shakotan Blue: Hokkaido's Coastal Symphony</h2>
          <p class="insightBox__url"><a href="{{ $url }}" target="_blank" rel="noopener noreferrer">{{ $url }}</a></p>
          
          <div class="insightBox__discripton">
            <p>Dive into Hokkaido's Shakotan Blue—a celestial masterpiece born from the sun's dance, the Sea of Japan, and the natural essence of the land, just an hour from Otaru. Whether strolling its invigorating paths alone or with friends, find joy in each step amidst Hokkaido's summer warmth, being mindful of heatstroke warnings.<br><br>After unraveling the cape's mysteries, savor an extraordinary lunch at a recommended sushi spot with the region's finest libations. Let Shakotan Blue be a journey where nature and culinary delights effortlessly intertwine, creating an unforgettable experience.</p>
          </div>
           <div class="insightBox__button"><a href="{{ $url }}" target="_blank" rel="noopener noreferrer">Visit Website</a></div>
         </div>
      </div>
    </div>
  </section>
  <a id="INSIGHT02"></a>
  <section class="secInsight secInsight--reverse">
    <div class="wrap">
      <div class="insightBox">
        <img src="/img/insights/insight02.jpg" alt="INSIGHT02" class="insightBox__image">
        <div class="insightBox__text">
          <?php $url = 'https://www.shikisainooka.jp/en/'; ?>
          <h2>Biei's Blossoming Canvas: Shikisai-no-oka</h2>
          <p class="insightBox__url"><a href="{{ $url }}" target="_blank" rel="noopener noreferrer">{{ $url }}</a></p>
          <div class="insightBox__discripton">
            <p>Discover the serene beauty of Shikisai-no-oka, the enchanting flower garden nestled in Biei, Hokkaido. Witness its stunning panorama, where hills burst into bloom throughout the year, gracefully avoiding the quietness of the snowy season. Enhance your experience with a leisurely buggy ride—gentle breezes, a myriad of colors, and an unpretentious yet memorable experience anticipate.<br><br>To add comfort and convenience to your journey, let JP Concierge arrange a convenient car service in the area, ensuring your exploration is as comfortable as the natural beauty that surrounds you.</p>
          </div>
          <div class="insightBox__button"><a href="{{ $url }}" target="_blank" rel="noopener noreferrer">Visit Website</a></div>
        </div>
      </div>
    </div>
  </section>
  <a id="INSIGHT03"></a>
  <section class="secInsight">
    <div class="wrap">
      <div class="insightBox">
        <img src="/img/insights/insight03.jpg" alt="INSIGHT03" class="insightBox__image">
        <div class="insightBox__text">
          <?php $url = 'https://www.youtube.com/watch?v=p-ioTDYfdc8'; ?>
          <h2>Unveiling Kyoto's Tranquility: A Journey to Saihoji</h2>
          <p class="insightBox__url"><a href="{{ $url }}" target="_blank" rel="noopener noreferrer">{{ $url }}</a></p>
          <div class="insightBox__discripton">
            <p>Explore Kyoto's hidden enchantments, where serenity weaves through the air, offering a respite from the city's hustle. Immerse yourself in the essence of Kyoto's aesthetics, discovering a subtle connection to your memories or even to your inner self, revealing unexpected wonders.<br>To experience Saihoji Temple, renowned for its moss-covered serenity, an advance reservation ensures the preservation of its tranquil ambiance. Entrust the details to your concierge, and let Saihoji Temple's unique blend of nostalgia and freshness eagerly await your arrival.</p>
          </div>
          <div class="insightBox__button"><a href="{{ $url }}" target="_blank" rel="noopener noreferrer">Watch Video</a></div>
        </div>
      </div>
    </div>
  </section>
  <a id="INSIGHT04"></a>
  <section class="secInsight secInsight--reverse secInsight--last">
    <div class="wrap">
      <div class="insightBox">
        <img src="/img/insights/insight04.jpg" alt="INSIGHT04" class="insightBox__image">
        <div class="insightBox__text">
          <?php $url = 'https://www.youtube.com/watch?v=wgRAm8k0Zz4'; ?>
          <h2>Decoding the Culinary Charm of Japan</h2>
          <p class="insightBox__url"><a href="{{ $url }}" target="_blank" rel="noopener noreferrer">{{ $url }}</a></p>
	  
          <div class="insightBox__discripton">
            <p>Tokyo, boasting the highest number of Michelin-starred restaurants globally, calls to culinary enthusiasts. Ever wondered what makes Tokyo's culinary scene extraordinary?<br><br>Uncover the reasons with JP Concierge, dedicated to securing reservations and expertly navigating exclusive establishments. Though we can't always guarantee reservations, our meticulous preparation boosts the chances even for first-time guests to indulge in Tokyo's culinary wonders. Here's to your unparalleled success on this gastronomic journey through the dynamic metropolis.
</p>
          </div>
          <div class="insightBox__button"><a href="{{ $url }}" target="_blank" rel="noopener noreferrer">Watch Video</a></div>
          
	   </div>
      </div>
    </div>
  </section>

@endsection
