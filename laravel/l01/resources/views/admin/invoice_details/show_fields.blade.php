<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ config('const.invoice_details.type_list.'.$invoiceDetail->type) }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Item description:') !!}
    <p>{{ $invoiceDetail->name }}</p>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', 'Amount:') !!}
    <p>{{ number_format($invoiceDetail->value) }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created date:') !!}
    <p>{{ $invoiceDetail->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated date:') !!}
    <p>{{ $invoiceDetail->updated_at }}</p>
</div>

