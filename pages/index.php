<?php include('navbar-home.php') ?>

<div class="bg1">
    <div class="banner-home img-fluid"></div>

    <div class="container-home">
        <div class="desk-home">
            <div class="desk-home-paragraf">
                <p class="bold-heading3 text-white">Semesta Berpesta</p>
                <p class="regular-heading6 text-white">Wajib hadir! Semesta Berpesta kembali hadir pada 12-13 Agustus 2023, di Karawang. Perhelatan ini akan berlokasi di Lapangan Galuh Mas Karawang dengan berbagai experience yang tidak boleh dilewati.</p>
            </div>
            <a href="index.php">
                <button class="primary-default2">Selengkapnya</button>
            </a>
        </div>
        <div class="image-home">
            <img src="dist/img/home/image-scroll.png" class="img1 img-fluid" alt="">
            <div id="carousel-img" class="carousel slide d-flex justify-content-between" data-ride="carousel" draggable="true">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-heading="Semesta Berpesta" data-text="Wajib hadir! Semesta Berpesta kembali hadir pada 12-13 Agustus 2023, di Karawang. Perhelatan ini akan berlokasi di Lapangan Galuh Mas Karawang.">
                        <div class=" carousel-1 row">
                            <div class="img-carousel-1 col-6">
                                <img class="d-block" src="dist/img/home/image-scroll.png" alt="First slide">
                            </div>
                            <div class="img-carousel-1 col-6">
                                <img class="d-block" src="dist/img/home/image-scroll1.webp" alt="First slide">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-heading="MUSIC FOR ALL FEST" data-text="Dengan bangga MNC Media & Entertainment mempersembahkan festival musik terbesar bertajuk LMAC Music For All Fest 2023.">
                        <div class="carousel-1 row">
                            <div class="img-carousel-1 col-6">
                                <img class="d-block" src="dist/img/home/image-scroll1.webp" alt="Second slide">
                            </div>
                            <div class="img-carousel-1 col-6">
                                <img class="d-block" src="dist/img/home/image-scroll2.webp" alt="Second slide">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-heading="PESTA OKE" data-text="Pesta Oke RCTI34 di Pulo Gebang ini akan diramaikan oleh meet & para pemain sinetron RCTI Jangan Bercerai Bunda yaitu Oding Siregar, Bebby Hatami dll.">
                        <div class="carousel-1 row">
                            <div class="img-carousel-1 col-6">
                                <img class="d-block" src="dist/img/home/image-scroll2.webp" alt="Third slide">
                            </div>
                            <div class="img-carousel-1 col-6">
                                <img class="d-block" src="dist/img/home/image-scroll3.jpeg" alt="Third slide">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg2">
    <div class="container-tentang">
        <div class="desk-tentang">
            <div class="desk-tentang-paragraf">
                <p class="bold-heading5 ">Tentang B-Universe</p>
                <p class="bold-heading2 ">BERSATU MENGINSPIRASI</p>
                <p class="regular-body ">B-Universe (sebelumnya bernama Globe Media Group dan BeritaSatu Media Holdings) merupakan sebuah perusahaan yang bergerak dalam bidang media. B-Universe didirikan pada tahun 2006 dengan nama Globe Media Group oleh James Riady. Pada tahun 2007, Globe Media Group merger dengan Investor Group, perusahaan media yang bidang surat kabar dan majalah. </p>
            </div>
            <a href="tentang-kami">
                <button class="primary-default1">Selengkapnya</button>
            </a>
        </div>
        <div class="image-tentang">
            <img src="dist/img/svg/tentang1.svg" class="img-fluid" alt="">
        </div>
    </div>
</div>

<div class="container-brand">
    <div class="label">
        <img src="dist/img/label-dekstop.png" alt="">
        <h3 class="bold-heading3 pt-2">Brand Kami</h3>
    </div>
    <div class="container-card d-flex flex-wrap">
        <a href="https://www.beritasatu.com/" target="_blank">
            <img src="dist/img/svg/BTV.svg" alt="">
        </a>
        <a href="https://www.beritasatu.com/" target="_blank">
            <img src="dist/img/svg/B1.svg" alt="">
        </a>
        <a href="https://investor.id/" target="_blank">
            <img src="dist/img/svg/Invi.svg" alt="">
        </a>
        <a href="https://jakartaglobe.id/" target="_blank">
            <img src="dist/img/svg/jg.svg" alt="">
        </a>
        <a href="https://subscribe.investor.id/" target="_blank">
            <img src="dist/img/svg/Invd.svg" alt="">
        </a>
        <a href="https://subscribe.investor.id/" target="_blank">
            <img src="dist/img/svg/MInv.svg">
        </a>
    </div>
</div>

<div class="container-aktivitas">
    <div class="label-aktivitas">
        <div class="label">
            <img src="dist/img/label-dekstop.png" alt="">
            <h3 class="bold-heading3">Aktivitas B-Universe</h3>
        </div>
        <p class="regular-heading5">
            Berikut adalah berbagai macam platform B-universe
        </p>
    </div>
    <div class="img-aktivitas">
        <img src="dist/img/svg/aktif.svg" class="img-fluid" alt="">
        <img src="dist/img/svg/aktivitas-mobile.svg" class="img-fluid" alt="">
    </div>
</div>

<div class="container-kontak-home d-flex justify-content-between">
    <div class="row">
        <div class="col-lg-6 col-sm-12 mt-auto mb-auto">
            <div class="label">
                <img src="dist/img/label-dekstop.png" alt="">
                <h3 class="bold-heading3 pt-2">Kontak</h3>
            </div>
            <div class="form-kontak">
                <form action="includes/tambah/add-form-kontak-home.php" method="POST">
                    <div class="form">
                        <label for="nama" class="semibold-body-large">Nama</label>
                        <input type="text" placeholder="Nama" class="form-default" name="nama" required minlength="2" maxlength="50">
                    </div>
                    <div class="form">
                        <label for="email" class="semibold-body-large">Email</label>
                        <input type="email" placeholder="Email" class="form-default" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </div>
                    <div class="form">
                        <label for="nomor" class="semibold-body-large">No. Handphone</label>
                        <input type="number" placeholder="No. Handphone" class="form-default" name="nomor" required>
                    </div>
                    <div class="form">
                        <label for="pesan" class="semibold-body-large">Pesan</label>
                        <textarea name="pesan" type="text" placeholder="Pesan" cols="20" rows="10" class="form-default" required minlength="10" maxlength="1000"></textarea>
                    </div>
                    <button class="primary-default1" type="submit" name="submit">Simpan</button>
                </form>
            </div>
        </div>
        <div class="kontak-img col-lg-6 col-sm-12 d-flex">
            <img src="dist/img/commodity-square.png" class="img-fluid justify-content-center" alt="">
        </div>
    </div>
</div>