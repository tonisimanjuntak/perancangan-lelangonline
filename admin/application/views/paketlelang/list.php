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
              <h3 class="mb-0"> Jadwal Lelang
              </h3>
              <div class="d-flex">
                <!-- <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                  <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
                <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
                  <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button> -->

                <a href="<?php echo site_url('paketlelang/tambah') ?>" class="btn btn-sm ml-3 btn-info"><i class="mdi mdi-database-plus btn-icon-prepend"></i> Tambah Data</a>
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
                                <th style="text-align: center; width: 5%;">NO</th>
                                <th style="text-align: center;">NAMA PAKET</th>
                                <th style="text-align: center;">TGL MULAI<br>TGL SELESAI</th>
                                <th style="text-align: center;">JUMLAH ITEM</th>
                                <th style="text-align: center;">HARGA DASAR</th>
                                <th style="text-align: center;">STATUS</th>
                                <th style="text-align: center; width: 15%;">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                              <tr>
                                <td style="text-align: center;">1</td>
                                <td style="text-align: center;"><strong>PROMO HAJI RAYA</strong><br>Murah Meriah Honda Scoopy</td>
                                <td style="text-align: center;">01-06-2022<br>31-08-2022</td>
                                <td style="text-align: center;">1</td>
                                <td style="text-align: center;">10.0000.000</td>
                                <td style="text-align: center;"><span class="badge badge-danger">Belum Terjual</span></td>
                                <td style="text-align: center;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('paketlelang/edit/0') ?>" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('paketlelang/cetak/0') ?>" target="_blank">Cetak</a>
                                        <a class="dropdown-item" href="<?php echo site_url('paketlelang/delete/0') ?>" id="hapus">Hapus</a>
                                      </div>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td style="text-align: center;">1</td>
                                <td style="text-align: center;"><strong>PAKET IDUL ADHA</strong><br>Promo Idul Adha</td>
                                <td style="text-align: center;">01-04-2022<br>30-06-2022</td>
                                <td style="text-align: center;">2</td>
                                <td style="text-align: center;">24.0000.000</td>
                                <td style="text-align: center;"><span class="badge badge-success">Terjual</span></td>
                                <td style="text-align: center;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('paketlelang/edit/0') ?>" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('paketlelang/cetak/0') ?>" target="_blank">Cetak</a>
                                        <a class="dropdown-item" href="<?php echo site_url('paketlelang/delete/0') ?>" id="hapus">Hapus</a>
                                      </div>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td style="text-align: center;">1</td>
                                <td style="text-align: center;"><strong>Paket Juni 2022</strong><br>Motor Grade Gabungan</td>
                                <td style="text-align: center;">01-06-2022<br>17-08-2022</td>
                                <td style="text-align: center;">1</td>
                                <td style="text-align: center;">11.0000.000</td>
                                <td style="text-align: center;"><span class="badge badge-danger">Belum Terjual</span></td>
                                <td style="text-align: center;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('paketlelang/edit/0') ?>" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('paketlelang/cetak/0') ?>" target="_blank">Cetak</a>
                                        <a class="dropdown-item" href="<?php echo site_url('paketlelang/delete/0') ?>" id="hapus">Hapus</a>
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
        table = $("#table").DataTable(); //end (document).ready

      });

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