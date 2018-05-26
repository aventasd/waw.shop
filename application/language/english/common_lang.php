<?php
$CI =& get_instance();
 
$CI->db->select   ('*'); 
$qu = $CI->db->get ( 'langs' );
$langs = $qu->result_array ();    
    
  foreach($langs as $item) {
      $key = 'common.'.$item['title'];
      $lang[$key] = $item['en'];
  }
 