<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title ">Program Unggulan</h3>
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
            <form action="includes/create/add-program-unggulan.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputText">Judul Program</label>
                    <input type="text" class="form-control" placeholder="Nyari Makan" name="judul">
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Deskripsi Singkat Program</label>
                    <textarea class="form-control" rows="3" name="deskripsi" aria-describedby="deskripsiHelpBlock" minlength="10" maxlength="200" placeholder="Anindya Salsabila, akan jalan-jalan dan icip-icip makanan serta minuman enak yang pastinya bisa jadi referensi baru menu kulineran kalian nih."></textarea>
                    <small id="deskripsiHelpBlock" class="form-text text-muted">
                        *Maksimal 200 kata
                    </small>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="label" for="image">Image Program Unggulan (16:9)</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputText">Jadwal</label>
                            <input type="text" class="form-control" name="jadwal" placeholder="Setiap Senin - Jumat Pukul 09:30">
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
                        <th>Judul Program</th>
                        <th>Deskripsi Singkat Program</th>
                        <th>Jadwal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $query = $koneksi->query("SELECT * FROM program_unggulan");
                    while ($program_unggulan = $query->fetch(PDO::FETCH_ASSOC)) {
                        $no++
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $no; ?></td>
                            <td><?php echo $program_unggulan['judul']; ?></td>
                            <td><?php echo substr($program_unggulan['deskripsi'], 0, 150); ?>...</td>
                            <td><?php echo $program_unggulan['jadwal']; ?></td>
                            <td class="text-center py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit<?php echo $program_unggulan['id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalView<?php echo $program_unggulan['id']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="hapus_program_unggulan(<?php echo $program_unggulan['id']; ?>)" class="btn btn-danger">
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

<!-- View Data -->
<?php
$query = $koneksi->query("SELECT * FROM program_unggulan");
while ($program_unggulan = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade" id="modalView<?php echo $program_unggulan['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Program Unggulan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body container-fluid">
                    <img src="../admin/upload/program-unggulan/<?php echo $program_unggulan['image']; ?>" class="img-fluid" style="width: 100%;" alt="">
                    <div class="program-description mt-3">
                        <h1 class="font-weight-bold"><?php echo $program_unggulan['judul']; ?></h1>
                        <h5 class="text-secondary"><?php echo $program_unggulan['deskripsi']; ?></h5>
                        <p class="font-weight-bold"><?php echo $program_unggulan['jadwal']; ?></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- View Data End -->

<!-- Edit Data -->
<?php
$query = $koneksi->query("SELECT * FROM program_unggulan");
while ($program_unggulan = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade" id="modalEdit<?php echo $program_unggulan['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Program Unggulan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="includes/update/update-program-unggulan.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputText">Judul Program</label>
                            <input type="text" class="form-control" placeholder="Nyari Makan" name="judul" value="<?php echo $program_unggulan['judul']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText">Deskripsi Singkat Program</label>
                            <textarea class="form-control" rows="3" name="deskripsi" minlength="10" maxlength="255" placeholder="Anindya Salsabila, akan jalan-jalan dan icip-icip makanan serta minuman enak yang pastinya bisa jadi referensi baru menu kulineran kalian nih."><?php echo $program_unggulan['deskripsi']; ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="label" for="image">Image Program Unggulan (16:9)</label>
                                    <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image" id="image">
                                    <img src="../admin/upload/program-unggulan/<?php echo $program_unggulan['image']; ?>" class="img-fluid mt-3" alt="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputText">Jadwal</label>
                                    <input type="text" class="form-control" name="jadwal" value="<?php echo $program_unggulan['jadwal']; ?>" placeholder="Setiap Senin - Jumat Pukul 09:30">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $program_unggulan['id']; ?>">
                        <input type="hidden" name="gambarLama" value="<?php echo $program_unggulan['image']; ?>">
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
    function hapus_program_unggulan(id) {
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
                    url: "includes/delete/delete-program-unggulan.php?id=" + id,
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
                                window.location = "../admin/index.php?page=program-unggulan";
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