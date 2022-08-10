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
          <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4">
              <h6 class="text-body text-uppercase mb-2">Pembayaran</h6>
              <h1 class="display-6 mb-0">
                Riwayat Pembayaran
              </h1>
            </div>
          </div>
        </div>
        <div class="row">

            <div class="col-12">
              <div class="card wow fadeInUp" data-wow-delay="0.1s">
                <div class="card-body">
                  <div class="row">
                    
                    <div class="col-md-12 mb-5">
                      <h5 class="text-muted">List Riwayat Pembayaran</h5>
                    </div>
                    
                    <div class="col-12">
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped table-condesed">
                          <thead>
                            <tr style="font-size: 12px; font-weight: bold;">
                              <th style="text-align: center;">Tanggal<br>ID</th>
                              <th style="text-align: center;">Nama Paket</th>
                              <th style="text-align: center;">Nama Usaha<br>NIB Usaha</th>
                              <th style="text-align: center;">Harga Dasar<br>Paket Lelang</th>
                              <th style="text-align: center;">Jumlah Bayar</th>
                              <th style="text-align: center;">Upload Bukti Pembayaran</th>
                              <th style="text-align: center;">Status Pembayaran</th>
                            </tr>
                          </thead>
                          <tbody>

                            <tr style="font-size: 12px;">
                              <th style="text-align: center;">02-07-2022<br>0215466002</th>
                              <th style="text-align: left;">PROMO HAJI RAYA</th>
                              <th style="text-align: left;">Sedawe Utama<br>458787</th>
                              <th style="text-align: right;">10.000.000</th>
                              <th style="text-align: right;">11.000.000</th>
                              <th style="text-align: center;"><a href="<?php echo site_url('pembayaran/upload/1') ?>" class="btn btn-info btn-sm"><i class="fas fa-upload"></i> Uploads</a></th>
                              <th style="text-align: center;">Menunggu Konfirmasi</th>
                            </tr>

                                  

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- col-12 -->



        </div> <!-- row -->
      

      </div>
    </div>
    <!-- Service End -->

    <?php $this->load->view('footer'); ?>    

    <script>

    $(document).ready(function() {
      
      //----------------------------------------------------------------- > validasi
      $("#form").bootstrapValidator({
        feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          namabankpengirim: {
            validators:{
              notEmpty: {
                  message: "nama bank pengirim tidak boleh kosong"
              },
            }
          },
          norekpengirim: {
            validators:{
              notEmpty: {
                  message: "nomor rekening pengirim tidak boleh kosong"
              },
            }
          },
        }
      });

    });

    </script>
  </body>
</html>

