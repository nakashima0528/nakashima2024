<!-- Role Field -->
<div class="form-group col-sm-6">
  {!! Form::label('role', 'Role:') !!}
  {!! Form::select('role', config('const.admin.role_list'), null, ['class' => 'form-control']) !!}
@if ($errors->has('role'))
  <p class="form-error">{{ $errors->first('role') }}</p>
@endif
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
  {!! Form::label('name', 'Name:') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
@if ($errors->has('name'))
  <p class="form-error">{{ $errors->first('name') }}</p>
@endif
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
  {!! Form::label('email', 'Email:') !!}
  {!! Form::email('email', null, ['class' => 'form-control']) !!}
@if ($errors->has('email'))
  <p class="form-error">{{ $errors->first('email') }}</p>
@endif
</div>

<!-- Password Field -->
@if(!isset($admin))
<div class="form-group col-sm-6">
  {!! Form::label('password', 'Password:') !!}
  {!! Form::password('password', ['class' => 'form-control']) !!}
  @if ($errors->has('password'))
  <p class="form-error">{{ $errors->first('password') }}</p>
  @endif
</div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
  @can(config('const.admin.role.GENERAL'))
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  @endcan
  <a href="{{ route('admins.index') }}" class="btn btn-secondary">Cancel</a>
</div>
