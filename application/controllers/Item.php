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

	function get_ajax() {
        $list = $this->item_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
			$row[] = $item->item_barcode;
			// .'<br><a href="'.site_url('item/barcode_qrcode/'.$item->item_id).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>'
            $row[] = $item->item_img != null ? '<img src="'.base_url('upload/item_img/'.$item->item_img).'" class="img" style="width:90px">' : null;
			
            $row[] = $item->item_name;
            $row[] = $item->product_cat_name;
            $row[] = $item->unit_name;
			$row[] = indo_currency($item->item_harbel);
			$row[] = indo_currency($item->item_harjual1);
			$row[] = indo_currency($item->item_harjual2);
            $row[] = $item->item_stock;
            // add html for action
			$row[] = '<a href="'.site_url('item/edit/'.$item->item_id).'" class="btn btn-primary btn-xs px-2"><i class="fas fa-pencil-alt mr-2"></i> Update</a>
			<a href="'.site_url('item/del/'.$item->item_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs px-2"><i class="fas fa-trash mr-3"></i>Delete </a>';

			


            $data[] = $row;
        }
        $output = array(
                    "draw" => $_POST['draw'],
                    "recordsTotal" => $this->item_model->count_all(),
                    "recordsFiltered" => $this->item_model->count_filtered(),
                    "data" => $data,
				);
				
        // output to json format
        echo json_encode($output);
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
				echo "<script>alert('barcode sudah dipakai');</script>" ;
				echo "<script>window.location= '".site_url('item/add')."';</script>";
			} else {
				
				if(@$_FILES['item_img']['name'] != null ) {
					if($this->upload->do_upload('item_img')) {
						$post['item_img'] = $this->upload->data('file_name') ;
						$this->item_model->add($post);
						if($this->db->affected_rows() > 0) {
							echo "<script>alert('Data berhasil disimpan');</script>" ;
						}
				
						echo "<script>window.location= '".site_url('item')."';</script>";
					} else {
						echo "<script>alert('Data gagal disimpan');</script>" ;
						echo "<script>window.location= '".site_url('item/add')."';</script>";
					} 
				} else {
					$post['image'] = null;
					$this->item_model->add($post);
					if($this->db->affected_rows() > 0) {
						echo "<script>alert('Data berhasil disimpan');</script>" ;
					}
			
					echo "<script>window.location= '".site_url('item')."';</script>";
				}
			}
		} else {
			if(isset($_POST['edit'])) {
				if($this->item_model->cek_barcode($post['item_barcode'],$post['item_id'])->num_rows() > 0) {
					echo "<script>alert('Barcode sudah dipakai');</script>" ;
					echo "<script>window.location= '".site_url('item/edit/'.$post['item_id'])."';</script>";
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
								echo "<script>alert('Data berhasil disimpan');</script>" ;
								}

								echo "<script>window.location= '".site_url('item')."';</script>";
						} else {
							echo "<script>alert('Data gagal disimpan');</script>" ;
						}

						echo "<script>window.location= '".site_url('item/add')."';</script>";
					} else {
						$post['image'] = null;
						$this->item_model->edit($post);
						if($this->db->affected_rows() > 0) {
							echo "<script>alert('Data berhasil disimpan');</script>" ;
						}

						echo "<script>window.location= '".site_url('item')."';</script>";						
				
					}
				}
			}
		}
	
	}
	public function del($id) {
		$del = $this->item_model->get($id);

		$item = $this->item_model->get($id)->row() ;
			if($item->item_img != null ) {
				$target_file = './upload/item_img/'.$item->item_img ;
				
				// var_dump($target_file);
				unlink($target_file);

			}

		$this->item_model->del($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>" ;
		}

		echo "<script>window.location= '".site_url('item')."';</script>";
	}

	

}

