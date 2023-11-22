<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href='{{asset("assets/dist/css/adminlte.min.css")}}'>
    <!-- overlayScrollbars e-->
    <link rel="stylesheet" href='{{asset("assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}'>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include('admin.adminNavbar')
    <!-- /.navbar -->
    @include('admin.adminSidebar')
    <!-- Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('adminContent')
    </div>
    @include('admin.adminFooter')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src='{{asset("assets/plugins/jquery/jquery.min.js")}}'></script>
<!-- jQuery UI 1.11.4 -->
<script src='{{asset("assets/plugins/jquery-ui/jquery-ui.min.js")}}'></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


<!-- overlayScrollbars -->
<script src='{{asset("assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}'></script>
<!-- AdminLTE App -->
<script src='{{asset("assets/dist/js/adminlte.js")}}'></script>

</body>
</html>
