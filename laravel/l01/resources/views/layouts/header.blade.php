  <header>
@hasSection('header')

    <div class="header__upper">@yield('header')</div>
@else

    <div class="header__upper"></div>
@endif

    <div class="header__body">
      <div class="header__bodyLeft">
@auth
  @if(!Route::is('top') && !Route::is('dev'))

        <div class="menuBtn"><span></span><span></span><span></span><label>MENU</label></div>
  @endif
@endauth 

      </div>

@auth

      <a href="{{ route('home') }}" class="header__bodyLogo"><h1><img src="/img/logo.png" alt="<?= config('const.site_title'); ?>"></h1></a>
      <div class="header__bodyRight" id="spFixPoint">
  @if(!Route::is('top'))

        <a href="{{ url('/logout') }}" class="linkLogout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
  @else
        <a href="{{ route('home') }}" class="linkMyaccount">My Account Page</a>

  @endif

@else

      <a href="<?= config('const.site_url'); ?>" class="header__bodyLogo"><h1><img src="/img/logo.png" alt="<?= config('const.site_title'); ?>"></h1></a>
      <div class="header__bodyRight" id="spFixPoint">

        <a href="{{ url('/login') }}" class="linkSignIn">Sign In</a>
        <a href="{{ url('/register') }}" class="linkRegister">Register</a>
@endauth 

      </div>
    </div>
  </header>
  <div class="spMenu">
    <div class="spMenu_wrap">
      @include('layouts.menu')
      <ul class="nav">
        <li>
          <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
        </li>
      </ul>
    </div>
  </div>
