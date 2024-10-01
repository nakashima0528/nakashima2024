<div class="table-responsive-sm">
  <table class="table table-striped" id="invoices-table" style="width: 100%;">
    <thead>
      <tr>
        <th>Invoice #</th>
      @if(!isset($user_off))
        <th>User</th>
      @endif
        <th>Status</th>
        <th>Type</th>
        <th>Parcel #</th>
        <th>Issued date</th>
        <th>Paid date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
      <tr>
        <td>{{ $invoice->id }}</td>
      @if(!isset($user_off))
        <td>{{ Helper::getAccountNo($invoice->user_id)  }}</td>
      @endif
        <td>{{ config('const.invoice.status_list.'.$invoice->status) }}</td>
        <td>{{ config('const.invoice.type_list.'.$invoice->type) }}</td>
        <td>{{ $invoice->parcel_id }}</td>
        <td>{{ $invoice->issued }}</td>
        <td>{{ $invoice->paid }}</td>
        <td>
          {!! Form::open(['route' => ['invoices.destroy', $invoice->id], 'method' => 'delete']) !!}
          <div class='btn-group'>
            <a href="{{ route('invoices.show', [$invoice->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
            <a href="{{ route('invoices.edit', [$invoice->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
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