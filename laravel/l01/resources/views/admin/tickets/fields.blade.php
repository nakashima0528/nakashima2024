<!-- User Id Field -->
{!! Form::hidden('user_id', $user->id) !!}

<!-- Status Field -->
<div class="form-group col-sm-6">
  {!! Form::label('status', 'Status:') !!}
  {!! Form::select('status', config('const.ticket.status_list'), null, ['class' => 'form-control']) !!}
@if ($errors->has('status'))
  <p class="form-error">{{ $errors->first('status') }}</p>
@endif
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
  {!! Form::label('description', 'Description:') !!}
  {!! Form::text('description', null, ['class' => 'form-control']) !!}
@if ($errors->has('description'))
  <p class="form-error">{{ $errors->first('description') }}</p>
@endif
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
  {!! Form::label('quantity', 'Quantity:') !!}
  {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
@if ($errors->has('quantity'))
  <p class="form-error">{{ $errors->first('quantity') }}</p>
@endif
</div>

<!-- Unit Field -->
<div class="form-group col-sm-6">
  {!! Form::label('unit', 'Unit:') !!}
  {!! Form::text('unit', null, ['class' => 'form-control']) !!}
@if ($errors->has('unit'))
  <p class="form-error">{{ $errors->first('unit') }}</p>
@endif
</div>

<!-- Notes Field -->
<div class="form-group col-sm-6">
  {!! Form::label('notes', 'Notes:') !!}
  {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
@if ($errors->has('notes'))
  <p class="form-error">{{ $errors->first('notes') }}</p>
@endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  @can(config('const.admin.role.GENERAL'))
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  @endcan
  <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-secondary">Cancel</a>
</div>
