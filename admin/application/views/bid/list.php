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
              <h3 class="mb-0"> Bid Peserta Lelang
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
                        <div class="table-responsive">
                          <table class="table table-bordered table-striped table-condesed" id="table">
                            <thead>
                              <tr class="bg-info" style="">
                                <th style="width: 5%; text-align: center;">NO</th>
                                <th style="width: 15%; text-align: center;">NAMA PAKET</th>
                                <th style="text-align: center;">TGL BID</th>
                                <th style="text-align: center;">NAMA USAHA<br>NIB USAHA</th>
                                <th style="text-align: center;">NAMA PEMILIK<br>NIK PEMILIK</th>
                                <th style="text-align: center;">HARGA DASAR</th>
                                <th style="text-align: center;">HARGA BID</th>
                                <th style="text-align: center;">STATUS BID</th>
                                <th style="text-align: center; width: 20%;">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="text-align: center;">1</td>
                                <td style="text-align: center;">PROMO HAJI RAYA</td>
                                <td style="text-align: center;">04-06-2022</td>
                                <td style="text-align: center;">UD Mitra Bumi Perkasa<br>4578878</td>
                                <td style="text-align: center;">Budi Sulistiyo<br>48785450025001</td>
                                <td style="text-align: center;">10.000.000</td>
                                <td style="text-align: center;">11.000.000</td>
                                <td style="text-align: center;">Menunggu</td>
                                <td style="text-align: center; width: 20%;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('bid/lihat/0') ?>" class="btn btn-sm btn-success btn-circle"><i class="fa fa-search"></i> Lihat</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('bid/delete/0') ?>" id="hapus">Hapus</a>
                                      </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td style="text-align: center;">2</td>
                                <td style="text-align: center;">PAKET IDUL ADHA</td>
                                <td style="text-align: center;">12-07-2022</td>
                                <td style="text-align: center;">Sedawe Utama<br>458787</td>
                                <td style="text-align: center;">Trihardoyo<br>659898975454001</td>
                                <td style="text-align: center;">24.000.000</td>
                                <td style="text-align: center;">25.000.000</td>
                                <td style="text-align: center;"><span class="badge badge-success">Menang</span></td>
                                <td style="text-align: center; width: 20%;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('bid/lihat/0') ?>" class="btn btn-sm btn-success btn-circle"><i class="fa fa-search"></i> Lihat</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('bid/delete/0') ?>" id="hapus">Hapus</a>
                                      </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td style="text-align: center;">2</td>
                                <td style="text-align: center;">PAKET IDUL ADHA</td>
                                <td style="text-align: center;">10-07-2022</td>
                                <td style="text-align: center;">CV. Agung Perkasa<br>4578955</td>
                                <td style="text-align: center;">Susi Susanti<br>5658445154001</td>
                                <td style="text-align: center;">24.000.000</td>
                                <td style="text-align: center;">24.000.000</td>
                                <td style="text-align: center;"><span class="badge badge-danger">Kalah</span></td>
                                <td style="text-align: center; width: 20%;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('bid/lihat/0') ?>" class="btn btn-sm btn-success btn-circle"><i class="fa fa-search"></i> Lihat</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('bid/delete/0') ?>" id="hapus">Hapus</a>
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