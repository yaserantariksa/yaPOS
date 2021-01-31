<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends CI_Model
{
    public function get($id= null) {
        $this->db->from('tb_stock');
        if($id != null) {
            $this->db->where('stock_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id) {
        $this->db->where('stock_id', $id);
        $this->db->delete('tb_stock');
    }
    public function get_stock_in() {
        $this->db->select('*') ;
        $this->db->from('tb_stock') ;
        $this->db->join('tb_product_item', 'tb_stock.item_id = tb_product_item.item_id') ;
        $this->db->join('tb_supplier', 'tb_stock.supplier_id = tb_supplier.supplier_id','left') ;
        $this->db->where('stock_type' , 'in') ;
        $this->db->order_by('stock_id','desc') ;
        $query = $this->db->get() ;
        return $query ;

    }
    public function add_stock_in($post) {
        $params = [
            'item_id' =>$post['item_id'],
            'stock_type' => 'in',
            'stock_detail' => $post['stock_detail'],
            'supplier_id' => $post['supplier_id'] == '- Pilih -' ? null : $post['supplier_id'],
            'stock_qty' => $post['stock_qty'],
            'stock_harbel' => $post['stock_harbel'],
            'stock_date' => $post['stock_date'],
            'user_id' => $_SESSION['USERDATA']['user_id']
        ];
        $this->db->insert('tb_stock',$params);
    }
}




