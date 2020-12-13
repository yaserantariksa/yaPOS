<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
		check_not_login();

		$this->load->model('user_model');
		$data['row'] = $this->user_model->get();
		$this->template->load('template','user/user_data', $data);
	}

	public function add() 
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_rules('passwordconf','konfirmasi password','required|matches["password"]');
		$this->form_validation->set_rules('name','nama','required');
		$this->form_validation->set_rules('phone','telepon','required');

		if($this->form_validation->run() == false) {
			$this->template->load('template','user/user_form_add');
		} else {
			echo "proses simpan user baru" ;
		}
	}
}
