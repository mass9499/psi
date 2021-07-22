<?php if(!defined('BASEPATH')) exit('No direct script access allowed');   
class Results_Model extends MX_Controller {
    
    public function  __construct(){      
        parent::__construct();        
    }

    function  get_level() {
        $query = $this->db->get('level');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function  get_patients() {
        $query = $this->db->get('patient');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function  get_results($patient_id="",$fliters = array()) {
    if($patient_id!=""){
        $this->db->where('test_history.patient_id',$patient_id);
    }

    if($fliters){

       if($fliters['month']){

            $this->db->where('MONTH(test_date)',$fliters['month']);
       }
        if($fliters['year']){

            $this->db->where('YEAR(test_date)',$fliters['year']);
       }

       if($fliters['patient']){

            $this->db->where('patient_id',$fliters['patient']);
       }
        if($fliters['result_range']){
           $range = explode("-", $fliters['result_range']);
           //pr($range);
            $this->db->having('percentage >=',$range[0] ,true);
            $this->db->having('percentage <=',$range[1] ,true);
        }   

    }
       $this->db->select('test_history.*, patient.first_name as f_n, patient.second_name as s_n,patient.last_name  as l_n,doctor.first_name  as d_f_n,doctor.second_name  as d_s_n,doctor.last_name  as d_l_n,level.name as level,level.id as level_id');
        $this->db->join('patient','patient.id = test_history.patient_id','inner');
        $this->db->join('doctor','doctor.id = test_history.doctor_id','inner');
        $this->db->join('level','level.id = test_history.level_id','inner');
       // $this->db->group_by(array('test_history.doctor_id','test_history.patient_id','test_history.level_id'));

        $query = $this->db->get('test_history');
        // echo $this->db->last_query(); die;
        
        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }

     function get_percentage_result() {
   
       $this->db->select('results.*, patient.first_name as f_n,,patient.second_name as s_n,patient.last_name  as l_n,doctor.first_name  as d_f_n,doctor.second_name  as d_s_n,doctor.last_name  as d_l_n,level.name as level,level.id as level_id,round(AVG(answer_status)*100) as score');
        $this->db->join('patient','patient.id = results.patient_id','inner');
        $this->db->join('doctor','doctor.id = results.doctor_id','inner');
        $this->db->join('level','level.id = results.level','inner');
        $this->db->group_by(array('results.doctor_id','results.patient_id','results.level'));
        $query = $this->db->get('results');
        // echo $this->db->last_query(); die;
        
        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }


  function  get_results_dpl($test_id) {
      $this->db->where('test_history.id',$test_id);
       $this->db->join('patient','patient.id = test_history.patient_id','innner');
        $this->db->join('doctor','doctor.id = test_history.doctor_id','innner');
         $this->db->join('level','level.id = test_history.level_id','left');
       
      $this->db->select('test_history.*,patient.first_name  as f_n,patient.second_name  as s_n,patient.last_name  as l_n,doctor.first_name  as d_f_n,doctor.second_name  as d_s_n,doctor.last_name  as d_l_n,level.name as level');

        $query = $this->db->get('test_history');

        if($query->num_rows()>0) {
            return $query->row();
        } else {
            return false;
        }
    }


  function  get_results_dpl_id($test_id) {
        $this->db->where('results.test_id',$test_id);
        $this->db->select('results.*,question.name,answer_list.correct_answer');
        $this->db->join('question','question.id = results.question_id','left');
        $this->db->join('answer_list','answer_list.id = results.answers_id','left');
    
         $query = $this->db->get('results');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }
 
    function  get_patient() {
        $query = $this->db->get('patient');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function  get_doctor() {
        $query = $this->db->get('doctor');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }


    function  get_results_id($id) {
        $this->db->where('id',$id);
        $query = $this->db->get('test_history');
        if($query->num_rows()>0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function  save($data) {
        $query = $this->db->insert('results', $data); 
        if($query){ return true; } else { return false; }
    }

    function  update($id,$data) {
        $this->db->where('id', $id);
        $query = $this->db->update('results', $data); 
        if($query){
            return true;
        } else {
            return false;
        }
    }

    function  delete($id) {
        $this->db->where('id', $id);
        $query = $this->db->delete('test_history');
        //echo $this->db->last_query();
        $this->db->where('test_id', $id);
        $query = $this->db->delete(' results'); 
        //echo $this->db->last_query();
       // die;
        if($query){
            return true;
        } else {
            return false;
        }
    }
      public function  update1($id,$data) {
        $this->db->where('id', $id);
        $query = $this->db->update('results', $data); 
        if($query){
            return true;
        } else {
            return false;
        }
    }
    
     function  get_question_id($id) {
        $this->db->where('question.id',$id);
         // $this->db->where('correct_answer',1);
          $this->db->select('*');
        // $this->db->join('answer_list','answer_list.question_id = question.id','left');
        $query = $this->db->get('question');
        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }

}