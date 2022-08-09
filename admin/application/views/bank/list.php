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
              <h3 class="mb-0"> Data Bank 
              </h3>
              <div class="d-flex">
                <a href="<?php echo site_url('bank/tambah') ?>" class="btn btn-sm ml-3 btn-info"><i class="mdi mdi-database-plus btn-icon-prepend"></i> Tambah Data</a>
              </div>
            </div>
            <div class="row">
              
              <div class="col-xl-12 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    

                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive">
                          <table class="table table-bordered table-striped table-condesed" id="table">
                            <thead>
                              <tr class="bg-info" style="">
                                <th style="width: 5%; text-align: center;">NO</th>
                                <th style="width: 15%; text-align: center;">FOTO</th>
                                <th style="text-align: center;">NAMA BANK<br>CABANG</th>
                                <th style="text-align: center;">NO REKENING</th>
                                <th style="text-align: center;">STATUS</th>
                                <th style="text-align: center; width: 20%;">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>

                              <tr class="" style="">
                                <td style="text-align: center;">1</td>
                                <td style="text-align: center;"><img src="<?php echo base_url('uploads/bank/2560px-BANK_BRI_logo_svg.png') ?>" alt="" style="width:80%;"></td>
                                <td style="text-align: center;">BANK RAKYAT INDONESIA<br>PONTIANAK</td>
                                <td style="text-align: center;">95864587</td>
                                <td style="text-align: center;">AKTIF</td>
                                <td style="text-align: center;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('bank/edit/0') ?>" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('bank/delete/0') ?>" id="hapus">Hapus</a>
                                      </div>
                                  </div>                                  
                                </td>
                              </tr>
                              <tr class="" style="">
                                <td style="text-align: center;">2</td>
                                <td style="text-align: center;"><img src="<?php echo base_url('uploads/bank/2560px-Bank_Central_Asia_svg.png') ?>" alt="" style="width:80%;"></td>
                                <td style="text-align: center;">BANK CENTRAL ASIA<br>PONTIANAK</td>
                                <td style="text-align: center;">454684547</td>
                                <td style="text-align: center;">AKTIF</td>
                                <td style="text-align: center;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('bank/edit/0') ?>" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('bank/delete/0') ?>" id="hapus">Hapus</a>
                                      </div>
                                  </div>  
                                  
                                </td>
                              </tr>
                              <tr class="" style="">
                                <td style="text-align: center;">3</td>
                                <td style="text-align: center;"><img src="<?php echo base_url('uploads/bank/Bank_Mandiri_logo_2016_svg.png') ?>" alt="" style="width:80%;"></td>
                                <td style="text-align: center;">BANK MANDIRI TBK<br>PONTIANAK</td>
                                <td style="text-align: center;">5684852</td>
                                <td style="text-align: center;">AKTIF</td>
                                <td style="text-align: center;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('bank/edit/0') ?>" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('bank/delete/0') ?>" id="hapus">Hapus</a>
                                      </div>
                                  </div>  
                                  
                                </td>
                              </tr>

                            </tbody>              
                          </table>
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

      var table;

      $(document).ready(function() {

        //defenisi datatable
        table = $("#table").DataTable();

      }); //end (document).ready

      
      $(document).on("click", "#hapus", function(e) {
        var link = $(this).attr("href");
        e.preventDefault();

        swal({
          title: "Apakah anda yakin?",
          text: "apakah anda yakin akan menghapus data ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          buttons: ["Batal", "Ya"],
        })
        .then((willDelete) => {
          if (willDelete) {
            document.location.href = link;
          }
        });


      });  
      

    </script>

  </body>
</html>