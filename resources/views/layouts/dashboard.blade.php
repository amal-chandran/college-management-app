<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Basic') }}</title>

  <!-- Bootstrap CSS -->
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
  <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/tableexport.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />

</head>

<body>
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>



        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('index') }}" class="nav-link" title="Logout">
            <span class="fas fa-home" aria-hidden="true"></span> Home
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          {!! Form::open([
          'method' =>'POST',
          'route' => ['logout'],
          'style' => 'display: inline;',
          ]) !!}

          {!! Form::button('<span class="fas fa-sign-out-alt" aria-hidden="true"></span> Logout',
          [
          'type' => 'submit',
          'class' => 'nav-link text-primary',
          'title' => 'Logout',
          'style'=>'background:none;border:none;'
          ])
          !!}

          {!! Form::close() !!}
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link text-center">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8"> --}}
        <span class="brand-text  font-weight-light">{{ config('app.name', 'Basic') }}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          @auth

          <div class="image">
            <img src="{{Avatar::create(Auth::user()->name)->toBase64()}}" class="img-circle elevation-2"
              alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
          </div>
          @endauth
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          {{
                Menu::new()
                ->addItemClass("nav-link")
                ->addItemParentClass("nav-item")
                ->addClass("nav nav-pills nav-sidebar flex-column")
                ->actionIf(Auth::user()->can('menu-dashboard'),"DashboardController@index",'<i class="nav-icon fas fa-tachometer-alt"></i> Dashboard')
                ->actionIf(Auth::user()->can('menu-attendances'),"AttendancesController@index",'<i class="nav-icon fas fa-crown"></i> Attendance')
                ->actionIf(Auth::user()->can('menu-slots'),"SlotsController@index",'<i class="nav-icon fas fa-crosshairs"></i> Slots')
                ->actionIf(Auth::user()->can('menu-subjects'),"SubjectsController@index",'<i class="nav-icon fas fa-cubes"></i> Subjects')
                ->actionIf(Auth::user()->can('menu-student-class'),"StudentClassesController@index",'<i class="nav-icon fas fa-cube"></i> Student Class')
                ->actionIf(Auth::user()->can('menu-users'),"UsersController@index",'<i class="nav-icon fas fa-users"></i> Users')
                ->actionIf(Auth::user()->can('menu-roles'),"RolesController@index",'<i class="nav-icon fas fa-shield-alt"></i> Roles')
                ->actionIf(Auth::user()->can('menu-permissions'),"PermissionsController@index",'<i class="nav-icon fas fa-shield-alt"></i> Permissions')
                }}
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">@yield("name")</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Starter Page</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          @yield("content")
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        <i class="fa text-info fa-code mr-2"></i> with <i class="fa text-danger fa-heart ml-2"></i>
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2019 <a href="#">{{ config('app.name', 'Basic') }}</a>.</strong> All rights
      reserved.
    </footer>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/adminlte.min.js') }}"></script>
  <script src="{{ asset('js/moment.min.js') }}"></script>
  <script src="{{ asset('js/daterangepicker.js') }}"></script>
  <script src="{{ asset('js/datatables.min.js') }}"></script>
  <script src="{{ asset('js/Blob.min.js') }}"></script>
  <script src="{{ asset('js/FileSaver.min.js') }}"></script>
  <script src="{{ asset('js/xlsx.full.min.js') }}"></script>
  <script src="{{ asset('js/tableexport.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

  <script>
    $(function() {
        $('.datepicker').daterangepicker({
          singleDatePicker: true,
          showDropdowns: true,
          locale: {
            format: 'Y-MM-DD'
          }
        });

        $('.datetimepicker').daterangepicker({
          singleDatePicker: true,
          showDropdowns: true,
          timePicker: true,
          autoApply: true,
          locale: {
            format: 'Y-MM-DD h:mm:ss A'
          }
        });
      });
  </script>
  @stack('scripts')
</body>

</html>