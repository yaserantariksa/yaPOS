<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_category extends CI_Controller {
	function __construct() 
	{
		parent::__construct();
		check_not_login();
		check_admin();

		$this->load->model('product_category_model');

		
	}

	public function index()
	{
		$data['row'] = $this->product_category_model->get();
		$this->template->load('template','product_category/product_category_data',$data);
	}

	public function add()
	{
		$product_category = new stdClass();
		$product_category->product_cat_id = null ;
		$product_category->product_cat_code = null ;
		$product_category->product_cat_name = null ;
		$product_category->product_cat_desc = null ;

		$data = array(
			'page' => 'add',
			'row' => $product_category
		);

		$this->template->load('template','product_category/product_category_form', $data);
	}

	public function edit($id)
	{

		$query = $this->product_category_model->get($id);

		if($query->num_rows() >0 ) {
			$product_category = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $product_category
			);

			$this->template->load('template','product_category/product_category_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('product_category')."';</script>";

		}
	}

	public function proses() {
		$post = $this->input->post(null, true);
		if(isset($_POST['add'])) {
			$this->product_category_model->add($post);
		} else {
			if(isset($_POST['edit'])) {
				$this->product_category_model->edit($post);
			}
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses','Data berhasil diproses');
			$this->session->set_flashdata('item', 'value');
		}

		redirect('product_category');
	}

	public function del() {

		$id = $this->input->post('product_cat_id');

		$this->product_category_model->del($id);

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses','Data berhasil dihapus');
		}

		redirect('product_category');
	}

}
