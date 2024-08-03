<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title ">Tambah Acara</h3>
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
            <form action="includes/create/add-acara.php" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Acara</label>
                            <input type="text" class="form-control" placeholder="Berita Satu Siang" name="acara">
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
            <h3 class="card-title ">Tabel Acara Program</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Acara</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 0;
                    $query = $koneksi->query("SELECT * FROM acara");
                    while ($acara = $query->fetch(PDO::FETCH_ASSOC)) {
                        $no++
                    ?>
                        <tr>
                            <td class="text-center"><?= $no; ?></td>
                            <td class="text-center"><?= $acara['acara']; ?></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit<?= $acara['id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="hapus_acara(<?= $acara['id']; ?>)" class="btn btn-danger">
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
$query = $koneksi->query("SELECT * FROM acara");
while ($acara = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade" id="modalEdit<?php echo $acara['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Acara Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="includes/update/update-acara.php" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Acara</label>
                                    <input type="text" class="form-control" placeholder="Berita Satu Siang" value="<?= $acara['acara']; ?>" name="acara" required>
                                    <input type="text" class="form-control" name="id" value="<?= $acara['id']; ?>" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $acara['id']; ?>">
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
    function hapus_acara(id) {
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
                    url: "includes/delete/delete-acara.php?id=" + id,
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
                                window.location = "../admin/index.php?page=acara";
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