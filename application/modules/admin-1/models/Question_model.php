<?php if(!defined('BASEPATH')) exit('No direct script access allowed');   
class question_Model extends MX_Controller {
    
    public function  __construct(){      
        parent::__construct();        
    }


    function  get_question() {
         $this->db->select('question.*,level.name as level');
          
         $this->db->join('level','level.id = question.level_id','left');
        $query = $this->db->get('question');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }
       function  get_level() {
        // $this->db->where('operator_id',3);
        $query = $this->db->get('level');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }
        function  get_level_id($level_id) {
         $this->db->where('id',$level_id);
        $query = $this->db->get('level');

        if($query->num_rows()>0) {
            return $query->row();
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
        $query = $this->db->delete('question'); 
        // echo $this->db->last_query();die;
        if($query){
            return true;
        } else {
            return false;
        }
    }

     function  get_question_id($id) {
         $this->db->select('question.*,answer_list.answer,level.name as level');
        $this->db->where('question.id',$id);
         $this->db->join('level','level.id = question.level_id','left');
         $this->db->join('answer_list','answer_list.question_id = question.id','left');
        $query = $this->db->get('question');
        // echo $this->db->last_query();die;
        if($query->num_rows()>0) {
            return $query->row();
        } else {
            return false;
        }
    }


    function  get_answer_id($id) {
        $this->db->where('question_id',$id);
        $query = $this->db->get('answer_list');
        // echo $this->db->last_query();die;
        if($query->num_rows()>0) {
            return $query->result();
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
        $query = $this->db->update('question', $data); 
        // echo $this->db->last_query();die;
        if($query){
            return true;
        } else {
            return false;
        }
    }

    function  update_answer($answer_id,$data) {
        $this->db->where('id', $answer_id);
       $query = $this->db->update('answer_list', $data); 
        if($query){
            return true;
        } else {
            return false;
        }
    }
      
    
        function  save_answer($data) {
// pr($data);die;
        $query = $this->db->insert('answer_list', $data); 

        if($query){
            return true;
        } else {
            return false;
        }
    }

}
 