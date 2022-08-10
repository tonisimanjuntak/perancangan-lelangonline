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

            <form action="<?php echo(site_url('pengguna/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">

              <div class="page-header flex-wrap">
                <h3 class="mb-0" id="lbljudul"> Data Pengguna 
                </h3>
                <div class="d-flex">
                  <!-- <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                    <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>-->
                  
                  <a href="<?php echo site_url('pengguna') ?>" class="btn btn-sm bg-white btn-icon-text border ml-3"><i class="mdi mdi-arrow-left-thick btn-icon-prepend"></i> Kembali </a>
                  <button type="submit" class="btn btn-sm ml-3 btn-primary"><i class="mdi mdi-content-save-all btn-icon-prepend"></i> Simpan</button>
                </div>
              </div>
              <div class="row">
                
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-body">
                      
                      <div class="row">
                        
                        <input type="hidden" name="idpengguna" id="idpengguna">

                        <div class="col-md-4">
                          <div class="card">
                            <div class="card-body">
                                
                                <div class="form-group row text center">
                                  <label for="" class="col-md-12 col-form-label">Foto Pengguna <span style="color: red; font-size: 12px; font-weight: bold;"><i> Max ukuran file 2MB</i></span></label>
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
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Nama Pengguna</label>
                                <div class="col-md-9">
                                  <input type="text" name="namapengguna" id="namapengguna" class="form-control" placeholder="Masukkan nama pengguna">
                                </div>
                              </div>                      
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-md-9">
                                  <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                                    <option value="">Pilih jenis kelamin...</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                  </select>
                                </div>
                              </div>                      
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Alamat</label>
                                <div class="col-md-9">
                                  <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Alamat lengkap"></textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Email</label>
                                <div class="col-md-9">
                                  <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Nomor Telepon</label>
                                <div class="col-md-9">
                                  <input type="text" name="notelp" id="notelp" class="form-control" placeholder="Nomor telepon">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label">Level</label>
                                <div class="col-md-9">
                                  <select name="level" id="level" class="form-control">
                                    <option value="">Pilih level...</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Pimpinan">Pimpinan</option>
                                  </select>
                                </div>
                              </div>
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
  
    var idpengguna = "<?php echo($idpengguna) ?>";

    $(document).ready(function() {

      $('.select2').select2();

      //---------------------------------------------------------> JIKA EDIT DATA
      if ( idpengguna != "" ) { 
            $("#lbljudul").html("Edit Data Pengguna");
            $("#lblactive").html("Edit");
      }else{
            $("#lbljudul").html("Tambah Data Pengguna");
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
          namapengguna: {
            validators:{
              notEmpty: {
                  message: "nama pengguna tidak boleh kosong"
              },
            }
          },
          jeniskelamin: {
            validators:{
              notEmpty: {
                  message: "jenis kelamin tidak boleh kosong"
              },
            }
          },
          alamat: {
            validators:{
              notEmpty: {
                  message: "alamat tidak boleh kosong"
              },
            }
          },
          email: {
            validators:{
              notEmpty: {
                  message: "email tidak boleh kosong"
              },
            }
          },
          notelp: {
            validators:{
              notEmpty: {
                  message: "nomor telepon tidak boleh kosong"
              },
            }
          },
          level: {
            validators:{
              notEmpty: {
                  message: "level tidak boleh kosong"
              },
            }
          },
          username: {
            validators:{
              notEmpty: {
                  message: "username tidak boleh kosong"
              },
            }
          },
          password: {
            validators:{
              notEmpty: {
                  message: "password tidak boleh kosong"
              },
            }
          },
          password2: {
            validators:{
              notEmpty: {
                  message: "ulangi password tidak boleh kosong"
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