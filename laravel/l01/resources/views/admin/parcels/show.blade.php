@extends('admin.layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('users.show', [$user->id]) }}">{{ Helper::getAccountNo($user->id) }}</a>
    </li>
    <li class="breadcrumb-item active">Parcel #{{ $parcel->id }}</li>
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
              <a href="{{ route('parcels.edit', [$parcel->id]) }}" class='btn btn-ghost-info pull-right'><i class="fa fa-edit"></i></a>
            </div>
            <div class="card-body">
              @include('admin.parcels.show_fields')
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i>
              Parcel Items
              <a class="btn btn-ghost-info pull-right" href="{{ route('parcelItems.create', [$parcel->id]) }}"><i class="fa fa-plus-square fa-lg"></i></a>
            </div>
            <div class="card-body">
              @include('admin.parcel_items.table')
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
              Invoices
              <a class="btn btn-ghost-info pull-right" href="{{ route('invoices.create.parcel',[$user->id,$parcel->id]) }}"><i class="fa fa-retweet fa-lg"></i></a>
            </div>
            <div class="card-body">
              @include('admin.invoices.table', ['user_off' => true])
              <div class="pull-right mr-3">

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
	 
@endsection
