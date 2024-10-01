@extends('layouts.app')
@section('canonical', route('tourism'))
@section('title', 'Official Japan Tourism Resources Directory')
@section('body_class', 'tourism headerfix')
@section('ogp')
  <meta property="og:type" content="article">
  <meta property="og:site_name" content="{{ config('const.site_title') }}">
  <meta property="og:title" content="Official Japan Tourism Resources Directory | {{ config('const.site_title'); }}">
  <meta property="og:description" content="Guidance about Official Japan Tourism Resources Directory. {{ config('const.site_description'); }}">
  <meta property="og:url" content="{{ route('tourism') }}">
  <meta property="og:image" content="{{ config('const.site_url') }}/img/ogp.png">
  <meta name="twitter:card" content="summary_large_image">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
  @auth
      <li><a href="{{ route('home') }}">Home</a></li>

  @else

      <li><a href="/">TOP</a></li>
  @endauth 

      <li class="active">Official Japan Tourism Resources Directory</li>
    </ol>
@endsection

@section('content')

  <section class="secTourist">
    <div class="wrap">
      <h1>
        <picture>
          <source srcset="/img/tourism/tourism@sp.png" media="(max-width: 767px)">
          <img src="/img/tourism/tourism.png" alt="The Directory" class="tourismKey01">
        </picture>
      </h1>
      <h2>JP Concierge’s Official Japan Tourism Resources Directory</h2>
      <p>The Official Japan Tourism Resources Directory, provided by JP Concierge, serves as an extensive online reference for travelers exploring Japan's prefectures, cities, and towns. Our goal is to deliver current and trustworthy information customized to the distinctive features of each region. Please note that while some official URLs may be in Japanese, most browsers have a translation feature for your convenience.</p>

@include('tourism.map')

      <div class="mt70"></div>

<h2>Initial Releases</h2>
      <p>The initial release includes detailed guides for select prefectures, cities, and towns, such as Hokkaido, Tokyo, Kyoto, Osaka, and Okinawa.</p>
      <p>As the directory continues to expand, travelers can expect comprehensive coverage of all prefectures, ensuring access to accurate and practical information for an enriching exploration of Japan.
	<br><br>The borders of Japan's prefectures have their origins in the Meiji Restoration, a period of rapid modernization and political reform that began in 1868. Before this time, during the Edo era (1603-1868), Japan was divided into feudal domains controlled by lords (daimyo) under the rule of the Tokugawa shogunate. The Meiji government replaced these domains with a modern, centralized nation, initially creating 305 prefectures. These were later consolidated into the 47 prefectures we have today. The borders were drawn considering historical boundaries, geographical features, and cultural factors to ensure effective governance.</p><br>

      <!-- <h2>Contents</h2> -->
      <ol>
        <li><span style="font-weight: bold;">Cities/Towns:</span><br>Detailed descriptions of cities and towns within each prefecture, highlighting their cultural significance, local attractions, and landmarks</li><br>
        <li><span style="font-weight: bold;">Historical and Cultural Landmarks:</span><br>Wide coverage of Japan's historical and cultural sites, including temples, shrines, and heritage locations</li><br>
        <li><span style="font-weight: bold;">Natural Attractions:</span><br>Information on Japan's natural wonders, such as mountains, beaches, forests, and scenic landscapes</li><br>
        <li><span style="font-weight: bold;">Festivals and Events:</span><br>Listings of annual festivals and events across Japan, offering insights into cultural traditions and celebrations</li><br>
        <li><span style="font-weight: bold;">Food and Cuisine:</span><br>A guide to Japan's culinary scene, featuring local delicacies, specialty dishes, and recommended dining establishments</li><br>
        <li><span style="font-weight: bold;">Special Offers:</span><br>Details on exclusive deals, discounts, and promotions</li><br>
        <li><span style="font-weight: bold;">Dive into Local Depth:</span><br>Insights into the unique customs, traditions, and hidden gems of each region, providing a deeper understanding of local culture</li>
      </ol>

      
    </div>
  </section>

@endsection