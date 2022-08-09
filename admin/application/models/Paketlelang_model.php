<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paketlelang_model extends CI_Model {

	var $tabelview = 'v_paket_jadwal';
    var $tabel     = 'paket_jadwal';
    var $idpaket = 'idpaket';

    var $column_order = array(null, null,'namapaket', 'tgljammulai', 'jumlahitem', 'totalhargadasarpaket', 'statuspaket', null );
    var $column_search = array('namapaket', 'tgljammulai', 'jumlahitem', 'totalhargadasarpaket', 'statuspaket', 'tgljamselesai');
    var $order = array('idpaket' => 'desc'); // default order 


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

    public function get_by_id($idpaket)
    {
        $this->db->where('idpaket', $idpaket);
        return $this->db->get($this->tabelview);
    }

    public function hapus($idpaket)
    {
        $this->db->trans_begin();

        $this->db->query('delete from paket_detail where idpaket="'.$idpaket.'"');
        $this->db->where('idpaket', $idpaket);      
        $this->db->delete($this->tabel);

        if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
        }else{
                $this->db->trans_commit();
                return true;
        }
    }

    public function simpan($data, $arraydetail)
    {       
        $this->db->trans_begin();

        $this->db->insert('paket_jadwal', $data);
        $this->db->insert_batch('paket_detail', $arraydetail);

        if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
        }else{
                $this->db->trans_commit();
                return true;
        }
    }

    public function update($data, $arraydetail, $idpaket)
    {
        $this->db->trans_begin();
        $this->db->where('idpaket', $idpaket);
        $this->db->update('paket_jadwal', $data);

        $this->db->query('delete from paket_detail where idpaket="'.$idpaket.'"');
        $this->db->insert_batch('paket_detail', $arraydetail);

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