<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Address book name:') !!}
    <p>{{ $address->name }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{{ config('const.address.type_list.'.$address->type) }}</p>
</div>

<!-- Recipient Field -->
<div class="form-group">
    {!! Form::label('recipient', 'Recipient name:') !!}
    <p>{{ $address->recipient }}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', 'Country / Region:') !!}
    <p>{{ $address->country }}</p>
</div>

<!-- Address1 Field -->
<div class="form-group">
    {!! Form::label('address1', 'Address line 1:') !!}
    <p>{{ $address->address1 }}</p>
</div>

<!-- Address2 Field -->
<div class="form-group">
    {!! Form::label('address2', 'Address line 2:') !!}
    <p>{{ $address->address2 }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', 'Town / City:') !!}
    <p>{{ $address->city }}</p>
</div>

<!-- County Field -->
<div class="form-group">
    {!! Form::label('county', 'County / State / Province:') !!}
    <p>{{ $address->county }}</p>
</div>

<!-- Post Field -->
<div class="form-group">
    {!! Form::label('post', 'Postal code / Zip:') !!}
    <p>{{ $address->post }}</p>
</div>

<!-- Default Field -->
<div class="form-group">
    {!! Form::label('default', 'Default:') !!}
    <p>{{ config('const.check.list.'.$address->default) }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created date:') !!}
    <p>{{ $address->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated date:') !!}
    <p>{{ $address->updated_at }}</p>
</div>

