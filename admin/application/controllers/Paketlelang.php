<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paketlelang extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
        $this->load->model('Paketlelang_model');
        $this->load->library('image_lib');

    }

    public function index()
    {
        $data['menu'] = 'paketlelang';
        $this->load->view('paketlelang/list', $data);
    }   

    public function tambah()
    {       
        $data['idpaket'] = '';        
        $data['menu'] = 'paketlelang';  
        $this->load->view('paketlelang/form', $data);
    }

    public function edit($idpaket)
    {       
        $idpaket = $this->encrypt->decode($idpaket);

        if ($this->Paketlelang_model->get_by_id($idpaket)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('paketlelang');
            exit();
        };
        $data['idpaket'] =$idpaket;        
        $data['menu'] = 'paketlelang';
        $this->load->view('paketlelang/form', $data);
    }

    public function cetak($idpaket)
    {
        $idpaket = $this->encrypt->decode($idpaket);
        $rspaketlelang = $this->Paketlelang_model->get_by_id($idpaket);
        if ($rspaketlelang->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('paketlelang');
            exit();
        };

        error_reporting(0);
        $this->load->library('Pdf');
        $data['idpaket'] =$idpaket; 
        $data['rowpaketlelang'] =$rspaketlelang->row(); 
        $data['rspaketlelangdetail'] = $this->db->query("select * from v_paket_detail where idpaket='".$idpaket."' order by merk, tipe");        
        $this->load->view('paketlelang/cetak',$data);
    }

    public function datatablesource()
    {
        $RsData = $this->Paketlelang_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                if ($rowdata->statuspaket=='Terjual') {
                    $statuspaket = '<span class="badge badge-success">'.$rowdata->statuspaket.'</span><br>Dimenangkan oleh '.$rowdata->namausaha;
                }else{
                    $statuspaket = '<span class="badge badge-danger">'.$rowdata->statuspaket.'</span>';
                }
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = '<strong>'.$rowdata->namapaket.'</strong><br>'.$rowdata->deskripsi;
                $row[] = date('d-m-Y H:i:s', strtotime($rowdata->tgljammulai)).'<br>'.date('d-m-Y H:i:s', strtotime($rowdata->tgljamselesai));
                $row[] = $rowdata->jumlahitem;
                $row[] = format_rupiah($rowdata->totalhargadasarpaket);
                $row[] = $statuspaket;
                $row[] = '
                            <div class="btn-group">
                              <a href="'.site_url( 'paketlelang/edit/'.$this->encrypt->encode($rowdata->idpaket) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                              <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="'.site_url('paketlelang/delete/'.$this->encrypt->encode($rowdata->idpaket) ).'" id="hapus">Hapus</a>
                                <a class="dropdown-item" href="'.site_url('paketlelang/cetak/'.$this->encrypt->encode($rowdata->idpaket) ).'" target="_blank">Cetak</a>
                              </div>
                            </div>                                               
                ';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Paketlelang_model->count_all(),
                        "recordsFiltered" => $this->Paketlelang_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }


    public function datatablesourcedetail()
    {
        // query ini untuk item yang dimunculkan sesuai dengan kategori yang dipilih        

        $idpaket = $this->input->post('idpaket');
        $query = "select * from v_paket_detail
                        WHERE v_paket_detail.idpaket='".$idpaket."'";
        $RsData = $this->db->query($query);

        $no = 0;
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {               
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->iditem;
                $row[] = $rowdata->tipe.'<br>'.$rowdata->merk;
                $row[] = $rowdata->warna.'<br>'.$rowdata->thnpembuatan;
                $row[] = $rowdata->nomesin.'<br>'.$rowdata->norangka.'<br>'.$rowdata->nopolisi;
                $row[] = format_rupiah($rowdata->harga);
                $row[] = '<span class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></span>';
                $data[] = $row;
            }
        }

        $output = array(
                        "data" => $data,
                        );

        //output to json format
        echo json_encode($output);
    }


    public function delete($idpaket)
    {
        $idpaket = $this->encrypt->decode($idpaket);  
        $rsdata = $this->Paketlelang_model->get_by_id($idpaket);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('paketlelang');
            exit();
        };

        $hapus = $this->Paketlelang_model->hapus($idpaket);

        if ($hapus) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil dihapus!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal dihapus karena sudah digunakan!", "error")</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('paketlelang');        

    }

    public function simpan()
    {       
        $isidatatable       = $_REQUEST['isidatatable'];
        $idpaket             = $this->input->post('idpaket');
        $namapaket           = $this->input->post('namapaket');
        $deskripsi           = $this->input->post('deskripsi');
        $tgljammulai                 = $this->input->post('tgljammulai');
        $tgljamselesai                  = $this->input->post('tgljamselesai');
        $total                 = $this->input->post('total');
        $tglinsert              = date('Y-m-d H:i:s');
        $idpengguna         = $this->session->userdata('idpengguna');

            

        if ( empty($idpaket) ) {
            $idpaket = $this->db->query("SELECT create_idpaket('".date('Y-m-d')."') as idpaket")->row()->idpaket;

            $data = array(
                            'idpaket'        => $idpaket, 
                            'namapaket'      => $namapaket, 
                            'deskripsi'      => $deskripsi, 
                            'tgljammulai'            => date('Y-m-d H:i:s', strtotime($tgljammulai)), 
                            'tgljamselesai'            => date('Y-m-d H:i:s', strtotime($tgljamselesai)), 
                            'totalhargadasarpaket'             => untitik($total),
                            'tglinsert'      => $tglinsert, 
                            'tglupdate'      => $tglinsert, 
                            'statuspaket'      => 'Belum Terjual', 
                            'idpengguna'      => $idpengguna, 
                        );

            //-------------------------------- >> simpan dari datatable 
            $i=0;
            $arraydetail=array();       
            foreach ($isidatatable as $item) {
                $iditem                 = $item[1];
                $hargadasar             = untitik($item[5]);
                $i++;

                $detail = array(
                                'idpaket'     => $idpaket,
                                'iditem'            => $iditem,
                                'hargadasar' => $hargadasar,
                                );

                array_push($arraydetail, $detail);              
            }

            $simpan = $this->Paketlelang_model->simpan($data, $arraydetail);      
        }else{ 

            $data = array(
                            'idpaket'        => $idpaket, 
                            'namapaket'      => $namapaket, 
                            'deskripsi'      => $deskripsi, 
                            'tgljammulai'            => date('Y-m-d H:i:s', strtotime($tgljammulai)), 
                            'tgljamselesai'            => date('Y-m-d H:i:s', strtotime($tgljamselesai)), 
                            'totalhargadasarpaket'             => untitik($total),
                            'tglupdate'      => $tglinsert, 
                            'idpengguna'      => $idpengguna, 
                        );


            //-------------------------------- >> simpan dari datatable 
            $i=0;
            $arraydetail=array();       
            foreach ($isidatatable as $item) {
                $iditem                 = $item[1];
                $hargadasar             = untitik($item[5]);
                $i++;

                $detail = array(
                                'idpaket'     => $idpaket,
                                'iditem'            => $iditem,
                                'hargadasar' => $hargadasar,
                                );

                array_push($arraydetail, $detail);              
            }

            // echo json_encode($arraydetail);
            // exit();

            $simpan = $this->Paketlelang_model->update($data, $arraydetail, $idpaket);
        }

            // echo json_encode(array('msg'=>'Data gagal disimpan'));
            // exit();
            
        if (!$simpan) {
            echo json_encode(array('msg'=>'Data gagal disimpan'));
            exit();
        }else{
            echo json_encode(array('success' => true));
            
        }
    }

    
    public function get_edit_data()
    {
        $idpaket = $this->input->post('idpaket');
        $RsData = $this->Paketlelang_model->get_by_id($idpaket)->row();

        $data = array( 
                            'idpaket'     =>  $RsData->idpaket,  
                            'namapaket'     =>  $RsData->namapaket,  
                            'deskripsi'     =>  $RsData->deskripsi,  
                            'tgljammulai'     => date("Y-m-d\TH:i:s", strtotime($RsData->tgljammulai)),  
                            'tgljamselesai'     => date("Y-m-d\TH:i:s", strtotime($RsData->tgljamselesai)),  
                            'totalhargadasarpaket'     =>  $RsData->totalhargadasarpaket,  
                            'statuspaket'     =>  $RsData->statuspaket,  
                            'idbidpemenang'     =>  $RsData->idbidpemenang,  
                            'idpengguna'     =>  $RsData->idpengguna,  
                        );

        echo(json_encode($data));
    }


    public function get_available_item()
    {
        $query = "SELECT * FROM item_lelang WHERE iditem NOT IN
                (SELECT iditem FROM paket_detail)
                ORDER BY merk, tipe, thnpembuatan";
        $rsAvailable = $this->db->query($query);
        $dataAvailable = array();
        if ($rsAvailable->num_rows()>0) {
            foreach ($rsAvailable->result() as $row) {
                if (!empty($row->fotoitem)) {
                    $fotoitem = base_url('uploads/itemlelang/'.$row->fotoitem);
                }else{
                    $fotoitem = base_url('images/sepedamotor.png');
                }
                array_push( $dataAvailable, array(
                                    'iditem' => $row->iditem, 
                                    'merk' => $row->merk, 
                                    'tipe' => $row->tipe, 
                                    'thnpembuatan' => $row->thnpembuatan, 
                                    'warna' => $row->warna, 
                                    'isisilinder' => $row->isisilinder, 
                                    'norangka' => $row->norangka, 
                                    'nomesin' => $row->nomesin, 
                                    'nobpkb' => $row->nobpkb, 
                                    'nopolisi' => $row->nopolisi, 
                                    'grade' => $row->grade, 
                                    'harga' => $row->harga, 
                                    'fotoitem' => $fotoitem 
                                  ));
            }
        }

        echo json_encode($dataAvailable);
    }


    public function get_item_id()
    {
        $iditem = $this->input->get('iditem');
        $rowitem = $this->db->query("select * from item_lelang where iditem='".$iditem."'")->row();
        if (!empty($rowitem->fotoitem)) {
            $fotoitem = base_url('uploads/itemlelang/'.$rowitem->fotoitem);
        }else{
            $fotoitem = base_url('images/sepedamotor.png');
        }
        $data = array(
                    'iditem' => $rowitem->iditem, 
                    'merk' => $rowitem->merk, 
                    'tipe' => $rowitem->tipe, 
                    'thnpembuatan' => $rowitem->thnpembuatan, 
                    'warna' => $rowitem->warna, 
                    'isisilinder' => $rowitem->isisilinder, 
                    'norangka' => $rowitem->norangka, 
                    'nomesin' => $rowitem->nomesin, 
                    'nobpkb' => $rowitem->nobpkb, 
                    'nopolisi' => $rowitem->nopolisi, 
                    'grade' => $rowitem->grade, 
                    'harga' => $rowitem->harga, 
                    'fotoitem' => $fotoitem 
                     );
        echo json_encode($data);
    }


    public function upload_foto($file, $nama)
    {

        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = 'uploads/pengguna/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['remove_space']         = TRUE;
            $config['max_size']             = '2000KB';

            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload($nama)) {
                $foto = $this->upload->data('file_name');
                $size = $this->upload->data('file_size');
                $ext  = $this->upload->data('file_ext'); 
             }else{
                 $foto = "";
             }

        }else{
            $foto = "";
        }
        return $foto;
    }

    public function update_upload_foto($file, $nama, $file_lama)
    {
        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = 'uploads/pengguna/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['remove_space']         = TRUE;
            $config['max_size']            = '2000KB';
            

            $this->load->library('upload', $config);           
            if ($this->upload->do_upload($nama)) {
                $foto = $this->upload->data('file_name');
                $size = $this->upload->data('file_size');
                $ext  = $this->upload->data('file_ext'); 
            }else{
                $foto = $file_lama;
            }          
        }else{          
            $foto = $file_lama;
        }

        return $foto;
    }

}

/* End of file Paketlelang.php */
/* Location: ./application/controllers/Paketlelang.php */