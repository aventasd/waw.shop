<?php
class Cart_model extends CI_Model {
    
 
function __construct()
    {
        parent::__construct();
		$this->pars = $this->uri->segment_array();
		$this->data = '';
		$this->load->helper('text');		 

    }
	
        function get_cart($filder_userid){
                $result ='';
                $sorting = 'cart.added';
                $order = 'desc';
                $start = '0';
                $limit = '80';
            
                
                $qq = 'SELECT cart.id as cart_id,     '

                   . ' cart.discount as discount,  '    
                    . ' cart.ship_code as ship_code,  '         
                   . ' ssz.weight as weight,  '        
                   . ' ssz.package as number_of_packages,  '   
                   . ' ssz.id as size_id,  '  
                   . ' cart.ship_zip as ship_zip,  '   
                 . ' cart.ship_cost as ship_cost,  '   
                  . ' cart.ship_title as ship_title,  '
                    . ' cart.ship_type as ship_type,  '
                    . ' cart.color as color,  '
                . ' cart.qty as qty,  '
                . ' cart.part_number as part_number,  '
                . ' ssz.base_spread as size,  '
                . ' ssz.oldprice as oldprice,  '
                   . '  items.id as id,    '
                 . ' items.rewrite as rewrite, '
                 . ' items.type as category_type, '
                    . ' items.free_shipping as free_shipping, '
                . ' ssz.qty as max_qty, '
                . ' items.title as title '
                        
                . ' FROM cart  '
                . ' LEFT OUTER join products as items on cart.product_id = items.id '
                . ' LEFT OUTER join product_sizes as ssz on ssz.id = cart.size_id '        
       
                . ' WHERE  items.display>0   '.$filder_userid.'  group by cart.id  ORDER BY '.$sorting.' '.$order.' LIMIT '.$start.', '.$limit.''
                . ' ';
                
                  //  echo '--'.$qq;
                $q = $this->db->query($qq);
                $cart = $q->result_array();
                
                foreach($cart as $key => $item) {
                     $result[$key] = $item;
                     $result[$key]['image'] = $this->get_image($item['id']);
                     $result[$key]['acss'] = $this->get_accessories($item['cart_id']);
                }
            return $result;
        }
 
	 // Send email
	function get_image($id) {
            
            
           $this->db->where('product_id',  $id);   
           $this->db->order_by("priority", "desc"); 
           $q = $this->db->get('product_images');
           $product_images = $q->row_array();
           return $product_images['image'];

	}// Send email

     function get_accessories ($cart_id){
            
            
                   $result =array();
         
                    $this->db->where('cart_id',  $cart_id);  
                    $q = $this->db->get('cart_accessories');
                    $accessories = $q->result_array();
 
                    foreach ($accessories as $key => $value) {
                         $this->db->where('id',  $value['accessory_id']);  
                         $q = $this->db->get('accessories');
                         $accessory = $q->row_array();
                     
                             $result[$key]['title']= $accessory['title'];
                             $result[$key]['cost']= $accessory['cost'];
                             $result[$key]['weight']= $accessory['weight'];
                            
                    }
                    
                    
          
        
             
             return $result;
             
             
        }

        
        
        function show_accessories ($cart_id){
            
            
                   $result ='';
         
                    $this->db->where('cart_id',  $cart_id);  
                    $q = $this->db->get('cart_accessories');
                    $accessories = $q->result_array();
 
                    foreach ($accessories as $key => $value) {
                         $this->db->where('id',  $value['accessory_id']);  
                         $q = $this->db->get('accessories');
                         $accessory = $q->row_array();
                    
                             $result .='<p><b>'.$accessory['title'].':</b> +<span class="currency">$'.$accessory['cost'].'</span></p>';
                            
             
                    }
                    
                    
          
        
             
             return $result;
             
             
        }



     
    }
     
/* End of file cart_model.php */
/* Location: ./application/models/cart_model.php */