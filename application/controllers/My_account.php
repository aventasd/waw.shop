<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_account extends CI_Controller {

    private $info;
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->helper('url');
        $this->load->helper('common_helper');


    }


    public function _remap() {


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

        if(strlen($user_id) < 1 || strlen($user_password ) < 1 && strlen($user_social ) < 1 ) {
            $root_link =  '/login';
            header('Location: '.$root_link);
        }
        // echo $this->uri->segment(2);
        if ( !empty($this->uri->segment(2)) && $this->uri->segment(2) == 'shipping-address' ){

            $this->shipping();

        } else if ( !empty($this->uri->segment(2)) && $this->uri->segment(2) == 'verify' ){

            $this->verify();

        } else if ( !empty($this->uri->segment(2)) && $this->uri->segment(2) == 'password-settings' ){

            $this->password();

        } else if ( !empty($this->uri->segment(2)) && $this->uri->segment(2) == 'update-password' ){

            $this->password_update();

        } else if ( !empty($this->uri->segment(2)) && $this->uri->segment(2) == 'my-orders' ){

            $this->my_orders();

        }  else if ( !empty($this->uri->segment(2)) && $this->uri->segment(2) == 'whish-list' ){

            $this->whish_list();

        }  else if ( !empty($this->uri->segment(2)) && $this->uri->segment(2) == 'favorities' ){

            $this->favorities();

        }  else if ( !empty($this->uri->segment(2)) && $this->uri->segment(2) == 'save_billing_address' ){

            $this->save_billing_address();

        } else if ( !empty($this->uri->segment(2)) && $this->uri->segment(2) == 'save_shipping' ){

            $this->save_shipping();

        } else if ( !empty($this->uri->segment(2)) && $this->uri->segment(2) == 'delete_shipping_address' ){

            $this->delete_shipping_address();

        } else if ( !empty($this->uri->segment(2)) && $this->uri->segment(2) == 'shipping_address_status' ){

            $this->shipping_address_status();

        } else if ( !empty($this->uri->segment(2)) && $this->uri->segment(2) == 'edit_shipping' ){

            $this->edit_shipping();

        } else if ( !empty($this->uri->segment(2)) && $this->uri->segment(2) == 'get_shipping_address' ){

            $this->get_shipping_address();

        } else if ( !empty($this->uri->segment(2)) && $this->uri->segment(2) == 'get_all_shipping_addresses' ){

            $this->get_all_shipping_addresses();

        } else {

            $this->index();
        }


    }


    function verify(){
        echo 'verify';
    }

    public function get_shipping_address () {

        $formValues = $this->input->post(NULL, TRUE);
        $address_id = $this->input->get_post('id', TRUE);
        $user_id = $this->session->userdata('user_id');

        if($user_id) {
            // valid address



            $this->db->where('id',  $address_id);
            $qu = $this->db->get ( 'addresses' );
            $addresses = $qu->row_array();

            $results = json_encode($addresses); // TURN THE ARRAY INTO JSON

            print $results;


        } else {
            // invalid address
            print 'not logined'; // lang('common.l_password_help_emailinvalid');
        }


    }

    public function get_all_shipping_addresses () {

        $formValues = $this->input->post(NULL, TRUE);
        // $address_id = $this->input->get_post('id', TRUE);
        $user_id = $this->session->userdata('user_id');

        if($user_id) {
            // valid address


            $this->db->where('user_id',  $user_id);
            $this->db->where ( 'type', 1);
            $this->db->order_by("added", "desc");
            $qu = $this->db->get ( 'addresses' );
            $addresses = $qu->result_array();

            $results = json_encode($addresses); // TURN THE ARRAY INTO JSON

            print $results;


        } else {
            // invalid address
            print 'not logined'; // lang('common.l_password_help_emailinvalid');
        }


    }




    public function shipping_address_status () {

        $formValues = $this->input->post(NULL, TRUE);
        $address_id = $this->input->get_post('id', TRUE);
        $user_id = $this->session->userdata('user_id');

        if($user_id) {
            // valid address

            $dataD['status'] = 0;
            $this->db->where('type',  1);
            $this->db->where('user_id',  $user_id);
            $this->db->update('addresses', $dataD);



            $dataD['status'] = 1;
            $this->db->where('id',  $address_id);
            $this->db->update('addresses', $dataD);

            print '6VOasdasdRgx$';


        } else {
            // invalid address
            print 'not logined'; // lang('common.l_password_help_emailinvalid');
        }


    }

    public function password_update () {


        $user_id = $this->session->userdata('user_id');

        if($user_id) {

            // valid $user_id
            $this->db->where('id', $user_id);
            $query = $this->db->get('users');
            $user = $query->row_array();

            if(count($user)) {

                // check if valid $current_password
                $current_password = $this->input->get_post('current_password', TRUE);

                if(sha1(md5($current_password)) != $user['password']) {
                    print 'Current Password entered doesn\'t match the one is on the website.';
                } else {

                    $npassword = $this->input->get_post('npassword', TRUE);
                    $repeat_code = $this->input->get_post('rpassword', TRUE);

                    // check if repeat matches
                    if($repeat_code != $npassword) {
                        print 'Your new password doesn\'t match with repeat password entered.';
                    } else {

                        $password = sha1(md5($npassword));

                        $gmtTimezone = new DateTimeZone('America/New_York');
                        $now = new DateTime(null, $gmtTimezone);
                        $today = $now->format('Y-m-d H:i:s');

                        $dataD['password'] = $password;
                        $dataD['updated'] = $today;
                        $this->db->where('id', $user_id);
                        $this->db->update('users', $dataD);

                        print '1#aeaRgx$';
                    }
                }
            }
        } else {
            // invalid address
            print 'not logined'; // lang('common.l_password_help_emailinvalid');
        }


    }


    public function delete_shipping_address() {


        $formValues = $this->input->post(NULL, TRUE);
        $address_id = $this->input->get_post('id', TRUE);
        $user_id = $this->session->userdata('user_id');




        if($user_id) {
            // valid address


            $this->db->where('id',  $address_id);
            $qu = $this->db->get ( 'addresses' );
            $deleting = $qu->row_array ();


            $this->db->where('id',  $address_id);
            $this->db->delete('addresses');

            if($deleting['status'] == 1){
                $this->db->where('user_id',  $user_id);
                $this->db->where('type', 1);
                $this->db->order_by('added', 'desc');
                $qu = $this->db->get ( 'addresses' );
                $upd = $qu->row_array ();

                $dataD['status'] = 1;
                $this->db->where('id',  $upd['id']);
                $this->db->update('addresses', $dataD);

                print $upd['id'];
            }








        } else {
            // invalid address
            print 'not logined'; // lang('common.l_password_help_emailinvalid');
        }





    }


    public function edit_shipping() {
        $user_id = $this->session->userdata('user_id');
        $id = $this->input->get_post('id', TRUE);
        if($user_id ) {

            $gmtTimezone = new DateTimeZone('America/New_York');
            $now = new DateTime(null, $gmtTimezone);
            $today =  $now->format('Y-m-d H:i:s');

            // $dataD['status'] = 0;
            // $this->db->where('type',  1);
            // $this->db->where('user_id',  $user_id);
            //  $this->db->update('addresses', $dataD);




            //   $data['status'] = 1;

            $data['first_name'] = $this->input->get_post('first_name', TRUE);
            $data['last_name'] = $this->input->get_post('last_name', TRUE);
            $data['phone'] = $this->input->get_post('phone', TRUE);
            $data['email'] = $this->input->get_post('email', TRUE);

            $data['address1'] = $this->input->get_post('address1', TRUE);
            $data['address2'] = $this->input->get_post('address2', TRUE);
            $data['country'] = $this->input->get_post('country', TRUE);
            $data['state'] = $this->input->get_post('state', TRUE);

            $data['city'] = $this->input->get_post('city', TRUE);
            $data['zip'] = $this->input->get_post('zip', TRUE);

            if($id) {
                $data['updated'] = $today;
                $this->db->where('id', $id);
                $this->db->update('addresses', $data);
            } else {
                //reset other addresses
                $dataD['status'] = 0;
                $this->db->where('type',  1);
                $this->db->where('user_id',  $user_id);
                $this->db->update('addresses', $dataD);

                //add new address
                $data['user_id'] = $user_id;
                $data['type'] = 1; //1 = shipping address
                $data['added'] = $today;
                $data['status'] = 1;
                $this->db->insert('addresses', $data);

            }

            print 'ok';
        }
    }



    public function save_billing_address() {




        $user_id = $this->session->userdata('user_id');

        if($user_id) {
            $gmtTimezone = new DateTimeZone('America/New_York');
            $now = new DateTime(null, $gmtTimezone);
            $today =  $now->format('Y-m-d H:i:s');




            $data['user_id'] = $user_id;
            $data['type'] = 0; //0 = billing address
            //  $data['status'] = 1;

            $data['first_name'] = $this->input->get_post('first_name', TRUE);
            $data['last_name'] = $this->input->get_post('last_name', TRUE);
            $data['phone'] = $this->input->get_post('phone', TRUE);
            $data['email'] = $this->input->get_post('email', TRUE);

            $data['address1'] = $this->input->get_post('address1', TRUE);
            $data['address2'] = $this->input->get_post('address2', TRUE);
            $data['country'] = $this->input->get_post('country', TRUE);
            $data['state'] = $this->input->get_post('state', TRUE);

            $data['city'] = $this->input->get_post('city', TRUE);
            $data['zip'] = $this->input->get_post('zip', TRUE);
            $id = $this->input->get_post('id', TRUE);

            if(strlen($id)) {

                $data['updated'] = $today;
                $this->db->where('id', $id);
                $this->db->update('addresses', $data);
            } else {

                $data['added'] = $today;
                $this->db->insert('addresses', $data);
                $id =  $this->db->insert_id();
            }


            print $id;
        }
    }


    public function save_shipping() {
        $user_id = $this->session->userdata('user_id');

        if($user_id) {
            $gmtTimezone = new DateTimeZone('America/New_York');
            $now = new DateTime(null, $gmtTimezone);
            $today =  $now->format('Y-m-d H:i:s');

            $dataD['status'] = 0;
            $this->db->where('type',  1);
            $this->db->where('user_id',  $user_id);
            $this->db->update('addresses', $dataD);


            $data['added'] = $today;
            $data['user_id'] = $this->session->userdata('user_id');
            $data['type'] = 1; //1 = shipping address
            $data['status'] = 1;

            $data['first_name'] = $this->input->get_post('first_name', TRUE);
            $data['last_name'] = $this->input->get_post('last_name', TRUE);
            $data['phone'] = $this->input->get_post('phone', TRUE);
            $data['email'] = $this->input->get_post('email', TRUE);

            $data['address1'] = $this->input->get_post('address1', TRUE);
            $data['address2'] = $this->input->get_post('address2', TRUE);
            $data['country'] = $this->input->get_post('country', TRUE);
            $data['state'] = $this->input->get_post('state', TRUE);

            $data['city'] = $this->input->get_post('city', TRUE);
            $data['zip'] = $this->input->get_post('zip', TRUE);

            $this->db->insert('addresses', $data);



            print 'ok';
        }
    }


    public function save_billing() {

        $gmtTimezone = new DateTimeZone('America/New_York');
        $now = new DateTime(null, $gmtTimezone);
        $today =  $now->format('Y-m-d H:i:s');

        $data['added'] = $today;
        $data['user_id'] = $this->session->userdata('user_id');
        $data['type'] = 0; //0 = billing address

        $data['first_name'] = $this->input->get_post('first_name', TRUE);
        $data['last_name'] = $this->input->get_post('last_name', TRUE);
        $data['phone'] = $this->input->get_post('phone', TRUE);
        $data['email'] = $this->input->get_post('email', TRUE);

        $data['address1'] = $this->input->get_post('address1', TRUE);
        $data['address2'] = $this->input->get_post('address2', TRUE);
        $data['country'] = $this->input->get_post('country', TRUE);
        $data['state'] = $this->input->get_post('state', TRUE);

        $data['city'] = $this->input->get_post('city', TRUE);
        $data['zip'] = $this->input->get_post('zip', TRUE);

        $this->db->insert('addresses', $data);

    }


    public function edit_publications() {
        $this->data['remove_from_url'] = 1;
        $edit_id = $this->info['url5'];
        $this->db->where('id',  $edit_id);
        $q = $this->db->get('blogs');
        $this->data['blog'] = $q->row_array();

        $selected_products = explode(',',  $this->data['blog']['linked']);

        $this->db->where_in('id',  $selected_products);
        $this->db->where('display',  1);
        $this->db->where('status',  1);
        $this->db->order_by('title', 'asc');
        $qu = $this->db->get ( 'products' );
        $this->data['products'] = $qu->result_array ();


        $selected_products2 = explode(',',  $this->data['blog']['linked2']);

        $this->db->where_in('id',  $selected_products2);
        $this->db->where('display',  1);
        $this->db->where('status',  1);
        $this->db->order_by('title', 'asc');
        $qu = $this->db->get ( 'products' );
        $this->data['products2'] = $qu->result_array ();



        // $this->db->where('user_id',  $user_id);
        $this->db->where('blog_id',  $this->data['blog']['id']);
        $q = $this->db->get('blog_images');
        $this->data['blog_images'] = $q->row_array();


        $this->db->order_by('title', 'asc');
        $qu = $this->db->get ( 'tags' );
        $this->data['tags'] = $qu->result_array ();


        $this->db->where ( 'blog_id', $this->data['blog']['id']);
        $qu = $this->db->get ( 'tags_links' );
        $this->data['tags_links'] = $qu->result_array ();



        $this->db->where('rewrite',  'home');
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->data['seo_title'] = $this->data['page']['seo_title'];
        $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];

        $this->data['is_cabinet'] = 1;


        $this->load->view('header_view', $this->data);
        $this->load->view('modals', $this->data);
        $this->load->view('cabinet/publications_edit_view', $this->data);
        $this->load->view('footer_view', $this->data);



    }
    public function edit_product() {

        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;
        $user_id =  $this->session->userdata('user_id');

        $edit_id = $this->info['url5'];
        $user_id = $this->session->userdata('user_id');




        $this->db->where ( 'user_id', $user_id);
        $qu = $this->db->get ( 'salerep' );
        $this->data['salerep'] = $qu->row_array ();


        if(!count($this->data['salerep'])) {

            $root_link =  '/'.$lang.'/cabinet';
            header('Location: '.$root_link);
        }


        $this->db->where('id',  $edit_id);
        $this->db->where('user_id',  $this->data['salerep']['id']);
        $q = $this->db->get('products');
        $this->data['product'] = $q->row_array();



        $this->db->where('product_id',  $this->data['product']['id']);
        $q = $this->db->get('product_details');
        $this->data['product_details'] = $q->row_array();

        // $this->db->order('priority',  'asc');
        $this->db->order_by('priority', 'desc');
        $this->db->order_by('id', 'desc');
        $this->db->where('product_id',  $this->data['product']['id']);
        $q = $this->db->get('product_images');
        $this->data['product_images'] = $q->result_array();



        $this->db->where('rewrite',  'home');
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->data['seo_title'] = $this->data['page']['seo_title'];
        $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];

        $this->data['is_cabinet'] = 1;


        $this->load->view('header_view', $this->data);
        $this->load->view('modals', $this->data);
        $user_id =  $this->session->userdata('user_id');
        if($user_id ==1) {
            $this->load->view('cabinet/products_edit_v2_view', $this->data);
        } else{
            // $this->load->view('cabinet/products_edit_view', $this->data);
            $this->load->view('cabinet/products_edit_v2_view', $this->data);
        }
        $this->load->view('footer_view', $this->data);

    }


    public function new_product() {
        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;

        $user_id =  $this->session->userdata('user_id');


        $this->db->where ( 'user_id', $user_id);
        $qu = $this->db->get ( 'salerep' );
        $this->data['salerep'] = $qu->row_array ();


        if(!count($this->data['salerep'])) {

            //  $root_link =  '/'.$lang.'/cabinet';
            $root_link =  '/lichnyy-kabinet';
            header('Location: '.$root_link);
        }


        $user_id = $this->session->userdata('user_id');


        /*
         * settings for seo information / custom VS default
        */

        $this->db->where('rewrite',  'home');
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->data['seo_title'] = $this->data['page']['seo_title'];
        $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];

        $this->data['is_cabinet'] = 1;

        $this->load->view('header_view', $this->data);
        $this->load->view('modals', $this->data);
        $this->load->view('cabinet/products_new_view', $this->data);
        $this->load->view('footer_view', $this->data);

    }



    public function index() {

        $this->data['remove_from_url'] = 1;
        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;
        $user_id =  $this->session->userdata('user_id');


        if(strlen($user_id) < 1 ) {

            //$root_link =  '/'.$lang.'/login';
            $root_link =  '/login';
            header('Location: '.$root_link);
        }


        $user_id = $this->session->userdata('user_id');

        $this->db->where ( 'id', $user_id);
        $qu = $this->db->get ( 'users' );
        $this->data['user'] = $qu->row_array ();

        $this->data['salerep'] = array();


        $this->db->where ( 'user_id', $user_id);
        $this->db->where ( 'type', 0);
        $this->db->order_by("added", "desc");
        $qu = $this->db->get ( 'addresses' );
        $this->data['billing_address'] = $qu->row_array ();


        /*
         * settings for seo information / custom VS default
         */

        $this->db->where('rewrite',  'home');
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->data['seo_title'] = $this->data['page']['seo_title'];
        $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];
        $this->data['seo_text'] ='';
        $this->data['seo_h1'] ='';

        $this->data['is_cabinet'] = 1;

        $this->load->view('header_view', $this->data);
        //billing

        $this->load->view('cabinet/cabinet_header_view', $this->data);
        $this->load->view('cabinet/billing_view', $this->data);
        $this->load->view('footer_view', $this->data);


    }



    public function favorities() {

        $this->data['remove_from_url'] = 1;
        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;
        $user_id =  $this->session->userdata('user_id');


        if(strlen($user_id) < 1 ) {

            //$root_link =  '/'.$lang.'/login';
            $root_link =  '/login';
            header('Location: '.$root_link);
        }


        $user_id = $this->session->userdata('user_id');

        $this->db->where ( 'id', $user_id);
        $qu = $this->db->get ( 'users' );
        $this->data['user'] = $qu->row_array ();

        $this->data['salerep'] = array();

        $user_id = $this->session->userdata('user_id');
        $this->db->where('user_id',  $user_id);
        $q = $this->db->get('favorites');
        $favorites = $q->result_array();
        $f_arr = Array();
        if(count($favorites)) {



            $this->db->select('products.id, products.rewrite, products.title, products.cost');
            //  $this->db->where_in('id',  $f_arr);
            // $this->db->where('id',  '2925');
            //$this->db->where('display',  1);
            // $this->db->where('status',  1);
            $this->db->join('products', 'favorites.product_id = products.id', 'left');
            $this->db->where('favorites.added BETWEEN DATE_ADD(NOW(), INTERVAL -60 DAY) AND NOW()');
            $this->db->where('favorites.user_id',  $user_id);
            $this->db->order_by("favorites.added", "desc");
            $this->db->group_by("products.id");
            // $this->db->limit(16);
            //  $this->db->where_in('type',  $type);

            $q = $this->db->get('favorites');




            $this->data['new_products'] = $q->result_array();

            $this->load->model('item_model');
            $this->data['categoryItemsView'] = '';
            foreach($this->data['new_products'] as $item){
                $this->data['categoryItemsView'] .= $this->item_model->create($item);
            }


            //  print_r( $this->data['new_products']);
        } else {
            $this->data['categoryItemsView'] = 'There is no products in your Favorites.';
        }






        /*
         * settings for seo information / custom VS default
         */

        $this->db->where('rewrite',  'home');
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->data['seo_title'] = $this->data['page']['seo_title'];
        $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];
        $this->data['seo_text'] ='';
        $this->data['seo_h1'] ='';

        $this->data['is_cabinet'] = 1;

        $this->load->view('header_view', $this->data);

        //shipping_view
        $this->load->view('cabinet/cabinet_header_view', $this->data);
        $this->load->view('cabinet/favorities_view', $this->data);
        $this->load->view('footer_view', $this->data);


    }




    public function whish_list() {

        $this->data['remove_from_url'] = 1;
        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;
        $user_id =  $this->session->userdata('user_id');


        if(strlen($user_id) < 1 ) {

            //$root_link =  '/'.$lang.'/login';
            $root_link =  '/login';
            header('Location: '.$root_link);
        }


        $user_id = $this->session->userdata('user_id');

        $this->db->where ( 'id', $user_id);
        $qu = $this->db->get ( 'users' );
        $this->data['user'] = $qu->row_array ();

        $this->data['salerep'] = array();

        /*
         * settings for seo information / custom VS default
         */

        $this->db->where('rewrite',  'home');
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->data['seo_title'] = $this->data['page']['seo_title'];
        $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];
        $this->data['seo_text'] ='';
        $this->data['seo_h1'] ='';

        $this->data['is_cabinet'] = 1;

        $this->load->view('header_view', $this->data);

        //shipping_view
        $this->load->view('cabinet/cabinet_header_view', $this->data);
        $this->load->view('cabinet/whishlist_view', $this->data);
        $this->load->view('footer_view', $this->data);


    }






    public function shipping() {

        $this->data['remove_from_url'] = 1;
        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;
        $user_id =  $this->session->userdata('user_id');


        if(strlen($user_id) < 1 ) {

            //$root_link =  '/'.$lang.'/login';
            $root_link =  '/login';
            header('Location: '.$root_link);
        }


        $user_id = $this->session->userdata('user_id');

        $this->db->where ( 'id', $user_id);
        $qu = $this->db->get ( 'users' );
        $this->data['user'] = $qu->row_array ();

        $this->data['salerep'] = array();



        $this->db->where ( 'user_id', $user_id);
        $this->db->where ( 'type', 1);
        $this->db->order_by("added", "desc");
        $qu = $this->db->get ( 'addresses' );
        $this->data['shipping_addresses'] = $qu->result_array ();



        /*
         * settings for seo information / custom VS default
         */

        $this->db->where('rewrite',  'home');
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->data['seo_title'] = $this->data['page']['seo_title'];
        $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];
        $this->data['seo_text'] ='';
        $this->data['seo_h1'] ='';

        $this->data['is_cabinet'] = 1;

        $this->load->view('header_view', $this->data);

        //shipping_view
        $this->load->view('modals_view', $this->data);
        $this->load->view('cabinet/cabinet_header_view', $this->data);
        $this->load->view('cabinet/shipping_view', $this->data);
        $this->load->view('footer_view', $this->data);


    }




    public function password() {

        $this->data['remove_from_url'] = 1;
        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;
        $user_id =  $this->session->userdata('user_id');


        if(strlen($user_id) < 1 ) {

            //$root_link =  '/'.$lang.'/login';
            $root_link =  '/login';
            header('Location: '.$root_link);
        }


        $user_id = $this->session->userdata('user_id');

        $this->db->where ( 'id', $user_id);
        $qu = $this->db->get ( 'users' );
        $this->data['user'] = $qu->row_array ();

        $this->data['salerep'] = array();

        /*
         * settings for seo information / custom VS default
         */

        $this->db->where('rewrite',  'home');
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->data['seo_title'] = $this->data['page']['seo_title'];
        $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];
        $this->data['seo_text'] ='';
        $this->data['seo_h1'] ='';

        $this->data['is_cabinet'] = 1;

        $this->load->view('header_view', $this->data);
        //password
        $this->load->view('cabinet/cabinet_header_view', $this->data);
        $this->load->view('cabinet/password_view', $this->data);
        $this->load->view('footer_view', $this->data);


    }


    public function products()
    {

        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;
        ini_set('memory_limit', '-1');

        $user_id =  $this->session->userdata('user_id');


        if(strlen($user_id) < 1 ) {

            //$root_link =  '/'.$lang.'/login';
            $root_link =  '/login';
            header('Location: '.$root_link);
        } else {


            $this->db->where ( 'user_id', $user_id);
            $qu = $this->db->get ( 'salerep' );
            $this->data['salerep'] = $qu->row_array ();

            $this->db->where ( 'user_id', $this->data['salerep']['id']);
            //$this->db->order_by("title", "asc");
            $this->db->order_by("id", "desc");
            $this->db->limit("20");
            $qu = $this->db->get ( 'products' );
            $this->data['products'] = $qu->result_array ();

            $this->load->model('products_lk_model');
            $last_rewrite = $this->uri->segment(3);
            $lang = $this->uri->segment(1);
            $salerep_id = $this->data['salerep']['id'];
            $this->data['result'] = $this->products_lk_model->filter_results($lang, $last_rewrite,  $salerep_id);

            if(count($this->data['products'])) {
                $this->db->select('category_id');
                $this->db->where ( 'user_id', $this->data['salerep']['id']);
                $this->db->where ( 'category_id !=', 0);
                $this->db->group_by('category_id');
                $qu = $this->db->get ( 'products' );
                $category_ids = $qu->result_array ();


                // echo $this->data['salerep']['id'];
                //  print_r($category_ids);

                if(count($category_ids)) {
                    $category_ids = array_filter(array_column($category_ids, 'category_id'));

                    $this->db->where_in('id', $category_ids);
                    $this->db->order_by("type", "asc");
                    $this->db->order_by("priority", "asc");
                    $qu = $this->db->get ( 'categories' );
                    $this->data['categories'] = $qu->result_array ();
                }
            }


            /*   if(count($this->data['products'])) {
                   $this->db->select('category_id');
                   $this->db->where ( 'user_id', $this->data['salerep']['id']);
                   $this->db->group_by('category_id');
                   $qu = $this->db->get ( 'products' );
                   $category_ids = $qu->result_array ();

                   $category_ids = array_filter(array_column($category_ids, 'category_id'));


                  // $this->db->where_in('id', $category_ids);
                   $this->db->order_by("type", "asc");
                   $this->db->order_by("priority", "asc");
                   $qu = $this->db->get ( 'categories' );
                   $this->data['categories'] = $qu->result_array ();
                 }*/
            //   print_r($this->data['category_ids']);
            /*
             * settings for seo information / custom VS default
             */

            $this->db->where('rewrite',  'home');
            $q = $this->db->get('pages');
            $this->data['page'] = $q->row_array();


            $this->data['seo_title'] = $this->data['page']['seo_title'];
            $this->data['seo_desc'] = $this->data['page']['seo_desc'];
            $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];

            $this->data['is_cabinet'] = 1;


            $this->load->view('header_view', $this->data);
            $this->load->view('modals', $this->data);
            $this->load->view('cabinet/products_view', $this->data);
            $this->load->view('footer_view', $this->data);
        }

    }

    public function discounts()
    {
        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;
        ini_set('memory_limit', '-1');

        $user_id =  $this->session->userdata('user_id');


        if(strlen($user_id) < 1 ) {

            //$root_link =  '/'.$lang.'/login';
            $root_link =  '/login';
            header('Location: '.$root_link);
        } else {

            $this->db->where ( 'user_id', $user_id);
            $qu = $this->db->get ( 'salerep' );
            $this->data['salerep'] = $qu->row_array ();

            $this->db->where ( 'user_id', $this->data['salerep']['id']);
            $this->db->order_by("title", "asc");
            $qu = $this->db->get ( 'products' );
            $this->data['products'] = $qu->result_array ();



            if(count($this->data['products'])) {
                $this->db->select('category_id');
                $this->db->where ( 'user_id', $this->data['salerep']['id']);
                $this->db->where ( 'category_id !=', 0);
                $this->db->group_by('category_id');
                $qu = $this->db->get ( 'products' );
                $category_ids = $qu->result_array ();


                // echo $this->data['salerep']['id'];
                //  print_r($category_ids);

                if(count($category_ids)) {
                    $category_ids = array_filter(array_column($category_ids, 'category_id'));

                    $this->db->where_in('id', $category_ids);
                    $this->db->order_by("type", "asc");
                    $this->db->order_by("priority", "asc");
                    $qu = $this->db->get ( 'categories' );
                    $this->data['categories'] = $qu->result_array ();
                }
            }



            $this->db->where('rewrite',  'home');
            $q = $this->db->get('pages');
            $this->data['page'] = $q->row_array();


            $this->data['seo_title'] = $this->data['page']['seo_title'];
            $this->data['seo_desc'] = $this->data['page']['seo_desc'];
            $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];

            $this->data['is_cabinet'] = 1;


            $this->load->view('header_view', $this->data);
            $this->load->view('modals', $this->data);
            $this->load->view('cabinet/discounts_view', $this->data);
            $this->load->view('footer_view', $this->data);
        }

    }



    public function orders_return()
    {
        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;
        $this->load->helper('common_helper');
        $user_id =  $this->session->userdata('user_id');


        if(strlen($user_id) < 1 ) {

            //$root_link =  '/'.$lang.'/login';
            $root_link =  '/login';
            header('Location: '.$root_link);
        }

        $edit_id = $this->info['url5'];
        if(strlen($edit_id) < 1 ) {

            $root_link =  '/'.$lang.'/cabinet/orders';
            header('Location: '.$root_link);
        }



        $user_id = $this->session->userdata('user_id');

        $this->db->where ( 'id', $user_id);
        $qu = $this->db->get ( 'users' );
        $this->data['user'] = $qu->row_array ();


        $this->db->where ( 'user_id', $user_id);
        $qu = $this->db->get ( 'salerep' );
        $this->data['salerep'] = $qu->row_array ();


        $this->db->order_by('id', 'desc');
        $this->db->where ( 'user_id', $user_id);
        $this->db->where ( 'id', $edit_id);
        $qu = $this->db->get ( 'orders' );
        $this->data['order'] = $qu->row_array ();


        $this->db->where ( 'order_id', $edit_id);
        $qu = $this->db->get ( 'orders_stats' );
        $this->data['orders_stats'] = $qu->result_array();

        //   $pr_arr = array_column($this->data['orders_stats'], 'product_id');

        //  $this->db->where_in ( 'id', $pr_arr);
        // $qu = $this->db->get ( 'products' );
        //$this->data['orders_stats'] = $qu->result_array();

        /*
         * settings for seo information / custom VS default
         */

        $this->db->where('rewrite',  'home');
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->data['seo_title'] = $this->data['page']['seo_title'];
        $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];


        $this->data['is_cabinet'] = 1;

        $this->load->view('header_view', $this->data);
        $this->load->view('modals', $this->data);
        $this->load->view('cabinet/orders_return_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function my_orders() {

        $this->data['remove_from_url'] = 1;
        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;
        $user_id =  $this->session->userdata('user_id');


        if(strlen($user_id) < 1 ) {

            //$root_link =  '/'.$lang.'/login';
            $root_link =  '/login';
            header('Location: '.$root_link);
        }


        $user_id = $this->session->userdata('user_id');

        $this->db->where ( 'id', $user_id);
        $qu = $this->db->get ( 'users' );
        $this->data['user'] = $qu->row_array ();


        $this->db->where ( 'user_id', $user_id);
        $this->db->order_by("added", "desc");
        $qu = $this->db->get ( 'orders' );
        $this->data['orders'] = $qu->result_array ();

        $this->load->model('Cart_item_model');

        $this->load->model('Ship_adr_model');

        $this->data['cart_items'] =  Array();
        $this->data['cart_numbers'] =  Array();
        foreach($this->data['orders'] as $order) {



            $this->db->where('order_id',  $order['id']);
            $q = $this->db->get('order_products');
            $order_products = $q->result_array();

            $subtotal = 0;
            $shipping = 0;

            foreach($order_products as $item ) {
                $subtotal = ($item['oldprice'] - $item['oldprice']*$item['discount']/100)* $item['qty'];
                if($item['ship_title'] == 'undefined') {
                    $shipping= 0;
                } else {
                    $shipping = $item['ship_cost'];
                }

                $this->data['cart_items'][$order['id']]  .= $this->Cart_item_model->create($item);
                $this->data['cart_numbers'][$order['id']]['subtotal'] += $subtotal;
                $this->data['cart_numbers'][$order['id']]['shipping'] += $shipping;

            }

            $this->data['ship_adr'][$order['id']]  = $this->Ship_adr_model->create($order['ship_adr_id']);


        }















        $this->data['salerep'] = array();

        /*
         * settings for seo information / custom VS default
         */

        $this->db->where('rewrite',  'home');
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->data['seo_title'] = $this->data['page']['seo_title'];
        $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];
        $this->data['seo_text'] ='';
        $this->data['seo_h1'] ='';

        $this->data['is_cabinet'] = 1;

        $this->load->view('header_view', $this->data);

        //shipping_view
        $this->load->view('cabinet/cabinet_header_view', $this->data);
        $this->load->view('cabinet/my_orders_view', $this->data);
        $this->load->view('footer_view', $this->data);


    }

    public function orders()
    {
        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;
        $this->load->helper('common_helper');
        $user_id =  $this->session->userdata('user_id');


        if(strlen($user_id) < 1 ) {

            //$root_link =  '/'.$lang.'/login';
            $root_link =  '/login';
            header('Location: '.$root_link);
        }



        $user_id = $this->session->userdata('user_id');

        $this->db->where ( 'id', $user_id);
        $qu = $this->db->get ( 'users' );
        $this->data['user'] = $qu->row_array ();


        $this->db->where ( 'user_id', $user_id);
        $qu = $this->db->get ( 'salerep' );
        $this->data['salerep'] = $qu->row_array ();

        $this->db->order_by('id', 'desc');
        $this->db->where ( 'user_id', $user_id);
        $qu = $this->db->get ( 'orders' );
        $this->data['orders'] = $qu->result_array ();



        /*
         * settings for seo information / custom VS default
         */

        $this->db->where('rewrite',  'home');
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->data['seo_title'] = $this->data['page']['seo_title'];
        $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];


        $this->data['is_cabinet'] = 1;

        $this->load->view('header_view', $this->data);
        $this->load->view('modals', $this->data);
        $this->load->view('cabinet/orders_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function sales()
    {
        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;
        $this->load->helper('common_helper');
        $user_id =  $this->session->userdata('user_id');


        if(strlen($user_id) < 1 ) {

            //$root_link =  '/'.$lang.'/login';
            $root_link =  '/login';
            header('Location: '.$root_link);
        }

        $this->data['url1'] = $this->uri->segment(1);
        $this->data['url2'] = $this->uri->segment(2);


        $user_id = $this->session->userdata('user_id');







        $this->db->where ( 'id', $user_id);
        $qu = $this->db->get ( 'users' );
        $this->data['user'] = $qu->row_array ();


        $this->db->where ( 'user_id', $user_id);
        $qu = $this->db->get ( 'salerep' );
        $this->data['salerep'] = $qu->row_array ();

        $salerep_id = $this->data['salerep']['id'];
        $this->data['salerep_id'] =$salerep_id;

        $this->db->where ( 'salerep_id', $salerep_id);
        $qu = $this->db->get ( 'orders_stats' );
        $this->data['orders_stats'] = $qu->result_array();


        $this->data['orders'] = array();
        if(count($this->data['orders_stats'])) {
            $orders_stats = $this->data['orders_stats'];

            $orders_arr = array_column($orders_stats, 'order_id');
            $orders_arr = array_unique($orders_arr);


            $this->db->where_in ( 'id', $orders_arr);
            $this->db->order_by('id', 'desc');
            $qu = $this->db->get ( 'orders' );
            $this->data['orders'] = $qu->result_array ();
        }
        //    echo count($orders_arr);

        /*
         * settings for seo information / custom VS default
         */

        $this->db->where('rewrite',  'home');
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->data['seo_title'] = $this->data['page']['seo_title'];
        $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];


        $this->data['is_cabinet'] = 1;

        $this->load->view('header_view', $this->data);
        $this->load->view('modals', $this->data);
        $this->load->view('cabinet/sales_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function publications()
    {
        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;
        $user_id =  $this->session->userdata('user_id');


        if(strlen($user_id) < 1 ) {

            //$root_link =  '/'.$lang.'/login';
            $root_link =  '/login';
            header('Location: '.$root_link);
        }


        $user_id = $this->session->userdata('user_id');

        $this->db->where('user_id',  $user_id);
        $q = $this->db->get('blogs');
        $this->data['blogs'] = $q->result_array();


        //  $this->db->where('user_id',  $user_id);
        //



        $this->db->where ( 'id', $user_id);
        $qu = $this->db->get ( 'users' );
        $this->data['user'] = $qu->row_array ();


        $this->db->where ( 'user_id', $user_id);
        $qu = $this->db->get ( 'salerep' );
        $this->data['salerep'] = $qu->row_array ();



        /*
         * settings for seo information / custom VS default
         */

        $this->db->where('rewrite',  'home');
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->data['seo_title'] = $this->data['page']['seo_title'];
        $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];


        $this->data['is_cabinet'] = 1;

        $this->load->view('header_view', $this->data);
        $this->load->view('modals', $this->data);
        $this->load->view('cabinet/publications_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }



    public function about()
    {
        $this->data = $this->info;
        $this->data['remove_from_url'] = 1;
        $user_id =  $this->session->userdata('user_id');


        if(strlen($user_id) < 1 ) {

            //$root_link =  '/'.$lang.'/login';
            $root_link =  '/login';
            header('Location: '.$root_link);
        }

        $this->data['url1'] = $this->uri->segment(1);
        $this->data['url2'] = $this->uri->segment(2);


        $user_id = $this->session->userdata('user_id');

        $this->db->where ( 'id', $user_id);
        $qu = $this->db->get ( 'users' );
        $this->data['user'] = $qu->row_array ();


        $this->db->where ( 'user_id', $user_id);
        $qu = $this->db->get ( 'salerep' );
        $this->data['salerep'] = $qu->row_array ();



        /*
         * settings for seo information / custom VS default
         */

        $this->db->where('rewrite',  'home');
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->data['seo_title'] = $this->data['page']['seo_title'];
        $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];


        $this->data['is_cabinet'] = 1;

        $this->load->view('header_view', $this->data);
        $this->load->view('modals', $this->data);
        $this->load->view('cabinet/about_view', $this->data);
         $this->load->view('modals_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

}
