<!-- Invoice Id Field -->
{!! Form::hidden('invoice_id', $invoice->id) !!}

<!-- Type Field -->
@if(isset($invoiceDetail))
<div class="form-group col-sm-6">
  {!! Form::label('type', 'Type:') !!}
  {!! Form::select('type', config('const.invoice_details.type_list'), null, ['class' => 'form-control','disabled' => 'disabled']) !!}
  {!! Form::hidden('type', $invoiceDetail->type) !!}
  @if ($errors->has('type'))
  <p class="form-error">{{ $errors->first('type') }}</p>
  @endif
</div>
@else
  {!! Form::hidden('type', config('const.invoice_details.type.ANY')) !!}
@endif

<!-- Name Field -->
<div class="form-group col-sm-6">
  {!! Form::label('name', 'Item description:') !!}
  {!! Form::text('name', null, ['class' => 'form-control','list' => 'nameList']) !!}
  <datalist id="nameList">
@foreach(config('const.invoice_details.name_list') as $key => $name)
    <option value="{{ $name }}">
@endforeach
  </datalist>
@if ($errors->has('name'))
  <p class="form-error">{{ $errors->first('name') }}</p>
@endif
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
  {!! Form::label('value', 'Amount:') !!}
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
  <a href="{{ route('invoices.show',$invoice->id) }}" class="btn btn-secondary">Cancel</a>
</div>
