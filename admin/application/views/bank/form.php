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

            <form action="<?php echo(site_url('bank/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">

              <div class="page-header flex-wrap">
                <h3 class="mb-0" id="lbljudul"> Data Bank 
                </h3>
                <div class="d-flex">
                  <!-- <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                    <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>-->
                  
                  <a href="<?php echo site_url('bank') ?>" class="btn btn-sm bg-white btn-icon-text border ml-3"><i class="mdi mdi-arrow-left-thick btn-icon-prepend"></i> Kembali </a>
                  <button type="submit" class="btn btn-sm ml-3 btn-primary"><i class="mdi mdi-content-save-all btn-icon-prepend"></i> Simpan</button>
                </div>
              </div>
              <div class="row">
                
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-body">
                      
                      <div class="row">
                        
                        <input type="hidden" name="idbank" id="idbank">

                        <div class="col-md-4">
                          <div class="card">
                            <div class="card-body">
                                
                                <div class="form-group row text center">
                                  <label for="" class="col-md-12 col-form-label">Logo Bank <span style="color: red; font-size: 12px; font-weight: bold;"><i> Max ukuran file 2MB</i></span></label>
                                  <div class="col-md-12 mt-3 text-center">
                                    <img src="<?php echo base_url('images/bank.jpg'); ?>" id="output1" class="img-thumbnail" style="width:70%;max-height:70%;">
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
                          </div>
                        </div>

                        <div class="col-md-8">                        
                          <div class="card">
                            <div class="card-body">
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Nama Bank</label>
                                <div class="col-md-9">
                                  <input type="text" name="namabank" id="namabank" class="form-control" placeholder="Masukkan nama bank">
                                </div>
                              </div>   
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Cabang</label>
                                <div class="col-md-9">
                                  <input type="text" name="cabang" id="cabang" class="form-control" placeholder="Masukkan nama cabang">
                                </div>
                              </div>   
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Nomor Rekening</label>
                                <div class="col-md-9">
                                  <input type="text" name="norekening" id="norekening" class="form-control" placeholder="Masukkan nomor rekening">
                                </div>
                              </div>   

                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Status Aktif</label>
                                <div class="col-md-9">
                                  <select name="statusaktif" id="statusaktif" class="form-control">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                  </select>
                                </div>
                              </div>
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
  
    var idbank = "<?php echo($idbank) ?>";

    $(document).ready(function() {

      $('.select2').select2();

      //---------------------------------------------------------> JIKA EDIT DATA
      if ( idbank != "" ) { 
            $.ajax({
                type        : 'POST', 
                url         : '<?php echo site_url("bank/get_edit_data") ?>', 
                data        : {idbank: idbank}, 
                dataType    : 'json', 
                encode      : true
            })      
            .done(function(result) {
              $("#idbank").val(result.idbank);
              $("#namabank").val(result.namabank);
              $("#cabang").val(result.cabang);
              $("#norekening").val(result.norekening);
              $("#statusaktif").val(result.statusaktif);

              $("#foto").val(result.logobank);
              $('#file_lama').val(result.logobank);

              if ( result.logobank != '' && result.logobank != null ) {
                  $("#output1").attr("src","<?php echo(base_url('uploads/bank/')) ?>" + result.logobank);              
              }else{
                  $("#output1").attr("src","<?php echo(base_url('images/bank.jpg')) ?>");    
              }


            }); 


            $("#lbljudul").html("Edit Data Bank");
            $("#lblactive").html("Edit");

      }else{
            $("#lbljudul").html("Tambah Data Bank");
            $("#lblactive").html("Tambah");
      }     

      //----------------------------------------------------------------- > validasi
      $("#form").bootstrapValidator({
        feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          namabank: {
            validators:{
              notEmpty: {
                  message: "nama bank tidak boleh kosong"
              },
            }
          },
          cabang: {
            validators:{
              notEmpty: {
                  message: "cabang tidak boleh kosong"
              },
            }
          },
          norekening: {
            validators:{
              notEmpty: {
                  message: "nomor rekening tidak boleh kosong"
              },
            }
          }, 
          statusaktif: {
            validators:{
              notEmpty: {
                  message: "status aktif tidak boleh kosong"
              },
            }
          },   
        }
      });
    //------------------------------------------------------------------------> END VALIDASI DAN SIMPAN


      $("form").attr('autocomplete', 'off');
      //$("#tanggal").mask("00-00-0000", {placeholder:"hh-bb-tttt"});
      //$("#jumlah").mask("000,000,000,000", {reverse: true});
    }); //end (document).ready
    

  </script>


  </body>
</html>