<div class="table-responsive-sm">
  <table class="table table-striped" id="admins-table" style="width: 100%;">
    <thead>
      <tr>
        <th>Id</th>
        <th>Role</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($admins as $admin)
      <tr>
        <td>{{ $admin->id }}</td>
        <td>{{ config('const.admin.role_list.'.$admin->role) }}</td>
        <td>{{ $admin->name }}</td>
        <td>{{ $admin->email }}</td>
        <td>
          {!! Form::open(['route' => ['admins.destroy', $admin->id], 'method' => 'delete']) !!}
          <div class='btn-group'>
            <a href="{{ route('admins.show', [$admin->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
            <a href="{{ route('admins.edit', [$admin->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
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