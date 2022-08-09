<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesertalogin extends CI_Controller {


    public function index()
    { 
        // $idpesertalelang = $this->session->userdata('idpesertalelang');
        // if (!empty($idpesertalelang)) {
        //     redirect( site_url() );
        // }else{
        // }
            $this->load->view('login');     

    }


}

/* End of file Pesertalogin.php */
/* Location: ./application/controllers/Pesertalogin.php */