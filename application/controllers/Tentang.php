<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {
	function __construct(){
		parent:: __construct();
		if(empty($this->session->userdata('email'))){
			redirect('auth');
		}
	} 
	public function index()
	{
		$this->load->view('templates/header');

	}
}

