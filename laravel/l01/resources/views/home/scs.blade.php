@extends('layouts.home_app')

@section('breadcrumb')
		<ol class="breadcrumb">
			<li><a href="{{ route('home') }}">Home</a></li>
			<li class="active">SHIPPING CONCIERGE</li>
		</ol>
@endsection

@section('content')
					<h2 class="homeTitle"><img src="/img/home/icon_scs.png" class="iconScs">SHIPPING CONCIERGE</h2>

					<p class="mt2"><a href="https://www.post.japanpost.jp/cgi-charge/index.php?lang=_en" class="linkStyle" target="_blank" rel="noopener noreferrer">The shipping charge, determined by our trusted delivery partner Japan Post</a> (EMS or SAL)*, is precisely as indicated, with no hidden margins. Additionally, JP CONCIERGE applies the following service fees, calculated based on the weight of the parcel under specific conditions. Should you have any preferences or special requirements concerning insurance or customs declarations, we kindly request you to <a href="{{ route('home.contact') }}" class="linkStyle">CONTACT JP CONCIERGE</a> before proceeding with the checkout.
					<br><br>*Please note that EMS is preconfigured for parcels, and currently, SAL flights are suspended by Japan Post. However, there is a possibility of reinstatement in the near future.</p>


					<ul class="scsMenu mt2">
						<li><a href="{{ route('home.identity') }}">IDENTITY VERIFICATION</a></li>
						<li><a href="{{ route('home.jpaddress') }}">JAPAN ADDRESS</a></li>
						<li><a href="{{ route('home.parcels') }}">PARCEL INFORMATION</a></li>
						<li><a href="{{ route('home.addresses') }}">ADDRESS BOOK</a></li>
					</ul>

					<p class="mt1"><a href="/pdf/JPCManual.pdf" target="_blank" rel="noopener noreferrer" class="linkStyle">Instructions for Use<span class="nav__icon">PDF</span></a></p>

					<h3 class="serviceTitle mt3">Shipping Concierge Service Fee</h3>

					<table class="serviceTable01">
						<thead>
							<tr><th>Weight</th><th>Service Fee</th></tr>
						</thead>
						<tbody>
	@foreach(config('const.scs.fee') as $key => $value)
							<tr><td>Up to {{ number_format($key) }} grams</td><td>{{ number_format($value) }} JPY</td></tr>
	@endforeach
						</tbody>
					</table>

					<table class="serviceTable02">
						<tbody>
							<tr>
								<th>Free storage</th>
								<td>{{ number_format(config('const.scs.freestrage')) }} days</td>
							</tr>
							<tr>
								<th>Consolidation of parcels</th>
								<td><a href="{{ route('home.contact') }}" class="linkStyle">Please CONTACT JP CONCIERGE</a></td>
							</tr>
							<tr>
								<th>Additional storage charge</th>
								<td>{{ number_format(config('const.scs.additional')) }} JPY/day<br>This will be charged daily per received parcel if the free storage limit is exceeded.</td>
							</tr>
							<tr>
								<th>Maximum storage time</th>
								<td>{{ number_format(config('const.scs.maximum')) }} days<br>Parcels will be discarded thereafter.</td>
							</tr>
						</tbody>
					</table>
@endsection
