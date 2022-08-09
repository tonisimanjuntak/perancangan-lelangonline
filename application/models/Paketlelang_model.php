<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paketlelang_model extends CI_Model {

	
	public function simpanbid($data, $arraydetail, $idpaket, $idpesertalelang)
	{
        $this->db->trans_begin();

        $this->db->query("delete from bid_detail where idbid in 
        		(select idbid from bid where idpaket='".$idpaket."' and idpesertalelang='".$idpesertalelang."')
        		");
        $this->db->query("delete from bid where idpaket='".$idpaket."' and idpesertalelang='".$idpesertalelang."'");

        $this->db->insert('bid', $data);
        $this->db->insert_batch('bid_detail', $arraydetail);

		if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
        }else{
                $this->db->trans_commit();
                return true;
        }

	}

}

/* End of file Paketlelang_model.php */
/* Location: ./application/models/Paketlelang_model.php */