<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_category_model extends CI_Model
{
    public function get($id=null) {
        $this->db->from('tb_product_category');
        if($id != null ) {
            $this->db->where('product_cat_id',$id);
        }
        $query = $this->db->get();
        return $query ;
        
    }

    public function add($post)
    {
        $params = [
            'product_cat_code' => $post['product_cat_code'],
            'product_cat_name' => $post['product_cat_name'],
            'product_cat_desc' => empty($post['product_cat_desc']) ? null : $post['product_cat_desc']
        ];
        $this->db->insert('tb_product_category', $params);

    }

    public function edit($post)
    {
        $params = [
            'product_cat_code' => $post['product_cat_code'],
            'product_cat_name' => $post['product_cat_name'],
            'product_cat_desc' => empty($post['product_cat_desc']) ? null : $post['product_cat_desc']
        ];
        $this->db->where('product_cat_id' , $post['product_cat_id']);
        $this->db->update('tb_product_category', $params);
    }

    public function del($id)
    {
        $this->db->where('product_cat_id',$id) ;
        $this->db->delete('tb_product_category');
    }

}





