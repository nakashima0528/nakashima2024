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
  @if ($errors->any())
      <div class="alert alert-danger">There was a problem processing your request. Please see below.</div>
  @endif
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-edit fa-lg"></i>
              <strong>Edit Invoice Detail</strong>
            </div>
            <div class="card-body">
              {!! Form::model($invoiceDetail, ['route' => ['invoiceDetails.update', $invoiceDetail->id], 'method' => 'patch']) !!}

              @include('admin.invoice_details.fields')

              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection