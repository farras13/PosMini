<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_basic', 'm');
	}

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function pros_log()
	{
		$nama = $this->input->post('username');
		$pass = md5($this->input->post('password'));

		$w = array('username' => $nama, 'password' => $pass);
		$cek = $this->m->getData('auth', $w)->row();
		if ($cek != null) {
			$log = array(
				'id' => $cek->id, 
				'username' => $cek->username, 
			);
			$this->session->set_userdata('log',$log);
            
			$this->session->set_flashdata('toast', 'success:Welcome back '.$cek->username);

			redirect('Admin', 'refresh');
		}else{
			$this->session->set_flashdata('toast', 'error:Username / Password tidak sesuai');
			redirect('Auth','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('toast', 'success:Terima kasih');
		redirect('Auth','refresh');
	}
}

/* End of file Auth.php */
