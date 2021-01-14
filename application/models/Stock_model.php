<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends CI_Model
{
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




