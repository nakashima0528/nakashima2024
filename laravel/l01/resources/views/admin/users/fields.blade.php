<!-- Status Field -->
<div class="form-group col-sm-6">
	{!! Form::label('status', 'Status:') !!}
	{!! Form::select('status', config('const.user.status_list'), null, ['class' => 'form-control']) !!}
@if ($errors->has('status'))
  <p class="form-error">{{ $errors->first('status') }}</p>
@endif
</div>

<!-- Identity Field -->
<div class="form-group col-sm-6">
	{!! Form::label('identity', 'Identity verification:') !!}
	{!! Form::select('identity', config('const.check.list'), null, ['class' => 'form-control']) !!}
@if ($errors->has('identity'))
  <p class="form-error">{{ $errors->first('identity') }}</p>
@endif
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::select('title', config('const.user.title_list'), null, ['class' => 'form-control']) !!}
@if ($errors->has('title'))
  <p class="form-error">{{ $errors->first('title') }}</p>
@endif
</div>

<!-- Forename Field -->
<div class="form-group col-sm-6">
	{!! Form::label('forename', 'Forename(s):') !!}
	{!! Form::text('forename', null, ['class' => 'form-control']) !!}
@if ($errors->has('forename'))
  <p class="form-error">{{ $errors->first('forename') }}</p>
@endif
</div>

<!-- Surname Field -->
<div class="form-group col-sm-6">
	{!! Form::label('surname', 'Surname:') !!}
	{!! Form::text('surname', null, ['class' => 'form-control']) !!}
@if ($errors->has('surname'))
  <p class="form-error">{{ $errors->first('surname') }}</p>
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

<!-- Birth Field -->
<div class="form-group col-sm-6">
	{!! Form::label('birth', 'Date of birth:') !!}
	{!! Form::text('birth', null, ['class' => 'form-control','id'=>'birth']) !!}
@if ($errors->has('birth'))
  <p class="form-error">{{ $errors->first('birth') }}</p>
@endif
</div>

@push('scripts')
  <script type="text/javascript">
		$('#birth').datepicker({
			format: 'yyyy-mm-dd',
		})
	</script>
@endpush

<!-- Notes Field -->
<div class="form-group col-sm-6">
	{!! Form::label('notes', 'Notes:') !!}
	{!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
@if ($errors->has('notes'))
  <p class="form-error">{{ $errors->first('notes') }}</p>
@endif
</div>

<!-- Password Field -->
@if(!isset($user))
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
	<a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
</div>
