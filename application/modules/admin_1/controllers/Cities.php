<?php if (!defined('BASEPATH')) exit('No direct script access allowed');   
//error_reporting('E_ALL ^ E_NOTICE');
class Cities extends MX_Controller {

   public function  __construct() {
        parent::__construct();
         if(empty($this->session->userdata("user_id"))) { redirect("admin/login","refresh"); }
        $this->load->model("Cities_Model");
        $this->load->helper('security');   
            $this->operator_id = $this->session->userdata("operator_id");
        // if(get_ap('Cities',$this->operator_id)==1){ }else{ redirect("","refresh");}
      
    }


    public function index() {
     	$data['title']="Cities";

     	 $data['results'] = $this->Cities_Model->get_cities();
     	 // print_r($data); die;
        $this->load->view("cities/index",$data);
    }

    public function create() {
    	if($this->input->server("REQUEST_METHOD")=="POST"){ 
					$data = $this->input->post();
                    $data['status'] = 1;

					$this->Cities_Model->save($data);
					$this->session->set_flashdata('message', 'Successfully Created');
					redirect('admin/Cities', 'refresh');
        }

     	$data['title']="Add Cities";
        $data['countries'] = $this->Cities_Model->get_countries();

        $this->load->view("Cities/create",$data);
    }


    public function edit($id) {
    	if($this->input->server("REQUEST_METHOD")=="POST"){ 
	  	    $data = $this->input->post();
            $this->Cities_Model->update($id,$data);
            $this->session->set_flashdata('message', 'Successfully Updated');
            redirect('admin/cities/', 'refresh');
		}

     	$data['title']="Edit Cities";
        $data['countries'] = $this->Cities_Model->get_countries();

     	$data['result'] = $this->Cities_Model->get_cities_id($id);

       // print_r($data); die;
        $this->load->view("cities/edit",$data);
    }


    public function delete($id) {
     	$this->Cities_Model->delete($id);
        $this->session->set_flashdata('message', 'Successfully Deleted');
        redirect('admin/cities', 'refresh');
    }
     function status($id,$status) {
        // pr($status);die;
        $this->Cities_Model->status($id,$status);
        $this->session->set_flashdata('message', 'Successfully Changed');
        redirect('admin/cities', 'refresh');
    }
       function cod_status($id,$status) {
        $this->Cities_Model->cod_status($id,$status);
        $this->session->set_flashdata('message', 'Successfully Changed');
        redirect('admin/cities', 'refresh');
    }

}