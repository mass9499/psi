<?php if(!defined('BASEPATH')) exit('No direct script access allowed');   
class Groups_Model extends CI_Model {
    
    public function  __construct(){      
        parent::__construct();        
    }

    function  get_groups($limit="") {
    	if($limit){
    		$this->db->limit(10, 0);
    	}
    	$this->db->select('*');
 
		$query = $this->db->get('groups');
		// echo $this->db->last_query();die;
		if($query->num_rows()>0) {
			return $query->result();
		} else {
			return false;
		}
	}


	function  get_premission_id($id) {
		$this->db->where('operator_id',$id);
		$query = $this->db->get('roles_list');
		if($query->num_rows()>0) {
			return $query->result();
		} else {
			return false;
		}
	}


	function  get_groups_id($id) {
		$this->db->where('id',$id);
		$query = $this->db->get('groups');
		if($query->num_rows()>0) {
			return $query->row();
		} else {
			return false;
		}
	}
	

	function  save($data) {
		$query = $this->db->insert('groups', $data); 
		if($query){	return  $this->db->insert_id(); } else { return false; }
	}


	function  update($id,$data) {
		$this->db->where('id', $id);
		$query = $this->db->update('groups', $data); 
		if($query){
			return true;
		} else {
			return false;
		}
	}

	function  delete($id) {
		$this->db->where('id', $id);
		$query = $this->db->delete('groups'); 
		if($query){
			return true;
		} else {
			return false;
		}
	}

	function  status($id,$status) {
		$data = array('status'=>$status);
		$this->db->where('id', $id);
		$query = $this->db->update('groups', $data); 
		//echo $this->db->last_query();
		if($query){
			return true;
		} else {
			return false;
		}
	}


	function  update_role($id,$data) {

		$this->db->where('operator_id', $id);
		$this->db->delete('roles_list'); 

		$query = $this->db->insert_batch('roles_list', $data); 

		if($query){
			return true;
		} else {
			return false;
		}
	}

}
