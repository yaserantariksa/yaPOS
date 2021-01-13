<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends CI_Model
{
    public function add_stock_in($post) {
        $params = [
            'item_id' =>$post['item_id']
        ];
        $this->db->insert('tb_stock',$params);
    }





