<div class="table-responsive-sm">
  <table class="table table-striped" id="users-table" style="width: 100%;">
    <thead>
      <tr>
        <th>Id</th>
        <th>Status</th>
        <th>Identity</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{ Helper::getAccountNo($user->id) }}</td>
        <td>{{ config('const.user.status_list.'.$user->status) }}</td>
        <td>{{ config('const.check.list.'.$user->identity) }}</td>
        <td>{{ config('const.user.title_list.'.$user->title) }} {{ $user->forename }} {{ $user->surname }}</td>
        <td>{{ $user->email }}</td>
        <td>
          {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
          <div class='btn-group'>
            <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
            <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
            @can(config('const.admin.role.GENERAL'))
            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure you want to proceed?')"]) !!}
            @endcan
            @can(config('const.admin.role.SYSTEM'))
            <a href="{{ route('admin.proxy', [$user->id]) }}" class='btn btn-ghost-success'><i class="fa fa-key"></i></a>
            @endcan
          </div>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

