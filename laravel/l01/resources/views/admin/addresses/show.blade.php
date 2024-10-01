@extends('admin.layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('users.show', [$user->id]) }}">{{ Helper::getAccountNo($user->id) }}</a>
    </li>
    <li class="breadcrumb-item active">Address</li>
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
              <a href="{{ route('addresses.edit', [$address->id]) }}" class='btn btn-ghost-info pull-right'><i class="fa fa-edit"></i></a>
            </div>
            <div class="card-body">
              @include('admin.addresses.show_fields')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
