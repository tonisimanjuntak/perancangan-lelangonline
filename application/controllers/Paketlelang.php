<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paketlelang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Paketlelang_model');
	}

	public function index()
	{
		redirect('paketlelang/tampil');
	}

	public function tampil()
	{
		$data['menu'] = 'paketlelang';
		$this->load->view('paketlelang/tampil', $data);
	}

	public function detail($idpaket)
	{
		$idpaket = $this->encrypt->decode($idpaket);
		$rowpaket = $this->db->query("select * from v_paket_jadwal where idpaket='".$idpaket."'")->row();
		$rspaketdetail = $this->db->query("select * from v_paket_detail where idpaket='".$idpaket."'");


        $tglsekarang = date('Y-m-d H:i');
        $tgljammulai = date('Y-m-d H:i', strtotime($rowpaket->tgljammulai));
        $tgljamselesai = date('Y-m-d H:i', strtotime($rowpaket->tgljamselesai));
        $sedangberlangsung = false;
        if ($tglsekarang >= $tgljammulai && $tglsekarang <= $tgljamselesai) {
            $sedangberlangsung = true;
        }

		$data['menu'] = 'paketlelang';
		$data['rowpaket'] = $rowpaket;
        $data['rspaketdetail'] = $rspaketdetail;
		$data['sedangberlangsung'] = $sedangberlangsung;
		$this->load->view('paketlelang/detail', $data);
	}


	public function simpan()
    {       
        $idpaket             = $this->input->post('idpaket');
        $itemdetail       = $_REQUEST['itemdetail'];
        $tglinsert              = date('Y-m-d H:i:s');
        $idpesertalelang         = $this->session->userdata('idpesertalelang');

        $idbid = $this->db->query("SELECT create_idbid('".date('Y-m-d')."') as idbid")->row()->idbid;

        

        

        //-------------------------------- >> simpan dari datatable 
        $i=0;
        $arraydetail=array();       
        $totalhargabid = 0;
        foreach ($itemdetail as $item) {
            $iditem                 = $item[0];
            $hargadasar             = untitik($item[1]);
            $hargabid             = untitik($item[2]);
            $i++;

            $detail = array(
                            'idbid'     => $idbid,
                            'iditem'            => $iditem,
                            'hargadasar' => $hargadasar,
                            'hargabid' => $hargabid,
                            );
            $totalhargabid += $hargabid;
            array_push($arraydetail, $detail);              
        }


        $data = array(
                        'idbid'        => $idbid, 
                        'tglbid'        => $tglinsert, 
                        'idpaket'        => $idpaket, 
                        'idpesertalelang'        => $idpesertalelang, 
                        'totalhargabid'        => $totalhargabid, 
                        'statusbid'        => 'Menunggu', 
                        'tglinsert'        => $tglinsert, 
                        'tglupdate'        => $tglinsert, 
                    );
        // echo json_encode($arraydetail);
        // exit();

        $simpan = $this->Paketlelang_model->simpanbid($data, $arraydetail, $idpaket, $idpesertalelang);      

            
        if (!$simpan) {
            echo json_encode(array('msg'=>'Data gagal disimpan'));
            exit();
        }else{
            echo json_encode(array('success' => true));
            
        }
    }


    public function cekbid()
    {
    	$idpaket = $this->input->get('idpaket');
        $idpesertalelang = $this->session->userdata('idpesertalelang');
    	$rscek= $this->db->query("select * from v_bid where idpaket='".$idpaket."' and idpesertalelang='".$idpesertalelang."'");
    	if ($rscek->num_rows()>0) {
    		echo json_encode( array('sudahada' => true));
    	}else{
    		echo json_encode( array('sudahada' => false));
    	}
    }

}

/* End of file Paketlelang.php */
/* Location: ./application/controllers/Paketlelang.php */