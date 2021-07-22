<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MX_Controller  {

public function  __construct() {
        parent::__construct();
        $this->load->model("Admin_Model");  
        $this->load->helper('security');    
    }

	public function index()
	{
     if(empty($this->session->userdata("user_id"))) { redirect("admin/login","refresh"); }
        $data['title'] ="Dashboard";

            $patient_m = $this->Admin_Model->get_patient('M');
            $data['patient_m'] = count($patient_m);
            $patient_f = $this->Admin_Model->get_patient('F');
            $data['patient_f'] = count($patient_f);


            $data['correct_answer'] = $this->Admin_Model->get_level_answer(1);
            $data['worng_answer'] = $this->Admin_Model->get_level_answer(0);
            $total_count = count($data['worng_answer']);
               
                for ($i=0; $i < $total_count; $i++) { 

             $correct_answer = array(
                                    "level"         => $data['correct_answer']->level,
                                    "count"         => $data['correct_answer']->count
                                  );
         }
            
                // pr($data);die;
		$this->load->view('admin/dashboard',$data);
	}


	public function login() { 
       if(!empty($this->session->userdata("user_id"))) { redirect("admin","refresh"); }       
        $this->load->view("admin/default/login");
    }

    public function login_ajax()
    {
        if($this->session->userdata("user_id") != "") { redirect('user/dashboard','refresh');}
        if($this->input->server("REQUEST_METHOD")=="POST"){        
             $data['email'] = $this->input->post('email');
             $data['password'] =   $this->input->post('password');
             $admin_table = $this->Admin_Model->login($data);
                 // pr($admin_table); die;
             if($admin_table){
                if($admin_table->status == 1){
                    $update_data =  array(
                                        'last_visit'       => date("Y-m-d H:i:s")
                                        );
                    //$this->Admin_Model->update_profile($update_data,$admin_table->email);
                    $admin = array(
                                    "email"         => $admin_table->email,
                                    "firstname"     => $admin_table->firstname,
                                    "user_id"       => $admin_table->id,
                                    "operator_id"   => $admin_table->operator_id,
                                  );

                    $this->session->set_userdata($admin);

                    if($this->input->post('remember') ==1){
                        $this->input->set_cookie('pm_email',  $this->input->post('email'), 86500 *30); /* Create cookie for store emailid */

                        $this->input->set_cookie('pm_password',  $this->encryption->encrypt($this->input->post('password')), 86500 *30); /* Create cookie for password */
                    }
                    $status = 1;
                    $message ="Login Success";
                    $this->session->set_flashdata('message', $message);
                }
                else {
                    $status = 0;
                    $message = "Your Account Deactivated.Please Contact Super Admin";
                    
                }
            }
            else{
                    $status = 0;
                    $message = $this->lang->line("invalid_username_or_password");
            }
        }
        $data = array(
                        'status'        => $status,
                        'message'       => $message
        );  
        echo json_encode($data);
    }

 
    function change_password(){

        if($this->input->server("REQUEST_METHOD")=="POST"){
                $email = $this->session->userdata("admin")['email'];
                
                $this->load->library('form_validation');
                $this->form_validation->set_rules('old_password','Old Password','trim|xss_clean|required|min_length[4]|max_length[32]');
                $this->form_validation->set_rules('password','Password','trim|xss_clean|required|min_length[4]|max_length[32]');
                $this->form_validation->set_rules('password2','Reenter Password','trim|xss_clean|required|min_length[4]|max_length[32]|matches[password]');

                if ($this->form_validation->run() == FALSE)
                 {
           
                 }else {         
                $query=$this->Admin_Model->change_password();

                $this->session->set_flashdata('message', $query );
                redirect("admin/change_password");
                  }
        }
       $data['title']="Change Password";   
       $this->load->view("admin/default/change_password",$data);
    }

    
    public function logout() {        
        $this->session->sess_destroy();
        redirect('admin/login', 'refresh');
         // redirect("admin/login","refresh");
    }
	
}
