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

            <form action="<?php echo(site_url('itemlelang/simpan')) ?>" method="post" id="form" enctype="multipart/form-data">

              <div class="page-header flex-wrap">
                <h3 class="mb-0" id="lbljudul"> Item Lelang
                </h3>
                <div class="d-flex">
                  <!-- <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                    <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>-->
                  
                  <a href="<?php echo site_url('itemlelang') ?>" class="btn btn-sm bg-white btn-icon-text border ml-3"><i class="mdi mdi-arrow-left-thick btn-icon-prepend"></i> Kembali </a>
                  <button type="submit" class="btn btn-sm ml-3 btn-primary"><i class="mdi mdi-content-save-all btn-icon-prepend"></i> Simpan</button>
                </div>
              </div>
              <div class="row">
                
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-body">
                      
                      <div class="row">
                        
                        <input type="hidden" name="iditem" id="iditem">

                        

                        <div class="col-md-8">                        
                          <div class="card">
                            <div class="card-body">


                              <div class="row">
                                <div class="col-12">
                                  <h4 class="text-gray">Informasi Item Yang Akan Dilelang</h4><hr>
                                </div>
                                <div class="col-4">
                                  <div class="form-group">
                                    <label for="" class="">Merk</label>
                                    <input type="text" name="merk" id="merk" class="form-control" placeholder="merk">
                                  </div>                      
                                </div>

                                <div class="col-4">
                                  <div class="form-group">                                
                                    <label for="" class="">Tipe</label>
                                    <input type="text" name="tipe" id="tipe" class="form-control" placeholder="tipe">
                                  </div>                      
                                </div>

                                <div class="col-4">
                                  <div class="form-group">                                
                                    <label for="" class="">Tahun Pembuatan</label>
                                    <input type="text" name="thnpembuatan" id="thnpembuatan" class="form-control" placeholder="tahun pembuatan">
                                  </div>                      
                                </div>


                                <div class="col-4">
                                  <div class="form-group">                                
                                    <label for="" class="">Nomor Rangka</label>
                                    <input type="text" name="norangka" id="norangka" class="form-control" placeholder="Nomor rangka">
                                  </div>                      
                                </div>

                                <div class="col-4">
                                  <div class="form-group">                                
                                    <label for="" class="">Nomor Mesin</label>
                                    <input type="text" name="nomesin" id="nomesin" class="form-control" placeholder="Nomor Mesin">
                                  </div>                      
                                </div>

                                <div class="col-4">
                                  <div class="form-group">                                
                                    <label for="" class="">Nomor BPKB</label>
                                    <input type="text" name="nobpkb" id="nobpkb" class="form-control" placeholder="No bpkb">
                                  </div>                      
                                </div>


                                <div class="col-4">
                                  <div class="form-group">                
                                    <label for="" class="">Nomor Polisi</label>
                                    <input type="text" name="nopolisi" id="nopolisi" class="form-control" placeholder="Nomor Polisi">
                                  </div>                      
                                </div>

                                <div class="col-4">
                                  <div class="form-group">                                
                                    <label for="" class="">Isi Silinder</label>
                                    <input type="number" name="isisilinder" id="isisilinder" class="form-control" value="0">
                                  </div>                      
                                </div>

                                <div class="col-4">
                                  <div class="form-group">    
                                    <label for="" class="">Warna</label>
                                    <select name="warna" id="warna" class="form-control">
                                      <option value="Abu-abu">Abu-abu</option>
                                      <option value="Biru">Biru</option>
                                      <option value="Coklat">Coklat</option>
                                      <option value="Hijau">Hijau</option>
                                      <option value="Hitam">Hitam</option>
                                      <option value="Kuning">Kuning</option>
                                      <option value="Merah">Merah</option>
                                      <option value="Putih">Putih</option>
                                    </select>                            
                                  </div>                      
                                </div>

                                <div class="col-12 mt-5">
                                  <h4 class="text-gray">Harga Item</h4><hr>
                                </div>
                                <div class="col-12">
                                  <div class="form-group row">
                                    <label for="" class="col-md-3 col-form-label">Grade</label>
                                    <div class="col-md-9">
                                      <select name="grade" id="grade" class="form-control">
                                        <option value="">Pilih jenis grade...</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                      </select>
                                    </div>
                                  </div>                   
                                </div>
                                <div class="col-12">
                                  <div class="form-group row">
                                    <label for="" class="col-md-3 col-form-label">Harga</label>
                                    <div class="col-md-9">
                                      <input type="text" name="harga" id="harga" class="form-control rupiah">
                                    </div>
                                  </div>                              
                                </div>


                              </div>


                            </div>
                          </div>      
                        </div>


                        <div class="col-md-4">
                          <div class="card">
                            <div class="card-body">
                                
                                <div class="form-group row text center">
                                  <div class="col-12">
                                    <h4 class="text-gray">Foto Item Lelang</h4><hr>
                                  </div>

                                  <div class="col-md-12 mt-3 text-center">
                                    <img src="<?php echo base_url('images/sepedamotor.png'); ?>" id="output1" class="img-thumbnail" style="width:70%;max-height:70%;">
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
  
    var iditem = "<?php echo($iditem) ?>";

    $(document).ready(function() {

      $('.select2').select2();

      //---------------------------------------------------------> JIKA EDIT DATA
      if ( iditem != "" ) { 
            $("#lbljudul").html("Edit Data Item Lelang");
            $("#lblactive").html("Edit");

      }else{
            $("#lbljudul").html("Tambah Data Item Lelang");
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
          merk: {
            validators:{
              notEmpty: {
                  message: "merk tidak boleh kosong"
              },
            }
          },
          tipe: {
            validators:{
              notEmpty: {
                  message: "tipe tidak boleh kosong"
              },
            }
          },
          thnpembuatan: {
            validators:{
              notEmpty: {
                  message: "tahun pembuatan boleh kosong"
              },
            }
          },
          norangka: {
            validators:{
              notEmpty: {
                  message: "nomor rangka tidak boleh kosong"
              },
            }
          },
          nomesin: {
            validators:{
              notEmpty: {
                  message: "nomor mesin tidak boleh kosong"
              },
            }
          },
          nobpkb: {
            validators:{
              notEmpty: {
                  message: "nomor bpkb tidak boleh kosong"
              },
            }
          },
          nopolisi: {
            validators:{
              notEmpty: {
                  message: "nomor polisi tidak boleh kosong"
              },
            }
          },
          isisilinder: {
            validators:{
              notEmpty: {
                  message: "isi silinder tidak boleh kosong"
              },
            }
          },
          warna: {
            validators:{
              notEmpty: {
                  message: "warna tidak boleh kosong"
              },
            }
          },   
          grade: {
            validators:{
              notEmpty: {
                  message: "grade tidak boleh kosong"
              },
            }
          },   
          harga: {
            validators:{
              notEmpty: {
                  message: "harga tidak boleh kosong"
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