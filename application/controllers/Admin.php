<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		ceklogin();
		$this->load->model('menu_model');
		$this->load->library('Excel');
	}
	public function index()
	{
		$data['title'] 	= 'Dashboard';
		$data['akun'] 	= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}
	public function profil()
	{
		$data['title'] 	= 'Profil Saya';
		$data['akun'] 	= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/profil', $data);
		$this->load->view('templates/footer');
	}
	public function level()
	{
		$data['title'] 	= 'Level Akses';
		$data['akun'] 	= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['level'] 	= $this->db->get('level')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/level', $data);
		$this->load->view('templates/footer');
	}
	public function levelakses($id_level)
	{
		$data['title'] 	= 'Level Akses';
		$data['akun'] 	= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['level'] 	= $this->db->get_where('level', ['id_level' => $id_level])->row_array();
		$this->db->where('id_menu !=', 1);

		$data['menu'] 	= $this->db->get('menu')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/levelakses', $data);
		$this->load->view('templates/footer');
	}
	public function ubahakses()
	{
		$id_menu 	= $this->input->post('idmenu');
		$id_level 	= $this->input->post('idlevel');
		$data 		= ['id_level' => $id_level, 'id_menu' => $id_menu];
		$result 	= $this->db->get_where('menu_akses', $data);
		if ($result->num_rows() < 1) {
			$this->db->insert('menu_akses', $data);
		} else {
			$this->db->delete('menu_akses', $data);
		}
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Akses diubah</div>');
	}
	public function editprofil()
	{
		$data['title'] 	= 'Ganti Foto Profil';
		$data['akun'] 	= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$this->form_validation->set_rules('nama', 'Nama lengkap', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/gantifotoprofil', $data);
			$this->load->view('templates/footer');
		} else {
			$nama 	= $this->input->post('nama');
			$nik 	= $this->input->post('nik');

			$upload_image = $_FILES['image']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/img/profile';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$old_image = $data['akun']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);

				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('admin');
				}
			}

			$this->db->set('nama', $nama);
			$this->db->where('nik', $nik);
			$this->db->update('akun');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profil berhasil diubah</div>');
			redirect('admin');
		}
	}
	public function gantipassword()
	{
		$data['title'] 	= 'Ganti Password';
		$data['akun'] 	= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();

		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[8]|matches[password_baru2]');
		$this->form_validation->set_rules('password_baru2', 'Konfirmasi Password', 'required|trim|min_length[8]|matches[password_baru1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/gantipassword', $data);
			$this->load->view('templates/footer');
		} else {
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru1');
			if (!password_verify($password_lama, $data['akun']['password'])) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Lama Salah</div>');
				redirect('admin/gantipassword');
			} else {
				if ($password_lama == $password_baru) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan Password lama</div>');
					redirect('admin/gantipassword');
				} else {
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('nik', $this->session->userdata('nik'));
					$this->db->update('akun');
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password Berhasil Diubah</div>');
					redirect('admin/gantipassword');
				}
			}
		}
	}
	public function lihatabsen()
	{
		$data['title'] 		= 'Data Absensi';
		$data['akun'] 		= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['absensi'] 	= $this->menu_model->get_where('absensi')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/lihatabsen', $data);
		$this->load->view('templates/footer');
	}
	public function lihatdata()
	{
		$data['title'] 		= 'Data Karyawan';
		$data['akun'] 		= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['karyawan'] 	= $this->menu_model->get_where('karyawan')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/lihatdata', $data);
		$this->load->view('templates/footer');
	}
	public function ubahabsen()
	{
		$data['title'] 		= 'Ubah Absensi';
		$data['akun'] 		= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['absensi'] 	= $this->menu_model->get_where('absensi')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/ubahabsen', $data);
		$this->load->view('templates/footer');
	}
	public function ubah($id_absensi)
	{
		$data['title'] 		= 'Ubah Absensi';
		$data['akun'] 		= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$where 				= array('id_absensi' => $id_absensi);
		$data['absensi'] 	= $this->menu_model->ambil_where($where, 'absensi')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/ubah', $data);
		$this->load->view('templates/footer');
	}
	public function prosesubah()
	{
		$nik 			= $this->input->post('nik');
		$nama 			= $this->input->post('nama');
		$tanggal 		= $this->input->post('tanggal');
		$shift 			= $this->input->post('shift');
		$jam_masuk 		= $this->input->post('jam_masuk');
		$jam_keluar 	= $this->input->post('jam_keluar');
		$ketepatan 		= $this->input->post('ketepatan');
		$pulang_awal 	= $this->input->post('pulang_awal');
		$lembur 		= $this->input->post('lembur');
		$keterangan 	= $this->input->post('keterangan');
		$data 			= array(
						'nik' 			=> $nik,
						'nama' 			=> $nama,
						'tanggal' 		=> $tanggal,
						'shift' 		=> $shift,
						'jam_masuk' 	=> $jam_masuk,
						'jam_keluar' 	=> $jam_keluar,
						'ketepatan' 	=> $ketepatan,
						'pulang_awal' 	=> $pulang_awal,
						'lembur' 		=> $lembur,
						'keterangan' 	=> $keterangan
							);

		$where = array('nik' => $nik);
		$this->menu_model->update($where, $data, 'absensi');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data absensi berhasil diupdate</div>');
		redirect('admin/ubahabsen');
	}
	public function tambahdata()
	{
		$data['title'] 	= 'Tambah Data';
		$data['akun'] 	= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/tambahdata', $data);
		$this->load->view('templates/footer');
	}
	public function prosestambahdata()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[karyawan.nik]', ['is_unique' => 'NIK sudah terdaftar']);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('departemen', 'Departemen', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'required');
		$this->form_validation->set_rules('tgl_masuk', 'Tanggal Keluar', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Data';
			$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/tambahdata', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nama' 				=> htmlspecialchars($this->input->post('nama', true)),
				'nik' 				=> htmlspecialchars($this->input->post('nik', true)),
				'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
				'tgl_lahir' 		=> $this->input->post('tgl_lahir'),
				'departemen' 		=> $this->input->post('departemen'),
				'jabatan' 			=> $this->input->post('jabatan'),
				'alamat' 			=> $this->input->post('alamat'),
				'no_telp' 			=> $this->input->post('no_telp'),
				'tgl_masuk' 		=> $this->input->post('tgl_masuk'),
				'status' 			=> $this->input->post('status')
			];
			$this->db->insert('karyawan', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data karyawan baru berhasil ditambahkan</div>');
			redirect('admin/lihatdata');
		}
	}
	public function rekapabsensi()
	{
		$data['title'] = 'Input Absensi';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/rekapabsensi', $data);
		$this->load->view('templates/footer');
	}
	public function prosesrekapabsensi()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('shift', 'Shift', 'required');
		$this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required');
		$this->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required');
		$this->form_validation->set_rules('ketepatan', 'Ketepatan', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Input Absensi';
			$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/rekapabsensi', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nama' 			=> htmlspecialchars($this->input->post('nama', true)),
				'nik'			=> htmlspecialchars($this->input->post('nik', true)),
				'tanggal' 		=> $this->input->post('tanggal'),
				'shift' 		=> $this->input->post('shift'),
				'jam_masuk' 	=> $this->input->post('jam_masuk'),
				'jam_keluar' 	=> $this->input->post('jam_keluar'),
				'ketepatan' 	=> $this->input->post('ketepatan'),
				'pulang_awal' 	=> $this->input->post('pulang_awal'),
				'lembur' 		=> $this->input->post('lembur'),
				'keterangan' 	=> $this->input->post('keterangan')
			];
			$this->db->insert('absensi', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Input Absensi karyawan berhasil</div>');
			redirect('admin/lihatabsen');
		}
	}
	public function ubahdata()
	{
		$data['title'] = 'Ubah Data';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['karyawan'] = $this->menu_model->get_where('karyawan')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/ubahdata', $data);
		$this->load->view('templates/footer');
	}
	public function ubahkaryawan($nik)
	{
		$data['title'] = 'Ubah Data';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$where = array('nik' => $nik);
		$data['karyawan'] = $this->menu_model->ambil_where($where, 'karyawan')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/ubahkaryawan', $data);
		$this->load->view('templates/footer');
	}
	public function prosesubahkaryawan()
	{
		$nik 				= $this->input->post('nik');
		$nama 				= $this->input->post('nama');
		$jenis_kelamin 		= $this->input->post('jenis_kelamin');
		$tgl_lahir 			= $this->input->post('tgl_lahir');
		$departemen 		= $this->input->post('departemen');
		$jabatan 			= $this->input->post('jabatan');
		$alamat 			= $this->input->post('alamat');
		$no_telp 			= $this->input->post('no_telp');
		$tgl_masuk 			= $this->input->post('tgl_masuk');
		$tgl_keluar 		= $this->input->post('tgl_keluar');
		$status 			= $this->input->post('status');
		$data 				= array(
								'nik' 				=> $nik,
								'nama' 				=> $nama,
								'jenis_kelamin'	 	=> $jenis_kelamin,
								'tgl_lahir' 		=> $tgl_lahir,
								'departemen' 		=> $departemen,
								'jabatan' 			=> $jabatan,
								'alamat' 			=> $alamat,
								'no_telp' 			=> $no_telp,
								'tgl_masuk' 		=> $tgl_masuk,
								'tgl_keluar' 		=> $tgl_keluar,
								'status' 			=> $status,
							);

		$where = array('nik' => $nik);
		$this->menu_model->update($where, $data, 'karyawan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data karyawan berhasil diupdate</div>');
		redirect('admin/ubahdata');
	}
	public function hapusabsen()
	{
		$data['title'] = 'Hapus Data Absensi';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['absensi'] = $this->menu_model->get_where('absensi')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/hapusabsen', $data);
		$this->load->view('templates/footer');
	}
	public function hapus($nik)
	{
		$where = array('nik' => $nik);
		$this->menu_model->hapus($where, 'absensi');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data absensi berhasil dihapus</div>');
		redirect('admin/hapusabsen');
	}
	public function hapusdatakaryawan()
	{
		$data['title'] = 'Hapus Data Karyawan';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['karyawan'] = $this->menu_model->get_where('karyawan')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/hapusdatakaryawan', $data);
		$this->load->view('templates/footer');
	}
	public function hapusdata($nik)
	{
		$where = array('nik' => $nik);
		$this->menu_model->hapus($where, 'karyawan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data karyawan berhasil dihapus</div>');
		redirect('admin/hapusdatakaryawan');
	}
	public function buatakun()
	{
		$data['title'] = 'Buat Akun';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/buatakun', $data);
		$this->load->view('templates/footer');
	}
	public function prosesbuatakun()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[akun.nik]', ['is_unique' => 'NIK sudah terdaftar']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');

		if ($this->form_validation->run() == false) {
			$data['title'] 	= 'Buat Akun';
			$data['akun'] 	= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/buatakun', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nama' 			=> htmlspecialchars($this->input->post('nama', true)),
				'nik' 			=> htmlspecialchars($this->input->post('nik', true)),
				'image' 		=> 'default.jpg',
				'password' 		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'id_level' 		=> 2,
				'aktive' 		=> 1,
				'tanggal_buat' 	=> time()
			];
			$this->db->insert('akun', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Akun karyawan berhasil ditambah</div>');
			redirect('admin/buatakun');
		}
	}
	public function daftarakunkaryawan()
	{
		$data['title'] 			= 'Daftar Akun Karyawan';
		$data['akun'] 			= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['akunkaryawan'] 	= $this->menu_model->get_where('akun')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/daftarakunkaryawan', $data);
		$this->load->view('templates/footer');
	}
	public function hapusakun($nik)
	{
		$where = array('nik' => $nik);
		$this->menu_model->hapus($where, 'akun');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Akun karyawan berhasil dihapus</div>');
		redirect('admin/daftarakunkaryawan');
	}
	public function import()
	{
		$data['title'] 	= 'Import Absen';
		$data['akun'] 	= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/import', $data);
		$this->load->view('templates/footer');
	}
	public function prosesimport()
	{
		$file 			= $_FILES['file']['name'];
		$ekstensi 		= explode(".", $file);
		$file_name 		= "file-" . round(microtime(true)) . "." . end($ekstensi);
		$sumber 		= $_FILES['file']['tmp_name'];
		$target_dir 	= "assets/file/";
		$target_file 	= $target_dir . $file_name;

		move_uploaded_file($sumber, $target_file);
		$obj 			= PHPExcel_IOFactory::load($target_file);
		$all_data 		= $obj->getActiveSheet()->toArray(true, true, true, true, true, true, true, null, null, true, true);
		$data 			= "INSERT INTO absensi 
							(
							nik, 
							nama, 
							tanggal, 
							shift, 
							jam_masuk, 
							jam_keluar, 
							ketepatan, 
							pulang_awal, 
							lembur, 
							keterangan
							) VALUES";
		for ($i = 3; $i <= count($all_data); $i++) {
			$nik 			= $all_data[$i]['A'];
			$nama 			= $all_data[$i]['B'];
			$tanggal 		= $all_data[$i]['C'];
			$shift 			= $all_data[$i]['D'];
			$jam_masuk 		= $all_data[$i]['E'];
			$jam_keluar 	= $all_data[$i]['F'];
			$ketepatan 		= $all_data[$i]['G'];
			$pulang_awal	= $all_data[$i]['H'];
			$lembur			= $all_data[$i]['I'];
			$keterangan 	= $all_data[$i]['J'];
			$data 			= [
							'nik' 			=> $nik,
							'nama'	 		=> $nama,
							'tanggal' 		=> $tanggal,
							'shift' 		=> $shift,
							'jam_masuk' 	=> $jam_masuk,
							'jam_keluar' 	=> $jam_keluar,
							'ketepatan' 	=> $ketepatan,
							'pulang_awal' 	=> $pulang_awal,
							'lembur' 		=> $lembur,
							'keterangan' 	=> $keterangan
						];
			//$sql			.= "(
			//					'$nik', 
			//					'$nama', 
				//				'$tanggal', 
			//					'$shift', 
					//			'$jam_masuk', 
					//			'$jam_keluar', 
							//	'$ketepatan',
					//			'$pulang_awal',
						//		'$lembur', 
						//		'$keterangan'
						//		),";

			$this->db->insert('absensi', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Rekap Absensi karyawan berhasil</div>');
			redirect('admin/lihatabsen');
		//$sql = substr($sql, 0, -1);
		//echo $sql;
		//print_r($sql);
		//mysqli_query($con, $sql) or die (mysqli_error($con));
			unlink($target_file);

		}
	}
	public function cari()
	{
		$data['title'] 			= 'Ubah Absen';
		$data['akun'] 			= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['yangdicari'] 	= $this->input->post("yangdicari");
		$data['absensi'] 		= $this->menu_model->cari($data['yangdicari'])->result();
		$data['jumlah'] 		= count($data['absensi']);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/ubahabsen', $data);
		$this->load->view('templates/footer');
	}
	public function cari2()
	{
		$data['title'] 			= 'Ubah Absen';
		$data['akun'] 			= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['yangdicari'] 	= $this->input->post("yangdicari");
		$data['yangdicari2'] 	= $this->input->post("yangdicari2");
		$data['absensi'] 		= $this->menu_model->cari2($data['yangdicari'], $data['yangdicari2'])->result();
		$data['jumlah'] 		= count($data['absensi']);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/lihatabsen', $data);
		$this->load->view('templates/footer');
	}
	public function cari3()
	{
		$data['title']	 		= 'Ubah Absen';
		$data['akun'] 			= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['yangdicari'] 	= $this->input->post("yangdicari");
		$data['absensi'] 		= $this->menu_model->cari($data['yangdicari'])->result();
		$data['jumlah'] 		= count($data['absensi']);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/ubahabsen', $data);
		$this->load->view('templates/footer');
	}
	public function cari4()
	{
		$data['title'] 			= 'Ubah Absen';
		$data['akun'] 			= $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['yangdicari'] 	= $this->input->post("yangdicari");
		$data['yangdicari2'] 	= $this->input->post("yangdicari2");
		$data['karyawan'] 		= $this->menu_model->cari3($data['yangdicari'], $data['yangdicari2'])->result();
		$data['jumlah'] 		= count($data['karyawan']);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/lihatdata', $data);
		$this->load->view('templates/footer');
	}
}
