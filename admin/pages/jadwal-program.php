<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Jadwal Program</h3>

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
            <form action="includes/create/add-jadwal.php" method="post">
                <div class="row">
                    <?php
                    $query = $koneksi->query("SELECT * FROM acara");
                    $acaraProgram = $query->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Acara Program</label>
                            <select class="form-control select2bs4" style="width: 100%;" name="acara">
                                <option value="">Select Option</option>
                                <?php
                                foreach ($acaraProgram as $acara) {
                                    echo "<option value='" . $acara["id"] . "'>" . $acara["acara"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputText">Hari</label>
                            <select class="form-control select2bs4" style="width: 100%;" name="hari">
                                <option>Select Option</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleInputText">Jadwal Acara</label>
                            <input type="text" class="form-control" name="jam" placeholder="00.00-01.00">
                            <small id="deskripsiHelpBlock" class="form-text text-muted">
                                *Penting! Harap untuk mengisikan jadwal acara sesuai dengan format jam yang diberikan (contoh: 00.00-01.00).
                            </small>
                        </div>
                    </div>
                </div>
                <div class="button-right mt-3 float-right">
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
            <h3 class="card-title ">Tabel Program Unggulan</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Acara</th>
                        <th>Hari</th>
                        <th>Jadwal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 0;
                    $query = $koneksi->query("SELECT jadwal.*, acara.acara AS nama_acara 
                                    FROM jadwal 
                                    LEFT JOIN acara ON jadwal.id_acara = acara.id
                                    ORDER BY FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'),
                                    CAST(SUBSTRING(jam, 1, 2) AS UNSIGNED), 
                                    CAST(SUBSTRING(jam, 4, 2) AS UNSIGNED)");
                    while ($jadwal = $query->fetch(PDO::FETCH_ASSOC)) {
                        $no++
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $no; ?></td>
                            <td><?php echo $jadwal['nama_acara']; ?></td>
                            <td><?php echo $jadwal['hari']; ?></td>
                            <td><?php echo $jadwal['jam']; ?></td>
                            <td class="text-center py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit<?php echo $jadwal['id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="hapus_jadwal(<?php echo $jadwal['id']; ?>)" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

<!-- Edit Data -->
<?php
$query = $koneksi->query("SELECT * FROM jadwal");
while ($jadwal = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade" id="modalEdit<?php echo $jadwal['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="includes/update/update-jadwal.php" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Acara Program</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="id_acara">
                                        <?php
                                        foreach ($acaraProgram as $acara) {
                                            $selected = ($acara["id"] === $jadwal['id_acara']) ? "selected" : "";
                                            echo "<option value='" . $acara["id"] . "' $selected>" . $acara["acara"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputText">Hari</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="hari">
                                        <option value="Senin" <?= ($jadwal['hari'] === 'Senin') ? 'selected' : '' ?>>Senin</option>
                                        <option value="Selasa" <?= ($jadwal['hari'] === 'Selasa') ? 'selected' : '' ?>>Selasa</option>
                                        <option value="Rabu" <?= ($jadwal['hari'] === 'Rabu') ? 'selected' : '' ?>>Rabu</option>
                                        <option value="Kamis" <?= ($jadwal['hari'] === 'Kamis') ? 'selected' : '' ?>>Kamis</option>
                                        <option value="Jumat" <?= ($jadwal['hari'] === 'Jumat') ? 'selected' : '' ?>>Jumat</option>
                                        <option value="Sabtu" <?= ($jadwal['hari'] === 'Sabtu') ? 'selected' : '' ?>>Sabtu</option>
                                        <option value="Minggu" <?= ($jadwal['hari'] === 'Minggu') ? 'selected' : '' ?>>Minggu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jadwal Acara</label>
                                    <input type="text" class="form-control" placeholder="00.30-01.00" name="jam" value="<?= $jadwal['jam'] ?>">
                                    <small id="deskripsiHelpBlock" class="form-text text-muted">
                                        *Penting! Harap untuk mengisikan jadwal acara sesuai dengan format jam yang diberikan (contoh: 00.00-01.00).
                                    </small>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $jadwal['id']; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Edit Data End -->

<script>
    function hapus_jadwal(id) {
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
                    url: "includes/delete/delete-jadwal.php?id=" + id,
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
                                window.location = "../admin/index.php?page=jadwal-program";
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