<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
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
        $data['idbank'] =$idbank;        
        $data['menu'] = 'bank';
        $this->load->view('bank/form', $data);
    }

    public function delete($idbank)
    {
        $pesan = '<script>swal("Berhasil!", "Data berhasil dihapus!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('bank');        

    }

    public function simpan()
    {               
        $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('bank');   
    }
    

}

/* End of file Bank.php */
/* Location: ./application/controllers/Bank.php */