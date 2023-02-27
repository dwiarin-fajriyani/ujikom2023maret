<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
	} 

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('templates/headerNavless');
			$this->load->view('formlogin');
			$this->load->view('templates/footer');
		} else {
			$this->_login();
		}
	}

	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row();

		//jika usernya ada
		if ($user) {
			//jika usernya aktif
			if ($user->is_active == 1) {
				//cek password
				if(password_verify($password, $user->password)){
					$data = [
						'email' => $user->email,
						'role_id' => $user->role_id,
						'id' => $user->no_rek_kd_petugas
					];
					$this->session->set_userdata($data);
					if ($user->role_id == 1 OR $user->role_id == 2) {
						redirect('home');
					} else {
						redirect('member');	
					}
					
				} else{
					$this->session->set_flashdata('notif', 'Password salah!');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('notif', 'Email belum diaktivasi!');
				redirect('auth');
			}
		} else{
			$this->session->set_flashdata('notif', 'Email belum terdaftar!');
			redirect('auth');
		}

	}

	public function logout() {
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		redirect('auth');
	}
}

