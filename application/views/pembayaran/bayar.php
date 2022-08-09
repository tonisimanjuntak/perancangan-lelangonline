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

                      <form action="<?php echo site_url('pembayaran/simpan') ?>" id ="form" method="post">
                        
                        <input type="hidden" name="idpaket" id="idpaket" value="<?php echo $rowpaket->idpaket ?>">
                        <input type="hidden" name="idbid" id="idbid" value="<?php echo $rowpaket->idbidpemenang ?>">
                        <input type="hidden" name="nominalbayar" id="nominalbayar" value="<?php echo $rowpaket->totalhargabid ?>">
                        <div class="row">
                          <div class="col-12">
                            <h3>Selamat!</h3>
                          </div>
                          <div class="col-12">
                            Anda terpilih sebagai pemenang lelang <strong><?php echo $rowpaket->namapaket ?></strong>. Silahkan melakukan pembayaran sebesar <strong>Rp. <?php echo format_rupiah($rowpaket->totalhargabid) ?></strong> ke rekening dibawah ini.
                          </div>
                          <div class="col-12">
                            <?php  
                              $rsbank = $this->db->query("select * from bank where statusaktif='Aktif' order by idbank desc");
                              if ($rsbank->num_rows()>0) {
                                $no=1;
                                foreach ($rsbank->result() as $row) {
                                  $checked ='';
                                  if ($no==1) {
                                    $checked = 'checked';
                                  }

                                  if (!empty($row->logobank)) {
                                    $logobank = base_url('admin/uploads/bank/'.$row->logobank);
                                  }else{
                                    $logobank = base_url('admin/images/bank.jpg');
                                  }
                                  echo '
                                    <div class="form-check p-3">
                                      <input class="form-check-input" type="radio" name="idbank" id="idbank'.$row->idbank.'" '.$checked.' value="'.$row->idbank.'">
                                      <label class="form-check-label" for="idbank'.$row->idbank.'">
                                        <img src="'.$logobank.'" alt="" width="80px"><div class="ml-3">'.$row->namabank.' ('.$row->norekening.')'.'</div>
                                      </label>
                                    </div>
                                  ';
                                  $no++;
                                }
                              }
                            ?>
                            
                            
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

