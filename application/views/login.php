<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>FIF GROUP - Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="<?php echo base_url('assets/apex-10/') ?>img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url('assets/apex-10/') ?>lib/animate/animate.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/apex-10/') ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url('assets/apex-10/') ?>css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url('assets/apex-10/') ?>css/style.css" rel="stylesheet" />
<!-- 
    <style>
      .text-primary {
        color : blue !important;
      }
    </style> -->
  </head>

  <body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div
              class="position-relative overflow-hidden ps-5 pt-5 h-100"
              style="min-height: 400px"
            >
              <img
                class="position-absolute w-100 h-100"
                src="<?php echo base_url('admin/images/fif-group.jpg') ?>"
                alt=""
                style="object-fit: cover"
              />
              <div
                class="position-absolute top-0 start-0 bg-white pe-3 pb-3"
                style="width: 200px; height: 200px"
              >
                <div
                  class="d-flex flex-column justify-content-center text-center bg-primary h-100 p-3"
                >
                  <h1 class="text-white">25</h1>
                  <h2 class="text-white">Tahun</h2>
                  <h5 class="text-white mb-0">Pengalaman</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <form action="<?php echo site_url('login/ceklogin') ?>" method="post">
              
              <div class="h-100">
                <div class="border-start border-5 border-primary ps-4 mb-5">
                  <h6 class="text-body text-uppercase mb-2">Selamat Datang</h6>
                  <h1 class="display-6 mb-0">
                    Silahkan Login Untuk Melanjutkan
                  </h1>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group row">
                      <label for="" class="col-md-4">Username</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                      </div>
                    </div>
                    <div class="form-group row mt-2">
                      <label for="" class="col-md-4">Password</label>
                      <div class="col-md-8">
                        <input type="password" class="form-control" name="password" placeholder="***************">
                      </div>
                      <div class="col-md-12 mt-5">
                        <button type="submit" class="btn btn-primary btn-sm py-3 px-5 float-end">Login</button>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="border-top mt-4 pt-4">
                  <div class="row g-4">
                    <div class="col-sm-12 d-flex wow fadeIn" data-wow-delay="0.1s">                    
                      <a href="<?php echo site_url('login/registrasi') ?>" class="text-primary">Belum Punya akun? Registrasi disini.</a>
                    </div>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Features Start -->
    <div class="container-xxl py-5" style="margin-top: 50px;">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4 mb-5">
              <h6 class="text-body text-uppercase mb-2">Lelang Terbuka!</h6>
              <h1 class="display-6 mb-0">
                Bagaimana Cara Bid Lelang FIF Group?
              </h1>
            </div>
            <p class="mb-5">
              Untuk bisa mengikuti lelang online di FIF GROUP Cabang Pontianak, Maka anda harus mengikuti prosedur-prosedur berikut.
            </p>
            <div class="row gy-5 gx-4">
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex align-items-center mb-3">
                  <i
                    class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                  ></i>
                  <h6 class="mb-0">Registrasikan Data Anda</h6>
                </div>
                <span
                  >Registrasikan diri anda agar dapat mengakses sistem informasi lelang online</span
                >
              </div>
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                <div class="d-flex align-items-center mb-3">
                  <i
                    class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                  ></i>
                  <h6 class="mb-0">Pilih paket lelang yang akan anda ikuti</h6>
                </div>
                <span
                  >pilih paket lelang yang akan anda ikuti dan perhatikan jadwal atau rentang waktu lelang tersebut</span
                >
              </div>
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="d-flex align-items-center mb-3">
                  <i
                    class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                  ></i>
                  <h6 class="mb-0">Bid lelang dengan harga penawaran anda</h6>
                </div>
                <span
                  >Berikan harga terbaik yang Anda</span
                >
              </div>
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                <div class="d-flex align-items-center mb-3">
                  <i
                    class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                  ></i>
                  <h6 class="mb-0">Tunggu sampai pemenang lelang ditentukan</h6>
                </div>
                <span
                  >Pihak FIFGROUP akan memeriksa daftar bid lelang Anda untuk menentukan pemenang dari setiap paket lelang</span
                >
              </div>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div
              class="position-relative overflow-hidden ps-5 pt-5 h-100"
              style="min-height: 400px"
            >
              <img
                class="position-absolute w-100 h-100"
                src="<?php echo base_url('admin/images/fif-group2.jpeg') ?>"
                alt=""
                style="object-fit: cover"
              />
              <div
                class="position-absolute top-0 start-0 bg-white pe-3 pb-3"
                style="width: 200px; height: 200px"
              >
                <div
                  class="d-flex flex-column justify-content-center text-center bg-primary h-100 p-3"
                >
                  <h1 class="text-white">25</h1>
                  <h2 class="text-white">Tahun</h2>
                  <h5 class="text-white mb-0">Pengalaman</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Features End -->


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
    <script src="<?php echo base_url(); ?>admin/assets/sweetalert/sweetalert.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo base_url('assets/apex-10/') ?>js/main.js"></script>

    <?php 
      $pesan = $this->session->flashdata("pesan");
      if (!empty($pesan)) {
        echo $pesan;
      }
    ?>
  </body>
</html>
