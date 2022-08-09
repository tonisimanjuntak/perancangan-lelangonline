<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function ceklogin($username, $password)
    {
        $query = "select * from pengguna where username='".$username."' and password='".$password."' and statusaktif='Aktif'";
        return $this->db->query($query);
    }

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */