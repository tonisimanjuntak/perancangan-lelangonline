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
              <h6 class="text-body text-uppercase mb-2">Upload Pembayaran Pemenang Lelang</h6>
              <h1 class="display-6 mb-0">
                <?php echo $rowpaket->namapaket ?>
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
                      <?php echo $rowpaket->deskripsi ?>
                    </div>
                    <div class="col-md-4 text-center" style="font-size: 26px; font-weight: bold;">
                      <?php  
                          echo '<i class="text-success">TOTAL BID : Rp. '.format_rupiah($rowpaket->totalhargabid).'</i>';
                      ?>
                      
                    </div>

                    <div class="col-md-8 p-3">

                      <form action="<?php echo site_url('pembayaran/simpanupload') ?>" id ="form" method="post" enctype="multipart/form-data">
                        
                        <input type="hidden" name="idpembayaran" id="idpembayaran" value="<?php echo $idpembayaran ?>">
                        <input type="hidden" name="idpaket" id="idpaket" value="<?php echo $idpaket ?>">

                        <div class="row">
                          <div class="col-12">
                            <h3>Silahkan Upload Bukti Pembayaran!</h3>
                          </div>
                        

                          <div class="col-md-12 mt-3">
                            <div class="card">
                              <div class="card-body">
                                  
                                  <div class="form-group row text center">
                                    <label for="" class="col-md-12 col-form-label">Bukti Pembayaran <span style="color: red; font-size: 12px; font-weight: bold;"><i> Max ukuran file 2MB</i></span></label>
                                    <div class="col-md-12 mt-3 text-center">
                                      <img src="<?php echo $fotopembayaran; ?>" id="output1" class="img-thumbnail" style="width:50%;max-height:50%;">
                                      <div class="form-group">
                                          <span class="btn btn-primary btn-file btn-block;" style="width:50%;">
                                            <span class="fileinput-new"><span class="fa fa-camera"></span> Upload Foto</span>
                                            <input type="file" name="file" id="file" accept="image/*" onchange="loadFile1(event)">
                                            <input type="hidden" value="<?php echo $rowpembayaran->fotopembayaran ?>" name="file_lama" id="file_lama" class="form-control" />
                                          </span>
                                      </div>
                                      <script type="text/javascript">
                                          var loadFile1 = function(event) {
                                              var output1 = document.getElementById('output1');
                                              output1.src = URL.createObjectURL(event.target.files[0]);
                                          };
                                      </script>

                                      
                                    </div>
                                </div>

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
                                  <th><?php echo $rowpaket->idpaket ?></th>
                                </tr>
                                <tr>
                                  <th>Tgl Mulai Lelang</th>
                                  <th>:</th>
                                  <th><?php echo date('d-m-Y H:i', strtotime($rowpaket->tgljammulai))  ?></th>
                                </tr>
                                <tr>
                                  <th>Tgl Berakhir Lelang</th>
                                  <th>:</th>
                                  <th><?php echo date('d-m-Y H:i', strtotime($rowpaket->tgljammulai))  ?></th>
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
                                  <th><?php echo format_rupiah($rowpaket->totalhargadasarpaket) ?></th>
                                </tr>
                                <tr>
                                  <th>Total Harga Bid</th>
                                  <th>:</th>
                                  <th style="font-weight: bold; font-size: 18px;"><?php echo format_rupiah($rowpaket->totalhargabid) ?></th>
                                </tr>
                                <tr>
                                  <th>Pemenang Lelang</th>
                                  <th>:</th>
                                  <th><?php echo $rowpaket->namausaha ?></th>
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

