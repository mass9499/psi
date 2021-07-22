<?php if (!defined('BASEPATH')) exit('No direct script access allowed');   
//error_reporting('E_ALL ^ E_NOTICE');
class countries extends MX_Controller {

   public function  __construct() {
        parent::__construct();
         if(empty($this->session->userdata("user_id"))) { redirect("admin/login","refresh"); }
        $this->load->model("Countries_Model");
        $this->load->helper('security');   
            $this->operator_id = $this->session->userdata("operator_id");
        // if(get_ap('countries',$this->operator_id)==1){ }else{ redirect("","refresh");}
      
    }


    public function index() {
     	$data['title']="Countries";
     	 $data['results'] = $this->Countries_Model->get_Countries();
     	// pr($data);
        $this->load->view("countries/index",$data);
    }

    public function create() {
    	if($this->input->server("REQUEST_METHOD")=="POST"){ 
					$data = $this->input->post() ;
              
					$this->Countries_Model->save($data);
					$this->session->set_flashdata('message', 'Successfully Created');
					redirect('admin/countries', 'refresh');
        }

     	$data['title']="Add Countries";
        $this->load->view("countries/create",$data);
    }


    public function edit($id) {
    	if($this->input->server("REQUEST_METHOD")=="POST"){ 
	  	    $data = $this->input->post();
            $this->Countries_Model->update($id,$data);
            $this->session->set_flashdata('message', 'Successfully Updated');
            redirect('admin/countries/', 'refresh');
		}
     	$data['title']="Edit Countries";
     	$data['result'] = $this->Countries_Model->get_countries_id($id);
        $this->load->view("countries/edit",$data);
    }


    public function delete($id) {
     	$this->Countries_Model->delete($id);
        $this->session->set_flashdata('message', 'Successfully Deleted');
        redirect('admin/countries', 'refresh');
    }
     function status($id,$status) {
        // pr($status);die;
        $this->Countries_Model->status($id,$status);
        $this->session->set_flashdata('message', 'Successfully Changed');
        redirect('admin/countries', 'refresh');
    }
       function cod_status($id,$status) {
        $this->Countries_Model->cod_status($id,$status);
        $this->session->set_flashdata('message', 'Successfully Changed');
        redirect('admin/countries', 'refresh');
    }

}