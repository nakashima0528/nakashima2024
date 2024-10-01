@extends('admin.layouts.app')

@section('content')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ route('admin.home') }}">Home</a>
		</li>
		<li class="breadcrumb-item active">Change password</li>
	</ol>
	<div class="container-fluid">
		<div class="animated fadeIn">
			@include('flash::message')
			@include('coreui-templates::common.errors')
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<i class="fa fa-edit fa-lg"></i>
							<strong>Change password</strong>
						</div>
						<div class="card-body">
							{!! Form::open(['route' => 'password.update']) !!}

							<!-- current_password Field -->
							<div class="form-group col-sm-6">
								{!! Form::label('current_password', 'Current Password:') !!}
								{!! Form::password('current_password', ['class' => 'form-control']) !!}
							</div>

							<!-- new_password Field -->
							<div class="form-group col-sm-6">
								{!! Form::label('new_password', 'New Password:') !!}
								{!! Form::password('new_password', ['class' => 'form-control']) !!}
							</div>
							<!-- new_password_confirmation Field -->
							<div class="form-group col-sm-6">
								{!! Form::label('new_password_confirmation', 'Confirm Password:') !!}
								{!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
							</div>

							<!-- Submit Field -->
							<div class="form-group col-sm-12">
								{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
								<a href="{{ route('admin.home') }}" class="btn btn-secondary">Cancel</a>
							</div>

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
			</div>
	</div>
@endsection
