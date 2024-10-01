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

    <li class="breadcrumb-item">
      <a href="{{ route('invoices.show', [$invoice->id]) }}">Invoice #{{ $invoice->id }}</a>
    </li>
    <li class="breadcrumb-item active">Invoice Detail</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      @include('coreui-templates::common.errors')
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <strong>Details</strong>
              <a href="{{ route('invoiceDetails.edit', [$invoiceDetail->id]) }}" class='btn btn-ghost-info pull-right'><i class="fa fa-edit"></i></a>
            </div>
            <div class="card-body">
              @include('admin.invoice_details.show_fields')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
