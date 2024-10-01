@extends('layouts.home_app')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">PARCEL INFORMATION</li>
    </ol>
@endsection

@section('content')
          <h2>PARCEL INFORMATION</h2>
  @if(count($parcels) > 0)

          <table class="parcelTable">
            <tbody>
    @foreach ($parcels as $parcel)

              <tr>
                <td><label class="parcelStatus parcelStatus--{{ $parcel->status }}">{{ config('const.parcel.status_list.'.$parcel->status) }}</label></td>
                <td>#{{ $parcel->id }}</td>
                <td>{{ Helper::getParcelDatToStatus($parcel) }}</td>
                <td>
                  {!! Form::open(['route' => ['home.parcel.show'], 'method' => 'post']) !!}
                    {!! Form::hidden('id', $parcel->id) !!}
                    {!! Form::button('Detail', ['type' => 'submit', 'class' => 'arrowBtnEdit']) !!}
                  {!! Form::close() !!}
                </td>								
              </tr>
    @endforeach

            </tbody>
          </table>
  @else

          <p>No parcel information.</p>
  @endif

  {!! $parcels->links() !!}

@endsection
