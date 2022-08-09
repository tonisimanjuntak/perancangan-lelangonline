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
        $namausaha = $this->input->post('namausaha');
        $nibusaha = $this->input->post('nibusaha');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $ulangipassword = $this->input->post('ulangipassword');
        $tglinsert = date('Y-m-d H:i:s');

        if ($password <> $ulangipassword) {
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Ulangi password tidak sama.", "error")</script>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('registrasi');   
        }

        $cekuser = $this->db->query("select * from peserta_lelang where username ='".$username."'");
        if ($cekuser->num_rows()>0) {
            $pesan = '<script>swal("Gagal!", "Username '.$username.' sudah ada! Gunakan username yang lain.", "error")</script>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('registrasi');      
        }

        $idpesertalelang = $this->db->query("SELECT create_idpesertalelang('".date('Y-m-d')."') as idpesertalelang")->row()->idpesertalelang;

        $data = array(
                            'idpesertalelang'        => $idpesertalelang, 
                            'namausaha'        => $namausaha, 
                            'nibusaha'        => $nibusaha, 
                            'tgldaftar'        => $tglinsert, 
                            'statusaktif'        => 'Aktif', 
                            'username'          => $username, 
                            'password'          => md5($password), 
                        );
        $simpan = $this->Login_model->simpanregistrasi($data); 

        if ($simpan) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success")</script>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Pesan : "'.$eror['code'].' '.$eror['message'].', "error")</script>';
        }

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
            $kirim = $this->Login_model->ceklogin($username, md5($password));
            if ($kirim->num_rows() > 0) {
                $result = $kirim->row();

                if (!empty($result->foto)) {
                    $foto = base_url('admin/uploads/pesertalelang/'.$result->foto);
                }else{
                    $foto = base_url('images/users.png');
                }

                
                $data = array(
                    'idpesertalelang' => $result->idpesertalelang,
                    'namausaha' => $result->namausaha,
                    'nibusaha' => $result->nibusaha,
                    'emailusaha' => $result->emailusaha,
                    'notelpusaha' => $result->notelpusaha,
                    'nikpemilik' => $result->nikpemilik,
                    'namapemilik' => $result->namapemilik,
                    'jeniskelaminpemilik' => $result->jeniskelaminpemilik,
                    'alamatpemilik' => $result->alamatpemilik,
                    'emailpemilik' => $result->emailpemilik,
                    'notelppemilik' => $result->notelppemilik,
                    'username' => $result->username,
                    'foto' => $foto,
                );
                                
                $this->session->set_userdata( $data );  
                redirect( site_url() );
            }else{
                $pesan = '<script>swal("Gagal!", "Kombinasi username dan password anda salah!", "error")</script>';
	            $this->session->set_flashdata('pesan', $pesan);
	            redirect( site_url() );
            }

        }
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */