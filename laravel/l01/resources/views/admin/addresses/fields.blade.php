<!-- User Id Field -->
{!! Form::hidden('user_id', $user->id) !!}

<!-- Name Field -->
<div class="form-group col-sm-6">
  {!! Form::label('name', 'Address book name:') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
@if ($errors->has('name'))
  <p class="form-error">{{ $errors->first('name') }}</p>
@endif
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
  {!! Form::label('type', 'Type:') !!}
  {!! Form::select('type', config('const.address.type_list'), null, ['class' => 'form-control']) !!}
@if ($errors->has('type'))
  <p class="form-error">{{ $errors->first('type') }}</p>
@endif
</div>

<!-- Recipient Field -->
<div class="form-group col-sm-6">
  {!! Form::label('recipient', 'Recipient name:') !!}
  {!! Form::text('recipient', null, ['class' => 'form-control']) !!}
@if ($errors->has('recipient'))
  <p class="form-error">{{ $errors->first('recipient') }}</p>
@endif
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
  {!! Form::label('country', 'Country / Region:') !!}
  {!! Form::text('country', null, ['class' => 'form-control']) !!}
@if ($errors->has('country'))
  <p class="form-error">{{ $errors->first('country') }}</p>
@endif
</div>

<!-- Address1 Field -->
<div class="form-group col-sm-6">
  {!! Form::label('address1', 'Address line 1:') !!}
  {!! Form::text('address1', null, ['class' => 'form-control']) !!}
@if ($errors->has('address1'))
  <p class="form-error">{{ $errors->first('address1') }}</p>
@endif
</div>

<!-- Address2 Field -->
<div class="form-group col-sm-6">
  {!! Form::label('address2', 'Address line 2:') !!}
  {!! Form::text('address2', null, ['class' => 'form-control']) !!}
@if ($errors->has('address2'))
  <p class="form-error">{{ $errors->first('address2') }}</p>
@endif
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
  {!! Form::label('city', 'Town / City:') !!}
  {!! Form::text('city', null, ['class' => 'form-control']) !!}
@if ($errors->has('city'))
  <p class="form-error">{{ $errors->first('city') }}</p>
@endif
</div>

<!-- County Field -->
<div class="form-group col-sm-6">
  {!! Form::label('county', 'County / State / Province:') !!}
  {!! Form::text('county', null, ['class' => 'form-control']) !!}
@if ($errors->has('county'))
  <p class="form-error">{{ $errors->first('county') }}</p>
@endif
</div>

<!-- Post Field -->
<div class="form-group col-sm-6">
  {!! Form::label('post', 'Postal code / Zip:') !!}
  {!! Form::text('post', null, ['class' => 'form-control']) !!}
@if ($errors->has('post'))
  <p class="form-error">{{ $errors->first('post') }}</p>
@endif
</div>

<!-- Default Field -->
<div class="form-group col-sm-6">
  {!! Form::label('default', 'Default:') !!}
  {!! Form::select('default', config('const.check.list'), null, ['class' => 'form-control']) !!}
@if ($errors->has('default'))
  <p class="form-error">{{ $errors->first('default') }}</p>
@endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-secondary">Cancel</a>
</div>
