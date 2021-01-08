<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		
		$this->load->view('login');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE) ;
		if(isset($post['login'])) 
		{
			$this->load->model('user_model');
			$query = $this->user_model->login($post);
			if($query->num_rows() > 0 ) {
				$row = $query->row();
				$params = array(
					'user_id' => $row->user_id,
					'level' => $row->level
				);

            $_SESSION['USERDATA']       = $params;

//die(print_R( $_SESSION['USERDATA']));
//				$this->session->set_userdata($params);
				echo "
				<script>
					alert ('login berhasil') ;
					window.location = ' ".site_url('dashboard')." ';
				</script>";
			} else {
				echo "
				<script>
					alert ('login gagal ! username / password salah') ;
					window.location = ' ".site_url('auth/login')." ';
				</script>";

			}
		}
	}

	public function logout()
	{
            session_unset();
            session_destroy();
		redirect('auth/login') ;
	}

}