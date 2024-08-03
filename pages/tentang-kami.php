<?php include("navbar.php") ?>

<div class="container-about">
    <img src="dist/img/tentang-kami/section1.png" class="img-fluid" alt="">
    <div class="label-tentangkami">
        <p class="bold-heading2 text-white">Bersatu Menginspirasi</p>
    </div>
</div>

<div class="container-history">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="b-history">
                <div class="label-b">
                    <img src="dist/img/label-dekstop.png" alt="">
                    <h3 class="bold-heading3">B-Universe</h3>
                </div>
                <p class="light-heading6">B-Universe adalah layanan media yang terintegrasi penuh, menyajikan konten-konten berkualitas yang saling bersinergi, terdepan, relevan dan menghibur.</p>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="scroll-year">
                <div class="history" id="myScrollContainer">
                    <div class=" history1">
                        <h3 class="bold-heading3 bold">2022</h3>
                        <p class="semibold-heading6 bold">Mulai 11 Oktober 2022 bersama pergantian nama BeritaSatu menjadi BTV dalam acara "Investor Daily Summit 2022", BeritaSatu Media Holdings berganti nama menjadi B Universe</p>
                    </div>
                    <div class="history1">
                        <h3 class="bold-heading3">2011</h3>
                        <p class="semibold-heading6">Februari, Globe Media Group membeli BeritaSatu.com. 1 April Globe media Group berganti nama menjadi Beritasatu Media Holdings, 18 April Peter F. Gontha Menjadi Publisher. 1 September Menggabungkan diri dengan jaring Data Interaktif</p>
                    </div>
                    <div class="history1">
                        <h3 class="bold-heading3">2007</h3>
                        <p class="semibold-heading6">Pada tahun 2007, Globe Media Group merger dengan Investor Group, perusahaan media yang bidang surat kabar dan majalah</p>
                    </div>
                    <div class="history1">
                        <h3 class="bold-heading3">2006</h3>
                        <p class="semibold-heading6">B-universe Didirikan pada tahun 2006 dengan nama Globe Media Group oleh James Riady</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-manajemen ">
    <div class="label-m">
        <img src="dist/img/label-dekstop.png" class="img-fluid" alt="">
        <h3 class="bold-heading3">Manajemen B-Universe</h3>
    </div>
    <div class="petinggi">
        <div class="rectangle d-flex align-items-end justify-content-left">
            <img src="dist/img/tentang-kami/enggar.png" class="img-fluid" alt="">
            <div class="name-p">
                <h3 class="bold-heading5 text-white">Enggartiasto Lukita</h3>
                <p class="regular-heading6 text-white">Executive Chairman</p>
            </div>
        </div>
        <div class="rectangle d-flex align-items-end justify-content-left">
            <img src="dist/img/tentang-kami/rio.png" class="img-fluid" alt="">
            <div class="name-p">
                <h3 class="bold-heading5 text-white">Rio Abdurachman</h3>
                <p class="regular-heading6 text-white">Direktur Utama</p>
            </div>
        </div>
        <div class="rectangle d-flex align-items-end justify-content-left">
            <img src="dist/img/tentang-kami/apreyvita.png" class="img-fluid" alt="">
            <div class="name-p">
                <h3 class="bold-heading5 text-white">Apreyvita D Wulansari</h3>
                <p class="regular-heading6 text-white">Wakil Direktur</p>
            </div>
        </div>
    </div>
</div>

<div class="container-visi-misi">
    <div class="visi">
        <h2 class="bold-heading5">Visi</h2>
        <div class="kata-kata">
            <h1 class="bold-heading3">Apa Yang Kami yakini</h1>
            <p class="light-heading6">Menjadi acuan dalam usaha meningkatkan kebebasan publik untuk berpikir dan berpendapat serta membangun peradaban yang menghargai kecerdasan dan perbedaan.</p>
        </div>
    </div>
    <div class="vertikal-center"></div>
    <div class="misi">
        <h2 class="bold-heading5">Misi</h2>
        <div class="kata-kata">
            <h1 class="bold-heading3">Apa Yang Kami lakukan</h1>
            <p class="light-heading6">Menghasilkan produk multimedia yang independen dan bebas dari segala tekanan dengan menampung dan menyalurkan secara adil suara yang berbeda-beda</p>
        </div>
    </div>
</div>

<div class="container-img-b">
    <div class="label-i">
        <img src="dist/img/label-dekstop.png" alt="">
        <h3 class="bold-heading3">Galeri B-Universe</h3>
    </div>

    <div class="container-gallery">
        <div class="owl-carousel owl-theme">
            <?php
            $query = $koneksi->query("SELECT * FROM galeri");
            while ($galeri = $query->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="item" data-toggle="modal" <?php echo isset($galeri['image4']) ? 'data-target="#modal2' . $galeri['id'] . '"' : 'data-target="#modal1' . $galeri['id'] . '"'; ?>>
                    <img src="admin/upload/gallery/<?= $galeri['image1'] ?>" alt="">
                    <div class="overlayy">
                        <h1 class="bold-body-large text-white"><?= $galeri['judul'] ?></h1>
                        <p class="light-body-small text-white"><?= (strlen($galeri['deskripsi']) <= 80) ? $galeri['deskripsi'] : substr($galeri['deskripsi'], 0, 80) . '...'; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php
    $query = $koneksi->query("SELECT * FROM galeri");
    while ($galeri = $query->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="modal fade" id="modal1<?= $galeri['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img1">
                            <img src="admin/upload/gallery/<?= $galeri['image1'] ?>" alt="" class="max">
                        </div>
                        <div class="img2">
                            <img src="admin/upload/gallery/<?= $galeri['image2'] ?>" alt="">
                            <img src="admin/upload/gallery/<?= $galeri['image3'] ?>" alt="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <h1 class="bold-heading6"><?= $galeri['judul'] ?></h1>
                        <p class="light-heading6"><?= $galeri['deskripsi'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php
    $query = $koneksi->query("SELECT * FROM galeri");
    while ($galeri = $query->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="modal fade" id="modal2<?= $galeri['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img1">
                            <img src="admin/upload/gallery/<?= $galeri['image1'] ?>" alt="">
                        </div>
                        <div class="img2">
                            <img src="admin/upload/gallery/<?= $galeri['image2'] ?>" alt="">
                            <img src="admin/upload/gallery/<?= $galeri['image3'] ?>" alt="">
                        </div>
                        <div class="img3">
                            <img src="admin/upload/gallery/<?= $galeri['image4'] ?>" alt="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <h1 class="bold-heading6"><?= $galeri['judul'] ?></h1>
                        <p class="light-heading6"><?= $galeri['deskripsi'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>

<div class="banner-career">
    <div class="banner">
        <img src="dist/img/tentang-kami/bg.png" class="bg-tentang-kami" alt="">
        <div class="text-banner">
            <div class="text-come">
                <h1 class="bold-heading3">Bergabunglah Bersama Kami</h1>
                <p class="light-heading6">Mari bergabung dengan kami untuk membentuk masa depan yang cerah!</p>
                <a href="karir"><button class="primary-default1">Selengkapnya</button></a>
            </div>
            <div class="wrap-img-career">
                <img src="dist/img/tentang-kami/img-end.png" class="img-career" alt="">
            </div>
        </div>
    </div>
</div>