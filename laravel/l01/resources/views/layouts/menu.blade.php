          <div class="menuContact">
            <a href="{{ route('home.contact') }}">CONTACT JP CONCIERGE</a>
          </div>

          <ul class="nav">
            <li class="{{ Request::is('home') ? 'active' : '' }}">
              <a href="{{ route('home') }}">Home</a>
            </li>
          </ul>
          <ul class="nav">
            <li class="{{ Request::is('home/pcs') ? 'active' : '' }}">
              <a href="{{ route('home.pcs') }}" class="nav__pcs">PERSONAL CONCIERGE</a>
            </li>
          </ul>
          <ul class="nav">
            <li class="{{ Request::is('home/scs') ? 'active' : '' }}">
              <a href="{{ route('home.scs') }}" class="nav__scs">SHIPPING CONCIERGE</a>
              <ul class="nav__child">
                <li class="{{ Request::is('home/identity') ? 'active' : '' }}">
                  <a href="{{ route('home.identity') }}">IDENTITY VERIFICATION</a>
                </li>
                <li class="{{ Request::is('home/jpaddress') ? 'active' : '' }}">
                  <a href="{{ route('home.jpaddress') }}">JAPAN ADDRESS</a>
                </li>
                <li class="{{ Request::is('home/parcel*') ? 'active' : '' }}">
                  <a href="{{ route('home.parcels') }}">PARCEL INFORMATION</a>
                </li>
                <li class="{{ Request::is('home/address*') ? 'active' : '' }}">
                  <a href="{{ route('home.addresses') }}">ADDRESS BOOK</a>
                </li>
              </ul>
            </li>
          </ul>
          <ul class="nav">
            <li class="{{ Request::is('home/pesonal*') ? 'active' : '' }}">
              <a href="{{ route('home.pesonal') }}">PERSONAL DETAILS</a>
            </li>
            <li class="{{ Request::is('home/payment*') ? 'active' : '' }}">
              <a href="{{ route('home.payment') }}">PAYMENT METHOD</a>
            </li>
            <li class="{{ Request::is('home/invoice*') ? 'active' : '' }}">
              <a href="{{ route('home.invoices') }}">PAYMENT CHECKOUT</a>
            </li>
            <li class="{{ Request::is('home/password') ? 'active' : '' }}">
              <a href="{{ route('home.password') }}">CHANGE PASSWORD</a>
            </li>
          </ul>
          <ul class="nav">
            <li class="{{ Request::is('home/vip') ? 'active' : '' }}">
              <a href="{{ route('home.vip') }}">VIP SERVICE</a>
            </li>
          </ul>
          <ul class="nav">
            <li class="{{ Request::is('home/tourism') ? 'active' : '' }}">
              <a href="{{ route('tourism') }}">Official Japan Tourism Resources Directory</a>
            </li>
          </ul>
          <ul class="nav">
            <li>
              <a href="/pdf/JPCManual.pdf" target="_blank" rel="noopener noreferrer">Instructions for Use<span class="nav__icon">PDF</span></a>
            </li>
          </ul>
