<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title ">Tambah Divisi</h3>
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
            <form action="includes/create/add-divisi.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Divisi</label>
                            <input type="text" class="form-control" placeholder="IT" name="nama">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="label" for="image">Image Card Divisi</label>
                            <input type="file" class="form-control" name="image" id="image">
                            <small id="deskripsiHelpBlock" class="form-text text-muted">
                                *Disarankan untuk upload image card divisi dengan format .svg
                            </small>
                        </div>
                    </div>
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
            <h3 class="card-title ">Tabel Divisi</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Divisi</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 0;
                    $query = $koneksi->query("SELECT * FROM divisi");
                    while ($divisi = $query->fetch(PDO::FETCH_ASSOC)) {
                        $no++
                    ?>
                        <tr>
                            <td class="text-center align-middle"><?php echo $no; ?></td>
                            <td class="text-center align-middle"><?php echo $divisi['nama']; ?></td>
                            <td><img src="../admin/upload/divisi/<?php echo $divisi['image']; ?>" class="img-responsive" width="100" alt=""></td>
                            <td class="text-center align-middle">
                                <?php
                                if ($divisi['status'] === 1) {
                                    echo '<p><a href="../admin/includes/update/update-active-divisi.php?id=' . $divisi['id'] . '&status=0" class="btn-sm btn-success">Active</a></p>';
                                } else {
                                    echo '<p><a href="../admin/includes/update/update-active-divisi.php?id=' . $divisi['id'] . '&status=1" class="btn-sm btn-danger">Deactive</a></p>';
                                }
                                ?>
                            </td>
                            <td class="text-center align-middle">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit<?php echo $divisi['id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="hapus_divisi(<?php echo $divisi['id']; ?>)" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
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
$query = $koneksi->query("SELECT * FROM divisi");
while ($divisi = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade" id="modalEdit<?php echo $divisi['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Divisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="includes/update/update-divisi.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Divisi</label>
                                    <input type="text" class="form-control" placeholder="IT"" name=" nama" value="<?= $divisi['nama'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="label" for="image">Image Card Divisi (16:9)</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <small id="deskripsiHelpBlock" class="form-text text-muted">
                                        *Disarankan untuk upload image card divisi dengan format .svg
                                    </small>
                                    <img src="../admin/upload/divisi/<?php echo $divisi['image']; ?>" class="img-fluid mt-3" width="150">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $divisi['id']; ?>">
                        <input type="hidden" name="gambarLama" value="<?php echo $divisi['image']; ?>">
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
    function hapus_divisi(id) {
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
                    url: "includes/delete/delete-divisi.php?id=" + id,
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
                                window.location = "../admin/index.php?page=divisi";
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