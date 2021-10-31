<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_basic', 'm');
		if ($this->session->userdata('log') == null) {		
			redirect('Auth','refresh');			
		}
	}

	public function index()
	{
		$data['produk'] = $this->m->getDataProduk()->result();
		$this->load->view('template/header');		
		$this->load->view('admin/produk/index', $data);
		$this->load->view('template/footer');
	}

	public function createProduk()
	{
		$data['kategori'] = $this->m->getData('kategori', null)->result();
		$this->load->view('template/header');		
		$this->load->view('admin/produk/add_produk', $data);
		$this->load->view('template/footer');
	}

	public function addProduk()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if (empty($_FILES['gambar']['name']))
		{
			$this->form_validation->set_rules('gambar', 'Document', 'required');
		}

		if ($this->form_validation->run() === FALSE)
        {  
			$this->session->set_flashdata('toast', 'error:Data gagal ditambahkan, pastikan form telah terisi semua!');	
			redirect('admin/createProduk','refresh');
        }else{
			$tempNam = $this->input->post('nama');
			$cek = $this->cekProduk($tempNam);
			if ($cek == true) {
				$data = array(
					'nama' => $tempNam,
					'id_kategori' => $this->input->post('kategori'),
					'harga' => $this->input->post('harga'),
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar' => $this->do_upload(),
				);
				$this->m->ins('produk', $data);
				$this->session->set_flashdata('toast', 'success:Data berhasil ditambahkan!');	
				redirect('admin','refresh');
			} else {
				$this->session->set_flashdata('toast', 'error: Nama Produk sudah terpakai');	
				redirect($_SERVER['HTTP_REFERER']);
			}			
		}
	}

	public function editProduk($id)
	{
		$w = array('produk.id' => $id, );
		$data['produk'] = $this->m->getDataProduk($w)->row();
		$data['kategori'] = $this->m->getData('kategori', null)->result();
		
		$this->load->view('template/header');		
		$this->load->view('admin/produk/edit_produk', $data);
		$this->load->view('template/footer');
	}

	public function updateProduk($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		if (empty($_FILES['gambar']['name']))
		{
			$w = array('produk.id' => $id, );
			$temp = $this->m->getDataProduk($w)->row();

			$gambar = $temp->gambar;
		}else{
			$gambar = $this->do_upload();
		}

		if ($this->form_validation->run() === FALSE)
        {  
			$this->session->set_flashdata('toast', 'error:Data gagal diupdate, pastikan form telah terisi semua!');	
			redirect($_SERVER['HTTP_REFERER']);
        }else{
			$tempNam = $this->input->post('nama');
			$cek = $this->cekProduk($tempNam , $id);
			if ($cek == true) {
				$data = array(
					'nama' => $tempNam ,
					'id_kategori' => $this->input->post('kategori'),
					'harga' => $this->input->post('harga'),
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar' => $gambar,
				);
				$w = array('id' => $id, );
				$this->m->upd('produk', $data, $w);
				$this->session->set_flashdata('toast', 'success:Data berhasil diupdate!');	
				redirect('admin','refresh');
			} else {
				$this->session->set_flashdata('toast', 'error: Nama Produk sudah terpakai');	
				redirect($_SERVER['HTTP_REFERER']);
			}		
		}
	}

	public function deleteProduk($id)
	{
		$w = array('id' => $id, );
		$this->m->del('produk', $w);

		$this->session->set_flashdata('toast', 'success:Data berhasil dihapus!');		
		redirect('admin','refresh');
	}

	public function kategori()
	{
		$data['kategori'] = $this->m->getData('kategori', null)->result();
		$this->load->view('template/header');		
		$this->load->view('admin/kategori/kategori', $data);
		$this->load->view('template/footer');
	}

	public function createKategori()
	{
		$this->load->view('template/header');		
		$this->load->view('admin/kategori/add_kategori');
		$this->load->view('template/footer');
	}

	public function addKategori()
	{
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');       

		if ($this->form_validation->run() === FALSE)
        {  
			$this->session->set_flashdata('toast', 'error:Data gagal ditambahkan, pastikan form telah terisi semua!');	
			redirect('admin/createKategori','refresh');
        }else{
			$data = array('kategori' => $this->input->post('kategori'));
			$this->m->ins('kategori', $data);

			$this->session->set_flashdata('toast', 'success:Data berhasil ditambahkan!');		
			redirect('admin/kategori','refresh');
		}
	}

	public function editKategori($id)
	{
		$w = array('id' => $id, );
		$data['kategori'] = $this->m->getData('kategori', $w)->row();
		$this->load->view('template/header');		
		$this->load->view('admin/kategori/add_kategori');
		$this->load->view('template/footer');
	}

	public function updateKategori($id)
	{
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');       

		if ($this->form_validation->run() === FALSE)
        {  
			$this->session->set_flashdata('toast', 'error:Data gagal ditambahkan, pastikan form telah terisi semua!');	
			redirect('admin/editKategori','refresh');
        }else{
			$data = array('kategori' => $this->input->post('kategori'));
			$w = array('id' => $id, );
			$this->m->upd('kategori', $data, $w);

			$this->session->set_flashdata('toast', 'success:Data berhasil diupdate!');		
			redirect('admin/kategori','refresh');
		}
	}

	public function deleteKategori($id)
	{
		$w = array('id' => $id, );
		$this->m->del('kategori', $w);

		$this->session->set_flashdata('toast', 'success:Data berhasil dihapus!');		
		redirect('admin/kategori','refresh');
	}

	public function do_upload(){
       
	   $config['upload_path'] = './assets/uploads/';
	   $config['allowed_types'] = 'gif|jpg|png';
	   
	   $this->load->library('upload', $config);
	   
	   if ( ! $this->upload->do_upload('gambar')){
		   return $this->upload->display_errors();
	   }
	   else{
		   return $this->upload->data('file_name');
	   }
	}	

	public function cekProduk($nama, $id=null)
	{
		if ($id == null) {
			$w = array('nama' => $nama, );
		} else {
			$w = array('nama' => $nama, 'id' != $id );
		}
		
		
		$temp = $this->m->getDataProduk($w)->row();

		if ($temp != null) {
			return false;
		} else {
			return true;
		}
		
	}

}

/* End of file Admin.php */
