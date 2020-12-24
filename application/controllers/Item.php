<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item extends CI_Controller {
	function __construct() 
	{
		parent::__construct();
		check_not_login();
		check_admin();

		$this->load->model(['item_model','product_category_model','unit_model']);

		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->item_model->get();
		$this->template->load('template','item/item_data',$data);
	}

	public function add()
	{
		$item = new stdClass();
		$item->item_id = null ;
		$item->item_barcode = null ;
		$item->item_name = null ;
		$item->product_cat_id = null ;
        $item->unit_id = null ;
        $item->item_harbel = null ;
        $item->item_harjual1 = null ;
        $item->item_harjual2 = null ;

        $query_category = $this->product_category_model->get();

        $query_unit = $this->unit_model->get();
        $unit[null] = '- Pilih -' ;
        foreach($query_unit->result() as $unt) {
            $unit[$unt->unit_id] = $unt->unit_code ;
        }

		$data = array(
			'page' => 'add',
            'row' => $item,
            'category' => $query_category,
            'unit' => $unit, 'selectedunit' => null
		);

		$this->template->load('template','item/item_form', $data);
	}

	public function edit($id)
	{

		$query = $this->item_model->get($id);

		if($query->num_rows() >0 ) {
			$item = $query->row();
			$query_category = $this->product_category_model->get();

			$query_unit = $this->unit_model->get();
			$unit[null] = '- Pilih -' ;
			foreach($query_unit->result() as $unt) {
				$unit[$unt->unit_id] = $unt->unit_code ;
			}

			$data = array(
				'page' => 'edit',
				'row' => $item,
				'category' => $query_category,
				'unit' => $unit, 'selectedunit' => $item->unit_id
			);

			$this->template->load('template','item/item_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('item')."';</script>";
		}
	}

	public function proses() {
		$post = $this->input->post(null, true);
		if(isset($_POST['add'])) {
			$this->item_model->add($post);
		} else {
			if(isset($_POST['edit'])) {
				$this->item_model->edit($post);
			}
		}

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil diproses');</script>" ;
		}

		echo "<script>window.location= '".site_url('item')."';</script>";
	}

	public function del() {

		$id = $this->input->post('item_id');

		$this->item_model->del($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>" ;
		}

		echo "<script>window.location= '".site_url('item')."';</script>";
	}

}
