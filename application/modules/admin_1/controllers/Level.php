<?php if (!defined('BASEPATH')) exit('No direct script access allowed');   
//error_reporting('E_ALL ^ E_NOTICE');
class Level extends MX_Controller {

   public function  __construct() {
        parent::__construct();
        // if(empty($this->session->userdata("admin"))) { redirect("admin/login","refresh"); }
        $this->load->model("Level_Model");
        $this->load->helper('security');     
        $this->operator_id = $this->session->userdata("operator_id");
        // if(get_ap('level',$this->operator_id)==1){ }else{ redirect("","refresh");}
    
    }

    public function index() {
     	$data['title']="Level";
     	$data['results'] = $this->Level_Model->get_level();
      $this->load->view("level/index",$data);
    }

      public function create() {
      	    if($this->input->server("REQUEST_METHOD")=="POST"){ 

                      $data = $this->input->post() ;
                      $image_name="";
                      
                 
              $count = count($_FILES['photo']['name']);
              for($s=0; $s<$count; $s++)
              {   
                  $name = $_FILES['photo']['name'][$s];
                  $size = $_FILES['photo']['size'][$s];
                  $type = $_FILES['photo']['type'][$s];
                  $temp = $_FILES['photo']['tmp_name'][$s];
                  $ext = explode(".", $name);
                 $image_name = "level-".$size.rand(0,5000000).".".end($ext);
                  move_uploaded_file($temp,"files/level/".$image_name);

                  // $data =  array();
      
                      $data['image_name']=$image_name;
                      $data['status']= 1;
                      // pr($data);die;
                      $this->Level_Model->save($data);
                     $this->session->set_flashdata('message', $this->lang->line('save_successfully'));
                      redirect('admin/level', 'refresh');

              } 

          }
       	$data['title']="Add Level";
        $data['category'] = $this->Level_Model->get_category();
          $this->load->view("level/create",$data);
      }


      public function edit($id) {
      	if($this->input->server("REQUEST_METHOD")=="POST"){ 
                $data = $this->input->post();

                  $image_name= $data['old_photo'];

                  if($_FILES['photo']['name'] !="" ){
                      $name=$_FILES['photo']['name'];
                      $size=$_FILES['photo']['size'];
                      $type=$_FILES['photo']['type'];
                      $temp=$_FILES['photo']['tmp_name'];
                      $ext = explode(".", $name);
                      $image_name = "level-".$size.rand(0,5000000).".".$ext[1];
                      move_uploaded_file($temp,"files/level/".$image_name);
                       $old_path = "files/level/".$data['old_photo'];
                          if(file_exists($old_path)) unlink($old_path);
                  }   
                  $data['image_name']=$image_name;
                 
                  
                  unset($data['old_photo']);
                 /* pr($data);
                  die;*/
                  $this->session->set_flashdata('message', $this->lang->line('save_successfully'));
                  $this->Level_Model->update($id,$data);
                  redirect('admin/level', 'refresh');
              
          }
       	$data['title']="Edit level";
       	$data['result'] = $this->Level_Model->get_level_id($id);
        $data['category'] = $this->Level_Model->get_category();
        $this->load->view("level/edit",$data);
      }

      public function view($level_id) {
                 
              $data['title']="View Level";
              $data['results'] = $this->Level_Model->get_level_id($level_id);
              $data['questions'] = $this->Level_Model->get_results_dpl($level_id);
               // pr($data);die;
              $this->load->view("level/view",$data);
        }

      public function export_data() {
                  $data['result']=$result = $this->Level_Model->get_level();
                       // pr($result);die;
                    $array = array();
                    if($result){
                       $array[] = array('Name','Description');
                   
                    foreach ($result as $key => $result_value) {
                       $array[] = array(
                        'first_name'               => $result_value->name,
                        'description'              => $result_value->description
                            
                            
                                        );
                    }
                  }
                  export_csv($array,"level");
                  die;
                }
                public function delete($id) {
                 	$this->Level_Model->delete($id);
                    $this->session->set_flashdata('message', 'Successfully Deleted');
                    redirect('admin/level', 'refresh');
                }

                  function status($id,$status) {
                     $data = array('status'=>$status);
                    $this->Level_Model->update1($id,$data);
                    echo $this->db->last_query();
                    redirect('admin/level', 'refresh');
                }

}