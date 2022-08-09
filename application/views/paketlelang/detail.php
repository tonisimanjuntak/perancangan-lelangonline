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
              <h6 class="text-body text-uppercase mb-2">Detail Paket Lelang</h6>
              <h1 class="display-6 mb-0">
                <?php echo $rowpaket->namapaket ?>
              </h1>
            </div>
          </div>
        </div>
        <div class="row">

            <div class="col-12">
              <div class="card wow fadeInUp" data-wow-delay="0.1s">
                <div class="card-body">
                  <div class="row">
                    
                    <div class="col-md-8 mb-5">
                      <h5 class="text-muted">Deskripsi Jadwal:</h5>
                      <?php echo $rowpaket->deskripsi ?>
                    </div>
                    <div class="col-md-4 text-center" style="font-size: 26px; font-weight: bold;">
                      <?php  
                        $tglsekarang = date('Y-m-d H:i');
                        $tgljammulai = date('Y-m-d H:i', strtotime($rowpaket->tgljammulai));
                        $tgljamselesai = date('Y-m-d H:i', strtotime($rowpaket->tgljamselesai));
                        if (!empty($rowpaket->idbidpemenang)) {
                          echo '<i class="text-danger">SUDAH TERJUAL</i>';
                        }elseif (  $tglsekarang < $tgljammulai ) {
                          echo '<i class="text-danger">BELUM DIMULAI</i>';
                        }elseif ( $tglsekarang > $tgljamselesai ) {
                          echo '<i class="text-danger">SUDAH BERLALU</i>';
                        }else{
                          echo '<i class="text-success">SEDANG BERLANGSUNG</i>';
                        }
                      ?>
                      
                    </div>
                    <div class="col-6">
                      <div class="card">
                        <div class="card-body">
                          
                          <table class="table">
                            <tr>
                              <th>Id Jadwal Lelang</th>
                              <th>:</th>
                              <th><?php echo $rowpaket->idpaket ?></th>
                            </tr>
                            <tr>
                              <th>Tgl Mulai Lelang</th>
                              <th>:</th>
                              <th><?php echo date('d-m-Y H:i', strtotime($rowpaket->tgljammulai))  ?></th>
                            </tr>
                            <tr>
                              <th>Tgl Berakhir Lelang</th>
                              <th>:</th>
                              <th><?php echo date('d-m-Y H:i', strtotime($rowpaket->tgljammulai))  ?></th>
                            </tr>
                          </table>

                        </div>
                      </div>
                    </div>


                    <div class="col-6">
                      <div class="card">
                        <div class="card-body">
                          
                          <table class="table">
                            <tr>
                              <th>Total Harga Dasar</th>
                              <th>:</th>
                              <th><?php echo format_rupiah($rowpaket->totalhargadasarpaket) ?></th>
                            </tr>
                            <tr>
                              <th>Status Paket</th>
                              <th>:</th>
                              <th><?php echo $rowpaket->statuspaket ?></th>
                            </tr>
                            <tr>
                              <th>Pemenang Lelang</th>
                              <th>:</th>
                              <th><?php echo $rowpaket->namausaha ?></th>
                            </tr>
                          </table>

                        </div>
                      </div>
                    </div>

                    <div class="col-12 mt-5">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <form action="<?php echo site_url('paketlelang/simpan') ?>" id="form" method="post">
                              
                              <input type="hidden" id="idpaket" name="idpaket" value="<?php echo $rowpaket->idpaket ?>">

                              <div class="col-12 text-center">
                                <h5 class="text-muted">Detail Item Yang di Lelang</h5>
                                <p>Silahkan masukkan nilai penawaran anda pada item-item yang di lelang dibawah ini.</p>
                                
                              </div>
                              <?php  
                                if ($rspaketdetail->num_rows()>0) {
                                  $no=1;
                                  foreach ($rspaketdetail->result() as $rowdetail) { 
                                    if (!empty($rowdetail->fotoitem)) {
                                       $fotoitem = base_url('admin/uploads/itemlelang/'.$rowdetail->fotoitem);
                                     } else{
                                       $fotoitem = base_url('admin/images/sepedamotor.png');
                                     } 
                                    ?>
                              
                                    <div class="col-12 mb-3">
                                      <div class="card shadow">
                                        <div class="card-body">
                                          <div class="row p-3">
                                            <div class="col-12 mb-3" style="font-weight: bold;">
                                              Produk Ke - <?php echo $no ?>
                                            </div>
                                            <div class="col-md-3">
                                              <img src="<?php echo $fotoitem ?>" alt="" style="width: 80%;">
                                            </div>
                                            <div class="col-md-6">
                                              <table class="table">
                                                <tr>
                                                  <td>Type/ Merek</td>
                                                  <td>:</td>
                                                  <td><?php echo $rowdetail->tipe.' / '.$rowdetail->merk ?></td>
                                                </tr>
                                                <tr>
                                                  <td>Isi Silinder</td>
                                                  <td>:</td>
                                                  <td><?php echo $rowdetail->isisilinder ?></td>
                                                </tr>
                                                <tr>
                                                  <td>Warna</td>
                                                  <td>:</td>
                                                  <td><?php echo $rowdetail->warna ?></td>
                                                </tr>
                                                <tr>
                                                  <td>Tahun Pembuatan</td>
                                                  <td>:</td>
                                                  <td><?php echo $rowdetail->thnpembuatan ?></td>
                                                </tr>
                                                <tr>
                                                  <td>No Polisi</td>
                                                  <td>:</td>
                                                  <td><?php echo $rowdetail->nopolisi ?></td>
                                                </tr>
                                                <tr>
                                                  <td>No Mesin</td>
                                                  <td>:</td>
                                                  <td><?php echo $rowdetail->nomesin ?></td>
                                                </tr>
                                                <tr>
                                                  <td>No Rangka</td>
                                                  <td>:</td>
                                                  <td><?php echo $rowdetail->norangka ?></td>
                                                </tr>
                                                <tr>
                                                  <td>No BPKB</td>
                                                  <td>:</td>

                                                  <td><?php echo $rowdetail->nobpkb ?></td>
                                                </tr>
                                                <tr>
                                                  <td>Grade</td>
                                                  <td>:</td>

                                                  <td><?php echo $rowdetail->grade ?></td>
                                                </tr>                                        
                                              </table>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group row">
                                                <div class="col-12 text-center">
                                                  <h5>Harga Dasar : Rp. <?php echo format_rupiah($rowdetail->harga) ?></h5>
                                                </div>
                                                <div class="col-12 text-center mt-5 bg-primary p-3 text-white">
                                                  <P>MASUKKAN HARGA PENAWARAN ANDA</P>
                                                  <input type="text" class="form-control rupiah" name="harga[]" data-iditem="<?php echo $rowdetail->iditem ?>" data-hargadasar="<?php echo $rowdetail->hargadasar ?>">
                                                </div>
                                              </div>
                                            </div>


                                          </div>
                                        </div>
                                      </div>
                                    </div>


                              
                              <?php
                                  $no++;
                                  }
                                }
                              ?>

                              <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                                <?php  
                                  if ($sedangberlangsung) {
                                    echo '
                                        <button type="submit" class="btn btn-primary py-3 px-5 float-end">Ajukan Penawaran</button>
                                    ';
                                  }
                                ?>
                                <a class="btn btn-default py-3 px-5 float-end" href="<?php echo site_url('paketlelang') ?>">Kembali</a>
                              </div>



                            </form>

                          </div>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
            </div> <!-- col-12 -->



        </div> <!-- row -->
      

      </div>
    </div>
    <!-- Service End -->

    <?php $this->load->view('footer'); ?>    

    <script>
      var sedangberlangsung = "<?php echo $sedangberlangsung ?>";
      var jumlahdetail = "<?php echo $rspaketdetail->num_rows() ?>";

      $('#form').submit(function(e) {
        e.preventDefault();
        if (!sedangberlangsung) {
          return;
        }
        
        var idpaket = $('#idpaket').val();
        
        $.ajax({
          url: '<?php echo site_url('paketlelang/cekbid') ?>',
          type: 'GET',
          dataType: 'json',
          data: {'idpaket': idpaket},
        })
        .done(function(result) {
          if (result.sudahada) {

            swal({
              title: "Ingin Bid Ulang?",
              text: "Lelang ini sudah anda bid sebelumnya, apakah anda ingin menggunakan bid ini?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                insertbid(idpaket);
              } 
            });

          }else{
            insertbid(idpaket);
          }
        })
        .fail(function() {
          console.log("error");
        });
        
        
        // console.log(arrText);
      });


      function insertbid(idpaket)
      {
        var arrText = new Array();
        var i = 1;
        $('input[type=text]').each(function(){
            var item = [$(this).attr('data-iditem'), $(this).attr('data-hargadasar'), $(this).val() ];
            if ( parseInt( untitik($(this).attr('data-hargadasar')) ) > parseInt(untitik($(this).val())) ) {
              swal("Harga Bid Dibawah Harga Dasar","Harga Bid tidak boleh dibawah harga dasar.", "error");
              return;
            }else{
              arrText.push( item );
              
            }

            if (parseInt(i)==parseInt(jumlahdetail)) {
              
              var formData = {
                        "idpaket"       : idpaket,
                        "itemdetail"       : arrText,
                    };

                    $.ajax({
                          type        : 'POST', 
                          url         : '<?php echo site_url("paketlelang/simpan") ?>', 
                          data        : formData, 
                          dataType    : 'json', 
                          encode      : true
                      })
                      .done(function(result){
                          console.log(result);
                          if (result.success) {
                              alert("Berhasil simpan data!");
                              window.location.href = "<?php echo(site_url('account/riwayatbid')) ?>";
                          }else{
                            alert("Gagal simpan data!");
                          }
                      })
                      .fail(function(){
                          alert("Gagal script simpan data!");
                      });
            }
            i++;

        });




      }

    </script>
  </body>
</html>

