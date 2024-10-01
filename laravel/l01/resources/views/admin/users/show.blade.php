@extends('admin.layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('users.index') }}">Users</a>
    </li>
    <li class="breadcrumb-item active">{{ Helper::getAccountNo($user->id) }}</li>
  </ol>
  <div class="container-fluid users">
    <div class="animated fadeIn">
      @include('flash::message')
      @include('coreui-templates::common.errors')
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <strong>Details</strong>
              @component('admin.components.btn_mail')
                @slot('user', $user)
              @endcomponent
              <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-ghost-info pull-right'><i class="fa fa-edit"></i></a>
            </div>
            <div class="card-body">
              @include('admin.users.show_fields')
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i>
              Addresses
              <a class="btn btn-ghost-info pull-right" href="{{ route('addresses.create',$user->id) }}"><i class="fa fa-plus-square fa-lg"></i></a>
            </div>
            <div class="card-body">
              @include('admin.addresses.table')
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
              Parcels
              <a class="btn btn-ghost-info pull-right" href="{{ route('parcels.create',$user->id) }}"><i class="fa fa-plus-square fa-lg"></i></a>
            </div>
            <div class="card-body">
              @include('admin.parcels.table', ['user_off' => true])
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
              <a class="btn btn-ghost-info pull-right" href="{{ route('invoices.create',$user->id) }}"><i class="fa fa-plus-square fa-lg"></i></a>
            </div>
            <div class="card-body">
              @include('admin.invoices.table', ['user_off' => true])
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
              Tickets
              <a class="btn btn-ghost-info pull-right" href="{{ route('tickets.create',$user->id) }}"><i class="fa fa-plus-square fa-lg"></i></a>
            </div>
            <div class="card-body">
              @include('admin.tickets.table', ['user_off' => true])
              <div class="pull-right mr-3">
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
