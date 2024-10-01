<!-- User Id Field -->
{!! Form::hidden('user_id', $user->id) !!}

<!-- Status Field -->
<div class="form-group col-sm-6">
  {!! Form::label('status', 'Status:') !!}
  {!! Form::select('status', config('const.invoice.status_list'), null, ['class' => 'form-control']) !!}
@if ($errors->has('status'))
  <p class="form-error">{{ $errors->first('status') }}</p>
@endif
</div>

<!-- Type Field -->
@if(isset($invoice))
<div class="form-group col-sm-6">
  {!! Form::label('type', 'Type:') !!}
  {!! Form::select('type', config('const.invoice.type_list'), null, ['class' => 'form-control','disabled' => 'disabled']) !!}
  {!! Form::hidden('type', $invoice->type) !!}
@if ($errors->has('type'))
  <p class="form-error">{{ $errors->first('type') }}</p>
@endif
</div>
@else
  {!! Form::hidden('type', config('const.invoice.type.PCS')) !!}
@endif

<!-- Parcel Id Field -->
@if(isset($invoice))
<div class="form-group col-sm-6">
  {!! Form::label('parcel_id', 'Parcel #:') !!}
  {!! Form::number('parcel_id', null, ['class' => 'form-control','disabled' => 'disabled']) !!}
@if ($errors->has('parcel_id'))
  <p class="form-error">{{ $errors->first('parcel_id') }}</p>
@endif
</div>
@endif

<!-- Method Field -->
<div class="form-group col-sm-6">
  {!! Form::label('method', 'Method:') !!}
  {!! Form::select('method', config('const.invoice.method_list'), null, ['class' => 'form-control','placeholder' => '']) !!}
@if ($errors->has('method'))
  <p class="form-error">{{ $errors->first('method') }}</p>
@endif
</div>

<!-- Issued Field -->
<div class="form-group col-sm-6">
  {!! Form::label('issued', 'Issued date:') !!}
  {!! Form::text('issued', null, ['class' => 'form-control','id'=>'issued']) !!}
@if ($errors->has('issued'))
  <p class="form-error">{{ $errors->first('issued') }}</p>
@endif
</div>

@push('scripts')
   <script type="text/javascript">
       $('#issued').datetimepicker({
         format: 'YYYY-MM-DD HH:mm:ss',
         useCurrent: true,
         icons: {
           up: "icon-arrow-up-circle icons font-2xl",
           down: "icon-arrow-down-circle icons font-2xl"
         },
         sideBySide: true
       })
     </script>
@endpush

<!-- Paid Field -->
<div class="form-group col-sm-6">
  {!! Form::label('paid', 'Paid date:') !!}
  {!! Form::text('paid', null, ['class' => 'form-control','id'=>'paid']) !!}
@if ($errors->has('paid'))
  <p class="form-error">{{ $errors->first('paid') }}</p>
@endif
</div>

@push('scripts')
   <script type="text/javascript">
       $('#paid').datetimepicker({
         format: 'YYYY-MM-DD HH:mm:ss',
         useCurrent: true,
         icons: {
           up: "icon-arrow-up-circle icons font-2xl",
           down: "icon-arrow-down-circle icons font-2xl"
         },
         sideBySide: true
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

<!-- Submit Field -->
<div class="form-group col-sm-12">
  @can(config('const.admin.role.GENERAL'))
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	@endcan
  <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-secondary">Cancel</a>
</div>
