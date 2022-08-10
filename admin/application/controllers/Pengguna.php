<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
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
        $data['idpengguna'] =$idpengguna;        
        $data['menu'] = 'pengguna';
        $this->load->view('pengguna/form', $data);
    }

    public function delete($idpengguna)
    {
        $pesan = '<script>swal("Berhasil!", "Data berhasil dihapus!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('pengguna');        
    }

    public function simpan()
    {       
        $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('pengguna');   
    }
}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */