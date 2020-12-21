<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {
	function __construct() 
	{
		parent::__construct();
		check_not_login();
		check_admin();

		$this->load->model('unit_model');

		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->unit_model->get();
		$this->template->load('template','unit/unit_data',$data);
	}

	public function add()
	{
		$unit = new stdClass();
		$unit->unit_id = null ;
		$unit->unit_code = null ;
		$unit->unit_name = null ;
		$unit->unit_desc = null ;

		$data = array(
			'page' => 'add',
			'row' => $unit
		);

		$this->template->load('template','unit/unit_form', $data);
	}

	public function edit($id)
	{

		$query = $this->unit_model->get($id);

		if($query->num_rows() >0 ) {
			$unit = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $unit
			);

			$this->template->load('template','unit/unit_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('unit')."';</script>";
		}
	}

	public function proses() {
		$post = $this->input->post(null, true);
		if(isset($_POST['add'])) {
			$this->unit_model->add($post);
		} else {
			if(isset($_POST['edit'])) {
				$this->unit_model->edit($post);
			}
		}

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil ditambahkan');</script>" ;
		}

		echo "<script>window.location= '".site_url('unit')."';</script>";
	}

	public function del() {

		$id = $this->input->post('unit_id');

		$this->unit_model->del($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>" ;
		}

		echo "<script>window.location= '".site_url('unit')."';</script>";
	}

}
