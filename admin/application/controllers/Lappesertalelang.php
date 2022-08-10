<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lappesertalelang extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();

    }

    public function index()
    {

        $idpaket = $this->input->post("idpaket");
		$data['idpaket'] = $idpaket;
        $data['menu'] = 'lappesertalelang';
        $this->load->view('lappesertalelang/list', $data);
    }   

    public function cetak()
	{    
		// error_reporting(0);
		// $this->load->library('Pdf');
		$idpaket = $this->uri->segment(3);
		$data['idpaket'] = $idpaket;
        $this->load->view('lappesertalelang/cetak2', $data);
	}

}

/* End of file Lappesertalelang.php */
/* Location: ./application/controllers/Lappesertalelang.php */