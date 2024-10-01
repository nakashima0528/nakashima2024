<!-- Parcel Id Field -->
{!! Form::hidden('parcel_id', $parcel->id) !!}

<!-- Description Field -->
<div class="form-group col-sm-6">
  {!! Form::label('name', 'Description:') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
@if ($errors->has('name'))
  <p class="form-error">{{ $errors->first('name') }}</p>
@endif
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
  {!! Form::label('quantity', 'Quantity:') !!}
  {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
@if ($errors->has('quantity'))
  <p class="form-error">{{ $errors->first('quantity') }}</p>
@endif
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
  {!! Form::label('value', 'Value:') !!}
  {!! Form::number('value', null, ['class' => 'form-control']) !!}
@if ($errors->has('value'))
  <p class="form-error">{{ $errors->first('value') }}</p>
@endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  @can(config('const.admin.role.GENERAL'))
   {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  @endcan
  <a href="{{ route('parcels.show',$parcel->id) }}" class="btn btn-secondary">Cancel</a>
</div>
