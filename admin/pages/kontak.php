<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Form Inputan User</h3>
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Handphone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    if (isset($_POST['filter'])) {
                        $tgl_awal = $_POST['tgl_awal'];
                        $tgl_akhir = $_POST['tgl_akhir'];

                        // Membuat parameterized query untuk menghindari SQL injection
                        $query = $koneksi->prepare("SELECT * FROM kontak WHERE create_at BETWEEN :tgl_awal AND :tgl_akhir");
                        $query->bindParam(':tgl_awal', $tgl_awal, PDO::PARAM_STR);
                        $query->bindParam(':tgl_akhir', $tgl_akhir, PDO::PARAM_STR);
                        $query->execute();
                    } else {
                        $query = $koneksi->query("SELECT * FROM kontak");
                        $query->execute();
                    }
                    $no = 0;
                    while ($kontak = $query->fetch(PDO::FETCH_ASSOC)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?php echo $no; ?> </td>
                            <td><?php echo $kontak['create_at']; ?> </td>
                            <td><?php echo $kontak['nama']; ?> </td>
                            <td><?php echo $kontak['email']; ?></td>
                            <td><?php echo $kontak['nomor']; ?></td>
                            <td class="text-center py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalView<?php echo $kontak['id']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="hapus_kontak(<?php echo $kontak['id']; ?>)" class="btn btn-danger">
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
$query = $koneksi->query("SELECT * FROM kontak");
while ($kontak = $query->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="modal fade" id="modalView<?php echo $kontak['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class=" modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Kontak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body container-fluid">
                    <div class="program-description mt-3">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" value="<?php echo $kontak['nama']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" value="<?php echo $kontak['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Nomor</label>
                                    <input class="form-control" value="<?php echo $kontak['nomor']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <label for="staticPesan" class="col-sm-2 col-form-label">Pesan:</label>
                        <p class="font-weight-normal text-secondary staticPesan pl-2"><?php echo $kontak['pesan']; ?></p>
                        <p class="font-weight-normal pl-2">Dikirim: <span><?php echo $kontak['create_at']; ?></span></p>
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
    function hapus_kontak(id) {
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
                    url: "includes/delete/delete-kontak.php?id=" + id,
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
                                window.location = "../admin/index.php?page=kontak";
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