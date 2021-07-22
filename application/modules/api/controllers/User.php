<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function  __construct() {
        parent::__construct();
        $this->load->library('rest');
        //$this->rest->appAuthentication();
        $this->load->model("User_Model");
        //$this->load->library("myemail"); 
       $this->load->helper('security');
    }

	public function index()
	{	
		if($this->rest->get_request_method() == "POST"){
            if($this->rest->_request){
            	//print_r($this->rest->_request);
				$this->rest->response(200,array(),'success',0);
        	}
   		}
		$this->rest->response(400,array(),'bad request',1);
	}

	public function login()
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
        		$user = $this->User_Model->check_login($email,$password);
        		if($user){
                    $result = $user;
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


	public function register()
	{	
		if($this->rest->get_request_method() == "POST" && $this->rest->_request){
        	$_POST = $this->rest->_request;          	
        	//print_r($this->input->post());
        	$this->load->library('form_validation'); 
        	$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|xss_clean|is_unique[user.email]');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|trim|xss_clean|is_unique[user.mobile_no]');
        	$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
            $this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');     	
        	if ($this->form_validation->run() == TRUE){
        		$data = array(
        						'first_name'		=> $this->input->post('name'),
        						'email'				=> $this->input->post('email'),
                                'mobile_no'            => $this->input->post('mobile'),
        						'password'			=> md5($this->input->post('password')),
        						'status'			=> 1,
        						'register_date'		=> date("Y-m-d")
        					);
        		//print_r($data);die;
        		$insert_id = $this->User_Model->save($data);
        		if($insert_id) {
                    $invID =10100 + $insert_id ;
        		    $insert_data = array("members_no" => "FOOD".$invID);
                    $update =$this->User_Model->update($insert_id,$insert_data);
                    
                    /*$this->load->library('myemail');
                    $mail =array();
                    $mail['firstname'] = $this->input->post('name');
                    $mail['to']        = $this->input->post('email');
                    $mail['cc']        = 'gpandiyan.tech@gmail.com';
                    $mail['code']      = $activation_code;
                    //$mail['confirm_link']= base_url()."user/app_confirm/".$activation_code;
                    $mail['subject']   = "Please Confirm Your Email - User Registration, syahy.com";

                    $this->my_email->sendmail($mail,'Registration');
*/
                }

             	return $this->rest->response(200,array(),'success',0);      
            }
            else{
                $error = validation_errors();
                return $this->rest->response(400,array(),$error,1);
            }
   		}
		return $this->rest->response(400,array(),'bad request',1);
	}

       public function change_password($user_id)
    {   
        // pr('d');die;
        if($this->rest->get_request_method() == "POST" && $this->rest->_request){
            $_POST = $this->rest->_request;             
                // $email = $this->session->userdata("admin")['email'];
                
                $this->load->library('form_validation');
                $this->form_validation->set_rules('old_password','Old Password','trim|xss_clean|required|min_length[4]|max_length[32]');
                $this->form_validation->set_rules('password','Password','trim|xss_clean|required|min_length[4]|max_length[32]');
                $this->form_validation->set_rules('password2','Reenter Password','trim|xss_clean|required|min_length[4]|max_length[32]|matches[password]');
            if ($this->form_validation->run() == TRUE){
                $query=$this->User_Model->change_password($user_id);
                return $this->rest->response(200,array(),'success',0);      
            }
            else{
                $error = validation_errors();
                return $this->rest->response(400,array(),$error,1);
            }
        }
        return $this->rest->response(400,array(),'bad request',1);
    }

      public function profile($user_id){
        $profile = $this->User_Model->get_profile($user_id);
        $results =  array("result" => $profile );
        return $this->rest->response(200,$results,'success',0);
    }
     public function my_ads($user_id){
        $myads = $this->User_Model->get_myads($user_id);
        $results =  array("result" => $myads );
        return $this->rest->response(200,$results,'success',0);
    }


}