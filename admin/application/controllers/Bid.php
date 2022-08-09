<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bid extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();

    }

    public function index()
    {
        $data['menu'] = 'bid';
        $this->load->view('bid/list', $data);
    }   

    public function lihat($idbid)
    {               
        $data['idbid'] =$idbid;        
        $data['menu'] = 'bid';
        $this->load->view('bid/form', $data);
    }

    public function delete($idbid)
    {
        $pesan = '<script>swal("Berhasil!", "Data berhasil dihapus!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('bid');        
    }


    public function simpan()
    {       
        $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('bid');   
    }
    
}

/* End of file Bid.php */
/* Location: ./application/controllers/Bid.php */