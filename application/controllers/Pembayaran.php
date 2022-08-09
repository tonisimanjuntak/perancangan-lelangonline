<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->isLogin();
		$this->load->model('Pembayaran_model');
        $this->load->library('image_lib');
	}

	public function index()
	{
		
	}

	public function bayar($idpaket)
	{
		$idpaket = $this->encrypt->decode($idpaket);
		$rowpaket = $this->db->query("select * from v_paket_jadwal where idpaket='".$idpaket."'")->row();
		$rspaketdetail = $this->db->query("select * from v_paket_detail where idpaket='".$idpaket."'");

		$data['menu'] = 'pembayaran';
		$data['rowpaket'] = $rowpaket;
        $data['rspaketdetail'] = $rspaketdetail;
		$this->load->view('pembayaran/bayar', $data);

	}

	public function upload($idpembayaran)
	{
		$idpembayaran = $this->encrypt->decode($idpembayaran);
		$rowpembayaran = $this->db->query("select * from v_pembayaran where idpembayaran='".$idpembayaran."'")->row();		
		$idpaket = $rowpembayaran->idpaket;
		$rowpaket = $this->db->query("select * from v_paket_jadwal where idpaket='".$idpaket."'")->row();

		$fotopembayaran = '';

		if (!empty($rowpembayaran->fotopembayaran)) {
			$fotopembayaran = base_url('admin/uploads/pembayaran/'.$rowpembayaran->fotopembayaran);
		}else{
			$fotopembayaran = base_url('images/noimage.jpg');
		}

		$data['menu'] = 'pembayaran';
        $data['idpembayaran'] = $idpembayaran;
        $data['idpaket'] = $idpaket;
        $data['fotopembayaran'] = $fotopembayaran;
        $data['rowpembayaran'] = $rowpembayaran;
        $data['rowpaket'] = $rowpaket;
		$this->load->view('pembayaran/upload', $data);

	}

	public function riwayat()
	{
        $idpesertalelang = $this->session->userdata('idpesertalelang');
		$rspembayaran = $this->db->query("select * from v_pembayaran where idpesertalelang = '".$idpesertalelang."' order by tglpembayaran desc");		
		$data['menu'] = 'pembayaran';
        $data['rspembayaran'] = $rspembayaran;
		$this->load->view('pembayaran/riwayat', $data);

	}

	public function simpan()
	{
		$idpaket = $this->input->post('idpaket');
		$idbank = $this->input->post('idbank');
		$idbid = $this->input->post('idbid');
		$namabankpengirim = $this->input->post('namabankpengirim');
		$norekpengirim = $this->input->post('norekpengirim');
		$nominalbayar = $this->input->post('nominalbayar');
		$statuspembayaran = 'Menunggu Konfirmasi';
        $tglinsert = date('Y-m-d H:i:s');
        $tglupdate = date('Y-m-d H:i:s');

        $idpembayaran = $this->db->query("SELECT create_idpembayaran('".date('Y-m-d')."') as idpembayaran")->row()->idpembayaran;
        $tglpembayaran = date('Y-m-d H:i:s');
        
        $data = array(
                        'idpembayaran'        => $idpembayaran, 
                        'tglpembayaran'        => $tglpembayaran, 
                        'idbid'        => $idbid, 
                        'namabankpengirim'        => $namabankpengirim, 
                        'norekpengirim'        => $norekpengirim, 
                        'nominalbayar'        => $nominalbayar, 
                        'statuspembayaran'        => $statuspembayaran, 
                        'tglinsert'        => $tglinsert, 
                        'tglupdate'        => $tglupdate, 
                        'idbank'        => $idbank, 
                    );
        $simpan = $this->Pembayaran_model->simpan($data, $idbid);     

        if ($simpan) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
	        $this->session->set_flashdata('pesan', $pesan);
	        redirect('pembayaran/riwayat');   
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Pesan : "'.$eror['code'].' '.$eror['message'].', "error")</script>';
            $this->session->set_flashdata('pesan', $pesan);
	        redirect('account/riwayatbid'); 
        }

	}

	public function simpanupload()
	{
		$idpembayaran = $this->input->post('idpembayaran');

		$file_lama = $this->input->post('file_lama');
        $foto = $this->update_upload_foto($_FILES, "file", $file_lama);

        $data = array(
        				'fotopembayaran' => $foto, 
        			);
        $simpan = $this->Pembayaran_model->update($data, $idpembayaran);  
        if ($simpan) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
	        $this->session->set_flashdata('pesan', $pesan);
	        redirect('pembayaran/riwayat');   
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Pesan : "'.$eror['code'].' '.$eror['message'].', "error")</script>';
            $this->session->set_flashdata('pesan', $pesan);
	        redirect('pembayaran/upload/'.$this->encrypt->encode($idpembayaran)); 
        }   
	}


	public function upload_foto($file, $nama)
    {

        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = 'admin/uploads/pembayaran/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['remove_space']         = TRUE;
            $config['max_size']             = '2000KB';

            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload($nama)) {
                $foto = $this->upload->data('file_name');
                $size = $this->upload->data('file_size');
                $ext  = $this->upload->data('file_ext'); 
             }else{
                 $foto = "";
             }

        }else{
            $foto = "";
        }
        return $foto;
    }

    public function update_upload_foto($file, $nama, $file_lama)
    {
        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = 'admin/uploads/pembayaran/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['remove_space']         = TRUE;
            $config['max_size']            = '2000KB';
            

            $this->load->library('upload', $config);           
            if ($this->upload->do_upload($nama)) {
                $foto = $this->upload->data('file_name');
                $size = $this->upload->data('file_size');
                $ext  = $this->upload->data('file_ext'); 
            }else{
                $foto = $file_lama;
            }          
        }else{          
            $foto = $file_lama;
        }

        return $foto;
    }


    public function cetakbukti($idpembayaran)
    {
        $idpembayaran = $this->encrypt->decode($idpembayaran);
        $rspembayaran = $this->Pembayaran_model->get_by_id($idpembayaran);
        if ($rspembayaran->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('pembayaran');
            exit();
        };
        
        error_reporting(0);
        $this->load->library('Pdf');
        $data['idpembayaran'] =$idpembayaran; 
        $data['rowpembayaran'] =$rspembayaran->row(); 
        $data['rspembayarandetail'] = $this->db->query("select * from v_pembayaran_detail where idpembayaran='".$idpembayaran."' order by merk, tipe");        
        $this->load->view('pembayaran/cetakbukti',$data);
    }


}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */