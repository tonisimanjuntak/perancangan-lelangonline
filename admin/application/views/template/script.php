    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo (base_url()) ?>assets/jquery/jquery.min.js"></script>

    <script src="<?php echo base_url('assets/breeze-free/template/') ?>assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo base_url('assets/breeze-free/template/') ?>assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url('assets/breeze-free/template/') ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url('assets/breeze-free/template/') ?>assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url('assets/breeze-free/template/') ?>assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url('assets/breeze-free/template/') ?>assets/js/misc.js"></script>
    <!-- endinject -->
    

    <!-- datatables -->
    <script src="<?php echo (base_url()) ?>assets/datatables2/js/jquery.dataTables.min.js"></script>

    <!-- jquery-mask -->
    <script type="text/javascript" src="<?php echo base_url("assets/") ?>jquery_mask/jquery.mask.js"></script>

    <!-- Bootstrap validator -->
    <script src="<?php echo (base_url("assets/")) ?>bootstrap-validator/js/bootstrapValidator.js"></script>

    <!-- jquery-ui -->
    <script src="<?php echo (base_url("assets/")) ?>jquery-ui/jquery-ui-2.js"></script>

    <!-- select2 -->
    <script src="<?php echo (base_url()) ?>assets/select2/js/select2.min.js"></script>

    <!-- CK Editor -->
    <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

    <!-- CK Editor -->
    <script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert.js"></script>

    <?php 
      $pesan = $this->session->flashdata("pesan");
      if (!empty($pesan)) {
        echo $pesan;
      }
    ?>


    <script>

        const numberWithCommas = (x) => {
              return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }  

        const untitik = (i) => {
            return typeof i === "string" ?
                                i.replace(/[\$,]/g, '')*1 :
                                typeof i === "number" ?
                                    i : 0;
        }

        $(".bobot").mask("000.0000", {reverse: true, placeholder:"000.00000"});
        $('.bobot').addClass('text-right');

        $(".tanggal").mask("00-00-0000", {placeholder:"dd-mm-yyyy"});
        $(".rupiah").mask("000,000,000,000", {reverse: true, placeholder:"000,000,000,000"});
        $('.rupiah').addClass('text-right');
        $(".berat").mask("000,000.00", {reverse: true, placeholder:"000,000.00"});
        $('.berat').addClass('text-right');
    
    </script>   