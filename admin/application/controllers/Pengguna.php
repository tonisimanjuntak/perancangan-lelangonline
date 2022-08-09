<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
        $this->load->model('Pengguna_model');
        $this->load->library('image_lib');

    }

    public function index()
    {
        $data['menu'] = 'pengguna';
        $this->load->view('pengguna/list', $data);
    }   

    public function tambah()
    {       
        $data['idpengguna'] = '';        
        $data['menu'] = 'pengguna';  
        $this->load->view('pengguna/form', $data);
    }

    public function edit($idpengguna)
    {       
        $idpengguna = $this->encrypt->decode($idpengguna);

        if ($this->Pengguna_model->get_by_id($idpengguna)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('pengguna');
            exit();
        };
        $data['idpengguna'] =$idpengguna;        
        $data['menu'] = 'pengguna';
        $this->load->view('pengguna/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Pengguna_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                if (!empty($rowdata->foto) ) {
                    $foto = '<img src="'.base_url('uploads/pengguna/'.$rowdata->foto).'" alt="" style="width: 60%;">' ;
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
                $row[] = '<strong>'.$rowdata->namapengguna.'</strong><br>'.$rowdata->username;
                $row[] = $rowdata->jeniskelamin;
                $row[] = $rowdata->notelp.'<br>'.$rowdata->email;
                $row[] = $rowdata->level.'<br>'.$statusaktif;
                $row[] = '
                            <div class="btn-group">
                              <a href="'.site_url( 'pengguna/edit/'.$this->encrypt->encode($rowdata->idpengguna) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                              <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="'.site_url('pengguna/delete/'.$this->encrypt->encode($rowdata->idpengguna) ).'" id="hapus">Hapus</a>
                              </div>
                            </div>
                        

                        
                ';
                // $row[] = '<a href="'.site_url( 'pengguna/edit/'.$this->encrypt->encode($rowdata->idpengguna) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                //         <a href="'.site_url('pengguna/delete/'.$this->encrypt->encode($rowdata->idpengguna) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Pengguna_model->count_all(),
                        "recordsFiltered" => $this->Pengguna_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idpengguna)
    {
        $idpengguna = $this->encrypt->decode($idpengguna);  
        $rsdata = $this->Pengguna_model->get_by_id($idpengguna);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pengguna');
            exit();
        };

        $hapus = $this->Pengguna_model->hapus($idpengguna);

        if ($hapus) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil dihapus!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal dihapus karena sudah digunakan!", "error")</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('pengguna');        

    }

    public function simpan()
    {       
        $idpengguna             = $this->input->post('idpengguna');
        $namapengguna           = $this->input->post('namapengguna');
        $jeniskelamin           = $this->input->post('jeniskelamin');
        $alamat                 = $this->input->post('alamat');
        $email                  = $this->input->post('email');
        $notelp                 = $this->input->post('notelp');
        $level                  = $this->input->post('level');
        $username               = $this->input->post('username');
        $password               = $this->input->post('password');
        $password2              = $this->input->post('password2');
        $statusaktif            = $this->input->post('statusaktif');
        $tglinsert              = date('Y-m-d H:i:s');

        if ($password <> $password2) {
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Ulangi password tidak sama.", "error")</script>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pengguna');   
        }

        if ( empty($idpengguna) ) {
            $idpengguna = $this->db->query("SELECT create_idpengguna('".date('Y-m-d')."') as idpengguna")->row()->idpengguna;

            $foto               = $this->upload_foto($_FILES, "file");     

            $data = array(
                            'idpengguna'        => $idpengguna, 
                            'namapengguna'      => $namapengguna, 
                            'jeniskelamin'      => $jeniskelamin, 
                            'alamat'            => $alamat, 
                            'email'             => $email, 
                            'notelp'            => $notelp, 
                            'level'             => $level, 
                            'username'          => $username, 
                            'password'          => md5($password), 
                            'foto'              => $foto, 
                            'statusaktif'       => $statusaktif, 
                        );
            $simpan = $this->Pengguna_model->simpan($data);      
        }else{ 

            $file_lama = $this->input->post('file_lama');
            $foto = $this->update_upload_foto($_FILES, "file", $file_lama);

            $data = array(
                            'namapengguna'      => $namapengguna, 
                            'jeniskelamin'      => $jeniskelamin, 
                            'alamat'            => $alamat, 
                            'email'             => $email, 
                            'notelp'            => $notelp, 
                            'level'             => $level, 
                            'username'          => $username, 
                            'password'          => md5($password), 
                            'foto'              => $foto, 
                            'statusaktif'       => $statusaktif, 
                        );
            $simpan = $this->Pengguna_model->update($data, $idpengguna);
        }

        if ($simpan) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Pesan : "'.$eror['code'].' '.$eror['message'].', "error")</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('pengguna');   
    }
    
    public function get_edit_data()
    {
        $idpengguna = $this->input->post('idpengguna');
        $RsData = $this->Pengguna_model->get_by_id($idpengguna)->row();

        $data = array( 
                            'idpengguna'     =>  $RsData->idpengguna,  
                            'namapengguna'     =>  $RsData->namapengguna,  
                            'jeniskelamin'     =>  $RsData->jeniskelamin,  
                            'alamat'     =>  $RsData->alamat,  
                            'email'     =>  $RsData->email,  
                            'notelp'     =>  $RsData->notelp,  
                            'username'     =>  $RsData->username,  
                            'password'     =>  $RsData->password,  
                            'foto'     =>  $RsData->foto,  
                            'level'     =>  $RsData->level,  
                            'statusaktif'     =>  $RsData->statusaktif,  
                        );

        echo(json_encode($data));
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

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */