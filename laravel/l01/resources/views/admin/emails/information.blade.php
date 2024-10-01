@component('mail::message')
# {!! $data['salutation'] !!}

{!! nl2br($data['body']) !!}

@if($data['button'])
@component('mail::button', ['url' => url('/login')])
Sign In
@endcomponent
@else
<br>
@endif

{!! nl2br($data['footer']) !!}
@endcomponent
