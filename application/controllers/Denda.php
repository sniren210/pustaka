<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Denda extends CI_Controller {
	public function __construct()
	{

		parent::__construct();

		if ($this->session->userdata('roleId') == 0) {
			redirect('app');
		}

	}

	public function index()
	{
		$data['data_denda'] = $this->Buku_model->getAllData("tb_denda");

		$data['title'] = 'Admin';
		$data['active'] = 'active';
		$this->load->view('template/headerAdmin',$data);
		$this->load->view('template/asideAdmin');
		$this->load->view('admin/denda/datDenda',$data);
		$this->load->view('template/footerAdmin');
	}

	public  function creatDenda()
	{
		$this->form_validation->set_rules('denda', 'denda', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');
		if($this->form_validation->run()==FALSE)
		{
			/*data yang ditampilkan*/
			$data['data_denda'] = $this->Buku_model->getAllData("tb_denda");
		
			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/denda/creatDenda',$data);
			$this->load->view('template/footerAdmin');
		}
	 	else
		{
            $data = array('id_denda' =>'',
                          'denda' => $this->input->post('denda'),
                          'status' => $this->input->post('status'),
                        );
			$query=$this->Buku_model->insertData('tb_denda',$data);
			redirect("Denda","refresh");	
		}
	}

	public function  editDenda()
	{
		$id = $this->input->get('id_denda');	
		$this->form_validation->set_rules('denda', 'denda', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');
		if($this->form_validation->run()==FALSE)
		{
			/*data yang ditampilkan*/
			$data['denda'] = $this->Buku_model->get_detail1('tb_denda','id_denda',$id);
			
			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/denda/editDenda',$data);
			$this->load->view('template/footerAdmin');
		}
	 	else
		{
			$id = $this->input->post('id_denda');	
			$field='id_denda';
            $data = array(
                          'denda' => $this->input->post('denda'),
                          'status' => $this->input->post('status'),
                        );
			$quer=$this->Buku_model->updateData1('tb_denda',$data,$field,$id);
			redirect("Denda","refresh");	
		}
	}


	public  function delDenda()
	{
		$id = $this->input->get('id_denda',true);
		$field='id_denda';
			$query = $this->Buku_model->delete('tb_denda',$field,$id);					
		if ($query)
			{
				$this->session->set_flashdata("message","berhasil");
				redirect("Denda","refresh");
			}
		else
			{
				$this->session->set_flashdata("message","gagal");
				redirect("Denda","refresh");
			}
	}
}