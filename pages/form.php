<?php include('navbar.php') ?>

<?php
$id = $_GET['id'];
$status = $_GET['status'] ?? '';

$query = $koneksi->query("SELECT detail_lowongan.*, divisi.nama AS nama_divisi 
    FROM detail_lowongan LEFT JOIN divisi ON detail_lowongan.id_divisi = divisi.id WHERE detail_lowongan.id = '$id'");
$detail_lowongan = $query->fetch(PDO::FETCH_ASSOC);
?>
<div class="container-form">
    <div class="container-atas-form">
        <div class="judul-form">
            <h1 class="bold-heading1 text-center"><?php echo $detail_lowongan['posisi']; ?></h1>
            <p class="semi bold-heading6 text-center">!! Penting !!</p>
            <p class="semi bold-heading6 text-center">Mohon untuk mengisi form sebelum mengirim surat lamaran.</p>
        </div>
        <a class="primary-default1" href="https://b-universe.id/career/assets/files/Aplikasi-Form-B-Universe.doc" title="Download Application Form" target="_blank">Unduh Disini</a>
    </div>
    <div class="container-bawah-form">
        <form action="includes/tambah/add-form-job.php" method="post" enctype="multipart/form-data">
            <!-- Menambahkan input tersembunyi untuk menyimpan nilai posisi dan divisi -->
            <input type="hidden" name="posisiID" value="<?= $id; ?>">

            <div class="form-pengisian">
                <div class="form-pengisian-atas">
                    <div class="form-posisi row">
                        <div class="form col-lg-6">
                            <label for="divisi" class="semibold-body-large">Divisi</label>
                            <input type="text" placeholder="Divisi" name="divisi" class="form-default-disabled" value="<?php echo $detail_lowongan['nama_divisi']; ?>" readonly>
                        </div>
                        <div class="form col-lg-6">
                            <label for="posisi" class="semibold-body-large">Posisi</label>
                            <input type="text" placeholder="Posisi" name="posisi" class="form-default-disabled" value="<?php echo $detail_lowongan['posisi']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-posisi row">
                        <div class="form col-lg-6">
                            <label for="namaLengkap" class="semibold-body-large">Nama Lengkap</label>
                            <input type="text" placeholder="Nama Lengkap" class="form-default" name="fullname" required minlength="2" maxlength="50">
                        </div>
                        <div class="form col-lg-6">
                            <label for="email" class="semibold-body-large">Email</label>
                            <input type="email" placeholder="Email" class="form-default" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        </div>
                    </div>
                    <div class="form-posisi row">
                        <div class="form col-lg-12">
                            <label for="pesan" class="semibold-body-large">Tambahkan Informasi Tambahan</label>
                            <textarea name="cover_letter" placeholder="Cover Letter" cols="20" rows="10" class="form-default"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-submit-bawah">
                <div class="application">
                    <label class="semibold-heading5" for="form_name">Application Letter* (<a class="semibold-heading5" href="https://b-universe.id/career/assets/files/Aplikasi-Form-B-Universe.doc">Download Here</a>)</label>
                    <div class="frame1-application">
                        <div class="frame2-application">
                            <button id="appLater" class="primary-default1" style="margin-top: 0px;">
                                Pilih File
                            </button>
                            <input href="#" id="inputAppLater" class="primary-default1 input-file-group" name="application_letter" type="file" accept=".pdf" required>
                            <p id="fileNameAppLater" class="regular-heading6 text-secondary">Belum Memilih File</p>
                        </div>
                        <p class="regular-heading6 text-secondary">Max 300kb, format file .PDF</p>
                    </div>
                </div>
                <div class="upload-cv">
                    <p class="semibold-heading5">Upload CV*</p>
                    <div class="frame1-upload-cv">
                        <div class="frame2-upload-cv">
                            <button id="uploadCV" class="primary-default1" style="margin-top: 0px;">
                                Pilih File
                            </button>
                            <input id="inputUploadCV" href="#" class="primary-default1 input-file-group" name="cv" type="file" accept=".pdf" required>
                            <p id="fileNameUploadCV" class="regular-heading6 text-secondary">Belum Memilih File</p>
                        </div>
                        <p class="regular-heading6 text-secondary">Max 300kb, format file .PDF</p>
                    </div>
                </div>
                <button class="primary-default2" type="submit" name="submit">Submit</button>
                <h5 class="semibold-heading6">
                    *You may also directly send us your application with comprehensive resume using format of .DOC or .PDF along with the latest photograph to
                    <a class="font-weight-bold semibold-heading5" href="mailto:recruitments@beritasatumedia.com">recruitments@b-universe.id</a>
                </h5>
            </div>
        </form>
    </div>
</div>
