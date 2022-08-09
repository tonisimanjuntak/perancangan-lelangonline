<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bid extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
        $this->load->model('Bid_model');
        $this->load->library('image_lib');

    }

    public function index()
    {
        $data['menu'] = 'bid';
        $this->load->view('bid/list', $data);
    }   


    public function lihat($idbid)
    {       
        $idbid = $this->encrypt->decode($idbid);
        $rsbid = $this->Bid_model->get_by_id($idbid);
        if ($rsbid->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('bid');
            exit();
        };

        $rsbiddetail = $this->db->query("select * from v_bid_detail where idbid='".$idbid."' order by merk, tipe");
        $data['rowbid'] =$rsbid->row();        
        $data['rsbiddetail'] =$rsbiddetail;        
        $data['idbid'] =$idbid;        
        $data['menu'] = 'bid';
        $this->load->view('bid/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Bid_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                if (!empty($rowdata->foto) ) {
                    $foto = '<img src="'.base_url('uploads/pesertalelang/'.$rowdata->foto).'" alt="" style="width: 60%;">' ;
                }else{
                    $foto = '<img src="'.base_url('images/users.png').'" alt="" style="width: 60%;">' ;
                }

                if ($rowdata->statusbid=='Menang') {
                	$statusbid = '<span class="badge badge-success">'.$rowdata->statusbid.'</span>';
                }elseif ($rowdata->statusbid=='Kalah') {
                	$statusbid = '<span class="badge badge-danger">'.$rowdata->statusbid.'</span>';
                }else{
                	$statusbid = '<span class="badge badge-default">'.$rowdata->statusbid.'</span>';
                }
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->namapaket;
                $row[] = date('Y-m-d H:i:s', strtotime($rowdata->tglbid));
                $row[] = $rowdata->namausaha.'<br>'.$rowdata->nibusaha;
                $row[] = $rowdata->namapemilik.'<br>'.$rowdata->nikpemilik;
                $row[] = format_rupiah($rowdata->totalhargadasarpaket);
                $row[] = format_rupiah($rowdata->totalhargabid);
                $row[] = $statusbid;
                $row[] = '

                			<div class="btn-group">
                              <a href="'.site_url( 'bid/lihat/'.$this->encrypt->encode($rowdata->idbid) ).'" class="btn btn-sm btn-info btn-circle"><i class="fa fa-search"></i> Lihat</a>
                              <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="'.site_url('bid/delete/'.$this->encrypt->encode($rowdata->idbid) ).'" id="hapus">Hapus</a>
                              </div>
                            </div>

                
                ';

                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Bid_model->count_all(),
                        "recordsFiltered" => $this->Bid_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idbid)
    {
        $idbid = $this->encrypt->decode($idbid);  
        $rsdata = $this->Bid_model->get_by_id($idbid);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('bid');
            exit();
        };

        $hapus = $this->Bid_model->hapus($rsdata->row(), $idbid);

        if ($hapus) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil dihapus!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal dihapus karena sudah digunakan!", "error")</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('bid');        

    }


    public function simpan()
    {       
        $idbid             		= $this->input->post('idbid');
        $statusbid          = $this->input->post('statusbid');
        $simpan = true;

        $rowbid = $this->Bid_model->get_by_id($idbid)->row();
        
        $simpan = $this->Bid_model->simpan($statusbid, $idbid, $rowbid); 
        

        if ($simpan) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Pesan : "'.$eror['code'].' '.$eror['message'].', "error")</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('bid');   
    }
    
    public function get_edit_data()
    {
        $idbid = $this->input->post('idbid');
        $RsData = $this->Bid_model->get_by_id($idbid)->row();

        $data = array( 
                            'idbid'     =>  $RsData->idbid,  
                            'namapengguna'     =>  $RsData->namapengguna,  
                            'jeniskelamin'     =>  $RsData->jeniskelamin,  
                            'alamat'     =>  $RsData->alamat,  
                            'email'     =>  $RsData->email,  
                            'notelp'     =>  $RsData->notelp,  
                            'username'     =>  $RsData->username,  
                            'password'     =>  $RsData->password,  
                            'foto'     =>  $RsData->foto,  
                            'level'     =>  $RsData->level,  
                            'statusaktif'     =>  $RsData->statusaktif,  
                        );

        echo(json_encode($data));
    }


}

/* End of file Bid.php */
/* Location: ./application/controllers/Bid.php */