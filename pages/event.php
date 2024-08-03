<?php include('navbar.php') ?>

<?php
// Mendapatkan event yang berlangsung hari ini atau yang baru berakhir
$query = $koneksi->query("SELECT * FROM event WHERE tanggal_awal <= NOW() AND tanggal_akhir >= NOW() ORDER BY tanggal_awal ASC LIMIT 1");

// Mendapatkan event yang berlangsung hari ini atau yang baru berakhir
$berlangsung_event = $query->fetch(PDO::FETCH_ASSOC);

// Jika tidak ada event yang berlangsung hari ini, coba mencari event yang baru berakhir
if (!$berlangsung_event) {
    $query_expired = $koneksi->query("SELECT * FROM event WHERE tanggal_akhir < NOW() ORDER BY tanggal_akhir DESC LIMIT 1");

    if ($query_expired) {
        $berlangsung_event = $query_expired->fetch(PDO::FETCH_ASSOC);
    }
}

// Cek apakah ada event yang berlangsung hari ini atau yang baru berakhir
if ($berlangsung_event) {
?>
    <div class="event-container d-flex align-items-end">
        <div class="image-overlay-container w-100">
            <div class="gradient-image"></div>
            <img src="admin/upload/event/<?= $berlangsung_event['image'] ?>" class="img-fluid">
        </div>
        <div class="judul-text">
            <div class="label-berlangsung">
                <p class="bold-heading4 text-white">Sedang Berlangsung</p>
            </div>
            <div class="deskripsi-berlangsung">
                <h1 class="bold-heading4 text-white"><?= $berlangsung_event['judul'] ?></h1>
                <div class="isi-deskripsi">
                    <div class="event-deskripsi bold-body-large text-white">
                        <?php echo substr($berlangsung_event['deskripsi'], 0, 200); ?>...
                    </div>
                    <a href="event/detail-event/<?= $berlangsung_event['id']; ?>">
                        <button class="primary-default2">Selengkapnya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

<?php
$statement = $koneksi->query('SELECT * FROM event');
$jumlahDataHalaman = 6;
$jumlahData = $statement->rowCount();
$jumalhHalaman = ceil($jumlahData /  $jumlahDataHalaman);
$halamanAktif = (isset($_GET['p'])) ? $_GET['p'] : 1;
$awalData = ($jumlahDataHalaman * $halamanAktif) - $jumlahDataHalaman;
?>

<div class="event-seru-container">
    <div class="event-title">
        <h1 class="poppins-bold-heading1" style="color: #062265;">Temukan Event Seru</h1>
        <div class="event-title-rectangle">
            <h1 class="poppins-bold-heading1 text-white">Di B-Universe</h1>
        </div>
    </div>

    <div class="label-event-square">
        <h1 class="bold-heading4 text-white">Event</h1>
    </div>

    <div class="all-list d-flex justify-content-around flex-wrap">
        <?php
        $query = $koneksi->query("SELECT * FROM event ORDER BY tanggal_awal ASC LIMIT $awalData, $jumlahDataHalaman");
        while ($event = $query->fetch(PDO::FETCH_ASSOC)) {
            $tanggal_awal = $event['tanggal_awal'];
            $tanggal_akhir = $event['tanggal_akhir'];

            // Memformat tanggal_awal
            if ($tanggal_awal === $tanggal_akhir) {
                // Jika tanggal awal dan tanggal akhir sama
                $tanggal_format = date('j F Y', strtotime($tanggal_awal));
            } else {
                // Jika tanggal awal dan tanggal akhir berbeda
                $tanggal_format = date('j', strtotime($tanggal_awal)) . ' - ' . date('j F Y', strtotime($tanggal_akhir));
            }
        ?>
            <div class="listkecil1">
                <img src="admin/upload/event/<?php echo $event['image']; ?>" class="img-fluid">
                <div class="isijudul1">
                    <h1 class="bold-heading5 text-black"><?= (strlen($event['judul']) <= 19) ? $event['judul'] : substr($event['judul'], 0, 19) . '...'; ?></h1>
                    <div class="tg-eventkecil1">
                        <svg width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_490_2694)">
                                <path d="M13.6152 0C14.0608 0 14.4881 0.177 14.8031 0.492061C15.1182 0.807122 15.2952 1.23444 15.2952 1.68V4.8216H33.336V1.7016C33.336 1.25604 33.513 0.828722 33.8281 0.513661C34.1431 0.1986 34.5704 0.0216 35.016 0.0216C35.4616 0.0216 35.8889 0.1986 36.2039 0.513661C36.519 0.828722 36.696 1.25604 36.696 1.7016V4.8216H43.2C44.4726 4.8216 45.6932 5.32698 46.5933 6.22664C47.4934 7.12629 47.9994 8.34658 48 9.6192V43.2024C47.9994 44.475 47.4934 45.6953 46.5933 46.595C45.6932 47.4946 44.4726 48 43.2 48H4.8C3.52738 48 2.30684 47.4946 1.40674 46.595C0.50663 45.6953 0.000636312 44.475 0 43.2024L0 9.6192C0.000636312 8.34658 0.50663 7.12629 1.40674 6.22664C2.30684 5.32698 3.52738 4.8216 4.8 4.8216H11.9352V1.6776C11.9358 1.23245 12.1131 0.805754 12.4281 0.491212C12.7431 0.17667 13.1701 -4.54232e-07 13.6152 0ZM3.36 18.5808V43.2024C3.36 43.3915 3.39725 43.5788 3.46961 43.7535C3.54198 43.9282 3.64805 44.0869 3.78177 44.2206C3.91548 44.3544 4.07423 44.4604 4.24894 44.5328C4.42365 44.6052 4.6109 44.6424 4.8 44.6424H43.2C43.3891 44.6424 43.5764 44.6052 43.7511 44.5328C43.9258 44.4604 44.0845 44.3544 44.2182 44.2206C44.352 44.0869 44.458 43.9282 44.5304 43.7535C44.6028 43.5788 44.64 43.3915 44.64 43.2024V18.6144L3.36 18.5808ZM16.0008 35.0856V39.084H12V35.0856H16.0008ZM25.9992 35.0856V39.084H22.0008V35.0856H25.9992ZM36 35.0856V39.084H31.9992V35.0856H36ZM16.0008 25.5408V29.5392H12V25.5408H16.0008ZM25.9992 25.5408V29.5392H22.0008V25.5408H25.9992ZM36 25.5408V29.5392H31.9992V25.5408H36ZM11.9352 8.1792H4.8C4.6109 8.1792 4.42365 8.21645 4.24894 8.28881C4.07423 8.36118 3.91548 8.46725 3.78177 8.60097C3.64805 8.73468 3.54198 8.89343 3.46961 9.06814C3.39725 9.24284 3.36 9.4301 3.36 9.6192V15.2232L44.64 15.2568V9.6192C44.64 9.4301 44.6028 9.24284 44.5304 9.06814C44.458 8.89343 44.352 8.73468 44.2182 8.60097C44.0845 8.46725 43.9258 8.36118 43.7511 8.28881C43.5764 8.21645 43.3891 8.1792 43.2 8.1792H36.696V10.4088C36.696 10.8544 36.519 11.2817 36.2039 11.5967C35.8889 11.9118 35.4616 12.0888 35.016 12.0888C34.5704 12.0888 34.1431 11.9118 33.8281 11.5967C33.513 11.2817 33.336 10.8544 33.336 10.4088V8.1792H15.2952V10.3872C15.2952 10.8328 15.1182 11.2601 14.8031 11.5751C14.4881 11.8902 14.0608 12.0672 13.6152 12.0672C13.1696 12.0672 12.7423 11.8902 12.4273 11.5751C12.1122 11.2601 11.9352 10.8328 11.9352 10.3872V8.1792Z" fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_490_2694">
                                    <rect width="48" height="48" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <h5 class="regular-body-large"><?php echo $tanggal_format ?></h5>
                    </div>
                    <div class="event-deskripsi regular-body text-black">
                        <?php echo substr($event['deskripsi'], 0, 200); ?>...
                    </div>
                    <a href="event/detail-event/<?php echo $event['id']; ?>">
                        <button class="primary-default1">Info Detail</button>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="pagination-event d-flex justify-content-end  mt-5">
        <!-- Pagination -->
        <!-- <?php if ($halamanAktif > 1) : ?>
                <a class="bold-heading5" href="?p=<?= $halamanAktif - 1; ?>">&laquo;</a>
            <?php endif; ?> -->

        <?php for ($i = 1; $i <= $jumalhHalaman; $i++) : ?>
            <?php if ($i == $halamanAktif) : ?>
                <a class="bold-heading5 ml-3 text-white" href="event/<?= $i; ?>" style="background: #062265;"><?= $i; ?></a>
            <?php else : ?>
                <a class="bold-heading5 ml-3 text-white" href="event/<?= $i; ?>"><?= $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <!-- <?php if ($halamanAktif < $jumalhHalaman) : ?>
                <a class="bold-heading5 ml-2" href="?p=<?= $halamanAktif + 1; ?>">&raquo;</a>
            <?php endif; ?> -->
        <!-- Pagination End -->
    </div>
</div>

<!-- Segera Hadir -->
<?php
$query = $koneksi->query("SELECT * FROM event WHERE tanggal_awal >= CURDATE() ORDER BY tanggal_awal ASC LIMIT 1");

// Periksa apakah ada event yang akan datang
$event = $query->fetch(PDO::FETCH_ASSOC);
$is_upcoming_event = !empty($event);

if ($is_upcoming_event) {
    // Proses data event
    $tanggal_awal = $event['tanggal_awal'];
    $tanggal_akhir = $event['tanggal_akhir'];

    // Memformat tanggal_awal
    if ($tanggal_awal === $tanggal_akhir) {
        // Jika tanggal awal dan tanggal akhir sama
        $tanggal_format = date('j F Y', strtotime($tanggal_awal));
    } else {
        // Jika tanggal awal dan tanggal akhir berbeda
        $tanggal_format = date('j', strtotime($tanggal_awal)) . ' - ' . date('j F Y', strtotime($tanggal_akhir));
    }
}
?>
<div class="container-segera-hadir" <?php echo $is_upcoming_event ? '' : 'style="display: none;"'; ?>>
    <!-- Konten container-segera-hadir -->
    <?php if ($is_upcoming_event) : ?>
        <div class="label-event-square">
            <h1 class="bold-heading4 text-white">Segera Hadir</h1>
        </div>
        <div class="hadir-segera">
            <img src="admin/upload/event/<?php echo $event['image']; ?>" class="img-fluid">
            <div class="isi-segerahadir">
                <div class="isijudul-segerahadir">
                    <h1 class="bold-heading4 text-black"><?= $event['judul'] ?></h1>
                    <div class="tg-eventkecil9">
                        <svg width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_490_2694)">
                                <path d="M13.6152 0C14.0608 0 14.4881 0.177 14.8031 0.492061C15.1182 0.807122 15.2952 1.23444 15.2952 1.68V4.8216H33.336V1.7016C33.336 1.25604 33.513 0.828722 33.8281 0.513661C34.1431 0.1986 34.5704 0.0216 35.016 0.0216C35.4616 0.0216 35.8889 0.1986 36.2039 0.513661C36.519 0.828722 36.696 1.25604 36.696 1.7016V4.8216H43.2C44.4726 4.8216 45.6932 5.32698 46.5933 6.22664C47.4934 7.12629 47.9994 8.34658 48 9.6192V43.2024C47.9994 44.475 47.4934 45.6953 46.5933 46.595C45.6932 47.4946 44.4726 48 43.2 48H4.8C3.52738 48 2.30684 47.4946 1.40674 46.595C0.50663 45.6953 0.000636312 44.475 0 43.2024L0 9.6192C0.000636312 8.34658 0.50663 7.12629 1.40674 6.22664C2.30684 5.32698 3.52738 4.8216 4.8 4.8216H11.9352V1.6776C11.9358 1.23245 12.1131 0.805754 12.4281 0.491212C12.7431 0.17667 13.1701 -4.54232e-07 13.6152 0ZM3.36 18.5808V43.2024C3.36 43.3915 3.39725 43.5788 3.46961 43.7535C3.54198 43.9282 3.64805 44.0869 3.78177 44.2206C3.91548 44.3544 4.07423 44.4604 4.24894 44.5328C4.42365 44.6052 4.6109 44.6424 4.8 44.6424H43.2C43.3891 44.6424 43.5764 44.6052 43.7511 44.5328C43.9258 44.4604 44.0845 44.3544 44.2182 44.2206C44.352 44.0869 44.458 43.9282 44.5304 43.7535C44.6028 43.5788 44.64 43.3915 44.64 43.2024V18.6144L3.36 18.5808ZM16.0008 35.0856V39.084H12V35.0856H16.0008ZM25.9992 35.0856V39.084H22.0008V35.0856H25.9992ZM36 35.0856V39.084H31.9992V35.0856H36ZM16.0008 25.5408V29.5392H12V25.5408H16.0008ZM25.9992 25.5408V29.5392H22.0008V25.5408H25.9992ZM36 25.5408V29.5392H31.9992V25.5408H36ZM11.9352 8.1792H4.8C4.6109 8.1792 4.42365 8.21645 4.24894 8.28881C4.07423 8.36118 3.91548 8.46725 3.78177 8.60097C3.64805 8.73468 3.54198 8.89343 3.46961 9.06814C3.39725 9.24284 3.36 9.4301 3.36 9.6192V15.2232L44.64 15.2568V9.6192C44.64 9.4301 44.6028 9.24284 44.5304 9.06814C44.458 8.89343 44.352 8.73468 44.2182 8.60097C44.0845 8.46725 43.9258 8.36118 43.7511 8.28881C43.5764 8.21645 43.3891 8.1792 43.2 8.1792H36.696V10.4088C36.696 10.8544 36.519 11.2817 36.2039 11.5967C35.8889 11.9118 35.4616 12.0888 35.016 12.0888C34.5704 12.0888 34.1431 11.9118 33.8281 11.5967C33.513 11.2817 33.336 10.8544 33.336 10.4088V8.1792H15.2952V10.3872C15.2952 10.8328 15.1182 11.2601 14.8031 11.5751C14.4881 11.8902 14.0608 12.0672 13.6152 12.0672C13.1696 12.0672 12.7423 11.8902 12.4273 11.5751C12.1122 11.2601 11.9352 10.8328 11.9352 10.3872V8.1792Z" fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_490_2694">
                                    <rect width="48" height="48" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <h5 class="regular-body-large"><?= $tanggal_format ?></h5>
                    </div>
                    <div class="event-deskripsi regular-body text-black">
                        <?php echo substr($event['deskripsi'], 0, 250); ?>...
                    </div>
                    <div>
                        <a href="event/detail-event/<?php echo $event['id']; ?>" class="mt-2">
                            <button class="primary-default1">Info Detail</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- Segera Hadir End -->

<!-- Dokumentasi Event -->
<div class="container-dokumentasi-event">
    <div class="label-event">
        <img src="dist/img/label-dekstop.png" alt="">
        <h3 class="bold-heading3 text-black">Dokumentasi</h3>
    </div>

    <div id="carouselFadeDokumentasi" class="slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner carousel-inner-dokumentasi">
            <?php
            $query = $koneksi->query("SELECT * FROM dokumentasi_event");
            $first = true;
            while ($dokumentasi_event = $query->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="carousel-item carousel-dokumentasi-overlay <?php echo $first ? 'active' : ''; ?>">
                    <div class="gradient-image-carousel"></div>
                    <img src="admin/upload/dokumentasi-event/<?php echo $dokumentasi_event['image']; ?>" class="img-fluid">
                    <span><?php echo $dokumentasi_event['judul']; ?></span>
                </div>
            <?php
                $first = false;
            }
            ?>
        </div>
    </div>

    <div class="semua d-flex justify-content-around flex-wrap">
        <?php
        $query = $koneksi->query("SELECT * FROM shorts");
        while ($shorts_event = $query->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="shorts-video">
                <iframe src="https://www.youtube.com/embed/<?php echo $shorts_event['video_id'] ?>" frameborder="0" allowfullscreen></iframe>
                <div class="deskripsi-shorts">
                    <h4 class="bold-heading4 text-black"><?php echo $shorts_event['judul'] ?></h4>
                    <p class="regular-heading5 text-black"><?php echo $shorts_event['deskripsi'] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Dokumentasi Event End -->