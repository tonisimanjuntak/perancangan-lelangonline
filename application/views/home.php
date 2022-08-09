<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('header'); ?>
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



    <?php  
      $this->load->view('topmenu');
    ?>

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
            <div class="h-100">
              <div class="border-start border-5 border-primary ps-4 mb-5">
                <h6 class="text-body text-uppercase mb-2">Tentang Kami</h6>
                <h1 class="display-6 mb-0">
                  Menjadi Pemimpin Industri yang Dikagumi Secara Nasional
                </h1>
              </div>
              <p>
                PT Federal International Finance (“FIFGROUP”) didirikan dengan nama PT Mitrapusaka Artha Finance pada bulan Mei 1989. Berdasarkan ijin usaha yang diperoleh dari Menteri Keuangan, maka Perseroan bergerak dalam bidang Sewa Guna Usaha, Anjak Piutang dan Pembiayaan Konsumen.
              </p>
              <p class="mb-4">
                Pada tahun 1991, Perusahaan merubah nama menjadi PT Federal International Finance Namun seiring dengan perkembangan waktu dan guna memenuhi permintaan pasar, Perseroan mulai memfokuskan diri ke pembiayaan sepeda motor Honda pada bidang pembiayaan konsumen secara retail pada tahun 1996. Pada mei 2013, Perusahaan meluncurkan merek FIFGROUP. Saat ini berdasarkan Peraturan Otoritas Jasa Keuangan Nomor 29/POJK.05/2014
              </p>
              <div class="border-top mt-4 pt-4">
                <div class="row g-4">
                  <div class="col-sm-3 d-flex wow fadeIn" data-wow-delay="0.1s">
                    <i
                      class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                    ></i>
                    <h6 class="mb-0">FIFASTRA</h6>
                  </div>
                  <div class="col-sm-3 d-flex wow fadeIn" data-wow-delay="0.3s">
                    <i
                      class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                    ></i>
                    <h6 class="mb-0">SPECTRA</h6>
                  </div>
                  <div class="col-sm-3 d-flex wow fadeIn" data-wow-delay="0.5s">
                    <i
                      class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                    ></i>
                    <h6 class="mb-0">DANASTRA</h6>
                  </div>
                  <div class="col-sm-3 d-flex wow fadeIn" data-wow-delay="0.5s">
                    <i
                      class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
                    ></i>
                    <h6 class="mb-0">AMITRA</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5 align-items-end mb-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4">
              <h6 class="text-body text-uppercase mb-2">Paket Lelang</h6>
              <h1 class="display-6 mb-0">
                PAKET LELANG SECARA ONLINE
              </h1>
            </div>
          </div>
          <div class="col-lg-6 text-lg-end wow fadeInUp" data-wow-delay="0.3s">
            <a class="btn btn-primary py-3 px-5" href="">Tampilkan Semua</a>
          </div>
        </div>

        <div class="row g-4 justify-content-center">
          <?php  
                echo '
                          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="height: 400px;">
                            <div class="service-item bg-light overflow-hidden h-100">
                              <div id="carouselExampleInterval01" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                  <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="'.base_url('admin/uploads/itemlelang/PCX_150.png').'" class="d-block w-100" alt="..." style="height: 200px;">
                                  </div>                                  
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval01" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval01" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>
                              <div class="service-text position-relative text-center h-100 p-4">
                                <h5 class="mb-3">PROMO HAJI RAYA</h5>
                                <p>
                                  Tanggal Mulai: 01-06-2022 <br>s/d 31-08-2022
                                </p>
                                <a class="small" href="'.site_url('paketlelang/detail/1').'">Selengkapnya<i class="fa fa-arrow-right ms-3"></i
                                ></a>
                              </div>
                            </div>
                          </div>
                            ';


                  echo '
                          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="height: 400px;">
                            <div class="service-item bg-light overflow-hidden h-100">
                              <div id="carouselExampleInterval02" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                  <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="'.base_url('admin/uploads/itemlelang/Honda_Vario_125_eSP.png').'" class="d-block w-100" alt="..." style="height: 200px;">
                                  </div>
                                  <div class="carousel-item" data-bs-interval="10000">
                                    <img src="'.base_url('admin/uploads/itemlelang/HHonda_PCX_1501.png').'" class="d-block w-100" alt="..." style="height: 200px;">
                                  </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval02" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval02" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>
                              <img src="'.base_url('images/terjual3.jpg').'" class="img-terjual" alt="...">
                              <div class="service-text position-relative text-center h-100 p-4">
                                <h5 class="mb-3">PAKET IDUL ADHA</h5>
                                <p>
                                  Tanggal Mulai: 01-04-2022 <br>s/d 30-06-2022
                                </p>
                                <a class="small" href="'.site_url('paketlelang/detail/1').'">Selengkapnya<i class="fa fa-arrow-right ms-3"></i
                                ></a>
                              </div>
                            </div>
                          </div>
                            ';

                    echo '
                          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="height: 400px;">
                            <div class="service-item bg-light overflow-hidden h-100">
                              <div id="carouselExampleInterval03" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                  <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="'.base_url('admin/uploads/itemlelang/Honda_SH150i1.png').'" class="d-block w-100" alt="..." style="height: 200px;">
                                  </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval03" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval03" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>
                              <div class="service-text position-relative text-center h-100 p-4">
                                <h5 class="mb-3">Paket Juni 2022</h5>
                                <p>
                                  Tanggal Mulai: 01-06-2022 <br>s/d 17-08-2022
                                </p>
                                <a class="small" href="'.site_url('paketlelang/detail/1').'">Selengkapnya<i class="fa fa-arrow-right ms-3"></i
                                ></a>
                              </div>
                            </div>
                          </div>
                            ';



          ?>
        </div>

      </div>
    </div>
    <!-- Service End -->

    <?php $this->load->view('footer'); ?>    
  </body>
</html>

