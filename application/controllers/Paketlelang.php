<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paketlelang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('paketlelang/tampil');
	}

	public function tampil()
	{
		$data['menu'] = 'paketlelang';
		$this->load->view('paketlelang/tampil', $data);
	}

	public function detail($idpaket)
	{
		$data['menu'] = 'paketlelang';
		$this->load->view('paketlelang/detail', $data);
	}


	public function simpan()
    {       
        echo json_encode(array('success' => true));
    }


    public function cekbid()
    {
    	$idpaket = $this->input->get('idpaket');
        $idpesertalelang = $this->session->userdata('idpesertalelang');
    	$rscek= $this->db->query("select * from v_bid where idpaket='".$idpaket."' and idpesertalelang='".$idpesertalelang."'");
    	if ($rscek->num_rows()>0) {
    		echo json_encode( array('sudahada' => true));
    	}else{
    		echo json_encode( array('sudahada' => false));
    	}
    }

}

/* End of file Paketlelang.php */
/* Location: ./application/controllers/Paketlelang.php */