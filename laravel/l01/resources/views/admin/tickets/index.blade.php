@extends('admin.layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Tickets</li>
  </ol>
  <div class="container-fluid">
    <div class="animated fadeIn">
       @include('flash::message')
       <div class="row">
         <div class="col-lg-12">
           <div class="card">
             <div class="card-header">
               <i class="fa fa-align-justify"></i>
               Tickets
             </div>
             <div class="card-body">
               @include('admin.tickets.table')
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
    $('#tickets-table').DataTable({
        "order": []
    });
  });
</script>
@endpush
