<?php if (!defined('BASEPATH')) exit('No direct script access allowed');   
//error_reporting('E_ALL ^ E_NOTICE');
class Member extends MX_Controller {

   public function  __construct() {
        parent::__construct();
        // $this->load->model("Member_Model");
        $this->load->model('Member_Model');  
        $this->load->helper('security');  
            $this->operator_id = $this->session->userdata("operator_id");
        // if(get_ap('member',$this->operator_id)==1){ }else{ redirect("","refresh");}
       
    }
    public function index() {
        $data['results'] = $this->Member_Model->get_member();
        $data['title'] = 'Members';
        $this->load->view('member/index',$data);
    } 

    function create(){
        if($this->input->server("REQUEST_METHOD")=="POST"){
            $data = $this->input->post();
            $data['register_date'] = date('Y-m-d h:m:sa');
            $data['password'] = md5($data['passwords']);
            unset($data['passwords']);
            $data['status'] = 1;
            $this->Member_Model->save($data);
            $this->session->set_flashdata('message', 'save Successfully' );
            redirect("admin/member/index");
        }
       $data['title']="Add Member"; 
       $this->load->model("Groups_Model");
       $data['group'] =$this->Groups_Model->get_groups();
       $this->load->view("member/create",$data);
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
                $this->session->set_flashdata('message', 'no changes' );
                redirect("admin/change_password");
             }else {         
                $query=$this->Member_Model->change_password();
                $this->session->set_flashdata('message', 'change Successfully');
                redirect("admin/change_password");
            }
        }
       $data['title']="Change Password";   
       $this->load->view("default/change_password",$data);
    }

    public function status($id,$status) {
        if($status==1)
        {
            $data['status'] = 0;
        }else if ($status == 0) {
            $data['status'] =1;
        }
        else{
            $data['status'] =0;
        }
        $this->Member_Model->update('admin','id',$id,$data);
        $this->session->set_flashdata('message', 'Successfully Changed');
        redirect('admin/Member', 'refresh');
    }


    function edit($id){
        if($this->input->server("REQUEST_METHOD")=="POST"){
            $data = $this->input->post();
            $data['last_visit_date'] = date('Y-m-d h:m:sa');
            //pr($data);die;
            $this->Member_Model->update('admin','id',$id,$data);
                    $this->session->set_flashdata('message', 'save Successfully' );
                    redirect("admin/member/index");
                   }
       $data['title']="Edit Member"; 
       $data['result'] = $this->Member_Model->get_member_id($id);
       //echo $this->db->last_query();
       //pr($data['result']);die;  
       $this->load->model("Groups_Model");
       $data['group'] =$this->Groups_Model->get_groups();
       $this->load->view("member/edit",$data);
    }


    function delete($id){
        $this->Member_Model->delete('admin','id',$id);
        $this->session->set_flashdata('message', 'delete Successfully' );
        redirect("admin/member/index");
    }

}
?>