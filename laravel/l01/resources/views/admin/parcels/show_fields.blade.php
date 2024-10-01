<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Parcel #:') !!}
    <p>{{ $parcel->id }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ config('const.parcel.status_list.'.$parcel->status) }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', 'Shipping address:') !!}
    <p>{{ $parcel->address ? $parcel->address->country : 'Not set' }}</p>
</div>

<!-- Weight Field -->
<div class="form-group">
    {!! Form::label('weight', 'Weight:') !!}
    <p>{{ number_format($parcel->weight) }}</p>
</div>

<!-- Additional Field -->
<div class="form-group">
    {!! Form::label('additional', 'Additional storage days:') !!}
    <p>{{ number_format($parcel->additional) }}</p>
</div>

<!-- Shipment Field -->
<div class="form-group">
    {!! Form::label('shipping', 'Shipment:') !!}
    <p>{{ config('const.shipment.list.'.$parcel->shipment) }}</p>
</div>

<!-- EMS Postage Field -->
<div class="form-group">
    {!! Form::label('ems_postage', 'EMS postage:') !!}
    <p>{{ number_format($parcel->ems_postage) }}</p>
</div>

<!-- SAL Postage Field -->
<div class="form-group">
    {!! Form::label('sal_postage', 'SAL postage:') !!}
    <p>{{ number_format($parcel->sal_postage) }}</p>
</div>

<!-- OTHER Postage Field -->
<div class="form-group">
    {!! Form::label('other_postage', 'OTHER postage:') !!}
    <p>{{ number_format($parcel->other_postage) }}</p>
</div>

<!-- Stored Field -->
<div class="form-group">
    {!! Form::label('stored', 'Stored date:') !!}
    <p>{{ $parcel->stored }}</p>
</div>

<!-- Shipped Field -->
<div class="form-group">
    {!! Form::label('shipped', 'Shipped date:') !!}
    <p>{{ $parcel->shipped }}</p>
</div>

<!-- Reference Field -->
<div class="form-group">
    {!! Form::label('reference', 'Tracking number:') !!}
    <p>{{ $parcel->reference }}</p>
</div>

<!-- Notes Field -->
<div class="form-group">
    {!! Form::label('notes', 'Notes:') !!}
    <p>{{ $parcel->notes }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created date:') !!}
    <p>{{ $parcel->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated date:') !!}
    <p>{{ $parcel->updated_at }}</p>
</div>

