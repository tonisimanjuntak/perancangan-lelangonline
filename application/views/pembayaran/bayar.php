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
              <h6 class="text-body text-uppercase mb-2">Pembayaran Pemenang Lelang</h6>
              <h1 class="display-6 mb-0">
                PROMO HAJI RAYA
              </h1>
            </div>
          </div>
        </div>
        <div class="row">

            <div class="col-12">
              <div class="card wow fadeInUp" data-wow-delay="0.1s">
                <div class="card-body">
                  <div class="row">
                    
                    <div class="col-md-8 mb-5">
                      <h5 class="text-muted">Deskripsi Jadwal:</h5>
                      Murah Meriah Honda Scoopy
                    </div>
                    <div class="col-md-4 text-center" style="font-size: 26px; font-weight: bold;">
                      <?php  
                          echo '<i class="text-success">TOTAL BID : Rp. 11.0000.000</i>';
                      ?>
                      
                    </div>

                    <div class="col-md-8 p-3">

                      <form action="<?php echo site_url('pembayaran/simpan') ?>" id ="form" method="post">
                        
                        <input type="hidden" name="idpaket" id="idpaket" value="1212">
                        <input type="hidden" name="idbid" id="idbid" value="12121">
                        <input type="hidden" name="nominalbayar" id="nominalbayar" value="121212">
                        <div class="row">
                          <div class="col-12">
                            <h3>Selamat!</h3>
                          </div>
                          <div class="col-12">
                            Anda terpilih sebagai pemenang lelang <strong>PROMO HAJI RAYA</strong>. Silahkan melakukan pembayaran sebesar <strong>Rp. 11.000.0000</strong> ke rekening dibawah ini.
                          </div>
                          <div class="col-12">

                            <div class="form-check p-3">
                              <input class="form-check-input" type="radio" name="idbank" id="idbank01" checked="" value="01">
                              <label class="form-check-label" for="idbank01">
                                <img src="<?php echo base_url('admin/uploads/bank/2560px-BANK_BRI_logo_svg.png') ?>" alt="" width="80px"><div class="ml-3">BANK RAKYAT INDONESIA (95864587)</div>
                              </label>
                            </div>                

                            <div class="form-check p-3">
                              <input class="form-check-input" type="radio" name="idbank" id="idbank02" value="01">
                              <label class="form-check-label" for="idbank02">
                                <img src="<?php echo base_url('admin/uploads/bank/2560px-Bank_Central_Asia_svg.png') ?>" alt="" width="80px"><div class="ml-3">BANK CENTRAL ASIA (454684547)</div>
                              </label>
                            </div>  

                            <div class="form-check p-3">
                              <input class="form-check-input" type="radio" name="idbank" id="idbank03" value="01">
                              <label class="form-check-label" for="idbank03">
                                <img src="<?php echo base_url('admin/uploads/bank/Bank_Mandiri_logo_2016_svg.png') ?>" alt="" width="80px"><div class="ml-3">BANK MANDIRI TBK (5684852)</div>
                              </label>
                            </div>                            
                            
                          </div>
                          <div class="col-12 mt-5">
                            <h5 class="text-muted">Informasi Pengirim</h5><hr>
                          </div>
                          <div class="col-12">
                            <div class="form-group row p-3">
                              <label for="" class="col-md-4">Nama Bank Pengirim</label>
                              <div class="col-md-8">
                                <select name="namabankpengirim" id="namabankpengirim" class="form-control">
                                  <option value="">Pilih nama bank...</option>
                                  <option value="BRI (Bank Rakyat Indonesia)">BRI (Bank Rakyat Indonesia)</option>
                                  <option value="BNI (Bank Negara Indonesia)">BNI (Bank Negara Indonesia)</option>
                                  <option value="Mandiri">Mandiri</option>
                                  <option value="BCA (Bank Central Asia)">BCA (Bank Central Asia)</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row p-3">
                              <label for="" class="col-md-4">No Rek. Pengirim</label>
                              <div class="col-md-8">
                                <input type="text" name="norekpengirim" id="norekpengirim" class="form-control" placeholder="Nomor rekening pengirim">
                              </div>
                            </div>
                          </div>
                          <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary py-3 px-5 float-end">Lanjutkan</button>
                          </div>
                        </div>

                      </form>

                    </div>



                    <div class="col-md-4">
                      <div class="row">
                        
                        <div class="col-12">
                          <div class="card">
                            <div class="card-body">
                              
                              <table class="table">
                                <tr>
                                  <th>Id Jadwal Lelang</th>
                                  <th>:</th>
                                  <th>2541225</th>
                                </tr>
                                <tr>
                                  <th>Tgl Mulai Lelang</th>
                                  <th>:</th>
                                  <th>01-06-2022</th>
                                </tr>
                                <tr>
                                  <th>Tgl Berakhir Lelang</th>
                                  <th>:</th>
                                  <th>31-08-2022</th>
                                </tr>
                              </table>

                            </div>
                          </div>
                        </div>


                        <div class="col-12">
                          <div class="card">
                            <div class="card-body">
                              
                              <table class="table">
                                <tr>
                                  <th>Total Harga Dasar</th>
                                  <th>:</th>
                                  <th>10.0000.000</th>
                                </tr>
                                <tr>
                                  <th>Total Harga Bid</th>
                                  <th>:</th>
                                  <th style="font-weight: bold; font-size: 18px;">11.0000.000</th>
                                </tr>
                                <tr>
                                  <th>Pemenang Lelang</th>
                                  <th>:</th>
                                  <th>Sedawe Utama</th>
                                </tr>
                              </table>

                            </div>
                          </div>
                        </div>


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

