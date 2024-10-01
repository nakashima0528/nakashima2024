@extends('admin.layouts.app')

@section('content')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ route('users.show', [$user->id]) }}">{{ Helper::getAccountNo($user->id) }}</a>
		</li>
	@if($invoice->parcel_id)

		<li class="breadcrumb-item">
			<a href="{{ route('parcels.show', [$invoice->parcel_id]) }}">Parcel #{{ $invoice->parcel_id }}</a>
		</li>
	@endif

		<li class="breadcrumb-item active">Invoice #{{ $invoice->id }}</li>
	</ol>
	<div class="container-fluid">
		<div class="animated fadeIn">
			@include('flash::message')
			@include('coreui-templates::common.errors')
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<strong>Details</strong>
              <a href="{{ route('invoices.edit', [$invoice->id]) }}" class='btn btn-ghost-info pull-right'><i class="fa fa-edit"></i></a>
						</div>
						<div class="card-body">
							@include('admin.invoices.show_fields')
<!-- Payment At Field -->
<div class="form-group">
    {!! Form::label('payment', 'Total payment:') !!}
    <p>{{ number_format(Helper::getTotlePayment($invoice->invoiceDetails)) }}</p>
</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<i class="fa fa-align-justify"></i>
							Invoice Details
							<a class="btn btn-ghost-info pull-right" href="{{ route('invoiceDetails.create',$invoice->id) }}"><i class="fa fa-plus-square fa-lg"></i></a>
						</div>
						<div class="card-body">
							@include('admin.invoice_details.table')
							<div class="pull-right mr-3">
											
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
