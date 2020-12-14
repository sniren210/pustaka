<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

 
	public function index()
	{
		$data['title'] = 'Rak Buku';

		$this->load->view('template/header', $data);
		$this->load->view('global/rakBuku');
		$this->load->view('template/footer');
	}
	public function pendidikan()
	{
		$data['title'] = 'pendidikan';

		$this->load->view('template/header', $data);
		$this->load->view('global/pendidikan');
		$this->load->view('template/footer');	
	}
		public function Umum()
	{
		$data['title'] = 'Umum';

		$this->load->view('template/header', $data);
		$this->load->view('global/Umum');
		$this->load->view('template/footer');	
	}
		public function Novel()
	{
		$data['title'] = 'Novel';

		$this->load->view('template/header', $data);
		$this->load->view('global/Novel');
		$this->load->view('template/footer');	
	}
		public function Komik()
	{
		$data['title'] = 'Komik';

		$this->load->view('template/header', $data);
		$this->load->view('global/Komik');
		$this->load->view('template/footer');	
	}
	public function tentang()
	{
		$data['title'] = 'tentang';

		$this->load->view('template/header', $data);
		$this->load->view('global/tentang');
		$this->load->view('template/footer');	
	}
	public function kontak()
	{
		$data['title'] = 'tentang';

		$this->load->view('template/header', $data);
		$this->load->view('global/kontak');
		$this->load->view('template/footer');	
	}
	public function staff()
	{
		$data['title'] = 'staff';

		$this->load->view('template/header', $data);
		$this->load->view('global/staff');
		$this->load->view('template/footer');	
	}
	public function rendi()
	{
		$data['title'] = 'rendi';
		$this->load->view('template/header', $data);
		$this->load->view('global/rendi');
		$this->load->view('template/footer');	
	}
	public function ghifari()
	{
		$data['title'] = 'ghifari';
		$this->load->view('template/header', $data);
		$this->load->view('global/ghifari');
		$this->load->view('template/footer');	
	}
	public function rio()
	{
		$data['title'] = 'rio';
		$this->load->view('template/header', $data);
		$this->load->view('global/rio');
		$this->load->view('template/footer');	
	}
	public function akun()
	{
		$data['title'] = 'akun';
		$this->load->view('template/header', $data);
		$this->load->view('global/akun');
		$this->load->view('template/footer');	
	}
}
