<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Form Apply Karir</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group row">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-filter">
                    Filter Tanggal
                </button>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Divisi</th>
                        <th>Posisi</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    if (isset($_POST['filter'])) {
                        $tgl_awal = $_POST['tgl_awal'];
                        $tgl_akhir = $_POST['tgl_akhir'];

                        // Membuat parameterized query untuk menghindari SQL injection
                        $query = $koneksi->prepare("SELECT * FROM form_apply WHERE create_at BETWEEN :tgl_awal AND :tgl_akhir");
                        $query->bindParam(':tgl_awal', $tgl_awal, PDO::PARAM_STR);
                        $query->bindParam(':tgl_akhir', $tgl_akhir, PDO::PARAM_STR);
                        $query->execute();
                    } else {
                        $query = $koneksi->query("SELECT * FROM form_apply");
                        $query->execute();
                    }
                    $no = 0;
                    while ($form_apply = $query->fetch(PDO::FETCH_ASSOC)) {
                        $no++
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $form_apply['create_at']; ?></td>
                            <td><?php echo $form_apply['divisi']; ?></td>
                            <td><?php echo $form_apply['posisi']; ?></td>
                            <td><?php echo $form_apply['fullname']; ?></td>
                            <td><?php echo $form_apply['email']; ?></td>
                            <td class="text-center py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit<?php echo $form_apply['id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalView<?php echo $form_apply['id']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="hapus_form_apply(<?php echo $form_apply['id']; ?>)" class="btn btn-danger">
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
    </div>
</section>
<!-- /.content -->

<!-- Filter Tanggal-->
<div class="modal fade" id="modal-filter">
    <div class="modal-dialog modal-filter">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Filter Tanggal</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tgl_awal">Tanggal Awal</label>
                        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tgl_akhir">Tanggal Akhir</label>
                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success float-right" name="filter">Filter</button>
                    <button type="submit" class="btn btn-dark float-right mr-2" name="reset">Reset</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Filter Tanggal End -->

<!-- View Data -->
<?php
$query = $koneksi->query("SELECT * FROM form_apply");
while ($form_apply = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade bd-example-modal-lg" id="modalView<?php echo $form_apply['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Form Apply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="font-weight-normal">Dikirim: <span><?php echo $form_apply['create_at']; ?></span></p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ready">Divisi</label>
                                <input class="form-control" value="<?php echo $form_apply['divisi']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ready">Posisi</label>
                                <input class="form-control" value="<?php echo $form_apply['posisi']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ready">Nama Lengkap</label>
                                <input class="form-control" value="<?php echo $form_apply['fullname']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ready">Email</label>
                                <input class="form-control" value="<?php echo $form_apply['email']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <label for="ready">Informasi Tambahan</label>
                    <p class="font-weight-normal text-secondary staticPesan"><?php echo $form_apply['cover_letter']; ?></p>
                    <div class="link-download d-flex flex-column">
                        <a href="../admin/upload/application_letter/<?php echo $form_apply['application_letter']; ?>.pdf" target="_blank" class="link-black text-sm">
                            <i class="fas fa-link mr-1"></i> Application Letter
                        </a>
                        <a href="../admin/upload/cv/<?php echo $form_apply['cv']; ?>.pdf" target="_blank" class="link-black text-sm">
                            <i class="fas fa-link mr-1"></i> CV
                        </a>
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

<!-- Delete Data -->
<script>
    function hapus_form_apply(id) {
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
                    url: "includes/delete/delete-form-apply.php?id=" + id,
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
                                window.location = "../admin/index.php?page=form-apply-karir";
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
<!-- Delete Data End -->