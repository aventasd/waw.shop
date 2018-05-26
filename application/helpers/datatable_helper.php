<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_photo_new'))
{
function check_photo_new($id) {
    
    $filepath = './external/upl/server/php/files/main_category/'.$id.'/thumbnail/*.*';
    $images = glob($filepath);
    foreach($images as $val){
        $val=str_replace('./', '/', $val);
        return $val;
        break;  
    }
		//  if (count ($images) <1) {
		 //  return '/css/i/no_image_80.jpg';
		//  }  else  {
		  
		//  }
 
 } 
}
 
 
if ( ! function_exists('check_photo_laminates'))
{
function check_photo_laminates($id, $photo) {
		  if (empty ($photo) ) {
		   return '/css/i/no_image_80.jpg';
		  }  else  {
		  return '/external/upl/server/php/files/laminates/'.$id.'/thumbnail/'.$photo;
		  }
 
 } 
}

 if ( ! function_exists('checkLevel')){
     function checkLevel($id) {
        $CI =& get_instance();
        $userDB = $CI->Header_one->user_level();
        $level = $userDB['level'];
             if($level == '5') { // delete allowing only by ADMIN
                $show_delete = '<a href="/assignments/delete_milestone/'.$id.'" class="delete" data-id="'.$id.'"><span class=" glyphicon glyphicon-trash"></span></a>';} 
             else {
                $show_delete = '';
             }
           return $show_delete;
    } 
 }
 
 
if ( ! function_exists('checkRealTime'))
{
function checkRealTime($endTime, $fire_time) {
		  $pdtTimezone = new DateTimeZone('PDT'); 
                   $start = new DateTime($endTime, $pdtTimezone);
                   $end = new DateTime($fire_time, $pdtTimezone);
                    $startT = $start->getTimestamp();
                    $endT = $end->getTimestamp();

                     $realTime =   $startT- $endT;

                     return $realTime;
 } 
}



if ( ! function_exists('checktimeLeft'))
{
function checktimeLeft($endTime) {
		       $gmtTimezone = new DateTimeZone('PDT'); 
        $ff = new DateTime($endTime, $gmtTimezone);
        $ff->add(new DateInterval('PT10H'));
        $tleft = $ff->format('Y/m/d H:i:s'); 

                     return $tleft;
 } 
}




if ( ! function_exists('view_desc'))
{
function view_desc($desc) {
		
		  return $desc;
		
 
 } 
}




if ( ! function_exists('check_photo_base_colors'))
{
function check_photo_base_colors($id, $photo) {
		  if (empty ($photo) ) {
		   return '/css/i/no_image_80.jpg';
		  }  else  {
		  return '/external/upl/server/php/files/base_colors/'.$id.'/thumbnail/'.$photo;
		  }
 
 } 
}


if ( ! function_exists('check_status'))
{
function check_status($id) {
		  if ( ($id) ) {
		   return 'Продана';
		  }  else  {
		   return '<b style="color: green">Свободна</b>';
		  }
 
 } 
}


if ( ! function_exists('check_photo_edge_profiles'))
{
function check_photo_edge_profiles($id, $photo) {
		  if (empty ($photo) ) {
		   return '/css/i/no_image_80.jpg';
		  }  else  {
		  return '/external/upl/server/php/files/edge_profiles/'.$id.'/thumbnail/'.$photo;
		  }
 
 } 
}


 


if ( ! function_exists('get_date_words'))
{
function get_date_words($timestring) {
    
    $CI =& get_instance();
    
     $CI->load->library('timeago');
      $cat_title = $CI->timeago->inWords($timestring, "now");
            
     return $cat_title;
 
 } 
}



if ( ! function_exists('check_cat_title'))
{
function check_cat_title($id) {
    
    $CI =& get_instance();
    $CI->load->model('legsimg_model');
     $cat_title =  $CI->legsimg_model->showCategoryTitle($id);
 
		  if (empty ($cat_title) ) {
		   return 'Not Found';
		  }  else  {
		  return $cat_title;
		  }
 
 } 
}

if ( ! function_exists('get_companies'))
{
function get_companies($id) {
  /*  
    $CI =& get_instance();
   
            $CI->db->where('id',  $id);    
                $CI->db->order_by("name", "asc");  
                $qu = $CI->db->get ( 'companies' );
                $companies = $qu->result_array ();
                  return $companies[0]['name'];
                */
     $ci =& get_instance();   
    
    //get resseller discount based on user's id
    $ci->db->where ( 'id', $id );
    $qu = $ci->db->get ( 'companies' );
    $companies = $qu->result_array (); 
    $name  = @$companies[0]['name'];
    
    
		return $name;
		 
 
 } 
}


if ( ! function_exists('check_cat_help'))
{
function check_cat_help($id) {
  /*  
    $CI =& get_instance();
   
            $CI->db->where('id',  $id);    
                $CI->db->order_by("name", "asc");  
                $qu = $CI->db->get ( 'companies' );
                $companies = $qu->result_array ();
                  return $companies[0]['name'];
                */
     $ci =& get_instance();   
    
    //get resseller discount based on user's id
    $ci->db->where ( 'id', $id );
    $qu = $ci->db->get ( 'categories_help' );
    $companies = $qu->row_array (); 
    $name  = @$companies['title'];
    
    
		return $name;
		 
 
 } 
}





if ( ! function_exists('check_gender'))
{
function check_gender($id) {
  
  if($id == 2) {
            $tt = '<b class="" style="font-weight: bold; color: #329bf4;">Мужчина</b>';                                  
        } else if($id == 1) {
            $tt = '<b class="" style="font-weight: bold; color: #c187b8;">Женщина</b>';                                  
        } else {
             $tt = 'Всем';       
        }
return $tt;	 
 
 } 
}


if ( ! function_exists('check_blog_type'))
{
function check_blog_type($id) {
  
  if($id == 2) {
            $tt = '<b class="" style="font-weight: bold; color: #329bf4;">Лук</b>';                                  
        } else if($id == 1) {
            $tt = '<b class="" style="font-weight: bold; color: #c187b8;">Тренд</b>';                                  
        } else {
             $tt = 'Блог';       
        }
return $tt;	 
 
 } 
}


        
        

if ( ! function_exists('cat_view'))
{
function cat_view($id) {
            
     $ci =& get_instance();   
    
    //get resseller discount based on user's id
    $ci->db->where ( 'id', $id );
    $qu = $ci->db->get ( 'categories' );
    $companies = $qu->row_array (); 
    
      if($companies['type'] == 2) {
            $tt = 'Мужчина';                                  
        } else if($companies['type'] == 1) {
            $tt = 'Женщина';                                  
        }  else if($companies['type'] == 3) {
            $tt = 'Детское';                                  
        }else {
             $tt = 'Унисекс';       
        }

                                        
    $name  = @$tt.' -> <b>'.$companies['title'].'</b>';
    
    
		return $name;
		 
 
 } 
}



if ( ! function_exists('slide_type22'))
{
function slide_type22($id) {
            
      if($id == 2) {
            $tt = '<b>Мужчина</b>';                                  
        } if($id == 3) {
            $tt = '<b>Детское</b>';                                  
        }else   {
            $tt = 'Женщина';                                  
        }   
		return $tt;
		 
 
 } 
}




if ( ! function_exists('slide_type'))
{
function slide_type($id) {
            
            
    
      if($id == 2) {
            $tt = 'Мужчина';                                  
        } else   {
            $tt = 'Женщина';                                  
        }

    
		return $tt;
		 
 
 } 
}




if ( ! function_exists('check_product_title'))
{
function check_product_title($id) {
    
    $CI =& get_instance();
    $CI->load->model('legsimg_model');
     $product_title =  $CI->legsimg_model->showProductTitle($id);
 
		  if (empty ($product_title) ) {
		   return 'Not Found';
		  }  else  {
		  return $product_title;
		  }
 
 } 
}








if ( ! function_exists('add_tmbn_legs'))
{
function add_tmbn_legs($id, $photo) {
		  if (empty ($photo) ) {
		   return '/css/i/no_image_80.jpg';
		  }  else  {
		   return '/external/upl/server/php/files/legs/'.$id.'/thumbnail/'.$photo;
		  }
 
 } 
}





if ( ! function_exists('check_photo_edge_colors'))
{
function check_photo_edge_colors($id, $photo) {
		  if (empty ($photo) ) {
		   return '/css/i/no_image_80.jpg';
		  }  else  {
		  return '/external/upl/server/php/files/edge_thumbs/'.$id.'/thumbnail/'.$photo;
		  }
 
 } 
}


 
if ( ! function_exists('check_photo_news'))
{
function check_photo_news($id) {

/*	$this->db->where ( 'product_id', $id );
 	$q2 = $this->db->get('news_images');
	$photos  = $q2->result_array();
	$photo = $photos[0]['image'];
*/
		  if (empty ($photo) ) {
		   return '/css/i/no_image_80.jpg';
		  }  else  {
		  return '/external/upl/server/php/files/news/'.$id.'/thumbnail/'.$photo;
		  }
 
 } 
}




 
if ( ! function_exists('check_photo_slides'))
{
function check_photo_slides($id, $photo) {
		  if (empty ($photo) ) {
		   return '/css/i/no_image_80.jpg';
		  }  else  {
		  return '/external/upl/server/php/files/slides/'.$id.'/thumbnail/'.$photo;
		  }
 
 } 
}
                                                    
if ( ! function_exists('get_item_status'))
{
function get_item_status($biddingStatus) {
		  if($biddingStatus === 'on') {
		   return '<span class="blink_me">LIVE</span>';
		  }  else  {
		  return '<span class="paused">Paused</span>';
		  }
 
 } 
}


 
if ( ! function_exists('check_logo'))
{
function check_logo($id, $logo) {
		  if (empty ($logo) ) {
		   return '/css/i/no_image_80.jpg';
		  }  else  {
		  return '/content/configurator/logo/'.$logo;
		  }
 
 } 
}



if ( ! function_exists('getTotalCost')){
function getTotalCost($winBid, $shippingServiceCost) {
    $total_net_price = $winBid+$shippingServiceCost;
	 $total = '$'. number_format( $total_net_price, 2);	  
 return $total_net_price;
 } 
}




if ( ! function_exists('net_price'))
{
function net_price($total_net_price) {

 $total = '$'. number_format( $total_net_price, 2);

 
  return $total;
 } 
}



/***
 * Function to Calculate the Total for each Quote based on values:
 * sum(subtotal) as ss, shipping_cost, liftgate_service, insidedelivery, deliverynotification, member_id
 * 
 */
if ( ! function_exists('gettotal')){
function gettotal($subtotal, $shipping_cost, $liftgate_service, $insidedelivery, $deliverynotification, $member_id) {
    setlocale(LC_MONETARY, 'en_US');
    $options = 0;
       
    $ci =& get_instance();
    
    
    //get resseller discount based on user's id
    $ci->db->where ( 'id', $member_id );
    $qu = $ci->db->get ( 'members' );
    $members = $qu->result_array (); 
    $resseller_discount  = $members[0]['resseller_discount'];
    
    //using this to get already predefined values for options from another helper
    $ci->load->helper('cart_helper');
    if($liftgate_service > 0) { $options += shipping_services_cost(1); } 
    if($insidedelivery > 0) {  $options += shipping_services_cost(2); } 
    if($deliverynotification > 0) {  $options += shipping_services_cost(3); } 
    
    //calculateing the NET total for each quote
    $net_total = $subtotal - (($subtotal*$resseller_discount)/100);
    $total = $net_total+ $shipping_cost + $options; 
    $total = money_format("%(#10.2n",$total);
  return $total;
 } 
}


/***
 * Function 
 * 
 */
if ( ! function_exists('username')){
function username($member_id) {
    
    $ci =& get_instance();
        
    //get resseller discount based on user's id
    $ci->db->where ( 'id', $member_id );
    $qu = $ci->db->get ( 'users' );
    $members = $qu->result_array (); 
    $name  = @$members[0]['name'];    
    
  return $name;
 } 
}


/***
 * Function 
 * 
 */
if ( ! function_exists('get_project_name')){
function get_project_name($id) {
    
    $ci =& get_instance();
        
    //get resseller discount based on user's id
    $ci->db->where ( 'id', $id );
    $qu = $ci->db->get ( 'assignments' );
    $assignments = $qu->result_array (); 
    $name  = @$assignments[0]['title'];    
    
  return $name;
 } 
}


/***
 * Function  get_num_projects
 * 
 */
if ( ! function_exists('get_num_projects')){
function get_num_projects($id) {
    
    $ci =& get_instance();
        
    //get resseller discount based on user's id
     $ci->db->where ( 'company', $id );
    $qu = $ci->db->get ( 'assignments' );
    $types = $qu->result_array (); 
    $number  = count($types);    
    
  return $number;
 } 
}



/***
 * Function  get_contacts
 * 
 */
if ( ! function_exists('get_contacts')){
function get_contacts($id) {    
    $ci =& get_instance();        
    //get resseller discount based on user's id
     $ci->db->where ( 'company', $id );
    $qu = $ci->db->get ( 'users' );
    $users = $qu->result_array (); 
    $list = '';
    foreach($users as $user) {
       $list .= $user['name'].', ';
    } 
    $list = substr($list, 0, -2);
  return $list;
 } 
}




/***
 * Function  work_type
 * 
 */
if ( ! function_exists('work_type')){
function work_type($id) {
    
    $ci =& get_instance();
        
    //get resseller discount based on user's id
    $ci->db->where ( 'id', $id );
    $qu = $ci->db->get ( 'work_type' );
    $types = $qu->result_array (); 
    $type  = $types[0]['title'];    
    
  return $type;
 } 
}

/***
 * Function  work_type
 * 
 */
if ( ! function_exists('get_company_name')){
function get_company_name($id) {
    
    $ci =& get_instance();
        
    //get resseller discount based on user's id
    $ci->db->where ( 'id', $id );
    $qu = $ci->db->get ( 'companies' );
    $companies = $qu->result_array (); 
    $type  = @$companies[0]['name'];    
    
  return $type;
 } 
}




if ( ! function_exists('formate_news_date'))
{
function formate_news_date($date) {

 $date = strtotime( $date);
$date = date( 'm/d/Y h:i a', $date );
 
  return $date;
 } 
}



 
if ( ! function_exists('full_name'))
{
function full_name($first_name, $last_name) {
		 
		  return $first_name .' '. $last_name;
	 
 
 } 
}
 
 
if ( ! function_exists('category_name'))
{
function category_name($title) {
		 
		 $item_title = str_replace('5 Day QS', '', $title);
		$item_title = str_replace('1 Day QS', '', $item_title);

		  return $item_title;
	 
 
 } 
}
 
if ( ! function_exists('website_view'))
{
function website_view($spiff) {
		  if (($spiff=='0') ) {
		   return 'Нет';
		  }  else  {
		  return 'Да';
		  }
 
 } 
}

if ( ! function_exists('display_view'))
{
function display_view($display, $code) {
		  if (($display == '1') ) {
		   return '<input class="uptade_status display"  name="display" data-code="'.$code.'" type="checkbox" value="1" checked="checked">';
		  }  else  {
		  return '<input class="uptade_status display" name="display" data-code="'.$code.'" type="checkbox" value="1" >';
		  }
 
 } 
}

if ( ! function_exists('grouped_view'))
{
function grouped_view($product_group_id, $common_group_id, $product_id) {
    
        $ci =& get_instance();
        
    //get resseller discount based on user's id
    $ci->db->where ( 'id', $common_group_id );
    $qu = $ci->db->get ( 'blocks' );
    $blocks = $qu->row_array (); 
    $type  = $blocks['category'];    
    if($type == '2') {
        $typeD = 'Мужчина';
    } else {
         $typeD = 'Женщина';
    }
    
    $block_title = $blocks['title']. ' ('.$typeD.')';
                //='.$common_group_id.'==.'.$product_group_id.'
    
		  if (($common_group_id == $product_group_id) ) {
		   return '<label><input class="uptade_status group_id"  name="group_id" data-code="'.$product_id.'" type="checkbox" value="1" checked="checked">'.$block_title.'</label>';
		  }  else  {
		  return '<label><input class="uptade_status group_id" name="group_id" data-code="'.$product_id.'" type="checkbox" value="1" >'.$block_title.'</label>';
		  }
 
 } 
}




if ( ! function_exists('gift_view'))
{
function gift_view($display, $code) {
		  if (($display == '1') ) {
		   return '<input class="uptade_status gift"  name="gift" data-code="'.$code.'" type="checkbox" value="1" checked="checked">';
		  }  else  {
		  return '<input class="uptade_status gift" name="gift" data-code="'.$code.'" type="checkbox" value="1" >';
		  }
 
 } 
}



if ( ! function_exists('warranty_view'))
{
function warranty_view($display, $code) {
		  if (($display == '1') ) {
		   return '<input class="uptade_status warranty"  name="warranty" data-code="'.$code.'" type="checkbox" value="1" checked="checked">';
		  }  else  {
		  return '<input class="uptade_status warranty" name="warranty" data-code="'.$code.'" type="checkbox" value="1" >';
		  }
 
 } 
}



if ( ! function_exists('export_view'))
{
function export_view($display, $code) {
		  if (($display == '1') ) {
		   return '<input style="" class="uptade_status export"  name="export" data-code="'.$code.'" type="checkbox" value="1" checked="checked">';
		  }  else  {
		  return '<input class="uptade_status export" name="export" data-code="'.$code.'" type="checkbox" value="1" >';
		  }
 
 } 
}





if ( ! function_exists('shipping_view'))
{
function shipping_view($display, $code) {
		  if (($display == '1') ) {
		   return '<input class="uptade_status free_ship"  name="free_ship" data-code="'.$code.'" type="checkbox" value="1" checked="checked">';
		  }  else  {
		  return '<input class="uptade_status free_ship" name="free_ship" data-code="'.$code.'" type="checkbox" value="1" >';
		  }
 
 } 
}




if ( ! function_exists('check_display'))
{
function check_display($display) {
		  if (($display=='0') ) {
		   return 'No';
		  }  else  {
		  return 'Yes';
		  }
 
 } 
}




if ( ! function_exists('category_view'))
{
function category_view($status) {
            
    $ci =& get_instance(); 
    //get resseller discount based on user's id
    $ci->db->where ( 'id', $status );
    $qu = $ci->db->get ( 'categories' );
    $categories = $qu->row_array (); 
   
    return  $categories['title'];
 } 
}

if ( ! function_exists('salerep_view'))
{
function salerep_view($status) {
            
    $ci =& get_instance(); 
    
    if($status > 0) {
    //get resseller discount based on user's id
    $ci->db->where ( 'id', $status );
    $qu = $ci->db->get ( 'salerep' );
    $categories = $qu->row_array (); 
   
    return  $categories['name'];
    
    }else {
        return  '---'; 
    }
    
 } 
}

            

if ( ! function_exists('display_text_view'))
{
function display_text_view( $status) {
        if ($status == '0') {
            return  'No';;
        }  else if ($status == '1') {
            return '<b>Yes</b>';
        } 
    
            
 } 
}



if ( ! function_exists('status_view_adv'))
{
function status_view_adv( $status, $id) {
        if ($status == '0') {
            return  '<span class="status" data-code="'.$id.'">На утверждении</span>';
        }  else if ($status == '1') {
            return '<b class="status" data-code="'.$id.'">Утвержден</b>';
        } else if ($status == '2') {
            return '<b  class="status" data-code="'.$id.'" style="color: red">Отклонено</b>';
        } 
               
 } 
}
        




if ( ! function_exists('status_view'))
{
function status_view( $status) {
        if ($status == '0') {
            return  'На утверждении';;
        }  else if ($status == '1') {
            return '<b>Утвержден</b>';
        } else if ($status == '2') {
            return '<b style="color: red">Отклонено</b>';
        } 
    
            
 } 
}
            


if ( ! function_exists('blocks_view'))
{
function blocks_view($status) {

        if ($status == '0') {
            return '«Текст»';
        }  else if ($status == '1') {
            return '«Стадия строительства»';
        }  else if ($status == '2') {
            return '«Галлерея - "Материалы"»';
        }  else if ($status == '3') {
            return '«Расположение»';
        }  else if ($status == '4') {
            return '«Цифры по проекту» - дизайн #1 ';
        }  else if ($status == '5') {
            return '«Цифры по проекту» - дизайн #2 ';
        } else if ($status == '10') {
            return '«Цифры по проекту» - дизайн #3 ';
        } else if ($status == '6') {
            return '«Технические характеристики»';
        } else if ($status == '7') {
            return '«Планировки»';
        }else if ($status == '9') {
            return '«Документация»';
        } else if ($status == '11') {
            return '«Отделка мест общего пользования»';
        }  else if ($status == '12') {
            return '3 колонки: картинка, заголовок, текст';
        } else if ($status == '13') {
            return 'Площади и комнаты';
        } else  {
            return '«Фотогаллерея»';
        }
            
 } 
}


if ( ! function_exists('title_view'))
{
function title_view($status) {

            
        $pieces = explode(" ", $status);
        $first_part = implode(" ", array_splice($pieces, 0, 5));
        $other_part = implode(" ", array_splice($pieces, 5));


            return $first_part.'... ';
            
            
 } 
}



            



if ( ! function_exists('check_status_user'))
{
function check_status_user($status) {

		  if ($status == '2') {
                                         return '<span style="color: #c41230">Disabled</span>';
		  }  else if ($status == '1') {
                                          return '<span style="color: #c41230">Disabled</span>';
		  }    else if ($status == '3') {
                                          return '<span style="color: #c41230">Disabled</span>';
		  } else  {
                                         return '<b  style="font-weight: bold; color: #329bf4;">Active</b>';
		  }
 
 } 
}


if ( ! function_exists('check_status_blogs'))
{
function check_status_blogs($status) {

		  if ($status == '2') {
                          return 'Одобрено';
		  }    else if ($status == '3') {
                                          return '<span style="color: #c41230; font-weight: bold;">Отказ</span>';
		  } else  {
                                        return '<b class="notapproved" style="font-weight: bold; color: #329bf4;">На рассмотрении</b>';
                                       //   return '<span class="notapproved" style="color: #c41230">На рассмотрении</span>';
		  }
 
 } 
}




if ( ! function_exists('check_status_salerep'))
{
function check_status_salerep($status) {

		  if ($status == '2') {
                          return 'Подтвержден';
		  }    else if ($status == '3') {
                                          return '<span style="color: #c41230; font-weight: bold;">Отказано</span>';
		  } else  {
                                        return '<b class="notapproved" style="font-weight: bold; color: #329bf4;">На рассмотрении</b>';
                                       //   return '<span class="notapproved" style="color: #c41230">На рассмотрении</span>';
		  }
 
 } 
}


if ( ! function_exists('check_status_promo'))
{
function check_status_promo($status) {

        if ($status == '0') {
        return '<b class="notapproved" style="font-weight: bold; color: #329bf4;">Disabled</b>';
        }    else {
        return '<span style="color: #24a866; font-weight: bold;">Active</span>';
        } 
 
 } 
}

            

if ( ! function_exists('get_display_status'))
{
function get_display_status($status) {

		  if ($status == '1') {
                                         return 'Активно';
		  }  else {
                                         return '<b class="notapproved" style="font-weight: bold; color: #329bf4;">Отключен</b>';
		  }
 
 } 
}




if ( ! function_exists('get_user_status'))
{
function get_user_status($status) {

		  if ($status == '0') {
                                         return 'Active';
		  }  else {
                                         return '<b class="notapproved" style="font-weight: bold; color: #329bf4;">Cancelled</b>';
		  }
 
 } 
}





if ( ! function_exists('get_payment_type'))
{
function get_payment_type($type) {

                  if (($type=='0') ) {
		   return 'Price/Hour';
		  }  else if ($type=='1')  {
		  return 'Price/Word';
		  }  else if ($type=='2')  {
		  return 'Price/Project';
		  }  else if ($type=='3')  {
		  return 'Other';
		  }
 
 } 
}

if ( ! function_exists('get_order_status'))
{
function get_order_status($type) {

                  if (($type=='0') ) {
		   return '<b>Created</b>';
		  }  else if ($type=='1')  {
		  return 'Processing';
		  }  else if ($type=='2')  {
		  return 'Shipped';
		  }  else if ($type=='3')  {
		  return 'Completed';
		  } else if ($type=='4')  {
		  return 'Canceled';
		  } else {
		  return 'Returned';
		  }
            
                                
 } 
}

            
         
         
if ( ! function_exists('get_return_status'))
{
function get_return_status($type) {

                  if (($type=='0') ) {
		   return '<b>Оформлен возврат</b>';
		  }  else if ($type=='1')  {
		  return 'Товар получен';
		  }  else if ($type=='2')  {
		  return 'Деньги переведены';
		  } else if ($type=='3')  {
		  return 'Возврат отменен';
		  }
            
                                
 } 
}


if ( ! function_exists('category_type_view'))
{
function category_type_view($type) {

                  if  ($type=='1')  {
                    return '<b style="color: #cddc39;">Tops</b>';
		  }  else  {            
                    return '<b style="color: #009688;">Bases</b>';
		  }
            
                                
 } 
}




if ( ! function_exists('page_type_view'))
{
function page_type_view($type) {

                  if (($type=='1') ) {
		   return '<b  style="color: #bb7db2;">Для неё</b>';
		  }  else if ($type=='2')  {
		  return '<b style="color: #8b8ac3;">Для него</b>';
		  }  else if ($type=='3')  {
		  return '<b style="color: green;">Детское</b>';
		  }   else if ($type=='7')  {
		  return '<b style="color: purple;">Помощь</b>';
		  } else  {            
		  return 'Унисекс';
		  }
            
                                
 } 
}





if ( ! function_exists('rus_date'))
{
function rus_date($date) {

        $gmtTimezone = new DateTimeZone('Europe/Kiev'); 
        $dt = new DateTime($date, $gmtTimezone);
        $deadline = $dt->format('d.m.Y H:i');  
         return $deadline;
}
}

if ( ! function_exists('hl_status'))
{
function hl_status($date, $status) {

        $gmtTimezone = new DateTimeZone('CEST'); 
        $dt = new DateTime($date, $gmtTimezone);
        $deadline = $dt->format('Y-m-d H:i');  
        
        $gmtTimezone = new DateTimeZone('CEST'); 
        $now = new DateTime(null, $gmtTimezone);
        $today  = $now->format('Y-m-d H:i');  
        
        $u = strtotime($deadline);
        $t = strtotime($today);
        $margin = 24* 60 * 60;
        switch($status) {
            
            case '1' :  //done
                
                  return '<span style="color: green">'.$deadline.'</span>';
      
            break;
    
            case '2' :  //done
                
                  return '<span style="color: gray">'.$deadline.'</span>';
      
            break;
    
            case '3' :  //canceled
                
                  return '<span style="color: gray">'.$deadline.'</span>';
      
            break;
    
            //active
            default:
                
                  if( ($u - $margin) > $t  ){            
                    return $deadline;
                  } else {            
                        return '<span style="color: red">'.$deadline.'</span>';
                  }
                
            break;
            
        
        }
                 
 
 } 
}


 

if ( ! function_exists('format_date'))
{
function format_date($date) {
    if($date == '0000-00-00 00:00:00') {
        return '';
    } else {
$gmtTimezone = new DateTimeZone('CEST'); 
$now = new DateTime($date, $gmtTimezone);
$today = $now->format('Y-m-d H:i'); 

 
  return $today;
    }
 } 
}

if ( ! function_exists('post_format_date'))
{
function post_format_date($date) {
    
$gmtTimezone = new DateTimeZone('CEST'); 
$now = new DateTime($date, $gmtTimezone);
$today = $now->format('Y-m-d H:i'); 

if (new DateTime() > $now) {
    # current time is greater than 2010-05-15 16:00:00
    $today = '<b style="color: rgb(219, 170, 63)">'.$now->format('Y-m-d H:i').'</b>'; 
}
  return $today;
 } 
}


if ( ! function_exists('format_date_ymd'))
{
function format_date_ymd($date) {
    
$gmtTimezone = new DateTimeZone('CEST'); 
$now = new DateTime($date, $gmtTimezone);
$today = $now->format('Y-m-d'); 
//yyyy-mm-dd; 
  return $today;
 } 
}




if ( ! function_exists('status_message'))
{
function status_message($type) {

                  if (($type=='0') ) {
		   return '<span style="color: green; font-weight: bold">Новое</span>';
		  }  else if ($type=='1')  {
		  return 'Прочитано';
		  } 
 
 } 
}





 
 
 




if ( ! function_exists('get_account_type'))
{
function get_account_type($access_level) {

		  if (($access_level=='5') ) {
		   return 'Director/Admin';
		  }  else if ($access_level=='1')  {
		  return 'Project Manager';
		  }  else if ($access_level=='2')  {
		  return 'Accountant';
		  }  else if ($access_level=='3')  {
		  return 'Stratcore\'s Client';
		  } else  {
		  return 'Translator team member';
		  }
 
 } 
}
 
 