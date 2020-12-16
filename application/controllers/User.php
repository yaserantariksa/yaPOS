<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() 
	{
		parent::__construct();
		check_not_login();

		$this->load->model('user_model');
	}

	public function index()
	{
		

		$data['row'] = $this->user_model->get();
		$this->template->load('template','user/user_data', $data);
	}

	public function add() 
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','required|min_length[5]|is_unique[tb_user.username]');
		$this->form_validation->set_rules('password','Password','required|min_length[5]');
		$this->form_validation->set_rules('passconf','Password Konfirmasi','required|matches[password]', array('matches' => '%s tidak sesuai dengan password')
		);
		$this->form_validation->set_rules('name','Nama','required');
		$this->form_validation->set_rules('phone','Telephone','required');
		$this->form_validation->set_rules('level','Level','required');

		$this->form_validation->set_message('required', '%s belum diisi, mohon untuk diisi');
		$this->form_validation->set_message('min_length','{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique','{field} ini sudah di pakai, mohon isi {field} dengan yang lain');


		if($this->form_validation->run() == false) {
			$this->template->load('template','user/user_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_model->add($post);

			if($this->db->affected_rows() > 0 ) {
				echo "
					<script>
						alert('Data berhasil disimpan');
					</script>";
			}
			echo "
					<script>
						window.location ='".site_url('user')."';
					</script>"; 
		}
	}
}
