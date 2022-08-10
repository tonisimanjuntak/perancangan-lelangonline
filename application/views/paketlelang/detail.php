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
                PROMO HAJI RAYA
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
                      Murah Meriah Honda Scoopy
                    </div>
                    <div class="col-md-4 text-center" style="font-size: 26px; font-weight: bold;">
                      <?php  
                        $tglsekarang = date('Y-m-d H:i');
                        $tgljammulai = '01-06-2022';
                        $tgljamselesai = '31-08-2022';
                        echo '<i class="text-success">SEDANG BERLANGSUNG</i>';
                      ?>
                      
                    </div>
                    <div class="col-6">
                      <div class="card">
                        <div class="card-body">
                          
                          <table class="table">
                            <tr>
                              <th>Id Jadwal Lelang</th>
                              <th>:</th>
                              <th>1121211</th>
                            </tr>
                            <tr>
                              <th>Tgl Mulai Lelang</th>
                              <th>:</th>
                              <th>01-06-2022</th>
                            </tr>
                            <tr>
                              <th>Tgl Berakhir Lelang</th>
                              <th>:</th>
                              <th>31-08-2022</th>
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
                              <th>Rp. 10.0000.000</th>
                            </tr>
                            <tr>
                              <th>Status Paket</th>
                              <th>:</th>
                              <th>Belum Terjual</th>
                            </tr>
                            <tr>
                              <th>Pemenang Lelang</th>
                              <th>:</th>
                              <th>-</th>
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
                              
                              <input type="hidden" id="idpaket" name="idpaket" value="12122112">

                              <div class="col-12 text-center">
                                <h5 class="text-muted">Detail Item Yang di Lelang</h5>
                                <p>Silahkan masukkan nilai penawaran anda pada item-item yang di lelang dibawah ini.</p>
                                
                              </div>
                              
                                    <div class="col-12 mb-3">
                                      <div class="card shadow">
                                        <div class="card-body">
                                          <div class="row p-3">
                                            <div class="col-12 mb-3" style="font-weight: bold;">
                                              Produk Ke - 1
                                            </div>
                                            <div class="col-md-3">
                                              <img src="<?php echo base_url('admin/uploads/itemlelang/Honda_Vario_150_eSP.png') ?>" alt="" style="width: 80%;">
                                            </div>
                                            <div class="col-md-6">
                                              <table class="table">
                                                <tr>
                                                  <td>Type/ Merek</td>
                                                  <td>:</td>
                                                  <td>Vario 110 eSP CBS / Honda</td>
                                                </tr>
                                                <tr>
                                                  <td>Isi Silinder</td>
                                                  <td>:</td>
                                                  <td>110</td>
                                                </tr>
                                                <tr>
                                                  <td>Warna</td>
                                                  <td>:</td>
                                                  <td>Merah</td>
                                                </tr>
                                                <tr>
                                                  <td>Tahun Pembuatan</td>
                                                  <td>:</td>
                                                  <td>2019</td>
                                                </tr>
                                                <tr>
                                                  <td>No Polisi</td>
                                                  <td>:</td>
                                                  <td>KB 4444</td>
                                                </tr>
                                                <tr>
                                                  <td>No Mesin</td>
                                                  <td>:</td>
                                                  <td>029737267</td>
                                                </tr>
                                                <tr>
                                                  <td>No Rangka</td>
                                                  <td>:</td>
                                                  <td>98726561</td>
                                                </tr>
                                                <tr>
                                                  <td>No BPKB</td>
                                                  <td>:</td>

                                                  <td>24678989</td>
                                                </tr>
                                                <tr>
                                                  <td>Grade</td>
                                                  <td>:</td>

                                                  <td>B</td>
                                                </tr>                                        
                                              </table>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group row">
                                                <div class="col-12 text-center">
                                                  <h5>Harga Dasar : Rp. 10,000,000</h5>
                                                </div>
                                                <div class="col-12 text-center mt-5 bg-primary p-3 text-white">
                                                  <P>MASUKKAN HARGA PENAWARAN ANDA</P>
                                                  <input type="text" class="form-control rupiah" name="harga[]">
                                                </div>
                                              </div>
                                            </div>


                                          </div>
                                        </div>
                                      </div>
                                    </div>


                              <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                                <button type="submit" class="btn btn-primary py-3 px-5 float-end">Ajukan Penawaran</button>
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
      
      $('#form').submit(function(e) {
        e.preventDefault();
        var formData = {
                        "idpaket"       : '122121',
                        "itemdetail"       : '',
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
        
        // console.log(arrText);
      });


    </script>
  </body>
</html>

