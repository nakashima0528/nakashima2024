@extends('admin.layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Parcels</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
       @include('flash::message')
       <div class="row">
         <div class="col-lg-12">
           <div class="card">
             <div class="card-header">
               <i class="fa fa-align-justify"></i>
               Parcels
               @can(config('const.admin.role.GENERAL'))
               <a class="btn btn-ghost-info pull-right" href="{{ route('csv.parcel') }}"><i class="fa fa-download fa-lg"></i></a>
               @endcan
             </div>
             <div class="card-body">
               @include('admin.parcels.table')
                <div class="pull-right mr-3">
                   
                </div>
             </div>
           </div>
          </div>
       </div>
     </div>
  </div>
@endsection

@push('scripts')
<script type="text/javascript">
  $(document).ready(function () {
    $('#parcels-table').DataTable({
        "order": []
    });
  });
</script>
@endpush
