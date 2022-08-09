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
              <h6 class="text-body text-uppercase mb-2">Riwayat Bid</h6>
              <h1 class="display-6 mb-0">
                List Data Riwayat Bid
              </h1>
            </div>
          </div>
        </div>
        <div class="row">

            <div class="col-12">
              <div class="card wow fadeInUp" data-wow-delay="0.1s">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <table class="table">
                        <thead>
                          <tr>
                            <th style="text-align: center;">NO</th>
                            <th style="text-align: center;">ID BID/<br>TGL BID</th>
                            <th style="text-align: center;">NAMA PAKET</th>
                            <th style="text-align: center;">HARGA DASAR PAKET</th>
                            <th style="text-align: center;">TOTAL HARGA BID</th>
                            <th style="text-align: center;">STATUS BID</th>
                            <th style="text-align: center;">PEMENANG BID</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  
                            $rsbid = $this->db->query("select * from v_bid where idpesertalelang='".$this->session->userdata('idpesertalelang')."' order by tglbid desc");
                            if ($rsbid->num_rows()>0) {
                              $no=1;
                              foreach ($rsbid->result() as $row) {

                                $namausahapemenang = '-';
                                $rowpaket = $this->db->query("select * from v_paket_jadwal where idpaket = '".$row->idpaket."'")->row();
                                $idpesertalelang = $rowpaket->idpesertalelang;
                                if (!empty($idpesertalelang)) {
                                  echo $idpesertalelang;
                                  $rowpemenang = $this->db->query("select * from peserta_lelang where idpesertalelang = '".$idpesertalelang."'")->row();
                                  $namausahapemenang = $rowpemenang->namausaha;
                                }

                          ?>
                              <tr>
                                <th style="text-align: center;"><?php echo $no++ ?></th>
                                <th style="text-align: center;"><?php echo $row->idbid.'<br>'.tgljamindonesia($row->tglbid) ?></th>
                                <th style="text-align: center;"><?php echo $row->namapaket ?></th>
                                <th style="text-align: center;"><?php echo format_rupiah($row->totalhargadasarpaket) ?></th>
                                <th style="text-align: center;"><?php echo format_rupiah($row->totalhargabid) ?></th>
                                <th style="text-align: center;"><?php echo $row->statusbid ?></th>
                                <th style="text-align: center;"><?php echo $namausahapemenang ?></th>
                              </tr>

                          <?php                       

                              if ($row->statusbid=='Menang') { 
                          ?>

                                        <tr>
                                          <th style="text-align: center;" colspan="7">
                                            <h3 class="text-success">SELAMAT</h3>
                                            <p>Anda telah terpilih sebagai pemenang Lelang <?php echo $row->namapaket ?>.</p>
                                            <?php  
                                              if ($rowpaket->statuspaket=='Terjual') {
                                                echo '<p>Terimakasih Anda Sudah Melakukan Pembayaran</p>';
                                              }else{
                                                echo '
                                              <a href="'.site_url('pembayaran/bayar/'.$this->encrypt->encode($row->idpaket)).'">Klik disini untuk melakukan pembayaran!</a>
                                                ';
                                              }
                                            ?>
                                          </th>                                          
                                        </tr>
                          <?php
                                        
                                      }        
                              }
                            }
                          ?>
                        </tbody>
                      </table>
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
        $('input[type=text]').each(function(){
            var item = [$(this).attr('data-iditem'), $(this).attr('data-hargadasar'), $(this).val() ];
            arrText.push( item );
        })


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

    </script>
  </body>
</html>

