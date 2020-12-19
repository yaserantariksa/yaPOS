<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
	function __construct() 
	{
		parent::__construct();
		check_not_login();
		check_admin();

		$this->load->model('supplier_model');

		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->supplier_model->get();
		$this->template->load('template','supplier/supplier_data',$data);
	}

	public function add()
	{
		$supplier = new stdClass();
		$supplier->supplier_id = null ;
		$supplier->sup_name = null ;
		$supplier->sup_phone = null ;
		$supplier->sup_address = null ;
		$supplier->sup_desc = null ;

		$data = array(
			'page' => 'add',
			'row' => $supplier
		);

		$this->template->load('template','supplier/supplier_form', $data);
	}

	public function edit($id)
	{

		$query = $this->supplier_model->get($id);

		if($query->num_rows() >0 ) {
			$supplier = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $supplier
			);

			$this->template->load('template','supplier/supplier_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('supplier')."';</script>";
		}
	}

	public function proses() {
		$post = $this->input->post(null, true);
		if(isset($_POST['add'])) {
			$this->supplier_model->add($post);
		} else {
			if(isset($_POST['edit'])) {
				$this->supplier_model->edit($post);
			}
		}

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil ditambahkan');</script>" ;
		}

		echo "<script>window.location= '".site_url('supplier')."';</script>";
	}

	public function del() {

		$id = $this->input->post('supplier_id');

		$this->supplier_model->del($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>" ;
		}

		echo "<script>window.location= '".site_url('supplier')."';</script>";
	}

}
