<?php if (!defined('BASEPATH')) exit('No direct script access allowed');   
//error_reporting('E_ALL ^ E_NOTICE'); 
class Groups extends CI_Controller {
    
    public function  __construct(){      
        parent::__construct(); 
        $this->operator_id = $this->session->userdata("operator_id");
        // if(get_ap('groups',$this->operator_id) ==1) { } else { redirect("","refresh");}
        $this->load->model("Groups_Model");
         
    }

    function index() {
        $data['title']= "Groups";
		$data['results'] = $this->Groups_Model->get_groups();
        $this->load->view("groups/index",$data);
    }

   
    function create() {
        // if(get_ap('groups_add',$this->operator_id) ==1) { } else { redirect("","refresh");}
        if($this->input->server("REQUEST_METHOD")=="POST"){ 
           
                $data = $this->input->post() ;
                $insert_id = $this->Groups_Model->save($data);
                $this->session->set_flashdata('message', "Successfully Inserted");
                redirect('admin/groups', 'refresh');
             
            
        }
        $data['title']= "Add Groups";
        $this->load->view("groups/create",$data);
    }

    function edit($id) {
        if($this->input->server("REQUEST_METHOD")=="POST"){ 
            $data = $this->input->post() ;   
            $this->Groups_Model->update($id,$data);
            $this->session->set_flashdata('message', 'Successfully Saved');
            redirect('admin/groups', 'refresh');    
        }
        $data['title']= "Edit Groups";
        $data['result'] = $this->Groups_Model->get_groups_id($id);
        $this->load->view("groups/edit",$data);
    }

    function permission($id) {
        if($this->input->server("REQUEST_METHOD")=="POST"){ 
            $data_array = $this->input->post() ; 
             // pr($data_array);die;
            if($data_array){
                foreach ($data_array as $key => $value) {
                   $array[] = array(
                                    'operator_id'       => $id,
                                    'column_name'       => $key,
                                    'access_permission' => $value
                                );
                }
            }
            $this->Groups_Model->update_role($id,$array);
            $this->session->set_flashdata('message', 'Successfully Saved');
            //redirect('groups', 'refresh');
            
        } 
        $data['title'] = "Edit Permission";
        $data['result'] = $this->Groups_Model->get_groups_id($id);
        $this->load->view("groups/permission",$data);
    }
    
    function delete($id) {
        $this->Groups_Model->delete($id);
        $this->session->set_flashdata('message', 'Successfully Deleted');
        redirect('groups', 'refresh');
    }

}   