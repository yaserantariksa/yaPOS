<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	function __construct() 
	{
		parent::__construct();
		check_not_login();
		check_admin();

		$this->load->model('customer_model');

		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->customer_model->get();
		$this->template->load('template','customer/customer_data',$data);
	}

	
	public function add()
	{
		$customer = new stdClass();
		$customer->cust_id = null ;
		$customer->cust_name = null ;
		$customer->cust_membercard = null ;
		$customer->cust_phone = null ;
		$customer->cust_email = null ;
		$customer->cust_ktp = null ;
		$customer->cust_birthday = null ;
		$customer->cust_address = null ;
		$customer->cust_category = null ;

		$data = array(
			'page' => 'add',
			'row' => $customer
		);

		$this->template->load('template','customer/customer_form', $data);
	}

	public function edit($id)
	{

		$query = $this->customer_model->get($id);

		if($query->num_rows() >0 ) {
			$customer = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $customer
			);

			$this->template->load('template','customer/customer_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('customer')."';</script>";
		}
	}

	public function proses() {
		$post = $this->input->post(null, true);
		if(isset($_POST['add'])) {
			$this->customer_model->add($post);
		} else {
			if(isset($_POST['edit'])) {
				$this->customer_model->edit($post);
			}
		}

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil diproses');</script>" ;
		}

		echo "<script>window.location= '".site_url('customer')."';</script>";
	}

	public function del() {

		$id = $this->input->post('cust_id');

		$this->customer_model->del($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>" ;
		}

		echo "<script>window.location= '".site_url('customer')."';</script>";
	}
}