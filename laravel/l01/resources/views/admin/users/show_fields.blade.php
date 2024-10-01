<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ Helper::getAccountNo($user->id) }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ config('const.user.status_list.'.$user->status) }}</p>
</div>

<!-- Identity Field -->
<div class="form-group">
    {!! Form::label('identity', 'Identity verification:') !!}
    <p>{{ config('const.check.list.'.$user->identity) }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ config('const.user.title_list.'.$user->title) }} {{ $user->forename }} {{ $user->surname }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Birth Field -->
<div class="form-group">
    {!! Form::label('birth', 'Date of birth:') !!}
    <p>{{ $user->birth }}</p>
</div>

<!-- Notes Field -->
<div class="form-group">
    {!! Form::label('remarks', 'Notes:') !!}
    <p>{{ $user->notes }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created date:') !!}
    <p>{{ $user->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated date:') !!}
    <p>{{ $user->updated_at }}</p>
</div>

