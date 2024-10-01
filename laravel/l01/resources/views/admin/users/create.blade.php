@extends('admin.layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
     <a href="{!! route('users.index') !!}">User</a>
    </li>
    <li class="breadcrumb-item active">User</li>
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
              <i class="fa fa-plus-square-o fa-lg"></i>
              <strong>Create User</strong>
            </div>
            <div class="card-body">
              {!! Form::open(['route' => 'users.store']) !!}

                  @include('admin.users.fields')

              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
