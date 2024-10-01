@extends('layouts.home_app')

@section('breadcrumb')
		<ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">PERSONAL DETAILS</li>
    </ol>
@endsection

@section('content')
          <h2>PERSONAL DETAILS</h2>

					<div class="homePersonalTable">
						<dl><dt>ACCOUNT ID</dt><dd>{{ Helper::getAccountNo(Auth::user()->id) }}</dd></dl>
						<dl><dt>Title</dt><dd>{{ config('const.user.title_list.'.$user->title) }}</dd></dl>
						<dl><dt>Forename(s)</dt><dd>{{ $user->forename }}</dd></dl>
						<dl><dt>Surname</dt><dd>{{ $user->surname }}</dd></dl>
						<dl><dt>Date of birth</dt><dd>{{ Helper::getBirth($user->birth) }}</dd></dl>
						<dl><dt>Email address</dt><dd>{{ $user->email }}</dd></dl>
					</div>

					<div class="mt2 align-right">
						<a href="{{ route('home.pesonal.email') }}" class="arrowBtnS">Edit Email address</a>
					</div>
@endsection
