<?php

	function pr($data=""){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	function admin_url($url=""){
		return base_url("assets/admin/".$url);
	}
	
  function get_company(){
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from setting"; 
		$query = $ci->db->query($sql);
		return $query->num_rows() > 0 ? $query->row() : "";
	}

	function setting(){
		$CI =& get_instance();
		$CI->db->select('*');
    	$CI->db->where('setting_id',1);
		$query = $CI->db->get('setting');
		return $query->row();
	}

	function amount($price){
		$CI =& get_instance();
		$CI->db->select('*');
    	$CI->db->where('setting_id',1);
		$query = $CI->db->get('setting');
		return $query->row()->currency." ".$price;
	}

	function get_percentage($percentage,$totalWidth){
		 $new_width = ($percentage*100)/$totalWidth;
		 return round($new_width);
	}

	function get_member_alert(){
		$CI =& get_instance();
		$CI->db->select('u.*,o.name as operator_name,count(o.id) as  count_id');
		/*$this->db->order_by('u.id','desc');*/
		$CI->db->join('operator o', 'o.id = u.operator_id','left');
		$CI->db->group_by('1');
		$CI->db->having('count_id',0 );
		$query = $CI->db->get('user u');
		return $query->num_rows();
	}


	function notification(){
		$CI =& get_instance();
		$user_id = $CI->session->userdata('user_id');
		$CI->db->select('notification_status');
    	$CI->db->where('notification_status',0);
    	$CI->db->where('user_id',$user_id);
    	$CI->db->order_by('id','desc');
    	$CI->db->limit('10');
		$query = $CI->db->get('task_notification');
		return $query->num_rows();
	}

	function get_access(){
		$CI =& get_instance();
		$id = $CI->session->userdata('user_id');
		$CI->db->where('u.id',$id);
		$CI->db->select('u.*,o.name as operator_name,o.setting');
		$CI->db->order_by('u.id','desc');
		$CI->db->join('operator o', 'o.id = u.operator_id');
		$query = $CI->db->get('user u');
		if($query->num_rows()>0) {
			$privileges = $query->row()->setting;
			$privileges_data = array();
			if($privileges) $privileges_data = explode(",", $privileges);
			return $privileges_data;
		} else {
			return false;
		}
	}

	function get_access_data($permission){
		$CI =& get_instance();
		$id = $CI->session->userdata('user_id');
		$CI->db->where('u.id',$id);
		$CI->db->select('u.*,o.name as operator_name,o.setting');
		$CI->db->order_by('u.id','desc');
		$CI->db->join('operator o', 'o.id = u.operator_id');
		$query = $CI->db->get('user u');
		if($query->num_rows()>0) {
			$privileges = $query->row()->setting;
			$privileges_data = array();
			if($privileges) $privileges_data = explode(",", $privileges);
			if(in_array($permission, $privileges_data))  {
				return true;
			 } else {
			  return false;
			}

			return $privileges_data;
		} else {
			return false;
		}
}

function main_premission($permission_name){
		$CI =& get_instance();
		$CI->db->where('permission_name',$permission_name);
		$CI->db->select('permission_status');
		$query = $CI->db->get('setting_permission');
		///echo $CI->db->last_query();
		if($query->num_rows()>0) {   
			$privileges = $query->row()->permission_status;
			return $privileges;
		} else {
			return false;
		}
}

function get_ap($column_name,$operator_id="",$opt=""){
		$CI =& get_instance();
		$id = $CI->session->userdata('user_id');
		$CI->db->where('column_name',$column_name);
		$CI->db->where('operator_id',$operator_id);
		$CI->db->select('access_permission');
		$query = $CI->db->get('roles_list');
		// echo $CI->db->last_query();die;
		if($query->num_rows()>0) {
		    
			$ap = $query->row()->access_permission;
			if($opt) $privileges = $ap;
			else $privileges = $ap > 1  ?  1 : $ap;
			return $privileges;
		} else {
			return false;
		}
}

function get_ap_2($column_name,$operator_id="",$opt=""){
		$CI =& get_instance();
		$id = $CI->session->userdata('user_id');
		$CI->db->where('column_name',$column_name);
		$CI->db->where('operator_id',$operator_id);
		$CI->db->select('access_permission');
		$query = $CI->db->get('roles_list');
		if($query->num_rows()>0) {
		    
			$ap = $query->row()->access_permission;
			if($opt) $privileges = $ap;
			else $privileges = $ap;
			return $privileges;
		} else {
			return false;
		}
}

function get_days($end_date){
	$now = time(); // or your date as well
	$your_date = strtotime($end_date);
	$datediff =  $your_date - $now;
	return round($datediff / (60 * 60 * 24));
}

function gen_slug($str){
    # special accents
    $a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','Œ','œ','R','r','R','r','R','r','S','s','S','s','S','s','Š','š','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ÿ','Z','z','Z','z','Ž','ž','?','ƒ','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?');
    $b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
    return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','_',''),str_replace($a,$b,$str)));
}

	function  get_premission($id){
		$CI =& get_instance();
		
		$CI->db->where('r.operator_id',$id);
		$query = $CI->db->get('roles_list r');
		if($query->num_rows()>0) {
			$privileges_data = $query->result();
			pr($privileges_data);
			return $privileges_data;
		} else {
			return false;
		}
	}
    function get_shipping($amount){
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from shipping_cost where from_cost <=".$amount." AND to_cost >=".$amount." "; 
		$query = $ci->db->query($sql);
		return  $query->num_rows() > 0 ? $query->row()->shipping_cost : 0 ;
	}
	function get_page(){
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from page"; 
		$query = $ci->db->query($sql);
		return  $query->result();
	}
	function get_setting(){
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from setting"; 
		$query = $ci->db->query($sql);

		// echo $ci->db->last_query();die;
		return  $query->row();
	}

	function slug($text){
		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, '-');

		// remove duplicate -
		$text = preg_replace('~-+~', '-', $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
		return 'n-a';
		}
		return $text;
	}
	function export_csv($data,$files_name=""){
    if($data){
        ob_clean();
        header( 'Content-Type: text/csv; charset=utf-8; encoding=UTF-8' );
        header("Cache-Control: cache, must-revalidate");
        header("Pragma: public");

        header('Content-Disposition: attachment; filename="export-'.$files_name.'-report'.time().'.csv"');
        // do not cache the file
        //header('Pragma: no-cache');
        header('Expires: 0');
        // create a file pointer connected to the output stream
        $file = fopen('php://output', 'w');           
        // output each row of the data
        foreach ($data as $row){
            fputcsv($file, $row);
        }
        exit();
    }
    else {
        echo "data not found";
    }
}
	function slug_dash($text){
		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, '-');

		// remove duplicate -
		$text = preg_replace('~-+~', '_', $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
		return 'n-a';
		}
		return $text;
	}