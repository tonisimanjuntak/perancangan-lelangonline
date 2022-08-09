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

            <form action="<?php echo(site_url('paketlelang/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">

              <div class="page-header flex-wrap">
                <h3 class="mb-0" id="lbljudul"> Jadwal Lelang
                </h3>
                <div class="d-flex">                  
                  <a href="<?php echo site_url('paketlelang') ?>" class="btn btn-sm bg-white btn-icon-text border ml-3"><i class="mdi mdi-arrow-left-thick btn-icon-prepend"></i> Kembali </a>
                  <button type="submit" class="btn btn-sm ml-3 btn-primary" id="simpan"><i class="mdi mdi-content-save-all btn-icon-prepend"></i> Simpan</button>
                </div>
              </div>
              <div class="row">
                
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-body">
                      
                      <div class="row">
                        
                        <input type="hidden" name="idpaket" id="idpaket">

                        <div class="col-md-12">                        
             
                          <div class="form-group row">
                            <label for="" class="col-md-3 col-form-label">Nama Paket</label>
                            <div class="col-md-9">
                              <input type="text" name="namapaket" id="namapaket" class="form-control" placeholder="Masukkan nama paket jadwal">
                            </div>
                          </div>                      
                          <div class="form-group row">
                            <label for="" class="col-md-3 col-form-label">Deskripsi</label>
                            <div class="col-md-9">
                              <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" placeholder="Deskripsi singkat"></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="" class="col-md-3 col-form-label">Tgl Mulai</label>
                            <div class="col-md-3">
                              <input type="datetime-local" name="tgljammulai" id="tgljammulai" class="form-control" value="<?php echo date('Y-m-d H:i:s') ?>">
                            </div>
                            <label for="" class="col-md-3 col-form-label text-right">Tgl Selesai</label>
                            <div class="col-md-3">
                              <input type="datetime-local" name="tgljamselesai" id="tgljamselesai" class="form-control" value="<?php echo date('Y-m-d H:i:s') ?>">
                            </div>
                          </div>  
                              
                        </div>



                          <div class="col-md-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-md-8">
                                    <h3 class="text-muted">Detail Item Yang Di Lelang</h3>                                    
                                  </div>
                                  <div class="col-md-4">
                                    <button type="button" class="btn btn-primary btn-sm float-right" type="submit" id="tampilitem" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="mdi mdi-search-web btn-icon-prepend"></i> Lihat Item</button>
                                  </div>
                                  <div class="col-12 mt-3">
                                    
                                    <div class="table-responsive">
                                      <table id="table" class="display" style="width: 100%;">
                                          <thead>
                                              <tr>
                                                  <th style="width: 5%; text-align: center;">No</th>
                                                  <th style="text-align: center;">Tipe<br>Merk</th>
                                                  <th style="text-align: center;">Warna<br>Thn Pembuatan</th>
                                                  <th style="text-align: center;">No Mesin<br>No Rangka<br>No Polisi</th>
                                                  <th style="text-align: right;">Harga Dasar</th>
                                                  <th style="width: 5%; text-align: center;">Hapus</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td style="text-align: center;">1</td>
                                              <td style="text-align: center;">Vario 110 eSP CBS<br>Honda</td>
                                              <td style="text-align: center;">Merah<br>2019</td>
                                              <td style="text-align: center;">029737267<br>98726561<br>24678989</td>
                                              <td style="text-align: right;">10.000.000</td>
                                              <td style="text-align: center;"><span class="btn btn-danger" id=""><i class="fa fa-trash"></i></span></td>
                                            </tr>
                                            <tr>
                                              <td style="text-align: center;">1</td>
                                              <td style="text-align: center;">Honda Spacy Fi<br>Honda</td>
                                              <td style="text-align: center;">Hitam<br>2019</td>
                                              <td style="text-align: center;">454656466<br>121354545<br>23315454</td>
                                              <td style="text-align: right;">12.000.000</td>
                                              <td style="text-align: center;"><span class="btn btn-danger" id=""><i class="fa fa-trash"></i></span></td>
                                            </tr>
                                          </tbody>
                                          <tfoot>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th style="text-align: right; font-weight: bold; font-size: 20px;">TOTAL: </th>
                                            <th style="text-align: right; font-weight: bold; font-size: 20px" colspan="2">Rp. 22.000.000</th>
                                          </tfoot>   
                                      </table>
                                    </div>

                                  </div>
                                </div> <!-- row -->

                              </div>
                            </div> <!-- card -->

                            <input type="hidden" id="total">
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


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content p-3">
          <div class="row">
            <div class="col-12">
              
              <h3 class="text-muted">Pilih Item Yang Akan Di Lelang</h3>
              <table class="table table-bordered table-striped table-condesed"> 
                <thead>
                  <tr>
                    <th style="width: 10%; text-align: center;">#</th>
                    <th style="text-align: center;">Tipe/ Merk/ Thn Pembuatan</th>
                    <th style="text-align: center;">No Rangka/ No Mesin/ No BPKB</th>
                    <th style="text-align: center;">Grade/ Warna</th>
                    <th style="text-align: right;">Harga</th>
                    <th style="width: 10%; text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="width: 10%; text-align: center;">1</td>
                    <td style="text-align: center;">Vario 110 eSP CBS<br>Honda<br>2019</td>
                    <td style="text-align: center;">029737267<br>98726561<br>24678989</td>
                    <td style="text-align: center;">B<br>Merah</td>
                    <td style="text-align: right;">10.000.000</td>
                    <td style="width: 10%; text-align: center;"><button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-plus"></i></button></td>
                  </tr>
                </tbody>
              </table>


            </div>
          </div>
        </div>
      </div>
    </div>


    <?php $this->load->view('template/script'); ?>


    <script type="text/javascript">

    var idpaket = "<?php echo($idpaket) ?>";

    $(document).ready(function() {

      $('.select2').select2();

      table = $("#table").DataTable(); //end (document).ready

      //---------------------------------------------------------> JIKA EDIT DATA
      if ( idpaket != "" ) { 
            
            $("#lbljudul").html("Edit Data Jadwal Lelang");
            $("#lblactive").html("Edit");

      }else{
            $("#lbljudul").html("Tambah Data Jadwal Lelang");
            $("#lblactive").html("Tambah");
      }     

    $('#table tbody').on( 'click', 'span', function () {
        table
            .row( $(this).parents('tr') )
            .remove()
            .draw();

        var iditem = $(this).attr('data-iditem');
        arrItemOnTable.splice( $.inArray(iditem, arrItemOnTable), 1 );
    });

    //------------------------------------------------------------------------> END VALIDASI DAN SIMPAN
      $("form").attr('autocomplete', 'off');
    }); //end (document).ready
    
    
  </script>


  </body>
</html>