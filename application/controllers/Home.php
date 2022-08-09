<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (empty($this->session->userdata('idpesertalelang'))) {
			$this->load->view('login');			
		}else{
			$data['menu'] = 'home';
			$this->load->view('home', $data);			
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */