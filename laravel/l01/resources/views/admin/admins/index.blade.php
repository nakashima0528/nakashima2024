@extends('admin.layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Admins</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
       @include('flash::message')
       <div class="row">
         <div class="col-lg-12">
           <div class="card">
             <div class="card-header">
               <i class="fa fa-align-justify"></i>
               Admins
               <a class="btn btn-ghost-info pull-right" href="{{ route('admins.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
             </div>
             <div class="card-body">
               @include('admin.admins.table')
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
    $('#admins-table').DataTable({
        "order": []
    });
  });
</script>
@endpush
