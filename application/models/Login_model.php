<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function ceklogin($username, $password)
    {
        $query = "select * from peserta_lelang where username='".$username."' and password='".$password."' and statusaktif='Aktif'";
        return $this->db->query($query);
    }

    public function simpanregistrasi($data)
    {
    	return $this->db->insert('peserta_lelang', $data);
    }

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */