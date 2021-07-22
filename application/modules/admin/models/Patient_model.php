<?php if(!defined('BASEPATH')) exit('No direct script access allowed');   
class Patient_Model extends MX_Controller {
    
    public function  __construct(){      
        parent::__construct();        
    }


    function  get_patient() {
        // $this->db->where('operator_id',3);
         $this->db->select('patient.*,countries.countries_name as country');
        $this->db->join('countries','countries.id = patient.country_id','left');
        $query = $this->db->get('patient');


        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
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
        $query = $this->db->delete('patient'); 
        // echo $this->db->last_query();die;
        if($query){
            return true;
        } else {
            return false;
        }
    }

     function  get_patient_id($id) {
        $this->db->where('patient.id',$id);
        //$this->db->join('ear_implant','ear_implant.patient_id = patient.id','left');
        $query = $this->db->get('patient');
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
        $query = $this->db->update('patient', $data); 
        if($query){
            return true;
        } else {
            return false;
        }
    }
}
 