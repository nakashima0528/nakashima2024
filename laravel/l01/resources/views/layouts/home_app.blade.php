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
  <meta name="robots" content="noindex" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="/img/favicon.ico">
@stack('css')
  <link rel="stylesheet" type="text/css" href="/css/reset.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css?20240520">

  <title>{{ config('const.site_title'); }}</title>
  <meta name="description" content="{{ config('const.site_description'); }}">

</head>
<body class="home">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7LZ5SB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <div class="homeBg"></div>

  @include('layouts.header')

  <div class="wrapHome">

@yield('breadcrumb')

    <div class="container">

      @include('layouts.home_sidebar')

      <main class="main">
        <div class="wrapMain">
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
  @if (isset($flash_success))
          <div class="flashMessage flashMessage--success">
            {{ $flash_success }}
            <button>×</button>
          </div>
  @endif
  @if(Helper::countInvoiceUnpaid(Auth::id()) > 0)
          <div class="invoiceUnpaid"><a href="{{ route('home.invoices.unpaid') }}">{{ Helper::countInvoiceUnpaid(Auth::id()) }} outstanding invoice(s) in your account.</a></div>
  @endif

@yield('content')
        </div>
      </main>

    </div>
  </div>

  @include('layouts.footer')

  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
@stack('scripts')
  <script src="/js/script.js"></script>
  <script src="/js/home.js"></script>

</body>

</html>
