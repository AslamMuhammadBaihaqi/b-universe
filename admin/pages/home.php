<!-- Main content -->
<section class="content">

    <h4 class="mb-2 mt-4">Karir & Kontak</h4>
    <div class="row">

        <!-- Divisi -->
        <?php
        $query = $koneksi->query("SELECT COUNT(*) as total_divisi FROM divisi WHERE status = 1");
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $totalDivisi = $result['total_divisi'];
        ?>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= $totalDivisi ?></h3>

                    <p>Divisi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <a href="index.php?page=divisi" class="small-box-footer">
                    Lihat Divisi <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- Divisi End -->

        <!-- Detail Lowongan -->
        <!-- ./col -->
        <?php
        $query = $koneksi->query("SELECT COUNT(*) as total_lowongan FROM detail_lowongan WHERE status = 1");
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $totalLowongan = $result['total_lowongan'];
        ?>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $totalLowongan ?></h3>

                    <p>Lowongan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-folder-open"></i>
                </div>
                <a href="index.php?page=detail-lowongan" class="small-box-footer">
                    Lihat Lowongan <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- Detail Lowongan End -->

        <!-- Pelamar -->
        <!-- ./col -->
        <?php
        $query = $koneksi->query("SELECT COUNT(*) as total_pelamar FROM form_apply");
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $totalPelamar = $result['total_pelamar'];
        ?>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= $totalPelamar ?></h3>

                    <p>Pelamar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="index.php?page=form-apply-karir" class="small-box-footer">
                    Lihat Pelamar <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- Pelamar End -->

        <!-- Kontak Form -->
        <!-- ./col -->
        <?php
        $query = $koneksi->query("SELECT COUNT(*) as total_kontak FROM kontak");
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $totalKontak = $result['total_kontak'];
        ?>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= $totalKontak ?></h3>

                    <p>Form Kontak</p>
                </div>
                <div class="icon">
                    <i class="fas fa-address-book"></i>
                </div>
                <a href="index.php?page=kontak" class="small-box-footer">
                    Lihat Kontak Masuk <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- Kontak Form End -->
    </div>


    <h4 class="mt-4 mb-4">Event & TV</h4>
    <div class="row">
        <div class="col-md-6">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-warning">
                    <h1>Event</h1>
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column">
                        <?php
                        $query = $koneksi->query("SELECT COUNT(*) as total_event FROM event");
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        $totalEvent = $result['total_event'];
                        ?>
                        <li class="nav-item">
                            <a href="index.php?page=list-event" class="nav-link">
                                List Event <span class="float-right badge bg-primary"><?= $totalEvent ?></span>
                            </a>
                        </li>
                        <?php
                        $query = $koneksi->query("SELECT COUNT(*) as total_dokumentasi FROM dokumentasi_event");
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        $totalDokumentasiEvent = $result['total_dokumentasi'];
                        ?>
                        <li class="nav-item">
                            <a href="index.php?page=dokumentasi-event" class="nav-link">
                                Dokumentasi Event <span class="float-right badge bg-info"><?= $totalDokumentasiEvent ?></span>
                            </a>
                        </li>
                        <?php
                        $query = $koneksi->query("SELECT COUNT(*) as total_shorts FROM shorts");
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        $totalShorts = $result['total_shorts'];
                        ?>
                        <li class="nav-item">
                            <a href="index.php?page=shorts-event" class="nav-link">
                                Shorts Event <span class="float-right badge bg-success"><?= $totalShorts ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
        <div class="col-md-6">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-primary">
                    <h1>TV</h1>
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column">
                        <?php
                        $query = $koneksi->query("SELECT COUNT(*) as total_acara FROM acara");
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        $totalAcara = $result['total_acara'];
                        ?>
                        <li class="nav-item">
                            <a href="index.php?page=acara" class="nav-link">
                                Acara Program <span class="float-right badge bg-primary"><?= $totalAcara ?></span>
                            </a>
                        </li>
                        <?php
                        $query = $koneksi->query("SELECT COUNT(*) as total_jadwal FROM jadwal");
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        $totalJadwal = $result['total_jadwal'];
                        ?>
                        <li class="nav-item">
                            <a href="index.php?page=jadwal-program" class="nav-link">
                                Jadwal Program <span class="float-right badge bg-info"><?= $totalJadwal ?></span>
                            </a>
                        </li>
                        <?php
                        $query = $koneksi->query("SELECT COUNT(*) as total_program FROM program_unggulan");
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        $totalProgram = $result['total_program'];
                        ?>
                        <li class="nav-item">
                            <a href="index.php?page=program-unggulan" class="nav-link">
                                Program Unggulan <span class="float-right badge bg-success"><?= $totalProgram ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
        <!-- /.col -->

    </div>
    <!-- /.row -->

</section>
<!-- /.content -->