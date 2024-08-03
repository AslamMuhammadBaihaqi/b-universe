<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title ">Tambah Galeri B-Universe</h3>
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
            <form method="POST" enctype="multipart/form-data" action="includes/create/add-gallery.php">
                <div class="form-group">
                    <label for="judul">Judul Acara</label>
                    <input type="text" class="form-control" name="judul" placeholder="Semesta Berpesta">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Singkat Acara</label>
                    <textarea class="form-control" rows="3" name="deskripsi" aria-describedby="deskripsiHelpBlock" placeholder="Semesta Berpesta adalah sebuah acara..." minlength="10" maxlength="255"></textarea>
                    <small id="deskripsiHelpBlock" class="form-text text-muted">
                        Maksimal 255 kata
                    </small>
                </div>
                <div class="form-group">
                    <label class="label" for="image">Image Thumbnail (1:1 atau 3:4)</label>
                    <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image1" id="image1">
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="label" for="image2">Image Landscape (16:9)</label>
                            <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image2" id="image2">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="label" for="image3">Image Landscape (16:9)</label>
                            <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image3" id="image3">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="label" for="image4">Image Potrait 3:4 (optional)</label>
                            <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image4" id="image4">
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
            <h3 class="card-title ">Tabel Galeri</h3>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th rowspan="2" class="align-middle">No</th>
                        <th rowspan="2" class="align-middle">Judul Acara</th>
                        <th rowspan="2" class="align-middle">Deskripsi Acara</th>
                        <th rowspan="2" class="align-middle">Action</th>
                    </tr>

                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 0;
                    $query = $koneksi->query("SELECT * FROM galeri");
                    while ($galeri = $query->fetch(PDO::FETCH_ASSOC)) {
                        $no++
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $galeri['judul']; ?></td>
                            <td class="text-left"><?php echo substr($galeri['deskripsi'], 0, 100); ?>...</td>
                            <td class="text-center py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit<?php echo $galeri['id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalView<?php echo $galeri['id']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a onclick="hapus_galeri(<?php echo $galeri['id']; ?>)" class="btn btn-danger">
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
$query = $koneksi->query("SELECT * FROM galeri");
while ($galeri = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade" id="modalEdit<?php echo $galeri['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Galeri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="includes/update/update-gallery.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="judul">Judul Acara</label>
                            <input type="text" class="form-control" name="judul" placeholder="Semesta Berpesta" value="<?= $galeri['judul'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Singkat Acara</label>
                            <textarea class="form-control" rows="3" name="deskripsi" aria-describedby="deskripsiHelpBlock" placeholder="Semesta Berpesta adalah sebuah acara..." minlength="10" maxlength="255"><?= $galeri['deskripsi'] ?></textarea>
                            <small id="deskripsiHelpBlock" class="form-text text-muted">
                                Maksimal 255 kata
                            </small>
                        </div>
                        <div class="form-group">
                            <label class="label" for="image">Image Thumbnail (1:1 atau 3:4)</label>
                            <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image1" id="image1">
                            <img src="../admin/upload/gallery/<?php echo $galeri['image1']; ?>" class="img-fluid mt-3" style="height: 150px;" alt="">
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="label" for="image2">Image Landscape (16:9)</label>
                                    <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image2" id="image2">
                                    <img src="../admin/upload/gallery/<?php echo $galeri['image2']; ?>" class="img-fluid mt-3" style="width: 200px;" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="label" for="image3">Image Landscape (16:9)</label>
                                    <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image3" id="image3">
                                    <img src="../admin/upload/gallery/<?php echo $galeri['image3']; ?>" class="img-fluid mt-3" style="width: 200px;" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="label" for="image4">Image Potrait 3:4 (optional)</label>
                                    <input type="file" class="form-control" accept="image/jpg, image/jpeg, image/png" name="image4" id="image4">
                                    <img src="../admin/upload/gallery/<?php echo $galeri['image4']; ?>" class="img-fluid mt-3" style="height: 150px;" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $galeri['id']; ?>">
                        <input type="hidden" name="gambarLama1" value="<?php echo $galeri['image1']; ?>">
                        <input type="hidden" name="gambarLama2" value="<?php echo $galeri['image2']; ?>">
                        <input type="hidden" name="gambarLama3" value="<?php echo $galeri['image3']; ?>">
                        <input type="hidden" name="gambarLama4" value="<?php echo $galeri['image4']; ?>">
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
$query = $koneksi->query("SELECT * FROM galeri");
while ($galeri = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade" id="modalView<?php echo $galeri['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <?php if (isset($galeri['image1'])) : ?>
                            <div class="<?php echo isset($galeri['image4']) ? 'col-4' : 'col-6'; ?>">
                                <img src="../admin/upload/gallery/<?php echo $galeri['image1']; ?>" style="width: 100%; max-height: 500px; object-fit: cover; border-radius: 24px;" alt="">
                            </div>
                        <?php endif; ?>

                        <?php if (isset($galeri['image2']) && isset($galeri['image3'])) : ?>
                            <div class="<?php echo isset($galeri['image4']) ? 'col-4' : 'col-6'; ?> d-flex align-items-start flex-column">
                                <div class="row">
                                    <img src="../admin/upload/gallery/<?php echo $galeri['image2']; ?>" style="width: 100%; max-height: 240px; object-fit: cover; border-radius: 24px;" alt="">
                                </div>
                                <div class="row mt-auto">
                                    <img src="../admin/upload/gallery/<?php echo $galeri['image3']; ?>" style="width: 100%; max-height: 240px; object-fit: cover; border-radius: 24px;" alt="">
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($galeri['image4'])) : ?>
                            <div class="col-4">
                                <img src="../admin/upload/gallery/<?php echo $galeri['image4']; ?>" style="width: 100%; max-height: 500px; object-fit: cover; border-radius: 24px;" alt="">
                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="program-description mt-3">
                        <h1 class="font-weight-bold"><?php echo $galeri['judul']; ?></h1>
                        <h5 class="text-secondary"><?php echo $galeri['deskripsi']; ?></h5>
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
    function hapus_galeri(id) {
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
                    url: "includes/delete/delete-gallery.php?id=" + id,
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
                                window.location = "../admin/index.php?page=gallery";
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