<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasipembayaran extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->isLogin();
        $this->load->model('Konfirmasipembayaran_model');
        $this->load->library('image_lib');

    }

    public function index()
    {
        $data['menu'] = 'konfirmasipembayaran';
        $this->load->view('konfirmasipembayaran/list', $data);
    }   


    public function lihat($idpembayaran)
    {       
        $idpembayaran = $this->encrypt->decode($idpembayaran);
        $rspembayaran = $this->Konfirmasipembayaran_model->get_by_id($idpembayaran);
        if ($rspembayaran->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('konfirmasipembayaran');
            exit();
        };
        $rowpembayaran = $rspembayaran->row();        
        $idpaket = $rowpembayaran->idpaket;
		$rowpaket = $this->db->query("select * from v_paket_jadwal where idpaket='".$idpaket."'")->row();


		if (!empty($rowpembayaran->fotopembayaran)) {
			$fotopembayaran = base_url('uploads/pembayaran/'.$rowpembayaran->fotopembayaran);
		}else{
			$fotopembayaran = base_url('images/noimage.jpg');
		}


        $data['rowpaket'] = $rowpaket;
        $data['fotopembayaran'] = $fotopembayaran;
        $data['idpaket'] = $idpaket;
        $data['rowpembayaran'] =$rowpembayaran;        
        $data['idpembayaran'] =$idpembayaran;        
        $data['menu'] = 'konfirmasipembayaran';
        $this->load->view('konfirmasipembayaran/form', $data);
    }


    public function datatablesource()
    {
        $RsData = $this->Konfirmasipembayaran_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                if (!empty($rowdata->foto) ) {
                    $foto = '<img src="'.base_url('uploads/pesertalelang/'.$rowdata->foto).'" alt="" style="width: 60%;">' ;
                }else{
                    $foto = '<img src="'.base_url('images/users.png').'" alt="" style="width: 60%;">' ;
                }

                if ($rowdata->statuspembayaran=='Sudah Diterima') {
                	$statuspembayaran = '<span class="badge bg-success">'.$rowdata->statuspembayaran.'</span>';
                }elseif ($rowdata->statuspembayaran=='Ditolak') {
                	$statuspembayaran = '<span class="badge bg-danger">'.$rowdata->statuspembayaran.'</span>';
                }else{
                	$statuspembayaran = '<span class="badge bg-warning">'.$rowdata->statuspembayaran.'</span>';
                }

                if (!empty($rowdata->fotopembayaran)) {
                	$statusupload ='<i class="fa fa-check text-success"></i>';
                }else{
                	$statusupload ='<i class="fa fa-times text-danger"></i>';
                }
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = tgljamindonesia($rowdata->tglpembayaran).'<br>'.$rowdata->idpembayaran;
                $row[] = $rowdata->namapaket;
                $row[] = $rowdata->namausaha.'<br>'.$rowdata->nibusaha;
                $row[] = format_rupiah($rowdata->totalhargadasarpaket);
                $row[] = format_rupiah($rowdata->nominalbayar);
                $row[] = $statusupload;
                $row[] = $statuspembayaran;

                $row[] = '
                            <a href="'.site_url( 'konfirmasipembayaran/lihat/'.$this->encrypt->encode($rowdata->idpembayaran) ).'" class="btn btn-sm btn-info btn-circle"><i class="fa fa-search"></i> Lihat</a>
                ';

                /*
                $row[] = '

                			<div class="btn-group">
                              <a href="'.site_url( 'konfirmasipembayaran/lihat/'.$this->encrypt->encode($rowdata->idpembayaran) ).'" class="btn btn-sm btn-info btn-circle"><i class="fa fa-search"></i> Lihat</a>
                              <button type="button" class="btn bg-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="'.site_url('konfirmasipembayaran/cetak/'.$this->encrypt->encode($rowdata->idpembayaran) ).'" target="_blank">Cetak</a>
                              </div>
                            </div>

                
                ';
                */
                
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Konfirmasipembayaran_model->count_all(),
                        "recordsFiltered" => $this->Konfirmasipembayaran_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }


    public function simpankonfirmasi()
    {       
        $idpembayaran             		= $this->input->post('idpembayaran');
        $idpaket             		= $this->input->post('idpaket');
        $statuspembayaran          = $this->input->post('statuspembayaran');
        $simpan = true;

        

        $rowpaket = $this->db->query("select * from v_paket_jadwal where idpaket='".$idpaket."'")->row();
        $simpan = $this->Konfirmasipembayaran_model->simpan($statuspembayaran, $idpembayaran, $rowpaket); 
        

        if ($simpan) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Pesan : "'.$eror['code'].' '.$eror['message'].', "error")</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('konfirmasipembayaran');   
    }
    

}

/* End of file Konfirmasipembayaran.php */
/* Location: ./application/controllers/Konfirmasipembayaran.php */