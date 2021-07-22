<?php if(!defined('BASEPATH')) exit('No direct script access allowed');   
class Api_Model extends MX_Controller {
    
    public function  __construct(){      
        parent::__construct();        
    }

    
    function  get_category(){
        $this->db->where("category_status",1);
        $query = $this->db->get('category');
        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function  get_level($category_id){
        $this->db->where("category_id",$category_id);
        $this->db->where("status",1);
        $query = $this->db->get('level');
        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
    }

      public function  check_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('doctor');
        if($query->num_rows()>0) {
            return $query->row();
        } else {
            return false;
        }
    }

     function  update($id,$data) {
        $this->db->where('id',$id);
        $query =$this->db->update('doctor', $data);
        //echo   $this->db->last_query();  die();
        if($query){ return true; } else { return false; }
    }

    function  check_user($data) {

        $this->db->select('*');
        $this->db->from('doctor');
        $this->db->where($data);
        $query = $this->db->get();
        // echo $this->db->last_query(); die();
        if($query->num_rows()>0){ return $query->row(); } else { return FALSE; }
    }


    function  get_question($level_id,$order_type){
        // pr($order_type);die;
            $this->db->where("level_id",$level_id);
              if($order_type==1)
                {
                    $this->db->order_by('order_no','ASC');
                };
            $this->db->where("status",1);
            $query = $this->db->get('question');
            if($query->num_rows()>0) {
                return $query->result();
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

     function  check_doctor_login($email,$password) {
        $this->db->select('*');
        $this->db->from('doctor');
        $this->db->group_start();
        $this->db->where('email',$email);
        $this->db->or_where('mobile_no',$email);
        $this->db->group_end();
        $this->db->where('password',$password);
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if($query->num_rows()>0){ return $query->row(); } else { return FALSE; }
    }

      function  get_profile($doctor_id) {
         $this->db->where('id',$doctor_id);
        $query = $this->db->get('doctor');
        if($query->num_rows()>0) {
            return $query->row();
        } else {
            return false;
        }
    }

     function  update_profile($doctor_id,$data) {
        $this->db->where('id',$doctor_id);
        $query =$this->db->update('doctor', $data);
        if($query){ return true; } else { return false; }
    }

     function  get_patient($count=0,$limit ="",$page ="",$fliter=array()){
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
        if(@$fliter['search']){
             $this->db->group_start();
              $this->db->like('first_name',$fliter['search']);
              $this->db->or_like('second_name',$fliter['search']);
              $this->db->or_like('last_name',$fliter['search']);
              $this->db->or_like('medical_no',$fliter['search']);
              $this->db->or_like('email',$fliter['search']);
              $this->db->or_like('mobile_no',$fliter['search']);
              $this->db->or_like('gender',$fliter['search']);
              $this->db->group_end();
        
        }
        $this->db->select('patient.*,countries.countries_name as country,e.*,patient.id as  id');
        $this->db->where("patient.status",1);
        $this->db->join('countries', 'countries.id = patient.country_id','LEFT');
        $this->db->join('ear_implant as e', 'e.patient_id = patient.id','LEFT');
       
        if($count == 0){
            $page = $page ?  ($page  -  1 ) * $limit  : 0;
            $limit;
            $this->db->limit($limit, $page);
        }
         $query = $this->db->get('patient');
        if($count == 1) {
            return $query->num_rows();
        }
            
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

     Public function save_patient($data) {
        $query = $this->db->insert('patient',$data); 
        if($query){
           return $this->db->insert_id();
        } else {
            return false;
        }
    }
    Public function save($tb,$data) {
        $query = $this->db->insert($tb,$data); 
        if($query){
           return $this->db->insert_id();
        } else {
            return false;
        }
    }
      function  update_patient($id,$data) {
        $this->db->where('id', $id);
        $query = $this->db->update('patient', $data); 
        if($query){
            return true;
        } else {
            return false;
        }
    }
    function  update_patient_ear($id,$data) {
        $this->db->where('patient_id', $id);
        $query = $this->db->update('ear_implant', $data); 
        if($query){
            return true;
        } else {
            return false;
        }
    }

    function insert_test_history($data) {
      
        $this->db->insert('test_history', $data); 
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function insert_test_id($datas) {

        $query =  $this->db->insert('results', $datas);
         if($query){
            return true;
        } else {
            return false;
        } 

    }

    function insert_result($insert_answer) {

        $query = $this->db->insert('results', $insert_answer);

        if($query){
            return true;
        } else {
            return false;
        }

    }

    public function get_test_id($test_id)
    {
        $this->db->where('id' , $test_id);
        $query = $this->db->get('test_history');
        if($query->num_rows()>0) {
            return $query->row();
        } else {
            return false;
        }
        
    }


    public function get_questions_id($level_id)
    {
        $this->db->where('id' , $level_id);
        $query = $this->db->get('question');
        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
        
    }

    public function get_answers_id($test_id)
    {
        $this->db->where('test_id' , $test_id);
        $query = $this->db->get('results');
        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return false;
        }
        
    }

    public function total_answers($test_id)
    {
        $this->db->where('test_id' , $test_id);
        $query = $this->db->get('results');
        return $query->num_rows() ;
    }

    public function get_passcount_id($test_id)
    {
        $this->db->where('test_id' , $test_id);
        $this->db->where('answer_status', 1);
        $query = $this->db->get('results');
        return $query->num_rows() ; 
    }

    function  update_test_history($test_id,$update_answer) {
        $this->db->where('id', $test_id);
        $query = $this->db->update('test_history', $update_answer); 
        if($query){
            return true;
        } else {
            return false;
        }
    }


    //   function  insert_result($data) {
    //     // pr($data);die;

    //    $query = $this->db->insert('results', $data); 
    //  // echo $this->db->last_query();die;
    //     if($query){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }


    function  get_results($patient_id="") {
    if($patient_id!=""){
        $this->db->where('results.patient_id',$patient_id);
    }
       $this->db->select('results.*,patient.first_name  as f_n,patient.second_name  as s_n,patient.last_name  as l_n,patient.mobile_no,doctor.first_name  as d_f_n,doctor.second_name  as d_s_n,doctor.last_name  as d_l_n,level.name as level_name,level.id as level_id,round(AVG(answer_status)*100) as score');
        $this->db->join('patient','patient.id = results.patient_id','left');
        $this->db->join('doctor','doctor.id = results.doctor_id','left');
        $this->db->join('level','level.id = results.level','left');
         $this->db->group_by(array('results.doctor_id','results.patient_id','results.level'));
        $query = $this->db->get('results');
        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function  get_patient_results($doctor_id="") {

         if($doctor_id!=""){
        $this->db->where('test_history.doctor_id',$doctor_id);
    }
   
       $this->db->select('test_history.*, patient.first_name as f_n,,patient.second_name as s_n,patient.last_name  as l_n,doctor.first_name  as d_f_n,doctor.second_name  as d_s_n,doctor.last_name  as d_l_n,level.name as level,level.id as level_id,patient.mobile_no as patient_mobile_no');
        $this->db->join('patient','patient.id = test_history.patient_id','inner');
        $this->db->join('doctor','doctor.id = test_history.doctor_id','inner');
        $this->db->join('level','level.id = test_history.level_id','inner');
        //$this->db->group_by(array('test_history.doctor_id','test_history.patient_id','test_history.level_id'));

        $query = $this->db->get('test_history');
        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return array();
        }
    }


    function  get_results_dpl($doctor_id,$patient_id,$level_id) {
      $this->db->where('results.doctor_id',$doctor_id);
      $this->db->where('results.patient_id',$patient_id);
      $this->db->where('results.level',$level_id);
      $this->db->select('results.*, question.name,results.answer_status,level.name as level_name');
      $this->db->join('question','question.id = results.question_id','left');
      $this->db->join('answer_list','answer_list.id = results.answers_id','left');
      $this->db->join('level','level.id = results.level','left');
        $query = $this->db->get('results');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return array();
        }
    }

  function  get_results_dpl_id($doctor_id,$patient_id,$level_id) {
        $this->db->where('results.doctor_id',$doctor_id);
        $this->db->where('results.patient_id',$patient_id);
        $this->db->where('results.level',$level_id);
        $this->db->select('results.*,patient.first_name  as f_n,patient.second_name  as s_n,patient.last_name  as l_n,doctor.first_name  as d_f_n,doctor.second_name  as d_s_n,doctor.last_name  as d_l_n,level.name as level,
        question.name,answer_list.correct_answer,,round(AVG(answer_status)*100) as score,level.name as level_name');
        $this->db->join('patient','patient.id = results.patient_id','left');
        $this->db->join('doctor','doctor.id = results.doctor_id','left');
        $this->db->join('question','question.id = results.question_id','left');
        $this->db->join('answer_list','answer_list.id = results.answers_id','left');
        $this->db->join('level','level.id = results.level','left');
        $this->db->group_by('results.doctor_id');
        $query = $this->db->get('results');

        if($query->num_rows()>0) {
            return $query->row();
        } else {
            return array();
        }
    }

    function  get_test_details($test_id) {
      $this->db->where('test_history.id',$test_id);
       $this->db->join('patient','patient.id = test_history.patient_id','inner');
        $this->db->join('doctor','doctor.id = test_history.doctor_id','inner');
         $this->db->join('level','level.id = test_history.level_id','left');
       
      $this->db->select('test_history.*,patient.first_name  as f_n,patient.second_name  as s_n,patient.last_name  as l_n,doctor.first_name  as d_f_n,doctor.second_name  as d_s_n,doctor.last_name  as d_l_n,level.name as level,patient.mobile_no as patient_mobile_no');

        $query = $this->db->get('test_history');

        if($query->num_rows()>0) {
            return $query->row();
        } else {
            return array();
        }
    }

     function  get_test_questions($test_id) {
        $this->db->where('results.test_id',$test_id);
        $this->db->select('results.*,question.name,answer_list.correct_answer');
        $this->db->join('question','question.id = results.question_id','inner');
        $this->db->join('answer_list','answer_list.id = results.answers_id','inner');
    
         $query = $this->db->get('results');

        if($query->num_rows()>0) {
            return $query->result();
        } else {
            return array();
        }
    }



    
}