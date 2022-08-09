<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

        public function get_by_id($idpembayaran)
        {
                $this->db->where('idpembayaran', $idpembayaran);
                return $this->db->get('v_pembayaran');
        }

	public function simpan($data, $idbid)
	{
        $this->db->trans_begin();

        $this->db->query("delete from pembayaran where idbid='".$idbid."'");
		$this->db->insert('pembayaran', $data);

		if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
        }else{
                $this->db->trans_commit();
                return true;
        }

	}

	public function update($data, $idpembayaran)
	{
        $this->db->trans_begin();

        $this->db->where("idpembayaran", $idpembayaran);
		$this->db->update('pembayaran', $data);

		if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
        }else{
                $this->db->trans_commit();
                return true;
        }

	}

}

/* End of file Pembayaran_model.php */
/* Location: ./application/models/Pembayaran_model.php */