<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="robots" content="noindex" />
  <title>{{config('app.name')}}</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 4.1.1 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
  <!-- Bootstrap Datepicker 1.9.0 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <!-- Bootstrap DataTable -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/css/coreui.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/coreui-icons-free@1.0.1-alpha.1/coreui-icons-free.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">

  <link href="/css/admin/style.css?20230320" rel="stylesheet">

</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
  <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">
    <img class="navbar-brand-full" src="/img/logo.png" width="130" height="20"
       alt="InfyOm Logo">
    <img class="navbar-brand-minimized" src="/img/logo.png" width="100"
       height="30" alt="InfyOm Logo">
  </a>
  <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
    <span class="navbar-toggler-icon"></span>
  </button>

  <ul class="nav navbar-nav ml-auto">
    <li class="nav-item d-md-down-none">
      {{ config('const.admin.role_list.'.Auth::user()->role) }}
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link" style="margin: 0 10px" data-toggle="dropdown" href="#" role="button"
         aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header text-center">
          <strong>Account</strong>
        </div>
        <a class="dropdown-item" href="{{ url('/logout') }}" class="btn btn-default btn-flat"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fa fa-lock"></i>LOG OUT
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <a class="dropdown-item" href="{{ url('/admin/password') }}" class="btn btn-default btn-flat">
          <i class="fa fa-edit"></i>Password
        </a>
      </div>
    </li>
  </ul>
</header>

<div class="app-body">
  @include('admin.layouts.sidebar')
  <main class="main">
    @yield('content')
  </main>
</div>
<footer class="app-footer">
  <div>&copy; passage LLC. All Rights Reserved.</div>
  <div class="ml-auto">JCS Ver. 4.0.0</div>
</footer>
</body>
<!-- jQuery 3.1.1 -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
<!-- Bootstrap DataTable -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

@stack('scripts')

</html>
