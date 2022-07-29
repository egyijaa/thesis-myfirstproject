<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#28a745">
                <h4 class="modal-title style="color:#28a745">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin keluar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                <a href="<?php echo base_url(); ?>index.php/login/logout" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- <?php
if (!($_SERVER['REQUEST_URI'] == "/sipalu1/") && !($_SERVER['REQUEST_URI'] == "/sipalu1/index.php")) {
    echo '';
}
?> -->
<script src="<?php echo base_url(); ?>/assets/bootstrap/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/jquery/jquery.min.js?t=<?php echo time();?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js?t=<?php echo time();?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/sweetalert2/sweetalert2.min.js?t=<?php echo time();?>"></script>
<!-- Toastr -->
<script src="<?php echo base_url(); ?>/assets/bootstrap/plugins/toastr/toastr.min.js?t=<?php echo time();?>"></script>
<script src="<?php echo base_url(); ?>/assets/bootstrap/jquery/sweet.js?t=<?php echo time();?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js?t=<?php echo time();?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/assets/adminLte/dist/js/adminlte.js?t=<?php echo time();?>"></script>

<?php if($this->uri->uri_string() != 'login/toLogin' && $this->uri->uri_string() != 'login/toRegister' && $this->uri->uri_string() != 'page') : ?>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/sparklines/sparkline.js?t=<?php echo time();?>"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/moment/moment.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/daterangepicker/daterangepicker.js?t=<?php echo time();?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js?t=<?php echo time();?>"></script>
<?php endif; ?>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>/assets/adminLte/plugins/jquery-ui/jquery-ui.min.js?t=<?php echo time();?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>


<?php if($this->uri->uri_string() == 'page/alumni' && $this->session->userdata('akses')!='2') : ?>
    <!-- ChartJS -->
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/chart.js/Chart.min.js?t=<?php echo time();?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/jqvmap/jquery.vmap.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/jqvmap/maps/jquery.vmap.usa.js?t=<?php echo time();?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/jquery-knob/jquery.knob.min.js?t=<?php echo time();?>"></script>
<?php endif; ?>

<!-- jQuery Mapael -->
<?php if(uri_string() == 'page/alumni' || (uri_string() == 'Broadcast/toBroadcast' && $this->session->userdata('akses')!='2')) : ?>

    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/jquery-mousewheel/jquery.mousewheel.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/raphael/raphael.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/jquery-mapael/jquery.mapael.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/jquery-mapael/maps/usa_states.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables/jquery.dataTables.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-responsive/js/dataTables.responsive.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/dataTables.buttons.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/jszip/jszip.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/pdfmake/pdfmake.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/pdfmake/vfs_fonts.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/buttons.html5.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/buttons.print.min.js?t=<?php echo time();?>"></script>
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-buttons/js/buttons.colVis.min.js?t=<?php echo time();?>"></script>
    
    <script src="<?php echo base_url(); ?>/assets/adminLte/plugins/datatables-select/js/dataTables.select.min.js?t=<?php echo time();?>"></script>
<?php endif; ?>
<script type="text/javascript">
$(document).ready(function() {
    bsCustomFileInput.init();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#image_upload_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#inputFile").change(function() {
    readURL(this);
});
</script>
</body>

</html>