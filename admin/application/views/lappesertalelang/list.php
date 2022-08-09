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
              <h3 class="mb-0"> Laporan Peserta Lelang
              </h3>
              <div class="d-flex">
                <!-- <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                  <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
                <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
                  <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button> -->
              </div>
            </div>
            <div class="row">
              
              <div class="col-xl-12 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      

                        <div class="col-12">
                          <form action="<?php echo(site_url('lappesertalelang/index')) ?>" method="post" id="form">
                            <div class="row">
                              
                              <div class="col-md-3"></div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="" class="">Nama Paket Lelang</label>
                                  <select name="idpaket" id="idpaket" class="form-control">
                                    <option value="">Pilih paket lelang</option>
                                    <?php  
                                      $rspaket = $this->db->query("select * from v_paket_jadwal order by idpaket desc");
                                      if ($rspaket->num_rows()>0) {
                                        foreach ($rspaket->result() as $rowpaket) {
                                          $selected ='';
                                          if ($rowpaket->idpaket==$idpaket) {
                                            $selected = 'selected="selected"';
                                          }
                                          echo '
                                            <option value="'.$rowpaket->idpaket.'" '.$selected.'>'.$rowpaket->namapaket.'</option>
                                          ';
                                        }
                                      }
                                    ?>
                                  </select>  

                                </div>
                              </div>
                              <div class="col-md-3"></div>
                              <div class="col-md-3"></div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <div class="col-md-6">
                                    <button type="submit" class="btn btn-info btn-block"><i class="fa fa-sync-alt"></i> Tampilkan</button>
                                  </div>
                                  <div class="col-md-6">
                                    <a href="#" class="btn btn-primary btn-block" id="cetak"><i class="fa fa-print"></i> Cetak</a>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </form>
                        </div>

                        <div class="col-md-12">

                          <div class="table-responsive">
                            <table class="table table-bordered table-striped table-condesed" id="table">
                              <thead>
                                <tr class="bg-info" style="">
                                  <th style="width: 5%; text-align: center;">No</th>
                                  <th style="text-align: center;">Tgl Bid<br>ID</th>
                                  <th style="text-align: left;">Nama Usaha<br>NIB Usaha</th>
                                  <th style="text-align: left;">Nama Pemilik<br>NIK Pemilik</th>
                                  <th style="text-align: right;">Total Bid</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php  
                                  if ($rsbid->num_rows()>0) {
                                    $no=1;
                                    foreach ($rsbid->result() as $row) {
                                      echo '
                                        <tr>
                                          <td style="text-align: center;">'.$no++.'</td>
                                          <td style="text-align: center;">'.tgljamindonesia($row->tglbid).'<br>'.$row->idbid.'</td>
                                          <td style="text-align: left;">'.$row->namausaha.'<br>'.$row->nibusaha.'</td>
                                          <td style="text-align: center;">'.$row->namapemilik.'<br>'.$row->nikpemilik.'</td>
                                          <td style="text-align: right;">'.format_rupiah($row->totalhargabid).'</td>
                                        </tr>
                                      ';
                                    }
                                  }
                                ?>
                              </tbody>              
                              
                            </table>
                          </div>

                        </div>






                    </div> <!-- row -->
                    
                    
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

      var table;

      $(document).ready(function() {

        // $(".select2").select2();
        $('.select2').select2();

        //defenisi datatable
        table = $("#table").DataTable({ 
            "select": true,
        });

      }); //end (document).ready

      
      $('#cetak').click(function(e){
          // e.preventDefault();

          // fileter
          var idpaket      = $('#idpaket').val();


          if (idpaket=='') {
            swal("Pilih Paket Lelang!", "Paket lelang tidak boleh kosong", "error");
            return;
          }

          window.open("<?php echo site_url('lappesertalelang/cetak/') ?>" + idpaket + "/Laporan Peserta Lelang");
      });

      

    </script>

  </body>
</html>