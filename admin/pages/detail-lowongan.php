<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title ">Tambah Detail Lowongan</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form action="includes/create/add-detail-lowongan.php" method="post">
                <div class="row">
                    <?php
                    $query = $koneksi->query("SELECT * FROM divisi");
                    $divisions = $query->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Divisi</label>
                            <select class="form-control select2bs4" style="width: 100%;" name="divisi">
                                <option value="">Select Option</option>
                                <?php
                                foreach ($divisions as $divisi) {
                                    echo "<option value='" . $divisi["id"] . "'>" . $divisi["nama"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputText">Posisi</label>
                            <input type="text" class="form-control" placeholder="Frontend Developer" name="posisi">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputText">Lokasi</label>
                            <input type="text" class="form-control" value="Jakarta Selatan" name="lokasi" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputText">Tipe Pekerjaan</label>
                            <select class="form-control select2bs4" style="width: 100%;" name="tipe">
                                <option>Select Option</option>
                                <option value="Penuh Waktu">Penuh Waktu</option>
                                <option value="Paruh Waktu">Paruh Waktu</option>
                                <option value="Kerja Lepas">Kerja Lepas</option>
                                <option value="Kontrak">Kontrak</option>
                                <option value="Magang">Magang</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputText">Publisher</label>
                            <input type="text" class="form-control" value="B-Universe" name="publisher" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggung Jawab</label>
                    <textarea id="summernote" name="tanggung_jawab"></textarea>
                    <small id="deskripsiHelpBlock" class="form-text text-muted">
                        *Penting! Ketika anda ingin menyalin dan menempelkan teks, jangan lupa untuk menghapus gaya font dengan blok terlebih dahulu tulisan yang telah Anda salin dan gunakan kombinasi tombol keyboard <strong>(CTRL + \)</strong> atau klik tombol <strong><i class="note-icon-eraser"></i> </strong> di toolbar.
                    </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Persyaratan</label>
                    <textarea id="summernote1" name="persyaratan"></textarea>
                    <small id="deskripsiHelpBlock" class="form-text text-muted">
                        *Penting! Ketika anda ingin menyalin dan menempelkan teks, jangan lupa untuk menghapus gaya font dengan blok terlebih dahulu tulisan yang telah Anda salin dan gunakan kombinasi tombol keyboard <strong>(CTRL + \)</strong> atau klik tombol <strong><i class="note-icon-eraser"></i> </strong> di toolbar.
                    </small>
                </div>
                <div class="button-right mt-3 float-right">
                    <input type="hidden" name="status" disabled>
                    <button type="submit" class="btn btn-md btn-primary ">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Tabel box -->
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title ">Tabel Detail Lowongan</h3>
        </div>
        <div class="card-body">
            <div class="form-group ">
                <label for="exampleInputText" class="font-weight-normal">Divisi</label>
                <form action="" method="post">
                    <select class="form-control select2bs4" style="width: 25%;" name="select" id="select" onchange="this.form.submit()">
                        <option value="">All</option>
                        <?php
                        foreach ($divisions as $divisi) {
                            echo "<option value='" . $divisi["id"] . "'";
                            if (isset($_POST['select']) && $_POST['select'] == $divisi['id']) {
                                echo " selected";
                            }
                            echo ">" . $divisi["nama"] . "</option>";
                        }
                        ?>
                    </select>
                </form>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Divisi</th>
                        <th>Posisi</th>
                        <th>Tipe Pekerjaan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    if (isset($_POST['select']) && !empty($_POST['select'])) {
                        // Pengguna memilih divisi tertentu
                        $query = $koneksi->prepare("SELECT detail_lowongan.*, divisi.nama AS nama_divisi 
                        FROM detail_lowongan 
                        LEFT JOIN divisi ON detail_lowongan.id_divisi = divisi.id 
                        WHERE divisi.id = ?");
                        $query->bindParam(1, $_POST['select'], PDO::PARAM_INT);
                    } else {
                        // Pengguna memilih "Semua" atau belum memilih
                        $query = $koneksi->query("SELECT detail_lowongan.*, divisi.nama AS nama_divisi 
                        FROM detail_lowongan 
                        LEFT JOIN divisi ON detail_lowongan.id_divisi = divisi.id");
                    }
                    $query->execute();
                    $no = 0;
                    while ($detail_lowongan = $query->fetch(PDO::FETCH_ASSOC)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $detail_lowongan['nama_divisi']; ?></td>
                            <td><?php echo $detail_lowongan['posisi']; ?></td>
                            <td><?php echo $detail_lowongan['tipe']; ?></td>
                            <td>
                                <?php
                                if ($detail_lowongan['status'] === 1) {
                                    echo '<p><a href="../admin/includes/update/update-active.php?id=' . $detail_lowongan['id'] . '&status=0" class="btn-sm btn-success">Active</a></p>';
                                } else {
                                    echo '<p><a href="../admin/includes/update/update-active.php?id=' . $detail_lowongan['id'] . '&status=1" class="btn-sm btn-danger">Deactive</a></p>';
                                }
                                ?>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit<?php echo $detail_lowongan['id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalView<?php echo $detail_lowongan['id']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a onclick="hapus_detail_lowongan(<?php echo $detail_lowongan['id']; ?>)" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

<!-- Edit Data -->
<?php
$query = $koneksi->query("SELECT * FROM detail_lowongan");
while ($detail_lowongan = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade" id="modalEdit<?php echo $detail_lowongan['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Detail Lowongan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="includes/update/update-detail-lowongan.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Divisi</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="id_divisi">
                                        <?php
                                        foreach ($divisions as $divisi) {
                                            $selected = ($divisi["id"] === $detail_lowongan['id_divisi']) ? "selected" : "";
                                            echo "<option value='" . $divisi["id"] . "' $selected>" . $divisi["nama"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputText">Posisi</label>
                                    <input type="text" class="form-control" placeholder="Frontend Developer" name="posisi" value="<?= $detail_lowongan['posisi'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputText">Lokasi</label>
                                    <input type="text" class="form-control" value="Jakarta Selatan" name="lokasi" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputText">Tipe Pekerjaan</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="tipe">
                                        <option value="Penuh Waktu" <?= ($detail_lowongan['tipe'] === 'Penuh Waktu') ? 'selected' : '' ?>>Penuh Waktu</option>
                                        <option value="Paruh Waktu" <?= ($detail_lowongan['tipe'] === 'Paruh Waktu') ? 'selected' : '' ?>>Paruh Waktu</option>
                                        <option value="Kerja Lepas" <?= ($detail_lowongan['tipe'] === 'Kerja Lepas') ? 'selected' : '' ?>>Kerja Lepas</option>
                                        <option value="Kontrak" <?= ($detail_lowongan['tipe'] === 'Kontrak') ? 'selected' : '' ?>>Kontrak</option>
                                        <option value="Magang" <?= ($detail_lowongan['tipe'] === 'Magang') ? 'selected' : '' ?>>Magang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputText">Publisher</label>
                                    <input type="text" class="form-control" value="B-Universe" name="publisher" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggung Jawab</label>
                            <textarea id="summernote" name="tanggung_jawab"><?= $detail_lowongan['tanggung_jawab'] ?></textarea>
                            <small id="deskripsiHelpBlock" class="form-text text-muted">
                                *Penting! Ketika anda ingin menyalin dan menempelkan teks, jangan lupa untuk menghapus gaya font dengan blok terlebih dahulu tulisan yang telah Anda salin dan gunakan kombinasi tombol keyboard <strong>(CTRL + \)</strong> atau klik tombol <strong><i class="note-icon-eraser"></i> </strong> di toolbar.
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Persyaratan</label>
                            <textarea id="summernote1" name="persyaratan"><?= $detail_lowongan['persyaratan'] ?></textarea>
                            <small id="deskripsiHelpBlock" class="form-text text-muted">
                                *Penting! Ketika anda ingin menyalin dan menempelkan teks, jangan lupa untuk menghapus gaya font dengan blok terlebih dahulu tulisan yang telah Anda salin dan gunakan kombinasi tombol keyboard <strong>(CTRL + \)</strong> atau klik tombol <strong><i class="note-icon-eraser"></i> </strong> di toolbar.
                            </small>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $detail_lowongan['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Edit Data End -->

<!-- View Data -->
<?php
$query = $koneksi->query("SELECT detail_lowongan.*, divisi.nama AS nama_divisi 
FROM detail_lowongan LEFT JOIN divisi ON detail_lowongan.id_divisi = divisi.id");
while ($detail_lowongan = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade" id="modalView<?php echo $detail_lowongan['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bolder" id="exampleModalLabel"><?php echo $detail_lowongan['nama_divisi']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="h3"><?php echo $detail_lowongan['posisi']; ?></h3>
                    <div class="row mt-3">
                        <div class="col-4 d-flex align-items-center justify-content-start">
                            <i class="fa fa-map pr-2"></i>
                            <p style="margin-bottom: 0;"><?php echo $detail_lowongan['lokasi']; ?></p>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-center">
                            <i class="fa fa-briefcase pr-2" aria-hidden="true"></i>
                            <p style="margin-bottom: 0;" class="text-center"><?php echo $detail_lowongan['tipe']; ?></p>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end">
                            <i class="fa fa-plus-square pr-2" aria-hidden="true"></i>
                            <p style="margin-bottom: 0;" class="text-right"><?php echo $detail_lowongan['publisher']; ?></p>
                        </div>
                    </div>
                    <div class="row mt-3 d-flex justify-content-between">
                        <div style="border: 1px solid; border-radius: 24px; padding: 16px;" class="col-6">
                            <h6 class="h6 font-weight-bold">Tanggung Jawab</h6>
                            <p><?php echo $detail_lowongan['tanggung_jawab']; ?></p>
                        </div>
                        <div style="border: 1px solid; border-radius: 24px; padding: 16px;" class="col-6">
                            <h6 class="h6 font-weight-bold">Persyaratan</h6>
                            <p><?php echo $detail_lowongan['persyaratan']; ?></p>
                        </div>
                    </div>
                    <p class="text-secondary mt-3">Dibuat: <?php echo $detail_lowongan['create_at']; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- View Data End -->

<script>
    function hapus_detail_lowongan(id) {
        Swal.fire({
            title: 'Apa anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Menggunakan AJAX untuk menghapus data
                $.ajax({
                    url: "includes/delete/delete-detail-lowongan.php?id=" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            }).then(function() {
                                // Redirect ke halaman lain setelah pesan sukses ditutup
                                window.location = "../admin/index.php?page=detail-lowongan";
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: response.message
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Terjadi kesalahan saat menghapus data.'
                        });
                    }
                });
            }
        });
    }
</script>