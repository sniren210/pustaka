<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengarang extends CI_Controller {
	public function __construct()
	{

		parent::__construct();

		if ($this->session->userdata('roleId') == 0) {
			redirect('app');
		}

	}

	public function index()
	{
		$data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");

		$data['title'] = 'Admin';
		$data['active'] = 'active';
		$this->load->view('template/headerAdmin',$data);
		$this->load->view('template/asideAdmin');
		$this->load->view('admin/pengarang/datPengarang',$data);
		$this->load->view('template/footerAdmin');
	}

	public function creatPengarang()
	{

		$this->form_validation->set_rules('nama_pengarang', 'nama_pengarang', 'trim|required');
		if($this->form_validation->run()==FALSE)
		{
			$data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");

			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/pengarang/creatPengarang',$data);
			$this->load->view('template/footerAdmin');
		}
	 	else
		{
            $data = array('id_pengarang' => '',
                          'nama_pengarang' => $this->input->post('nama_pengarang')
                        );
			$quer=$this->Buku_model->insertData('tb_pengarang',$data);
			redirect("Pengarang","refresh");	
		}
	}

	public function editPengarang()
	{
		$id = $this->input->get('id_pengarang');	
		$this->form_validation->set_rules('nama_pengarang', 'nama_pengarang', 'trim|required');
		if($this->form_validation->run()==FALSE)
		{
			/*data yang ditampilkan*/
			$data['pengarang'] = $this->Buku_model->get_detail1('tb_pengarang','id_pengarang',$id);
			//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/pengarang/editPengarang',$data);
			$this->load->view('template/footerAdmin');
		}
	 	else
		{
			$id = $this->input->post('id_pengarang');	
			$field='id_pengarang';
            $data = array(
                          'nama_pengarang' => $this->input->post('nama_pengarang')
                        );
			$quer=$this->Buku_model->updateData1('tb_pengarang',$data,$field,$id);
			redirect("Pengarang","refresh");	
		}
	}

	public function delPengarang()
	{
		$field='id_pengarang';
		$id = $this->input->get('id_pengarang',true);	
		$query = $this->Buku_model->delete('tb_pengarang',$field,$id);					
		if ($query)
			{
				$this->session->set_flashdata("message","berhasil");
				redirect("Pengarang","refresh");
			}
		else
			{
				$this->session->set_flashdata("message","gagal");
				redirect("Pengarang","refresh");
			}
	}
}