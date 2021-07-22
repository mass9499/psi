<?php
  $root_var           											    = &get_instance();
  $root_var->load->database();
  $lang_lists          												  = $root_var->db->query("SELECT `english`, `label` FROM `language`");
  $lang_lists_arr      												  = $lang_lists->result();
  foreach($lang_lists_arr as $langs)
 	$lang[$langs->label] = $langs->english;
