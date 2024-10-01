<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Invoice #:') !!}
    <p>{{ $invoice->id }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ config('const.invoice.status_list.'.$invoice->status) }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ config('const.invoice.type_list.'.$invoice->type) }}</p>
</div>

<!-- Parcel Id Field -->
<div class="form-group">
    {!! Form::label('parcel_id', 'Parcel #:') !!}
    <p>{{ $invoice->parcel_id }}</p>
</div>

<!-- Method Field -->
<div class="form-group">
    {!! Form::label('method', 'Method:') !!}
    <p>{{ config('const.invoice.method_list.'.$invoice->method) }}</p>
</div>

<!-- Issued Field -->
<div class="form-group">
    {!! Form::label('issued', 'Issued date:') !!}
    <p>{{ $invoice->issued }}</p>
</div>

<!-- Paid Field -->
<div class="form-group">
    {!! Form::label('paid', 'Paid date:') !!}
    <p>{{ $invoice->paid }}</p>
</div>

<!-- Notes Field -->
<div class="form-group">
    {!! Form::label('notes', 'Notes:') !!}
    <p>{{ $invoice->notes }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created date:') !!}
    <p>{{ $invoice->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated date:') !!}
    <p>{{ $invoice->updated_at }}</p>
</div>

