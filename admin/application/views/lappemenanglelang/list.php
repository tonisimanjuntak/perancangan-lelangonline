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
              <h3 class="mb-0"> Laporan Pemenang Lelang
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
                          <form action="<?php echo(site_url('lappemenanglelang/index')) ?>" method="post" id="form">
                            <div class="row">
                              
                              <div class="col-md-2"></div>
                              <div class="col-md-8">
                                <div class="form-group row">
                                  <label for="" class="col-form-label col-md-3">Tanggal Periode</label>
                                  <div class="col-md-4">
                                    <input type="date" id="tglawal" name="tglawal" class="form-control" value="<?php echo($tglawal) ?>">
                                  </div>
                                  <label for="" class="col-form-label col-md-1">SD</label>
                                  <div class="col-md-4">
                                    <input type="date" id="tglakhir" name="tglakhir" class="form-control" value="<?php echo($tglakhir) ?>">
                                  </div>

                                </div>
                              </div>
                              <div class="col-md-2"></div>
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
                                <th style="text-align: center; width: 5%;">NO</th>
                                <th style="text-align: center;">NAMA PAKET</th>
                                <th style="text-align: center;">TGL MULAI<br>TGL SELESAI</th>
                                <th style="text-align: center;">JUMLAH ITEM</th>
                                <th style="text-align: center;">HARGA DASAR</th>
                                <th style="text-align: center;">HARGA BID</th>
                                <th style="text-align: center;">PEMENANG</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                              <tr>
                                <td style="text-align: center;">1</td>
                                <td style="text-align: center;"><strong>PAKET IDUL ADHA</strong><br>Promo Idul Adha</td>
                                <td style="text-align: center;">01-04-2022<br>30-06-2022</td>
                                <td style="text-align: center;">2</td>
                                <td style="text-align: center;">24.0000.000</td>
                                <td style="text-align: center;">25.0000.000</td>
                                <td style="text-align: center;">Sedawe Utama</td>
                              </tr>


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

          var tglawal      = $('#tglawal').val();
          var tglakhir      = $('#tglakhir').val();


          if (tglawal=='') {
            swal("Tanggal Awal!", "Tanggal awal tidak boleh kosong", "error");
            return;
          }

          if (tglakhir=='') {
            swal("Tanggal Akhir!", "Tanggal akhir tidak boleh kosong", "error");
            return;
          }


          window.open("<?php echo site_url('lappemenanglelang/cetak/') ?>" + tglawal + "/" + tglakhir + "/Laporan Pemenang Lelang");
      });

      

    </script>

  </body>
</html>