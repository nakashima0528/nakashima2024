<!-- User Id Field -->
{!! Form::hidden('user_id', $user->id) !!}

<!-- Status Field -->
<div class="form-group col-sm-6">
  {!! Form::label('status', 'Status:') !!}
  {!! Form::select('status', config('const.parcel.status_list'), null, ['class' => 'form-control']) !!}
@if ($errors->has('status'))
  <p class="form-error">{{ $errors->first('status') }}</p>
@endif
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
  {!! Form::label('address_id', 'Shipping address:') !!}
  {!! Form::select('address_id', $selectAddresses, null, ['class' => 'form-control']) !!}
@if ($errors->has('address_id'))
  <p class="form-error">{{ $errors->first('address_id') }}</p>
@endif
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6">
  {!! Form::label('weight', 'Weight:') !!}
  {!! Form::number('weight', null, ['class' => 'form-control']) !!}
@if ($errors->has('weight'))
  <p class="form-error">{{ $errors->first('weight') }}</p>
@endif
</div>

<!-- Additional Field -->
<div class="form-group col-sm-6">
  {!! Form::label('additional', 'Additional storage days:') !!}
  {!! Form::number('additional', isset($parcel->additional) ? $parcel->additional : 0 , ['class' => 'form-control']) !!}
@if ($errors->has('additional'))
  <p class="form-error">{{ $errors->first('additional') }}</p>
@endif
</div>

<!-- Shipment Field -->
@if(isset($parcel))
<div class="form-group col-sm-6">
  {!! Form::label('shipment', 'Shipment:') !!}
  {!! Form::select('shipment', config('const.shipment.list'), null, ['class' => 'form-control','placeholder' => '']) !!}
  @if ($errors->has('shipment'))
  <p class="form-error">{{ $errors->first('shipment') }}</p>
  @endif
</div>
@else
  {!! Form::hidden('shipment', config('const.shipment.cd.EMS')) !!}
@endif

<!-- Ems_postage Field -->
<div class="form-group col-sm-6">
  {!! Form::label('ems_postage', 'EMS postage:') !!}
  {!! Form::number('ems_postage', null, ['class' => 'form-control']) !!}
@if ($errors->has('ems_postage'))
  <p class="form-error">{{ $errors->first('ems_postage') }}</p>
@endif
</div>

<!-- Sal_postage Field -->
<div class="form-group col-sm-6">
  {!! Form::label('sal_postage', 'SAL postage:') !!}
  {!! Form::number('sal_postage', null, ['class' => 'form-control']) !!}
@if ($errors->has('sal_postage'))
  <p class="form-error">{{ $errors->first('sal_postage') }}</p>
@endif
</div>

<!-- Other_postage Field -->
<div class="form-group col-sm-6">
  {!! Form::label('other_postage', 'OTHER postage:') !!}
  {!! Form::number('other_postage', null, ['class' => 'form-control']) !!}
  @if ($errors->has('other_postage'))
  <p class="form-error">{{ $errors->first('other_postage') }}</p>
@endif
</div>

<!-- Stored Field -->
<div class="form-group col-sm-6">
  {!! Form::label('stored', 'Stored date:') !!}
  {!! Form::text('stored', null, ['class' => 'form-control','id'=>'stored']) !!}
@if ($errors->has('stored'))
  <p class="form-error">{{ $errors->first('stored') }}</p>
@endif
</div>

@push('scripts')
   <script type="text/javascript">
       $('#stored').datetimepicker({
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

<!-- Shipped Field -->
<div class="form-group col-sm-6">
  {!! Form::label('shipped', 'Shipped date:') !!}
  {!! Form::text('shipped', null, ['class' => 'form-control','id'=>'shipped']) !!}
@if ($errors->has('shipped'))
  <p class="form-error">{{ $errors->first('shipped') }}</p>
@endif
</div>

@push('scripts')
   <script type="text/javascript">
       $('#shipped').datetimepicker({
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

<!-- Reference Field -->
<div class="form-group col-sm-6">
  {!! Form::label('reference', 'Tracking number:') !!}
  {!! Form::text('reference', null, ['class' => 'form-control']) !!}
@if ($errors->has('reference'))
  <p class="form-error">{{ $errors->first('reference') }}</p>
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
