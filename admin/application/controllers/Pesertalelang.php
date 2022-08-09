<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesertalelang extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
        $this->load->model('Pesertalelang_model');
        $this->load->library('image_lib');

    }

    public function index()
    {
        $data['menu'] = 'pesertalelang';
        $this->load->view('pesertalelang/list', $data);
    }   

    public function tambah()
    {       
        $data['idpesertalelang'] = '';        
        $data['menu'] = 'pesertalelang';  
        $this->load->view('pesertalelang/form', $data);
    }

    public function edit($idpesertalelang)
    {       
        $idpesertalelang = $this->encrypt->decode($idpesertalelang);

        if ($this->Pesertalelang_model->get_by_id($idpesertalelang)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('pesertalelang');
            exit();
        };
        $data['idpesertalelang'] =$idpesertalelang;        
        $data['menu'] = 'pesertalelang';
        $this->load->view('pesertalelang/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Pesertalelang_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                if (!empty($rowdata->foto) ) {
                    $foto = '<img src="'.base_url('uploads/pesertalelang/'.$rowdata->foto).'" alt="" style="width: 60%;">' ;
                }else{
                    $foto = '<img src="'.base_url('images/users.png').'" alt="" style="width: 60%;">' ;
                }
                if ($rowdata->statusaktif=='Aktif') {
                    $statusaktif = '<span class="badge badge-success">'.$rowdata->statusaktif.'</span>';
                }else{
                    $statusaktif = '<span class="badge badge-danger">'.$rowdata->statusaktif.'</span>';
                }
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $foto;
                $row[] = '<strong>'.$rowdata->namausaha.'</strong><br>'.$rowdata->nibusaha.'<br>'.$rowdata->emailusaha.'/ '.$rowdata->notelpusaha;
                $row[] = '<strong>'.$rowdata->namapemilik.'</strong>'.'<br>'.$rowdata->nikpemilik.'/ '.$rowdata->jeniskelaminpemilik;
                $row[] = $rowdata->alamatpemilik.'<br>'.$rowdata->emailpemilik.'/ '.$rowdata->notelppemilik;
                $row[] = $rowdata->username.'<br>'.tglindonesia($rowdata->tgldaftar).'/ '.$statusaktif;
                $row[] = '
                            <div class="btn-group">
                              <a href="'.site_url( 'pesertalelang/edit/'.$this->encrypt->encode($rowdata->idpesertalelang) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                              <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="'.site_url('pesertalelang/delete/'.$this->encrypt->encode($rowdata->idpesertalelang) ).'" id="hapus">Hapus</a>
                              </div>
                            </div>
                        

                        
                ';
                // $row[] = '<a href="'.site_url( 'pesertalelang/edit/'.$this->encrypt->encode($rowdata->idpesertalelang) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                //         <a href="'.site_url('pesertalelang/delete/'.$this->encrypt->encode($rowdata->idpesertalelang) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Pesertalelang_model->count_all(),
                        "recordsFiltered" => $this->Pesertalelang_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idpesertalelang)
    {
        $idpesertalelang = $this->encrypt->decode($idpesertalelang);  
        $rsdata = $this->Pesertalelang_model->get_by_id($idpesertalelang);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pesertalelang');
            exit();
        };

        $hapus = $this->Pesertalelang_model->hapus($idpesertalelang);

        if ($hapus) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil dihapus!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal dihapus karena sudah digunakan!", "error")</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('pesertalelang');        

    }

    public function simpan()
    {       
        $idpesertalelang             = $this->input->post('idpesertalelang');
        $namausaha           = $this->input->post('namausaha');
        $nibusaha           = $this->input->post('nibusaha');
        $emailusaha           = $this->input->post('emailusaha');
        $notelpusaha           = $this->input->post('notelpusaha');
        $namapemilik           = $this->input->post('namapemilik');
        $nikpemilik           = $this->input->post('nikpemilik');
        $jeniskelaminpemilik           = $this->input->post('jeniskelaminpemilik');
        $emailpemilik           = $this->input->post('emailpemilik');
        $notelppemilik           = $this->input->post('notelppemilik');
        $alamatpemilik           = $this->input->post('alamatpemilik');
        $statusaktif           = $this->input->post('statusaktif');
        $username           = $this->input->post('username');
        $password           = $this->input->post('password');

        $tglinsert              = date('Y-m-d H:i:s');


        if ( empty($idpesertalelang) ) {
            $idpesertalelang = $this->db->query("SELECT create_idpesertalelang('".date('Y-m-d')."') as idpesertalelang")->row()->idpesertalelang;

            $foto               = $this->upload_foto($_FILES, "file");     

            $data = array(
                            'idpesertalelang'        => $idpesertalelang, 
                            'namausaha'      => $namausaha,
                            'nibusaha'      => $nibusaha,
                            'emailusaha'      => $emailusaha,
                            'notelpusaha'      => $notelpusaha,
                            'namapemilik'      => $namapemilik,
                            'nikpemilik'      => $nikpemilik,
                            'jeniskelaminpemilik'      => $jeniskelaminpemilik,
                            'emailpemilik'      => $emailpemilik,
                            'notelppemilik'      => $notelppemilik,
                            'alamatpemilik'      => $alamatpemilik,
                            'statusaktif'      => $statusaktif,
                            'foto'      => $foto,
                            'tgldaftar'      => $tglinsert,
                        );
            $simpan = $this->Pesertalelang_model->simpan($data);      
        }else{ 

            $file_lama = $this->input->post('file_lama');
            $foto = $this->update_upload_foto($_FILES, "file", $file_lama);

            $data = array(
                            'namausaha'      => $namausaha,
                            'nibusaha'      => $nibusaha,
                            'emailusaha'      => $emailusaha,
                            'notelpusaha'      => $notelpusaha,
                            'namapemilik'      => $namapemilik,
                            'nikpemilik'      => $nikpemilik,
                            'jeniskelaminpemilik'      => $jeniskelaminpemilik,
                            'emailpemilik'      => $emailpemilik,
                            'notelppemilik'      => $notelppemilik,
                            'alamatpemilik'      => $alamatpemilik,
                            'statusaktif'      => $statusaktif,
                            'foto'      => $foto,
                        );
            $simpan = $this->Pesertalelang_model->update($data, $idpesertalelang);
        }

        if ($simpan) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Pesan : "'.$eror['code'].' '.$eror['message'].', "error")</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('pesertalelang');   
    }
    
    public function get_edit_data()
    {
        $idpesertalelang = $this->input->post('idpesertalelang');
        $RsData = $this->Pesertalelang_model->get_by_id($idpesertalelang)->row();

        $data = array(
                            'idpesertalelang'        => $RsData->idpesertalelang, 
                            'namausaha'      => $RsData->namausaha,
                            'nibusaha'      => $RsData->nibusaha,
                            'emailusaha'      => $RsData->emailusaha,
                            'notelpusaha'      => $RsData->notelpusaha,
                            'namapemilik'      => $RsData->namapemilik,
                            'nikpemilik'      => $RsData->nikpemilik,
                            'jeniskelaminpemilik'      => $RsData->jeniskelaminpemilik,
                            'emailpemilik'      => $RsData->emailpemilik,
                            'notelppemilik'      => $RsData->notelppemilik,
                            'alamatpemilik'      => $RsData->alamatpemilik,
                            'statusaktif'      => $RsData->statusaktif,
                            'foto'      => $RsData->foto,
                        );

        echo(json_encode($data));
    }

    public function upload_foto($file, $nama)
    {

        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = 'uploads/pesertalelang/';
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
            $config['upload_path']          = 'uploads/pesertalelang/';
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

/* End of file Pesertalelang.php */
/* Location: ./application/controllers/Pesertalelang.php */