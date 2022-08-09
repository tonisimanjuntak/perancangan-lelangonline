<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itemlelang extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
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

    public function delete($iditem)
    {
        $pesan = '<script>swal("Berhasil!", "Data berhasil dihapus!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('itemlelang');        
    }

    public function simpan()
    {       
        $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('itemlelang');   
    }
    
}

/* End of file Itemlelang.php */
/* Location: ./application/controllers/Itemlelang.php */