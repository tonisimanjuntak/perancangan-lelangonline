<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

	public function simpan($data)
    {       
        return $this->db->insert('peserta_lelang', $data);
    }

    public function update($data, $idpesertalelang)
    {
        $this->db->where('idpesertalelang', $idpesertalelang);
        return $this->db->update('peserta_lelang', $data);
    }

}

/* End of file Account_model.php */
/* Location: ./application/models/Account_model.php */