<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paketlelang extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
    }

    public function index()
    {
        $data['menu'] = 'paketlelang';
        $this->load->view('paketlelang/list', $data);
    }   

    public function tambah()
    {       
        $data['idpaket'] = '';        
        $data['menu'] = 'paketlelang';  
        $this->load->view('paketlelang/form', $data);
    }

    public function edit($idpaket)
    {               
        $data['idpaket'] =$idpaket;        
        $data['menu'] = 'paketlelang';
        $this->load->view('paketlelang/form', $data);
    }

    public function cetak($idpaket)
    {
        error_reporting(0);
        $this->load->library('Pdf');
        $data['idpaket'] =$idpaket; 
        $this->load->view('paketlelang/cetak',$data);
    }

    public function datatablesourcedetail()
    {
        // query ini untuk item yang dimunculkan sesuai dengan kategori yang dipilih        

        $idpaket = $this->input->post('idpaket');
        $query = "select * from v_paket_detail
                        WHERE v_paket_detail.idpaket='".$idpaket."'";
        $RsData = $this->db->query($query);

        $no = 0;
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {               
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->iditem;
                $row[] = $rowdata->tipe.'<br>'.$rowdata->merk;
                $row[] = $rowdata->warna.'<br>'.$rowdata->thnpembuatan;
                $row[] = $rowdata->nomesin.'<br>'.$rowdata->norangka.'<br>'.$rowdata->nopolisi;
                $row[] = format_rupiah($rowdata->harga);
                $row[] = '<span class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></span>';
                $data[] = $row;
            }
        }

        $output = array(
                        "data" => $data,
                        );

        //output to json format
        echo json_encode($output);
    }


    public function delete($idpaket)
    {
        $pesan = '<script>swal("Berhasil!", "Data berhasil dihapus!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('paketlelang');        
    }

    public function simpan()
    {    
        $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('paketlelang');
    }

}

/* End of file Paketlelang.php */
/* Location: ./application/controllers/Paketlelang.php */