<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_model extends CI_Model
{
    public function get($id=null) {
        $this->db->from('tb_unit');
        if($id != null ) {
            $this->db->where('unit_id',$id);
        }
        $query = $this->db->get();
        return $query ;
        
    }

    public function add($post)
    {
        $params = [
            'unit_code' => $post['unit_code'],
            'unit_name' => $post['unit_name'],
            'unit_desc' => empty($post['unit_desc']) ? null : $post['unit_desc']
        ];
        $this->db->insert('tb_unit', $params);

    }

    public function edit($post)
    {
        $params = [
            'unit_code' => $post['unit_code'],
            'unit_name' => $post['unit_name'],
            'unit_desc' => empty($post['unit_desc']) ? null : $post['unit_desc']
        ];
        $this->db->where('unit_id' , $post['unit_id']);
        $this->db->update('tb_unit', $params);
    }

    public function del($id)
    {
        $this->db->where('unit_id',$id) ;
        $this->db->delete('tb_unit');
    }

}





