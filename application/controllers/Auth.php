<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		if ($this->session->userdata('nik'))
		{
			redirect('karyawan');
		}
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false){
		$data['title'] = 'Login';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer');	
		}else{
			$this->_login();
		}
	}
	private function _login()
	{
		$nik = $this->input->post('nik');
		$password = $this->input->post('password');
		$akun = $this->db->get_where('akun', ['nik' => $nik])->row_array();
		if ($akun){

			if($akun['aktive'] == 1) {
				if (password_verify($password, $akun['password'])) {
					$data = [
						'nik' => $akun['nik'],
						'id_level' => $akun['id_level']
					];
						$this->session->set_userdata($data);
						if ($akun['id_level'] == 1){
							redirect('admin');
						}else{
							redirect('karyawan');
						}
						
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">NIK belum diaktivasi</div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">NIK belum terdaftar</div>');
			redirect('auth');
		}
	}
	public function registrasi()
	{
		if ($this->session->userdata('nik'))
		{
			redirect('karyawan');
		}
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('nik','NIK','required|trim|is_unique[akun.nik]', ['is_unique' => 'NIK sudah terdaftar']);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[8]|matches[password2]',['matches' => 'Password tidak sama','min_length' => 'Password minimal 8 karakter']);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

		if( $this->form_validation->run() == false) {
		$data['title'] = 'Registrasi';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/registrasi');
		$this->load->view('templates/auth_footer');
	}else{
		$data = [
			'nama' => htmlspecialchars($this->input->post('name', true)),
			'nik' => htmlspecialchars($this->input->post('nik', true)),
			'image' => 'default.jpg',
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'id_level' => 2,
			'aktive' => 1, 
			'tanggal_buat' => time()];
		$this->db->insert('akun', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Registrasi berhasil, silahkan Login !</div>');
		redirect('auth');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('nik');
		$this->session->unset_userdata('id_level');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda telah Logout</div>');
		redirect('auth');
	}
	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
