<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itemlelang extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
        $this->load->model('Itemlelang_model');
        $this->load->library('image_lib');

    }

    public function index()
    {
        $data['menu'] = 'itemlelang';
        $this->load->view('itemlelang/list', $data);
    }   

    public function tambah()
    {       
        $data['iditem'] = '';        
        $data['menu'] = 'itemlelang';  
        $this->load->view('itemlelang/form', $data);
    }

    public function edit($iditem)
    {       
        $iditem = $this->encrypt->decode($iditem);

        if ($this->Itemlelang_model->get_by_id($iditem)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('itemlelang');
            exit();
        };
        $data['iditem'] =$iditem;        
        $data['menu'] = 'itemlelang';
        $this->load->view('itemlelang/form', $data);
    }

    public function cetak()
    {
        error_reporting(0);
        $this->load->library('Pdf');
        $data['rsitem'] = $this->db->query("select * from item_lelang order by merk, tipe");
        $this->load->view('itemlelang/cetak',$data);
    }

    public function datatablesource()
    {
        $RsData = $this->Itemlelang_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                if (!empty($rowdata->fotoitem) ) {
                    $foto = '<img src="'.base_url('uploads/itemlelang/'.$rowdata->fotoitem).'" alt="" style="width: 60%;">' ;
                }else{
                    $foto = '<img src="'.base_url('images/sepedamotor.png').'" alt="" style="width: 60%;">' ;
                }
                if ($rowdata->statusitem=='Belum Terjual') {
                    $statusitem = '<span class="badge badge-success">'.$rowdata->statusitem.'</span>';
                }else{
                    $statusitem = '<span class="badge badge-danger">'.$rowdata->statusitem.'</span>';
                }
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $foto;
                $row[] = '<strong>'.$rowdata->tipe.'</strong><br>'.$rowdata->merk.'<br>'.$rowdata->thnpembuatan;
                $row[] = $rowdata->warna.'<br>'.$rowdata->isisilinder;
                $row[] = $rowdata->norangka.'<br>'.$rowdata->nomesin.'<br>'.$rowdata->nobpkb.'<br>'.$rowdata->nopolisi;
                $row[] = format_rupiah($rowdata->harga).'<br>'.$rowdata->grade;
                $row[] = $statusitem;
                $row[] = '
                            <div class="btn-group">
                              <a href="'.site_url( 'itemlelang/edit/'.$this->encrypt->encode($rowdata->iditem) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                              <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="'.site_url('itemlelang/delete/'.$this->encrypt->encode($rowdata->iditem) ).'" id="hapus">Hapus</a>
                              </div>
                            </div>
                        

                        
                ';
                // $row[] = '<a href="'.site_url( 'itemlelang/edit/'.$this->encrypt->encode($rowdata->iditem) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                //         <a href="'.site_url('itemlelang/delete/'.$this->encrypt->encode($rowdata->iditem) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Itemlelang_model->count_all(),
                        "recordsFiltered" => $this->Itemlelang_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($iditem)
    {
        $iditem = $this->encrypt->decode($iditem);  
        $rsdata = $this->Itemlelang_model->get_by_id($iditem);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('itemlelang');
            exit();
        };

        $hapus = $this->Itemlelang_model->hapus($iditem);

        if ($hapus) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil dihapus!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal dihapus karena sudah digunakan!", "error")</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('itemlelang');        

    }

    public function simpan()
    {       
        $iditem             	= $this->input->post('iditem');
        $merk           		= $this->input->post('merk');
        $tipe           		= $this->input->post('tipe');
        $thnpembuatan           = $this->input->post('thnpembuatan');
        $warna           		= $this->input->post('warna');
        $isisilinder           	= $this->input->post('isisilinder');
        $norangka           	= $this->input->post('norangka');
        $nomesin           		= $this->input->post('nomesin');
        $nobpkb           		= $this->input->post('nobpkb');
        $nopolisi           	= $this->input->post('nopolisi');
        $grade           		= $this->input->post('grade');
        $harga           		= untitik($this->input->post('harga'));
        $tglinsert              = date('Y-m-d H:i:s');


        if ( empty($iditem) ) {
            $iditem = $this->db->query("SELECT create_iditem('".date('Y-m-d')."') as iditem")->row()->iditem;

            $foto               = $this->upload_foto($_FILES, "file");     

            $data = array(
                            'iditem'        => $iditem, 
                            'merk'      => $merk, 
                            'tipe'      => $tipe, 
                            'thnpembuatan'      => $thnpembuatan, 
                            'warna'      => $warna, 
                            'isisilinder'      => $isisilinder, 
                            'norangka'      => $norangka, 
                            'nomesin'      => $nomesin, 
                            'nobpkb'      => $nobpkb, 
                            'nopolisi'      => $nopolisi, 
                            'grade'      => $grade, 
                            'harga'      => $harga, 
                            'statusitem'      => 'Belum Terjual',                             
                            'fotoitem'      => $foto,                             
                        );
            $simpan = $this->Itemlelang_model->simpan($data);      
        }else{ 

            $file_lama = $this->input->post('file_lama');
            $foto = $this->update_upload_foto($_FILES, "file", $file_lama);

            $data = array(
                            'merk'      => $merk, 
                            'tipe'      => $tipe, 
                            'thnpembuatan'      => $thnpembuatan, 
                            'warna'      => $warna, 
                            'isisilinder'      => $isisilinder, 
                            'norangka'      => $norangka, 
                            'nomesin'      => $nomesin, 
                            'nobpkb'      => $nobpkb, 
                            'nopolisi'      => $nopolisi, 
                            'grade'      => $grade, 
                            'harga'      => $harga, 
                            'fotoitem'      => $foto,                             
                        );
            $simpan = $this->Itemlelang_model->update($data, $iditem);
        }

        if ($simpan) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Pesan : "'.$eror['code'].' '.$eror['message'].', "error")</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('itemlelang');   
    }
    
    public function get_edit_data()
    {
        $iditem = $this->input->post('iditem');
        $RsData = $this->Itemlelang_model->get_by_id($iditem)->row();

        $data = array(
                            'iditem'        => $RsData->iditem, 
                            'merk'      => $RsData->merk, 
                            'tipe'      => $RsData->tipe, 
                            'thnpembuatan'      => $RsData->thnpembuatan, 
                            'warna'      => $RsData->warna, 
                            'isisilinder'      => $RsData->isisilinder, 
                            'norangka'      => $RsData->norangka, 
                            'nomesin'      => $RsData->nomesin, 
                            'nobpkb'      => $RsData->nobpkb, 
                            'nopolisi'      => $RsData->nopolisi, 
                            'grade'      => $RsData->grade, 
                            'harga'      => format_rupiah($RsData->harga), 
                            'statusitem'      => $RsData->statusitem,                             
                            'fotoitem'      => $RsData->fotoitem,                             
                        );

        echo(json_encode($data));
    }

    public function upload_foto($file, $nama)
    {

        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = 'uploads/itemlelang/';
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
            $config['upload_path']          = 'uploads/itemlelang/';
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

/* End of file Itemlelang.php */
/* Location: ./application/controllers/Itemlelang.php */