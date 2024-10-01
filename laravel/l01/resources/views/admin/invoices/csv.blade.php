@extends('admin.layouts.app')

@section('content')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ route('parcels.index') }}">Invoice</a>
		</li>
		<li class="breadcrumb-item active">CSV</li>
	</ol>
	<div class="container-fluid">
		<div class="animated fadeIn">
			@include('coreui-templates::common.errors')
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<i class="fa fa-download fa-lg"></i>
							<strong>Parcel CSV</strong>
						</div>
						<div class="card-body">
							{!! Form::open(['route' => 'csv.invoice.lownload']) !!}

							<!-- Status Field -->
							<div class="form-group col-sm-6">
								{!! Form::label('status', 'Status:') !!}
								{!! Form::select('status', config('const.invoice.status_list'), null, ['class' => 'form-control','placeholder' => '']) !!}
							</div>

							<!-- Invoice # Field -->
							<div class="form-group col-sm-6">
								{!! Form::label('id', 'Invoice #:') !!}
								{!! Form::text('id', null, ['class' => 'form-control']) !!}
							</div>

							<!-- User Id Field -->
							<div class="form-group col-sm-6">
								{!! Form::label('user_id', 'User Id:') !!}
								{!! Form::text('user_id', null, ['class' => 'form-control']) !!}
							</div>

							<!-- created_from Field -->
							<div class="form-group col-sm-6">
								{!! Form::label('created_from', 'Created date from:') !!}
								{!! Form::text('created_from', null, ['class' => 'form-control','id'=>'created_from']) !!}
							</div>

							@push('scripts')
								<script type="text/javascript">
										$('#created_from').datetimepicker({
											format: 'YYYY-MM-DD HH:mm:ss',
											useCurrent: true,
											icons: {
												up: "icon-arrow-up-circle icons font-2xl",
												down: "icon-arrow-down-circle icons font-2xl"
											},
											sideBySide: true
										})
									</script>
							@endpush

							<!-- created_to Field -->
							<div class="form-group col-sm-6">
								{!! Form::label('created_to', 'Created date to:') !!}
								{!! Form::text('created_to', null, ['class' => 'form-control','id'=>'created_to']) !!}
							</div>

							@push('scripts')
								<script type="text/javascript">
										$('#created_to').datetimepicker({
											format: 'YYYY-MM-DD HH:mm:ss',
											useCurrent: true,
											icons: {
												up: "icon-arrow-up-circle icons font-2xl",
												down: "icon-arrow-down-circle icons font-2xl"
											},
											sideBySide: true
										})
									</script>
							@endpush

							<!-- Submit Field -->
							<div class="form-group col-sm-12">
								{!! Form::submit('Download', ['class' => 'btn btn-primary']) !!}
							</div>

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
			</div>
	</div>
@endsection
