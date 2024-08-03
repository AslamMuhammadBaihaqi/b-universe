<?php include('navbar.php') ?>

<div class="detail-container">
    <?php
    $id = $_POST['id'];
    $query = $koneksi->query("SELECT * FROM divisi WHERE id = '$id'");
    $divisi = $query->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="breadcrumbs">
        <ul>
            <li>
                <a href="home" class="regular-body">Beranda</a>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li>
                <a href="karir" class="regular-body">Lowongan</a>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li>
                <p class="regular-body text-secondary"><?php echo $divisi['nama']; ?></p>
            </li>
        </ul>
    </div>
    <div class="label">
        <img src="dist/img/label-dekstop.png" alt="">
        <h3 class="bold-heading3"><?php echo $divisi['nama']; ?></h3>
    </div>

    <div class="lowongan">
        <?php
        $id = $_POST['id'];
        $query = $koneksi->query("SELECT * FROM detail_lowongan WHERE id_divisi = '$id' AND status = 1");
        while ($detail_lowongan = $query->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <ul>
                <li class="contentBx">
                    <div class="judul-lowongan">
                        <label for="first" class="semibold-heading5 text-white"><?php echo $detail_lowongan['posisi']; ?></label>
                        <svg xmlns="http://www.w3.org/2000/svg" for="first" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                    <div class="line"></div>
                    <div class="keterangan-lowongan d-flex">
                        <div class="lowongan-icon pr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width='24' height='24' fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <p class="regular-heading6 text-white"><?php echo $detail_lowongan['lokasi']; ?></p>
                        </div>
                        <div class="lowongan-icon pl-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM12 20.25C10.3683 20.25 8.77326 19.7661 7.41655 18.8596C6.05984 17.9531 5.00242 16.6646 4.378 15.1571C3.75358 13.6496 3.5902 11.9908 3.90853 10.3905C4.22685 8.79016 5.01259 7.32015 6.16637 6.16637C7.32016 5.01259 8.79017 4.22685 10.3905 3.90852C11.9909 3.59019 13.6497 3.75357 15.1571 4.37799C16.6646 5.00242 17.9531 6.05984 18.8596 7.41655C19.7661 8.77325 20.25 10.3683 20.25 12C20.2475 14.1873 19.3775 16.2843 17.8309 17.8309C16.2843 19.3775 14.1873 20.2475 12 20.25ZM18 12C18 12.1989 17.921 12.3897 17.7803 12.5303C17.6397 12.671 17.4489 12.75 17.25 12.75H12C11.8011 12.75 11.6103 12.671 11.4697 12.5303C11.329 12.3897 11.25 12.1989 11.25 12V6.75C11.25 6.55109 11.329 6.36032 11.4697 6.21967C11.6103 6.07902 11.8011 6 12 6C12.1989 6 12.3897 6.07902 12.5303 6.21967C12.671 6.36032 12.75 6.55109 12.75 6.75V11.25H17.25C17.4489 11.25 17.6397 11.329 17.7803 11.4697C17.921 11.6103 18 11.8011 18 12Z" fill="white" />
                            </svg>
                            <p class="regular-heading6 text-white"><?php echo $detail_lowongan['tipe']; ?></p>
                        </div>
                        <div class="lowongan-icon ml-auto ">
                            <p class="regular-heading6 text-white">Penerbit: <?php echo $detail_lowongan['publisher']; ?></p>
                        </div>
                    </div>
                    <div class="detail-content">
                        <div class="detail-wrapper">
                            <div class="sub-content">
                                <h1 class="semibold-heading5 text-white">Tanggung Jawab</h1>
                                <ul class="regular-heading6 text-white">
                                    <?php echo $detail_lowongan['tanggung_jawab']; ?>
                                </ul>
                            </div>
                            <div class="sub-content">
                                <h1 class="semibold-heading5 text-white">Persyaratan</h1>
                                <ul class="regular-heading6 text-white">
                                    <?php echo $detail_lowongan['persyaratan']; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="detail-footer">
                            <h5 class="semibold-heading5 text-white">Penerbit: <?php echo $detail_lowongan['publisher']; ?></h5>
                            <p class="regular-heading5 text-white">Kirimkan aplikasi Anda beserta resume lengkap dalam format .DOC atau .PDF beserta foto terbaru ke <a href="mailto:recruitments@beritasatumedia.com"><b class="font-weight-bold">recruitments@b-universe.id</b></a></p>
                            <a href="karir/detail-job/form-job/<?php echo $detail_lowongan['id']; ?>" class="primary-default2">Lamar Disini</a>
                        </div>
                    </div>
                </li>
            </ul>
        <?php } ?>
    </div>
</div>