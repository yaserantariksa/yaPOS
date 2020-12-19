<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    public function get($id=null) {
        $this->db->from('tb_supplier');
        if($id != null ) {
            $this->db->where('supplier_id',$id);
        }
        $query = $this->db->get();
        return $query ;
        
    }

    public function add($post)
    {
        $params = [
            'sup_name' => $post['sup_name'],
            'sup_phone' => $post['sup_phone'],
            'sup_address' => $post['sup_address'],
            'sup_desc' => empty($post['sup_desc']) ? null : $post['sup_desc']
        ];
        $this->db->insert('tb_supplier', $params);

    }

    public function edit($post)
    {
        $params = [
            'sup_name' => $post['sup_name'],
            'sup_phone' => $post['sup_phone'],
            'sup_address' => $post['sup_address'],
            'sup_desc' => empty($post['sup_desc']) ? null : $post['sup_desc'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('supplier_id' , $post['supplier_id']);
        $this->db->update('tb_supplier', $params);
    }

    public function del($id)
    {
        $this->db->where('supplier_id',$id) ;
        $this->db->delete('tb_supplier');
    }

}





