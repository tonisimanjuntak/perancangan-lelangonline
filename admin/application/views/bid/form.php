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
                                      <img src="<?php echo base_url('uploads/pesertalelang/'.$rowbid->foto); ?>" id="output1" class="img-thumbnail" style="width:70%;max-height:70%;">
                                      <div class="form-group">
                                          <span class="btn btn-primary btn-file btn-block;" style="width:70%;">
                                            <span class="fileinput-new"><span class="fa fa-camera"></span> Upload Foto</span>
                                            <input type="file" name="file" id="file" accept="image/*" onchange="loadFile1(event)">
                                            <input type="hidden" value="" name="file_lama" id="file_lama" class="form-control" />
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
                                <div class="col-md-8">
                                  <div class="table-responsive mt-5">
                                    <table class="table">
                                      <tr>
                                        <td>Nama Usaha</td>
                                        <td>:</td>
                                        <td><?php echo $rowbid->namausaha ?></td>
                                      </tr>
                                      <tr>
                                        <td>NIB Usaha</td>
                                        <td>:</td>
                                        <td><?php echo $rowbid->nibusaha ?></td>
                                      </tr>
                                      <tr>
                                        <td>Nama Pemilik</td>
                                        <td>:</td>
                                        <td><?php echo $rowbid->namapemilik ?></td>
                                      </tr>
                                      <tr>
                                        <td>NIK Pemilik</td>
                                        <td>:</td>
                                        <td><?php echo $rowbid->nikpemilik ?></td>
                                      </tr>
                                      <tr>
                                        <td>Email Pemilik</td>
                                        <td>:</td>
                                        <td><?php echo $rowbid->emailpemilik ?></td>
                                      </tr>
                                      <tr>
                                        <td>No Telp Pemilik</td>
                                        <td>:</td>
                                        <td><?php echo $rowbid->notelppemilik ?></td>
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
                                      <?php  
                                        if ($rsbiddetail->num_rows()>0) {
                                          foreach ($rsbiddetail->result() as $row) {
                                            if (!empty($row->fotoitem)) {
                                              $fotoitem = base_url('uploads/itemlelang/'.$row->fotoitem);
                                            }else{
                                              $fotoitem = base_url('assets/images/sepedamotor.png');
                                            }
                                            echo '

                                                <tr>
                                                  <td style="text-align: center;"><img src="'.$fotoitem.'" alt="" style="width: 80%; text-center"></td>
                                                  <td style="text-align: center;">'.$row->tipe.'<br>'.$row->merk.'</td>
                                                  <td style="text-align: center;">'.$row->nomesin.'<br>'.$row->norangka.'<br>'.$row->nopolisi.'</td>
                                                  <td style="text-align: right;">'.format_rupiah($row->hargadasar).'</td>
                                                  <td style="text-align: right;">'.format_rupiah($row->hargabid).'</td>
                                                </tr>
                                            ';
                                          }
                                        }
                                      ?>
                                      <tr>
                                        
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
                                <?php  
                                  $selected = '';
                                  if ($rowbid->statusbid=='Menang') {
                                    $selected = 'selected="selected"';
                                  }
                                ?>
                                <option value="Menunggu" <?php echo ($rowbid->statusbid=='Menunggu') ? 'selected="selected"' : '' ?>>Menunggu</option>
                                <option value="Kalah" <?php echo ($rowbid->statusbid=='Kalah') ? 'selected="selected"' : '' ?>>Kalah</option>
                                <option value="Menang" <?php echo ($rowbid->statusbid=='Menang') ? 'selected="selected"' : '' ?>>Menang</option>
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