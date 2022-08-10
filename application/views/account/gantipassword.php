<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('header'); ?>
  </head>

  <body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->



    <?php  
      $this->load->view('topmenu');
    ?>

    <!-- Service Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5 align-items-end mb-5">
          <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="border-start border-5 border-primary ps-4">
              <h6 class="text-body text-uppercase mb-2">Account</h6>
              <h1 class="display-6 mb-0">
                Ganti Password
              </h1>
            </div>
          </div>
        </div>
        <div class="row">

            <div class="col-12">
              <div class="card wow fadeInUp" data-wow-delay="0.1s">
                <div class="card-body">

                  <form action="<?php echo(site_url('account/simpanpassword')) ?>" method="post" id="form" enctype="multipart/form-data">
                    

                    <div class="row">
                      
                          <input type="hidden" name="idpesertalelang" id="idpesertalelang" value="21212">

                          <div class="col-md-4">
                            <div class="card">
                              <div class="card-body">
                                  
                                  <div class="form-group row text center">
                                    <label for="" class="col-md-12 col-form-label">Foto Peserta <span style="color: red; font-size: 12px; font-weight: bold;"><i> Max ukuran file 2MB</i></span></label>
                                    <div class="col-md-12 mt-3 text-center">
                                      <img src="<?php echo $foto; ?>" id="output1" class="img-thumbnail" style="width:70%;max-height:70%;">
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
                                
                                <h3 class="text-muted">Ganti Password</h3><hr>
                                <div class="form-group row p-2">
                                  <label for="" class="col-md-3 col-form-label">Username</label>
                                  <div class="col-md-9">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" value="peserta">
                                  </div>
                                </div>
                                <div class="form-group row p-2">
                                  <label for="" class="col-md-3 col-form-label">Password Lama</label>
                                  <div class="col-md-9">
                                    <input type="password" name="passwordlama" id="passwordlama" class="form-control" placeholder="**************" value="">
                                  </div>
                                </div>

                                <div class="form-group row p-2">
                                  <label for="" class="col-md-3 col-form-label">Password Baru</label>
                                  <div class="col-md-9">
                                    <input type="password" name="passwordbaru1" id="passwordbaru1" class="form-control" placeholder="**************" value="">
                                  </div>
                                </div>                   

                                <div class="form-group row p-2">
                                  <label for="" class="col-md-3 col-form-label">Ulangi Password Baru</label>
                                  <div class="col-md-9">
                                    <input type="password" name="passwordbaru2" id="passwordbaru2" class="form-control" placeholder="**************" value="">
                                  </div>
                                </div>                   


                                <div class="form-group row p-2 mt-5">
                                    <button type="submit" class="btn btn-primary py-3 px-5 float-end">Simpan</button>
                                </div>



                              </div>
                            </div>      
                          </div>


                    </div>

                  </form>

                </div> <!-- card-body -->
              </div>
            </div> <!-- col-12 -->



        </div> <!-- row -->
      

      </div>
    </div>
    <!-- Service End -->

    <?php $this->load->view('footer'); ?>    


      <script type="text/javascript">
  
    var idpesertalelang = "<?php echo($idpesertalelang) ?>";

    $(document).ready(function() {

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

