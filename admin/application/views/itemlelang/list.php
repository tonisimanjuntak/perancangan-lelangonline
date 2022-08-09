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
              <h3 class="mb-0"> Item Lelang
              </h3>
              <div class="d-flex">
                  <!-- <a href="<?php echo site_url('itemlelang/cetak') ?>" class="btn btn-sm bg-white btn-icon-text border ml-3" target="_blank"><i class="mdi mdi-printer btn-icon-prepend"></i> Cetak </a> -->
                <a href="<?php echo site_url('itemlelang/tambah') ?>" class="btn btn-sm ml-3 btn-info"><i class="mdi mdi-database-plus btn-icon-prepend"></i> Tambah Data</a>
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
                                <th style="text-align: center;">TYPE/ MERK/<br>THN PEMBUATAN</th>
                                <th style="text-align: center;">WARNA/<br>ISI SILINDER</th>
                                <th style="text-align: center;">NO RANGKA<br>NO MESIN<br>NO BPKB<br>NO POLISI</th>
                                <th style="text-align: center;">HARGA/<br>GRADE</th>
                                <th style="text-align: center;">STATUS</th>
                                <th style="text-align: center; width: 15%;">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="text-align: center;">1</th>
                                <td style="text-align: center;"><img src="<?php echo base_url('uploads/itemlelang/Honda_Vario_150_eSP.png') ?>" alt="" style="width: 80%;"></th>
                                <td style="text-align: center;">Vario 110 eSP CBS ISS<br>Honda<br>2019</th>
                                <td style="text-align: center;">Merah<br>110</th>
                                <td style="text-align: center;">029737267<br>98726561<br>24678989<br>KB 4444</th>
                                <td style="text-align: center;">10,000,000<br>B</th>
                                <td style="text-align: center;"><span class="badge badge-info">Belum Terjual</span></th>
                                <td style="text-align: center;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('itemlelang/edit/0') ?>" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('itemlelang/delete/0') ?>" id="hapus">Hapus</a>
                                      </div>
                                  </div>
                                </th>
                              </tr>
                              <tr>
                                <td style="text-align: center;">2</th>
                                <td style="text-align: center;"><img src="<?php echo base_url('uploads/itemlelang/Honda_Spacy_Fi.png') ?>" alt="" style="width: 80%;"></th>
                                <td style="text-align: center;">Honda Spacy Fi<br>Honda<br>2019</th>
                                <td style="text-align: center;">Hitam<br>135</th>
                                <td style="text-align: center;">454656466<br>121354545<br>23315454<br>KB 5454</th>
                                <td style="text-align: center;">12,000,000<br>B</th>
                                <td style="text-align: center;"><span class="badge badge-info">Belum Terjual</span></th>
                                <td style="text-align: center;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('itemlelang/edit/0') ?>" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('itemlelang/delete/0') ?>" id="hapus">Hapus</a>
                                      </div>
                                  </div>
                                </th>
                              </tr>
                              <tr>
                                <td style="text-align: center;">3</th>
                                <td style="text-align: center;"><img src="<?php echo base_url('uploads/itemlelang/PCX_150.png') ?>" alt="" style="width: 80%;"></th>
                                <td style="text-align: center;">PCX 150<br>Honda<br>2019</th>
                                <td style="text-align: center;">Merah<br>15</th>
                                <td style="text-align: center;">45645465<br>12155454<br>21212121<br>KB 4578</th>
                                <td style="text-align: center;">11,000,000<br>B</th>
                                <td style="text-align: center;"><span class="badge badge-danger">Terjual</span></th>
                                <td style="text-align: center;">
                                  <div class="btn-group">  
                                    <a href="<?php echo site_url('itemlelang/edit/0') ?>" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                                      <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('itemlelang/delete/0') ?>" id="hapus">Hapus</a>
                                      </div>
                                  </div>
                                </th>
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