<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogDaf extends CI_Controller {

	public function index()
	{

		if ($this->session->userdata('username')) {
			redirect('app');
		}

		$this->form_validation->set_rules('username','Username','trim|required',[
            'required' => 'isi dulu Username!'
        ]);
		$this->form_validation->set_rules('password','Password','trim|required',[
            'required' => 'isi dulu password!'
        ]);

		if ($this->form_validation->run() == false) {

			$data['title'] = 'Login';
			$this->load->view('LogDaf/login',$data);
		}else{
			$this->log();	
		}

	}

	private function log()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		$row = $this->db->get_where('user', ['username' => $user])->row_array();
		
		if($row){
			if (password_verify($pass,$row['password'])) {
				
				$data = [
					'username' => $row['username'],
					'roleId' => $row['roleId']
				];


				$this->session->set_userdata($data);
				if ($row['roleId'] == 1) {
					redirect('admin');
				} else {
					redirect('app');
				}
				
			} else {
				$this->session->set_flashdata('pesan','<span class="alert alert-danger" style="display:block;"> Password salah</span>');
				redirect('LogDaf');
			}
			
		}else{
			$this->session->set_flashdata('pesan','<span class="alert alert-danger" style="display:block;"> Akun tidak tersedia </span>');
			redirect('LogDaf');
		}
	}
	public function daftar()
	{
		if ($this->session->userdata('username')) {
			redirect('app');
		}

		$this->form_validation->set_rules('username','Username','trim|required|is_unique[user.username]',[
			'required' => 'Isi Dulu !',
			'is_unique' => 'Username Sudah Ada'
		]);
		$this->form_validation->set_rules('password','Password','trim|required',[
			'required' => 'Isi Dulu !'
		]);
		$this->form_validation->set_rules('email','Email','required',[
			'required' => 'isi email Dulu'
		]);
		$this->form_validation->set_rules('passconf','Passconf','trim|required|matches[password]',[
			'required' => 'Isi Dulu',
			'matches' => 'password tidak cocok'
		]);

		if ($this->form_validation->run() == false) {

			$data['title'] = 'Daftar'; 
			$this->load->view('LogDaf/daftar',$data);
		} else {
			$data = [
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => htmlspecialchars(password_hash($this->input->post('password'),PASSWORD_DEFAULT)),
				'roleId' => 0,
				'email' => htmlspecialchars($this->input->post('email')),
				'gambar' => 'default.png'
				];
			$this->db->insert('user',$data);

			$this->session->set_flashdata('pesan', '<span class="alert alert-success" style="display:block;">Akun Berhasil Di Buat</span>');
			redirect('LogDaf');
		}
		
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('roleId');

		redirect('app');
	}
}
