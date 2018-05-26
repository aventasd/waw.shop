<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


	function __construct()
	{
		parent::__construct();

		//$this->db->cache_delete_all ();

		//$this->data['page_title'] = $this->Header_one->page_title ();
		//$this->data['page_meta'] = $this->Header_one->page_meta ();
		///$this->data['meta_keywords'] = $this->Header_one->meta_keywords ();
		//$this->data['meta_description'] = $this->Header_one->meta_description ();
		$this->load->library ( 'form_validation' );
                $this->load->library('session');
	}



	public function index()
	{
		
                $this->data['remove_from_url'] = 1;
                //last try with session & history problem
                $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
                $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                $this->output->set_header('Pragma: no-cache');
                $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                
                $this->data['user_id'] =  $this->session->userdata ( 'user_id' );
                
                $current_lang =  $this->session->userdata('admin_lang');
                if(!strlen($current_lang)) {
                    $current_lang = 'ru';
                    $this->session->set_userdata('admin_lang', $current_lang);                
                }
                
              $this->db->where('id', $this->data['user_id']); 
              $q = $this->db->get('users');
              $users_db= $q->row_array(); 
     
             
       
                
                if ( strlen($this->data['user_id'])<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } else {
                    $root_link =  '/admin/categories';
                    header('Location: '.$root_link);
                }


	}
    
        
        function redirects() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 
                

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/redirects');
		$this->redirects->index();

	}
        
        function langs() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 
                

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/langs');
		$this->langs->index();

	}
        
        
         function export() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 
         

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/export');
		$this->export->index();

	}
	
        
        
      function settings() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 
          

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/settings');
		$this->settings->index();

	}
        
        function colors() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 
                

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/colors');
		$this->colors->index();

	}
        

        
        
                function accessories() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 
                

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/accessories');
		$this->accessories->index();

	}
        

        
        
           
        function shipping_time() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 
               

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/shipping_time');
		$this->shipping_time->index();

	}
        
        
function marketing() {
                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 
       

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/marketing');
		$this->marketing->index();

	}
        
        
 function products() {
 
                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 


		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/products');
		$this->products->index();

	}
        
        
function pages() {
 
                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 


		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/pages');
		$this->pages->index();

	}

        
        function brands() {
 
                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 


		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/brands');
		$this->brands->index();

	}

        
        function articles() {
 
                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/articles');
		$this->articles->index();

	}

        
            function filters() {
 
                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 


		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/filters');
		$this->filters->index();

	}
        
        
        
        
    function slides() {
 
                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 


		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/slides');
		$this->slides->index();

	}
         function slidertop() {
 
                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 


		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/slidertop');
		$this->slidertop->index();

	} 
        
        
    function sliderbot() {
 
                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 


		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/sliderbot');
		$this->sliderbot->index();

}   
        
        
        
  function measurements() {
 
                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 

        $this->load->helper ( array ('form', 'url' ) );
        $this->load->library ( 'form_validation' );
        $this->load->model('admin/measurements');
        $this->measurements->index();

}


  function gallery() {
 
                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 

        $this->load->helper ( array ('form', 'url' ) );
        $this->load->library ( 'form_validation' );
        $this->load->model('admin/gallery');
        $this->gallery->index();

}



  function lookimgs() {
 
                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 

        $this->load->helper ( array ('form', 'url' ) );
        $this->load->library ( 'form_validation' );
        $this->load->model('admin/lookimgs');
        $this->lookimgs->index();

}




  function params() {
 
                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 

                
        $this->load->helper ( array ('form', 'url' ) );
        $this->load->library ( 'form_validation' );
        $this->load->model('admin/params');
        $this->params->index();

}



function import() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 
            

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/import');
		$this->import->index();

	}
       
        
        
function inform() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 
             

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/inform');
		$this->inform->index();

	}
       
        
function messages() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 
           

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/messages');
		$this->messages->index();

	}
 
        function returns() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 
             

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/returns');
		$this->returns->index();

	}
        
        
        
function orders() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 

            

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/orders');
		$this->orders->index();

	}
        
function categories() {

                             
                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db = $q->row_array(); 


                if ( strlen($user_id)< 1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 

		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/categories');
		$this->categories->index();

	}


function feedback() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 

 
 
                     //last try with session & history problem
                $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
                $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                $this->output->set_header('Pragma: no-cache');
                $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                
                
 	 	//if (!$this->userauth->check_user_login()){redirect('login');} 
 
		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/feedback');
		$this->feedback->index();

	}
 
function users() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 

 
                     //last try with session & history problem
                $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
                $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                $this->output->set_header('Pragma: no-cache');
                $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                
                
 	 	//if (!$this->userauth->check_user_login()){redirect('login');} 
 
		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/users');
		$this->users->index();

	}

     
        function subscribers() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 

 
                     //last try with session & history problem
                $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
                $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                $this->output->set_header('Pragma: no-cache');
                $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                
                
 	 	//if (!$this->userauth->check_user_login()){redirect('login');} 
 
		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/subscribers');
		$this->subscribers->index();

	}
        
        
    function help() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 

 
               //last try with session & history problem
                $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
                $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                $this->output->set_header('Pragma: no-cache');
                $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                
                
 	 	//if (!$this->userauth->check_user_login()){redirect('login');} 
 
		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/help');
		$this->help->index();

	}
        
        
        
function salerep() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 

 
                     //last try with session & history problem
                $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
                $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                $this->output->set_header('Pragma: no-cache');
                $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                
                
 	 	//if (!$this->userauth->check_user_login()){redirect('login');} 
 
		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/salerep');
		$this->salerep->index();

	}
    
        
        function promo() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 

 
                     //last try with session & history problem
                $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
                $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                $this->output->set_header('Pragma: no-cache');
                $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                
                
 	 	//if (!$this->userauth->check_user_login()){redirect('login');} 
 
		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/promo');
		$this->promo->index();

	}
        
     function blogs() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                $root_link =  '/login';
                header('Location: '.$root_link);
                } 

 
                     //last try with session & history problem
                $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
                $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                $this->output->set_header('Pragma: no-cache');
                $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                
                
 	 	//if (!$this->userauth->check_user_login()){redirect('login');} 
 
		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/blogs');
		$this->blogs->index();

	}
    
       function blocks() {

                $user_id = $this->session->userdata ( 'user_id' );
                $this->db->where('id', $user_id); 
                $q = $this->db->get('users');
                $users_db= $q->row_array(); 


                if ( strlen($user_id)<1 || !$users_db['level']) {
                    $root_link =  '/login';
                    header('Location: '.$root_link);
                } 

 
 
                     //last try with session & history problem
                $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
                $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                $this->output->set_header('Pragma: no-cache');
                $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                
 
 
		$this->load->helper ( array ('form', 'url' ) );
		$this->load->library ( 'form_validation' );
		$this->load->model('admin/blocks');
		$this->blocks->index();

	}
        
 

}
 