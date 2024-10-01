<div class="table-responsive-sm">
  <table class="table table-striped" id="parcels-table" style="width: 100%;">
    <thead>
      <tr>
        <th>Parcel #</th>
      @if(!isset($user_off))
        <th>User</th>
      @endif
        <th>Status</th>
        <th>Additional</th>
        <th>Shipment</th>
        <th>Stored date</th>
        <th>Shipped date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($parcels as $parcel)
      <tr>
        <td>{{ $parcel->id }}</td>
      @if(!isset($user_off))
        <td>{{ Helper::getAccountNo($parcel->user_id) }}</td>
      @endif
        <td>{{ config('const.parcel.status_list.'.$parcel->status) }}</td>
        <td>{{ number_format($parcel->additional) }}</td>
        <td>{{ config('const.shipment.list.'.$parcel->shipment) }}</td>
        <td>{{ $parcel->stored }}</td>
        <td>{{ $parcel->shipped }}</td>
        <td>
          {!! Form::open(['route' => ['parcels.destroy', $parcel->id], 'method' => 'delete']) !!}
          <div class='btn-group'>
            <a href="{{ route('parcels.show', [$parcel->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
            <a href="{{ route('parcels.edit', [$parcel->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
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