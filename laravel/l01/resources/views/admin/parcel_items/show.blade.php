@extends('admin.layouts.app')

@section('content')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ route('users.show', [$user->id]) }}">{{ Helper::getAccountNo($user->id) }}</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ route('parcels.show', [$parcel->id]) }}">Parcel #{{ $parcel->id }}</a>
		</li>
		<li class="breadcrumb-item active">Parcel Item</li>
	</ol>
	<div class="container-fluid">
		<div class="animated fadeIn">
				@include('coreui-templates::common.errors')
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<strong>Details</strong>
								<a href="{{ route('parcelItems.edit', [$parcelItem->id]) }}" class='btn btn-ghost-info pull-right'><i class="fa fa-edit"></i></a>
							</div>
							<div class="card-body">
								@include('admin.parcel_items.show_fields')
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
@endsection
