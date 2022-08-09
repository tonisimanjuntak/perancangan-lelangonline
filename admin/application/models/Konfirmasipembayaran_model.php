<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasipembayaran_model extends CI_Model {

	var $tabelview = 'v_pembayaran';
    var $tabel     = 'pembayaran';
    var $idpembayaran = 'idpembayaran';

    var $column_order = array(null, 'namapaket','tglpembayaran', 'namapaket', 'namausaha', 'totalhargadasarpaket', 'nominalbayar', null, 'statuspembayaran', null );
    var $column_search = array('namapaket','tglpembayaran', 'namapaket', 'namausaha', 'nibusaha');
    var $order = array('idpembayaran' => 'desc'); // default order 


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

    public function get_by_id($idpembayaran)
    {
        $this->db->where('idpembayaran', $idpembayaran);
        return $this->db->get($this->tabelview);
    }


    public function simpan($statuspembayaran, $idpembayaran, $rowpaket)
    {       
        $this->db->trans_begin();
        if ($statuspembayaran=='Sudah Diterima') {
	    	$this->db->query("update pembayaran set statuspembayaran='".$statuspembayaran."' where idpembayaran='".$idpembayaran."'");
	    	$this->db->query("update paket_jadwal set statuspaket='Terjual' where idpaket='".$rowpaket->idpaket."'");        	
	    	$this->db->query("
	    						update item_lelang set statusitem='Terjual' where iditem in 
	    							(select iditem from paket_detail where idpaket = '".$rowpaket->idpaket."')
	    						");        	
        }else{        	
	    	$this->db->query("update pembayaran set statuspembayaran='".$statuspembayaran."' where idpembayaran='".$idpembayaran."'");
	    	$this->db->query("update paket_jadwal set statuspaket='Belum Terjual' where idpaket='".$rowpaket->idpaket."'");        	
	    	$this->db->query("
	    						update item_lelang set statusitem='Belum Terjual' where iditem in 
	    							(select iditem from paket_detail where idpaket = '".$rowpaket->idpaket."')
	    						");
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

/* End of file Konfirmasipembayaran_model.php */
/* Location: ./application/models/Konfirmasipembayaran_model.php */