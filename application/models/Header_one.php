<?php
class Header_one extends CI_Model {

function __construct()
    {
        parent::__construct();
		$this->load->database();

		//$this->load->library('userauth');
		$this->load->helper('url');
               // $this->load->helper('language'); 
		$this->lang->load('common');
                
                
		$this->load->library('session');
		$this->load->library('email');
                $this->load->helper('common_helper'); 
                
               
            


		//$this->db->cache_delete_all ();
    }

 

public function settings_value($query)
    {
        $id = 38;
        
        if($query == 'telegramm') {
            $id = 38;
        } else if($query == 'viber') {
            $id = 37;
        }else if($query == 'fb') {
            $id = 32;
        }else if($query == 'vk') {
            $id = 33;
        }else if($query == 'instagram') {
            $id = 34;
        }else if($query == 'seo_title') {
            $id = 9;
        }else if($query == 'seo_keywords') {
            $id = 10;
        }else if($query == 'seo_desc') {
            $id = 11;
        }else if($query == 'seo_text') {
            $id = 22;
        }else if($query == 'seo_h1') {
            $id = 23;
        }else if($query == 'schema_telephone') {
            $id = 24;
        }else if($query == 'store_title') {
            $id = 21;
        }
        
    
	$this->db->where('id', $id); 
        $q = $this->db->get('settings');
        $settings = $q->row_array(); 
 
        return  $settings['value'];
    }

    
    
    public function settings_notes($query)
    {
        $id = 16;
        
        if($query == 'jivosite') {
            $id = 16;
        } else if($query == 'viber') {
            $id = 37;
        } else if($query == 'google_analytics') {
            $id = 14;
        } 
    
	$this->db->where('id', $id); 
        $q = $this->db->get('settings');
        $settings = $q->row_array(); 
 
        return  $settings['notes'];
    }

    
    public function getLangValueByTitle($query) {
        
        if(strlen($query)) {
            $this->db->where('title', $query); 
            $q = $this->db->get('langs');
            $settings = $q->row_array(); 
            
            if(count($settings)) {
              return  $settings['value'];
            } else {
              return  'Not Fount Value';  
            }
        }
    }
    
    public function getUserID($user_id) {           
           return $user_id;
    }
    
    
      public function getCartQty($user_id) {
        $return = 'Cart';
                $this->db->where('user_id',  $user_id);
                $q = $this->db->get('cart');
                $cart = $q->result_array();
                $count = count($cart);
                if($count == 1) {
                    $return = $count.' item ';
                }else  if($count > 1) {
                     $return = $count.' items ';
                }
                
       return $return;
    }
    
       public function getShippingZip($user_id) {
        $return = '';
                $this->db->where('user_id',  $user_id);
       
                $this->db->where ( 'type', 1);
                $this->db->order_by("added", "desc");
                $qu = $this->db->get ( 'addresses' );
                $shipping_addresses = $qu->row_array ();  
                $return = $shipping_addresses['zip'];
       return $return;
    }


    public function getCategoriesMenu() {
        $categories = array();

        $this->db->where('main',  '0');
        $this->db->order_by("priority", "asc");
        $this->db->where('display',  '1');
        $q = $this->db->get('categories');
        $categories = $q->result_array();

        return $categories;
    }




    public function getSalesMenu() {
        $return = '';


        $this->db->where('display',  '1');
        $this->db->where('sale',  '1');
        $this->db->limit('10');
        $this->db->order_by("priority", "asc");
        $q = $this->db->get('products');
        $sales = $q->result_array();

        return $sales;
    }




    public function getUserLevel($user_id) {
        
        if(strlen($user_id)) {
         
            $this->db->where('id', $user_id);                
            $query = $this->db->get('users');
            $user = $query->row_array();
            
            if(count($user)) {
              return  $user['level'];
            } else {
              return  'Not Fount Value';  
            }
        }
    }
    
    
    
 

    public function getUserName($query) {
        
                            $user_id = $this->session->userdata('user_id'); 
            
                               // echo '<input value="'.$user_id.'" id="user_id" type="hidden">';

                                 //echo 'user_id-'.$user_id;                    
                                $user_password  ='';
                                $user_social = 0;
                                 $salerep_id = 0;
                                if(strlen($user_id)) {
                                    $this->db->where('id', $user_id);                
                                    $query = $this->db->get('users');
                                    $user = $query->row_array();
                                    $user_password = $user['password'];
                                    $user_social = $user['social'];
                                    $user_name = $user['name'];
                                 
                                    $salerep_id = '123';
                                }
                                if(strlen($user_id ) < 1 || strlen($user_password ) < 1 && strlen($user_social ) < 1  ) { 
                                    //not logined
                                     return  '<span>My Account</span>'; 
                                } else{
                                    //already sing in/up 
                                  

                                     if(strlen($user_name)) {
                                         $cabinet = $user_name.' '.$user['last_name'];
                                     } else {
                                         $cabinet = $user['email'];
                                     }                         
                                     $user_level = $user['level'];
                                      if(strlen($cabinet ) < 1 ){
                                         $cabinet = 'My Account'; 
                                      }
                                         return  $cabinet; 
                                }
       
    }
    
    
    
    
    

public function page_title()
    {
		$query = $this->db->query('SELECT * FROM settings WHERE name="title"');
		$page_title = $query->row('value');
        return $page_title;
    }
public function page_meta()
    {
        $query = $this->db->query('SELECT * FROM settings WHERE name="meta"');
		$page_meta = $query->row('value');
        return $page_meta;
    }
public function meta_keywords()
    {
		$query = $this->db->query('SELECT * FROM settings WHERE name="keywords"');
		$meta_keywords = $query->row('value');
        return $meta_keywords;
    }
public function meta_description()
    {
		$query = $this->db->query('SELECT * FROM settings WHERE name="meta"');
		$meta_description = $query->row('value');
        return $meta_description;
    }

public function menu_categories()
    {

	$q = $this->db->get('categories');
        $menu_categories = $q->result_array();

        return $menu_categories;
    }


}
?>