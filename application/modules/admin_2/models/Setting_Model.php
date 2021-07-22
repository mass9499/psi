<?php if(!defined('BASEPATH')) exit('No direct script access allowed');   
class Setting_Model extends CI_Model {
    
    public function  __construct(){      
        parent::__construct();        
    }

	function  get_count() {
		$this->db->select('*');
		$query = $this->db->get('setting');
		return $query->num_rows();
	}

    function  get_setting() {
    	$this->db->select('*');
		$query = $this->db->get('setting');
		if($query->num_rows()>0) {
			return $query->row();
		} else {
			return false;
		}
	}

   function  get_setting_id() {
        $query = $this->db->get('setting');
        if($query->num_rows()>0) {
            return $query->num_rows();
        } else {
            return false;
        }
    }
public function update($tb,$data) {
        $query = $this->db->update($tb, $data); 
        if($query){
            return true;
        } else {
            return false;
        }
    }

	function insert($data) {
		//$this->db->where('setting_id', $id);
		$query = $this->db->update('setting', $data); 
		if($query){
			return true;
		} else {
			return false;
		}
	}
}