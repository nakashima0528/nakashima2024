@extends('layouts.app')
@section('canonical', route('tourism.prefecture',$prefecture))
@section('title', 'Official Japan Tourism Resources Directory of '.$prefecture)
@section('body_class', 'tourism headerfix')
@section('ogp')
  <meta property="og:type" content="article">
  <meta property="og:site_name" content="{{ config('const.site_title') }}">
  <meta property="og:title" content="Official Japan Tourism Resources Directory of {{ $prefecture }} | {{ config('const.site_title'); }}">
  <meta property="og:description" content="Official Japan Tourism Resources Directory of {{ $prefecture }}. {{ config('const.site_description'); }}">
  <meta property="og:url" content="{{ route('tourism.prefecture',$prefecture) }}">
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

      <li><a href="/tourism">Official Japan Tourism Resources Directory</a></li>
      <li class="active">{{ $prefecture }}</li>
    </ol>
@endsection

@section('content')

  <section class="secPrefecture">
    <div class="wrap">
      <h1>
        <picture>
          <source srcset="/img/tourism/tourism@sp.png" media="(max-width: 767px)">
          <img src="/img/tourism/tourism.png" alt="Official Japan Tourism Resources Directory" class="tourismKey01">
        </picture>
      </h1>
      @include('tourism.prefecture.'.$prefecture)

      @include('tourism.map')
    </div>
  </section>



@endsection
