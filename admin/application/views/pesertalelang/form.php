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

            <form action="<?php echo(site_url('pesertalelang/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">

              <div class="page-header flex-wrap">
                <h3 class="mb-0" id="lbljudul"> Peserta Lelang 
                </h3>
                <div class="d-flex">
                  <!-- <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                    <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>-->
                  
                  <a href="<?php echo site_url('pesertalelang') ?>" class="btn btn-sm bg-white btn-icon-text border ml-3"><i class="mdi mdi-arrow-left-thick btn-icon-prepend"></i> Kembali </a>
                  <button type="submit" class="btn btn-sm ml-3 btn-primary"><i class="mdi mdi-content-save-all btn-icon-prepend"></i> Simpan</button>
                </div>
              </div>
              <div class="row">
                
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-body">
                      
                      <div class="row">
                        
                        <input type="hidden" name="idpesertalelang" id="idpesertalelang">

                        <div class="col-md-4">
                          <div class="card">
                            <div class="card-body">
                                
                                <div class="form-group row text center">
                                  <label for="" class="col-md-12 col-form-label">Foto Peserta <span style="color: red; font-size: 12px; font-weight: bold;"><i> Max ukuran file 2MB</i></span></label>
                                  <div class="col-md-12 mt-3 text-center">
                                    <img src="<?php echo base_url('images/users.png'); ?>" id="output1" class="img-thumbnail" style="width:70%;max-height:70%;">
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
                              <h3 class="text-muted">INFORMASI USAHA</h3><hr>
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Nama Usaha</label>
                                <div class="col-md-9">
                                  <input type="text" name="namausaha" id="namausaha" class="form-control" placeholder="Masukkan nama usaha">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">NIB Usaha</label>
                                <div class="col-md-9">
                                  <input type="text" name="nibusaha" id="nibusaha" class="form-control" placeholder="Masukkan nib usaha">
                                </div>
                              </div>                      
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Email Usaha</label>
                                <div class="col-md-9">
                                  <input type="text" name="emailusaha" id="emailusaha" class="form-control" placeholder="Masukkan email usaha">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">No Telepon Usaha</label>
                                <div class="col-md-9">
                                  <input type="text" name="notelpusaha" id="notelpusaha" class="form-control" placeholder="Masukkan no telepon usaha">
                                </div>
                              </div>
                              

                              <h3 class="text-muted">INFORMASI PEMILIK</h3><hr>
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Nama Pemilik</label>
                                <div class="col-md-9">
                                  <input type="text" name="namapemilik" id="namapemilik" class="form-control" placeholder="Masukkan nama pemilik">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">NIK Pemilik</label>
                                <div class="col-md-9">
                                  <input type="text" name="nikpemilik" id="nikpemilik" class="form-control" placeholder="Masukkan nik pemilik">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-md-9">
                                  <select name="jeniskelaminpemilik" id="jeniskelaminpemilik" class="form-control">
                                    <option value="">Pilih jenis kelamin...</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Email Pemilik</label>
                                <div class="col-md-9">
                                  <input type="text" name="emailpemilik" id="emailpemilik" class="form-control" placeholder="Masukkan email pemilik">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">No Telepon Pemilik</label>
                                <div class="col-md-9">
                                  <input type="text" name="notelppemilik" id="notelppemilik" class="form-control" placeholder="Masukkan no telepon pemilik">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Alamat Pemilik</label>
                                <div class="col-md-9">
                                  <textarea name="alamatpemilik" id="alamatpemilik" class="form-control" rows="3" placeholder="Alamat lengkap pemilik"></textarea>
                                </div>
                              </div>



                              <!-- 
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Username</label>
                                <div class="col-md-9">
                                  <input type="text" name="username" id="username" class="form-control" placeholder="username">
                                </div>
                              </div>                      
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Password</label>
                                <div class="col-md-9">
                                  <input type="password" name="password" id="password" class="form-control" placeholder="**************">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Ulangi Password</label>
                                <div class="col-md-9">
                                  <input type="password" name="password2" id="password2" class="form-control" placeholder="**************">
                                </div>
                              </div>
                               -->

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
  
    var idpesertalelang = "<?php echo($idpesertalelang) ?>";

    $(document).ready(function() {

      $('.select2').select2();

      //---------------------------------------------------------> JIKA EDIT DATA
      if ( idpesertalelang != "" ) { 
            $.ajax({
                type        : 'POST', 
                url         : '<?php echo site_url("pesertalelang/get_edit_data") ?>', 
                data        : {idpesertalelang: idpesertalelang}, 
                dataType    : 'json', 
                encode      : true
            })      
            .done(function(result) {
              $("#idpesertalelang").val(result.idpesertalelang);
              $("#namausaha").val(result.namausaha);
              $("#nibusaha").val(result.nibusaha);
              $("#emailusaha").val(result.emailusaha);
              $("#notelpusaha").val(result.notelpusaha);
              $("#namapemilik").val(result.namapemilik);
              $("#nikpemilik").val(result.nikpemilik);
              $("#jeniskelaminpemilik").val(result.jeniskelaminpemilik);
              $("#emailpemilik").val(result.emailpemilik);
              $("#notelppemilik").val(result.notelppemilik);
              $("#alamatpemilik").val(result.alamatpemilik);
              $("#statusaktif").val(result.statusaktif);
              

              $("#foto").val(result.foto);
              $('#file_lama').val(result.foto);

              if ( result.foto != '' && result.foto != null ) {
                  $("#output1").attr("src","<?php echo(base_url('uploads/pesertalelang/')) ?>" + result.foto);              
              }else{
                  $("#output1").attr("src","<?php echo(base_url('images/users.png')) ?>");    
              }


            }); 


            $("#lbljudul").html("Edit Data Peserta Lelang");
            $("#lblactive").html("Edit");

      }else{
            $("#lbljudul").html("Tambah Data Peserta Lelang");
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
          namausaha: {
            validators:{
              notEmpty: {
                  message: "nama usaha tidak boleh kosong"
              },
            }
          },
          nibusaha: {
            validators:{
              notEmpty: {
                  message: "nib usaha tidak boleh kosong"
              },
            }
          },
          emailusaha: {
            validators:{
              notEmpty: {
                  message: "email usaha tidak boleh kosong"
              },
            }
          },
          notelpusaha: {
            validators:{
              notEmpty: {
                  message: "no telepon usaha tidak boleh kosong"
              },
            }
          },
          namapemilik: {
            validators:{
              notEmpty: {
                  message: "nama pemilik tidak boleh kosong"
              },
            }
          },
          nikpemilik: {
            validators:{
              notEmpty: {
                  message: "nik pemilik tidak boleh kosong"
              },
            }
          },
          jeniskelaminpemilik: {
            validators:{
              notEmpty: {
                  message: "jenis kelamin pemilik tidak boleh kosong"
              },
            }
          },
          emailpemilik: {
            validators:{
              notEmpty: {
                  message: "email pemilik tidak boleh kosong"
              },
            }
          },
          notelppemilik: {
            validators:{
              notEmpty: {
                  message: "no telepon pemilik tidak boleh kosong"
              },
            }
          },
          alamatpemilik: {
            validators:{
              notEmpty: {
                  message: "alamat pemilik tidak boleh kosong"
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