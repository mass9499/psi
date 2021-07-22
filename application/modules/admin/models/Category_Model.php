<?php if(!defined('BASEPATH')) exit('No direct script access allowed');   
class Category_Model extends MX_Controller {
    
    public function  __construct(){      
        parent::__construct();        
    }

    function  get_category() {
        $query = $this->db->get('category');
        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function  get_category_id($id) {
        $this->db->where('category_id',$id);
        $query = $this->db->get('category');
        if($query->num_rows()>0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function  save($data) {
        $query = $this->db->insert('category', $data); 
        if($query){ return true; } else { return false; }
    }

    function  update($id,$data) {
        $this->db->where('category_id', $id);
        $query = $this->db->update('category', $data); 
        if($query){
            return true;
        } else {
            return false;
        }
    }

    function  delete($id) {
        $this->db->where('category_id', $id);
        $query = $this->db->delete('category'); 
        //echo $this->db->last_query();
        if($query){
            return true;
        } else {
            return false;
        }
    }

}