<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title ">Tambah Shorts Event</h3>
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
            <form action="includes/create/add-shorts-event.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Video ID</label>
                            <input type="text" class="form-control" placeholder="6sUEsaaNMlc" name="video_id">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="label" for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" placeholder="Semesta Berpesta Jakarta" id="judul" minlength="3" maxlength="50">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="label" for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" rows="3" name="deskripsi" aria-describedby="deskripsiHelpBlock" minlength="10" maxlength="100" placeholder="Keseruan warga Jakarta dalam mengikuti event Semesta Berpesta"></textarea>
                            <small id="deskripsiHelpBlock" class="form-text text-muted">
                                *Maksimal 100 kata
                            </small </div>
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
            <h3 class="card-title ">Tabel Shorts Event</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Video ID</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 0;
                    $query = $koneksi->query("SELECT * FROM shorts");
                    while ($shorts_event = $query->fetch(PDO::FETCH_ASSOC)) {
                        $no++
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $shorts_event['video_id']; ?></td>
                            <td><?php echo $shorts_event['judul']; ?></td>
                            <td><?php echo $shorts_event['deskripsi']; ?></td>
                            <td class="text-center py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit<?php echo $shorts_event['id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalView<?php echo $shorts_event['id']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="hapus_shorts_event(<?php echo $shorts_event['id']; ?>)" class="btn btn-danger">
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
$query = $koneksi->query("SELECT * FROM shorts");
while ($shorts_event = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade" id="modalEdit<?php echo $shorts_event['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Acara Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="includes/update/update-shorts-event.php" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Video ID</label>
                                    <input type="text" class="form-control" placeholder="6sUEsaaNMlc" name="video_id" value="<?= $shorts_event['video_id']?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="label" for="judul">Judul</label>
                                    <input type="text" class="form-control" name="judul" placeholder="Semesta Berpesta Jakarta" id="judul" minlength="3" maxlength="50" value="<?= $shorts_event['judul']?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="label" for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" rows="3" name="deskripsi" aria-describedby="deskripsiHelpBlock" minlength="10" maxlength="100" placeholder="Keseruan warga Jakarta dalam mengikuti event Semesta Berpesta"><?= $shorts_event['deskripsi']?></textarea>
                                    <small id="deskripsiHelpBlock" class="form-text text-muted">
                                        *Maksimal 100 kata
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $shorts_event['id']; ?>">
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
    function hapus_shorts_event(id) {
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
                    url: "includes/delete/delete-shorts-event.php?id=" + id,
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
                                window.location = "../admin/index.php?page=shorts-event";
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