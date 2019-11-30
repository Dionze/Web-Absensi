<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
		public function __construct()
	{
		parent::__construct();
		ceklogin();
	}
	public function index()
	{
		$data['title'] = 'Menu Manajemen';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['menu'] = $this->db->get('menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false)
		{
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footer');
		}else{
			$this->db->insert('menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Menu baru telah ditambahkan</div>');
					redirect('menu');
		}
	}
	public function submenu()
	{
		$data['title'] = 'Submenu Manajemen';
		$data['akun'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
		$data['menu'] = $this->db->get('menu')->result_array();
		$this->load->model('Menu_model');
		$data['submenu'] = $this->Menu_model->getsubmenu();
		$data['menu'] = $this->db->get('menu')->result_array();

		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('id_menu', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');
		if ($this->form_validation->run() == false)
		{
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/submenu', $data);
		$this->load->view('templates/footer');
		}else{
			$data = ['judul' => $this->input->post('judul'),
					 'id_menu' => $this->input->post('id_menu'),
					 'url' => $this->input->post('url'),
					 'icon' => $this->input->post('icon'),
					 'aktive' => $this->input->post('aktive')];
			$this->db->insert('submenu', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">SubMenu baru telah ditambahkan</div>');
					redirect('menu/submenu');
		}
	}
}