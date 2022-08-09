<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lappesertalelang extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
        $this->load->model('Lappesertalelang_model');

    }

    public function index()
    {

        $idpaket = $this->input->post("idpaket");
		$rsbid = $this->db->query("select * from v_bid where idpaket = '".$idpaket."'");
		
		$data['rsbid'] = $rsbid;
		$data['idpaket'] = $idpaket;
        $data['menu'] = 'lappesertalelang';
        $this->load->view('lappesertalelang/list', $data);
    }   

    public function cetak()
	{
		error_reporting(0);
		$this->load->library('Pdf');
		$subjudul .= "";
		$idpaket = $this->uri->segment(3);
		$rsbid = $this->db->query("select * from v_bid where idpaket = '".$idpaket."'");
		$rowpaket = $this->db->query("select * from v_paket_jadwal where idpaket = '".$idpaket."'")->row();

		$data['rsbid'] = $rsbid;
		$data['rowpaket'] = $rowpaket;
		$data['idpaket'] = $idpaket;
        $this->load->view('lappesertalelang/cetak', $data);
	}

}

/* End of file Lappesertalelang.php */
/* Location: ./application/controllers/Lappesertalelang.php */