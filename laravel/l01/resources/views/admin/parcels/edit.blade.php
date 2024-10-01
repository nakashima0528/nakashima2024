@extends('admin.layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('users.show', [$user->id]) }}">{{ Helper::getAccountNo($user->id) }}</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{ route('parcels.show', [$parcel->id]) }}">Parcel #{{ $parcel->id }}</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
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
              <strong>Edit Parcel</strong>
            </div>
            <div class="card-body">
              {!! Form::model($parcel, ['route' => ['parcels.update', $parcel->id], 'method' => 'patch']) !!}

              @include('admin.parcels.fields')

              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection