<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title ">Tambah Dokumentasi Event</h3>
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
            <form action="includes/create/add-dokumentasi-event.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Event</label>
                            <input type="text" class="form-control" placeholder="Semesta Berpesta" name="judul">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="label" for="image">Image Dokumentasi Event (16:9)</label>
                            <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image" id="image">
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
            <h3 class="card-title ">Tabel Dokumentasi Event</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Event</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 0;
                    $query = $koneksi->query("SELECT * FROM dokumentasi_event");
                    while ($dokumentasi_event = $query->fetch(PDO::FETCH_ASSOC)) {
                        $no++
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $dokumentasi_event['judul']; ?></td>
                            <td class="text-center py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit<?php echo $dokumentasi_event['id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalView<?php echo $dokumentasi_event['id']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="hapus_dokumentasi_event(<?php echo $dokumentasi_event['id']; ?>)" class="btn btn-danger">
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
$query = $koneksi->query("SELECT * FROM dokumentasi_event");
while ($dokumentasi_event = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade" id="modalEdit<?php echo $dokumentasi_event['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Dokumentasi Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="includes/update/update-dokumentasi-event.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Event</label>
                                    <input type="text" class="form-control" placeholder="Semesta Berpesta" name="judul" value="<?= $dokumentasi_event['judul'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="label" for="image">Image Dokumentasi Event (16:9)</label>
                                    <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image" id="image">
                                    <img src="../admin/upload/dokumentasi-event/<?php echo $dokumentasi_event['image']; ?>" class="img-fluid mt-3" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $dokumentasi_event['id']; ?>">
                        <input type="hidden" name="gambarLama" value="<?php echo $dokumentasi_event['image']; ?>">
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
$query = $koneksi->query("SELECT * FROM dokumentasi_event");
while ($dokumentasi_event = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade" id="modalView<?php echo $dokumentasi_event['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Dokumentasi Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body container-fluid">
                    <div class="dokumentasi-wrapper">
                        <img src="../admin/upload/dokumentasi-event/<?php echo $dokumentasi_event['image']; ?>" style="width: 100%;" alt="">
                        <div class="dokumentasi-judul">
                            <h1 class="text-black font-weight-bolder"><?php echo $dokumentasi_event['judul']; ?></h1>
                        </div>
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

<script>
    function hapus_dokumentasi_event(id) {
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
                    url: "includes/delete/delete-dokumentasi-event.php?id=" + id,
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
                                window.location = "../admin/index.php?page=dokumentasi-event";
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