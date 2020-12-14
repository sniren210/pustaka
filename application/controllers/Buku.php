<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
	public function __construct()
	{

		parent::__construct();

		if ($this->session->userdata('roleId') == 0) {
			redirect('app');
		}

	}

	public function index()
	{
		$data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
		$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
		$data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
		$data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
		$data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
		$data['model'] = $this->Buku_model;


		$data['title'] = 'Admin';
		$data['active'] = 'active';
		$this->load->view('template/headerAdmin',$data);
		$this->load->view('template/asideAdmin');
		$this->load->view('admin/buku/datBuku',$data);
		$this->load->view('template/footerAdmin');
	}

	public function delBuku()
	{
		$id_buku = $this->input->get('id_buku', TRUE);			
		$hapus = array('id_buku' => $id_buku);
		
		$query = $this->Buku_model->deleteData('tb_buku',$hapus);

		if ($query)
			{
				$this->session->set_flashdata("message","berhasil");
				redirect("buku","refresh");
			}
		else
			{
				$this->session->set_flashdata("message","gagal");
				redirect("buku","refresh");
			}
	}

	public function creatBuku()
	{

		$this->form_validation->set_rules('id_buku', 'id_buku', 'required');
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');
		$this->form_validation->set_rules('penerbit', 'penerbit', 'required');
		$this->form_validation->set_rules('pengarang', 'pengarang', 'required');			
		$this->form_validation->set_rules('no_rak', 'no_rak', 'required');
		if ($this->form_validation->run() === FALSE)
		{
			/*layout*/	
			$data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
			$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
			$data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
			$data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
			$data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
			$data['model'] = $this->Buku_model;


			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/buku/creatBuku',$data);
			$this->load->view('template/footerAdmin');
		}
		else
		{
			$this->db->where('id_buku',$this->input->post('id_buku'));
			$isi=$this->db->count_all_results('tb_buku');
			if($isi==0){
				$data= array (
						'id_buku' => $this->input->post('id_buku'),
						'ISBN' => $this->input->post('ISBN'),
						'judul' => $this->input->post('judul'),
						'id_kategori' => $this->input->post('kategori'),
						'id_penerbit' => $this->input->post('penerbit'),
						'id_pengarang' => $this->input->post('pengarang'),
						'no_rak' => $this->input->post('no_rak'),
						'thn_terbit' => $this->input->post('thn_terbit'),
						'ket' => $this->input->post('keterangan'),
					);

						$this->Buku_model->insertData('tb_buku',$data);
						redirect ('buku','refresh');
			}
		}
	}

	public function editBuku()
	{
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');
		$this->form_validation->set_rules('penerbit', 'penerbit', 'required');
		$this->form_validation->set_rules('pengarang', 'pengarang', 'required');			
		$this->form_validation->set_rules('no_rak', 'no_rak', 'required');	
		$id_buku = $this->input->get('id_buku', TRUE);	
	
		
		if ($this->form_validation->run() === FALSE)
		{
			$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
			$data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
			$data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
			$data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
			$data['buku'] = $this->Buku_model->get_detail('tb_buku','id_buku', $id_buku);


			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/buku/editBuku',$data);
			$this->load->view('template/footerAdmin');		
		}
		else
		{
			$id_buku=$this->input->post('id');
			$data= array (
						'ISBN' => $this->input->post('ISBN'),
						'judul' => $this->input->post('judul'),
						'id_kategori' => $this->input->post('kategori'),
						'id_penerbit' => $this->input->post('penerbit'),
						'id_pengarang' => $this->input->post('pengarang'),
						'no_rak' => $this->input->post('no_rak'),
						'thn_terbit' => $this->input->post('thn_terbit'),
						'ket' => $this->input->post('keterangan'),
					);

			$this->Buku_model->updateData('tb_buku',$data,$id_buku,'id_buku');
			redirect('Buku','refresh');
			

		}
	}

	public function detailStok()
	{
		$id_buku = $this->input->get('id_buku', TRUE);

		/*data yang ditampilkan*/
		$data['data_stok_buku'] = $this->Buku_model->get_detail("tb_detail_buku",'id_buku', $id_buku);
		$data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
		$data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
		$data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
		$data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
		$data['id']= $id_buku;
		$data['error']="";
		
		/*masukan data kedalam view */
		$data['title'] = 'Admin';
		$data['active'] = 'active';
		$this->load->view('template/headerAdmin',$data);
		$this->load->view('template/asideAdmin');
		$this->load->view('admin/buku/datDetail',$data);
		$this->load->view('template/footerAdmin');
	}

	public function delDetail()
	{
		$id_buku = $this->input->get('id_buku',TRUE);		
		$id_det_buku = $this->input->get('id_detail_buku',TRUE);	

		$hapus = array('id_detail_buku' => $id_det_buku);
		$status=$this->Buku_model->get_detail1('tb_detail_buku','id_detail_buku',$id_det_buku);
		//jika status buku tersedia, maka dapat dihapus. jika status dipinjamkan tidak dapat dihapus
		if($status['status']==1){
		$this->Buku_model->deletedetData('tb_detail_buku','id_detail_buku',$id_det_buku);
		$stok_sebelum=$this->Buku_model->get_stok($id_buku)->stok;
		$stok_sesudah=$stok_sebelum-1;
		$data2= array (
					'stok' => $stok_sesudah,
		);
		$this->Buku_model->updateData('tb_buku',$data2,$id_buku,'id_buku');
		header('location:'.base_url().'buku/detailStok/?id_buku='.$id_buku.'');
		}else{
			//tampilkan error
			 $this->session->set_flashdata("message","<div class='callout callout-info'>
            <h4>Info!</h4>
            <p>Data stok buku tidak dapat dihapus karena status dipinjamkan</p>
            </div>");
        header('location:'.base_url().'buku/detailStok/?id_buku='.$id_buku.'');
		}
	}

	public  function creatDetail()
	{
		$this->form_validation->set_rules('no_buku1', 'no_buku1', 'required');
		$this->form_validation->set_rules('no_buku2', 'no_buku2', 'required');

		$data['id_buku'] = $this->input->get('id_buku', TRUE);		


		if ($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/buku/creatDetail',$data);
			$this->load->view('template/footerAdmin');
		}
		else
		{
			//ambil id buku
			$id_buku = $this->input->post('id_buku');
			
			//ambil no awal dan no akhir buku (range)
			$no_awal=$this->input->post('no_buku1');
			$no_akhir=$this->input->post('no_buku2');

			//validasi no awal tidak boleh lebih besar dari no akhir
			if($no_awal>$no_akhir){
				//tampilkan error
				 $this->session->set_flashdata("message","<div class='callout callout-info'>
                <h4>Info!</h4>
                <p>No awal tidak boleh lebih besar dari No akhir</p>
                </div>");
            header('location:'.base_url().'buku/detailStok/?id_buku='.$id_buku.'');
			}
			else{

			//deklarasi array
			$no_buku=array();
			$data=array();
			//masukan masing - masing no buku awal sampai akhir
			for ($i=$no_awal; $i <= $no_akhir  ; $i++) { 
				$no_buku[]=$i;
			}
			//hitung jumlah buku
			$jml=count($no_buku);
			//masukan no buku beserta id buku dan status nya
			for ($i=0; $i < $jml  ; $i++) { 
			$data[]= array (
					'id_buku' => $this->input->post('id_buku'),
					'no_buku' => $no_buku[$i],
					'status' => $this->input->post('status'),
				);
			}
			
			//insert buku dengan no buku secara berurutan sesuai range
			 	$this->Buku_model->insertData_batch('tb_detail_buku',$data);

			//update stock
			$stok_sebelum=$this->Buku_model->get_stok($id_buku)->stok;
			$stok_sesudah=$stok_sebelum+$jml;
			$data2= array (
					'stok' => $stok_sesudah,
				);
			$this->Buku_model->updateData('tb_buku',$data2,$id_buku,'id_buku');

			header('location:'.base_url().'buku/detailStok/?id_buku='.$id_buku.'');
			}
		
		}
	}

	public function editDetail()
	{

		$this->form_validation->set_rules('no_buku', 'no_buku', 'required');
		$id_det_buku = $this->input->get('id_detail_buku', TRUE);
		
		if($this->form_validation->run()==FALSE)
		{
			$data['id_detail_buku'] = $id_det_buku;		
			$data['id_buku'] = $this->input->get('id_buku', TRUE);
			/*data yang ditampilkan*/
			$data['det_buku'] = $this->Buku_model->get_detail('tb_detail_buku','id_detail_buku', $id_det_buku);

			$data['title'] = 'Admin';
			$data['active'] = 'active';
			$this->load->view('template/headerAdmin',$data);
			$this->load->view('template/asideAdmin');
			$this->load->view('admin/buku/editDetail',$data);
			$this->load->view('template/footerAdmin');

		}else
		{
			$id_buku = $this->input->post('id_buku');
			$data= array (
					'id_buku' => $this->input->post('id_buku'),
					'no_buku' => $this->input->post('no_buku'),
					'status' => $this->input->post('status'),
				);
		
			$this->Buku_model->updateData('tb_detail_buku',$data,$id_det_buku,'id_detail_buku');		
			header('location:'.base_url().'buku/detailStok/?id_buku='.$id_buku.'');	
		}
	}

}