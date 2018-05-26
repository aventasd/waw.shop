<?php

class Cart_item_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->pars = $this->uri->segment_array();
        $this->data = '';
        $this->load->helper('text');

    }


    // Send email
    //$order_products_id
    function create($item, $email) {

        //$this->db->where('id', $order_products_id);
       // $q = $this->db->get('order_products');
      //  $item = $q->row_array();
        if($email){
            $style_nor_cor = 'margin: 0 auto; text-align: center; padding: 15px 2px; font-family: Helvetica, sans-serif;';
            $style_nor_cor_img = 'max-width: 100px; width: 100px; max-height: 110px; height: 110px; ';
            $style_account__order_title = 'color: #707070; font-size: 13px; margin-bottom: 10px; font-family: Helvetica, sans-serif; ';
            $style_account__order_details = 'color: #9998a9; color: #707070; font-size: 13px; font-family: Helvetica, sans-serif;';
            $style_account__order_details_greencolor = $style_account__order_details.' color: #24a866; font-family: Helvetica, sans-serif;';
            $style_account__order_total = 'text-align: right;  color: #24a866; font-size: 18px font-family: Helvetica, sans-serif;';
            $style_td= 'border-bottom: 1px solid #d9d9d9;  padding: 15px 12px; font-family: Helvetica, sans-serif;';
            $style_account__order_qty = 'color: #707070; font-size: 13px; text-align: right; font-family: Helvetica, sans-serif; ';
        } else {
            $style_nor_cor; $style_account__order_title; $style_account__order_details; $style_account__order_details_greencolor; $style_account__order_total;$style_td;$style_account__order_qty;
        }

        $image_link = '/assets/img/item.jpg';

        $this->db->where('product_id', $item['product_id']);
        $this->db->order_by("priority", "desc");
        $q = $this->db->get('product_images');
        $product_images = $q->row_array();


        if (count($product_images)) {
            $image_link = base_url().'/external/product/' . $item['product_id'] . '/155x230/' . $product_images['image'];
        }

        $subtotal = ($item['oldprice'] - $item['oldprice'] * $item['discount'] / 100) * $item['qty'];

        $result = '';


        $result .= '<tr style="border-collapse: collapse;border-spacing: 5px;  width: 100%">';
        $result .= '<td class="nor-col" style="'.$style_td.' '.$style_nor_cor.'">';
        $result .= '<img style="'.$style_nor_cor_img.'"src="' . $image_link . '" alt="' . $item['title'] . '" />';
        $result .= '</td>';
        $result .= '<td style="'.$style_td.'">';
        $result .= '                            <div class="j-account__order_title" style="'.$style_account__order_title.'">' . $item['title'] . '</div>';
        $result .= '                           <div class="j-account__order_details" style="'.$style_account__order_details.'"><b>Part Number:</b> ' . $item['part_number'] . '</div>';
        $result .= '                           <div class="j-account__order_details" style="'.$style_account__order_details.'"><b>Size:</b> ' . $item['size'] . '</div>';
        $result .= '                           <div class="j-account__order_details" style="'.$style_account__order_details.'"><b>Color:</b> ' . $item['color'] . '</div>';

        if ($item['ship_title'] != 'undefined') {
            $result .= '                            <br /><div class="j-account__order_details" style="'.$style_account__order_details.'"><b>Shipping Method:</b> ' . $item['ship_title'] . '</div>';
        } else {
            $result .= '                           <br /><div class="j-account__order_details" style="'.$style_account__order_details.'"><b>Shipping Method:</b> UPS Ground </div>';
        }

        $result .= '                      </td>';
        $result .= '<td style="'.$style_td.'" >';
        $result .= '                           <div class="j-account__order_details greencolor" style="'.$style_account__order_details_greencolor.'"><span class="currency">$' . number_format($item['cost'], 2, '.', ',') . '</span></div>';
        $result .= '                           <div class="j-account__order_details" style="'.$style_account__order_details.'">';
       // $result .= '                               <div class="old-price currency">$' . number_format($item['oldprice'], 2, '.', ',') . '</div>';
       // $result .= '                              <div class="discount"><sup class="gray"></sup>' . $item['discount'] . '% OFF</div>';
        $result .= '                          </div>';
        $result .= '                      </td>';

        $result .= '                      <td style="'.$style_td.'">';
      //  $result .= '                          <div class="j-account__order_total price"  style="'.$style_account__order_total.'" ><div  style="'.$style_account__order_total.'" class="new-price currency">$' . number_format($subtotal, 2, '.', ',') . '</div></div>';
        $result .= '                         <div class="j-account__order_qty"  style="'.$style_account__order_qty.'">' . $item['qty'] . '</div>';
        $result .= '                      </td>';



        $result .= '                      <td style="'.$style_td.'">';
        $result .= '                          <div class="j-account__order_total price"  style="'.$style_account__order_total.'" ><div  style="'.$style_account__order_total.'" class="new-price currency">$' . number_format($subtotal, 2, '.', ',') . '</div></div>';
       // $result .= '                         <div class="j-account__order_qty"  style="'.$style_account__order_qty.'">Quantity: ' . $item['qty'] . '</div>';
        $result .= '                      </td>';
        $result .= '                  </tr>';

        /*


                    $result .='<div class="item_cust">  ';
                    $result .='<div class="item_cust-wrap">  ';
                    $result .='<div class="cust_wrap">  ';

                    $result .='     <div class="image_cust"><a href="'.$url.'"><img src="'.$image_link.'" alt="no image" class="image_cust_'.$item['id'].'" /></a></div>';
                    $result .='      <div class="text-wrap_cust">';
                    $result .='         <div class="title title_cust"><a href="'.$url.'">'.$item['title'].'</a></div>';
                    $result .='         <div class="price_cust"> ';
                    $result .='              <span class="old-price_cust currency">'.$item['oldprice'].'</span> ';
                    $result .='              <div class="new-price_cust currency">'.$item['cost'].'</div>';
                    $result .='           </div>';

                    $result .='         <div class="rating-wrapper">';
                    $result .='         <div class="rating" data-rating="3"></div>';
                    $result .='         <div class="amount_cust">246 reviews</div>';
                    $result .='         </div>';
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
                    $result .='  </div>';
                     */
        return $result;

    }// Send email


}

/* End of file cart_model.php */
/* Location: ./application/models/cart_model.php */