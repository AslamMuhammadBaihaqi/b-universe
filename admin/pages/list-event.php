<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title ">Tambah List Event</h3>
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
            <form method="POST" enctype="multipart/form-data" action="includes/create/add-event.php">
                <div class="form-group">
                    <label for="exampleInputText">Judul Event</label>
                    <input type="text" class="form-control" placeholder="Semesta Berpesta" name="judul">
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Slogan Event</label>
                    <input type="text" class="form-control" name="slogan" placeholder="Nantikan Andmesh di Karawang 12 -13 Agustus 2023!">
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Deskripsi Detail Event</label>
                    <textarea id="summernote2" name="deskripsi"></textarea>
                    <small id="deskripsiHelpBlock" class="form-text text-muted">
                        *Penting! Ketika anda ingin menyalin dan menempelkan teks, jangan lupa untuk menghapus gaya font dengan blok terlebih dahulu tulisan yang telah Anda salin dan gunakan kombinasi tombol keyboard <strong>(CTRL + \)</strong> atau klik tombol <strong><i class="note-icon-eraser"></i> </strong> di toolbar.
                    </small>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label class="label" for="image">Image Program Unggulan (16:9)</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputText">Lokasi</label>
                            <input type="text" class="form-control" name="lokasi" placeholder="Stadion Utama Gelora Bung Karno">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputText">Link Google Maps</label>
                            <input type="text" class="form-control" name="link" placeholder="https://maps.app.goo.gl/NRJHLNVFTYfDR9rH6">
                        </div>
                    </div>
                </div>
                <!-- Date range -->
                <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservation" name="tanggal">
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
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
                        <th>Judul Event</th>
                        <th>Slogan Event</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 0;
                    $query = $koneksi->query("SELECT * FROM event ORDER BY tanggal_awal asc");
                    while ($event = $query->fetch(PDO::FETCH_ASSOC)) {
                        $no++;
                        $tanggal_awal = $event['tanggal_awal'];
                        $tanggal_akhir = $event['tanggal_akhir'];

                        // Memformat tanggal_awal
                        if ($tanggal_awal === $tanggal_akhir) {
                            // Jika tanggal awal dan tanggal akhir sama
                            $tanggal_format = date('j F Y', strtotime($tanggal_awal));
                        } else {
                            // Jika tanggal awal dan tanggal akhir berbeda
                            $tanggal_format = date('j', strtotime($tanggal_awal)) . ' - ' . date('j F Y', strtotime($tanggal_akhir));
                        }
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $event['judul']; ?></td>
                            <td><?php echo $event['slogan']; ?></td>
                            <td><?php echo $event['lokasi']; ?></td>
                            <td><?php echo $tanggal_format ?></td>
                            <td class="text-center py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit<?php echo $event['id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalView<?php echo $event['id']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a onclick="hapus_event(<?php echo $event['id']; ?>)" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
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
$query = $koneksi->query("SELECT * FROM event");
while ($event = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade" id="modalEdit<?php echo $event['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="includes/update/update-event.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputText">Judul Event</label>
                                    <input type="text" class="form-control" placeholder="Semesta Berpesta" name="judul" value="<?= $event['judul'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputText">Slogan Event</label>
                                    <input type="text" class="form-control" name="slogan" value="<?= $event['slogan'] ?>" placeholder="Nantikan Andmesh di Karawang 12 -13 Agustus 2023!">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Date range -->
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <?php
                                        // Ambil data tanggal dari variabel $event
                                        $tanggal_awal = date('d F Y', strtotime($event['tanggal_awal']));
                                        $tanggal_akhir = date('d F Y', strtotime($event['tanggal_akhir']));
                                        $tanggal_range = $tanggal_awal . ' - ' . $tanggal_akhir;
                                        ?>
                                        <input type="text" class="form-control float-right" id="editTanggal" name="tanggal" value="<?php echo $tanggal_range; ?>">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi Detail Event</label>
                            <textarea id="summernote2" name="deskripsi"><?= $event['deskripsi'] ?></textarea>
                            <small id="deskripsiHelpBlock" class="form-text text-muted">
                                *Penting! Ketika anda ingin menyalin dan menempelkan teks, jangan lupa untuk menghapus gaya font dengan blok terlebih dahulu tulisan yang telah Anda salin dan gunakan kombinasi tombol keyboard <strong>(CTRL + \)</strong> atau klik tombol <strong><i class="note-icon-eraser"></i> </strong> di toolbar.
                            </small>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label class="label" for="image">Image Program Unggulan (16:9)</label>
                                <input type="file" class="form-control" name="image" id="image">
                                <img src="../admin/upload/event/<?php echo $event['image']; ?>" style="width: 250px;" class="img-fluid mt-3" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputText">Lokasi</label>
                                    <input type="text" class="form-control" name="lokasi" placeholder="Stadion Utama Gelora Bung Karno" value="<?= $event['lokasi'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputText">Link Google Maps</label>
                                    <input type="text" class="form-control" name="link" placeholder="https://maps.app.goo.gl/NRJHLNVFTYfDR9rH6" value="<?= $event['link'] ?>">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
                        <input type="hidden" name="gambarLama" value="<?php echo $event['image']; ?>">
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
$query = $koneksi->query("SELECT * FROM event");
while ($event = $query->fetch(PDO::FETCH_ASSOC)) {
    $tanggal_awal = $event['tanggal_awal'];
    $tanggal_akhir = $event['tanggal_akhir'];

    // Memformat tanggal_awal
    if ($tanggal_awal === $tanggal_akhir) {
        // Jika tanggal awal dan tanggal akhir sama
        $tanggal_format = date('j F Y', strtotime($tanggal_awal));
    } else {
        // Jika tanggal awal dan tanggal akhir berbeda
        $tanggal_format = date('j', strtotime($tanggal_awal)) . ' - ' . date('j F Y', strtotime($tanggal_akhir));
    }
?>
    <div class="modal fade" id="modalView<?php echo $event['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body container-fluid">
                    <img src="../admin/upload/event/<?php echo $event['image']; ?>" class="img-fluid" style="width: 100%;" alt="">
                    <div class="info-event mt-2">
                        <div class="slogan d-flex justify-content-center">
                            <h2 class="text-center font-weight-bold h2" style="width: 75%;"><?php echo $event['slogan']; ?></h2>
                        </div>
                        <div class="location-event d-flex align-items-center justify-content-around mt-3">
                            <div class="d-flex align-items-center">
                                <i class="far fa-calendar pr-2" aria-hidden="true"></i>
                                <p style="margin-bottom: 0;"><?php echo $tanggal_format ?></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="far fa-map pr-2"></i>
                                <p style="margin-bottom: 0;"><a style="color: black;" target="_blank" href="<?php echo $event['link']; ?>"><?php echo $event['lokasi']; ?></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="info-event-detail mt-5">
                        <h1 class="text-center font-weight-bolder"><?php echo $event['judul']; ?></h1>
                        <p><?php echo $event['deskripsi']; ?></p>
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
    function hapus_event(id) {
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
                    url: "includes/delete/delete-event.php?id=" + id,
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
                                window.location = "../admin/index.php?page=list-event";
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