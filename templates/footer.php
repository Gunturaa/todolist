<footer class="main-footer text-center py-3 bg-white shadow-sm">
    <div class="container">
        <span class="text-muted">
            &copy; 2025 <a href="https://adminlte.io" class="text-decoration-none text-primary fw-bold">Genoss</a>. All rights reserved.
        </span>
        <br>
        <small class="text-muted">Version 3.2.0</small>
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
</div>
<!-- ./wrapper -->

<!-- Script Essentials -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/plugins/moment/moment.min.js"></script>

<!-- Plugins -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../assets/plugins/toastr/toastr.min.js"></script>
<script src="../assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- AdminLTE -->
<script src="../assets/dist/js/adminlte.js"></script>

<!-- Custom Script -->
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();

        // Date picker
        $('#reservationdate').datetimepicker({ format: 'YYYY-MM-DD' });

        // Date range picker
        $('#reservation').daterangepicker();

        // Time picker
        $('#timepicker').datetimepicker({ format: 'LT' });

        // Input Mask
        $("#datemask").inputmask("yyyy-mm-dd", { placeholder: "yyyy-mm-dd" });
        $("#datemask2").inputmask("mm/dd/yyyy", { placeholder: "mm/dd/yyyy" });
        $("[data-mask]").inputmask();
    });
</script>
</body>
</html>
