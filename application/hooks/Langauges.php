<?php
class Langauges {

  var $ci;

    public function __construct(){
       $this->ci =& get_instance();
    }

  function initialize() {
      
    $site_lang = $this->ci->session->userdata('language');
    $default_timezone = $this->ci->session->userdata('timezone');
    $timezone_mysql = $this->ci->session->userdata('timezone_mysql');


    if(empty($site_lang)){
      $site_lang = setting()->default_language;
      $this->ci->session->set_userdata("language",$site_lang );
    }

    // if(empty($default_timezone)){
    //   $timezone = setting()->default_timezone;
    //   if($timezone){
    //       $default_timezone = $timezone;
    //       $this->ci->session->set_userdata("timezone",$timezone );
    //   }
    //   else{
    //       $default_time = date_default_timezone_get();
    //       $default_timezone = $default_time;
    //       $this->ci->session->set_userdata("timezone",$default_time);
    //   }
      
    // }


    //date_default_timezone_set($default_timezone);

    if(empty($timezone_mysql)){
      $gmt =  date('O');
      $gmt = str_replace("+0", "+", $gmt);
      $gmt = str_replace("-0", "-", $gmt);
      $timezone_mysql = substr_replace($gmt, ':', 2, 0);
      $this->ci->session->set_userdata("timezone_mysql",$timezone_mysql);
    }
    //+3:00
    $this->ci->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));") ;
    $this->ci->db->query("SET time_zone='".$timezone_mysql."'");
    $this->ci->lang->load("all",$site_lang);

    /*echo $expire_date = get_setting()->expire_date;
    if(date("Y-m-d") >= $expire_date){
      echo "-----";
    }

    die;*/

  }

}