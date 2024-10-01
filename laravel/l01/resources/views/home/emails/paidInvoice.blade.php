@extends('layouts.mail_app')

@section('body')
Invoice paid

-----------------------------

JP{{ $data['user']['id'] }}
Invoice #{{ $data['invoice']['id'] }}

{{ route('invoices.show', [$data['invoice']['id']]) }}
@endsection
