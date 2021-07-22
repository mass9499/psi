<?php if (!defined('BASEPATH')) exit('No direct script access allowed');   
//error_reporting('E_ALL ^ E_NOTICE');
class question extends MX_Controller
{
    public function  __construct()
    {
        parent::__construct();
           if(empty($this->session->userdata("user_id"))) { redirect("admin/login","refresh"); }
        $this->load->model("Question_Model");
        $this->load->helper('security');   
       $this->operator_id = $this->session->userdata("operator_id");
       
          if(get_ap('question',$this->operator_id)==1){ }else{ redirect("admin","refresh");}
      
    }
    public function index()
    {
        // pr($this->session->userdata());die;
     	$data['title']="Question List";
     	$data['results'] = $this->Question_Model->get_question();
        // pr($data);die;
        $this->load->view("question/index",$data);
    }

      function create($level_id=""){
      
         if($this->input->server("REQUEST_METHOD")=="POST"){        
         
            $data = $this->input->post() ;

            $question_data['level_id']=$this->input->post('level_id');
            $question_data['name']=$this->input->post('name');
            $question_data['timing']=$this->input->post('timing');
            $audio_name="";       
            if(isset($_FILES['audio']['name'])){
                $name=$_FILES['audio']['name'];
                $size=$_FILES['audio']['size'];
                $type=$_FILES['audio']['type'];
                $temp=$_FILES['audio']['tmp_name'];
                $ext = explode(".", $name);
                $audio_name = "question-".$size.rand(0,5000000).time().".".end($ext);
                move_uploaded_file($temp,"assets/images/question/".$audio_name);
            }   
            $question_data['audio']=$audio_name;   
            $insert_id = $this->Question_Model->save('question',$question_data);
          //  pr($_FILES['answer']);  
           if(isset($_FILES['answer']['name'])){
                $total_count = count($_FILES['answer']['name']);
               
                for($i=0; $i < $total_count; $i++) { 
                    //pr($this->input->post('correct'));
                    $correct_answer = @$this->input->post('correct')[$i] ? $this->input->post('correct')[$i] : 0 ;

                    $name=$_FILES['answer']['name'][$i];
                    $size=$_FILES['answer']['size'][$i];
                    $type=$_FILES['answer']['type'][$i];
                    $temp=$_FILES['answer']['tmp_name'][$i];
                    $ext = explode(".", $name);
                    $answer_image = "answer-".$size.rand(0,5000000).time().".".end($ext);
                    move_uploaded_file($temp,"assets/images/question/".$answer_image);
                   // echo $image1;

                    $insert_answer = array(
                                'question_id'     =>$insert_id,
                                'answer'          => $answer_image,
                                'correct_answer'  => $correct_answer,
                    );
                     $this->Question_Model->save_answer($insert_answer); 
                }
            }

            $this->session->set_flashdata('message', 'Successfully Saved');

            
            redirect('admin/question/index','refresh');
             
         }
        $data['level'] = $this->Question_Model->get_level();
             $data['level_id']="";
        if($level_id){
            $data['level_id'] = $level_id;
        }
        // pr($data);die;
       $data['title']="Add question";
       $this->load->view("question/create",$data);
    }

    public function view($id) {
       
        $data['title']="View Question";
        $data['level'] = $this->Question_Model->get_level();
        $data['result'] = $this->Question_Model->get_question_id($id);
        $data['answer'] = $this->Question_Model->get_answer_id($id);
         // pr($data['answer']);die;
        $this->load->view("question/view",$data);
    }


    public function edit($id) {
     

        if($this->input->server("REQUEST_METHOD")=="POST"){        
            $data = $this->input->post() ;

            $question_data['level_id']=$this->input->post('level_id');
            $question_data['name']=$this->input->post('name');
            $question_data['timing']=$this->input->post('timing');
            $audio_name=$this->input->post('audio');

            //$audio_name="";       
            if(isset($_FILES['audio']['name'])){
                $name=$_FILES['audio']['name'];
                $size=$_FILES['audio']['size'];
                $type=$_FILES['audio']['type'];
                $temp=$_FILES['audio']['tmp_name'];
                $ext = explode(".", $name);
                $audio_name = "question-".$size.rand(0,5000000).time().".".end($ext);
                move_uploaded_file($temp,"assets/images/question/".$audio_name);
            } else{
               $question_data['audio']=$audio_name;    
            }  
            
            $insert_id = $this->Question_Model->update1($id,$question_data);
               //  pr($_FILES['answer']); echo count($_FILES['answer']['name']);    die;
           if(isset($_FILES['answer']['name'])){
                $total_count = count($_FILES['answer']['name']);
               
                for ($i=0; $i < $total_count; $i++) { 
                    //pr($this->input->post('correct'));
                    $correct_answer = @$this->input->post('correct')[$i] ?  $this->input->post('correct')[$i] : 0 ;
                    $answer_id=$this->input->post('answer_id');
                    $answer_image ="";  
                    // $answer_image= $data['old_answer']   
                    if($_FILES['answer']['name'][$i]){
                        $name=$_FILES['answer']['name'][$i];
                        $size=$_FILES['answer']['size'][$i];
                        $type=$_FILES['answer']['type'][$i];
                        $temp=$_FILES['answer']['tmp_name'][$i];
                        $ext = explode(".", $name);
                        $answer_image = "answer-".$size.rand(0,5000000).time().".".end($ext);
                        move_uploaded_file($temp,"assets/images/question/".$answer_image);
                    }
                    else{
                         $answer_image = $this->input->post('old_answer')[$i];
                    }
                // $old_path = `"assets/images/question/".$data['old_answer'];
                // if(file_exists($old_path)) unlink($old_path);
                // unset($data['old_answer']);

                    $insert_answer = array(
                                'question_id'     => $id,
                                'answer'          => $answer_image,
                                'correct_answer'  => $correct_answer,
                    );
                    $this->Question_Model->update_answer($answer_id,$insert_answer); 
                   // pr($insert_answer);
                }
            }
            //  die;
            $this->session->set_flashdata('message', 'Successfully Saved');
            
            redirect('admin/question/index','refresh');
             
         }
        $data['title']="Edit Question";
        $data['level'] = $this->Question_Model->get_level();
        $data['result'] = $this->Question_Model->get_question_id($id);
        $data['answer'] = $this->Question_Model->get_answer_id($id);
        // pr($data);die;
        $this->load->view("question/edit",$data);
    }


    public function delete($id) {
        $this->Question_Model->delete($id);
        $this->session->set_flashdata('message', 'Successfully Deleted');
        redirect('admin/question', 'refresh');
    }

     public function delete_answer($id,$back_id) {
        $this->Question_Model->delete_answer($id);
        $this->session->set_flashdata('message', 'Successfully Deleted');
        redirect('admin/question/edit/'.$back_id, 'refresh');
    }
    
  
    function status($id,$status) {
         // pr($status);die;
         $data = array('status'=>$status);
        $this->Question_Model->update1($id,$data);
        echo $this->db->last_query();
        redirect('admin/patient', 'refresh');
    }
}