@extends('layouts.app')
@section('title', 'Error')

@section('content')
  <div class="wrap mt3">
    <div class="errorBox">
      <h1>Error</h1>
      {{ $msg }}
    </div>
  </div>
@endsection
