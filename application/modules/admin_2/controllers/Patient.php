<?php if (!defined('BASEPATH')) exit('No direct script access allowed');   
//error_reporting('E_ALL ^ E_NOTICE');
class patient extends MX_Controller
{
    public function  __construct()
    {
        parent::__construct();
           if(empty($this->session->userdata("user_id"))) { redirect("admin/login","refresh"); }
        $this->load->model("Patient_Model");
        $this->load->helper('security');   
       $this->operator_id = $this->session->userdata("operator_id");
       // pr($this->session->userdata("operator_id"));die;
         if(get_ap('patient',$this->operator_id)==1){ }else{ redirect("admin","refresh");}
      
    }
    public function index()
    {
        // pr($this->session->userdata());die;
     	$data['title']="Patient List";
     	$data['results'] = $this->Patient_Model->get_patient();
        // pr($data);die;
        $this->load->view("patient/index",$data);
    }

      function create(){
      
         if($this->input->server("REQUEST_METHOD")=="POST"){        
          $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[patient.email]');
            $this->form_validation->set_rules('first_name', 'first_name', 'required|trim|min_length[2]|max_length[50]');
          if ($this->form_validation->run() == TRUE){
                 $datas = $this->input->post() ;
                $this->load->helper('string');

                $data['email']=$datas['email'];
                $data['register_date'] = date("Y-m-d h:i:sa");
                $data['status'] = 1;

                $data['medical_no']= $datas['mrn'];

                $data['first_name']=$datas['first_name'];
                $data['second_name']=$datas['second_name'];
                $data['last_name']=$datas['last_name'];
                $data['country_id']=$datas['country_id'];
                $data['city_id']=$datas['city_id'];
                $data['dob']=$datas['dob'];
                $data['mobile_no']=$datas['mobile_no'];
                $data['gender']=$datas['gender'];

                $insert_id =   $this->Patient_Model->save('patient',$data);

            if($insert_id){
                $input['patient_id']=@$insert_id;
                $input['l_normal_hear']=@$datas['l_normal_hear'];
                $input['r_normal_hear']=@$datas['r_normal_hear'];
                $input['l_hear_loss']=@$datas['l_hear_loss'];
                $input['r_hear_loss']=@$datas['r_hear_loss'];
                $input['l_no_device']=@$datas['l_no_device'];
                $input['r_no_device']=@$datas['r_no_device'];
                $input['l_hear_aid']=@$datas['l_hear_aid'];
                $input['r_hear_aid']=@$datas['r_hear_aid'];
                // $input['l_hear_imp_system']=@$datas['l_hear_imp_system'];
                // $input['r_hear_imp_system']=@$datas['r_hear_imp_system'];
                $input['l_cochlear_implant']=@$datas['l_cochlear_implant'];
                $input['r_cochlear_implant']=@$datas['r_cochlear_implant'];

                // $input['l_cochlear_implant_ear']=@$datas['l_cochlear_implant_ear'];
                // $input['r_cochlear_implant_ear']=@$datas['r_cochlear_implant_ear'];

                $input['l_hybrid_system']=@$datas['l_hybrid_system'];
                $input['r_hybrid_system']=@$datas['r_hybrid_system'];



                $input['l_middle_ear']=@$datas['l_middle_ear'];
                $input['r_middle_ear']=@$datas['r_middle_ear'];
                $input['l_bone_implant']=@$datas['l_bone_implant'];
                $input['r_bone_implant']=@$datas['r_bone_implant'];
                $input['l_implant_date']=@$datas['l_implant_date'];
                $input['r_implant_date']=@$datas['r_implant_date'];
                $input['l_brain_implant']=@$datas['l_brain_implant'];
                $input['r_brain_implant']=@$datas['r_brain_implant'];

                $input['l_adhesive_bone']=@$datas['l_adhesive_bone'];
                $input['r_adhesive_bone']=@$datas['r_adhesive_bone'];

                $insert_id =   $this->Patient_Model->save('ear_implant',$input);
          
            }

        $update = array("members_no" => "SU".(10100 +$insert_id ) );
        $this->Patient_Model->update1($insert_id,$update);                       
        //die;
        $message = 'Save Successfully';
        $this->session->set_flashdata('message', $message);
            redirect('admin/patient/index','refresh');
             }
         }
       
       $data['title']="Add Patient";
        $data['countries'] = $this->Patient_Model->get_countries();
        $data['cities'] = $this->Patient_Model->get_cities();
       $this->load->view("patient/create",$data);
    }


    public function edit($id) {
       if($this->input->server("REQUEST_METHOD")=="POST"){
            $datas = $this->input->post();
            $data['status'] = 1;
                $data['register_date'] = date("Y-m-d h:i:sa");
                $data['status'] = 1;
                $data['medical_no']= $datas['mrn'];

                $data['first_name']=@$datas['first_name'];
                $data['second_name']=@$datas['second_name'];
                $data['last_name']=@$datas['last_name'];
                $data['country_id']=@$datas['country_id'];
                $data['city_id']=$datas['city_id'];

                $data['dob']=@$datas['dob'];
                $data['mobile_no']=@$datas['mobile_no'];
                $data['gender']=@$datas['gender'];
                // unset($data['email1']);
              $insert_id = $this->Patient_Model->update('patient','id',$id,$data);

            if($insert_id){
                $input['l_normal_hear']=@$datas['l_normal_hear'];
                $input['r_normal_hear']=@$datas['r_normal_hear'];
                $input['l_hear_loss']=@$datas['l_hear_loss'];
                $input['r_hear_loss']=@$datas['r_hear_loss'];
                $input['l_no_device']=@$datas['l_no_device'];
                $input['r_no_device']=@$datas['r_no_device'];
                $input['l_hear_aid']=@$datas['l_hear_aid'];
                $input['r_hear_aid']=@$datas['r_hear_aid'];
                // $input['l_hear_imp_system']=@$datas['l_hear_imp_system'];
                // $input['r_hear_imp_system']=@$datas['r_hear_imp_system'];
                $input['l_cochlear_implant']=@$datas['l_cochlear_implant'];
                $input['r_cochlear_implant']=@$datas['r_cochlear_implant'];
                // $input['l_cochlear_implant_ear']=@$datas['l_cochlear_implant_ear'];
                // $input['r_cochlear_implant_ear']=@$datas['r_cochlear_implant_ear'];

                 $input['l_hybrid_system']=@$datas['l_hybrid_system'];
                $input['r_hybrid_system']=@$datas['r_hybrid_system'];


                $input['l_middle_ear']=@$datas['l_middle_ear'];
                $input['r_middle_ear']=@$datas['r_middle_ear'];
                $input['l_bone_implant']=@$datas['l_bone_implant'];
                $input['r_bone_implant']=@$datas['r_bone_implant'];
                $input['l_implant_date']=@$datas['l_implant_date'];
                $input['r_implant_date']=@$datas['r_implant_date'];
                $input['l_brain_implant']=@$datas['l_brain_implant'];
                $input['r_brain_implant']=@$datas['r_brain_implant'];

                   $input['l_adhesive_bone']=@$datas['l_adhesive_bone'];
                $input['r_adhesive_bone']=@$datas['r_adhesive_bone'];



                $this->Patient_Model->update('ear_implant','patient_id',$id,$input);
              // echo $this->db->last_query();die;  
                }
            $this->session->set_flashdata('message', 'Save Successfully' );
                redirect("admin/patient/index");
         }
        $data['title']="Edit Patient";
        $data['result'] = $this->Patient_Model->get_patient_id($id);
         $data['countries'] = $this->Patient_Model->get_countries();
        $data['cities'] = $this->Patient_Model->get_cities();
        // pr($data);die;

        $this->load->view("patient/edit",$data);
    }

 public function export_data() {
        $data['result']=$result = $this->Patient_Model->get_patient();
        $array = array();
        if($result){
           $array[] = array('First Name','Second Name','Last Name','email', 'Mobile No','DOB','Gender','Country');
       
            foreach ($result as $key => $result_value) {
               $array[] = array(
                'first_name'               => $result_value->first_name,
                'second_name'              => $result_value->second_name,
                'last_name'                => $result_value->last_name,
                'email'                    => $result_value->email,
                'mobile_no'                => $result_value->mobile_no,
                'dob'                      => $result_value->dob,
                'gender'                   => $result_value->gender,
                'country'                   => $result_value->country,
                    
                    
                                );
            }
        }
      export_csv($array,"Patient");
    }


    public function delete($id) {
        $this->Patient_Model->delete($id);
        $this->session->set_flashdata('message', 'Successfully Deleted');
        redirect('admin/patient', 'refresh');
    }
     function status($id,$status) {
         // pr($status);die;
         $data = array('status'=>$status);
        $this->Patient_Model->update1($id,$data);
        echo $this->db->last_query();
        redirect('admin/patient', 'refresh');
    }
}