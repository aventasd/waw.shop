<?php
class Admin_functions extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'text', 'common_helper'));
                $this->pars = $this->uri->segment_array ();
 
	//	$this->lang->load('home');
	//	$this->data['current_lang'] = $this->Header_one->get_current_lang ();
	}

public function admin_lang () {

	$return= "";
	$type = $this->input->get_post('type');
	$this->session->set_userdata('admin_type', $type);
        $this->session->set_userdata('admin_lang', $type);
	$return= $type;

} 

 public function update_block () {
     $product_type = $this->input->get_post('product_type');  
    $item_id = $this->input->get_post('item_id');
    $this->db->where('id', $item_id);
    $this->db->update('blocks', array('type' => $product_type));
  
 }
 
 
 
 
 
 
 
  public function create_product_size () {   
  
      
    $dataD['product_id'] = $this->input->get_post('id');
    $this->db->insert('product_sizes', $dataD);
    $size_id =  $this->db->insert_id();
    print $size_id;
      
                            
  }
      
  public function edit_product_size () {   
  
    $id = $this->input->get_post('id');
    $name = $this->input->get_post('name');
    $value = $this->input->get_post('value');
    $dataDS[$name] = htmlentities($value); 
    $this->db->where('id',  $id); 
    $this->db->update('product_sizes', $dataDS);
      
                            
  }
  
  public function delete_product_size () {
    $id = $this->input->get_post('id');
    
    $this->db->where('id',  $id); 
    $this->db->delete('product_sizes');
  
 }
 
 
 
 
  
   public function get_filters () {      
            $return= "";
            $object = $this->input->get_post('object');
            if($object == 'disks'){
                $object = 'diski';
            } else {
                  $object = 'shiny';
            }
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10     
	    ->select( 'id,   title, priority, code, display, type')
            //->where('display', '1')
         //    ->where('type', $object)
            ->from('groups')
            ->add_column('view', '<a class="  icon icon-big" href="/admin/filters/edit/$1" data-id="$1" data-title="$2"><i class="mdi mdi-edit"></i></a>', 'id, title')  
            ->add_column('display_text_view', '$1', 'display_text_view("display")')
            ->add_column('category_type_view', '$1', 'category_type_view("type")')        
            ->add_column('delete', '<a class="delete icon icon-big" href="/admin/filters/delete/$1" data-id="$1" data-title="$2"><i class="mdi mdi-delete"></i></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    
 function export_subscribers() {
            
           
                                    
                                    
                                        
    $this->db->select('email, added, user_id');                      
    $this->db->order_by('added', 'desc');
 
    $q = $this->db->get('newsletter');
    $newsletters = $q->result_array();

    $schema_insert = Array();
    foreach( $newsletters as $key=>$value) {
  
         $user_id= '';

        foreach($value as $k=>$vl) {
              
                 if($k == 'email' ) {                  
                     $schema_insert[$key][$k] = $vl;   
                  
                 } else if($k == 'added' ) {
  
                    $schema_insert[$key][$k] =  $vl;                      
                            
                 } else if($k == 'user_id' ) {
                     if($vl){
                        $schema_insert[$key][$k] = 'Да';     
                     } else {
                          $schema_insert[$key][$k] = 'Нет';     
                     }
                                  
                            
                 } 
                 
                 
                }
                
                
      
     
 }
 
 // echo '<pre>';
 // print_r($newsletters);
  //echo count($schema_insert);
// echo '</pre>';
//$this->load->library('export');
//$this->load->model('export_users');

//$sql = $this->mymodel->myqueryfunction();
//$sql =$this->data['members'];
//$this->export->to_excel($sql, 'nameForFile');

 
 
//load our new PHPExcel library
$this->load->library('excel');
//activate worksheet number 1
$this->excel->setActiveSheetIndex(0);
//name the worksheet
$this->excel->getActiveSheet()->setTitle('Export Subscribers');
//set cell A1 content with some text
//$this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
//change the font size
//$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
//make the font become bold
//$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
//merge cell A1 until D1
//$this->excel->getActiveSheet()->mergeCells('A1:D1');
//set aligment to center for that merged cell (A1 to D1)
//$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
//$rowArray = array('Value1', 'Value2', 'Value3', 'Value4');
$rowTitles = array('Email', 'Добавлен', 'Регистрация');

$this->excel->getActiveSheet()
    ->fromArray(
        $rowTitles,   // The data to set
        NULL,        // Array values with this value will not be set
        'A1'         // Top left coordinate of the worksheet range where
                     //    we want to set these values (default is A1)
    );

$this->excel->getActiveSheet()
    ->fromArray(
        $schema_insert,   // The data to set
        NULL,        // Array values with this value will not be set
        'A2'         // Top left coordinate of the worksheet range where
                     //    we want to set these values (default is A1)
    );

    
 /*

$filename='SpecialT_members.xls'; //save our workbook as this file name
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
             
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');



*/

 


$styleArray = array(
    'font' => array(
        'bold' => true,
    ),
 
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
            'argb' => 'CCCCCC',
        ),
    ),
);


$this->excel->getActiveSheet()->getStyle('A1:R1')->applyFromArray($styleArray);

$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$this->excel->getActiveSheet()->getColumnDimension('С')->setWidth(15);

$gmtTimezone = new DateTimeZone('Europe/Kiev'); 
$now = new DateTime(null, $gmtTimezone);
$today =  $now->format('d.m.Y'); 
                        
                

$filename='WAW_Subscribers_'.$today.'.xls'; //save our workbook as this file name

header('Set-Cookie: fileDownload=true; path=/');
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
             
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
//force user to download the Excel file without writing it to server's HD
$objWriter->save('php://output');



//https://github.com/PHPOffice/PHPExcel/wiki/User%20Documentation%20Overview%20and%20Quickstart%20Guide
  //  http://www.ahowto.net/php/easily-integrateload-phpexcel-into-codeigniter-framework
 //   https://github.com/bcit-ci/CodeIgniter/wiki/PHPExcel

      //  $this->load->view('users_export', $this->data);


    }

     public function get_redirects () {
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id, from_url, to_url')
          //  ->where('whocreated', '0')
            ->from('redirects')
           ->add_column('view', '<a href="/admin/redirects/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, title')
           ->add_column('delete', '<a href="/admin/redirects/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, added');
            
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
     public function get_langs () {
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, ru, en, uk')
          //  ->where('whocreated', '0')
            ->from('langs')
           ->add_column('view', '<a href="/admin/langs/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
 public function update_catparams_fields () {
      
      
     $product_id = $this->input->get_post('product_id'); 
     $catparam_id = $this->input->get_post('catparam_id'); 
     $catparam_value = $this->input->get_post('catparam_value', TRUE);
     
    $this->db->where('catparam_id', $catparam_id);  
    $this->db->where('product_id', $product_id); 
    $q = $this->db->get('product_params');
    $product_params = $q->row_array();  

       $data['value'] = $catparam_value;   
     
     if(count($product_params)> 0) {
      
         $this->db->where('id', $product_params['id']);
         $this->db->update('product_params', $data);
         
     } else{
         //insert          
           $data['product_id'] = $product_id; 
           $data['catparam_id'] = $catparam_id; 
           $this->db->insert('product_params', $data);        
           
     }

  
 }
 
  public function update_product_option () {
      
      
      $display = $this->input->get_post('display');
     $status = $this->input->get_post('status'); 
     $product_id = $this->input->get_post('product_id'); 
     $type = $this->input->get_post('type'); 
     
     //delete all other options here
      if($type == 'radio') {
       $this->db->where('product_id', $this->input->get_post('product_id'));
       // $this->db->where('option_title_id', $this->input->get_post('option_title_id'));
        $this->db->where('category_id', $this->input->get_post('category_id'));
      //  $this->db->where('subcat_id', $this->input->get_post('subcat_id'));
         $this->db->where('group_id', $this->input->get_post('group_id'));
         $this->db->delete('options');
          
      }
     if($status == 'true') {
         //insert
          $data['product_id'] = $product_id; 
          $data['title'] = $this->input->get_post('title'); 
         
           $data['option_title_id'] = $this->input->get_post('option_title_id'); 
            $data['category_id'] = $this->input->get_post('category_id'); 
            $data['subcat_id'] = $this->input->get_post('subcat_id'); 
            $data['group_id'] = $this->input->get_post('group_id'); 
            $data['display'] = $this->input->get_post('display'); 
           $this->db->insert('options', $data);
         
         
     } else{
         //delete
   
        $this->db->where('product_id', $this->input->get_post('product_id'));
        $this->db->where('option_title_id', $this->input->get_post('option_title_id'));
        $this->db->where('category_id', $this->input->get_post('category_id'));
      //  $this->db->where('subcat_id', $this->input->get_post('subcat_id'));
         $this->db->where('group_id', $this->input->get_post('group_id'));
         $this->db->delete('options');
     }

  
 }
 
 
 
   public function update_product_colors () {
      
      
      $display = $this->input->get_post('display');
     $status = $this->input->get_post('status'); 
     $product_id = $this->input->get_post('product_id'); 
     $type = $this->input->get_post('type'); 
     $color_id = $this->input->get_post('color_id');  
     
     
          if($status == 'true') {
         //insert
          $data['product_id'] = $product_id; 
         
            $data['color_id'] = $color_id; 
           $this->db->insert('product_colors', $data);
         
         
     } else{
         //delete   
        $this->db->where('product_id', $product_id);
        $this->db->where('color_id', $color_id);
         $this->db->delete('product_colors');
     }
      
 }
 
 
    public function update_product_accessories () {
      
      
    //  $display = $this->input->get_post('display');
     $status = $this->input->get_post('status'); 
     $product_id = $this->input->get_post('product_id'); 
     //$type = $this->input->get_post('type'); 
     $accessory_id = $this->input->get_post('accessory_id');  
     
     
          if($status == 'true') {
         //insert
          $data['product_id'] = $product_id; 
         
            $data['accessory_id'] = $accessory_id; 
           $this->db->insert('product_accessories', $data);
         
         
     } else{
         //delete   
        $this->db->where('product_id', $product_id);
        $this->db->where('accessory_id', $accessory_id);
         $this->db->delete('product_accessories');
     }
     
     
     
    
  
 }
 
 
 
 
  public function load_group () {
      $return ='';

     $id = $this->input->get_post('id');  
     $product_id = $this->input->get_post('product_id');  
  
    $this->db->where('product_id', $product_id);  
    $this->db->where('group_id', $id);        
   
    $q = $this->db->get('options');
    $options = $q->result_array();                         

     $selected_options = array();
    foreach($options as $option)     {
        $selected_options[] = $option['option_title_id'];                                 
    }              
  //  echo '<pre>';
  //  print_r($selected_options);
    
    $this->db->where('group_id', $id);      
         $this->db->order_by("priority", "asc");
    $q = $this->db->get('option_titles');
    $option_titles = $q->result_array();                         


  //  echo '<pre>';
   // print_r($option_titles);
    
    foreach($option_titles as $title)     { 
        
    $this->db->where('id', $id);       
         $this->db->order_by("priority", "asc");
    $q = $this->db->get('groups');
    $groups = $q->row_array();   
    
     if (strpos($groups['code'], 'size') !== false ) { 
         $input_type= 'checkbox';
     } else {
         $input_type= 'radio';
     }
        $input_type= 'checkbox';
      //if (strpos($groups['code'], 'color') === false ) {
          if ($groups['code'] != 'color') {
              if(in_array($title['id'], $selected_options)) {
                $checked = 'checked="checked"'; 
                $checked_class = 'checked'; 
                 $return .= '<li class="'.$checked_class.'"><input data-subcat_id=""  name="'.$groups['code'].'"  data-group_id="'.$title['group_id'].'" data-category_id=""  data-option_title_id="'.$title['id'].'" data-title="'.$title['title'].'"   id="option_'.$title['id'].'_inp" class="option_checkbox"  data-product_id="'.$product_id.'" type="'.$input_type.'" value="1"  '.$checked.' ><label for="option_'.$title['id'].'_inp">'.$title['title'].'</label></li>';
            } else{
                 $checked = '  '; 
                 $checked_class = '  ';  
                  $return .= '<li class="'.$checked_class.'"><input data-subcat_id="" name="'.$groups['code'].'"  data-group_id="'.$title['group_id'].'" data-category_id=""  data-option_title_id="'.$title['id'].'" data-title="'.$title['title'].'"   id="option_'.$title['id'].'_inp" class="option_checkbox"  data-product_id="'.$product_id.'" type="'.$input_type.'" value="1"  '.$checked.' ><label for="option_'.$title['id'].'_inp">'.$title['title'].'</label></li>';
            }
      }
   

    }          

    print $return;
  
 }
  

 public function get_hero () {
            $return= "";
             $object = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, sort')
            ->where('category', $object)
            ->from('hero')
           ->add_column('view', '<a href="/admin/hero/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('delete', '<a href="/admin/hero/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
 
     public function get_hero_projects () {
            $return= "";
             $object = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, sort')
            ->where('category', $object)
            ->from('hero_projects')
           ->add_column('view', '<a href="/admin/hero_projects/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('delete', '<a href="/admin/hero_projects/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    

 
    

public function get_report () {
            $return= "";
                $object = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, lang')
           ->where('category', $object)
            ->from('report')
             
          // ->add_column('title', '$1', 'title_view("content")')
           ->add_column('view', '<a href="/admin/report/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('delete', '<a href="/admin/report/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
     
 public function get_specs () {
            $return= "";
                $object = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  content, lang')
           ->where('category', $object)
            ->from('specs')
             
           ->add_column('title', '$1', 'title_view("content")')
           ->add_column('view', '<a href="/admin/specs/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('delete', '<a href="/admin/specs/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title_view("content")');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
     public function get_objspecs () {
            $return= "";
                $object = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  content, lang')
           ->where('category', $object)
            ->from('objspecs')
             
           ->add_column('title', '$1', 'title_view("content")')
           ->add_column('view', '<a href="/admin/objspecs/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('delete', '<a href="/admin/objspecs/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title_view("content")');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
      
     public function get_objgal () {
            $return= "";
                $object = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  content, lang')
           ->where('category', $object)
            ->from('objgal')
             
           ->add_column('title', '$1', 'title_view("content")')
           ->add_column('view', '<a href="/admin/objgal/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('delete', '<a href="/admin/objgal/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title_view("content")');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    
    
        
 public function get_flats () {
            $return= "";
                $object = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, status')
           ->where('category', $object)
            ->from('flats')
            ->add_column('status_view', '$1', 'check_status("status")')
           ->add_column('view', '<a href="/admin/flats/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('delete', '<a href="/admin/flats/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    
 public function get_floors () {
            $return= "";
                $object = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, sort')
           ->where('category', $object)
            ->from('floors')
           ->add_column('view', '<a href="/admin/floors/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('delete', '<a href="/admin/floors/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
        
 public function get_sections () {
            $return= "";
               $object = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title')
          ->where('category', $object)
            ->from('sections')
           ->add_column('view', '<a href="/admin/sections/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('delete', '<a href="/admin/sections/delete/$1" class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    
            public function get_params () {    
            $object = $this->input->get_post('object');
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10     
	    ->select( 'id,  title,  priority, product_id')
           ->where('product_id', $object)
            ->from('product_params')
            ->add_column('view', '<a href="/admin/params/edit/$1/$2"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, product_id')
           // ->add_column('website', '$1', 'website_view("display")')
         //   ->add_column('image_tmb', '<a href="/admin/gallery/edit/$1/$3"><img src="/external/products/$3/73x50/$2" alt="View" title="View" /></a>', 'id, image, product_id')
           ->add_column('delete', '<a href="/admin/params/delete/$1/$2"   data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title, product_id');
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
 
    
    
    
        public function get_gallery () {    
            $object = $this->input->get_post('object');
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10     
	    ->select( 'id,  alt,  display,  priority, image, product_id')
           ->where('product_id', $object)
            ->from('product_images')
            ->add_column('view', '<a href="/admin/gallery/edit/$1/$2"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, product_id')
            ->add_column('website', '$1', 'website_view("display")')
            ->add_column('image_tmb', '<a href="/admin/gallery/edit/$1/$3"><img style="width: 70px" src="/external/product/$3/280x353/$2" alt="View" title="View" /></a>', 'id, image, product_id')
           ->add_column('delete', '<a href="/admin/gallery/delete/$1/$2"   data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title, product_id');
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
            public function get_lookimgs () {    
            $object = $this->input->get_post('object');
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10     
	    ->select( 'id,  alt,  display,  priority, image, look_id')
           ->where('look_id', $object)
            ->from('look_images')
            ->add_column('view', '<a href="/admin/lookimgs/edit/$1/$2"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, look_id')
            ->add_column('website', '$1', 'website_view("display")')
            ->add_column('image_tmb', '<a href="/admin/lookimgs/edit/$1/$3"><img style="width: 70px" src="/external/look/$3/380x380/$2" alt="View" title="View" /></a>', 'id, image, look_id')
           ->add_column('delete', '<a href="/admin/lookimgs/delete/$1/$2"   data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title, look_id');
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    
  
    
     public function get_awards () {
            $return= "";
             $current_lang =  $this->session->userdata('admin_lang');
             if(!strlen($current_lang)) $current_lang = 'ru';
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, lang, sort')
            ->where('lang', $current_lang)
            ->from('awards')
           ->add_column('view', '<a href="/admin/awards/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('delete', '<a href="/admin/awards/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
  
    
         public function get_materials () {
            $return= "";
             $object = $this->input->get_post('object');
             
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, sort')
            ->where('category', $object)
            ->from('materials')
           ->add_column('view', '<a href="/admin/materials/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
           ->add_column('delete', '<a href="/admin/materials/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
             public function get_leds () {
            $return= "";
             $object = $this->input->get_post('object');
             
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, sort')
            ->where('category', $object)
            ->from('leds')
           ->add_column('view', '<a href="/admin/leds/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
           ->add_column('delete', '<a href="/admin/leds/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
         public function get_areas() {
            $return= "";
             $object = $this->input->get_post('object');
             
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, sort')
            ->where('category', $object)
            ->from('areas')
           ->add_column('view', '<a href="/admin/areas/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
           ->add_column('delete', '<a href="/admin/areas/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
             public function get_places () {
            $return= "";
             $object = $this->input->get_post('object');
             
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, sort')
            ->where('category', $object)
            ->from('places')
           ->add_column('view', '<a href="/admin/places/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
           ->add_column('delete', '<a href="/admin/places/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
     public function get_leaders () {
            $return= "";
             $current_lang =  $this->session->userdata('admin_lang');
             if(!strlen($current_lang)) $current_lang = 'ru';
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, lang, sort')
           ->where('lang', $current_lang)
            ->from('leaders')
           ->add_column('view', '<a href="/admin/leaders/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('delete', '<a href="/admin/leaders/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
        
      public function get_blocks1 () {
            $return= "";
           $object = $this->input->get_post('object');
            
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, category, sort, lang, type')
             ->where('category', $object)
            ->from('blocks')
            ->add_column('view', '<a href="/admin/sales/$2/blocks/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, category')
            ->add_column('cat', '$1', 'blocks_view("type")')
            ->add_column('delete', '<a href="/admin/sales/$2/blocks/delete/$1"  class="delete" data-title="$3"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, category, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
      public function get_settings() {
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, value')
            ->where('type', '0')
            ->from('settings')
           ->add_column('view', '<a href="/admin/settings/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
          public function get_colors() {
            $return= "";
            $object = $this->input->get_post('current_type');
            
            
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, code, display, priority, type')
          //  ->where('lang', $object)
            ->from('colors')
     
                     ->add_column('view', '<a class="  icon icon-big" href="/admin/colors/edit/$1" data-id="$1" data-title="$2"><i class="mdi mdi-edit"></i></a>', 'id, title')  
            ->add_column('display_text_view', '$1', 'display_text_view("display")')
            ->add_column('category_type_view', '$1', 'category_type_view("type")')        
            ->add_column('delete', '<a class="delete icon icon-big" href="/admin/colors/delete/$1" data-id="$1" data-title="$2"><i class="mdi mdi-delete"></i></a>', 'id, title');
                     
                     
                     
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
        
          public function get_accessories() {
            $return= "";
            $object = $this->input->get_post('current_type');
            
            
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, code, display, priority, type')
          //  ->where('lang', $object)
            ->from('accessories')
     
                     ->add_column('view', '<a class="  icon icon-big" href="/admin/accessories/edit/$1" data-id="$1" data-title="$2"><i class="mdi mdi-edit"></i></a>', 'id, title')  
            ->add_column('display_text_view', '$1', 'display_text_view("display")')
            ->add_column('category_type_view', '$1', 'category_type_view("type")')        
            ->add_column('delete', '<a class="delete icon icon-big" href="/admin/accessories/delete/$1" data-id="$1" data-title="$2"><i class="mdi mdi-delete"></i></a>', 'id, title');
                     
                     
                     
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    
    public function get_shipping_time() {
            $return= "";
            $object = $this->input->get_post('current_type');
            
            
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'shipping_time.id,  shipping_time.title, salerep.name, categories.title as cat ')
            ->where('shipping_time.lang', $object)
            ->from('shipping_time')
             ->join('salerep', 'shipping_time.salerep_id = salerep.id ', 'left')
             ->join('categories', 'categories.id = shipping_time.category_id ', 'left')
          //   ->group_by('salerep.id')  
           ->add_column('view', '<a href="/admin/shipping_time/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, title')
                     ->add_column('delete', '<a href="/admin/shipping_time/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
     public function get_measurements() {
            $return= "";
            $object = $this->input->get_post('current_type');
            
            $salerep_id = $this->input->get_post('salerep_id');
            
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, salerep_id, cat_id')
            ->where('lang', $object)
            ->where('salerep_id', $salerep_id)        
            ->from('measurements')
            ->add_column('view', '<a href="/admin/measurements/edit/$1/$3"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, title, salerep_id')
            ->add_column('cat', '$1', 'cat_view("cat_id")')
            ->add_column('delete', '<a href="/admin/measurements/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
      public function get_marketing() {
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, value')
             ->where('type', '1')
            ->from('settings')
           ->add_column('view', '<a href="/admin/marketing/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    
      public function get_inform() {
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  email, name, added, product_id')
          //  ->where('whocreated', '0')
            ->from('inform')
           ->add_column('view', '<a href="/admin/inform/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
          public function get_import() {
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title')
          //  ->where('whocreated', '0')
            ->from('import')
           ->add_column('view', '<a href="/admin/import/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
      public function get_orders_returns () {
            $return= ""; 

            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  added, order_id, phone, email, status, user_id')
         //  ->where('lang', $current_lang)
          //  ->where('whocreated', '0')
            ->from('orders_return')
            ->group_by('id')
            ->add_column('view', '<a href="/admin/returns/edit/$1/"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
         //   ->add_column('blocks', '<a href="/admin/orders/$1/blocks"><img src="/assets/admin/i/blocks2.png" alt="Блоки" title="Блоки" /></a>', 'id')
          // ->add_column('rus_date', '$1', 'rus_date("added")')
           ->add_column('status_view_field', '$1', 'get_return_status("status")')          
           ->add_column('delete', '<a href="/admin/returns/delete/$1/"  class="delete" ><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
            
  public function get_orders () {
            $return= ""; 

            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10




	    ->select( 'id,  added, first_name, phone, email, status, total_sum')
         //  ->where('lang', $current_lang)
          //  ->where('whocreated', '0')
            ->from('orders')
            ->add_column('view', '<a class="icon icon-big" href="/admin/orders/edit/$1"><i class="mdi mdi-edit"></i></a>', 'id')
                ->add_column('order_number_view', 'LB-$1',  'id')
                //   ->add_column('blocks', '<a href="/admin/orders/$1/blocks"><img src="/assets/admin/i/blocks2.png" alt="Блоки" title="Блоки" /></a>', 'id')
          // ->add_column('rus_date', '$1', 'rus_date("added")')
           ->add_column('status_view_field', '$1', 'get_order_status("status")')          
           ->add_column('delete', '<a class="delete icon icon-big" href="/admin/orders/delete/$1"  class="delete" ><i class="mdi mdi-delete"></i></a>', 'id');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }





    public function get_orders_promo () {
            $return= ""; 
            $promo_id = $this->input->get_post('object');
              $return= ""; 

            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  added, first_name, phone, email, status, total_sum')
         //  ->where('lang', $current_lang)
          ->where('promo_id', $promo_id)
            ->from('orders')
            ->add_column('view', '<a href="/admin/orders/edit/$1/"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
         //   ->add_column('blocks', '<a href="/admin/orders/$1/blocks"><img src="/assets/admin/i/blocks2.png" alt="Блоки" title="Блоки" /></a>', 'id')
          // ->add_column('rus_date', '$1', 'rus_date("added")')
           ->add_column('status_view_field', '$1', 'get_order_status("status")');          
        //   ->add_column('delete', '<a href="/admin/orders/delete/$1/"  class="delete" ><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
        
         public function get_anons () {
            $return= "";
             $object = $this->input->get_post('object');
             
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, sort')
            ->where('category', $object)
            ->from('anons')
           ->add_column('view', '<a href="/admin/anons/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
           ->add_column('delete', '<a href="/admin/anons/delete/$1"  class="delete" data-code="$1"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    
     public function get_projects () {
            $return= "";
             //  $current_lang =  $this->lang->lang(); 
             $object = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, category, sort, lang')
            ->where('lang', $object)
            ->from('projects')
            ->add_column('view', '<a href="/admin/projects/edit/$1/"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
          //  ->add_column('blocks', '<a href="/admin/sales/$1/blocks"><img src="/assets/admin/i/blocks2.png" alt="Блоки" title="Блоки" /></a>', 'id')
            // ->add_column('cat', '$1', 'category_view("category")')
            ->add_column('delete', '<a href="/admin/projects/delete/$1/"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
function get_user_signle(){
                $return= "";

		$data = $this->input->get_post('user_id');
                $this->db->select('name, last_name, id');
               $this->db->where('id',  $data);    
               $this->db->limit(1);
		$q = $this->db->get('users');
		$row_set = $q->row_array();
                
                $title = $row_set['name'].' '.$row_set['last_name'];
                $name= $row_set['name'];
                $id= $row_set['id'];
                $res = array('title' => $title, 'name' => $name, 'id' => $id);
 
	 print json_encode($res);
}

    
    
function get_user_new(){
	$return= "";

		$data = $this->input->get_post('q');
                $page = $this->input->get_post('page');
                if(strlen($page) > 0){
                    $limit = 10;
                    $start = $page* $limit;                       
                } else {
                    $limit = 10;
                    $start = 0; 
                }
                $lim = $start.','.$limit;
                $this->db->select('name, last_name, id, CONCAT(`name`, " ", `last_name`) as title');
		//$this->db->like('title', $term);
		//$this->db->or_like('article', $term);
                //$this->db->like('id', $term);
		// $this->db->order_by('title', 'asc');
                // 
                
                $data = strtoupper($data);
                $data = str_replace(' ', '', $data);
                
                     //     $this->db->select('UPPER(`title`) as art'); 
                   
            
              
              // $this->db->where('display',   '1');
             //  $this->db->where('cost >',   '0');
             //  $this->db->where('qty >',   '0');
              //  $this->db->like('id',   '%'.($data).'%'); 
                $this->db->where('REPLACE(UPPER(`name`), " ", "") LIKE',   '%'.($data).'%'); 
         //      $this->db->where('REPLACE(UPPER(`last_name`), " ", "") LIKE',   '%'.($data).'%');
            //    $this->db->where('REPLACE(UPPER(`id`), " ", "") LIKE',   '%'.($data).'%');
             //   $this->db->like('title', $data);
               $this->db->limit($limit, $start);
		$q = $this->db->get('users');
		$row_set = $q->result_array();
		$count= count($row_set);

	 
                $total = Array();
		$total['total_count']= $count;
		if($count>0) {
                    $total['items']= $row_set;
		} else {
                    $total['items']=Array();
		
		}
	 print json_encode($total);
}

        
  public function get_objects () {
      
             $current_lang =  $this->session->userdata('admin_lang');
            if(!strlen($current_lang)) $current_lang = 'ru';
            if(strlen($current_lang) < 1) {
              $current_lang = 'ru';  
            }
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
      
	    ->select( 'id,  title, category, sort, lang')
             ->where('lang', $current_lang)
            ->from('objects')
            ->add_column('view', '<a href="/admin/objects/$1/edit"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
           // ->add_column('blocks', '<a href="/admin/objects/$1/blocks"><img src="/assets/admin/i/blocks2.png" alt="Блоки" title="Блоки" /></a>', 'id')
             ->add_column('cat', '$1', 'category_view("category")')
            ->add_column('delete', '<a href="/admin/objects/$1/delete/"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
         public function get_messages () {
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id, added, phone, status')
          //  ->where('whocreated', '0')
            ->from('messages')
            ->add_column('view', '<a href="/admin/messages/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
             ->add_column('stat', '$1', 'status_message("status")')
            ->add_column('delete', '<a href="/admin/messages/delete/$1"  class="delete" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, phone');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
      public function get_subscribers () {
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  email, status')
          //  ->where('whocreated', '0')
            ->from('newsletter')
            ->add_column('view', '<a href="/admin/subscribers/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('status_view_field', '$1', 'check_status_user("status")')
            //->add_column('delete', '<a href="/admin/users/delete/$1"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id');
            ->add_column('delete', '<a href="/admin/subscribers/delete/$1"  data-code="$1"  data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, name');
           
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
       public function get_help () {
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, category_id, display')
          //  ->where('whocreated', '0')
            ->from('help')
            ->add_column('view', '<a href="/admin/help/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('category_view', '$1', 'check_cat_help("category_id")')
            ->add_column('display_text_view', '$1', 'get_display_status("display")')
            //->add_column('delete', '<a href="/admin/users/delete/$1"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id');
            ->add_column('delete', '<a href="/admin/help/delete/$1"  data-code="$1"  data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, name');
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
          public function get_feedback () {
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'feedback.id,  feedback.salerep_id,  feedback.order_id, feedback.user_id, users.name as name, salerep.name as salerep_name, feedback.rating, feedback.status')
            ->join('salerep', 'feedback.salerep_id = salerep.id ', 'left')
            ->join('users', 'feedback.user_id = users.id ', 'left')
            ->from('feedback')
            ->add_column('view', '<a href="/admin/feedback/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('status_view_field', '$1', 'check_status_user("status")')
            //->add_column('delete', '<a href="/admin/users/delete/$1"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id');
            ->add_column('delete', '<a href="/admin/feedback/delete/$1"  data-code="$1"  data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, name');
           
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    
      public function get_users () {
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  first_name,  last_name, email, status, added')

            ->from('users')
            ->add_column('view', '<a class="  icon icon-big" href="/admin/users/edit/$1" data-id="$1" data-title="$2"><i class="mdi mdi-edit"></i></a>', 'id, title')
            ->add_column('status_view_field', '$1', 'check_status_user("status")')
            ->add_column('delete', '<a class="delete icon icon-big" href="/admin/users/delete/$1" data-id="$1" data-title="$2"><i class="mdi mdi-delete"></i></a>', 'id, title');


          $data['result']= $this->datatables10->generate();
	$this->load->view('ajax', $data);
        
    }







    public function get_users_promo () {
            $return= "";
               $promo_id = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10     
	    ->select( 'users.id,  users.name, users.email, users.status')             
            ->from('users')
             ->join('orders', 'orders.user_id = users.id ', 'left')                    
             ->where('orders.promo_id', $promo_id)
             ->group_by('users.id')                      
                    
            ->add_column('view', '<a href="/admin/users/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('status_view_field', '$1', 'check_status_user("status")');
            //->add_column('delete', '<a href="/admin/users/delete/$1"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id');
           // ->add_column('delete', '<a href="/admin/users/delete/$1"  data-code="$1"  data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, name');
           
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
          public function get_salerep () {
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'salerep.id as id,  salerep.name as name, salerep.email as email, salerep.status as status, salerep.user_id as user_id, users.email as login')
          //  ->where('whocreated', '0')
            ->from('salerep')
            ->join('users', 'salerep.user_id = users.id ', 'left')
             ->group_by('salerep.id')  
            ->add_column('view', '<a href="/admin/salerep/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('status_view_field', '$1', 'check_status_salerep("status")')
           // ->add_column('delete', '<a href="/admin/salerep/delete/$1"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id');
             ->add_column('delete', '<a href="/admin/salerep/delete/$1"  data-code="$1"  data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, name');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }





        public function get_promo () {
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, added, status')
          //  ->where('whocreated', '0')
            ->from('promo')
            ->add_column('view', '<a class="  icon icon-big" href="/admin/promo/edit/$1" data-id="$1" data-title="$2"><i class="mdi mdi-edit"></i></a>', 'id, title')
            ->add_column('status_view', '$1', 'check_status_promo("status")')
           // ->add_column('delete', '<a href="/admin/salerep/delete/$1"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id');
           ->add_column('delete', '<a class="delete icon icon-big" href="/admin/promo/delete/$1" data-id="$1" data-title="$2"><i class="mdi mdi-delete"></i></a>', 'id, title');
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
      public function get_blogs () {
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, added, status, category, type')
          //  ->where('whocreated', '0')
            ->from('blogs')
            ->add_column('view', '<a href="/admin/blogs/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('status_view_field', '$1', 'check_status_blogs("status")')
            ->add_column('gender_view_field', '$1', 'check_gender("category")')
            ->add_column('type_view_field', '$1', 'check_blog_type("type")')        
                    
           // ->add_column('delete', '<a href="/admin/salerep/delete/$1"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id');
             ->add_column('delete', '<a href="/admin/blogs/delete/$1"  data-code="$1"  data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    public function get_blocks () {
            $return= "";
            
            $current_lang = $this->input->get_post('current_lang');
             if(!strlen($current_lang)) $current_lang = 'ru';
             
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, type, priority, category')
            ->where('lang', $current_lang)
                    
            ->from('blocks')
            ->add_column('view', '<a href="/admin/blocks/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
             ->add_column('cat_view', '$1', 'slide_type22("category")')
           // ->add_column('delete', '<a href="/admin/salerep/delete/$1"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id');
             ->add_column('delete', '<a href="/admin/blocks/delete/$1"  data-code="$1"  data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    
        
    public function get_slidertop () {
            $return= "";
            
            $current_lang = $this->input->get_post('current_lang');
             if(!strlen($current_lang)) $current_lang = 'ru';
             
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, type, priority')
            ->where('lang', $current_lang)
                    
            ->from('slidertop')
            ->add_column('view', '<a href="/admin/slidertop/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('cat_view', '$1', 'slide_type("type")')
           // ->add_column('delete', '<a href="/admin/salerep/delete/$1"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id');
             ->add_column('delete', '<a href="/admin/slidertop/delete/$1"  data-code="$1"  data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
        public function get_sliderbot () {
            $return= "";
            
            $current_lang = $this->input->get_post('current_lang');
             if(!strlen($current_lang)) $current_lang = 'ru';
             
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, type, priority')
            ->where('lang', $current_lang)
                    
            ->from('sliderbot')
            ->add_column('view', '<a href="/admin/sliderbot/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('cat_view', '$1', 'slide_type("type")')
           // ->add_column('delete', '<a href="/admin/salerep/delete/$1"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id');
             ->add_column('delete', '<a href="/admin/sliderbot/delete/$1"  data-code="$1"  data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    function get_subcat_table(){
	$return= "";

		$cat_id = $this->input->get_post('cat_id');
		 
                $this->db->where('main', $cat_id);
		 $this->db->order_by('title', 'asc');
		$q = $this->db->get('categories');
		$row_set = $q->result_array();
		 $count= count($row_set);

	 
                $total = Array();
		$total['total']= $count;
		if($count>0) {
		$total['items']= $row_set;
		} else {
		$total['items']=Array();
		
		}
	 print json_encode($total);
}



    
    
function get_gift(){
	$return= "";

		$term = $this->input->get_post('term');
		$manufacturer = $this->input->get_post('manufacturer');
	
		//$this->db->where('manufacturer', $manufacturer);
                $this->db->select('title, id');
		$this->db->like('title', $term);
		$this->db->or_like('article', $term);
                $this->db->or_like('id', $term);
		 $this->db->order_by('title', 'asc');
		$q = $this->db->get('products');
		$row_set = $q->result_array();
		 $count= count($row_set);

	 
	 $total = Array();
		$total['total']= $count;
		if($count>0) {
		$total['movies']= $row_set;
		} else {
		$total['movies']=Array();
		
		}
	 print json_encode($total);
}


function get_brands_select2(){
	$return= "";

		$term = $this->input->get_post('term');
	 
                $this->db->select('title, id');
		$this->db->like('title', $term);
		//$this->db->or_like('article', $term);
                $this->db->or_like('id', $term);
		 $this->db->order_by('title', 'asc');
                 $this->db->limit('30');
		$q = $this->db->get('brands');
		$row_set = $q->result_array();
		 $count= count($row_set);

	 
                $total = Array();
		$total['total_count']= $count;
		if($count>0) {
		$total['items']= $row_set;
		} else {
		$total['items']=Array();
		
		}
	 print json_encode($total);
}

function get_gift_signle(){
	$return= "";

		$data = $this->input->get_post('gift_id');
                $this->db->select('title, id');
               $this->db->where('id',  $data);    
               $this->db->limit(1);
		$q = $this->db->get('products');
		$row_set = $q->result_array();
 
	 print json_encode($row_set);
}






function get_gift_new(){
	$return= "";

		$data = $this->input->get_post('q');
                $page = $this->input->get_post('page');
                if(strlen($page) > 0){
                    $limit = 10;
                    $start = $page* $limit;                       
                } else {
                    $limit = 10;
                    $start = 0; 
                }
                $lim = $start.','.$limit;
                $this->db->select('title, id');
		//$this->db->like('title', $term);
		//$this->db->or_like('article', $term);
                //$this->db->like('id', $term);
		// $this->db->order_by('title', 'asc');
                // 
                
                $data = strtoupper($data);
                $data = str_replace(' ', '', $data);
                
                     //     $this->db->select('UPPER(`title`) as art'); 
                   
            
              
             //  $this->db->where('display',   '1');
              // $this->db->where('cost >',   '0');
            //   $this->db->where('qty >',   '0');
              //  $this->db->like('id',   '%'.($data).'%'); 
                $this->db->where('REPLACE(UPPER(`title`), " ", "") LIKE',   '%'.($data).'%'); 
                 $this->db->or_where('REPLACE(UPPER(`id`), " ", "") LIKE',   '%'.($data).'%'); 
             //   $this->db->like('title', $data);
               $this->db->limit($limit, $start);
		$q = $this->db->get('products');
		$row_set = $q->result_array();
		$count= count($row_set);

	 
                $total = Array();
		$total['total_count']= $count;
		if($count>0) {
                    $total['items']= $row_set;
		} else {
                    $total['items']=Array();
		
		}
	 print json_encode($total);
}


function get_links_new(){
	$return= "";

		$data = $this->input->get_post('q');
                $page = $this->input->get_post('page');
                if(strlen($page) > 0){
                    $limit = 10;
                    $start = $page* $limit;                       
                } else {
                    $limit = 10;
                    $start = 0; 
                }
                $lim = $start.','.$limit;
                $this->db->select('title, id');
		//$this->db->like('title', $term);
		//$this->db->or_like('article', $term);
                //$this->db->like('id', $term);
		// $this->db->order_by('title', 'asc');
                // 
                
                $data = strtoupper($data);
                $data = str_replace(' ', '', $data);
                
                     //     $this->db->select('UPPER(`title`) as art'); 
                   
            
              
             //  $this->db->where('display',   '1');
              // $this->db->where('cost >',   '0');
            //   $this->db->where('qty >',   '0');
              //  $this->db->like('id',   '%'.($data).'%'); 
                $this->db->where('REPLACE(UPPER(`title`), " ", "") LIKE',   '%'.($data).'%'); 
                 $this->db->or_where('REPLACE(UPPER(`id`), " ", "") LIKE',   '%'.($data).'%'); 
             //   $this->db->like('title', $data);
               $this->db->limit($limit, $start);
		$q = $this->db->get('products');
		$row_set = $q->result_array();
		$count= count($row_set);

	 
                $total = Array();
		$total['total_count']= $count;
		if($count>0) {
                    $total['items']= $row_set;
		} else {
                    $total['items']=Array();
		
		}
	 print json_encode($total);
}

 public function get_pages () {
           $current_lang = $this->input->get_post('current_type');
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, type')
            //->where('display', '1')
             ->where('lang', $current_lang)
            ->from('pages')
            ->add_column('view', '<a href="/admin/pages/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
           //  ->add_column('cat', '$1', 'category_view("category")');
             ->add_column('type_view', '$1', 'page_type_view("type")')                 
           ->add_column('delete', '<a href="/admin/pages/delete/$1"   data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
        public function get_brands () {      
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10     
	    ->select( 'id,  title')
            //->where('display', '1')
           // ->where('lang', $current_lang)
            ->from('brands')
            ->add_column('view', '<a href="/admin/brands/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
           //  ->add_column('cat', '$1', 'category_view("category")');
                      
           ->add_column('delete', '<a href="/admin/brands/delete/$1"   data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
   public function get_catbrands () {      
            $return= "";
            $object = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10     
	    ->select( 'id,   cat_id, title')
            //->where('display', '1')
           ->where('cat_id', $object)
            ->from('catbrands')
           ->add_column('view', '<a href="/admin/categories/$2/brands/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, cat_id')  
         //   ->add_column('display_view', '$1', 'display_view("display")')
            ->add_column('delete', '<a  class="delete"  href="/admin/categories/$2/brands/delete/$1"  data-id="$1" data-title="$3"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, cat_id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    //AND options.subcat_id = '.$object.'
   public function get_catfilters () {      
            $return= "";
            $object = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10     
	    ->select( 'COUNT(DISTINCT options.product_id) as itemsqty, groups.id as id,   groups.subcat_id as subcat_id, groups.title as title, groups.priority as priority, groups.code as code, groups.display as display')
            //->where('display', '1')
           ->where('groups.subcat_id', $object)
            ->from('groups')
            ->join('options', 'options.group_id = groups.id ', 'left')
            ->group_by('groups.id')  
           ->add_column('view', '<a href="/admin/categories/$2/filters/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, subcat_id')  
           ->add_column('display_text_view', '$1', 'display_text_view("display")')
            ->add_column('delete', '<a  class="delete"  href="/admin/categories/$2/filters/delete/$1"  data-id="$1" data-title="$3"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, subcat_idd, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
        
   public function get_option_titles () {
       
       
       
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            
            
            
            $return= "";
            $object = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10     
	    ->select( 'COUNT(DISTINCT options.product_id) as itemsqty, option_titles.id as id,   option_titles.group_id as group_id, option_titles.title as title, option_titles.priority as priority')
            //->where('display', '1')
           ->where('option_titles.group_id', $object)
            ->from('option_titles')
            ->join('options', 'options.option_title_id = option_titles.id ', 'left')
            ->group_by('option_titles.id')  
           //->add_column('view', '<a href="/admin/categories/$2/option_titles/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, group_id')  
           ->add_column('view', '<a class="  icon icon-big" href="/admin/filters/$2/option_titles/edit/$1" data-id="$1" data-title="$2"><i class="mdi mdi-edit"></i></a>', 'id, group_id')          
         //   ->add_column('display_view', '$1', 'display_view("display")')
          //  ->add_column('delete', '<a  class="delete"  href="/admin/categories/$2/option_titles/delete/$1"  data-id="$1" data-title="$3"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, group_id, title');
             ->add_column('delete', '<a class="delete icon icon-big" href="/admin/filters/$2/option_titles/delete/$1" data-id="$1" data-title="$2"><i class="mdi mdi-delete"></i></a>', 'id, group_id, title');
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    
         public function get_articles () {      
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10     
	    ->select( 'id,  title, display, priority')
            //->where('display', '1')
           // ->where('lang', $current_lang)
            ->from('articles')
            ->add_column('view', '<a href="/admin/articles/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
           ->add_column('website', '$1', 'website_view("display")')
           ->add_column('delete', '<a href="/admin/articles/delete/$1"   data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
     
    
    public function get_slides () {      
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10     
	    ->select( 'id,  title,  display,  priority')
           // ->where('lang', $current_lang)
            ->from('slides')
            ->add_column('view', '<a href="/admin/slides/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('website', '$1', 'website_view("display")')
           ->add_column('delete', '<a href="/admin/slides/delete/$1"   data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    

        
    public function update_one_product_group () {
            $field = $this->input->get_post('field');
            $status = $this->input->get_post('status');
            $product_id = $this->input->get_post('id');
            $group_id = $this->input->get_post('group_id');
            
                      if($status > 0) { 
                            
                        $this->db->where('product_id',  $product_id); 
                        $this->db->where('group_id',  $group_id); 
                        $q = $this->db->get('products_groups');
                        $favorites = $q->row_array();
                        
                        if(!count($favorites)) { 
                         
                            $dataD['product_id'] = $product_id; 
                            $dataD['group_id'] = $group_id; 
                            $this->db->insert('products_groups', $dataD); 
                            $last =  $this->db->insert_id();
                            
                        }
                             
                } else {
                     $this->db->where('group_id',  $group_id); 
                     $this->db->where('product_id',  $product_id); 
                     $this->db->delete('products_groups');
                }
            
       }
       
    
    
    public function update_one_product () {
            $field = $this->input->get_post('field');
            $status = $this->input->get_post('status');
            $id = $this->input->get_post('id');
            $gift_id = $this->input->get_post('gift_id');
            
            
                if(strlen($gift_id) > 0) {
                    $data['gift_id'] = $gift_id;
                }
                
              $data[$field] = $status;
              $this->db->where('id', $id);  
              $this->db->update('products', $data);
              
              if($field == 'display'){
                 $dataO[$field] = $status;
                $this->db->where('product_id', $id);  
                $this->db->update('options', $dataO);
              
              }
            
       }
       
       
    
       public function update_products () {
            $field = $this->input->get_post('field');
            $status = $this->input->get_post('status');
            $ids = $this->input->get_post('ids');
            $gift_id = $this->input->get_post('gift_id');
            
            
                if(strlen($gift_id) > 0) {
                    $data['gift_id'] = $gift_id;
                }
                
             if($field == 'status'){
             //    if($status == 0){ $status }
             }   
              $data[$field] = $status;
              $this->db->where_in('id', explode(',', $ids));  
              $this->db->update('products', $data);
              
              if($field == 'display'){
                 $dataO[$field] = $status;
                $this->db->where_in('product_id', explode(',', $ids)); 
                $this->db->update('options', $dataO);              
              }
              
              
            
       }
       
       
       
        public function group_products () {
            $field = $this->input->get_post('field');
            $status = $this->input->get_post('status');
            $ids = $this->input->get_post('ids');
            $group_id = $this->input->get_post('group_id');
            
            
      
                     if($status > 0) { 
                       $product_ids =  explode(',', $ids);
                       foreach($product_ids as $product_id) {
                        $this->db->where('product_id',  $product_id);                        
                        $this->db->where('group_id',  $group_id); 
                        $q = $this->db->get('products_groups');
                        $favorites = $q->result_array();
                        
                        if(!count($favorites)) {                          
                            $dataD['product_id'] = $product_id; 
                            $dataD['group_id'] = $group_id; 
                            $this->db->insert('products_groups', $dataD);                         
                        }
                       }
                             
                } else {
                     $this->db->where('group_id',  $group_id); 
                     $this->db->where_in('product_id', explode(',', $ids)); 
                     $this->db->delete('products_groups');
                }
                
                
                
               
       }
       
       
       
       
           
       public function delete_products () {
            $field = $this->input->get_post('field');
            $status = $this->input->get_post('status');
            $ids = $this->input->get_post('ids');
          
            
              if($field == 'delete' && $status == 1 ){
              
               $this->db->where_in('id', explode(',', $ids)); 
               $this->db->delete('products');              
              }
              
              
            
       }
       
       
         public function get_products_short () {
             $option_id =  $this->session->userdata('option_id');  
             $category_id =  11;  
             
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'products.id as id,  products.title as title, products.cost as cost,  products.display as display, products.category_id as category_id, products.subcat_id as subcat_id, products.user_id as user_id, products.free_ship as free_ship, products.status  as  status')
             ->where('products.category_id', $category_id)
         //   ->where('options.option_title_id', $option_id)
            ->from('products')
            ->join('options', 'options.product_id = products.id AND options.option_title_id = 1396', 'left')
            ->group_by('products.id')  
            ->add_column('view', '<a href="/admin/products/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('category_view', '$1', 'category_view("category_id")') 
            ->add_column('subcat_view', '$1', 'category_view("subcat_id")') 
            ->add_column('user', '$1', 'salerep_view("user_id")')     
            ->add_column('display_view', '$1', 'display_view("display", "id")')    
             ->add_column('status_view_field', '$1', 'status_view_adv("status", "id")')   
              //   ->add_column('warranty_view', '$1', 'warranty_view("warranty", "id")')      
  
                    
             ->add_column('ship_view', '$1', 'shipping_view("free_ship", "id")')        
           ->add_column('delete', '<a href="/admin/products/delete/$1"  data-code="$1"  data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
          public function get_products_short_reverse () {
             $option_id =   $this->input->get_post('option_id'); //1396;//$this->session->userdata('option_id');  
             $category_id =  11;  
             
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'products.id as id,  products.title as title, products.cost as cost, products.category_id as category_id, products.subcat_id as subcat_id, products.user_id as user_id')
           // ->where('products.category_id', $category_id)
            ->where('options.option_title_id', $option_id)
            ->from('options')
            ->join('products', 'options.product_id = products.id', 'left')
            ->group_by('options.id')  
                    
            ->add_column('view', '<a href="/admin/products/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('category_view', '$1', 'category_view("category_id")') 
            ->add_column('subcat_view', '$1', 'category_view("subcat_id")') 
            ->add_column('user', '$1', 'salerep_view("user_id")');     
         //   ->add_column('display_view', '$1', 'display_view("display", "id")')    
          //   ->add_column('status_view_field', '$1', 'status_view_adv("status", "id")')   
              //   ->add_column('warranty_view', '$1', 'warranty_view("warranty", "id")')      
  
                    
          //   ->add_column('ship_view', '$1', 'shipping_view("free_ship", "id")')        
         //  ->add_column('delete', '<a href="/admin/products/delete/$1"  data-code="$1"  data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
     
       
       
       
          public function get_products () {
             $current_type =  $this->session->userdata('admin_type');  
             
             if($current_type == 'zimnie_vidy_sporta')  {
                $current_type = '2';
            }     else {
                $current_type = '1';
            }
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, cost,  display, category_id, subcat_id, user_id, free_ship, status, subcat_sec  ')
           //  ->where('type', $current_type)
           // ->where('lang', $current_lang)
            ->from('products')
            ->add_column('view', '<a href="/admin/products/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('category_view', '$1', 'category_view("category_id")') 
            ->add_column('subcat_view_sec', '$1', 'category_view("subcat_id")') 
            ->add_column('user', '$1', 'salerep_view("user_id")')     
            ->add_column('display_view', '$1', 'display_view("display", "id")')    
             ->add_column('status_view_field', '$1', 'status_view_adv("status", "id")')   
              //   ->add_column('warranty_view', '$1', 'warranty_view("warranty", "id")')      
  
                    
             ->add_column('ship_view', '$1', 'shipping_view("free_ship", "id")')        
           ->add_column('delete', '<a href="/admin/products/delete/$1"  data-code="$1"  data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    public function get_products_groups () {
        
        
             $current_type =  $this->session->userdata('admin_type');  
             
             if($current_type == 'zimnie_vidy_sporta')  {
                $current_type = '2';
            }     else {
                $current_type = '1';
            }
            
            $group_id = $this->input->get_post('group_id');
            
            $return= "";
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'id,  title, cost,  display, category_id, subcat_id, user_id, free_ship, products_groups.group_id as gg  ')
           //  ->where('type', $current_type)
           // ->where('lang', $current_lang)
            ->from('products')
             ->join('products_groups', 'products_groups.product_id = products.id AND products_groups.group_id = '.$group_id.'', 'left')
               
              ->where('status', 1)       
            ->add_column('view', '<a href="/admin/products/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('category_view', '$1', 'category_view("category_id")') 
            ->add_column('subcat_view', '$1', 'category_view("subcat_id")') 
            ->add_column('user', '$1', 'salerep_view("user_id")')     
            ->add_column('group_view', '$1', 'grouped_view("gg", "'.$group_id.'", "id")')    
           //  ->add_column('status_view_field', '$1', 'status_view("status", "id")')   
              //   ->add_column('warranty_view', '$1', 'warranty_view("warranty", "id")')                         
             ->add_column('ship_view', '$1', 'shipping_view("free_ship", "id")')  ;      
         //  ->add_column('delete', '<a href="/admin/products/delete/$1"  data-code="$1"  data-title="$2" class="delete"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
    
    
    
    
     public function get_subcat () {
            $return= "";
            $current_type = $this->input->get_post('current_type');
       
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
  //   COUNT(DISTINCT products.id)
	    ->select( 'categories.qty_pr as photo, categories.id as id,  categories.title as title, priority, categories.display as display,  categories.type as type, main')
           ->where('main', $current_type)
            ->from('categories')
             ->join('products', 'products.subcat_id = categories.id', 'left')
            ->group_by('categories.id')    
            ->add_column('view', '<a href="/admin/categories/$2/subcat/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, main')  
            ->add_column('blocks', '<a href="/admin/categories/$1/subcat"><img src="/assets/admin/i/blocks2.png" alt="Подкатегории для $2" title="Подкатегории для $2" /></a>', 'id, title')
            ->add_column('type_view', '$1', 'category_type_view("type")')           
            ->add_column('display_text_view', '$1', 'display_text_view("display")')
           ->add_column('delete', '<a  class="delete"  href="/admin/categories/$2/subcat/delete/$1"  data-id="$1" data-title="$3"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, main, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }
    
     public function get_catparams () {      
            $return= "";
            $object = $this->input->get_post('object');
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10     
	    ->select( 'id,   cat_id, title, priority')
            //->where('display', '1')
           ->where('cat_id', $object)
            ->from('catparams')
           ->add_column('view', '<a href="/admin/categories/$2/params/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id, cat_id')  
         //   ->add_column('display_view', '$1', 'display_view("display")')
            ->add_column('delete', '<a  class="delete"  href="/admin/categories/$2/params/delete/$1"  data-id="$1" data-title="$3"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, cat_id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }  
     
  public function get_categories () {
      
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
      
      
            $return= "";
            $current_type = $this->input->get_post('current_type');
            //AND products_groups.group_id = '.$group_id.'
                   
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'COUNT(DISTINCT products.id) as photo, categories.id as id,  categories.title as title, priority, categories.display as display,  categories.type as type')
          // ->where('lang', $current_type)
           ->where('main', '0')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id', 'left')
            ->group_by('categories.id')        
            ->add_column('view', '<a href="/admin/categories/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('blocks', '<a href="/admin/categories/$1/subcat"><img src="/assets/admin/i/blocks2.png" alt="Подкатегории для $2" title="Подкатегории для $2" /></a>', 'id, title')
           
            ->add_column('brands', '<a href="/admin/categories/$1/params"><img  style="width: 24px" src="/assets/admin/i/gear2.svg" alt="Бренды для $2" title="Параметры для $2" /></a>', 'id, title')
                    
            ->add_column('filters', '<a href="/admin/categories/$1/filters"><img style="width: 20px" src="/assets/admin/i/check.svg" alt="Фильтры для $2" title="Фильтры для $2" /></a>', 'id, title')
                
            ->add_column('type_view', '$1', 'category_type_view("type")')       
            ->add_column('display_text_view', '$1', 'display_text_view("display")')
            ->add_column('delete', '<a class="delete" href="/admin/categories/delete/$1" data-id="$1" data-title="$2"><img src="/assets/admin/i/del.png" alt="Delete" title="Delete" /></a>', 'id, title');
            
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }

      public function get_categories_simple () {
      
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
      
      
            $return= "";
            $current_type = $this->input->get_post('current_type');
            //AND products_groups.group_id = '.$group_id.'
                   
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( 'categories.id as id, categories.title as title, priority, categories.display as display, type')
          // ->where('lang', $current_type)
           ->where('main', '0')
            ->from('categories')
           // ->join('products', 'products.category_id = categories.id', 'left')
            ->group_by('categories.id')        
          //  ->add_column('view', '<a href="/admin/categories/edit/$1"><img src="/assets/admin/i/edit.png" alt="View" title="View" /></a>', 'id')
           ->add_column('view', '<a class="  icon icon-big" href="/admin/categories/edit/$1" data-id="$1" data-title="$2"><i class="mdi mdi-edit"></i></a>', 'id, title') 
          //  ->add_column('blocks', '<a href="/admin/categories/$1/subcat"><img src="/assets/admin/i/blocks2.png" alt="Подкатегории для $2" title="Подкатегории для $2" /></a>', 'id, title')
           
          //  ->add_column('brands', '<a href="/admin/categories/$1/params"><img  style="width: 24px" src="/assets/admin/i/gear2.svg" alt="Бренды для $2" title="Параметры для $2" /></a>', 'id, title')
                    
         //   ->add_column('filters', '<a href="/admin/categories/$1/filters"><img style="width: 20px" src="/assets/admin/i/check.svg" alt="Фильтры для $2" title="Фильтры для $2" /></a>', 'id, title')
                
            ->add_column('type_view', '$1', 'category_type_view("type")')       
            ->add_column('display_text_view', '$1', 'display_text_view("display")')
             ->add_column('delete', '<a class="delete icon icon-big" href="/admin/categories/delete/$1" data-id="$1" data-title="$2"><i class="mdi mdi-delete"></i></a>', 'id, title');
 
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }

    
       public function get_products_simple () {
      
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
      
      
            $return= "";
            $current_type = $this->input->get_post('current_type');
            //AND products_groups.group_id = '.$group_id.'
                   
            $this->load->helper('datatable_helper');
            $this->load->library('datatables10');
            $this->datatables10
     
	    ->select( ' id, h1_title, cost, display, type')
          // ->where('lang', $current_type)
         //  ->where('main', '0')
            ->from('products')

            ->group_by('products.id')        
           ->add_column('view', '<a class="  icon icon-big" href="/admin/products/edit/$1" data-id="$1" data-title="$2"><i class="mdi mdi-edit"></i></a>', 'id, title') 
            ->add_column('type_view', '$1', 'category_type_view("type")')       
            ->add_column('display_text_view', '$1', 'display_text_view("display")')
             ->add_column('delete', '<a class="delete icon icon-big" href="/admin/products/delete/$1" data-id="$1" data-title="$2"><i class="mdi mdi-delete"></i></a>', 'id, title');
 
     	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
        
    }

    
    
    
    
 
public function get_users_new() {	
	 $return= "";
	 $this->load->helper('datatable_helper');
	 $this->load->library('datatables10');
	 $this->datatables10
	    ->select( 'id, email, company_name, first_name, last_name, register_date, resseller, resseller_approved, resseller_discount, access_level, statename, logo, salerepname, spiff, salerepnameId')
            ->where('whocreated', '0')
            ->from('members')
            ->add_column('view', '<a href="/admin/users/edit/$1"><img src="/content/admin/edit.png" alt="View" title="View" /></a>', 'id')
            ->add_column('delete', '<a href="/admin/users/delete/$1"><img src="/content/admin/del.png" alt="Delete" title="Delete" /></a>', 'id')
            ->add_column('spiff_view', '$1', 'spiff_view("spiff")')
            ->add_column('level', '$1', 'check_level("id", "access_level")')
            ->add_column('reseller_status', '$1', 'reseller_status("id", "resseller", "resseller_approved", "resseller_discount")')
            ->add_column('reseller_status_sort', '$1', 'reseller_status_sort("id", "resseller", "resseller_approved", "resseller_discount")')
            ->add_column('thumb', '<a href="/admin/users/edit/$1"><img width="90" class="image_cat" src="$3" alt="$2" title="$2" /></a>', 'id, company_name, check_logo("id", "logo")');
	$data['result']= $this->datatables10->generate();        
	$this->load->view('ajax', $data);
}

                                
     






}

/* End of file home.php */
/* Location: ./system/application/controllers/home.php */