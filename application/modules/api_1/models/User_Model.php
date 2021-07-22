<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');   

class User_Model extends CI_Model {


	function  get_user($id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id',$id);
        $query = $this->db->get();
        // echo $this->db->last_query();
        if($query->num_rows()>0){ return $query->row(); } else { return FALSE; }
    }


    function  check_login($email,$password) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->group_start();
        $this->db->where('email',$email);
        $this->db->or_where('mobile_no',$email);
        $this->db->group_end();
        $this->db->where('password',$password);
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if($query->num_rows()>0){ return $query->row(); } else { return FALSE; }
    }

    function  check_user($data) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($data);
        $query = $this->db->get();
        //echo $this->db->last_query(); die();
        if($query->num_rows()>0){ return $query->row(); } else { return FALSE; }
    }

	function  save($data) {
        $query = $this->db->insert('user', $data);
          $this->db->last_query();
        if($query){ return $this->db->insert_id(); } else { return false; }
    }


    function  save_mobile($data) {
        $query = $this->db->insert('mobile_register', $data);
          $this->db->last_query();
        if($query){ return $this->db->insert_id(); } else { return false; }
    }

    
     function  get_profile($user_id) {
         $this->db->where('user_id',$user_id);
        $query = $this->db->get('user_address');
        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }
      function  get_myads($user_id) {
         $this->db->where('user_id',$user_id);
        $query = $this->db->get('ads');
        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }
    

    function  update($id,$data) {
        $this->db->where('id',$id);
        $query =$this->db->update('user', $data);
        //echo   $this->db->last_query();  die();
        if($query){ return true; } else { return false; }
    }

  function change_password($user_id)
        {   
        $this->db->select('id');
        $this->db->where('id',$user_id);
        $this->db->where('password',md5($this->input->post('old_password')));
        $query=$this->db->get('user');   

        if ($query->num_rows() > 0)
         {

            $data = array(
                'password' => md5($this->input->post('password'))
            );
            //pr($data);
            $this->db->where('id',$user_id);
            $query1 = $this->db->update('user', $data);
            //die;
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