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
                                                  <th style="text-align: center;">iditem</th>
                                                  <th style="text-align: center;">Tipe<br>Merk</th>
                                                  <th style="text-align: center;">Warna<br>Thn Pembuatan</th>
                                                  <th style="text-align: center;">No Mesin<br>No Rangka<br>No Polisi</th>
                                                  <th style="text-align: right;">Harga Dasar</th>
                                                  <th style="width: 5%; text-align: center;">Hapus</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                          <tfoot>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th style="text-align: right; font-weight: bold; font-size: 20px;">TOTAL: </th>
                                            <th style="text-align: right; font-weight: bold; font-size: 20px" colspan="2"></th>
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
                <tbody id="tbodyitem">
                  
                </tbody>
              </table>


            </div>
          </div>
        </div>
      </div>
    </div>


    <?php $this->load->view('template/script'); ?>


    <script type="text/javascript">
    var arrItemOnTable = [];
    var idpaket = "<?php echo($idpaket) ?>";

    $(document).ready(function() {

      $('.select2').select2();

      table = $('#table').DataTable({ 
        "select": true,
            "processing": true, 
            "ordering": false,
            "bPaginate": false,      
            "searching": false,  
            "bInfo" : false, 
             "ajax"  : {
                      "url": "<?php echo site_url('paketlelang/datatablesourcedetail')?>",
                      "dataType": "json",
                      "type": "POST",
                      "data": {"idpaket": '<?php echo($idpaket) ?>'}
                  },
                "footerCallback": function ( row, data, start, end, display ) {
                                    var api = this.api(), data;
                         
                                    // Hilangkan format number untuk menghitung sum
                                    var intVal = function ( i ) {
                                        return typeof i === 'string' ?
                                            i.replace(/[\$,.]/g, '')*1 :
                                            typeof i === 'number' ?
                                                i : 0;
                                    };
                         
                                    // Total Semua Halaman
                                    total = api
                                        .column( 5 )
                                        .data()
                                        .reduce( function (a, b) {
                                            return intVal(a) + intVal(b);
                                        }, 0 );
                         
                                    // Total Halaman Terkait
                                    pageTotal = api
                                        .column( 5, { page: 'current'} )
                                        .data()
                                        .reduce( function (a, b) {
                                            return intVal(a) + intVal(b);
                                        }, 0 );
                                    
                                    jlhkeseluruhan = total;
                                    // Update footer
                                    $( api.column( 5 ).footer() ).html(
                                        'Rp. '+ numberWithCommas(total)                                        
                                    );
                                    $('#total').val( numberWithCommas(total) );
                                },
            "columnDefs": [
            { "targets": [ 0 ], "className": 'dt-body-center'},
            { "targets": [ 1 ], "className": 'dt-body-center', "visible": false},
            { "targets": [ 2 ], "className": 'dt-body-center'},
            { "targets": [ 3 ], "className": 'dt-body-center'},
            { "targets": [ 4 ], "className": 'dt-body-center'},
            { "targets": [ 5 ], "className": 'dt-body-right'},
            { "targets": [ 6 ], "orderable": false, "className": 'dt-body-center'},
            ],
     
        });


      //---------------------------------------------------------> JIKA EDIT DATA
      if ( idpaket != "" ) { 
            $.ajax({
                type        : 'POST', 
                url         : '<?php echo site_url("paketlelang/get_edit_data") ?>', 
                data        : {idpaket: idpaket}, 
                dataType    : 'json', 
                encode      : true
            })      
            .done(function(result) {
              $("#idpaket").val(result.idpaket);
              $("#namapaket").val(result.namapaket);
              $("#deskripsi").val(result.deskripsi);
              // $("#tgljammulai").val(result.tgljammulai);
              // $("#tgljamselesai").val(result.tgljamselesai);

            }); 


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
    
    
    $('#tampilitem').click(function() {
      get_available_item();      
    });

    
    $('#form').submit(function(e) {
      e.preventDefault();


      var idpaket       = $("#idpaket").val();
      var namapaket       = $("#namapaket").val();
      var deskripsi       = $("#deskripsi").val();
      var tgljammulai       = $("#tgljammulai").val();
      var tgljamselesai       = $("#tgljamselesai").val();
      var total       = $("#total").val();


      if (namapaket=='') {
        swal("Data Tidak Lengkap!", "Nama paket tidak boleh kosong", "error");
        return;
      }
      if (deskripsi=='') {
        swal("Data Tidak Lengkap!", "Deskripsi tidak boleh kosong", "error");
        return;
      }
      if (tgljammulai=='') {
        swal("Data Tidak Lengkap!", "Tanggal mulai tidak boleh kosong", "error");
        return;
      }
      if (tgljamselesai=='') {
        swal("Data Tidak Lengkap!", "Tanggal selesai tidak boleh kosong", "error");
        return;
      }

      if ( ! table.data().count() ) {
            swal("Data Tidak Lengkap!", "Detail item yang dilelang belum ada", "error");
            return;
        }

        var isidatatable = table.data().toArray();

        var formData = {
                "idpaket"       : idpaket,
                "namapaket"       : namapaket,
                "deskripsi"       : deskripsi,
                "tgljammulai"       : tgljammulai,
                "tgljamselesai"       : tgljamselesai,
                "total"       : total,
                "isidatatable"    : isidatatable
            };

        //console.log(isidatatable);
        // console.log(formData);
        // return;
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
                      window.location.href = "<?php echo(site_url('paketlelang')) ?>";
                  }else{
                    alert("Gagal simpan data!");
                  }
              })
              .fail(function(){
                  alert("Gagal script simpan data!");
              });

    });

    function get_available_item()
    {
      $.ajax({
        url: '<?php echo site_url('paketlelang/get_available_item') ?>',
        type: 'GET',
        dataType: 'json',
      })
      .done(function(itemAvailable) {
        console.log(itemAvailable);
        var no =1;
        $('#tbodyitem').empty();
        var length = itemAvailable.length;
        if (length>0) {

          $.each(itemAvailable, function(index, val) {
            
            var loadItem = '';
            var cariItem = $.inArray(val['iditem'], arrItemOnTable);
            if ( parseInt(cariItem)<0 ) {
              
              loadItem += '<tr>';
              loadItem += '<td><img src="'+val['fotoitem']+'" alt="" width="80%"></td>';
              loadItem += '<td>'+val['tipe']+'<br>'+val['merk']+'<br>'+val['thnpembuatan']+'</td>';
              loadItem += '<td style="text-align: center;">'+val['norangka']+'<br>'+val['nomesin']+'<br>'+val['nobpkb']+'</td>';
              loadItem += '<td style="text-align: center;">'+val['grade']+'<br>'+val['warna']+'</td>';
              loadItem += '<td style="text-align: right;">'+val['harga']+'</td>';
              loadItem += '<td style="text-align: center;"><button class="btn btn-sm btn-primary" id="'+val['iditem']+'"><i class="mdi mdi-plus-box-outline btn-icon-prepend"></i> Pilih</button></td>';
              loadItem += '</tr>';
              loadItem += '<script>$("#'+val["iditem"]+'").click(function() {addTbody("'+val["iditem"]+'")});<\/script>';
              $('#tbodyitem').append(loadItem);

            }

            no++;
          });
        }else{
            loadItem += '<tr>';
            loadItem += '<td colspan="6" style="text-align: center;"><i>Item sudah tidak ada..</i></td>';            
            loadItem += '</tr>';
            $('#tbodyitem').append(loadItem);
        }
      })
      .fail(function() {
        console.log("error");
      });
    }

    function addTbody(iditem)
    {
      $.ajax({
        url: '<?php echo site_url('paketlelang/get_item_id') ?>',
        type: 'GET',
        dataType: 'json',
        data: {iditem: iditem},
      })
      .done(function(resultitem) {
        // console.log(resultitem);


        nomorrow = table.page.info().recordsTotal + 1;
        table.row.add( [
                            nomorrow,
                            resultitem['iditem'],
                            resultitem['tipe']+'<br>'+resultitem['merk'],
                            resultitem['warna']+'<br>'+resultitem['thnpembuatan'],
                            resultitem['nomesin']+'<br>'+resultitem['norangka']+'<br>'+resultitem['nopolisi'],
                            numberWithCommas(resultitem['harga']),
                            '<span class="btn btn-danger btn-sm" data-iditem="'+resultitem['iditem']+'"><i class="fa fa-trash"></i></span>'
                        ] ).draw( false );

        arrItemOnTable.push(resultitem['iditem']);
        get_available_item();
      })
      .fail(function() {
        console.log("error get_item_id");
      });
      
    }
  </script>


  </body>
</html>