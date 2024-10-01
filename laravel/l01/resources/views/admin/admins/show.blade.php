@extends('admin.layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('admins.index') }}">Admins</a>
    </li>
    <li class="breadcrumb-item active">{{ $admin->name }}</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
      @include('coreui-templates::common.errors')
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <strong>Details</strong>
            </div>
            <div class="card-body">
              @include('admin.admins.show_fields')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
