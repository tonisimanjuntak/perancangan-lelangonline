<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->isLogin();
	}

	public function index()
	{
		
	}

	public function riwayatbid()
	{
		$data['menu'] = 'account';
		$this->load->view('account/riwayatbid', $data);
	}


	public function datasaya()
	{
		$foto = base_url('images/noimage.jpg');
		$data['foto'] = $foto;
		$data['menu'] = 'account';
		$this->load->view('account/datasaya', $data);
	}


	public function gantipassword()
	{
		$foto = base_url('images/noimage.jpg');
		$data['foto'] = $foto;
		$data['menu'] = 'account';
		$this->load->view('account/gantipassword', $data);
	}


	public function simpan()
    {       
        $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('account/datasaya');   
    }


    public function simpanpassword()
    {  
        $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('account/gantipassword');   
    }


}

/* End of file Account.php */
/* Location: ./application/controllers/Account.php */