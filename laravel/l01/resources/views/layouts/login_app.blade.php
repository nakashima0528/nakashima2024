<!DOCTYPE html>
<html lang="en">
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T7LZ5SB');</script>
<!-- End Google Tag Manager -->

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
@hasSection('canonical')

  <link rel="canonical" href="@yield('canonical')">
@endif

  <link rel="icon" href="/img/favicon.ico">
  <link rel="stylesheet" type="text/css" href="/css/reset.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css?20230311">

@hasSection('title')

  <title>@yield('title') | {{ config('const.site_title'); }}</title>
  <meta name="description" content="Guidance about @yield('title'). {{ config('const.site_description'); }}">
@else

  <title>{{ config('const.site_title'); }}</title>
  <meta name="description" content="{{ config('const.site_description'); }}">
@endif

  <meta property="og:type" content="article">
  <meta property="og:site_name" content="{{ config('const.site_title') }}">
  <meta property="og:title" content="@yield('title') | {{ config('const.site_title'); }}">
  <meta property="og:description" content="Guidance about @yield('title'). {{ config('const.site_description'); }}">
  <meta property="og:url" content="{{ config('const.site_url') }}">
  <meta property="og:image" content="{{ config('const.site_url') }}/img/ogp.png">
  <meta name="twitter:card" content="summary_large_image">

</head>
<body class="login headerfix">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7LZ5SB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  @include('layouts.header')

  <div class="wrapL">
    @yield('breadcrumb')

    <div class="container">

    @if (session('flash_success'))

      <div class="flashMessage flashMessage--success">
        {{ session('flash_success') }}
        <button>×</button>
      </div>
    @endif
    @if (session('flash_error'))
  
      <div class="flashMessage flashMessage--error">
        {{ session('flash_error') }}
        <button>×</button>
      </div>
    @endif
    @if (session('status'))

      <div class="flashMessage flashMessage--success">
        {{ session('status') }}
        <button>×</button>
      </div>
    @endif

      @yield('content')
    </div>
  </div>

  @include('layouts.footer')

  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
@stack('scripts')
  <script src="/js/script.js"></script>

</body>

</html>
