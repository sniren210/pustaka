<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
	{

		parent::__construct();

		if ($this->session->userdata('roleId') == 0) {
			redirect('app');
		}

	}

	public function index()
	{
		$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");

		$data['title'] = 'Admin';
		$data['active'] = 'active';
		$this->load->view('template/headerAdmin',$data);
		$this->load->view('template/asideAdmin');
		$this->load->view('admin/kategori/datkategori',$data);
		$this->load->view('template/footerAdmin');
	}

	public function creatKategori()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		if($this->form_validation->run()==FALSE)
		{
			$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");

			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/kategori/creatKategori',$data);
			$this->load->view('template/footerAdmin');
		}
	 	else
		{
            $data = array('id_kategori' => '',
                          'kategori' => $this->input->post('kategori')
                        );
			$quer=$this->Buku_model->insertData('tb_kategori',$data);
			redirect("Kategori","refresh");	
		}
	}

	public function editKategori()
	{
		$id = $this->input->get('id_kategori');	
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		if($this->form_validation->run()==FALSE)
		{
			$data['kategori'] = $this->Buku_model->get_detail1('tb_kategori','id_kategori',$id);

			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/kategori/editkategori',$data);
			$this->load->view('template/footerAdmin');
		}
	 	else
		{
			$id = $this->input->post('id_kategori');	
			$field='id_kategori';
            $data = array(
                          'kategori' => $this->input->post('kategori')
                        );
			$quer=$this->Buku_model->updateData1('tb_kategori',$data,$field,$id);
			redirect("Kategori","refresh");	
		}
	}

	public function delKategori()
	{
		$field='id_kategori';
		$id = $this->input->get('id_kategori',true);	
			$query = $this->Buku_model->delete('tb_kategori',$field,$id);					
		if ($query)
			{
				$this->session->set_flashdata("message","berhasil");
				redirect("Kategori","refresh");
			}
		else
			{
				$this->session->set_flashdata("message","gagal");
				redirect("Kategori","refresh");
			}
	}
}