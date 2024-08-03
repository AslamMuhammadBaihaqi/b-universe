<footer class="main-footer">
    <strong>Copyright &copy; 2023
        <a href="https://b-universe.id/" target="_blank">B-Universe</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge("uibutton", $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
    $(document).ready(function() {
        // Check if the status is 'success1', 'failed1', or 'alert1'
        if (window.location.search.includes('status=success1')) {
            // Display SweetAlert for success1 status
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Data berhasil disimpan.',
                confirmButtonText: 'OK'
            });
        } else if (window.location.search.includes('status=success2')) {
            // Display SweetAlert for success2 status
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Data berhasil diedit.',
                confirmButtonText: 'OK'
            });
        } else if (window.location.search.includes('status=success3')) {
            // Display SweetAlert for success2 status
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Status berhasil diubah.',
                confirmButtonText: 'OK'
            });
        } else if (window.location.search.includes('status=failed1')) {
            // Display SweetAlert for failed1 status
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Data belum berhasil disimpan, mohon untuk mencoba beberapa saat lagi.',
                confirmButtonText: 'OK'
            });
        } else if (window.location.search.includes('status=alert1')) {
            // Display SweetAlert for alert1 status
            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Mohon untuk mengisikan data yang dibutuhkan dengan lengkap.',
                confirmButtonText: 'OK'
            });
        }
    });
</script>
<!-- SweetAlert2 End -->

<script>
    $(document).ready(function() {
        // DataTables
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "order": [
                [0, "asc"]
            ],
            "lengthMenu": [
                [25, 50, 75, 100, 125, 150, -1],
                [25, 50, 75, 100, 125, 150, 'All'],
            ],
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        // DataTables End

        // Active Menu
        var urlWithoutStatus = window.location.href.split('&')[0]; // Get the URL without status parameter
        $('ul.nav-sidebar a').filter(function() {
            return this.href == urlWithoutStatus;
        }).addClass('active');
        $('ul.nav-treeview a').filter(function() {
                return this.href == urlWithoutStatus;
            }).parentsUntil(".nav-sidebar > .nav-treeview")
            .css({
                'display': 'block'
            })
            .addClass('menu-open').prev('a')
            .addClass('active');
        // Active Menu End

        // Date Range Picker
        $('#reservation, #editTanggal').daterangepicker({
            locale: {
                format: 'D MMMM YYYY',
            }
        })
        // Date Range Picker End

        // Active ON/OFF Switch
        $('input[data-bootstrap-switch]').each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
        // Active ON/OFF Switch

        // Summernote
        $('#summernote, #summernote1, #summernote2').summernote({
            styleTags: ['p'],
            toolbar: [
                ['style', ['style']],
                ['font', ['italic', 'underline', 'clear']],
                ['para', ['ul', 'ol']],
                ['para', ['paragraph']],
                ['para', ['left', 'center', 'right', 'justify']],
            ]
        });
        // Summernote End

        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4',
        });
    });
</script>