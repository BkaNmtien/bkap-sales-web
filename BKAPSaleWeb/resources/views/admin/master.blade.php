<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('asset-admin')}}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url('asset-admin')}}/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{url('asset-admin')}}/css/AdminLTE.css">
  <link rel="stylesheet" href="{{url('asset-admin')}}/css/_all-skins.min.css">
  <link rel="stylesheet" href="{{url('asset-admin')}}/css/jquery-ui.css">
  <link rel="stylesheet" href="{{url('asset-admin')}}/css/style.css" />
  <script src="{{url('asset-admin')}}/js/angular.min.js"></script>
  <script src="{{url('asset-admin')}}/js/app.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @include('admin.layouts.header')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  @include('admin.layouts.menu')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2022 <a href="">TTPM_BKAP</a>.</strong>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="{{url('asset-admin')}}/js/jquery.min.js"></script>
<script src="{{url('asset-admin')}}/js/jquery-ui.js"></script>
<script src="{{url('asset-admin')}}/js/bootstrap.min.js"></script>
<script src="{{url('asset-admin')}}/js/adminlte.min.js"></script>
<script src="{{url('asset-admin')}}/js/dashboard.js"></script>
@yield('script-tiny')
<script src="{{url('asset-admin')}}/js/function.js"></script>
</body>
</html>
