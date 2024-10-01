@extends('layouts.home_app')

@section('breadcrumb')
		<ol class="breadcrumb">
			<li><a href="{{ route('home') }}">Home</a></li>
			<li class="active">PERSONAL CONCIERGE</li>
		</ol>
@endsection

@section('content')
					<h2 class="homeTitle"><img src="/img/home/icon_pcs.png" class="iconPcs">PERSONAL CONCIERGE</h2>

					<p>Personal Concierge Service is an on-demand hospitality for Japan no matter where you may be. Our team can make a variety of arrangements on your behalf such as proxy buying, travel assistance, and problem solving at your service. For private use, we offer to create an experience that is as individual as you are, while our team can also assist to lower costs and burdens associated with business arrangements in Japan.<br><br>The service fee will be calculated according to a pragmatic and transparent concierge rate per hour.</p>
					<p class="mt2"><a href="/pdf/JPCManual.pdf" target="_blank" rel="noopener noreferrer" class="linkStyle">Instructions for Use<span class="nav__icon">PDF</span></a></p>

					<h3 class="serviceTitle mt3">Personal Concierge Service Fee</h3>

					<table class="serviceTable03 mt2">
						<tbody>
							<tr>
								<th><em>Minimum fee</em></th>
								<td>{{ number_format(config('const.pcs.minimumFee')) }} JPY</td>
							</tr>
							<tr>
								<th><em>Private use</em><br>Online proxy buying<br>Online assistance to settle transactions<br>Online/call event planning & management</th>
								<td>{{ number_format(config('const.pcs.private.hour')) }} JPY per hour</td>
							</tr>
							<tr>
								<th><em>Business use – Light</em><br>Online/call consultation</th>
								<td>{{ number_format(config('const.pcs.businessLight.hour')) }} JPY per hour</td>
							</tr>
							<tr>
								<th><em>Business use – Standard</em><br>On-site consultation for, e.g. marketing research, stocking, property search, interpretation, and paperwork in Japanese.</th>
								<td>{{ number_format(config('const.pcs.businessStandard.hour')) }} JPY per hour<br><br>With your consent, transportation and accommodation expenses will be added if any.</td>
							</tr>
							<tr>
								<th><em>Business use – Premium</em><br>On-site consultation associated with business arrangements, e.g. alliance, event/meeting facilitation, regulatory filings and advanced documentation requiring Japanese certifications.</th>
								<td>{{ number_format(config('const.pcs.businessPremium.hour')) }} JPY per hour at a daily cap price of {{ number_format(config('const.pcs.businessPremium.dailyCap')) }} JPY for {{ number_format(config('const.pcs.businessPremium.maximumHour')) }} hours<br><br>With your consent, transportation and accommodation expenses will be added if any.</td>
							</tr>
						</tbody>
					</table>

					<div class="formBtn">
						<a href="{{ route('home.contact') }}" class="contactBtn">CONTACT JP CONCIERGE</a>
					</div>
@endsection
