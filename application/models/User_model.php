<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('username',$post['username']);
        $this->db->where('password',sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id=null) {
        $this->db->from('tb_user');
        if($id != null ) {
            $this->db->where('user_id',$id);
        }
        $query = $this->db->get();
        return $query ;
    }

}


