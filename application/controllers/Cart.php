<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->helper('url');
    }



    function search_highlight($text, $search_terms, $hl_class = 'hl')
    {
        if ( ! is_array($search_terms))
        {
            $search_terms = explode(' ', $search_terms);
        }

        // Highlight each of the terms
        foreach ($search_terms as $term)
        {
            $text = preg_replace('/\b(' . preg_quote($term) . ')\b/i', '<span class="' . $hl_class . '">\1</span>', $text);
        }

        return $text;
    }


    function getBirds() {
        ini_set('display_errors',1 );
        $this->data['remove_from_url'] = 1;
        $this->load->helper(array('search_helper', 'common_helper'));

        $data = $this->input->get_post('q');
        /*       $data =  preg_replace(
       '#(^[a-z]+://)(.+@)?([^/]+)(.*)$#ei',
       "strtolower('\\1').'\\2'.strtolower('\\3').'\\4'",
       $data);*/

        $data = preg_replace_callback(
            "/\{([<>])([a-zA-Z0-9_]*)(\?{0,1})([a-zA-Z0-9_]*)\}(.*)\{\\1\/\\2\}/isU",
            function($m) { return CallFunction($m[1], $m[2], $m[3], $m[4], $m[5]); },
            $data
        );

        /* $this->db->select('prod_id, prod_name, cat_name');
         $this->db->from('products');
         $this->db->join('categories', 'cat_id = prod_category', 'inner');
         $this->db->like('name', $terms);
         $this->db->or_like('description', $terms);

         $query = $this->db->get();
         return $query->result_array();
         *
         * https://habrahabr.ru/post/40218/
         * http://ru.stackoverflow.com/questions/220947/%D0%9F%D0%BE%D0%B8%D1%81%D0%BA-%D1%81-%D1%83%D1%87%D0%B5%D1%82%D0%BE%D0%BC-%D1%80%D0%B5%D0%BB%D0%B5%D0%B2%D0%B0%D0%BD%D1%82%D0%BD%D0%BE%D1%81%D1%82%D0%B8
         * http://sphinxsearch.com/downloads/
         */


        //  $this->db->like('title', $data);
        //  $this->db->or_like('keywords', $data);
        // $this->db->or_like('content', $data);
        // $where = "(title LIKE '$data%' OR title LIKE '% $data%' OR keywords LIKE '$data%' OR keywords LIKE '% $data%' OR content LIKE '$data%'  OR content LIKE '% $data%' )";
        //  $where = "(title LIKE '$data %' OR title LIKE '% $data %' OR keywords LIKE '$data %' OR keywords LIKE '% $data %' OR keywords LIKE '% $data, %' OR keywords LIKE '$data, %' )";
        //  $where = "(title LIKE '$data%' OR title LIKE '% $data%' OR keywords LIKE '$data%' OR keywords LIKE '% $data%'  )";

        // $where = "(keywords LIKE '$data,' OR keywords LIKE '% $data, %')";
        /*/  $data = strtoupper($data);
          $data = str_replace(' ', '', $data);
          $where = 'REPLACE(UPPER(`keywords`), " ", "") LIKE "'.strtoupper($data).'%" '
                   . 'OR  REPLACE(UPPER(`keywords`), " ", "") LIKE "%'.strtoupper($data).'%" '
                   . 'OR  REPLACE(UPPER(`title`), " ", "") LIKE "'.strtoupper($data).'%"  '
                   . 'OR  REPLACE(UPPER(`title`), " ", "") LIKE "%'.strtoupper($data).'%" '  ;


       $this->db->where('display', '1');
       $this->db->order_by('type', 'asc');

      $this->db->select('title');
      $this->db->select('type');
      $this->db->select('id');
      $this->db->select('category_id');
      $this->db->select('rewrite');
     //  $this->db->select('keywords');


  //     $this->db->select('content');
    //  $this->db->limit(11);
        $this->db->where($where);

$q = $this->db->get('products');
$products = $q->result_array();
      */

        $data = strtoupper($data);
        $data = str_replace(' ', '', $data);
        //   $data = ltrim($data, 'E');
        //   $data = ltrim($data, 'Е');
        if (0 === strpos($data, 'E')) {
            $data = ltrim($data, 'E');
        }


        if (0 === strpos($data, 'Е')) {
            $data = ltrim($data, 'Е');
        }

        /*
             $sorting = 'items.cost';
             $order = 'deSC';
             $start = '0';
             $limit = '50';
             $where = 'REPLACE(UPPER(`items`.`title`), " ", "") LIKE "%'.strtoupper($data).'%"  '
               //           . 'OR  REPLACE(UPPER(`items`.`article`), " ", "") LIKE "%'.strtoupper($data).'%" '
                    //      . 'OR  REPLACE(UPPER(`dets`.`info`), " ", "") LIKE "%'.strtoupper($data).'%" '

                     //  . 'OR  REPLACE(UPPER(`dets`.`chartab`), " ", "") LIKE "%'.strtoupper($data).'%" '

                 //    . 'OR  REPLACE(UPPER(`items`.`id`), " ", "") LIKE "%'.strtoupper($data).'%" ' ;
                   //  . 'OR  REPLACE(UPPER(`items`.`title`), " ", "") LIKE "%'.strtoupper($data).'%" ' ;


             $qq = 'SELECT items.id as idd, '
                //     . 'items.article as pn,'
                //     . ' items.rewrite as prewrite,  '
                     . 'items.title as ptitle, '
                     . 'items.cost as pcost, '
                     . 'items.type as ptype, '
                     . 'items.rewrite as link '
          //   . 'imgs.image as iimage,  '
          //  . ' cats.title as cattitle '
        //     . ' subcats.title as subtitle, '
        //     . ' subcats.id as subid, '
        //     . ' subcats.photo as photo '
              // . ' dets.info as infos '

            . ' FROM products as items'
         //   . '  LEFT OUTER join product_details as dets on items.id = dets.product_id '
               . ' LEFT OUTER join categories as cats on cats.id = items.category_id '
          //   . ' LEFT OUTER join categories as subcats on subcats.id = items.subcat_id '
        //   . ' LEFT OUTER join product_details as dets on items.id = dets.product_id '

         //    . '  LEFT OUTER JOIN (
         //            SELECT image, product_id,
          //             MIN(id) AS min_id
           //          FROM product_images
           //          GROUP
           //             BY product_id) AS imgs
           //          ON imgs.product_id = items.id
            //          '

            // . ' WHERE items.type='.$type.' '.$brand_query.' AND items.id IN("'.implode('","',$resultIDs).'") '.$q_price.'  ORDER BY '.$sorting.' '.$order.' LIMIT '.$start.', '.$limit;
             . ' WHERE items.display>0 AND '.$where.'     ORDER BY '.$sorting.' '.$order.' LIMIT '.$start.', '.$limit;
            //     . ' WHERE  '.$where.' ORDER BY '.$sorting.' '.$order ;
               echo $qq;
             $q = $this->db->query($qq);
             $products = $q->result_array();

             */

        $sorting = 'items.cost';
        $order = 'deSC';
        $start = '0';
        $limit = '10';
        $where = 'REPLACE(UPPER(`items`.`title`), " ", "") LIKE "%'.strtoupper($data).'%"  ';


        $qq = 'SELECT  ';

        $qq .= ' imgs.image as product_image, ';

        $qq .= ' cats.title as category_title, ';

        $qq .= ' items.title as product_title, ';
        $qq .= ' items.rewrite as product_rewrite, ';
        $qq .= ' items.oldprice as oldprice, ';
        $qq .= ' items.discount as discount, ';
        $qq .= ' items.id as product_id  ';

        $qq .= ' FROM products as items';

        $qq .=  '  LEFT OUTER JOIN (
                            SELECT image, product_id,
                             MIN(id) AS min_id
                         FROM product_images
                         GROUP
                            BY product_id) AS imgs
                         ON imgs.product_id = items.id
                         ';


        $qq .=  '  LEFT OUTER join categories as cats on cats.id = items.category_id  ';


        $qq .= ' WHERE items.display>0 AND '.$where.'     ORDER BY '.$sorting.' '.$order.' LIMIT '.$start.', '.$limit;

        $q = $this->db->query($qq);
        $products = $q->result_array();


        $result = Array();

        foreach($products as $key => $p) {
            $result[$key]['title'] = $p['product_title'];
            $result[$key]['idd'] = $p['product_id'];
            $result[$key]['link'] = '/product/'.$p['product_rewrite'].'-'.$p['product_id'];
            $result[$key]['pcost'] = $p['oldprice'] - $p['oldprice']*$p['discount']/100;
            $result[$key]['type'] = $p['category_title'];
            //we can show subcat image if there is no product image

            $result[$key]['icon'] = '/external/product/'.$p['product_id'].'/155x230/'.$p['product_image'];
            if(strlen( $result[$key]['icon'] ) < 2){
                $result[$key]['icon'] = '/assets/img/no-image-225.png';
            }


            /*
                 $result[$key]['title'] = $p['ptitle'];
                 $result[$key]['type'] = $p['cattitle']; //.' &rsaquo; '.$p['subtitle']


              //   $this->db->where('product_id', $p['idd']);
               //  $this->db->order_by("image", "asc");
             //    $q = $this->db->get('product_details');
              //   $details = $q->row_array();
                    $result[$key]['link'] = '/'.$p['prewrite'].'-'.$p['idd'];
                    $result[$key]['idd'] = $p['idd'];
                    $result[$key]['pcost'] = $p['pcost'];

        //         $result[$key]['content'] = $this->hightLightWords($p['ptitle'].' '.$p['ptitle'].' '.$p['ptitle'], $data);
               //  $result[$key]['content'] = $this->search_highlight($details['info'], $data);

*/

        }

        $result = json_encode($result);
        print ($result);
    }



    function get_shipping_rate() {
        $return = '';
        $error = 0;

        $shipping_types = array(
            '01' => 'UPS Next Day Air',
            '02' => 'UPS Second Day Air',
            '03' => 'UPS Ground',
            '07' => 'UPS Worldwide Express',
            '08' => 'UPS Worldwide Expedited',
            '11' => 'UPS Standard',
            '12' => 'UPS Three-Day Select',
            '13' => 'Next Day Air Saver',
            '14' => 'UPS Next Day Air Early AM',
            '54' => 'UPS Worldwide Express Plus',
            '59' => 'UPS Second Day Air AM',
            '65' => 'UPS Saver'
        );

        $destination_zip = $this->input->get_post('zip');
        if(!strlen($destination_zip)) {
            $destination_zip = '98226';
        }

        $number_of_packages = $this->input->get_post('number_of_packages');
        $weight = $this->input->get_post('weight');
        $shipping_residential = $this->input->get_post('shipping_residential');


        $address_type = true;

        $gmtTimezone = new DateTimeZone('EST');
        $now = new DateTime(null, $gmtTimezone);
        $ship_date = $now->format('m/d/y');


        $this->load->library('Ups_rating');

        $resultArr = $this->ups_rating->get_rate_package($destination_zip, $weight, $number_of_packages, $shipping_residential);


        print $resultArr;

    }


    public function get_cart_content($user_id) {


        $user_id = $this->input->get_post('user_id', TRUE);
        if (strpos($user_id, '_') !== false) {
            $user_id = 0;

            $loc_user_id = $this->input->get_post('user_id', TRUE);
            // $this->db->where('loc_user_id',  $loc_user_id);
            $filder_userid = 'AND cart.loc_user_id="'.$loc_user_id.'" ';
        } else {
            // $this->db->where('user_id',  $user_id);
            $filder_userid = 'AND cart.user_id="'.$user_id.'" ';
        }
        //echo 'asd'.$filder_userid;

        $q = $this->db->get('cart');
        $cart = $q->result_array();



        $this->load->model('Cart_model');
        $result = $this->Cart_model->get_cart($filder_userid);
        // $resultArr = $this->ups_rating->get_rate_package($destination_zip, $weight, $number_of_packages, $shipping_residential);
        print json_encode($result);





    }
    public function index()	{



        $this->data = '';
        $this->data['remove_from_url'] = 1;
        $this->data['url1'] = $this->uri->segment(1);
        $this->data['url2'] = $this->uri->segment(2);





        $this->db->where('main',  '0');
        $this->db->where('display',  '1');
        $q = $this->db->get('categories');
        $this->data['categories'] = $q->result_array();

        $this->db->where('display',  '1');
        $this->db->where('sale',  '1');
        $this->db->limit('10');
        $this->db->order_by("priority", "desc");
        $q = $this->db->get('products');
        $this->data['sales'] = $q->result_array();




        /*
         * settings for seo information / custom VS default
         */

        $this->data['seo_title'] = '';
        $this->data['seo_desc'] = '';
        $this->data['seo_keywords'] = '';



        $this->load->view('header_view', $this->data);
        $this->load->view('cart_view', $this->data);
         $this->load->view('modals_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function emptycart(){

        unset($_SESSION['items']);
        unset($_SESSION['cart_products']);
        unset($_SESSION['promosum']);
        unset($_SESSION['promo_amount']);
        unset($_SESSION['promo_discount']);
        unset($_SESSION['promoset']);


        //  unset($_SESSION['']);
    }


    public function updatecartitem(){


        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $cart_id = $this->input->get_post('cart_id');
        $qty = $this->input->get_post('qty');
        $ship_code = $this->input->get_post('ship_code');
        $ship_title = $this->input->get_post('ship_title');
        $ship_cost = $this->input->get_post('ship_cost');
        $ship_zip = $this->input->get_post('ship_zip');

        $user_id =  $this->session->userdata ( 'user_id' );

        $data['qty'] = $qty;
        $data['ship_code'] = $ship_code;
        if(strlen($ship_title)) {
            $data['ship_title'] = $ship_title;
        }
        $data['ship_cost'] = $ship_cost;

        if(strlen($ship_title)) {
            $data['ship_zip'] = $ship_zip;
        }

        $this->db->where('id',  $cart_id);
        // $this->db->where('user_id',  $user_id);
        $this->db->update('cart', $data);

    }

    public function totalcart(){
        $total_qty = $this->input->get_post('total_qty');
        $code = $this->input->get_post('code');
        $size_id = $this->input->get_post('size_id');
        $total_sum = $this->input->get_post('total_sum');


        $_SESSION["cart_total"] = $total_sum;
        $_SESSION["cart_qty"] = $total_qty;

        if($total_sum == 'NaN'){
            unset($_SESSION['items']);
            unset($_SESSION['cart_products']);
            unset($_SESSION['promosum']);
            unset($_SESSION['promo_amount']);
            unset($_SESSION['promo_discount']);
            unset($_SESSION['promoset']);



        }
        $cart_qty = 0;
        $user_id =  $this->session->userdata ( 'user_id' );

        $data['qty'] = $total_qty;


        $this->db->where('size_id',  $size_id);
        $this->db->where('product_id',  $code);
        $this->db->where('user_id',  $user_id);
        $this->db->update('cart', $data);



        $this->db->where('user_id',  $user_id);
        $q = $this->db->get('cart');
        $cart_qtys = $q->result_array();
        foreach($cart_qtys as $value) {
            $cart_qty += $value['qty'];
        }
        print $cart_qty;


    }

    public function updatecart(){

        $user_id =  $this->session->userdata ( 'user_id' );
        $product_id = $this->input->get_post('product_id');
        $cost = $this->input->get_post('cost');
        $qty = $this->input->get_post('qty');
        $remove_size_id = $this->input->get_post('remove_size_id');
        $remove_code = $this->input->get_post('remove_code'); //

        //update or remove items
        if(isset($qty) || isset($remove_code))
        {
            //update item quantity in product session
            // if(isset($qty) && is_array($_POST["product_qty"])){
            if(isset($qty) ){
                // foreach($_POST["product_qty"] as $key => $value){
                if(is_numeric($qty)){
                    //$_SESSION["cart_products"][$product_id]["qty"] = $qty;
                    $new_product["qty"] = $qty;
                    $this->db->where('user_id',  $user_id);
                    $this->db->where('product_id',  $product_id);
                    $this->db->update('cart', $new_product);

                    //remove an item from product session
                    if($qty == 0 ){
                        $this->db->where('user_id',  $user_id);
                        $this->db->where('product_id',  $product_id);
                        $q = $this->db->delete('cart');
                    }


                }
                // }
            }

            //remove an item from product session
            if(isset($remove_code) ){

                if($remove_size_id > 0) {
                    $this->db->where('size_id',  $remove_size_id);
                }
                $this->db->where('user_id',  $user_id);
                $this->db->where('product_id',  $remove_code);
                $q = $this->db->delete('cart');
                // $cart = $q->row_array();
                //  unset($_SESSION["cart_products"][$remove_code]);
            }



        }




    }


    public function deletecartitem(){

        $user_id =  $this->session->userdata ( 'user_id' );
        $cart_id = $this->input->get_post('cart_id');


        if($user_id){
            $this->db->where('id', $cart_id);
            $this->db->delete('cart');

        }else {
            $loc_user_id = $this->input->get_post('loc_user_id');
            $this->db->where('loc_user_id', $loc_user_id);
            $this->db->where('id', $cart_id);
            $this->db->delete('cart');
        }
        print $cart_id;
    }


    function get_cart_qty() {

        $return = 'cart';
        $user_id =  $this->session->userdata ( 'user_id' );
        $loc_user_id = $this->input->get_post('loc_user_id');
        if($user_id>0){
            $this->db->where('user_id',  $user_id);
            $q = $this->db->get('cart');
            $cart = $q->result_array();
            if(count($cart)){
                $return = count($cart).' item(s)';
            }

        } else {
            $this->db->where('loc_user_id',  $loc_user_id);
            $q = $this->db->get('cart');
            $cart = $q->result_array();
            if(count($cart)){
                $return = count($cart).' item(s)';
            }
        }
        print $return;

    }


    function promosum () {

        $user_id =  $this->session->userdata ( 'user_id' );
        if($user_id>0){
            $this->db->where('user_id',  $user_id);

            $q = $this->db->get('cart');
            $cart = $q->row_array();

            if(count($cart)) {
                $code = $this->input->get_post('code');

                $_SESSION["promosum"] =  $this->input->get_post('promosum');
                $_SESSION["promo_amount"] =  $this->input->get_post('promo_amount');
                $_SESSION["promo_discount"] =  $this->input->get_post('promo_discount');
                $_SESSION["promoset"] =  $this->input->get_post('promoset');
            }
        }

    }
    function checkpromo () {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);


        $user_id =  $this->session->userdata ( 'user_id' );
        $gmtTimezone = new DateTimeZone('Europe/Kiev');
        $return = null;
        $error = '';


        if($user_id>0){
            $this->db->where('user_id',  $user_id);
            $q = $this->db->get('cart');
            $cart = $q->row_array();

            if(count($cart)) {

                $cond = 0;
                $code = $this->input->get_post('code');

                $this->db->where('code',  $code);
                $q = $this->db->get('promo');
                $promo = $q->row_array();
                if(count($promo)){
                    $cond = 1;


                    //check user registration date
                    //not more then 30 days

                    $this->db->where('id',  $user_id);
                    $q = $this->db->get('users');
                    $users = $q->row_array();


                    $now = new DateTime(null, $gmtTimezone);
                    $today =  $now->format('Y-m-d H:i:s');

                    $start = new DateTime($users['added'], $gmtTimezone);
                    $date_start =  $start->format('Y-m-d H:i:s');

                    $interval = $start->diff($now);
                    $days_last =  $interval->format('%a');
                    if($days_last > 30){
                        $cond = 0;
                        $error = 'The Promo Code has expired. There is more then 30 days from your registration date.';
                    } else {
                        //check if used is not used this promo yet

                        $this->db->where('promo_id',  $user_id);
                        $this->db->where('user_id',  $user_id);
                        $q = $this->db->get('orders');
                        $order = $q->row_array();

                        if(count($order)) {
                            $cond = 0;
                            $error = 'The Promo Code has expired. You have used it already with one of your order.';
                        } else {

                        }

                    }


                    //  echo '<br>$user_id'.$user_id;
                    // echo '<br>$today'.$today;
                    // echo '<br>$date_start'.$date_start;
                    // echo '<br>$days_last'.$days_last;

                    //  used_qty
                    if($cond) {
                        $return = json_encode($promo);
                    }
                } else {
                    $error = 'Invalid Promo Code';
                }
                if(strlen($error)) {
                    $arr = array();
                    $arr['error'] = $error;
                    print json_encode($arr);
                }else {
                    print $return;
                }


            }
        }
        /* */
    }
    public function addtocart(){
        // unset($_SESSION["cart_products"]);


        $product_id = $this->input->get_post('product_id');
        $cost = $this->input->get_post('cost');
        $qty = $this->input->get_post('qty');




        $gmtTimezone = new DateTimeZone('Europe/Kiev');
        $now = new DateTime(null, $gmtTimezone);
        $today =  $now->format('Y-m-d H:i:s');


        //
        $user_id =  $this->session->userdata ( 'user_id' );
        $session_id = session_id();

        if(!$user_id){
            $new_product["loc_user_id"] = $this->input->get_post('user_id');
        }else {
            $new_product["user_id"] = $user_id;
        }

        $new_product["product_id"] = $product_id;
        $new_product["cost"] = $cost;
        $new_product["qty"] = $qty;

        $new_product['added'] = $today;

        $new_product['size'] = $this->input->get_post('size');
        $new_product['size_id'] = $this->input->get_post('size_id');
        $new_product['color'] = $this->input->get_post('color');
        $new_product['color_hex'] = $this->input->get_post('color_hex');
        $new_product['color_id'] = $this->input->get_post('color_id');

        $new_product['oldprice'] = $this->input->get_post('oldprice');
        $new_product['discount'] = $this->input->get_post('discount');
        $new_product['part_number'] = $this->input->get_post('partnumber');

        $new_product['ship_code'] = $this->input->get_post('ship_code');
        $new_product['ship_title'] = $this->input->get_post('ship_title');
        $new_product['ship_cost'] = $this->input->get_post('ship_cost');
        $new_product['ship_zip'] = $this->input->get_post('ship_zip');
        $new_product['free_shipping'] = $this->input->get_post('free_shipping');
        $new_product['max_qty'] = $this->input->get_post('max_qty');

        //  shipping_option

        /*
            $this->db->where('user_id',  $user_id);
            $this->db->where('product_id',  $product_id);
            $q = $this->db->get('cart');
            $cart = $q->row_array();
        */
        $this->db->insert('cart', $new_product);
        $cart_id = $this->db->insert_id();

        $accessory = $this->input->get_post('accessory');
        $accessories = json_decode($accessory, true);
        //print_r($accessories);
        foreach ($accessories as $key => $value) {
            $new_acc['cart_id'] = $cart_id;
            $new_acc['accessory_id'] = $value['value'];
            $this->db->insert('cart_accessories', $new_acc);
        }



        $cart_qty = 0;
        $this->db->where('user_id',  $user_id);
        $q = $this->db->get('cart');
        $cart_qtys = $q->result_array();
        foreach($cart_qtys as $value) {
            $cart_qty += $value['qty'];
        }
        print $cart_qty;
        /*

           if(isset($_SESSION["cart_products"])){  //if session var already exist
               if(isset($_SESSION["cart_products"][$new_product['product_id']])) //check item exist in products array
               {
                   unset($_SESSION["cart_products"][$new_product['product_id']]); //unset old array item
               }
           }
           $_SESSION["cart_products"][$new_product['product_id']] = $new_product;

*/



        //$this->session->set_userdata('items', $newitem[]);
        //   $this->session->set_userdata($items);

    }

}
