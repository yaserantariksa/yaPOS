<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    public function get($id=null) {
        $this->db->from('tb_customer');
        if($id != null ) {
            $this->db->where('cust_id',$id);
        }
        $query = $this->db->get();
        return $query ;
        
    }

    public function add($post)
    {
        $params = [
            'cust_name' => $post['cust_name'],
            'cust_membercard' => $post['cust_membercard'],
            'cust_phone' => $post['cust_phone'],
            'cust_email' => $post['cust_email'],
            'cust_ktp' => $post['cust_ktp'],
            'cust_birthday' => $post['cust_birthday'],
            'cust_address' => $post['cust_address'],
            'cust_category' => $post['cust_category']
        ];
        $this->db->insert('tb_customer', $params);

    }

    public function edit($post)
    {
        $params = [
            'cust_name' => $post['cust_name'],
            'cust_membercard' => $post['cust_membercard'],
            'cust_phone' => $post['cust_phone'],
            'cust_email' => $post['cust_email'],
            'cust_ktp' => $post['cust_ktp'],
            'cust_birthday' => $post['cust_birthday'],
            'cust_address' => $post['cust_address'],
            'cust_category' => $post['cust_category'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('cust_id' , $post['cust_id']);
        $this->db->update('tb_customer', $params);
    }

    public function del($id)
    {
        $this->db->where('cust_id',$id) ;
        $this->db->delete('tb_customer');
    }

}