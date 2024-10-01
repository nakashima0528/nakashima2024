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

    <!-- Norton Tag -->
    <meta name="norton-safeweb-site-verification" content="3layyj25zv1xz7vy6tumthknarkrd43bel01k6jezlvob6x1xin7lyyhjx405-drxy3re3zs94qnh4rpdoavtd-9cnsrsbshgc7fl1hzhlczrqzrj6xtakpwdxwo9rxj" />
    <!-- End Norton Tag -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('canonical')
        <link rel="canonical" href="@yield('canonical')">
    @endif

    <link rel="icon" href="/img/favicon.ico">
    @stack('css')
    <link rel="stylesheet" type="text/css" href="/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css?20230321">

    @hasSection('title')
        <title>@yield('title') | {{ config('const.site_title') }}</title>
        @hasSection('description')
            <meta name="description" content="@yield('description'). {{ config('const.site_description') }}">
        @else
            <meta name="description" content="Guidance about @yield('title'). {{ config('const.site_description') }}">
        @endif
    @else
        <title>{{ config('const.site_title') }}</title>
        <meta name="description" content="{{ config('const.site_description') }}">
    @endif

    @yield('ogp')
</head>
<body class="@yield('body_class')">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7LZ5SB" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @include('layouts.header')

    <div class="wrapL">
        @yield('breadcrumb')
    </div>

    @yield('content')

    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    @stack('scripts')
    <script src="/js/script.js?20230320"></script>
    <script src="/js/home.js?20230320"></script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var currentYear = new Date().getFullYear();
            document.getElementById('currentYear').textContent = currentYear;
        });
    </script>
</body>
</html>