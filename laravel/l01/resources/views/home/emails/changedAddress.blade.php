@extends('layouts.mail_app')

@section('body')
Shipping address changed

-----------------------------

JP{{ $data['user']['id'] }}
Parcel #{{ $data['parcel']['id'] }}

{{ route('parcels.show', [$data['parcel']['id']]) }}
@endsection
