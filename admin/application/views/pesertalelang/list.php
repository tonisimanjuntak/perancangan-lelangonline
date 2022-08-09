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
              <h3 class="mb-0"> Peserta Lelang 
              </h3>
              <div class="d-flex">
                <a href="<?php echo site_url('pesertalelang/tambah') ?>" class="btn btn-sm ml-3 btn-info"><i class="mdi mdi-database-plus btn-icon-prepend"></i> Tambah Data</a>
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
                                <th style="text-align: center;">NAMA USAHA<br>NIB USAHA<br>EMAIL / NO TELP</th>
                                <th style="text-align: center;">NAMA PEMILIK<br>NIK/ JK</th>
                                <th style="text-align: center;">ALAMAT PEMILIK<br>EMAIL/ NO TELP</th>
                                <th style="text-align: center;">USERNAME<br>TGL DAFTAR<br>STATUS</th>
                                <th style="text-align: center; width: 20%;">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="text-align: center;">1</td>
                                <td style="text-align: center;"><img src="<?php echo base_url('images/users.png') ?>" alt="" style="width: 80%;"></td>
                                <td style="text-align: center;">UD Mitra Bumi Perkasa<br>4578878<br>mitra@gmail.com / 05685455</td>
                                <td style="text-align: center;">Budi Sulistiyo<br>48785450025001/ Laki-laki</td>
                                <td style="text-align: center;">Jl. Sutrisno<br>budi@gmail.com/ 0812454545</td>
                                <td style="text-align: center;">budi<br>15-01-2022<br>Aktif</td>
                                <td style="text-align: center;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('pesertalelang/edit/0') ?>" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('pesertalelang/delete/0') ?>" id="hapus">Hapus</a>
                                      </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td style="text-align: center;">2</td>
                                <td style="text-align: center;"><img src="<?php echo base_url('images/users.png') ?>" alt="" style="width: 80%;"></td>
                                <td style="text-align: center;">Sedawe Utama<br>458787<br>sedawe@gmail.com / 05685454</td>
                                <td style="text-align: center;">Trihardoyo<br>659898975454001/ Laki-laki</td>
                                <td style="text-align: center;">Jl. Perjuangan Raya<br>trihardoyo@gmail.com/ 085645452211</td>
                                <td style="text-align: center;">trihardoyo<br>25-02-2022<br>Aktif</td>
                                <td style="text-align: center;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('pesertalelang/edit/0') ?>" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('pesertalelang/delete/0') ?>" id="hapus">Hapus</a>
                                      </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td style="text-align: center;">3</td>
                                <td style="text-align: center;"><img src="<?php echo base_url('images/users.png') ?>" alt="" style="width: 80%;"></td>
                                <td style="text-align: center;">CV. Agung Perkasa<br>4578955<br>agungperkasa@gmail.com / 05685455</td>
                                <td style="text-align: center;">Susi Susanti<br>5658445154001/ Perempuan</td>
                                <td style="text-align: center;">Jl. Karya Agung<br>susi@gmail.com/ 081345654454</td>
                                <td style="text-align: center;">susi<br>05-03-2022<br>Aktif</td>
                                <td style="text-align: center;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('pesertalelang/edit/0') ?>" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('pesertalelang/delete/0') ?>" id="hapus">Hapus</a>
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