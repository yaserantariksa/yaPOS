<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item_model extends CI_Model
{

     // start datatables
     var $table = 'tb_product_item';
     var $column_order = array(null, 'item_barcode', 'item_name', 'product_cat_name', 'unit_name', 'item_harbel','item_harjual1','item_harjual2', 'item_stock'); //set column field database for datatable orderable
     var $column_search = array('item_barcode', 'item_name', 'product_cat_name'); //set column field database for datatable searchable
     var $order = array('item_barcode' => 'asc'); // default order 
  
     public function __construct() {
         parent::__construct();
         $this->load->database();
     }
     
     private function _get_datatables_query() {
        //  $this->db->select('p_item.*, p_category.name as category_name, p_unit.name as unit_name');
        // code di atas untuk alias
         $this->db->from($this->table);
         $this->db->join('tb_product_category', 'tb_product_item.product_cat_id = tb_product_category.product_cat_id');
         $this->db->join('tb_unit', 'tb_product_item.unit_id = tb_unit.unit_id');
         // code diaatas untuk join table serverside
         $i = 0;
         foreach ($this->column_search as $item) { // loop column 
             if($_POST['search']['value']) { // if datatable send POST for search
                 if($i===0) { // first loop
                     $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                     $this->db->like($item,$_POST['search']['value']);
                 } else {
                     $this->db->or_like($item,$_POST['search']['value']);
                 }
                 if(count($this->column_search) - 1 == $i) //last loop
                     $this->db->group_end(); //close bracket
             }
             $i++;
         }
          
         if(isset($_POST['order'])) { // here order processing
             $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
         }  else if(isset($this->order)) {
             $order = $this->order;
             $this->db->order_by(key($order), $order[key($order)]);
         }
     }
     function get_datatables() {
         $this->_get_datatables_query();
         if($_POST['length'] != -1)
         $this->db->limit($_POST['length'], $_POST['start']);
         $query = $this->db->get();
         return $query->result();
     }
     function count_filtered() {
         $this->_get_datatables_query();
         $query = $this->db->get();
         return $query->num_rows();
     }
     function count_all() {
         $this->db->from($this->table);
         return $this->db->count_all_results();
     }
     // end datatables


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
            'updated' => date('Y-m-d H:i:s')
        ];
        if($post['item_img'] != null) {
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

    public function update_stock_in($data) 
    {
        $qty = $data['stock_qty'];
        $id = $data['item_id'];
        $harbel = $data['stock_harbel'] ;

        $sql = "UPDATE tb_product_item SET item_stock = item_stock + '$qty' WHERE item_id = '$id' " ;
        $updateharbel = "UPDATE tb_product_item SET item_harbel = '$harbel' ";

        $this->db->query($sql);
        $this->db->query($updateharbel);

    }

}





