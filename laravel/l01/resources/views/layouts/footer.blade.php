  <footer>
    <div class="footer__box">
      <div class="footer__boxLogo">
@auth

        <a href="{{ route('home') }}"><img src="/img/logo.png" alt="{{ config('const.site_title'); }}"></a>
@else

        <a href="<?= config('const.site_url'); ?>"><img src="/img/logo.png" alt="{{ config('const.site_title'); }}"></a>
@endauth

      </div>
      <div class="footer__boxText">
        <p class="footer__boxText01">Operated by<img src="/img/passage.png" alt="passage"></p>
         <p class="footer__boxText02">© <span id="currentYear"></span> passage LLC. All Rights Reserved.</p>
      </div>
      <ul class="footer__boxLink">
        <li><a href="/privacy">Privacy Policy</a></li>
        <li><a href="/terms">Terms of Service</a></li>
      </ul>
    </div>
  </footer>
