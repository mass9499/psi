<?php if(!defined('BASEPATH')) exit('No direct script access allowed');   
class Cities_Model extends MX_Controller {
    
    public function  __construct(){      
        parent::__construct();        
    }

    function  get_countries() {
        $query = $this->db->get('countries');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }

     function  get_cities() {
        $query = $this->db->get('cities');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function  get_cities_id($id) {
        $this->db->where('id',$id);
        $query = $this->db->get('cities');
        if($query->num_rows()>0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function  save($data) {
        $query = $this->db->insert('cities', $data); 
        if($query){ return true; } else { return false; }
    }

    function  update($id,$data) {
        $this->db->where('id', $id);
        $query = $this->db->update('cities', $data); 
        if($query){
            return true;
        } else {
            return false;
        }
    }

    function  delete($id) {
        $this->db->where('id', $id);
        $query = $this->db->delete('cities'); 
        //echo $this->db->last_query();
        if($query){
            return true;
        } else {
            return false;
        }
    }
    function  status($id,$status) {
        $data = array('status'=>$status);
        $this->db->where('id', $id);
        $query = $this->db->update('countries', $data); 
         echo $this->db->last_query();
        if($query){
            return true;
        } else {
            return false;
        }
    }
     function  cod_status($id,$status) {
        $data = array('cod'=>$status);
        $this->db->where('id', $id);
        $query = $this->db->update('countries', $data); 
         echo $this->db->last_query();
        if($query){
            return true;
        } else {
            return false;
        }
    }

}