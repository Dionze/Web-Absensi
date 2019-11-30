<?php

function ceklogin()
{
	$ci = get_instance();
	if(!$ci->session->userdata('nik'))
	{
		redirect ('auth');
	}else{
		$id_level = $ci->session->userdata('id_level');
		$menu = $ci->uri->segment(1);
		$queryMenu = $ci->db->get_where('submenu',['url' => $menu])->row_array();
		$id_menu = $queryMenu['id_menu'];
		$menu_akses = $ci->db->get_where('menu_akses', ['id_level' => $id_level, 'id_menu' => $id_menu]);
		if($menu_akses->num_rows() < 1)
		{
			redirect('auth/blocked');
		}
	}
}

function cek_akses($id_level, $id_menu)
{
	$ci = get_instance();
	$ci->db->where('id_level', $id_level);
	$ci->db->where('id_menu', $id_menu);
	$result = $ci->db->get('menu_akses');
	if ($result->num_rows() > 0)
	{
		return "checked='checked'";
	}
}