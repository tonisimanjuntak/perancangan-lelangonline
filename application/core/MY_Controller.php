<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function isLogin()
	{
		$idpesertalelang = $this->session->userdata('idpesertalelang');
		if (empty($idpesertalelang)) {
			redirect( site_url() );
		}
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */