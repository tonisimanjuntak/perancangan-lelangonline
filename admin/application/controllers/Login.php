<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();      
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

        $foto = base_url('images/user-icon.png');

        if (empty($username) || empty($password)) {            
            $pesan = '<script>swal("Gagal!", "Username atau password tidak boleh kosong.", "info")</script>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('Login');
        }else{

            if (strtoupper($username)=='ADMIN') {
                $data = array(
                    'idpengguna' => '001',
                    'namapengguna' => 'Admin',
                    'jeniskelamin' => 'Laki-laki',
                    'alamat' => '-',
                    'email' => '-',
                    'notelp' => '-',
                    'username' => $username,
                    'level' => 'Admin',
                    'statusaktif' => 'Aktif',
                    'foto' => $foto,
                );
                                
                $this->session->set_userdata( $data );  
                redirect( site_url() );
            }

            if (strtoupper($username)=='PIMPINAN') {

                $data = array(
                    'idpengguna' => '002',
                    'namapengguna' => 'Admin',
                    'jeniskelamin' => 'Laki-laki',
                    'alamat' => '-',
                    'email' => '-',
                    'notelp' => '-',
                    'username' => $username,
                    'level' => 'Admin',
                    'statusaktif' => 'Aktif',
                    'foto' => $foto,
                );
                                
                $this->session->set_userdata( $data );  
                redirect( site_url() );
            }
            

            // $pesan = '<script>swal("Gagal!", "Kombinasi username dan password anda salah!", "error")</script>';
            // $this->session->set_flashdata('pesan', $pesan);
            // redirect('Login');

        }
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */