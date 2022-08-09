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
            $rsjadwal = $this->db->query("select * from paket_jadwal order by tglinsert desc");
            if ($rsjadwal->num_rows()>0) {
              $no=1;
              foreach ($rsjadwal->result() as $rowjadwal) {
                echo '
                          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="height: 400px;">
                            <div class="service-item bg-light overflow-hidden h-100">';

                
                echo '
                              

                              <div id="carouselExampleInterval'.$rowjadwal->idpaket.'" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">';

                $rsjadwaldetail = $this->db->query("select * from v_paket_detail where idpaket='".$rowjadwal->idpaket."'");
                if ($rsjadwaldetail->num_rows()>0) {
                    $noActive = 1;
                  foreach ($rsjadwaldetail->result() as $rowdetail) {
                    if (!empty($rowdetail->fotoitem)) {
                         $fotoitem = base_url('admin/uploads/itemlelang/'.$rowdetail->fotoitem);
                       } else{
                         $fotoitem = base_url('admin/images/sepedamotor.png');
                       }  
                       $active = "";
                       if ($noActive==1) {
                         $active = "active";
                       }
                        echo '
                                          <div class="carousel-item '.$active.'" data-bs-interval="10000">
                                            <img src="'.$fotoitem.'" class="d-block w-100" alt="..." style="height: 200px;">
                                          </div>';
                    $noActive++;
                  }
                }

                if (strlen($rowjadwal->deskripsi)<=100) {
                  $deskripsi = $rowjadwal->deskripsi;
                }else{
                  $deskripsi = substr($rowjadwal->deskripsi, 0, 100).' ...' ;
                }
                echo '
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval'.$rowjadwal->idpaket.'" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval'.$rowjadwal->idpaket.'" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>';

                if (!empty($rowjadwal->idbidpemenang)) {
                   echo '<img src="'.base_url('images/terjual3.jpg').'" class="img-terjual" alt="...">';
                }

                echo '
                              <div class="service-text position-relative text-center h-100 p-4">
                                <h5 class="mb-3">'.$rowjadwal->namapaket.'</h5>
                                <p>
                                  Tanggal Mulai: '.tgljamindonesia($rowjadwal->tgljammulai).' <br>s/d '.tgljamindonesia($rowjadwal->tgljamselesai).'
                                </p>
                                <a class="small" href="'.site_url('paketlelang/detail/'.$this->encrypt->encode($rowjadwal->idpaket)).'">Selengkapnya<i class="fa fa-arrow-right ms-3"></i
                                ></a>
                              </div>
                            </div>
                          </div>
                ';
                $no++;
              }
            }
          ?>
        </div>

      </div>
    </div>
    <!-- Service End -->

    <?php $this->load->view('footer'); ?>    
  </body>
</html>

