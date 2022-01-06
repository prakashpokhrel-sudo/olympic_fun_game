<!DOCTYPE html>
<html lang="en">
@include('admin.body.top')
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="/backend/dist/img/Torch-icon.png" alt="AdminLTELogo">
  </div>

  <!-- Navbar -->
 @include('admin.body.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('admin.body.sidebar')
  <!-- Content Wrapper. Contains page content -->
 @yield('admin')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/backend/plugins/jszip/jszip.min.js"></script>
<script src="/backend/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/backend/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="/backend/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/backend/plugins/raphael/raphael.min.js"></script>
<script src="/backend/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/backend/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="/backend/plugins/chart.js/Chart.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
