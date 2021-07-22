<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');   
error_reporting('0');
class Admin_Model extends CI_Model {
    
    public function  __construct(){      
        parent::__construct();  
    }

    public function  login($data) {
        $condition = "email = '".$data['email']."' AND (password ='".md5($data['password'])."' OR activation_code = '".md5($data['password'])."')";
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where($condition);
        $this->db->where_in(array(1,2));
		$this->db->limit(1);
		$query = $this->db->get();
		 // echo $this->db->last_query();die;

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
    }

      function get_results(){
        $this->db->select('percentage');
        $this->db->join('patient','patient.id = test_history.patient_id','inner');
        $this->db->join('doctor','doctor.id = test_history.doctor_id','inner');
        $this->db->join('level','level.id = test_history.level_id','inner');
        $this->db->group_by(array('test_history.doctor_id','test_history.patient_id','test_history.level_id'));
   
        //$this->db->select('percentage');
        return $this->db->get('test_history')->result();
    }

    public function monthwise_patient()
    {
       
       $this->db->select('month(register_date) as month, count(id) as patients');
        $this->db->group_by('MONTH(register_date)');
       $query = $this->db->get('patient');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function  login_history($data) {
        $query = $this->db->insert('login_history', $data); 
       // echo $this->db->last_query();exit;
        if($query){ return true; } else { return false; }
    }
    
    function table($table,$array=""){
        if($array){
            foreach ($array as $key => $value) {
               $this->db->where($key,$value);
            }
        }
        
        $query = $this->db->get($table);
        return $query->num_rows() ;
    }


    function get_table($table){
        $query = $this->db->get($table);
        return $query->num_rows() ;
    }

    function  get_enquiry($type) {
        $this->db->where("enquire.enquiry_type",$type);
        $this->db->select('*');
        $this->db->join('course c', 'c.id = enquire.course_id','LEFT');
        $this->db->order_by("enquiry_id","desc");
        $query = $this->db->get('enquire');
        //echo $this->db->last_query();exit;
        if($query->num_rows()>0) {
            return $query->result();} else {return false;}
    }


    function get_setting(){
        $this->db->where('setting_id',1);
        $query = $this->db->get('setting');
        return $query->row() ;
    }

    function update_setting($data){
        $this->db->where('setting_id',1);
        $this->db->update('setting', $data);
    }
    function get_orders(){

        $query = $this->db->get('orders');
        return $query->result();   
    }
     
     function get_user(){
        
        $query = $this->db->get('user');
        return $query->result();   
    }


    function get_patient($gender){
        $this->db->where('gender', $gender);
        $this->db->where_in('status',array(1,2,3,4));
        $query = $this->db->get('patient');
        return $query->result();
    }

      function get_level_answer($answer_status){
          $this->db->select('results.level,count(level) as count');
        $this->db->where('answer_status', $answer_status);
         $this->db->group_by(array('results.level','results.answer_status'));
        $query = $this->db->get('results');

        return $query->result();
    }

}