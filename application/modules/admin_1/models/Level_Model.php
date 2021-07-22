<?php if(!defined('BASEPATH')) exit('No direct script access allowed');   
class Level_Model extends MX_Controller {
    
    public function  __construct(){      
        parent::__construct();        
    }

    function  get_level() {
        $this->db->join('category','category.category_id = level.category_id','left');
        $query = $this->db->get('level');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function  get_category() {
        $query = $this->db->get('category');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }

 function  get_results_dpl($level_id) {
      $this->db->where('level.id',$level_id);
      $this->db->select('question.name,GROUP_CONCAT(answer_list.answer) as answer,GROUP_CONCAT(answer_list.correct_answer) as correct_answer');
      $this->db->join('answer_list','answer_list.question_id = question.id','left');
      $this->db->join('level','level.id = question.level_id','left');
      $this->db->group_by('answer_list.question_id');
        $query = $this->db->get('question');
       
        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function  get_level_id($id) {
        $this->db->where('id',$id);
        $query = $this->db->get('level');
        if($query->num_rows()>0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function  save($data) {
        $query = $this->db->insert('level', $data); 
        if($query){ return true; } else { return false; }
    }

    function  update($id,$data) {
        $this->db->where('id', $id);
        $query = $this->db->update('level', $data); 
        if($query){
            return true;
        } else {
            return false;
        }
    }

    function  delete($id) {
        $this->db->where('id', $id);
        $query = $this->db->delete('level'); 
        //echo $this->db->last_query();
        if($query){
            return true;
        } else {
            return false;
        }
    }
      public function  update1($id,$data) {
        $this->db->where('id', $id);
        $query = $this->db->update('level', $data); 
        if($query){
            return true;
        } else {
            return false;
        }
    }

}