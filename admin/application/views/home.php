<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('template/header'); ?>
  </head>
  <body>
    <div class="container-scroller">
      
      <?php $this->load->view('template/sidebar'); ?>

      <?php $this->load->view('template/topbar'); ?>

      

        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Selamat Datang! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block"></span>
              </h3>
              <div class="d-flex">
                
              </div>
            </div>
            <div class="row">
              
              <div class="col-xl-12 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <p class="text-muted"> SISTEM INFORMASI LELANG ONLINE PADA FIF GROUP CABANG PONTIANAK</p>
                      </div>

                      <div class="col-12">
                        <div class="row">
                          <div class="col-md-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                            <div class="card bg-warning">
                              <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                  <div class="color-card">
                                    <p class="mb-0 color-card-head">Jumlah Lelang</p>
                                    <?php  
                                      $j11 = $this->db->query("select count(*) as j11 from paket_jadwal")->row()->j11;
                                      $j12 = $this->db->query("select count(*) as j12 from paket_jadwal where month(tgljammulai)='".date('m')."'")->row()->j12;
                                    ?>
                                    <h2 class="text-white"> <?php echo $j11 ?>
                                    </h2>
                                  </div>
                                  <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                                </div>
                                <h6 class="text-white"><?php echo $j12 ?> Bulan ini</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                            <div class="card bg-danger">
                              <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                  <div class="color-card">
                                    <p class="mb-0 color-card-head">Jumlah Peserta</p>
                                    <?php  
                                      $j11 = $this->db->query("select count(*) as j11 from peserta_lelang")->row()->j11;
                                    ?>
                                    <h2 class="text-white"> <?php echo $j11 ?><span class="h5"></span>
                                    </h2>
                                  </div>
                                  <i class="card-icon-indicator fa fa-users bg-inverse-icon-danger"></i>
                                </div>
                                <!-- <h6 class="text-white">13.21% Since last month</h6> -->
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                            <div class="card bg-primary">
                              <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                  <div class="color-card">
                                    <p class="mb-0 color-card-head">Jumlah Bid</p>
                                    <?php  
                                      $j11 = $this->db->query("select count(*) as j11 from v_bid")->row()->j11;
                                      $j12 = $this->db->query("select count(*) as j12 from v_bid where month(tglbid)='".date('m')."'")->row()->j12;
                                    ?>
                                    <h2 class="text-white"> <?php echo $j11 ?><span class="h5"></span>
                                    </h2>
                                  </div>
                                  <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                                </div>
                                <h6 class="text-white"><?php echo $j12 ?> Bulan ini</h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                            <div class="card bg-success">
                              <div class="card-body px-3 py-4">
                                <div class="d-flex justify-content-between align-items-start">
                                  <div class="color-card">
                                    <p class="mb-0 color-card-head">Jumlah Pembayaran</p>
                                    <?php  
                                      $j11 = $this->db->query("select count(*) as j11 from v_pembayaran")->row()->j11;
                                      $j12 = $this->db->query("select count(*) as j12 from v_pembayaran where month(tglpembayaran)='".date('m')."'")->row()->j12;
                                    ?>
                                    <h2 class="text-white"> <?php echo $j11 ?><span class="h5"></span>
                                    </h2>
                                  </div>
                                  <i class="card-icon-indicator fa fa-money bg-inverse-icon-primary"></i>
                                </div>
                                <h6 class="text-white"><?php echo $j12 ?> Bulan ini</h6>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>


                    </div>
                    <div class="row mt-5">
                      <div class="col-md-6">
                        <img src="<?php echo base_url('images/fif-group.jpg') ?>" alt="" style="width: 80%;">
                      </div>
                      <div class="col-md-6">
                        <p>Sistem informasi lelang online FIFGROUP Cabang Pontianak merupakan sebuah media berbasis online dimana proses pelelangan, yaitu penawaran harga yang dilakukan oleh peserta lelang hanya dapat dilakukan satu kali sesuai dengan rentang waktu yang telah ditentukan, untuk mencari harga tertinggi dari harga yang ditawar oleh peserta lelang</p>
                      </div>
                    </div>
                    
                    
                  </div>
                </div>
              </div>
            </div>



            
            
          
            
          </div>

          <?php $this->load->view('template/footer'); ?>

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>



    <?php $this->load->view('template/script'); ?>


  </body>
</html>