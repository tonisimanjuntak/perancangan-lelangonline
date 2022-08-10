<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->isLogin();		
	}

	public function index()
	{
		
	}

	public function bayar($idpaket)
	{
		$data['menu'] = 'pembayaran';
		$data['idpaket'] = $idpaket;
		$this->load->view('pembayaran/bayar', $data);

	}

	public function upload($idpembayaran)
	{		
		$fotopembayaran = base_url('images/noimage.jpg');
		$data['menu'] = 'pembayaran';
        $data['idpembayaran'] = $idpembayaran;
        $data['fotopembayaran'] = $fotopembayaran;
        $this->load->view('pembayaran/upload', $data);

	}

	public function riwayat()
	{
     	$data['menu'] = 'pembayaran';
     	$this->load->view('pembayaran/riwayat', $data);
	}

	public function simpan()
	{
        $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('pembayaran/riwayat');   
	}

	public function simpanupload()
	{
        $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('pembayaran/riwayat');   
	}



    public function cetakbukti($idpembayaran)
    {
        
        error_reporting(0);
        $this->load->library('Pdf');
        $data['idpembayaran'] =$idpembayaran; 
        $this->load->view('pembayaran/cetakbukti',$data);
    }


}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */