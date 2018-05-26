<?php

class Blog_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->pars = $this->uri->segment_array();
        $this->data = '';
        $this->load->helper('text');

    }


    // Send email
    function create($item)
    {

        $url = '/blog/' . $item['rewrite'] . '-' . $item['id'];
        $image_link = '/assets/img/item.jpg';

        $this->db->where('blog_id', $item['id']);
        $this->db->order_by("priority", "desc");
        $q = $this->db->get('blog_images');
        $blog_images = $q->row_array();


        if (count($blog_images)) {
            $image_link = '/external/product/' . $item['id'] . '/155x230/' . $blog_images['image'];
        }

        $added = '';
        $user_id = $this->session->userdata('user_id');
        if ($user_id > 0) {
            $this->db->where('product_id', $item['id']);
            $this->db->where('user_id', $user_id);
            $q = $this->db->get('favorites');
            $favorites = $q->row_array();
            if (count($favorites)) {
                $added = 'added';
            }

        }


        $this->db->where('product_id', $item['id']);
        $this->db->order_by("cost", "asc");
        $q = $this->db->get('product_sizes');
        $product_sizes = $q->row_array();



        $result = '';
        $result .= '<div class="p-b-63">';

        $result .= '<a href="'.$url.'" class="hov-img0 how-pos5-parent">';
        $result .= '             <img src="/assets/images/blog-05.jpg" alt="IMG-BLOG">';
        $result .= '          <div class="flex-col-c-m size-123 bg9 how-pos5">';
        $result .= '					<span class="ltext-107 cl2 txt-center">18</span>';
        $result .= '              <span class="stext-109 cl3 txt-center">Jan 2018</span>';
        $result .= '         </div>';
        $result .= '     </a>';

        $result .= '<div class="p-t-32">';
            $result .= '<h4 class="p-b-15">';
            $result .= '<a href="blog-detail.html" class="ltext-108 cl2 hov-cl1 trans-04">The Great Big List of Men’s Gifts for the Holidays</a>';
            $result .= '</h4>';
        $result .= '</div>';
        $result .= ' <p class="stext-117 cl6">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget dictum tortor. Donec dictum vitae sapien eu varius</p>';

        $result .= '<div class="flex-w flex-sb-m p-t-18">';

        $result .= '<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">';
        $result .= '<span><span class="cl4">By</span> Admin <span class="cl12 m-l-4 m-r-6">|</span></span>';
        $result .= '<span>StreetStyle, Fashion, Couple<span class="cl12 m-l-4 m-r-6">|</span></span>';
        $result .= '<span>8 Comments</span>';
         $result .= ' </span>';


        $result .= ' <a href="blog-detail.html" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">Continue Reading<i class="fa fa-long-arrow-right m-l-9"></i></a>';
        $result .= '  </div>';

        $result .= '  </div>';


        return $result;

    }// Send email


}

/* End of file cart_model.php */
/* Location: ./application/models/cart_model.php */