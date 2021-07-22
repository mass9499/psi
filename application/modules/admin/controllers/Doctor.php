<?php if (!defined('BASEPATH')) exit('No direct script access allowed');   
//error_reporting('E_ALL ^ E_NOTICE');
class doctor extends MX_Controller
{
    public function  __construct()
    {
        parent::__construct();
           if(empty($this->session->userdata("user_id"))) { redirect("admin/login","refresh"); }
        $this->load->model("Doctor_Model");
        $this->load->helper('security');   
       $this->operator_id = $this->session->userdata("operator_id");
       
         if(get_ap('doctor',$this->operator_id)==1){ }else{ redirect("admin","refresh");}
      
    }
    public function index()
    {
        // pr($this->session->userdata());die;
     	$data['title']="Doctor List";
     	$data['results'] = $this->Doctor_Model->get_doctor();
        // pr($data);die;
        $this->load->view("doctor/index",$data);
    }

      function create($level_id=""){
      
         if($this->input->server("REQUEST_METHOD")=="POST"){        
          $this->form_validation->set_rules('email1', 'Email Address', 'required|trim|valid_email|is_unique[doctor.email]');
            $this->form_validation->set_rules('first_name', 'first_name', 'required|trim|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[confirm_password]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|min_length[5]');
          if ($this->form_validation->run() == TRUE){
                 $data = $this->input->post() ;
                // pr($data);die;
                unset($data['confirm_password']);
                unset($data['agree']);

                $this->load->helper('string');
              $activation_code = random_string('unique', 16);

                $data['activate_code'] =  $activation_code ;
                
                $data['email']=$data['email1'];
                $data['password'] = md5($this->input->post('password'));
        $data['register_date'] = date("Y-m-d h:i:sa");
        $data['status'] = 1;
        $data['operator_id'] = 3;
                
                unset($data['email1']);
                $insert_id =   $this->Doctor_Model->save('doctor',$data);
        
        $update = array("members_no" => "SU".(10100 +$insert_id ) );
        $this->Doctor_Model->update1($insert_id,$update);                       
        //die;
        $message = "Please check your  verify email ";
        $this->session->set_flashdata('message', $message);
            redirect('admin/doctor/index','refresh');
             }
         }
       
       $data['title']="Add doctor";
       $this->load->view("doctor/create",$data);
    }


    public function edit($id) {
       if($this->input->server("REQUEST_METHOD")=="POST"){
            $data = $this->input->post();
            // $data['register_date'] = date('Y-m-d h:m:sa');
            // $data['password'] = md5($data['passwords']);
             $data['password'] = md5($this->input->post('password'));
            $data['status'] = 1;
              $this->Doctor_Model->update('doctor','id',$id,$data);
            $this->session->set_flashdata('message', 'save Successfully' );
                redirect("admin/doctor/index");
         }
        $data['title']="Edit doctor";
        $data['result'] = $this->Doctor_Model->get_doctor_id($id);
        $this->load->view("doctor/edit",$data);
    }

       public function export_data() {
        $data['result']=$result = $this->Doctor_Model->get_doctor();
         // pr($result);die;
        $array = array();
        if($result){
           $array[] = array('First Name','Second Name','Last Name','email', 'Mobile No','DOB','Gender');
       
        foreach ($result as $key => $result_value) {
           $array[] = array(
            'first_name'               => $result_value->first_name,
            'second_name'              => $result_value->second_name,
            'last_name'                => $result_value->last_name,
            'email'                    => $result_value->email,
            'mobile_no'                => $result_value->mobile_no,
            'dob'                      => $result_value->dob,
            'gender'                   => $result_value->gender
                
                
                            );
        }
      }
      export_csv($array,"Doctor");
      die;
    }


    public function delete($id) {
        $this->Doctor_Model->delete($id);
        $this->session->set_flashdata('message', 'Successfully Deleted');
        redirect('admin/doctor', 'refresh');
    }
      function status($id,$status) {
         $data = array('status'=>$status);
        $this->Doctor_Model->update1($id,$data);
        echo $this->db->last_query();
        redirect('admin/doctor', 'refresh');
    }
}