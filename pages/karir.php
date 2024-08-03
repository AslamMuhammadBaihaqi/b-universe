<?php include("navbar.php") ?>

<div class="bg-karir d-flex align-items-center justify-content-center">
    <img src="dist/img/karir/Rectangle 66.svg" class="img-fluid" alt="">
    <div class="slogan">
        <h1 class="semibold-heading2 text-white text-center">Temukan Jalanmu untuk Berinovasi dan Mewujudkan Mimpi</h1>
        <div class="parag">
            <p class="regular-heading6 text-white">Jelajah dan temukan karirmu di B-Universe</p>
            <p class="regular-heading6 text-white">#BersatuMenginspirasi Di B-Universe </p>
        </div>
    </div>
</div>

<div class="container-konsistensi">
    <div class="label-konsistensi">
        <div class="label">
            <img src="dist/img/label-dekstop.png" alt="">
            <h3 class="bold-heading3">Konsistensi</h3>
        </div>
        <p class="regular-heading6">Kata ‘Universe’ dipilih karena memiliki makna ‘Semesta’. Semua informasi yang ada, kami tangkap dan dirangkum dalam berita yang harus memberi inspirasi bagi masyarakat.</p>
    </div>
    <div class="bg-icon">
        <div class="tangguh wrap-tangguh">
            <div class="desk-tangguh">
                <h3 class="bold-heading4">Tangguh</h3>
                <p class="regular-heading6 text-center">Bertanggung jawab atas perannya dan berhak atas kepercayaan yang sangat berharga.</p>
            </div>
            <div class="icon-tangguh">
                <img src="dist/img/karir/tangguh.svg" alt="">
            </div>
        </div>
        <div class="inovasi wrap-inovasi">
            <div class="desk-inovasi">
                <h3 class="bold-heading4">Inovasi</h3>
                <p class="regular-heading6 text-center">Ciptakan ide-ide baru yang terbukti bermanfaat.</p>
            </div>
            <div class="icon-inovasi">
                <img src="dist/img/karir/inovasi.svg" alt="">
            </div>
        </div>
        <div class="ramah wrap-ramah">
            <div class="desk-ramah">
                <h3 class="bold-heading4">Ramah</h3>
                <p class="regular-heading6 text-center">Perlakukan orang lain dengan hormat terlepas dari status atau ketidaksetujuan mereka dengan Anda.</p>
            </div>
            <div class="icon-ramah">
                <img src="dist/img/karir/ramah.svg" alt="">
            </div>
        </div>
    </div>
</div>
<div class="container-lowongan">
    <div class="label-lowongan">
        <div class="label">
            <img src="dist/img/label-dekstop.png" alt="">
            <h3 class="bold-heading3">Lowongan</h3>
        </div>
    </div>
    <div class="card-lowongan d-flex flex-wrap justify-content-around">
        <?php
        $query = $koneksi->query("SELECT * FROM divisi WHERE status = 1");
        while ($divisi = $query->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <form action="karir/detail-job" method="post">
                <input type="hidden" name="id" value="<?php echo $divisi['id']; ?>">
                <input type="image" src="admin/upload/divisi/<?php echo $divisi['image']; ?>" alt="Submit">
            </form>
        <?php } ?>
    </div>
</div>