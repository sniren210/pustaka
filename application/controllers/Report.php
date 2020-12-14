<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
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
        $data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
        $data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
        $data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
        $data['model'] = $this->Buku_model;
        $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
        $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");

		$data['title'] = 'Admin';
		$data['active'] = 'active';
		$this->load->view('template/headerAdmin',$data);
		$this->load->view('template/asideAdmin');
		$this->load->view('admin/report/datReport',$data);
		$this->load->view('template/footerAdmin');
	}

	public function  pdf1()
	{
		$this->load->helper('pdf_helper');
        $data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
        $data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
        $data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
        $data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
        $data['model'] = $this->Buku_model;
        $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
        $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");

    	$this->load->view('admin/report/pdfReport',$data);
	}

	public function excel1()
	{
        $ambildata = $this->mread->export_kontak();
        $data_kategori = $this->Buku_model->getAllData("tb_kategori");
        $data_penerbit= $this->Buku_model->getAllData("tb_penerbit");
        $data_pengarang= $this->Buku_model->getAllData("tb_pengarang");
        $data_rak= $this->Buku_model->getAllData("tb_rak");
        $data_detail_buku= $this->Buku_model->getAllData("tb_detail_buku");
        $data_buku = $this->Buku_model->getAllData("tb_buku");
        $model = $this->Buku_model;
        if(count($data_buku)>0)
        {
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                  ->setCreator("Corro Team") //creator
                    ->setTitle("Para Pejuang Aplikom");  //file title

            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object

            $objget->setTitle('Sample Sheet'); //sheet title
            
            $objget->getStyle("A1:K1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );

            //table header
            $cols = array("A","B","C","D","E","F","G","H","I","J","K");
            
            $val = array("NO","ID Buku ","ISBN","Judul Buku","Kategori","Penerbit","Pengarang","Rak","Tahun","Stok","Keterangan");
            
            for ($a=0;$a<11; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);
                
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(8); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25); // Kontak
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
            }
            
            $baris  = 2;
            $no=1;
            foreach ($data_buku->result() as $frow)
            {    
                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A".$baris, $no); //membaca data nama
                $objset->setCellValue("B".$baris, $frow->id_buku); //membaca data nama
                $objset->setCellValue("C".$baris, $frow->ISBN); //membaca data alamat
                $objset->setCellValue("D".$baris, $frow->judul); //membaca data kontak
                foreach ($data_kategori->result() as $key => $kat) 
                {
                   $idkt=$frow->id_kategori;
                   if ($kat->id_kategori==$idkt) 
                   {
                   $objset->setCellValue("E".$baris, $kat->kategori); //membaca data kontak   
                   }
               }
                foreach ($data_penerbit->result() as $key => $pnr) 
                {
                $idkt1=$frow->id_penerbit;
                   if ($pnr->id_penerbit==$idkt1) 
                   {
                   $objset->setCellValue("F".$baris, $pnr->nama_penerbit); //membaca data kontak   
                   }
               }
                foreach ($data_pengarang->result() as $key => $png) 
                {
                   $idkt2=$frow->id_pengarang;
                   if ($png->id_pengarang==$idkt2) 
                   {
                   $objset->setCellValue("G".$baris, $png->nama_pengarang); //membaca data kontak   
                   }
                }
                foreach ($data_rak->result()  as $op2) 
                {
                    $idkt3=$frow->no_rak;
                      if($op2->no_rak==$idkt3)
                      {
                          $objset->setCellValue("H".$baris, $op2->nama_rak); 
                      }
                  }
                $objset->setCellValue("I".$baris, $frow->thn_terbit); //membaca data alamat
                $objset->setCellValue("J".$baris, $frow->stok);
                $objset->setCellValue("K".$baris, $frow->ket); 
                
                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('K1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                
                $baris++;
                $no++;
            }
            
            $objPHPExcel->getActiveSheet()->setTitle('Data Export');

            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Data".date("Y-m-d H:i:s").".xls");       
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache

            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');
        }else
        {
            redirect('Excel1');
        }
	}

	public function pengembalian()
	{
		/*data yang ditampilkan*/
        $id_buku=$this->input->get('id_buku');
       echo  $id_detail_pinjam=$this->input->post('id_detail_pinjam');
        $data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
        $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
        $data['data_pinjam'] = $this->Buku_model->getAllData("tb_pinjam");
        $data['data_detail_pinjam'] = $this->Buku_model->getAllData("tb_detail_pinjam");
        $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
        $data['data_kembali'] = $this->Buku_model->getAllData("tb_kembali");
        $data['model'] = $this->Buku_model;
        $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
        $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
        //$this->Buku_model->generatePdf($kolom, $data,"Laporan Data Siswa");
        $data['title'] = 'Admin';
		$data['active'] = 'active';
		$this->load->view('template/headerAdmin',$data);
		$this->load->view('template/asideAdmin');
		$this->load->view('admin/report/datPengembalian',$data);
		$this->load->view('template/footerAdmin');
	}

	public function pdf2()
	{
		$this->load->helper('pdf_helper');
         $id_buku=$this->input->get('id_buku');
       echo $id_detail_pinjam=$this->input->post('id_detail_pinjam');
        $data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
        $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
        $data['data_pinjam'] = $this->Buku_model->getAllData("tb_pinjam");
        $data['data_detail_pinjam'] = $this->Buku_model->getAllData("tb_detail_pinjam");
        $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
        $data['data_kembali'] = $this->Buku_model->getAllData("tb_kembali");
        $data['model'] = $this->Buku_model;
        $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
        $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
        
        $this->load->view('admin/report/pdfPengembalian',$data);
	}
}