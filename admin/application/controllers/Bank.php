<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
        $this->load->model('Bank_model');
        $this->load->library('image_lib');

    }

    public function index()
    {
        $data['menu'] = 'bank';
        $this->load->view('bank/list', $data);
    }   

    public function tambah()
    {       
        $data['idbank'] = '';        
        $data['menu'] = 'bank';  
        $this->load->view('bank/form', $data);
    }

    public function edit($idbank)
    {       
        $idbank = $this->encrypt->decode($idbank);

        if ($this->Bank_model->get_by_id($idbank)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('bank');
            exit();
        };
        $data['idbank'] =$idbank;        
        $data['menu'] = 'bank';
        $this->load->view('bank/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Bank_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                if (!empty($rowdata->logobank) ) {
                    $logobank = '<img src="'.base_url('uploads/bank/'.$rowdata->logobank).'" alt="" style="width: 60%;">' ;
                }else{
                    $logobank = '<img src="'.base_url('images/bank.jpg').'" alt="" style="width: 60%;">' ;
                }
                if ($rowdata->statusaktif=='Aktif') {
                    $statusaktif = '<span class="badge badge-success">'.$rowdata->statusaktif.'</span>';
                }else{
                    $statusaktif = '<span class="badge badge-danger">'.$rowdata->statusaktif.'</span>';
                }
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $logobank;
                $row[] = '<strong>'.$rowdata->namabank.'</strong><br>'.$rowdata->cabang;
                $row[] = $rowdata->norekening;
                $row[] = $statusaktif;
                $row[] = '
                            <div class="btn-group">
                              <a href="'.site_url( 'bank/edit/'.$this->encrypt->encode($rowdata->idbank) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i> Edit</a>
                              <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="'.site_url('bank/delete/'.$this->encrypt->encode($rowdata->idbank) ).'" id="hapus">Hapus</a>
                              </div>
                            </div>
                        

                        
                ';
                // $row[] = '<a href="'.site_url( 'bank/edit/'.$this->encrypt->encode($rowdata->idbank) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                //         <a href="'.site_url('bank/delete/'.$this->encrypt->encode($rowdata->idbank) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Bank_model->count_all(),
                        "recordsFiltered" => $this->Bank_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idbank)
    {
        $idbank = $this->encrypt->decode($idbank);  
        $rsdata = $this->Bank_model->get_by_id($idbank);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('bank');
            exit();
        };

        $hapus = $this->Bank_model->hapus($idbank);

        if ($hapus) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil dihapus!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal dihapus karena sudah digunakan!", "error")</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('bank');        

    }

    public function simpan()
    {       
        $idbank             = $this->input->post('idbank');
        $namabank           = $this->input->post('namabank');
        $cabang           = $this->input->post('cabang');
        $norekening           = $this->input->post('norekening');
        $statusaktif            = $this->input->post('statusaktif');
        $tglinsert              = date('Y-m-d H:i:s');

        if ($password <> $password2) {
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Ulangi password tidak sama.", "error")</script>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('bank');   
        }

        if ( empty($idbank) ) {
            $idbank = $this->db->query("SELECT create_idbank() as idbank")->row()->idbank;

            $foto               = $this->upload_foto($_FILES, "file");     

            $data = array(
                            'idbank'        => $idbank, 
                            'namabank'      => $namabank, 
                            'cabang'      => $cabang, 
                            'norekening'            => $norekening, 
                            'logobank'              => $foto, 
                            'statusaktif'       => $statusaktif, 
                        );
            $simpan = $this->Bank_model->simpan($data);      
        }else{ 

            $file_lama = $this->input->post('file_lama');
            $foto = $this->update_upload_foto($_FILES, "file", $file_lama);

            $data = array(
                            'namabank'      => $namabank, 
                            'cabang'      => $cabang, 
                            'norekening'            => $norekening, 
                            'logobank'              => $foto, 
                            'statusaktif'       => $statusaktif, 
                        );
            $simpan = $this->Bank_model->update($data, $idbank);
        }

        if ($simpan) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Pesan : "'.$eror['code'].' '.$eror['message'].', "error")</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('bank');   
    }
    
    public function get_edit_data()
    {
        $idbank = $this->input->post('idbank');
        $RsData = $this->Bank_model->get_by_id($idbank)->row();

        $data = array( 
                            'idbank'     =>  $RsData->idbank,  
                            'namabank'     =>  $RsData->namabank,  
                            'cabang'     =>  $RsData->cabang,  
                            'norekening'     =>  $RsData->norekening,  
                            'logobank'     =>  $RsData->logobank,  
                            'statusaktif'     =>  $RsData->statusaktif,  
                        );

        echo(json_encode($data));
    }

    public function upload_foto($file, $nama)
    {

        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = 'uploads/bank/';
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
            $config['upload_path']          = 'uploads/bank/';
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

/* End of file Bank.php */
/* Location: ./application/controllers/Bank.php */