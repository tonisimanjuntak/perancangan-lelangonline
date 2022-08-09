<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();      
        $this->load->model('Login_model'); 
    }

    public function keluar()
    {
        $this->session->sess_destroy(); 
        redirect('Login');
    }

    public function index()
    { 
        $idpengguna = $this->session->userdata('idpengguna');
        if (!empty($idpengguna)) {
            redirect( site_url() );
        }else{
            $this->load->view('login');     
        }

    }

    public function ceklogin()
    {
        $username = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));


        if (empty($username) || empty($password)) {            
            $pesan = '<script>swal("Gagal!", "Username atau password tidak boleh kosong.", "info")</script>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('Login');
        }else{
            $kirim = $this->Login_model->ceklogin($username, md5($password));
            if ($kirim->num_rows() > 0) {
                $result = $kirim->row();

                if (!empty($result->foto)) {
                    $foto = base_url('uploads/pengguna/'.$result->foto);
                }else{
                    $foto = base_url('images/users.png');
                }

                
                $data = array(
                    'idpengguna' => $result->idpengguna,
                    'namapengguna' => $result->namapengguna,
                    'jeniskelamin' => $result->jeniskelamin,
                    'alamat' => $result->alamat,
                    'email' => $result->email,
                    'notelp' => $result->notelp,
                    'username' => $result->username,
                    'level' => $result->level,
                    'statusaktif' => $result->statusaktif,
                    'foto' => $foto,
                );
                                
                $this->session->set_userdata( $data );  
                redirect( site_url() );
            }else{
                $pesan = '<script>swal("Gagal!", "Kombinasi username dan password anda salah!", "error")</script>';
	            $this->session->set_flashdata('pesan', $pesan);
	            redirect('Login');
            }

        }
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */