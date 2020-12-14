<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama extends CI_Controller {
	public function __construct()
	{

		parent::__construct();

		if ($this->session->userdata('roleId') == 0) {
			redirect('app');
		}

	}

	public function index()
	{
		$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");

		$data['title'] = 'Admin';
		$data['active'] = 'active';
		$this->load->view('template/headerAdmin',$data);
		$this->load->view('template/asideAdmin');
		$this->load->view('admin/agama/datAgama',$data);
		$this->load->view('template/footerAdmin');			
	}


	public function creatAgama()
	{
		$this->form_validation->set_rules('agama', 'agama', 'trim|required');

        if($this->form_validation->run()==FALSE)
        {
            $data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
            
            $data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/agama/creatAgama',$data);
			$this->load->view('template/footerAdmin');
        }
        else
        {
            $data = array('id_agama' => '',
                          'agama' => $this->input->post('agama')
                        );
            $quer=$this->Buku_model->insertData('tb_agama',$data);
            redirect("agama","refresh");   
        }	
	}

	public function delAgama()
	{
		$id = $this->input->get('id_agama',true);
		$field="id_agama";
		$query = $this->Buku_model->delete('tb_agama',$field,$id);					
		if ($query)
			{
				$this->session->set_flashdata("message","berhasil");
				redirect("agama","refresh");
			}
		else
			{
				$this->session->set_flashdata("message","gagal");
				redirect("agama","refresh");
			}	
	}

	public  function editAgama()
	{
		$id = $this->input->get('id_agama',true);    
        $this->form_validation->set_rules('agama', 'agama', 'trim|required');

		if($this->form_validation->run()==FALSE)
		{
			/*data yang ditampilkan*/
			$data['agama'] = $this->Buku_model->get_detail1('tb_agama','id_agama',$id);


			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/agama/editAgama',$data);
			$this->load->view('template/footerAdmin');

		}else
		{
            $id = $this->input->post('id_agama');    
            $field='id_agama';
            $data = array(
                          'agama' => $this->input->post('agama')
                        );
            $quer=$this->Buku_model->updateData1('tb_agama',$data,$field,$id);
            redirect("agama","refresh");   
		}
	}

}