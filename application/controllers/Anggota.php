<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
	public function __construct()
	{

		parent::__construct();

		if ($this->session->userdata('roleId') == 0) {
			redirect('app');
		}

	}

	public function index()
	{
		$data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");

		$data['title'] = 'Admin';
		$data['active'] = 'active';
		$this->load->view('template/headerAdmin',$data);
		$this->load->view('template/asideAdmin');
		$this->load->view('admin/anggota/datAnggota',$data);
		$this->load->view('template/footerAdmin');
	}

	public function delAnggota()
	{
		$id = $this->input->get('id_anggota',true);
		$field="id_anggota";
		$query = $this->Buku_model->delete('tb_anggota',$field,$id);					
		if ($query)
			{
				$this->session->set_flashdata("message","berhasil");
				redirect("Anggota","refresh");
			}
		else
			{
				$this->session->set_flashdata("message","gagal");
				redirect("Anggota","refresh");
			}
	}

	public function creatAnggota()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('kelas', 'kelas', 'required');
		$this->form_validation->set_rules('agama', 'agama', 'required');
		$this->form_validation->set_rules('jk', 'jk', 'required');
		if($this->form_validation->run()==FALSE)
		{
			/*data yang ditampilkan*/
			$data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
			$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
			$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
			
			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/anggota/creatAnggota',$data);
			$this->load->view('template/footerAdmin');		
		}
	 	else
		{
			$this->db->select('RIGHT(tb_anggota.id_anggota,6) as kode1', FALSE);
            $this->db->order_by('id_anggota','DESC');
            $this->db->limit(1);
            $query = $this->db->get('tb_anggota');
            //cek dulu apakah ada sudah ada kode di tabel.
            if($query->num_rows() <> 0)
            {
                //jika kode ternyata sudah ada.
                $data = $query->row();
                $kode = intval($data->kode1) + 1;
            }
            else
            {
                //jika kode belum ada
                $kode = 1;
            }
            $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT);
            $kodejadi = "ANGG".$kodemax;
            $data = array('id_anggota' => $kodejadi,
                          'nama' => $this->input->post('nama'),
                          'id_kelas' => $this->input->post('kelas'),
                          'id_agama' => $this->input->post('agama'),
                          'jenis_kelamin' =>$this->input->post('jk'),
                          'alamat' => $this->input->post('alamat'),
                          'hp' => $this->input->post('hp'),
                          'ket' => $this->input->post('ket'),
                        );
			$quer=$this->Buku_model->insertData('tb_anggota',$data);
			if ($query)
			{
				//$this->session->set_flashdata("message","berhasil!!!");
				redirect("Anggota","refresh");	
			}
			else
			{
				$this->session->set_flashdata('pesan','<span class="alert alert-danger" style="display:block;">Gagal Di Buat</span>');
				redirect("anggota","refresh");	
			}
		}
	}

	public function editAnggota()
	{
		$id = $this->input->get('id_anggota',true);	
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('kelas', 'kelas', 'required');
		$this->form_validation->set_rules('agama', 'agama', 'required');
		$this->form_validation->set_rules('jk', 'jk', 'required');
		$this->form_validation->set_rules('hp', 'hp', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		if($this->form_validation->run()==FALSE)
		{
			/*data yang ditampilkan*/
			$data['anggota'] = $this->Buku_model->get_detail1('tb_anggota','id_anggota',$id);
			$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
			$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");

			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/anggota/editAnggota',$data);
			$this->load->view('template/footerAdmin');

		}else
		{
			$id = $this->input->post('id_anggota');	
			$field='id_anggota';
            $data = array(
                          'nama' => $this->input->post('nama'),
                          'id_kelas' => $this->input->post('kelas'),
                          'id_agama' => $this->input->post('agama'),
                          'jenis_kelamin' =>$this->input->post('jk'),
                          'alamat' => $this->input->post('alamat'),
                          'hp' => $this->input->post('hp'),
                          'ket' => $this->input->post('keterangan'),
                        );
			$quer=$this->Buku_model->updateData1('tb_anggota',$data,$field,$id);
			redirect("Anggota","refresh");	
		}
	}

}