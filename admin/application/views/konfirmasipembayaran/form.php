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
          <div class="content-wrapper">


              <div class="page-header flex-wrap">
                <h3 class="mb-0" id="lbljudul"> Konfirmasi Pembayaran Pemenang Lelang
                </h3>
                <div class="d-flex">
                  <!-- <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                    <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>-->
                  
                  <a href="<?php echo site_url('konfirmasipembayaran') ?>" class="btn btn-sm bg-white btn-icon-text border ml-3"><i class="mdi mdi-arrow-left-thick btn-icon-prepend"></i> Kembali </a>
                </div>
              </div>
              <div class="row">
                
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-body">
                      
                      <div class="row">
                        
                        <input type="hidden" name="idpembayaran" id="idpembayaran" value="<?php echo $idpembayaran ?>">

                        <div class="col-12">

                          <div class="card">
                            <div class="card-body">
                              <div class="row">
                    
                                <div class="col-md-8">
                                  <h5 class="text-muted"><?php echo $rowpaket->namapaket ?></h5>
                                  <?php echo $rowpaket->deskripsi ?>
                                </div>
                                <div class="col-md-4 text-center" style="font-size: 26px; font-weight: bold;">
                                  <?php  
                                      echo '<i class="text-success">TOTAL BID : Rp. '.format_rupiah($rowpaket->totalhargabid).'</i>';
                                  ?>
                                  
                                </div>

                                <div class="col-md-6 p-3">


                                  <form action="<?php echo site_url('konfirmasipembayaran/simpankonfirmasi') ?>" id ="form" method="post" enctype="multipart/form-data">
                                    
                                    <input type="hidden" name="idpembayaran" id="idpembayaran" value="<?php echo $idpembayaran ?>">
                                    <input type="hidden" name="idpaket" id="idpaket" value="<?php echo $idpaket ?>">

                                    <div class="row">
                                     
                                      <div class="col-md-12">
                                        <div class="card">
                                          <div class="card-body">
                                              <h5 class="mb-5 text-muted">Bukti Yang Di Upload</h5>
                                              
                                              <div class="form-group row text center">
                                                <div class="col-md-12 mt-3 text-center">
                                                  <img src="<?php echo $fotopembayaran; ?>" id="output1" class="img-thumbnail" style="width:100%;max-height:100%;">
                                                  

                                                  
                                                </div>
                                            </div>

                                          </div>
                                        </div>
                                      </div>

                                      
                                      
                                      <div class="col-12 mt-3">
                                        <div class="from-group row">
                                          <label for="" class="col-md-12 col-form-label">Status Pembayaran</label>
                                          <div class="col-md-12">
                                            <select name="statuspembayaran" id="statuspembayaran" class="form-control">
                                              <option value="Menunggu Konfirmasi" <?php echo ($rowpembayaran->statuspembayaran=='Menunggu Konfirmasi') ? 'selected="selected"' : '' ?>>Menunggu Konfirmasi</option>
                                              <option value="Ditolak" <?php echo ($rowpembayaran->statuspembayaran=='Ditolak') ? 'selected="selected"' : '' ?>>Ditolak</option>
                                              <option value="Sudah Diterima" <?php echo ($rowpembayaran->statuspembayaran=='Sudah Diterima') ? 'selected="selected"' : '' ?>>Sudah Diterima</option>
                                            </select>
                                          </div>
                                          <div class="col-md-4 mt-3">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="mdi mdi-content-save-all btn-icon-prepend"></i> Simpan</button>
                                            
                                          </div>
                                        </div>
                                        
                                      </div>


                                    </div>

                                  </form>

                                </div>



                                <div class="col-md-6 p-3">
                                  <div class="row">
                                    
                                    <div class="col-12">
                                      <div class="card">
                                        <div class="card-body">
                                          <h5 class="mb-5 text-muted">Informasi Paket Lelang</h5>

                                          <table class="table">
                                            <tr style="font-size: 12px;">
                                              <td>Id Jadwal Lelang</td>
                                              <td>:</td>
                                              <td><?php echo $rowpaket->idpaket ?></td>
                                            </tr>
                                            <tr style="font-size: 12px;">
                                              <td>Tgl Mulai Lelang</td>
                                              <td>:</td>
                                              <td><?php echo date('d-m-Y H:i', strtotime($rowpaket->tgljammulai))  ?></td>
                                            </tr>
                                            <tr style="font-size: 12px;">
                                              <td>Tgl Berakhir Lelang</td>
                                              <td>:</td>
                                              <td><?php echo date('d-m-Y H:i', strtotime($rowpaket->tgljammulai))  ?></td>
                                            </tr>
                                            <tr>
                                              <td>Total Harga Dasar</td>
                                              <td>:</td>
                                              <td><?php echo format_rupiah($rowpaket->totalhargadasarpaket) ?></td>
                                            </tr>
                                            <tr>
                                              <td>Total Harga Bid</td>
                                              <td>:</td>
                                              <td style="font-weight: bold; font-size: 18px;"><?php echo format_rupiah($rowpaket->totalhargabid) ?></td>
                                            </tr>
                                            <tr>
                                              <td>Pemenang Lelang</td>
                                              <td>:</td>
                                              <td><?php echo $rowpaket->namausaha ?></td>
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


    <script type="text/javascript">
  
    var idpembayaran = "<?php echo($idpembayaran) ?>";

    $(document).ready(function() {

      $('.select2').select2();
      $("form").attr('autocomplete', 'off');
    }); //end (document).ready
    

  </script>


  </body>
</html>