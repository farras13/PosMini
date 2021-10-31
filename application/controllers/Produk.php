<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_basic', 'm');
	}

	public function index()
	{
		$data['produk'] = $this->m->getDataProduk()->result();
		$this->load->view('produk', $data);
	}
}

/* End of file Produk.php */

