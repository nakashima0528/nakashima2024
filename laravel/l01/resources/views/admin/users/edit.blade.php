@extends('admin.layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{!! route('users.index') !!}">User</a>
    </li>
    <li class="breadcrumb-item active">{{ Helper::getAccountNo($user->id) }}</li>
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
              <strong>Edit User</strong>
            </div>
            <div class="card-body">
              {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

              @include('admin.users.fields')

              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection