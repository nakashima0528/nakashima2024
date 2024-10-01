<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Parcel #:') !!}
    <p>{{ $ticket->id }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ config('const.ticket.status_list.'.$ticket->status) }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $ticket->description }}</p>
</div>

<!-- Quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $ticket->quantity }}</p>
</div>

<!-- RefeUnitrence Field -->
<div class="form-group">
    {!! Form::label('unit', 'Unit:') !!}
    <p>{{ $ticket->unit }}</p>
</div>

<!-- Notes Field -->
<div class="form-group">
    {!! Form::label('notes', 'Notes:') !!}
    <p>{{ $ticket->notes }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created date:') !!}
    <p>{{ $ticket->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated date:') !!}
    <p>{{ $ticket->updated_at }}</p>
</div>

