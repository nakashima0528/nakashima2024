@extends('layouts.home_app')

@section('breadcrumb')
		<ol class="breadcrumb">
			<li><a href="{{ route('home') }}">Home</a></li>
			<li class="active">VIP SERIVCE</li>
		</ol>
@endsection

@section('content')

					<h2 class="vipTitle">
						<picture class="image">
							<source srcset="/img/home/vip/title@sp.png" media="(max-width: 767px)">
							<img src="/img/home/vip/title.png" alt="VIP SERVICE">
						</picture>
					</h2>
					<div class="vipBox">
	@if(Auth::user()->status == config('const.user.status.VIP'))

		@foreach($tickets as $ticket)
						<dl class="vipBox__ticket">
							<dt>{{ $ticket->description }}</dt>
							<dd><em>{{ $ticket->quantity }}</em>{{ $ticket->unit }}</dd>
						</dl>
		@endforeach					

						<div class="vipBox__tab">
							<button class="is-active"><em>Before</em> Travel</button>
							<button><em>During</em> Travel</button>
						</div>

						<div class="vipBox__panel">
							<div class="is-active">

								<h3 class="restaurant">Restaurants, Attractions & Tickets</h3>
								<div class="vipBox__serviceOutline">
									<div class="vipBox__serviceOutline03">
										<img src="/img/home/vip/image11.jpg" alt="restaurant service">
									</div>
									<div class="vipBox__serviceOutline04">
										<p>Indulge in Japan’s finest dining, attractions, and tickets with our VIP service. Each reservation, visit, or ticket is counted as one item. Enhance your pre-travel experience, knowing every event is counted separately.</p>
									</div>
								</div>
								<table class="vipBox__price">
									<tbody>
										<tr><th>Silver Package</th><td><em>3</em>items</td><td><em>24,000</em>JPY</td></tr>
										<tr><th>Gold Package</th><td><em>5</em>items</td><td><em>39,000</em>JPY</td></tr>
										<tr><th>Platinum Package</th><td><em>8</em>items</td><td><em>61,600</em>JPY</td></tr>
										<tr><th>Diamond Package</th><td><em>12</em>items</td><td><em>91,200</em>JPY</td></tr>
										<tr><th>Ultimate Package</th><td><em>15</em>items</td><td><em>112,500</em>JPY</td></tr>
									</tbody>
								</table>
								<p>Let us curate a personalized itinerary with culinary delights, mesmerizing attractions, and exclusive events for an extraordinary journey.</p>

								<hr>

								<h3 class="hotel">Hotels</h3>
								<div class="vipBox__serviceOutline">
									<div class="vipBox__serviceOutline03">
										<img src="/img/home/vip/image12.jpg" alt="hotel service">
									</div>
									<div class="vipBox__serviceOutline04">
										<p>Discover unparalleled luxury and comfort with our VIP hotel recommendations, meticulously selected to meet your discerning tastes. Choose from our exclusive hotel packages, with each town counted as one single item.</p>
									</div>
								</div>
								<table class="vipBox__price">
									<tbody>
										<tr><th>Silver Package</th><td><em>3</em>items</td><td><em>34,500</em>JPY</td></tr>
										<tr><th>Gold Package</th><td><em>5</em>items</td><td><em>55,000</em>JPY</td></tr>
									</tbody>
								</table>
								<p>Experience the epitome of hospitality with accommodations tailored to your preferences, ensuring a memorable stay in Japan’s most prestigious hotels.</p>

								<hr>

								<h3 class="business">Business & Others</h3>
								<div class="vipBox__serviceOutline">
									<div class="vipBox__serviceOutline03">
										<img src="/img/home/vip/image13.jpg" alt="business service">
									</div>
									<div class="vipBox__serviceOutline04">
										<p>Please let us know the details of your inquiry. Fees are to be determined based on the scope and complexity of your request.</p>
									</div>
								</div>

							</div>
							<div>

								<h3 class="assistance">All the assistance you need</h3>
								<div class="vipBox__serviceOutline">
									<div class="vipBox__serviceOutline03">
										<img src="/img/home/vip/image14.jpg" alt="assistance service">
									</div>
									<div class="vipBox__serviceOutline04">
										<p>Indulge in Japan's finest dining, explore captivating attractions, and secure coveted tickets with our VIP service tailored exclusively for you. Choose from our specialized offerings to enhance your during-travel experience.</p>
									</div>
								</div>
								<table class="vipBox__price">
									<tbody>
										<tr><th>Silver Package</th><td><em>1</em>day</td><td><em>11,500</em>JPY</td></tr>
										<tr><th>Gold Package</th><td><em>5</em>days</td><td><em>55,000</em>JPY</td></tr>
										<tr><th>Platinum Package</th><td><em>8</em>days</td><td><em>105,000</em>JPY</td></tr>
										<tr><th>Diamond Package</th><td><em>12</em>days</td><td><em>200,000</em>JPY</td></tr>
										<tr><th>Ultimate Package</th><td><em>15</em>days</td><td><em>285,000</em>JPY</td></tr>
									</tbody>
								</table>
								<p>Let us curate a personalized itinerary filled with culinary delights, mesmerizing attractions, and exclusive events, ensuring your journey is nothing short of extraordinary, with support available throughout the day.</p>

								<hr>

								<h3 class="business">Business & Others</h3>
								<div class="vipBox__serviceOutline">
									<div class="vipBox__serviceOutline03">
										<img src="/img/home/vip/image13.jpg" alt="business service">
									</div>
									<div class="vipBox__serviceOutline04">
										<p>Please let us know the details of your inquiry. Fees are to be determined based on the scope and complexity of your request.</p>
									</div>
								</div>
							
							</div>
						</div>

	@else

						<p>JP Concierge VIP Service offers the perfect blend of luxury and convenience for discerning travelers.
							Our exclusive VIP service is meticulously crafted to cater to your every need, ensuring a seamless and unforgettable journey through Japan’s diverse array of experiences.</p>

						<div class="vipBox__main"><img src="/img/home/vip/image01.jpg" alt="main visual"></div>

						<div class="vipBox__serviceOutline">
							<div class="vipBox__serviceOutline01">
								<h3 class="restaurant">Restaurants, Attractions & Tickets</h3>
								<p>Indulge in Japan’s finest dining, explore captivating attractions, and secure coveted tickets with our VIP service tailored exclusively for you.
									Choose from our specialized offerings to enhance your pre-travel experience.
									Let us curate a personalized itinerary filled with culinary delights, mesmerizing attractions, and exclusive events, ensuring your journey is nothing short of extraordinary.</p>
							</div>
							<div class="vipBox__serviceOutline02">
								<img src="/img/home/vip/image02.jpg" alt="restaurant service">
							</div>
						</div>

						<div class="vipBox__serviceOutline vipBox__serviceOutline--reverse">
							<div class="vipBox__serviceOutline01">
								<h3 class="hotel">Hotels</h3>
								<p>Discover unparalleled luxury and comfort with our VIP hotel recommendations, meticulously selected to meet your discerning tastes.
									Choose from our exclusive hotel packages and experience the epitome of hospitality with accommodations tailored to your preferences, ensuring a memorable stay in Japan’s most prestigious hotels.</p>
							</div>
							<div class="vipBox__serviceOutline02">
								<img src="/img/home/vip/image03.jpg" alt="hotel service">
							</div>
						</div>

						<div class="vipBox__serviceOutline">
							<div class="vipBox__serviceOutline01">
								<h3 class="business">Business & Others</h3>
								<p>Our VIP experience extends beyond leisure to encompass all aspects of your journey.
									Share the details of your inquiry, and allow us to tailor a bespoke solution for you.
									Fees for business-related services will be determined based on the scope and complexity of your request.</p>
							</div>
							<div class="vipBox__serviceOutline02">
								<img src="/img/home/vip/image04.jpg" alt="business service">
							</div>
						</div>

@endif

							<div class="vipBox__contact"><a href="{{ route('home.contact') }}">CONTACT JP CONCIERGE</a></div>
					</div>

@endsection

@push('scripts')
  <script type="text/javascript">
    $(function() {
      $(".vipBox__tab button").on("click", function() {
      	var $th = $(this).index();
      	$(".vipBox__tab button").removeClass("is-active");
      	$(".vipBox__panel > div").removeClass("is-active");
      	$(this).addClass("is-active");
      	$(".vipBox__panel > div").eq($th).addClass("is-active");
			});
    });
  </script>
@endpush
