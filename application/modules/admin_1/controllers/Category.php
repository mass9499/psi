<?php if (!defined('BASEPATH')) exit('No direct script access allowed');   
//error_reporting('E_ALL ^ E_NOTICE');
class Category extends MX_Controller {

   public function  __construct() {
        parent::__construct();
        // if(empty($this->session->userdata("admin"))) { redirect("admin/login","refresh"); }
        $this->load->model("Category_Model");
        $this->load->helper('security');     
            $this->operator_id = $this->session->userdata("operator_id");
        // if(get_ap('category',$this->operator_id)==1){ }else{ redirect("","refresh");}
    
    }

    public function index() {
     	$data['title']="Category";
     	$data['results'] = $this->Category_Model->get_category();
     	//pr($data);
      $this->load->view("category/index",$data);
    }

    public function create() {
	    if($this->input->server("REQUEST_METHOD")=="POST"){ 
        $data = $this->input->post() ;
        $this->Category_Model->save($data);
        $this->session->set_flashdata('message', $this->lang->line('save_successfully'));
        redirect('admin/category', 'refresh');
        }
     	  $data['title']="Add Category";
        $this->load->view("category/create",$data);
    }
    
    public function edit($id) {
      if($this->input->server("REQUEST_METHOD")=="POST"){ 
        $data = $this->input->post();
        $this->session->set_flashdata('message', $this->lang->line('save_successfully'));
        $this->Category_Model->update($id,$data);
        redirect('admin/category', 'refresh');
              
      }
      $data['title']="Edit category";
      $data['result'] = $this->Category_Model->get_category_id($id);
      $this->load->view("category/edit",$data);
    }

    public function delete($id) {
     	  $this->Category_Model->delete($id);
        $this->session->set_flashdata('message', 'Successfully Deleted');
        redirect('admin/category', 'refresh');
    }

    public function status($id,$status) {
        $data = array('category_status'=>$status);
        $this->Category_Model->update($id,$data);
        // echo $this->db->last_query();
        // redirect('admin/category', 'refresh');
    }

}