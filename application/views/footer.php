<!-- Footer Start -->
    <div
      class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-4 col-md-6">
            <h4 class="text-white mb-4">
              <img src="<?php echo base_url('admin/images/logo-fif.png') ?>" alt="" style="width: 50px;"> FIF GROUP
            </h4>
            <p>
              Menjadi Pemimpin Industri yang Dikagumi Secara Nasional
            </p>
            <div class="d-flex pt-2">
              <a class="btn btn-square btn-outline-primary me-1" href="#"
                ><i class="fab fa-twitter"></i
              ></a>
              <a class="btn btn-square btn-outline-primary me-1" href="#"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a class="btn btn-square btn-outline-primary me-1" href="#"
                ><i class="fab fa-youtube"></i
              ></a>
              <a class="btn btn-square btn-outline-primary me-0" href="#"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <h4 class="text-light mb-4">Address</h4>
            <p>
              <i class="fa fa-map-marker-alt me-3"></i>Jl. Moh. Sohor No.17 A, Akcaya, Kec. Pontianak Sel., Kota Pontianak, Kalimantan Barat 78121
            </p>
            <p><i class="fa fa-phone-alt me-3"></i>(0561) 766917</p>
            <p><i class="fa fa-envelope me-3"></i>CorporateSecretary@fifgroup.astra.co.id</p>
          </div>
          <div class="col-lg-4 col-md-6">
            <h4 class="text-light mb-4">Quick Links</h4>
            <a class="btn btn-link" href="<?php echo site_url() ?>">Tentang Kami</a>
            <a class="btn btn-link" href="<?php echo site_url('paketlelang/tampil') ?>">Paket Lelang</a>
            <a class="btn btn-link" href="<?php echo site_url('account/gantipassword') ?>">Ganti Password</a>
            <a class="btn btn-link" href="<?php echo site_url('account/riwayatbid') ?>">Riwayat Bid</a>
          </div>
          
        </div>
      </div>
      <div class="container-fluid copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
              &copy; 2022 <a href="#">FIF GROUP - LELANG ONLINE</a>, All Right Reserved.
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/apex-10/') ?>lib/wow/wow.min.js"></script>
    <script src="<?php echo base_url('assets/apex-10/') ?>lib/easing/easing.min.js"></script>
    <script src="<?php echo base_url('assets/apex-10/') ?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo base_url('assets/apex-10/') ?>lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo base_url('assets/apex-10/') ?>js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url("admin/assets/") ?>jquery_mask/jquery.mask.js"></script>

    <!-- Bootstrap validator -->
    <script src="<?php echo (base_url("admin/assets/")) ?>bootstrap-validator/js/bootstrapValidator.js"></script>


    <script src="<?php echo base_url(); ?>admin/assets/sweetalert/sweetalert.js"></script>


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

        $(".tanggal").mask("00-00-0000", {placeholder:"dd-mm-yyyy"});
        $(".rupiah").mask("000,000,000,000", {reverse: true, placeholder:"000,000,000,000"});
        $('.rupiah').addClass('text-right');
    
    </script>  