<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
		public function __construct()
	{
		parent::__construct();
		ceklogin();
		$this->load->model('menu_model');
	}
	public function index()
	{
		$data['title'] = 'Beranda';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('karyawan/index', $data);
		$this->load->view('templates/footer');
	}
	public function akunsaya()
	{
		$data['title'] = 'Akun Saya';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('karyawan/akunsaya', $data);
		$this->load->view('templates/footer');
	}
	public function editprofil()
	{
		$data['title'] = 'Edit Profil';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$this->form_validation->set_rules('nama', 'Nama lengkap', 'required|trim');

		if($this->form_validation->run() == false)
		{
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('karyawan/editprofil', $data);
		$this->load->view('templates/footer');
		}else{
			$nama = $this->input->post('nama');
			$nik = $this->input->post('nik');

			$upload_image = $_FILES['image']['name'];
			if ($upload_image)
			{
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '5120';
				$config['upload_path'] = './assets/img/profile';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image'))
				{
					$old_image = $data['akun']['image'];
					if ($old_image != 'default.jpg')
					{
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);

				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
					redirect('karyawan');
				}
			}

			$this->db->set('nama', $nama);
			$this->db->where('nik', $nik);
			$this->db->update('akun');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profil berhasil diubah</div>');
		redirect('karyawan');
		}	
	}
	public function gantipassword()
	{
		$data['title'] = 'Ganti Password';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();

		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[8]|matches[password_baru2]');
		$this->form_validation->set_rules('password_baru2', 'Konfirmasi Password', 'required|trim|min_length[8]|matches[password_baru1]');

		if ($this->form_validation->run() == false)
		{
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('karyawan/gantipassword', $data);
		$this->load->view('templates/footer');
		}else{
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru1');
			if (!password_verify($password_lama, $data['akun']['password']))
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Lama Salah</div>');
				redirect('karyawan/gantipassword');
			}else{
				if ($password_lama == $password_baru)
				{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan Password lama</div>');
					redirect('karyawan/gantipassword');
				}else{
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('nik', $this->session->userdata('nik'));
					$this->db->update('akun');
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password Berhasil Diubah</div>');
					redirect('karyawan/gantipassword');
				}
			}
		}
	}
	public function dataabsensi()
	{
		$data['title'] = 'Data Absensi';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['absensi'] = $this->db->get_where('absensi', ['nik' => $this->session->userdata('nik')])->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('karyawan/dataabsensi', $data);
		$this->load->view('templates/footer');
	}
	public function biodata()
	{
		$data['title'] = 'Biodata';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['karyawan'] = $this->db->get_where('karyawan', ['nik' => $this->session->userdata('nik')])->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('karyawan/biodata', $data);
		$this->load->view('templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Ubah Absen';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['yangdicari'] = $this->input->post("yangdicari");
		$data['yangdicari2'] = $this->input->post("yangdicari2");
		$data['absensi'] = $this->menu_model->cari2($data['yangdicari'], $data['yangdicari2'])->result();
		$data['jumlah'] = count($data['absensi']);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/lihatabsen', $data);
		$this->load->view('templates/footer');;
	}
}
