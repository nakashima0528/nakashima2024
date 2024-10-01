@extends('layouts.home_app')

@section('breadcrumb')
		<ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">IDENTITY VERIFICATION</li>
    </ol>
@endsection

@section('content')
					<h2>IDENTITY VERIFICATION</h2>

					<h3>Shipping Concierge Service</h3>
          <div class="homeGrayFrame mt1">
	@if(Auth::user()->identity == config('const.check.cd.ON'))
						<div class="homeSuccessMessage">Identity verification has been successfully completed.</div>
            <p class="mt2">For Shipping Concierge Service on its own, identity verification is required according to <a href="https://www.npa.go.jp/sosikihanzai/jafic/index_e.htm" class="linkStyle" target="_blank" rel="noopener noreferrer">the Act on Prevention of Transfer of Criminal Proceeds</a>.<br><br>
						In case that you move to a new place, please kindly send us via <a href="{{ route('home.contact') }}" class="linkStyle">CONTACT JP CONCIERGE</a>
						a copy of your own official document(s) presenting <em class="homeEm01">your name, date of birth and current address</em>
						to facilitate the first shipment from us on your behalf.</p>
  @else
            <div class="homeCautionMessage">Identity verification has not been completed yet.</div>
            <p class="mt2">For Shipping Concierge Service on its own, identity verification is required according to <a href="https://www.npa.go.jp/sosikihanzai/jafic/index_e.htm" class="linkStyle" target="_blank" rel="noopener noreferrer">the Act on Prevention of Transfer of Criminal Proceeds</a>.<br><br>
						Please kindly send us via <a href="{{ route('home.contact') }}" class="linkStyle">CONTACT JP CONCIERGE</a>
						a copy of your own official document(s) presenting <em class="homeEm01">your name, date of birth and current address</em>
						to facilitate the first shipment from us on your behalf.</p>
	@endif
						<p class="mt2">The followings are accepted for identity verification:<br>
						National ID<br>
						Passport<br>
						Driving license<br>
						Bank statement<br>
						Utility bills<br>
						Student ID card</p>
          </div>
					<h3 class="mt3">An Alternative Solution</h3>
          <div class="homeGrayFrame mt1">
						<p><em class="homeEm01">Proxy buying does NOT require identity verification.</em><br><br>
						JP CONCIERGE provides a combined service of Personal Concierge Service (proxy buying) and Shipping Concierge Service as an alternative solution to avoid identity verification.<br><br>
						Please see <a href="{{ route('home.scs') }}" class="linkStyle">SERVICE FEE</a> and <a href="{{ route('home.contact') }}" class="linkStyle">CONTACT JP CONCIERGE</a> for further details.</p>
          </div>
@endsection
