<?php if(!defined('BASEPATH')) exit('No direct script access allowed');   
class doctor_Model extends MX_Controller {
    
    public function  __construct(){      
        parent::__construct();        
    }


    function  get_doctor() {
        // $this->db->where('operator_id',3);
        $query = $this->db->get('doctor');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }

 public function update($tb,$con,$id,$data) {
        $this->db->where($con, $id);
        $query = $this->db->update($tb,$data); 
        if($query){
            return true;
        } else {
            return false;
        }
    }

    function  delete($id) {
        $this->db->where('id', $id);
        $query = $this->db->delete('doctor'); 
        // echo $this->db->last_query();die;
        if($query){
            return true;
        } else {
            return false;
        }
    }

     function  get_doctor_id($id) {
        $this->db->where('id',$id);
        $query = $this->db->get('doctor');
        // echo $this->db->last_query();die;
        if($query->num_rows()>0) {
            return $query->row();
        } else {
            return false;
        }
    }

     public function save($tb,$data) {
        // $this->db->where($con, $id);
        $query = $this->db->insert($tb, 
            $data); 
        if($query){
           return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function  update1($id,$data) {
        $this->db->where('id', $id);
        $query = $this->db->update('doctor', $data); 
        if($query){
            return true;
        } else {
            return false;
        }
    }
}
 