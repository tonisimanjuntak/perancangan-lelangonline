<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lappemenanglelang extends my_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
        $this->load->model('Lappemenanglelang_model');

    }

    public function index()
    {

    	$tglawal = $this->input->post("tglawal");
		$tglakhir = $this->input->post("tglakhir");

		if ( empty($tglawal) || empty($tglakhir)) {
			$tglawal = date('Y-m-d');
			$tglakhir = date('Y-m-d');
		}
		
		$data['tglawal'] = $tglawal;
		$data['tglakhir'] = $tglakhir;
        $data['menu'] = 'lappemenanglelang';
        $this->load->view('lappemenanglelang/list', $data);
    }   

    public function cetak()
	{
		error_reporting(0);
		$this->load->library('Pdf');
		$subjudul .= "";
		$tglawal 		= date('Y-m-d', strtotime($this->uri->segment(3)));
		$tglakhir 		= date('Y-m-d', strtotime($this->uri->segment(4)));
		
		$data['tglawal'] = $tglawal;
		$data['tglakhir'] = $tglakhir;
        $this->load->view('lappemenanglelang/cetak', $data);
	}

}

/* End of file Lappemenanglelang.php */
/* Location: ./application/controllers/Lappemenanglelang.php */