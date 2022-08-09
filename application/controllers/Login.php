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
        redirect( site_url() );
    }

    public function index()
    { 
        $idpesertalelang = $this->session->userdata('idpesertalelang');
        if (!empty($idpesertalelang)) {
            redirect( site_url() );
        }else{
            $this->load->view('login');     
        }

    }

    public function registrasi()
    { 
        if (!empty($idpesertalelang)) {
            redirect( site_url() );
        }else{
            $this->load->view('registrasi');     
        }
    }

    public function simpanregistrasi()
    {
        $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect( site_url() );   
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

            if (strtoupper($username)=='PESERTA') {
                $foto = base_url('admin/image/users.png');

                $data = array(
                    'idpesertalelang' => '11111',
                    'namausaha' => 'Sedawe Utama',
                    'nibusaha' => '458787',
                    'emailusaha' => 'sedawe@gmail.com',
                    'notelpusaha' => '05685454',
                    'nikpemilik' => '659898975454001',
                    'namapemilik' => 'Trihardoyo',
                    'jeniskelaminpemilik' => 'Laki-laki',
                    'alamatpemilik' => 'Jl. Perjuangan Raya',
                    'emailpemilik' => 'trihardoyo@gmail.com',
                    'notelppemilik' => '085645452211',
                    'username' => 'PESERTA',
                    'foto' => $foto,
                );
                                
                $this->session->set_userdata( $data );  
                redirect( site_url() );
            }else{
                
                $pesan = '<script>swal("Gagal!", "Kombinasi username dan password anda salah!", "error")</script>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect( site_url('login') );
            }
            

        }
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */