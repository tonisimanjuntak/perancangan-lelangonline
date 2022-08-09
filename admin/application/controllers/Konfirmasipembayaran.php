<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasipembayaran extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
    }

    public function index()
    {
        $data['menu'] = 'konfirmasipembayaran';
        $this->load->view('konfirmasipembayaran/list', $data);
    }   

    public function lihat($idpembayaran)
    {       
        $data['idpaket'] = '';
        $data['menu'] = 'konfirmasipembayaran';
        $this->load->view('konfirmasipembayaran/form', $data);
    }

    public function simpankonfirmasi()
    {       
        $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('konfirmasipembayaran');   
    }
    

}

/* End of file Konfirmasipembayaran.php */
/* Location: ./application/controllers/Konfirmasipembayaran.php */