<?php if (!defined('BASEPATH')) exit('No direct script access allowed');   
//error_reporting('E_ALL ^ E_NOTICE'); 
class Setting extends CI_Controller {
    
    public function  __construct(){      
        parent::__construct(); 
        $this->operator_id = $this->session->userdata("operator_id");
        // if(get_ap('setting',$this->operator_id) ==1) { } else { redirect("","refresh");}
        $this->load->model("Setting_Model");         
    }


    function email() {
        if($this->input->server("REQUEST_METHOD")=="POST"){   
            $data = $this->input->post();
            $this->Setting_Model->update($data);
            $this->session->set_flashdata('message', 'Updated Successfully.');
            redirect('setting',"refresh");
        }
        $data['title']="Setting";
        $data['result'] = $this->Setting_Model->get_setting();
        $this->load->view("setting/email",$data);
    }

    function index() {

        $data['result'] = $this->Setting_Model->get_setting();
             // pr($this->session->userdata());die;
        if(empty($this->session->userdata("user_id"))) {
            redirect("admin/login","refresh");
        }

        // $email =  $this->session->userdata("admin")['email'];
        if($this->input->server("REQUEST_METHOD")=="POST"){ 
            $setting['company_name'] = $this->input->post('company_name');  
            $setting['company_logo']  = $this->input->post('company_logo');
            $setting['company_address']  = $this->input->post('company_address');
            $setting['company_mobile']  = $this->input->post('company_mobile');
            $setting['company_email']  = $this->input->post('company_email');
            $setting['currency']  = $this->input->post('currency');
            $setting['facbook']  = $this->input->post('facbook');
            $setting['twitter']  = $this->input->post('twitter');
            $setting['google_plus']  = $this->input->post('google_plus');
            $setting['instrgram']  = $this->input->post('instrgram');
            $setting['meta_title']  = $this->input->post('meta_title');
            $setting['meta_description']  = $this->input->post('meta_description');
            $setting['meta_keyword']  = $this->input->post('meta_keyword');
            $setting['header_script']  = $this->input->post('header_script');
            $setting['footer_script'] = $this->input->post('footer_script');


            $image_name_old = $this->input->post('company_logo_old');
            $setting['image_name'] = $image_name_old;

 
            if($_FILES['company_logo']['name'] !=""){
                $name=$_FILES['company_logo']['name'];
                $size=$_FILES['company_logo']['size'];
                $type=$_FILES['company_logo']['type'];
                $temp=$_FILES['company_logo']['tmp_name'];
                $ext = explode(".", $name);
                $image_name_ext = $size.rand(0,5000000).".".$ext[1];
                $setting['image_name'] = "assets/images/logo-".$image_name_ext;
                move_uploaded_file($temp,$setting['image_name']);
                if(file_exists($image_name_old)) { unlink($image_name_old);}
            }

            $company_logo2_old = $this->input->post('company_logo2_old');
            $setting['image_name2'] = $company_logo2_old;
            //echo $_FILES['company_logo2']['name'];
            if($_FILES['company_logo2']['name'] !=""){
                $name=$_FILES['company_logo2']['name'];
                $size=$_FILES['company_logo2']['size'];
                $type=$_FILES['company_logo2']['type'];
                $temp=$_FILES['company_logo2']['tmp_name'];
                $ext = explode(".", $name);
                $image_name_ext_2 = $size.rand(0,5000000).".".$ext[1];
                $setting['image_name2'] = "assets/images/logo-".$image_name_ext_2;
                move_uploaded_file($temp,$setting['image_name2']);
                if(file_exists($company_logo2_old)) { unlink($company_logo2_old);}
            }
            
            $company_fav_old = $this->input->post('company_fav_old');
            $setting['company_fav'] = $company_fav_old;

            if($_FILES['company_fav']['name'] !=""){
                $name=$_FILES['company_fav']['name'];
                $size=$_FILES['company_fav']['size'];
                $type=$_FILES['company_fav']['type'];
                $temp=$_FILES['company_fav']['tmp_name'];
                $ext = explode(".", $name);
                $image_name_ext_3 = $size.rand(0,5000000).".".$ext[1];
                $setting['company_fav'] = "assets/images/fav-icon-".$image_name_ext_3;
                move_uploaded_file($temp,$setting['company_fav']);
                if(file_exists($company_fav_old)) { unlink($company_fav_old);}
            }
             unset($setting['company_logo']);
                 // pr($setting);die;

              $setting_id = $this->Setting_Model->get_setting_id();

              if($setting_id==0){
            $this->Setting_Model->save('setting',$setting);
            $this->session->set_flashdata('message', 'Successfully Create');
              }
              else{    
            $this->Setting_Model->update('setting',$setting);
            $this->session->set_flashdata('message', 'Successfully Updated');
              
              }

            redirect('admin/setting', 'refresh');
        }
        $data['title']="Setting";
        $this->load->view("admin/setting/setting",$data);
    }

    function export(){
        $this->load->dbutil();

        $prefs = array(     
            'format'      => 'zip',             
            'filename'    => 'my_db_backup.sql'
            );

        $backup =& $this->dbutil->backup($prefs); 

        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $save = 'pathtobkfolder/'.$db_name;

        $this->load->helper('file');
        write_file($save, $backup); 

        $this->load->helper('download');
        force_download($db_name, $backup);
    }


    function import_dump($folder_name = null , $file_name) {
        $folder_name = 'dumps';
        $path = 'assets/backup_db/'; // Codeigniter application /assets
        $file_restore = $this->load->file($path . $folder_name . '/' . $file_name, true);
        $file_array = explode(';', $file_restore);
        foreach ($file_array as $query){
            $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
            $this->db->query($query);
            $this->db->query("SET FOREIGN_KEY_CHECKS = 1");
         }
    }

    

}