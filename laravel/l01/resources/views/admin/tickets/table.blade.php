<div class="table-responsive-sm">
  <table class="table table-striped" id="tickets-table" style="width: 100%;">
    <thead>
      <tr>
        <th>Tickets #</th>
      @if(!isset($user_off))
        <th>User</th>
      @endif
        <th>Status</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($tickets as $ticket)
      <tr>
        <td>{{ $ticket->id }}</td>
      @if(!isset($user_off))
        <td>{{ Helper::getAccountNo($ticket->user_id) }}</td>
      @endif
        <td>{{ config('const.ticket.status_list.'.$ticket->status) }}</td>
        <td>{{ $ticket->description }}</td>
        <td>{{ $ticket->quantity }}</td>
        <td>{{ $ticket->unit }}</td>
        <td>
          {!! Form::open(['route' => ['tickets.destroy', $ticket->id], 'method' => 'delete']) !!}
          <div class='btn-group'>
            <a href="{{ route('tickets.show', [$ticket->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
            <a href="{{ route('tickets.edit', [$ticket->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
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