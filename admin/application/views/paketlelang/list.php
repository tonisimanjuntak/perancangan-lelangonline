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
                                <th style="width: 5%; text-align: center;">NO</th>
                                <th style="text-align: center;">NAMA PAKET</th>
                                <th style="text-align: center;">TGL MULAI<br>TGL SELESAI</th>
                                <th style="text-align: center;">JUMLAH ITEM</th>
                                <th style="text-align: center;">HARGA DASAR</th>
                                <th style="text-align: center;">STATUS</th>
                                <th style="text-align: center; width: 15%;">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              
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
        table = $("#table").DataTable({ 
            "select": true,
            "processing": true, 
            "serverSide": true, 
            "order": [], 
             "ajax": {
                "url": "<?php echo site_url('paketlelang/datatablesource')?>",
                "type": "POST"
            },
            "columnDefs": [
                            { "targets": [ 0 ], "orderable": false, "className": "dt-body-center" },
                            { "targets": [ 1 ], "orderable": false, "className": "dt-body-center" },
                            { "targets": [ 2 ], "className": "dt-body-center" },
                            { "targets": [ 3 ], "className": "dt-body-center" },
                            { "targets": [ 4 ], "className": "dt-body-center" },
                            { "targets": [ 5 ], "className": "dt-body-center" },
                            { "targets": [ 6 ], "orderable": false, "className": "dt-body-center" },
            ],
     
        });

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