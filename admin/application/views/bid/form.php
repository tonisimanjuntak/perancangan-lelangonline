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

            <form action="<?php echo(site_url('bid/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">

              <div class="page-header flex-wrap">
                <h3 class="mb-0" id="lbljudul"> Bid Peserta Lelang
                </h3>
                <div class="d-flex">
                  <!-- <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                    <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>-->
                  
                  <a href="<?php echo site_url('bid') ?>" class="btn btn-sm bg-white btn-icon-text border ml-3"><i class="mdi mdi-arrow-left-thick btn-icon-prepend"></i> Kembali </a>
                </div>
              </div>
              <div class="row">
                
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-body">
                      
                      <div class="row">
                        
                        <input type="hidden" name="idbid" id="idbid" value="<?php echo $idbid ?>">

                        <div class="col-12">

                          <div class="card">
                            <div class="card-body">
                              <div class="row">                          
                                <div class="col-12">
                                  <h3 class="text-muted text-center">Informasi Peserta Lelang</h3>
                                </div>  
                                <div class="col-md-4">
                                        
                                  <div class="form-group row text center">
                                    <label for="" class="col-md-12 col-form-label">Foto Pengguna <span style="color: red; font-size: 12px; font-weight: bold;"><i> Max ukuran file 2MB</i></span></label>
                                    <div class="col-md-12 mt-3 text-center">
                                      <img src="<?php echo base_url('images/users.png'); ?>" id="output1" class="img-thumbnail" style="width:70%;max-height:70%;">
                                      
                                    </div>
                                  </div>

                                </div>
                                <div class="col-md-8">
                                  <div class="table-responsive mt-5">
                                    <table class="table">
                                      <tr>
                                        <td>Nama Usaha</td>
                                        <td>:</td>
                                        <td>UD Mitra Bumi Perkasa</td>
                                      </tr>
                                      <tr>
                                        <td>NIB Usaha</td>
                                        <td>:</td>
                                        <td>4578878</td>
                                      </tr>
                                      <tr>
                                        <td>Nama Pemilik</td>
                                        <td>:</td>
                                        <td>Budi Sulistiyo</td>
                                      </tr>
                                      <tr>
                                        <td>NIK Pemilik</td>
                                        <td>:</td>
                                        <td>48785450025001</td>
                                      </tr>
                                      <tr>
                                        <td>Email Pemilik</td>
                                        <td>:</td>
                                        <td>budi@gmail.com</td>
                                      </tr>
                                      <tr>
                                        <td>No Telp Pemilik</td>
                                        <td>:</td>
                                        <td>0812454545</td>
                                      </tr>
                                    </table>
                                  </div>
                                </div>
                              </div> <!-- row -->
                            </div>
                          </div>

                        </div>

                        <div class="col-md-12 mt-4">                        
                          <div class="card">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-12">
                                  <h3 class="text-muted text-center">Detail Bid Peserta Lelang</h3>                                  
                                </div>
                                <div class="col-12">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th style="width: 15%; text-align: center;">FOTO</th>
                                        <th style="text-align: center;">TIPE/ MERK</th>
                                        <th style="text-align: center;">NO MESIN<br>NO RANGKA<br>NO POLISI</th>
                                        <th style="text-align: right;">HARGA DASAR</th>
                                        <th style="text-align: right;">HARGA BID</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td style="text-align: center;"><img src="<?php echo base_url('uploads/itemlelang/Honda_Vario_150_eSP.png') ?>" alt="" style="width: 80%;"></td>
                                        <td style="text-align: center;">Vario 110 eSP CBS<br>Honda</td>
                                        <td style="text-align: center;">029737267<br>98726561<br>KB 4444</td>
                                        <td style="text-align: right;">10.000.000</td>
                                        <td style="text-align: right;">11.000.000</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              
                            </div>
                          </div>      
                        </div>

                        <div class="col-12 mt-4">
                          <div class="from-group row">
                            <label for="" class="col-md-4 col-form-label">Status Peserta</label>
                            <div class="col-md-4">
                              <select name="statusbid" id="statusbid" class="form-control">                                
                                <option value="Menunggu">Menunggu</option>
                                <option value="Kalah">Kalah</option>
                                <option value="Menang">Menang</option>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <button type="submit" class="btn btn-sm btn-primary"><i class="mdi mdi-content-save-all btn-icon-prepend"></i> Simpan</button>
                              
                            </div>
                          </div>
                          
                        </div>
                        



                      </div>
                      
                      
                    </div>
                  </div>
                </div>
              </div>



            
            
            </form>                      
          
            
          </div>

          <?php $this->load->view('template/footer'); ?>

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>



    <?php $this->load->view('template/script'); ?>


    <script type="text/javascript">
  
    var idbid = "<?php echo($idbid) ?>";

    $(document).ready(function() {

      $('.select2').select2();
      $("form").attr('autocomplete', 'off');
    }); //end (document).ready
    

  </script>


  </body>
</html>