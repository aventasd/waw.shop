<?php
class Product_model extends CI_Model {
    
 
function __construct()
    {
        parent::__construct();
		$this->pars = $this->uri->segment_array();
		$this->data = '';
		$this->load->helper('text');		 

    }
	
 
	 // Send email
	function create($item, $slick=0) {
            
           $url = '/'.$item['rewrite'].'/p-'.$item['id'];
           $image_link = '/assets/img/item.jpg';
           
           $this->db->where('product_id',  $item['id']);   
           $this->db->order_by("priority", "desc"); 
           $q = $this->db->get('product_images');
           $product_images = $q->row_array();


           
           if(count($product_images)) {
            $image_link = '/external/product/'.$item['id'].'/155x230/'.$product_images['image'];
           }

            $added = '';
            $user_id = $this->session->userdata('user_id');
            if($user_id > 0) {
                $this->db->where('product_id', $item['id']);
                $this->db->where('user_id', $user_id);
                $q = $this->db->get('favorites');
                $favorites = $q->row_array();
                if (count($favorites)) {
                    $added = 'added';
                }

            }


            $this->db->where('product_id',  $item['id']);
            $this->db->order_by("cost", "asc");
            $q = $this->db->get('product_sizes');
            $product_sizes = $q->row_array();

/*


                        <!-- Block2 -->




















                     */
            $result ='';

            if($slick) {
                $result .='<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">';
            } else {
                $result .='<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">';
            }



                $result .='<div class="block2">';


                    $result .='<div class="block2-pic hov-img0">';
                    $result .='<a href="'.$url.'" class="btn-img">';
                    $result .='<img src="/assets/images/product-02.jpg" alt="IMG-PRODUCT">';
                    $result .='</a>';
                    $result .='<a href="'.$url.'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1"> Quick View</a>';
                    $result .='  </div>';


                    $result .='<div class="block2-txt flex-w flex-t p-t-14">';

                        $result .='<div class="block2-txt-child1 flex-col-l ">';
                            $result .='<a href="'.$url.'" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">'.$item['title'].'</a>';
                            $result .='<span class="stext-105 cl3 currency">'.$product_sizes['cost'].'</span>';
                        $result .='  </div>';

                        $result .='<div class="block2-txt-child2 flex-r p-t-3">';
                            $result .='<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">';
                                $result .='<img class="icon-heart1 dis-block trans-04" src="/assets/images/icons/icon-heart-01.png" alt="ICON">';
                                $result .='<img class="icon-heart2 dis-block trans-04 ab-t-l" src="/assets/images/icons/icon-heart-02.png" alt="ICON">';
                            $result .='</a>';
                        $result .='  </div>';


                    $result .='  </div>';


                $result .='  </div>';


            $result .='  </div>';

            /*
            $result .='<div class="item_cust">  ';
            $result .='<div class="item_cust-wrap">  ';
            $result .='<div class="cust_wrap">  ';

            $result .='     <div class="image_cust"><a href="'.$url.'"><img src="'.$image_link.'" alt="no image" class="image_cust_'.$item['id'].'" /></a></div>';
            $result .='      <div class="text-wrap_cust">';                 
            $result .='         <div class="title title_cust"><a href="'.$url.'">'.$item['title'].'</a></div>';
            if($item['free_shipping'] == 1) {
                $result .= '         <div class="shipping">FREE Standard Shipping</div>';
            } else {
                $result .= '         <div class="shipping">FREE Shipping on 100+ Tops</div>';
            }

            $result .='         <div class="price_cust"> ';
            $result .='              <div class="new-price_cust currency">'.$product_sizes['cost'].'</div>';
            $result .='              <span class="old-price_cust currency">'.$product_sizes['oldprice'].'</span> ';
            $result .='           </div>';

          //  $result .='         <div class="rating-wrapper">';
          //  $result .='         <div class="rating" data-rating="3"></div>';
           // $result .='         <div class="amount_cust">246 reviews</div>';
          //  $result .='         </div>';

            $result .='    </div>       ';   
            $result .='  </div>';

            $result .='    <div class="btn_cust">'; 
            $result .='        <a class="btn" href="'.$url.'">BUY NOW</a>'; 
            $result .='     </div>'; 

            $result .='   <div class="action-love_cust '.$added.'">';
            $result .='       <div class="action-icon-wrapper action-icon-wrapper_cust">'; 
            $result .='          <a title="Add to Favorites" class="favorite" data-product_id="'.$item['id'].'" href="#" tabindex="0"><i class="fa fa-heart"></i></a>'; 
            $result .='      </div>'; 

          //  $result .='     <div class="action-icon-wrapper action-icon-wrapper_cust">';
         //   $result .='        <a class="compare" href="#" tabindex="0"><img src="/assets/img/compare.svg" alt="Compare"  class="loading" data-was-processed="true"></a>';
         //   $result .='    </div>';
            $result .=' </div>';

            $result .='  </div>';
            $result .='  </div>';*/
             
             return $result;

	}// Send email






     
    }
     
/* End of file cart_model.php */
/* Location: ./application/models/cart_model.php */