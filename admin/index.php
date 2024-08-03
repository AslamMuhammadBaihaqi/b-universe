<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include('include/head.php') ?>
<?php include('../koneksi/koneksi.php') ?>
<!-- Head End -->

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <?php include('include/preloader.php') ?>
    <!-- Preloader End -->

    <!-- Navbar -->
    <?php include('include/navbar.php') ?>
    <!-- Navbar End -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <?php include('include/logo.php') ?>
      <!-- Brand Logo  -->

      <!-- Sidebar -->
      <?php include('include/sidebar.php') ?>
      <!-- Sidebar End -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php include('include/content-header.php') ?>
      <!-- /.content-header -->

      <!-- Main content -->
      <?php
      @$page = $_GET['page'];
      if (isset($page)) {
        if ($page === 'home') {
          include('pages/home.php');
        } else if ($page === 'gallery') {
          include('pages/gallery.php');
        } else if ($page === 'divisi') {
          include('pages/divisi.php');
        } else if ($page === 'detail-lowongan') {
          include('pages/detail-lowongan.php');
        } else if ($page === 'form-apply-karir') {
          include('pages/form-apply-karir.php');
        } else if ($page === 'kontak') {
          include('pages/kontak.php');
        } else if ($page === 'list-event') {
          include('pages/list-event.php');
        } else if ($page === 'dokumentasi-event') {
          include('pages/dokumentasi-event.php');
        } else if ($page === 'shorts-event') {
          include('pages/shorts-event.php');
        } else if ($page === 'acara') {
          include('pages/acara.php');
        } else if ($page === 'jadwal-program') {
          include('pages/jadwal-program.php');
        } else if ($page === 'program-unggulan') {
          include('pages/program-unggulan.php');
        } else if ($page === 'user') {
          include('pages/user.php');
        } else {
          include('pages/404.php');
        }
      } else {
        include('pages/home.php');
      }
      ?>


      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    <?php include('include/footer.php') ?>
    <!-- Footer End -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


</body>

</html>