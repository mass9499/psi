<?php if (!defined('BASEPATH')) exit('No direct script access allowed');   
//error_reporting('E_ALL ^ E_NOTICE');
class Results extends MX_Controller {

   public function  __construct() {
        parent::__construct();
        // if(empty($this->session->userdata("admin"))) { redirect("admin/login","refresh"); }
        $this->load->model("Results_Model");
        $this->load->helper('security');     
        $this->operator_id = $this->session->userdata("operator_id");
        // if(get_ap('results',$this->operator_id)==1){ }else{ redirect("","refresh");}
    
    }


    public function index($patient_id="") {
     	$data['title']="Results";
      $fliters =  $_GET;
     // pr($fliters); die;
     	$data['results'] = $this->Results_Model->get_results($patient_id,$fliters);
      $data['patients'] = $this->Results_Model->get_patients();
    // pr($data); die;
  
      $this->load->view("results/index",$data);
    }

    public function create() {

	    if($this->input->server("REQUEST_METHOD")=="POST"){ 
        $data = $this->input->post();

       // print_r($data); die;
        $this->Results_Model->save($data);
        $this->session->set_flashdata('message', $this->lang->line('save_successfully'));
        redirect('admin/results', 'refresh');

      } 

        
     	$data['title']="Add Results";
        $data['patient'] = $this->Results_Model->get_patient();
         $data['doctor'] = $this->Results_Model->get_doctor();
          $data['level'] = $this->Results_Model->get_level();
    // pr($data);die;
        $this->load->view("results/create",$data);
    }


    public function edit($id) {
    	 if($this->input->server("REQUEST_METHOD")=="POST"){ 
              $data = $this->input->post();

                $this->session->set_flashdata('message', $this->lang->line('save_successfully'));
                $this->Results_Model->update($id,$data);
                redirect('admin/results', 'refresh');
            
        }

     	  $data['title']="Edit results";
        $data['patient'] = $this->Results_Model->get_patient();
        $data['doctor'] = $this->Results_Model->get_doctor();
        $data['level'] = $this->Results_Model->get_level();
     	  $data['result'] = $this->Results_Model->get_results_id($id);
        $this->load->view("results/edit",$data);
    }
  public function view($test_id) {
     $data['title']="Results";
     
      $data['test_detail'] = $this->Results_Model->get_results_dpl($test_id);
      $data['questions'] = $this->Results_Model->get_results_dpl_id($test_id);
          //  pr($data);die;
      $this->load->view("results/view",$data);
  }

    public function delete($id) {
     	$this->Results_Model->delete($id);
        $this->session->set_flashdata('message', 'Successfully Deleted');
        redirect('admin/results', 'refresh');
    }

      function status($id,$status) {
         $data = array('status'=>$status);
        $this->Results_Model->update1($id,$data);
        echo $this->db->last_query();
        redirect('admin/results', 'refresh');
    }


    public function export_data() {

         $fliters =  $_GET;
    
        $data['result']=$result = $this->Results_Model->get_patient_results();
        $array = array();
        if($result){
           $array[] = array('First Name','Second Name','Last Name','email', 'Mobile No','DOB','Gender','Country');
       
            foreach ($result as $key => $result_value) {
               $array[] = array(
                'first_name'               => $result_value->f_n,
                'second_name'              => $result_value->s_n,
                'last_name'                => $result_value->l_n,
                'email'                    => $result_value->d_f_n,
                'mobile_no'                => $result_value->d_s_n,
                'dob'                      => $result_value->d_l_n,
                'gender'                   => $result_value->level,
                'country'                   => $result_value->country,
                    
                    
                                );
            }
        }
      export_csv($array,"Results");
    }

}