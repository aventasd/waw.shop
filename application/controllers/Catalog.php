<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->helper('url');

    }



    public function _remap(){
        $subcategory = $this->uri->segment(3);
        $action = $this->uri->segment(4);
        $edit_id = $this->uri->segment(5);
        $this->index();


    }

    public function index()
    {


        $this->data = '';
        $this->data['url1'] = $this->uri->segment(1);
        $this->data['url2'] = $this->uri->segment(2);


        /*

         * settings for seo information / custom VS default
         */

        $this->db->where('rewrite',  'home');
        //$this->db->where('rewrite',  $this->uri->segment(2));
        // $this->db->where('lang',  $this->uri->segment(1));
        $q = $this->db->get('pages');
        $this->data['page'] = $q->row_array();


        $this->db->where('main',  '0');
        $this->db->where('display',  '1');
        $this->db->order_by('priority', 'asc');
        $q = $this->db->get('categories');
        $this->data['categories'] = $q->result_array();

        $this->db->where('display',  '1');
        $this->db->where('sale',  '1');
        $q = $this->db->get('products');
        $this->data['sales'] = $q->result_array();


        $this->db->where('display',  '1');
        $this->db->limit('12');
        $q = $this->db->get('products');
        $this->data['products'] = $q->result_array();


        $this->load->model('product_model');
        $this->data['categoryProductSEOView'] = '';
        foreach($this->data['products'] as $product){
            $this->data['categoryProductSEOView'] .= $this->product_model->create($product);
        }



        if(strlen($this->data['page']['seo_title']) > 1){
            $this->data['seo_title'] = $this->data['page']['seo_title'];
        }else {
            $this->data['seo_title'] =  $this->data['page']['title'];
        }


        if(strlen($this->data['page']['seo_desc']) > 1){
            $this->data['seo_desc'] = $this->data['page']['seo_desc'];
        }else {
            $this->data['seo_desc'] = ''.$this->data['page']['title'];
        }



        $this->data['seo_keywords'] = $this->data['page']['seo_keywords'];

        if(strlen($this->data['page']['seo_h1'])){
            $this->data['seo_h1'] = $this->data['page']['seo_h1'];
        } else {
            $this->data['seo_h1'] = $this->data['page']['title'];
        }

        if(strlen($this->data['page']['seo_text'])){
            $this->data['seo_text'] = $this->data['page']['seo_text'];
        } else {
            $this->data['seo_text'] = '';
        }


        if(strlen($this->data['page']['seo_code'])){
            $this->data['seo_code'] = $this->data['page']['seo_code'];
        } else {
            $this->data['seo_code'] = '';
        }




        $updated_date = $this->data['page']['updated'];
        $added_date =  $this->data['page']['added'];

        $gmtTimezone = new DateTimeZone('Europe/Kiev');
        $now = new DateTime($updated_date, $gmtTimezone);
        $updated = $now->format('D, d M Y H:i:s');

        $now = new DateTime($added_date, $gmtTimezone);
        $added = $now->format('D, d M Y H:i:s');

        $today = new DateTime(null, $gmtTimezone);
        $datenow = $today->format('D, d M Y H:i:s');

        $today->add(new DateInterval('P1D'));
        $dateend = $today->format('D, d M Y H:i:s');

        $etag = md5($datenow);

        $last_modified = $added;
        if($updated_date != '0000-00-00 00:00:00') {
            $last_modified = $updated;
        }


        $LastModified_unix = strtotime($last_modified); // время последнего изменения страницы

        $LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);
        $IfModifiedSince = false;
        if (isset($_ENV['HTTP_IF_MODIFIED_SINCE'])) {
            $IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));
        }
        if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
            $IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5));
        }
        if ($IfModifiedSince && $IfModifiedSince >= $LastModified_unix) {

            header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
            exit;
        }

        //$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        //  $this->output->set_header('Pragma: no-cache');
        $this->output->set_header('Last-Modified: ' . $last_modified . ' GMT');
        $this->output->set_header('Cache-Control: max-age=86400, must-revalidate');
        $this->output->set_header('Expires: '.$dateend.' GMT');
        $this->output->set_header('Vary: User-Agent');
        $this->output->set_header('Date: '.$datenow.' GMT');
        $this->output->set_header('Etag: '.$etag.'');



        $this->data['catalog'] = '1';

        $this->load->view('header_view', $this->data);
        $this->load->view('catalog_view', $this->data);
         $this->load->view('modals_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }
}
