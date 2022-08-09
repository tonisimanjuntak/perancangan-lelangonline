<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesertalelang extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
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
        $data['idpesertalelang'] =$idpesertalelang;        
        $data['menu'] = 'pesertalelang';
        $this->load->view('pesertalelang/form', $data);
    }

    public function delete($idpesertalelang)
    {
        $pesan = '<script>swal("Berhasil!", "Data berhasil dihapus!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('pesertalelang');        

    }

    public function simpan()
    {   
        $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('pesertalelang');   
    }
    

}

/* End of file Pesertalelang.php */
/* Location: ./application/controllers/Pesertalelang.php */