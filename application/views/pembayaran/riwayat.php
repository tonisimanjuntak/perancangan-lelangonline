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
              <h6 class="text-body text-uppercase mb-2">Pembayaran</h6>
              <h1 class="display-6 mb-0">
                Riwayat Pembayaran
              </h1>
            </div>
          </div>
        </div>
        <div class="row">

            <div class="col-12">
              <div class="card wow fadeInUp" data-wow-delay="0.1s">
                <div class="card-body">
                  <div class="row">
                    
                    <div class="col-md-12 mb-5">
                      <h5 class="text-muted">List Riwayat Pembayaran</h5>
                    </div>
                    
                    <div class="col-12">
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped table-condesed">
                          <thead>
                            <tr style="font-size: 12px; font-weight: bold;">
                              <th style="text-align: center;">Tanggal<br>ID</th>
                              <th style="text-align: center;">Nama Paket</th>
                              <th style="text-align: center;">Nama Usaha<br>NIB Usaha</th>
                              <th style="text-align: center;">Harga Dasar<br>Paket Lelang</th>
                              <th style="text-align: center;">Jumlah Bayar</th>
                              <th style="text-align: center;">Upload Bukti Pembayaran</th>
                              <th style="text-align: center;">Status Pembayaran</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php  
                              if ($rspembayaran->num_rows()>0) {
                                $no=1;
                                foreach ($rspembayaran->result() as $row) {

                                  if ($row->statuspembayaran=='Sudah Diterima') {
                                      $statuspembayaran = '<a href="'.site_url('pembayaran/cetakbukti/'.$this->encrypt->encode($row->idpembayaran)).'" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print"></i> '.$row->statuspembayaran.'</a>';
                                  }elseif($row->statuspembayaran=='Ditolak'){
                                      $statuspembayaran = '<span class="badge bg-danger text-dark">'.$row->statuspembayaran.'</span>';
                                  }else{
                                      $statuspembayaran = '<span class="badge bg-warning text-dark">'.$row->statuspembayaran.'</span>';
                                  }

                                  $buktipembayaran = '';
                                  if (!empty($row->fotopembayaran)) {
                                    $buktipembayaran = '<a href="'.base_url('admin/uploads/pembayaran/'.$row->fotopembayaran).'" target="_blank">'.$row->fotopembayaran.'</a><br>';
                                  }
                                  if ($row->statuspembayaran=='Menunggu Konfirmasi') {
                                    
                                    $buktipembayaran .= '<a href="'.site_url('pembayaran/upload/'.$this->encrypt->encode($row->idpembayaran)).'" class="btn btn-info btn-sm"><i class="fas fa-upload"></i> Uploads</a>';
                                  }
                            ?>



                                  <tr style="font-size: 12px;">
                                    <th style="text-align: center;"><?php echo tgljamindonesia($row->tglpembayaran) . '<br>' . $row->idpembayaran  ?></th>
                                    <th style="text-align: left;"><?php echo $row->namapaket ?></th>
                                    <th style="text-align: left;"><?php echo $row->namausaha . '<br>' . $row->nibusaha ?></th>
                                    <th style="text-align: right;"><?php echo format_rupiah($row->totalhargadasarpaket) ?></th>
                                    <th style="text-align: right;"><?php echo format_rupiah($row->nominalbayar) ?></th>
                                    <th style="text-align: center;"><?php echo $buktipembayaran ?></th>
                                    <th style="text-align: center;"><?php echo $statuspembayaran ?></th>
                                  </tr>

                            <?php
                                  $no++;
                                }
                              }
                            ?>
                          </tbody>
                        </table>
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

    $(document).ready(function() {
      
      //----------------------------------------------------------------- > validasi
      $("#form").bootstrapValidator({
        feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          namabankpengirim: {
            validators:{
              notEmpty: {
                  message: "nama bank pengirim tidak boleh kosong"
              },
            }
          },
          norekpengirim: {
            validators:{
              notEmpty: {
                  message: "nomor rekening pengirim tidak boleh kosong"
              },
            }
          },
        }
      });

    });

    </script>
  </body>
</html>

