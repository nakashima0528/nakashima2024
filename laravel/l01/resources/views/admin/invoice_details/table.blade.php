<div class="table-responsive-sm">
  <table class="table table-striped" id="invoiceDetails-table">
    <thead>
      <tr>
        <th>Type</th>
        <th>Item description</th>
        <th>Amount</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($invoiceDetails as $invoiceDetail)
      <tr>
        <td>{{ config('const.invoice_details.type_list.'.$invoiceDetail->type) }}</td>
        <td>{{ $invoiceDetail->name }}</td>
        <td>{{ number_format($invoiceDetail->value) }}</td>
        <td>
          {!! Form::open(['route' => ['invoiceDetails.destroy', $invoiceDetail->id], 'method' => 'delete']) !!}
          <div class='btn-group'>
            <a href="{{ route('invoiceDetails.show', [$invoiceDetail->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
            <a href="{{ route('invoiceDetails.edit', [$invoiceDetail->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
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