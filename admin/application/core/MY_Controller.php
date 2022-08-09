<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function isLogin()
	{
		$idpengguna = $this->session->userdata('idpengguna');
		if (empty($idpengguna)) {
			redirect('Login');
		}
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */