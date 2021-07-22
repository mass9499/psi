<?php if (!defined('BASEPATH')) exit('No direct script access allowed');   
//error_reporting('E_ALL ^ E_NOTICE');
class Api extends MX_Controller {

        public function  __construct() {
            parent::__construct();
            $this->load->model("Api_Model");  
            $this->load->helper('security');  
            $this->load->library('rest');  
            //$this->rest->appAuthentication(); 
            $_POST = $this->rest->_request; 
        }

        public function category(){
            $category = $this->Api_Model->get_category();
            $category_list = array();
            if($category)
            foreach ($category as $key => $value) {
                 $category_list[] = array('category_id' => $value->category_id,'category_name' => $value->category_name);
            }
            $results =  array("result" => $category_list );
            return $this->rest->response(200,$results,'success',0);
        }

        public function level(){
            if($this->rest->get_request_method() == "POST" && $this->rest->_request){            
                $category_id = $this->input->post('category_id');
                $level = $this->Api_Model->get_level($category_id);
                $parent = $this->Api_Model->get_patient();
                // pr($parent);die;
                $level_list = array();
                $parent_list = array();
                if($level)
                foreach ($level as $key => $value) {
                     $level_list[] = array('level_id' => $value->id,'level_name' => $value->name,'description' => $value->description,'image_name' => base_url()."files/level/".$value->image_name);
                }
                if($parent)
                foreach ($parent as $key => $value) {
                     $parent_list[] = array('first_name' => $value->first_name,'second_name' => $value->second_name,'last_name' => $value->last_name);
                }
                //pr($level_list);die;
                $results =  array(
                    "level" => $level_list,
                    "parent" =>$parent_list
                 );
                return $this->rest->response(200,$results,'success',0);
            }
            else{
                return $this->rest->response(400,array(),'bad request',1);
            }
        }
        

        public function question(){
            // pr('test');die;
            if($this->rest->get_request_method() == "POST" && $this->rest->_request){

                $level_id   = $this->input->post('level_id');
                $order_type = $this->input->post('order_type');


                $question = $this->Api_Model->get_question($level_id,$order_type);
                 
                $question_list = array();
                $level_list = array();
                if($question)
                foreach ($question as $key => $value) {

   

                    $answer = $this->Api_Model->get_answer_id($value->id);
                    foreach ($answer as $key => $value2) {
                        $answer[$key]->answer = base_url()."assets/images/question/".$value2->answer ;
                    }
                     $level_list[] = array(
                                            'id'            => $value->id,
                                            'name'          => $value->name,
                                            'audio'         => base_url()."assets/images/question/".$value->audio,
                                            'timing'        => $value->timing,
                                            'level_id'      => $value->level_id,
                                            'order_no'      => $value->order_no,
                                            'answer'        => $answer,
                                        );
                }
                //pr($level_list);die;
                $results =  array("result" => $level_list );
                return $this->rest->response(200,$results,'success',0);
            }
            else{
                return $this->rest->response(400,array(),'bad request',1);
            }
        }

    public function answer()
        { 
            if($this->rest->get_request_method() == "POST" && $this->rest->_request){  

                $question_id =  $this->input->post('question_id');

                $result = $this->Api_Model->get_answer_id($question_id);
            
                $results =  array("result" => $result );
                return $this->rest->response(200,$results,'success',0);
        }
    }

     public function answer_insert()
        { 
            if($this->rest->get_request_method() == "POST" && $this->rest->_request){  

            $doctor_id      =  $this->input->post('doctor_id');
            $question_id    =  $this->input->post('question_id');
            $answers_id     =  $this->input->post('answer_id');
            $patient_id     =  $this->input->post('patient_id');
            $level_id       =  $this->input->post('level_id');
            $correct_answer =  $this->input->post('correct_answer');

                 $insert_answer = array(
                                'question_id'         => $question_id,
                                'patient_id'          => $patient_id,
                                'answers_id'          => $answers_id,
                                'level'               => $level_id,
                                'answer_status'       => $correct_answer,
                                'doctor_id'           => $doctor_id,
                                'date'                => date("Y-m-d H:i:s")
                    );

            $this->Api_Model->insert_result($insert_answer);
            
              return $this->rest->response(200,"Save Successfully",'success',0);
        }
    }

    



    public function doctor_login()
        {   

            if($this->rest->get_request_method() == "POST" && $this->rest->_request){
                $_POST = $this->rest->_request;
                
                //print_r($this->input->post());
                //$this->form_validation->set_data($this->rest->_request);
                $this->load->library('form_validation'); 
                $this->form_validation->set_rules('email', 'email', 'required|trim');
                $this->form_validation->set_rules('password', 'Password', 'required|trim');
                
                if ($this->form_validation->run() == TRUE){         
                    $email =  $this->input->post('email');
                    $password =  md5($this->input->post('password'));
                    $doctor = $this->Api_Model->check_doctor_login($email,$password);
                    if($doctor){
                        $result =  array(
                                    "id"                  => $doctor->id,
                                    "first_name"          => $doctor->first_name,
                                    "second_name"         => $doctor->second_name,
                                    "last_name"           => $doctor->last_name,
                                    "email"               => $doctor->email,
                                    "profile_image"       => $profile_image,
                                    "mobile_no"           => $doctor->mobile_no, 
                                    "dob"                 => $doctor->dob, 
                                    "gender"              => $doctor->gender, 
                                    "status"              => $doctor->status, 
                                    "register_date"       => $doctor->register_date  
                                    
                    );
                        $results =  array("result" => $result );
                        return $this->rest->response(200,$results,'success',0); 
                    }
                    else{
                        return $this->rest->response(400,array(),'invalid username/password',1);
                    }      
                }
                else{
                    $error = validation_errors();
                    return $this->rest->response(400,array(),$error,1);
                }
            }
            $this->rest->response(400,array(),'bad request',1);
        }


    public function profile(){
            if($this->rest->get_request_method() == "POST" && $this->rest->_request){        
              $doctor_id =  $this->input->post('doctor_id');
              $doctor = $this->Api_Model->get_profile($doctor_id);
              if($doctor){
                $profile_photo = $doctor->profile_image ?  base_url('images/profile/'.$doctor->profile_image) : "" ;
                $results =  array(
                                        "id"                  => $doctor->id,
                                        "first_name"          => $doctor->first_name,
                                        "second_name"         => $doctor->second_name,
                                        "last_name"           => $doctor->last_name,
                                        "email"               => $doctor->email,
                                        "profile_image"       => $profile_image,
                                        "mobile_no"           => $doctor->mobile_no, 
                                        "dob"                 => $doctor->dob, 
                                        "gender"              => $doctor->gender, 
                                        "status"              => $doctor->status, 
                                        "register_date"       => $doctor->register_date 
                                        
                        );
                return $this->rest->response(200,$results,'success',0);
              }
              else{
                return $this->rest->response(403,array(),"invalid user_id",1);  
              }
            }
            return $this->rest->response(400,array(),'bad request',1);
          }


    public function profile_update(){
            if($this->rest->get_request_method() == "POST" && $this->rest->_request){        
                $doctor_id =  $this->input->post('doctor_id');
                $doctor_data = array();

                
                if($this->input->post('first_name'))    $doctor_data['first_name']   = $this->input->post('first_name');
                if($this->input->post('second_name'))   $doctor_data['second_name']  = $this->input->post('second_name');
                if($this->input->post('last_name'))     $doctor_data['last_name']    = $this->input->post('last_name');
                if($this->input->post('email'))         $doctor_data['email']        = $this->input->post('email');
                if($this->input->post('mobile_no'))     $doctor_data['mobile_no']    = $this->input->post('mobile_no');
                if($this->input->post('password'))      $doctor_data['password']    = $this->input->post('password');
               
                
                // pr($user_data);die;
                if($doctor_data)  $this->Api_Model->update_profile($doctor_id,$doctor_data);           
                 return $this->rest->response(200,"Saved Successfully",'success',0);
              }
              return $this->rest->response(400,array(),'bad request',1); 
        }

       
    public function patient_list(){
        $limit = $this->input->post('limit') ? $this->input->post('limit')  : 10000;
        $page = $this->input->post('page') ? $this->input->post('page')  : 1;
        $search = $this->input->post('search');
        $filter = array(
                'search' => $search
        );
        $patient = $this->Api_Model->get_patient(0,$limit,$page,$filter);

        $total_count = $this->Api_Model->get_patient(1,$limit,$page);    
        $results =  array("result" => $patient ? $patient : "","total_count" => $total_count);
        return $this->rest->response(200,$results,'success',0);
    }
     

    public function patient_add(){

            if($this->rest->get_request_method() == "POST" && $this->rest->_request){        
                
                $data =  array(
                                   "first_name"    => $this->input->post('first_name'),
                                   "second_name"   => $this->input->post('second_name'),
                                   "last_name"     => $this->input->post('last_name'),
                                   "email"         => $this->input->post('email'),
                                   "country_id"    => $this->input->post('country_id'), 
                                   "mobile_no"     => $this->input->post('mobile_no'), 
                                   "dob"           => $this->input->post('dob'), 
                                   "gender"        => $this->input->post('gender'), 
                                   "medical_no"    => $this->input->post('medical_no'),
                                   'register_date' => date("Y-m-d h:i:sa"),
                                   "status"        => 1
                            );
               
                if($data){$inserted = $this->Api_Model->save_patient($data);}  
                if($inserted)
                 {
                   $datas =  array(
                                   "patient_id"        => $inserted,
                                    'l_normal_hear'    =>    @$this->input->post('l_normal_hear'),
                                    'r_normal_hear'    =>    @$this->input->post('r_normal_hear'),
                                    'l_hear_loss'      =>    @$this->input->post('l_hear_loss'),
                                    'r_hear_loss'      =>    @$this->input->post('r_hear_loss'),
                                    'l_no_device'      =>    @$this->input->post('l_no_device'),
                                    'r_no_device'      =>    @$this->input->post('r_no_device'),
                                    'l_hear_aid'       =>    @$this->input->post('l_hear_aid'),
                                    'r_hear_aid'        =>    @$this->input->post('r_hear_aid'),
                                    'l_hear_imp_system' =>    @$this->input->post('l_hear_imp_system'),
                                    'r_hear_imp_system'  =>    @$this->input->post('r_hear_imp_system'),
                                    'l_cochlear_implant'  =>    @$this->input->post('l_cochlear_implant'),
                                    'r_cochlear_implant'   =>    @$this->input->post('r_cochlear_implant'),
                                    'l_cochlear_implant_ear'=>    @$this->input->post('l_cochlear_implant_ear'),
                                    'r_cochlear_implant_ear' =>    @$this->input->post('r_cochlear_implant_ear'),
                                    'l_middle_ear'           =>    @$this->input->post('l_middle_ear'),
                                    'r_middle_ear'           =>    @$this->input->post('r_middle_ear'),
                                    'l_bone_implant'        =>    @$this->input->post('l_bone_implant'),
                                    'r_bone_implant'        =>    @$this->input->post('r_bone_implant'),
                                    'l_implant_date'        =>    @$this->input->post('l_implant_date'),
                                    'r_implant_date'       =>    @$this->input->post('r_implant_date'),
                                    'l_brain_implant'      =>    @$this->input->post('l_brain_implant'),
                                    'r_brain_implant'      =>    @$this->input->post('r_brain_implant')
                            );
                   if($datas){ $this->Api_Model->save('ear_implant',$datas);}  
                
                 return $this->rest->response(200,"Saved Successfully",'success',0);
                 }   
              }
              return $this->rest->response(400,array(),'bad request',1); 
        }

    public function patient_edit(){

            if($this->rest->get_request_method() == "POST" && $this->rest->_request){  

                $patient_id =  $this->input->post('patient_id');

                 $patient_data = array();
            
                if($this->input->post('first_name'))    $patient_data['first_name']   = $this->input->post('first_name');
                if($this->input->post('second_name'))   $patient_data['second_name']  = $this->input->post('second_name');
                if($this->input->post('last_name'))     $patient_data['last_name']    = $this->input->post('last_name');
                if($this->input->post('email'))         $patient_data['email']        = $this->input->post('email');
                if($this->input->post('mobile_no'))     $patient_data['mobile_no']    = $this->input->post('mobile_no');
                if($this->input->post('country_id'))    $patient_data['country_id']   = $this->input->post('country_id');
                if($this->input->post('dob'))           $patient_data['dob']          = $this->input->post('dob');
                if($this->input->post('gender'))        $patient_data['gender']       = $this->input->post('gender');
                if($this->input->post('medical_no'))        $patient_data['medical_no']       = $this->input->post('medical_no');
                
                if($patient_data)  $this->Api_Model->update_patient($patient_id,$patient_data);   
                // -------------------------------------------------------------------        
                if($this->input->post('l_normal_hear'))    $patient_ear_data['l_normal_hear']   = $this->input->post('l_normal_hear');
                if($this->input->post('r_normal_hear'))   $patient_ear_data['r_normal_hear']  = $this->input->post('r_normal_hear');
                if($this->input->post('l_hear_loss'))     $patient_ear_data['l_hear_loss']    = $this->input->post('l_hear_loss');

                if($this->input->post('r_hear_loss'))         $patient_ear_data['r_hear_loss']        = $this->input->post('r_hear_loss');

                if($this->input->post('l_no_device'))     $patient_ear_data['l_no_device']    = $this->input->post('l_no_device');
                if($this->input->post('r_no_device'))     $patient_ear_data['r_no_device']    = $this->input->post('r_no_device');
                if($this->input->post('l_hear_aid'))     $patient_ear_data['l_hear_aid']    = $this->input->post('l_hear_aid');
                if($this->input->post('r_hear_aid'))     $patient_ear_data['r_hear_aid']    = $this->input->post('r_hear_aid');
                if($this->input->post('l_hear_imp_system'))     $patient_ear_data['l_hear_imp_system']    = $this->input->post('l_hear_imp_system');
                if($this->input->post('r_hear_imp_system'))     $patient_ear_data['r_hear_imp_system']    = $this->input->post('r_hear_imp_system');
                if($this->input->post('l_cochlear_implant'))     $patient_ear_data['l_cochlear_implant']    = $this->input->post('l_cochlear_implant');
                if($this->input->post('r_cochlear_implant'))     $patient_ear_data['r_cochlear_implant']    = $this->input->post('r_cochlear_implant');
                if($this->input->post('l_cochlear_implant_ear'))     $patient_ear_data['l_cochlear_implant_ear']    = $this->input->post('l_cochlear_implant_ear');
                if($this->input->post('r_cochlear_implant_ear'))     $patient_ear_data['r_cochlear_implant_ear']    = $this->input->post('r_cochlear_implant_ear');
                if($this->input->post('l_middle_ear'))     $patient_ear_data['l_middle_ear']    = $this->input->post('l_middle_ear');
                if($this->input->post('r_middle_ear'))     $patient_ear_data['r_middle_ear']    = $this->input->post('r_middle_ear');

                if($this->input->post('l_bone_implant'))     $patient_ear_data['l_bone_implant']    = $this->input->post('l_bone_implant');
                if($this->input->post('r_bone_implant'))     $patient_ear_data['r_bone_implant']    = $this->input->post('r_bone_implant');
                if($this->input->post('l_implant_date'))     $patient_ear_data['l_implant_date']    = $this->input->post('l_implant_date');
                if($this->input->post('r_implant_date'))     $patient_ear_data['r_implant_date']    = $this->input->post('r_implant_date');
                if($this->input->post('l_brain_implant'))     $patient_ear_data['l_brain_implant']    = $this->input->post('l_brain_implant');
                if($this->input->post('r_brain_implant'))     $patient_ear_data['r_brain_implant']    = $this->input->post('r_brain_implant');

                  if($patient_ear_data){
                    $this->Api_Model->update_patient_ear($patient_id,$patient_ear_data);   
                 return $this->rest->response(200,"Update data Successfully",'success',0);
                    }
              }
              return $this->rest->response(400,array(),'bad request',1); 
        }
    public function country_list(){

            $country = $this->Api_Model->get_countries();
            $results =  array("result" => $country );
            return $this->rest->response(200,$results,'success',0);
    }


    public function patient_result(){

            if($this->rest->get_request_method() == "POST" && $this->rest->_request){  

            $patient_id =  $this->input->post('patient_id');

                $result = $this->Api_Model->get_results($patient_id);
            
                $results =  array("result" => $result );
                return $this->rest->response(200,$results,'success',0);
        }
    }

      public function patient_view() {

            if($this->rest->get_request_method() == "POST" && $this->rest->_request){  

                    $doctor_id  =  $this->input->post('doctor_id');
                    $patient_id =  $this->input->post('patient_id');
                    $level_id   =  $this->input->post('level_id');

                    $questions = $this->Api_Model->get_results_dpl($doctor_id,$patient_id,$level_id);
                    $result = $this->Api_Model->get_results_dpl_id($doctor_id,$patient_id,$level_id);

                     $results =  array(
                        "result"    => $result ,
                        "questions" => $questions 
                    );

                     return $this->rest->response(200,$results,'success',0);
             }
    }


    public function forget_password(){
        // pr('reset');die;
        if($this->rest->get_request_method() == "POST" && $this->rest->_request){ 

            $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
            if ($this->form_validation->run() == TRUE){
                $email = $this->input->post('email');
                $user = $this->Api_Model->check_email($email);
                if($user){
                    $data['email'] = $user->email;
                    $data['subject'] = "Reset your password";
                    $data['message'] = "";
                     // $this->load->library('myemail');
                    // $this->myemail->sendmail($data);
                    //$this->session->set_flashdata('reset_success', "you'll receive a password reset mail shortly..");
                    $this->load->helper('string');
                     $otp = mt_rand(100000,999999); 
                    
                     $message = array(
                        'OTP'            => $otp
                        );

                      $data = array(
                        'last_otp'            => $otp
                        );

                      $update = $this->Api_Model->update($user->id,$data);

                    return $this->rest->response(200,$message,'Please check your email.we sent otp in your email',0);
                    
                }
               else {
                   return $this->rest->response(403,'Please check your email.Email does not exits.','message',1);
                    
                }
            }

        } 
       
    }

    public function otp(){

        if($this->rest->get_request_method() == "POST" && $this->rest->_request){   

            $encrpty_code =  $this->input->post('otp');
            $user_email =  $this->input->post('email');
            
                if($encrpty_code){
                            $data = array(
                                        'last_otp'         => $encrpty_code,
                                        'email'            => $user_email  
                                         );

                       
                        $user_avli =$this->Api_Model->check_user($data);

                        if($user_avli) 
                            {
                                return $this->rest->response(200,"Otp is match.","Success",0);
                            }
                        else 
                            {
                                return $this->rest->response(403,"This link is expired. Please try again to reset password.","error",1); 
                            }
                        }
                        
                else {
                     return $this->rest->response(400,array(),'bad request',1);
                 }

        }
}


    public function reset_password(){

        if($this->rest->get_request_method() == "POST" && $this->rest->_request){ 

            $email =  $this->input->post('email');
             $user_avli =$this->Api_Model->check_email($email);

                  if($user_avli) 
                      {

                    $new_password = $this->input->post('password');
                    $confirm_password = $this->input->post('confirm_password');
                     $this->load->helper('string');
                    $activation_code = random_string('unique', 16); 

                    if($new_password == $confirm_password)
                    {
                         $data = array(
                                    'activate_code'  => $activation_code,
                                    'password'       => md5($this->input->post('password'))
                                    );
                            $update = $this->Api_Model->update($user_avli->id,$data);
                            return $this->rest->response(200,"Password reset successfully. Please login using the new password.","success",0);
                    }

                    else 
                    {
                        return $this->rest->response(403,"New Password And Confirm Password Is Not Match","failed",1); 
                    }
                       
                    }

                  else {

                        return $this->rest->response(403,'Please check your email.Email does not exits.','message',1);
                        
                    }

            }
            else {
             return $this->rest->response(400,array(),'bad request',1);
         }

    }




}
?>