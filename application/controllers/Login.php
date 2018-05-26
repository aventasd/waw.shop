<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
      private $info;
        function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'text', 'common_helper'));
                $this->pars = $this->uri->segment_array ();
                $this->data['user_id'] =  $this->session->userdata ( 'user_id' );
                
                
                  $langs = array('en', 'uk', 'ru');
                if(in_array($this->uri->segment(1), $langs)) {
 
                   
                    $this->info['lang_rewrite'] = '/'.$this->uri->segment(1).'/';
                    $this->info['current_lang'] =  $this->uri->segment(1);
                    $this->info['url2'] =  $this->uri->segment(2);
                    $this->info['url3'] =  $this->uri->segment(3);
                    $this->info['url4'] =  $this->uri->segment(4);
                    $this->info['url5'] =  $this->uri->segment(5);
                    $this->info['subcategory'] =  $this->uri->segment(3);
                    $this->info['action'] =  $this->uri->segment(4);
                    $this->info['edit_id']  =  $this->uri->segment(5);

                } else {
   
                    $this->info['lang_rewrite']  =  '';
                    $this->info['current_lang']=  'ru';
                    $this->info['url2'] =  $this->uri->segment(1);
                    $this->info['url3'] =  $this->uri->segment(2);
                    $this->info['url4'] =  $this->uri->segment(3);
                    $this->info['url5'] =  $this->uri->segment(4);                
                    $this->info['subcategory'] =  $this->uri->segment(2);
                    $this->info['action'] =  $this->uri->segment(3);
                    $this->info['edit_id'] =  $this->uri->segment(4);
                     
                }
            
            
                 if ($this->uri->segment(1) == 'ru') {
                     
                            $ur2 = ''; if(strlen($this->uri->segment(2)) > 0){ $ur2 = '/'.$this->uri->segment(2); }
                            $ur3 = ''; if(strlen($this->uri->segment(3)) > 0){ $ur3 = '/'.$this->uri->segment(3); }
                            $ur4 = ''; if(strlen($this->uri->segment(4)) > 0){ $ur4 = '/'.$this->uri->segment(4); }
                            $ur5 = ''; if(strlen($this->uri->segment(5)) > 0){ $ur5 = '/'.$this->uri->segment(5); }
                            $root_link =  $ur2.$ur3.$ur4.$ur5;
                        //  echo $root_link;
                         // header('Location: '.$root_link);
                 } 
         
                
                
                       if ( strlen($this->data['user_id'])>0) {
                          $root_link =  '/';
                       //   header('Location: '.$root_link);
                 } 
                           
                            
	}
        
 
               
   function _remap() {
       
        $uri2 = $this->uri->segment(2);
        if($uri2 =='logout'){
            $this->logout();
        } else if($uri2 =='forgot'){
            $this->forgot();
        }else if($uri2 =='reset_success'){
            $this->reset_success();
        }else {            
            $this->index();
        }

    } 
         
    
    
 
        
	public function index()
	{
                
               $user_id =  $this->session->userdata('user_id');
                $user_social = 0;
                   $user_password  ='';
            if(strlen($user_id)) {
                         $this->db->where('id', $user_id);                
                         $query = $this->db->get('users');
                         $user = $query->row_array();
                         $user_password = $user['password'];
                         $user_social = $user['social'];
               }
          
             
              if(strlen($user_id) > 0 &&  strlen($user_password ) > 1 ||  strlen($user_id) > 0 && strlen($user_social ) > 0 ) {
                  
                   
                //$root_link =  '/'.$lang.'/cabinet';
                $root_link =  '/my-account';
                header('Location: '.$root_link);
                }
             //  
               
              //  $this->db->where('sub', '0');
               // $this->db->where('display', '1');
               // $this->db->order_by("sort", "asc"); 
                $qu = $this->db->get ( 'users' );
                $this->data['users'] = $qu->result_array ();
                //$this->data['fireTime'] = $settings[0]['fireTime'];
               // $this->data['auctionsToWin'] = $settings[0]['auctionsToWin'];
                
            
                   $this->data['seo_title'] = '';
                   $this->data['seo_desc'] = '';
                   $this->data['seo_keywords'] = '';
             
                $this->data['page_title'] = 'Login';
                $this->data['remove_from_url'] = 1;
                $this->data['login'] = 1;
               $this->load->view('header', $this->data);
                $this->load->view('login/login_view', $this->data);
                $this->load->view('footer', $this->data);
		
	}
        
       function logout() {
            // $this->CI->session->sess_destroy(); 
           
            $this->session->set_userdata(array('user_id'=>''));
          //  echo 'seee';
 
           // $root_link =  '/'.$lang.'/login';
             $root_link =  '/login';
            header('Location: '.$root_link);
       }
       

    
    public function forgot(){
                
                $this->data['seo_title'] = '';
                $this->data['seo_desc'] = '';
                $this->data['seo_keywords'] = '';     
                
                $this->data['page_title'] = 'Login';            
                $this->data['page_title'] = 'Forgot Password - Login';
                $this->data['remove_from_url'] = 1;
                $this->data['login'] = 1;
                $this->load->view('header', $this->data);
                $this->load->view('login/forgot_step1_view', $this->data);
                $this->load->view('footer', $this->data);
		
	}
        
        public function reset(){
                
            
                $this->data['page_title'] = 'Forgot Password - Reset - Login';

              // $this->load->view('header', $this->data);
                $this->load->view('forgot_view_2', $this->data);
                $this->load->view('footer', $this->data);
		
	}
          public function reset_success(){
                
                $this->data['seo_title'] = '';
                $this->data['seo_desc'] = '';
                $this->data['seo_keywords'] = '';    
                $this->data['page_title'] = 'Forgot Password - Reset - Login';
                $this->data['remove_from_url'] = 1;

                  $this->db->where('title',  'l_forgot_reset_success');
                  $q = $this->db->get('langs');
                  $lang_title = $q->row_array();
                  $this->data['l_forgot_reset_success'] =  $lang_title['value'];


                $this->load->view('header', $this->data);
                $this->load->view('login/forgot_reset_success_view', $this->data);
                $this->load->view('footer', $this->data);
		
	}   
       
                
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */