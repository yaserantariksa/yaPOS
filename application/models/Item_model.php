<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item_model extends CI_Model
{
    public function get($id=null) {
        $this->db->from('tb_product_item');
        if($id != null ) {
            $this->db->where('item_id',$id);
        }
        $query = $this->db->get();
        return $query ;
        
    }

    public function add($post)
    {
        $params = [
            'item_barcode' => $post['item_barcode'],
            'item_name' => $post['item_name'],
            'product_cat_id' => $post['product_cat_id'],
            'unit_id' => $post['unit_id'],
            'item_harbel' => $post['item_harbel'],
            'item_harjual1' => $post['item_harjual1'],
            'item_harjual2' => $post['item_harjual2']

        ];
        $this->db->insert('tb_product_item', $params);

    }

    public function edit($post)
    {
        $params = [
            'item_barcode' => $post['item_barcode'],
            'item_name' => $post['item_name'],
            'product_cat_id' => $post['product_cat_id'],
            'unit_id' => $post['unit_id'],
            'item_harbel' => $post['item_harbel'],
            'item_harjual1' => $post['item_harjual1'],
            'item_harjual2' => $post['item_harjual2'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('item_id' , $post['item_id']);
        $this->db->update('tb_product_item', $params);
    }

    public function del($id)
    {
        $this->db->where('item_id',$id) ;
        $this->db->delete('tb_product_item');
    }

}





