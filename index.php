<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include('pages/head.php') ?>
<?php include('koneksi/koneksi.php') ?>

<body>

    <!-- Main Content -->
    <?php
    @$page = $_GET['page'];
    if (isset($page)) {
        if ($page === 'home') {
            include('pages/index.php');
        } else if ($page === 'tentang-kami') {
            include('pages/tentang-kami.php');
        } else if ($page === 'berita') {
            include('pages/berita.php');
        } else if ($page === 'karir') {
            include('pages/karir.php');
        } else if ($page === 'detail-job') {
            include('pages/detail-job.php');
        } else if ($page === 'form-job') {
            include('pages/form.php');
        } else if ($page === 'kontak') {
            include('pages/kontak.php');
        } else if ($page === 'event') {
            include('pages/event.php');
        } else if ($page === 'detail-event') {
            include('pages/infodetail.php');
        } else if ($page === 'tv') {
            include('pages/tv.php');
        }
    } else {
        include('pages/index.php');
    }
    ?>
    <!-- End Main Content -->

    <?php include('pages/footer.php') ?>
</body>

</html>