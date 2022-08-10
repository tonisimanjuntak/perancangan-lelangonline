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

    <!-- Service Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5 align-items-end mb-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4">
              <h6 class="text-body text-uppercase mb-2">Paket Lelang</h6>
              <h1 class="display-6 mb-0">
                LIST DATA PAKET LELANG
              </h1>
            </div>
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

