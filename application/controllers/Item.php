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

		$config['upload_path'] 		= './upload/item_img' ;
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg' ;
		$config['max_size'] 		= 2048 ;
		$config['file_name']		= 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload',$config) ;

		$post = $this->input->post(null, true);
		if(isset($_POST['add'])) {
			if($this->item_model->cek_barcode($post['item_barcode'])->num_rows() > 0) {
				$this->session->set_flashdata('error',"Barcode $post[item_barcode] sudah dipakai") ;
				redirect('item/add');
			} else {
				
				if(@$_FILES['item_img']['name'] != null ) {
					if($this->upload->do_upload('item_img')) {
						$post['item_img'] = $this->upload->data('file_name') ;
						$this->item_model->add($post);
						if($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('sukses','Data berhasil disimpan') ;
						}
				
						redirect('item');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error',$error) ;
						redirect('item/add');
					} 
				} else {
					$post['image'] = null;
					$this->item_model->add($post);
					if($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('sukses','Data berhasil disimpan') ;
					}
			
					redirect('item');
				}
			}
		} else {
			if(isset($_POST['edit'])) {
				if($this->item_model->cek_barcode($post['item_barcode'],$post['item_id'])->num_rows() > 0) {
					$this->session->set_flashdata('error',"Barcode $post[item_barcode] sudah dipakai") ;
					redirect('item/edit/'.$post['item_id']);
				} else {
					if(@$_FILES['item_img']['name'] != null ) {
						if($this->upload->do_upload('item_img')) {
							
							$item = $this->item_model->get($post['item_id']
							)->row() ;
							if($item->item_img != null ) {
								$target_file = './upload/item_img/'.$item->item_img ;
								unlink($target_file);
							}

							$post['item_img'] = $this->upload->data('file_name') ;
							$this->item_model->edit($post);
							if($this->db->affected_rows() > 0) {
								$this->session->set_flashdata('sukses','Data berhasil disimpan') ;
							}
					
							redirect('item');
						} else {
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('error',$error) ;
							redirect('item/add');
						} 
					} else {
						$post['image'] = null;
						$this->item_model->edit($post);
						if($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('sukses','Data berhasil disimpan') ;
						}				
						redirect('item');						
				}
			}
		}

	}
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
