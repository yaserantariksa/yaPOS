<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item_model extends CI_Model
{
    public function get($id=null) {
        $this->db->from('tb_product_item');
        $this->db->join('tb_product_category', 'tb_product_category.product_cat_id = tb_product_item.product_cat_id');
        $this->db->join('tb_unit', 'tb_unit.unit_id = tb_product_item.unit_id');
        
        if($id != null ) {
            $this->db->where('item_id',$id);
        }
        $this->db->order_by('item_barcode','asc');
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
            'item_harjual2' => $post['item_harjual2'],
            'item_img' => $post['item_img']

        ];
        $this->db->insert('tb_product_item', $params);

    }

    function cek_barcode($code, $id = 0) {
        $this->db->from('tb_product_item');
        $this->db->where('item_barcode',$code);
        if($id != null) {
            $this->db->where('item_id !=',$id);
        }
        $query = $this->db->get();
        return $query;
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
            'item_img' => $post['item_img'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if($post['item_img' != null ]) {
            $params['item_img'] = $post['item_img'];
        }

        $this->db->where('item_id' , $post['item_id']);
        $this->db->update('tb_product_item', $params);
    }

    public function del($id)
    {
        $this->db->where('item_id',$id) ;
        $this->db->delete('tb_product_item');
    }

}





