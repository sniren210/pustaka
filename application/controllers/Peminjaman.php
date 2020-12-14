<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
	public function __construct()
	{

		parent::__construct();

		if ($this->session->userdata('roleId') == 0) {
			redirect('app');
		}

	}

	public function index()
	{
		$data['data_pinjam'] = $this->Buku_model->getAllData("tb_pinjam");
		//$data['data_kembali'] = $this->Buku_model->getAllData("tb_kembali");
		$data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
		$data['anggota'] = $this->Buku_model->getAllData("tb_anggota");
		$data['model'] = $this->Buku_model;
		
		$data['title'] = 'Admin';
		$data['active'] = 'active';
		$this->load->view('template/headerAdmin',$data);
		$this->load->view('template/asideAdmin');
		$this->load->view('admin/peminjaman/datPeminjaman',$data);
		$this->load->view('template/footerAdmin');
	}

	public function kembali()
	{
		/*data yang ditampilkan*/
		$data['data_pinjam'] = $this->Buku_model->getAllData("tb_pinjam");
		//$data['data_kembali'] = $this->Buku_model->getAllData("tb_kembali");
		$data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
		$data['anggota'] = $this->Buku_model->getAllData("tb_anggota");
		$data['model'] = $this->Buku_model;

		$data['title'] = 'Admin';
		$data['active'] = 'active';
		$this->load->view('template/headerAdmin',$data);
		$this->load->view('template/asideAdmin');
		$this->load->view('admin/peminjaman/datKembali',$data);
		$this->load->view('template/footerAdmin');	
	}

	public function creatPeminjaman()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$formSubmit = $this->input->post('button');
			if( $formSubmit == 'simpan' )
			{
				//$this->form_validation->set_rules('tgl_pinjam', 'tgl_pinjam', 'required');
				$this->form_validation->set_rules('id_anggota', 'id_anggota', 'required');
				$this->form_validation->set_rules('tgl_kembali', 'tgl_kembali', 'required');
				//$this->form_validation->set_rules('id_buku', ' id buku', 'required');
				if($this->form_validation->run()==FALSE)
				{

					/*data yang ditampilkan*/
					$data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
					$data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");

					$data['title'] = 'Admin';
					$data['active'] = 'active';
					$this->load->view('template/headerAdmin',$data);
					$this->load->view('template/asideAdmin');
					$this->load->view('admin/peminjaman/creatPeminjaman',$data);
					$this->load->view('template/footerAdmin');
				}
			 	else
				{
					$t= $this->input->post('tgl_kembali');	
					$s=substr($t,0,2);
					$s1=substr($t,3,2);
					$s2=substr($t,6,6);
					 $s3=$s2."/".$s.'/'.$s1;

		            $tgl=date('y-m-d');
		            $data = array('id_pinjam' => '',
		                          'tgl_pinjam' => $tgl,
		                          'id_anggota' => $this->input->post('id_anggota'),
		                          'tgl_kembali' => $s3,
		                          'status'=>0
		                        );
		            $insert=$this->Buku_model->insertData('tb_pinjam',$data);
		            redirect('peminjaman','refresh');
				}
			}
			else
			{
				$this->form_validation->set_rules('id_anggota', 'id_anggota', 'required');
				if($this->form_validation->run()==FALSE)
				{

					/*data yang ditampilkan*/
					$data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
					$data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
					
					$data['title'] = 'Admin';
					$data['active'] = 'active';
					$this->load->view('template/headerAdmin',$data);
					$this->load->view('template/asideAdmin');
					$this->load->view('admin/peminjaman/creatPeminjaman',$data);
					$this->load->view('template/footerAdmin');
				}
			 	else
				{
		           $data['title']='Data Kembali';
		            $data['pointer']="Pinjam";
		            $data['classicon']="fa fa-book";
		            $data['main_bread']="Struk Kembali";
		            $data['sub_bread']="Struk Kembali";
		            $data['desc']="Detail Struk Kembali, Menampilkan data yang telah di Kemblikan";

		           /*data yang ditampilkan*/
		           $id_pinjam=$this->input->post('id_anggota');
		           $data['model'] = $this->Buku_model;
					$data['tbl1']="tb_pinjam";
					$data['tbl2']="tb_detail_pinjam";
					$data['tbl3']="tb_kembali";
		           $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
		           $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
		           $data['kelas'] = $this->Buku_model->getAllData("tb_kelas");
		           $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
		           $data['kembali'] = $this->Buku_model->getAllData("tb_kembali");
		           $data['data_pinjam'] = $this->Buku_model->get_detail123("tb_pinjam","id_anggota",$id_pinjam);
		           //$data['data_detail_pinjam'] = $this->Buku_model->getAllData("tb_detail_pinjam");
		            $tmp['content']=$this->load->view('admin/report/report_per_anggota',$data, TRUE);
		            $this->load->view('admin/layout',$tmp);
				}
				
			}
		}
		else
		{

				/*data yang ditampilkan*/
				$data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
				$data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
				
				$data['title'] = 'Admin';
				$data['active'] = 'active';
				$this->load->view('template/headerAdmin',$data);
				$this->load->view('template/asideAdmin');
				$this->load->view('admin/peminjaman/creatPeminjaman',$data);
				$this->load->view('template/footerAdmin');
		}
	}

}
