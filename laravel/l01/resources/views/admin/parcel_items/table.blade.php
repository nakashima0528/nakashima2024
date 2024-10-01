<div class="table-responsive-sm">
	<table class="table table-striped" id="parcelItems-table">
		<thead>
			<tr>
				<th>Description</th>
				<th>Quantity</th>
				<th>Value</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		@foreach($parcelItems as $parcelItem)
			<tr>
				<td>{{ $parcelItem->name }}</td>
				<td>{{ number_format($parcelItem->quantity) }}</td>
				<td>{{ number_format($parcelItem->value) }}</td>
				<td>
					{!! Form::open(['route' => ['parcelItems.destroy', $parcelItem->id], 'method' => 'delete']) !!}
					<div class='btn-group'>
						<a href="{{ route('parcelItems.show', [$parcelItem->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
						<a href="{{ route('parcelItems.edit', [$parcelItem->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
            @can(config('const.admin.role.GENERAL'))
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