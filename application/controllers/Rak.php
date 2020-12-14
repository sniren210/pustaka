<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rak extends CI_Controller {
	public function __construct()
	{

		parent::__construct();

		if ($this->session->userdata('roleId') == 0) {
			redirect('app');
		}

	}

	public function index()
	{
		$data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
		$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
		
		$data['title'] = 'Admin';
		$data['active'] = 'active';
		$this->load->view('template/headerAdmin',$data);
		$this->load->view('template/asideAdmin');
		$this->load->view('admin/rak/datRak',$data);
		$this->load->view('template/footerAdmin');
	}

	public function creatRak()
	{

		$this->form_validation->set_rules('nama_rak', 'nama_rak', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
			$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
			
			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/rak/creatRak',$data);
			$this->load->view('template/footerAdmin');
		}
	 	else
		{
			
            $data = array('no_rak' => '',
                          'nama_rak' => $this->input->post('nama_rak'),
                          'id_kategori' => $this->input->post('kategori'),
                        );
			$query=$this->Buku_model->insertData('tb_rak',$data);
			if ($query)
			{
				$this->session->set_flashdata("message","berhasil!!!");
				redirect("Rak","refresh");	
			}
			else
			{
				$this->session->set_flashdata("message","gagal!!!");
				redirect("Rak","refresh");	
			}
		}
	}

	public function delRak()
	{
		$id = $this->input->get('no_rak',true);	
		$field='no_rak';
		$query = $this->Buku_model->delete('tb_rak',$field,$id);					
		if ($query)
			{
				$this->session->set_flashdata("message","berhasil");
				redirect("Rak","refresh");
			}
		else
			{
				$this->session->set_flashdata("message","gagal");
				redirect("Rak","refresh");
			}
	}

	public function editRak()
	{
		$id = $this->input->get('no_rak');	
		$this->form_validation->set_rules('nama_rak', 'nama_rak', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');
		if($this->form_validation->run()==FALSE)
		{

			/*data yang ditampilkan*/
			$data['rak'] = $this->Buku_model->get_detail1('tb_rak','no_rak',$id);
			$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
			
			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/rak/editRak',$data);
			$this->load->view('template/footerAdmin');
		}
	 	else
		{
			$id = $this->input->post('no_rak');	
			$field='no_rak';
            $data = array(
                          'nama_rak' => $this->input->post('nama_rak'),
                          'id_kategori' => $this->input->post('kategori'),
                        );
			$quer=$this->Buku_model->updateData1('tb_rak',$data,$field,$id);
			redirect("Rak","refresh");	
		}		
	}

}
