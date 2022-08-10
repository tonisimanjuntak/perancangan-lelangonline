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
              <h6 class="text-body text-uppercase mb-2">Riwayat Bid</h6>
              <h1 class="display-6 mb-0">
                List Data Riwayat Bid
              </h1>
            </div>
          </div>
        </div>
        <div class="row">

            <div class="col-12">
              <div class="card wow fadeInUp" data-wow-delay="0.1s">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="text-align: center;">NO</th>
                            <th style="text-align: center;">ID BID/<br>TGL BID</th>
                            <th style="text-align: center;">NAMA PAKET</th>
                            <th style="text-align: center;">HARGA DASAR PAKET</th>
                            <th style="text-align: center;">TOTAL HARGA BID</th>
                            <th style="text-align: center;">STATUS BID</th>
                            <th style="text-align: center;">PEMENANG BID</th>
                          </tr>
                        </thead>
                        <tbody>

                          <tr>
                            <th style="text-align: center;">1</th>
                            <th style="text-align: center;">2206230005<br>23-07-2022</th>
                            <th style="text-align: center;">PROMO HAJI RAYA</th>
                            <th style="text-align: center;">Rp. 10.0000.000</th>
                            <th style="text-align: center;">Rp. 11.000.0000</th>
                            <th style="text-align: center;">Menang</th>
                            <th style="text-align: center;">Sedawe Utama</th>
                          </tr>

                          <tr>
                              <th style="text-align: center;" colspan="7">
                                <h3 class="text-success">SELAMAT</h3>
                                <p>Anda telah terpilih sebagai pemenang Lelang PROMO HAJI RAYA.</p>
                                <?php  
                                    echo '
                                  <a href="'.site_url('pembayaran/bayar/1').'">Klik disini untuk melakukan pembayaran!</a>
                                    ';                                  
                                ?>
                              </th>                                          
                            </tr>

                        </tbody>
                      </table>
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

      $('#form').submit(function(e) {
        e.preventDefault();        
          insertbid('1212121');
      });


      function insertbid(idpaket)
      {
        var formData = {
            "idpaket"       : '',
            "itemdetail"       : '',
        };

        $.ajax({
              type        : 'POST', 
              url         : '<?php echo site_url("paketlelang/simpan") ?>', 
              data        : formData, 
              dataType    : 'json', 
              encode      : true
          })
          .done(function(result){
              console.log(result);
              if (result.success) {
                  alert("Berhasil simpan data!");
                  window.location.href = "<?php echo(site_url('account/riwayatbid')) ?>";
              }else{
                alert("Gagal simpan data!");
              }
          })
          .fail(function(){
              alert("Gagal script simpan data!");
          });
      }

    </script>
  </body>
</html>

