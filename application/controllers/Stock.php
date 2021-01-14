<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model(['item_model','supplier_model','stock_model']);
  }

  public function index()
  {

    $this->template->load('template', 'dashboard');
  }

  public function stock_in_data()
  {
    $this->template->load('template', 'transaction/stock_in/stock_in_data');
  }

  public function stock_in_add()
  {
    $item = $this->item_model->get()->result();
    $supplier = $this->supplier_model->get()->result();
    $data = ['item' => $item, 'supplier' => $supplier];
    $this->template->load('template', 'transaction/stock_in/stock_in_form',$data);
  }

  public function process()
  {
    if (isset($_POST['in_add'])) {
      $post = $this->input->post(null,true) ;
      $this->stock_model->add_stock_in($post);
      $this->item_model->update_stock_in($post);
      if($this->db->affected_rows() > 0) {
        echo "<script>alert('Data berhasil diproses');</script>" ;
      }
  
      echo "<script>window.location= '".site_url('stock/in')."';</script>";

    }
  }
}
