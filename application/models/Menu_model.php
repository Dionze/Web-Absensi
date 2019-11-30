<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	public function getsubmenu()
	{
		$query = "SELECT `submenu`.*,`menu`.`menu`
				    FROM `submenu` JOIN `menu`
				      ON `submenu`.`id_menu` = `menu`.`id_menu`";
		return $this->db->query($query)->result_array();
	}
	public function get_where($table)
	{
		return $this->db->get($table);
	}
	public function ambil_where($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	public function update($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function hapus($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function cari($yangdicari)
	{
		$this->db->from('absensi');
		$this->db->like('tanggal', $yangdicari);
		return $this->db->get();
	}
	public function cari2($yangdicari, $yangdicari2)
	{
		$this->db->from('absensi');
		$this->db->like('tanggal', $yangdicari);
		$this->db->or_like('tanggal', $yangdicari2);
		return $this->db->get();
	}
	public function cari3($yangdicari, $yangdicari2)
	{
		$this->db->from('karyawan');
				$this->db->like('departemen', $yangdicari);
				$this->db->or_like('jabatan', $yangdicari2);
		return $this->db->get();
	}
}