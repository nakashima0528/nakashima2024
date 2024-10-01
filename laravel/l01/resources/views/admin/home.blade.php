@extends('admin.layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
  </ol>
  <div class="container">

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i>
            Parcels with invoice status invalid / Parcel == [{{ config('const.parcel.status_list.2') }}] && Invoice != [{{ config('const.invoice.status_list.2') }}]
          </div>
          <div class="card-body">
            @include('admin.parcels.table', ['parcels' => $invalid_parcels])
            <div class="pull-right mr-3">
                
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
            Parcels address changed / Parcel == [{{ config('const.parcel.status_list.1') }}]
          </div>
          <div class="card-body">
            @include('admin.parcels.table', ['parcels' => $changed_parcels])
            <div class="pull-right mr-3">
                
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
            Under process of shipping / Parcel == [{{ config('const.parcel.status_list.5') }}]
          </div>
          <div class="card-body">
            @include('admin.parcels.table', ['parcels' => $processing_parcels])
            <div class="pull-right mr-3">
                
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
            Parcels in preparation / Parcel == [{{ config('const.parcel.status_list.0') }}]
          </div>
          <div class="card-body">
            @include('admin.parcels.table', ['parcels' => $preparing_parcels])
            <div class="pull-right mr-3">
                
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
            Overstored parcels / {{ config('const.scs.freestrage') }} days free storage
          </div>
          <div class="card-body">
            @include('admin.parcels.table', ['parcels' => $over_parcels])
            <div class="pull-right mr-3">
                
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
            Invoices overdue / Payment due in {{ config('const.payment.due') }} days
          </div>
          <div class="card-body">
            @include('admin.invoices.table', ['invoices' => $over_invoices])
            <div class="pull-right mr-3">
                
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
