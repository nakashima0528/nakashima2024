<div class="table-responsive-sm">
	<table class="table table-striped" id="addresses-table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Type</th>
				<th>Country</th>
				<th>Address</th>
				<th>Town</th>
				<th>County</th>
				<th>Default</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		@foreach($addresses as $address)
			<tr>
				<td>{{ $address->name }}</td>
				<td>{{ config('const.address.type_list.'.$address->type) }}</td>
				<td>{{ $address->country }}</td>
				<td>{{ $address->address1 }} {{ $address->address2 }}</td>
				<td>{{ $address->city }}</td>
				<td>{{ $address->county }}</td>
				<td>{{ config('const.check.list.'.$address->default) }}</td>
				<td>
					{!! Form::open(['route' => ['addresses.destroy', $address->id], 'method' => 'delete']) !!}
					<div class='btn-group'>
						<a href="{{ route('addresses.show', [$address->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
						<a href="{{ route('addresses.edit', [$address->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
            @can(config('const.admin.role.ADMINISTRATOR'))
						{!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure you want to proceed?')"]) !!}
            @endcan
					</div>
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>