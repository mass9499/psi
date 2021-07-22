<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');   
error_reporting('0');
class Admin_Model extends MX_Controller {
    
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
		//echo $this->db->last_query();exit;

		if ($query->num_rows() == 1) {
			return $query->row();
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

   

         
    function Change_password()
        {   
        $this->db->select('id');
        $this->db->where('email',$this->session->userdata("admin")['email']);
        $this->db->where('password',md5($this->input->post('old_password')));
        $query=$this->db->get('admin');   

        if ($query->num_rows() > 0)
         {

                            $data = array(
                              'password' => md5($this->input->post('password'))
                             );
                         $this->db->where('email',$this->session->userdata("admin")['email']);
                         $query1 = $this->db->update('admin', $data);
                       if($query1) 
                       {
                       return "Password Changed Successfully";
                       }else{
                        return "Something Went Wrong, Password Not Changed";
                       }
        
                         }else{
                            return "Wrong Old Password";
                         }

        }

   
}