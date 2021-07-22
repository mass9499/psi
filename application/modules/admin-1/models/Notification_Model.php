<?php if(!defined('BASEPATH')) exit('No direct script access allowed');   
class Notification_Model extends MX_Controller {
    
    public function  __construct(){      
        parent::__construct();        
    }

    function get_user(){
        $this->db->where("app_id is NOT NULL");
        $query = $this->db->get('user');
        if($query->num_rows()>0) { 
            return $query->result();
        } else {
            return false;
        }
    }

    function  get_notification() {
        $this->db->select('projects.project_name,n.project_title,n.project_image,n.project_description,n.id');
        $this->db->from('notification as n');
        $this->db->join('projects', 'projects.id = n.project_id','left');
        $query = $this->db->get();
        if($query->num_rows()>0) { 
            return $query->result();
        } else {
            return false;
        }
    }
      function  get_project($tb) {
        $query = $this->db->get($tb);
        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
     function  get_notification_id($id) {
        $this->db->where('id',$id);
        $query = $this->db->get('notification');
        if($query->num_rows()>0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function  save($data) {
        $query = $this->db->insert('notification', $data); 
        if($query){ return  $this->db->insert_id(); } else { return false; }
    }

    function  update($id,$data) {
        $this->db->where('id', $id);
        $query = $this->db->update('notification', $data); 
        if($query){
            return true;
        } else {
            return false;
        }
    }

    function  delete($id) {
        $this->db->where('id', $id);
        $query = $this->db->delete('notification'); 
        if($query){
            return true;
        } else {
            return false;
        }
    }

}