<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    <?php
                    @$page = $_GET['page'];
                    if (isset($page)) {
                        if ($page === 'home') {
                            echo 'Home';
                        } else if ($page === 'gallery') {
                            echo 'Gallery';
                        } else if ($page === 'divisi') {
                            echo 'Divisi';
                        } else if ($page === 'detail-lowongan') {
                            echo 'Detail Lowongan';
                        } else if ($page === 'form-apply-karir') {
                            echo 'Form Apply Karir';
                        } else if ($page === 'kontak') {
                            echo 'Kontak';
                        } else if ($page === 'list-event') {
                            echo 'List Event';
                        } else if ($page === 'dokumentasi-event') {
                            echo 'Dokumentasi Event';
                        } else if ($page === 'shorts-event') {
                            echo 'Shorts Event';
                        } else if ($page === 'acara') {
                            echo 'Acara Program';
                        } else if ($page === 'jadwal-program') {
                            echo 'Jadwal Program';
                        } else if ($page === 'program-unggulan') {
                            echo 'Program Unggulan';
                        } else if ($page === 'user') {
                            echo 'User';
                        } else {
                            echo '404 Error';
                        }
                    } else {
                        echo 'Home';
                    }
                    ?>
                </h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">
                        <?php
                        @$page = $_GET['page'];
                        if (isset($page)) {
                            if ($page === 'home') {
                                echo 'Home';
                            } else if ($page === 'gallery') {
                                echo 'Gallery';
                            } else if ($page === 'divisi') {
                                echo 'Divisi';
                            } else if ($page === 'detail-lowongan') {
                                echo 'Detail Lowongan';
                            } else if ($page === 'form-apply-karir') {
                                echo 'Form Apply Karir';
                            } else if ($page === 'kontak') {
                                echo 'Kontak';
                            } else if ($page === 'list-event') {
                                echo 'List Event';
                            } else if ($page === 'dokumentasi-event') {
                                echo 'Dokumentasi Event';
                            } else if ($page === 'shorts-event') {
                                echo 'Shorts Event';
                            } else if ($page === 'acara') {
                                echo 'Acara Program';
                            } else if ($page === 'jadwal-program') {
                                echo 'Jadwal Program';
                            } else if ($page === 'program-unggulan') {
                                echo 'Program Unggulan';
                            } else if ($page === 'user') {
                                echo 'User';
                            } else {
                                echo '404 Error';
                            }
                        } else {
                            echo 'Home';
                        }
                        ?>
                    </li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->