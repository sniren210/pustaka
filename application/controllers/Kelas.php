<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function __construct()
	{

		parent::__construct();

		if ($this->session->userdata('roleId') == 0) {
			redirect('app');
		}

	}

	public function index()
	{
		$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");

		$data['title'] = 'Admin';
		$data['active'] = 'active';
		$this->load->view('template/headerAdmin',$data);
		$this->load->view('template/asideAdmin');
		$this->load->view('admin/kelas/datKelas',$data);
		$this->load->view('template/footerAdmin');	
	}

	public function creatKelas()
	{
		$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');

        if($this->form_validation->run()==FALSE)
        {
            $data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
            
            $data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/kelas/creatKelas',$data);
			$this->load->view('template/footerAdmin');
        }
        else
        {
            $data = array('id_kelas' => '',
                          'kelas' => $this->input->post('kelas')
                        );
            $quer=$this->Buku_model->insertData('tb_kelas',$data);
            redirect("Kelas","refresh");   
        }
	}

	public function delKelas()
	{
		$id = $this->input->get('id_kelas',true);
		$field="id_kelas";
		$query = $this->Buku_model->delete('tb_kelas',$field,$id);					
		if ($query)
			{
				$this->session->set_flashdata("message","berhasil");
				redirect("kelas","refresh");
			}
		else
			{
				$this->session->set_flashdata("message","gagal");
				redirect("kelas","refresh");
			}
	}

	public function editKelas()
	{
		$id = $this->input->get('id_kelas',true);    
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required');

		if($this->form_validation->run()==FALSE)
		{
			/*data yang ditampilkan*/
			$data['kelas'] = $this->Buku_model->get_detail1('tb_kelas','id_kelas',$id);


			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/kelas/editKelas',$data);
			$this->load->view('template/footerAdmin');

		}else
		{
            $id = $this->input->post('id_kelas');    
            $field='id_kelas';
            $data = array(
                          'kelas' => $this->input->post('kelas')
                        );
            $quer=$this->Buku_model->updateData1('tb_kelas',$data,$field,$id);
            redirect("Kelas","refresh");   
		}
	}

}