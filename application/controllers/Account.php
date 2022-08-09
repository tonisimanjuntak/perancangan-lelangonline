<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->isLogin();
		$this->load->model('Account_model');
        $this->load->library('image_lib');
	}

	public function index()
	{
		
	}

	public function riwayatbid()
	{
		$data['menu'] = 'account';
		$this->load->view('account/riwayatbid', $data);
	}


	public function datasaya()
	{
		$idpesertalelang = $this->session->userdata('idpesertalelang');
		$rowpeserta = $this->db->query("select * from peserta_lelang where idpesertalelang='".$idpesertalelang."'")->row();

		if (!empty($rowpeserta->foto)) {
			$foto = base_url('admin/uploads/pesertalelang/'.$rowpeserta->foto);
		}else{
			$foto = base_url('images/noimage.jpg');
		}

		$data['idpesertalelang'] = $idpesertalelang;
		$data['rowpeserta'] = $rowpeserta;
		$data['foto'] = $foto;
		$data['menu'] = 'account';
		$this->load->view('account/datasaya', $data);
	}


	public function gantipassword()
	{
		$idpesertalelang = $this->session->userdata('idpesertalelang');
		$rowpeserta = $this->db->query("select * from peserta_lelang where idpesertalelang='".$idpesertalelang."'")->row();

		if (!empty($rowpeserta->foto)) {
			$foto = base_url('admin/uploads/pesertalelang/'.$rowpeserta->foto);
		}else{
			$foto = base_url('images/noimage.jpg');
		}

		$data['idpesertalelang'] = $idpesertalelang;
		$data['rowpeserta'] = $rowpeserta;
		$data['foto'] = $foto;
		$data['menu'] = 'account';
		$this->load->view('account/gantipassword', $data);
	}


	public function simpan()
    {       
        $idpesertalelang             = $this->input->post('idpesertalelang');
        $namausaha           = $this->input->post('namausaha');
        $nibusaha           = $this->input->post('nibusaha');
        $emailusaha           = $this->input->post('emailusaha');
        $notelpusaha           = $this->input->post('notelpusaha');
        $namapemilik           = $this->input->post('namapemilik');
        $nikpemilik           = $this->input->post('nikpemilik');
        $jeniskelaminpemilik           = $this->input->post('jeniskelaminpemilik');
        $emailpemilik           = $this->input->post('emailpemilik');
        $notelppemilik           = $this->input->post('notelppemilik');
        $alamatpemilik           = $this->input->post('alamatpemilik');

        $tglinsert              = date('Y-m-d H:i:s');

        $file_lama = $this->input->post('file_lama');
        $foto = $this->update_upload_foto($_FILES, "file", $file_lama);

        $data = array(
                        'namausaha'      => $namausaha,
                        'nibusaha'      => $nibusaha,
                        'emailusaha'      => $emailusaha,
                        'notelpusaha'      => $notelpusaha,
                        'namapemilik'      => $namapemilik,
                        'nikpemilik'      => $nikpemilik,
                        'jeniskelaminpemilik'      => $jeniskelaminpemilik,
                        'emailpemilik'      => $emailpemilik,
                        'notelppemilik'      => $notelppemilik,
                        'alamatpemilik'      => $alamatpemilik,
                        'foto'      => $foto,
                    );
       	// var_dump($data);
       	// echo $idpesertalelang;
       	// exit();
        $simpan = $this->Account_model->update($data, $idpesertalelang);

        if ($simpan) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Pesan : "'.$eror['code'].' '.$eror['message'].', "error")</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('account/datasaya');   
    }


    public function simpanpassword()
    {       
        $idpesertalelang             = $this->input->post('idpesertalelang');
        $username           = $this->input->post('username');
        $passwordlama           = $this->input->post('passwordlama');
        $passwordbaru1           = $this->input->post('passwordbaru1');
        $passwordbaru2           = $this->input->post('passwordbaru2');
        

        if ( empty($passwordlama) || empty($passwordbaru1) || empty($passwordbaru2) ) {
        	$pesan = '<script>swal("Gagal!", "Password tidak boleh kosong!", "error")</script>';
        	$this->session->set_flashdata('pesan', $pesan);
        	redirect('account/gantipassword'); 
        }

        $cek = $this->db->query("select * from peserta_lelang where idpesertalelang='".$idpesertalelang."' and password='".md5($passwordlama)."'");
        if ($cek->num_rows()==0) {
        	$pesan = '<script>swal("Gagal!", "Password lama anda salah!", "error")</script>';
        	$this->session->set_flashdata('pesan', $pesan);
        	redirect('account/gantipassword'); 
        }

        if ($passwordbaru1<>$passwordbaru2) {
        	$pesan = '<script>swal("Gagal!", "Ulangi password baru tidak sama!", "error")</script>';
        	$this->session->set_flashdata('pesan', $pesan);
        	redirect('account/gantipassword'); 
        }


        $file_lama = $this->input->post('file_lama');
        $foto = $this->update_upload_foto($_FILES, "file", $file_lama);

        $data = array(
                        'username'      => $username,
                        'password'      => md5($passwordbaru1),                        
                        'foto'      => $foto,
                    );
        $simpan = $this->Account_model->update($data, $idpesertalelang);

        if ($simpan) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Pesan : "'.$eror['code'].' '.$eror['message'].', "error")</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('account/gantipassword');   
    }


    public function upload_foto($file, $nama)
    {

        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = 'admin/uploads/pesertalelang/';
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
            $config['upload_path']          = 'admin/uploads/pesertalelang/';
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

}

/* End of file Account.php */
/* Location: ./application/controllers/Account.php */