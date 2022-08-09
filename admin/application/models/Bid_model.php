<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bid_model extends CI_Model {

	var $tabelview = 'v_bid';
    var $tabel     = 'bid';
    var $idbid = 'idbid';

    var $column_order = array(null, 'namapaket','tglbid', 'namausaha', 'namapemilik', 'totalhargadasarpaket', 'totalhargabid', 'statusbid', null );
    var $column_search = array('namapaket','tglbid', 'namausaha', 'namapemilik', 'nibusaha', 'nikpemilik', 'statusbid');
    var $order = array('idbid' => 'desc'); // default order 


    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        return $this->db->get();        
    }

    private function _get_datatables_query()
    {   
        $this->db->from($this->tabelview);
        $i = 0;
        foreach ($this->column_search as $item) 
        {
            if($_POST['search']['value']) 
            {
                if($i===0) {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }else{
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); 
            }
            $i++;
        }
        
        // -------------------------> Proses Order by        
        if(isset($_POST['order'])){
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

    }

    function count_filtered()
    {
        $this->db->select('count(*) as jlh');
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->row()->jlh;
    }
 
    public function count_all()
    {
        $this->db->select('count(*) as jlh');
        return $this->db->get($this->tabelview)->row()->jlh;
    }

    public function get_all()
    {
        return $this->db->get($this->tabelview);
    }

    public function get_by_id($idbid)
    {
        $this->db->where('idbid', $idbid);
        return $this->db->get($this->tabelview);
    }

    public function hapus($rowbid, $idbid)
    {
        $this->db->trans_begin();
    	if ($rowbid->statusbid=='Menang') {
		    	$this->db->query("update paket_jadwal set idbidpemenang= NULL where idpaket='".$rowbid->idpaket."'");        	
	    	}

	    $this->db->query("delete from bid_detail where idbid='".$idbid."'");
        $this->db->where('idbid', $idbid);      
        $this->db->delete($this->tabel);

        if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
        }else{
                $this->db->trans_commit();
                return true;
        }
    }

    public function simpan($statusbid, $idbid, $rowbid)
    {       
        $this->db->trans_begin();
        if ($statusbid=='Menang') {
	    	$this->db->query("update bid set statusbid='Menang' where idbid='".$idbid."'");
	    	$this->db->query("update bid set statusbid='Kalah' where idpaket='".$rowbid->idpaket."' and idbid!='".$idbid."'");        	
	    	$this->db->query("update paket_jadwal set idbidpemenang='".$idbid."' where idpaket='".$rowbid->idpaket."'");        	
        }else{        	
	    	$this->db->query("update bid set statusbid='".$statusbid."' where idbid='".$idbid."'");
	    	if ($rowbid->statusbid=='Menang') {
		    	$this->db->query("update paket_jadwal set idbidpemenang= NULL where idpaket='".$rowbid->idpaket."'");        	
	    	}
        }

    	if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
        }else{
                $this->db->trans_commit();
                return true;
        }        
    }


}

/* End of file Bid_model.php */
/* Location: ./application/models/Bid_model.php */