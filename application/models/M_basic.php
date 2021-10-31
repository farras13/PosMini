<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_basic extends CI_Model
{

	public function getData($t, $w = null)
	{
		if ($w != null) {
			$this->db->where($w);
		}
		return $this->db->get($t);
	}

	public function getDataProduk($w = null)
	{
		
		$this->db->select('produk.*, kategori.kategori');
		$this->db->join('kategori', 'kategori.id = produk.id_kategori');
		if ($w != null) {
			$this->db->where($w);
		}
		$this->db->order_by('produk.id', 'asc');		
		return $this->db->get('produk');		
	}

	public function ins($t, $data)
	{
		return $this->db->insert($t, $data);
	}

	public function upd($t, $data, $w)
	{
		return $this->db->update($t, $data, $w);
	}

	public function del($t, $w)
	{
		$this->db->where($w);
		$this->db->delete($t);
	}
}
	
	/* End of file M_basic.php */
