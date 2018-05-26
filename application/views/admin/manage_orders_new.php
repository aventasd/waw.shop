<?php
$gmtTimezone = new DateTimeZone('America/New_York');
$now = new DateTime($edit['added'], $gmtTimezone);
$orderDate =  $now->format('Y/m/d');

$order_id = $edit['id'];
?>


<style>
    .old-price {
        color: #d1d1d1;
        text-decoration: line-through;
        color: #7c7c7c;
    }
    .order-details-flex  {
        font-family: 'AvR', sans-serif;;
        font-size: 15px;
        background: #f9fafb;
    }
    .order-details-flex  table td {
        border: 1px solid #d9d9d9;
        padding: 7px 12px;
    }

    .order-details-flex {
        display: flex;
        justify-content: space-between;
    }
    .order-details-wrap {
        width: calc(100%);
        display: inline-block;
        vertical-align: top;
    }
    .order-details-wrap table {
        margin-top: 40px;
        width: 100%;
        border-spacing: 0;
        border-collapse: collapse;
    }
    .order-summary-wrap {
        float: right;
        background: #f4f4f4;
        background: #fafafa;
        width: 370px;
        display: inline-block;
        vertical-align: top;
        padding: 20px 40px;
    }
    .order-summary-wrap .row {
        display: flex;
        justify-content: space-between;
        font: 16px 'AvM', sans-serif;
        color: #707070;
        padding: 5px 0px;
    }
    .order-summary-wrap .row {
        display: flex;
        justify-content: space-between;
        font: 16px 'AvM', sans-serif;
        color: #707070;
        padding: 5px 0px;
    }
    .order-summary-wrap .total {
        border-top: 1px solid #d9d9d9;
        padding-top: 20px;
        font: 19px 'AvM', sans-serif;
    }
    .order-summary-wrap .row .price {
        font: 15px 'AvR', sans-serif;
    }
    .order-details-wrap table th {
        background: #fff;
        color: #767676;
        font: 15px 'AvM', sans-serif;
        border: none;
        padding: 10px 12px;
        text-transform: uppercase;
        text-align: right;
    }
    .order-details-wrap table th:first-of-type {
        text-align: left;
    }
    .order-details-wrap table .title-left {
        text-align: left;
    }
    .order-details-wrap table td {
        border-left: none;
        border-right: none;
    }
    .nor-col {
        width: 160px;   padding-right: 30px;
    }
    .j-account__order_title {
        max-width: 400px;
        color: #707070;
        font: 18px/23px 'AvM', sans-serif;
        margin-bottom: 20px;
    }
    .j-account__order_details {
        color: #9998a9;
    }
    .j-account__order_details b {
        color: #9998a9;
        font-family: 'AvM', sans-serif;
        font-size: 15px;
        font-weight: normal;
    }
    .price .new-price {
        text-align: rigth;
        color: #ba1606;
        font: 25px 'AvM', sans-serif;
        margin-left: 15px;
    }
    .order-details-wrap table .price .new-price {
        font: 20px 'AvM', sans-serif;
    }
    .order-details-wrap .j-account__order_total {
        text-align: right;
    }
    .greencolor {
        color: #24a866;
    }
    .j-account__history__form {
        font-size: 14px;
        background: #fafafa;
        padding: 40px;
        padding-bottom: 70px;
        margin-left: 25px;
    }
    .j-account__history__title {
        font-size: 24px;
    }
    .order-summary-wrap .row  .price {
        font: 15px 'AvR', sans-serif;
    }
    .order-summary-wrap .subtotal  .price {
        font: 16px 'AvM', sans-serif;
    }



    .order-details-flex {display: flex; justify-content: space-between; }
    .j-progress__circle__item {
        z-index: 1;
        width: 16px;
        height: 16px;
        border-radius: 100%;
        background: #E5E5E8;
        border: 3px solid #fff;
        box-shadow: 0 2px 5px rgba(0,0,0,.3);
    }
    .j-progress__circle__item.active {
        background: #21955b;
    }
    .j-progress__circle {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .j-progress__line__filled {
        top: 0;
        left: 0;
        height: 6px;
        position: absolute;
        border-radius: 10px;
        background: #24a866;;
    }
    .j-progress__line {
        display: flex;
        align-items: center;
        width: 100%;
        height: 6px;
        margin-top: 15px;
        background: #E5E5E8;
        position: relative;
    }
    .j-progress__title {
        color: #9998a9;
    }
    .j-progress {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 25px;
        max-width: 360px;
    }
    .j-account__history__title {
        font-size: 24px;
    }
    .j-account__history__form {
        font-size: 14px;
        background: #fafafa;
        padding: 40px;
        padding-bottom: 70px;
        margin-left: 25px;
    }
    .j-account__history__delivery__title {
        margin-bottom: 10px;
        font-family: 'AvM';

        background: #fff;
        color: #767676;
        font: 15px 'AvM', sans-serif;
        border: none;
        padding: 10px 12px;
        text-transform: uppercase;

    }
    .j-account__history__delivery__info { color: #767676;
        font: 15px 'AvM', sans-serif;
        border: none;
        padding: 10px 12px;}

    .j-account__history__delivery {
        line-height: 1.4;
        margin-top: 30px;
    }
    .cancel_order  {margin-top: 20px;}
    .j-account__history__row {
        margin-top: 40px;
    }
    .order-details-wrap table {   margin-top: 40px;}
    .order-details-wrap table th {
        background: #fff;
        color: #767676;
        font: 15px 'AvM', sans-serif;
        border: none;
        padding: 10px 12px;
        text-transform: uppercase;
        text-align: right;
    }

    .order-details-wrap table .price .new-price {

        font: 20px 'AvM', sans-serif;

    }


    .order-details-wrap table th:first-of-type{text-align: left; }
    .order-details-wrap table td { border-left: none; border-right: none; }
    .j-account__order_title {max-width: 400px; color: #707070;    font: 18px/23px  'AvM', sans-serif; margin-bottom: 20px; }
    .j-account__order_details {    color: #9998a9;}
    .order-details-wrap .j-account__order_total {text-align: right; }
    .j-account__order_qty{    color: #9998a9; text-align: right; }
    .j-signFae {    max-width: 750px;}
    .j-signFae .btn {margin-top: 30px;    display: inline-block;}

    .j-account__history__date {
        color: #696969;
        font: 21px 'AvM', sans-serif;
    }
    .j-account__history__code {
        color: #696969;
        font: 21px 'AvM', sans-serif;
    }
    .order-title-wrap {
        display: flex;
        justify-content: space-between;
               padding-bottom: 10px;
    }

    .order-addr-wrap {
        display: flex;
        justify-content: space-evenly;

        padding-bottom: 10px;
    }
</style>


      
      <div class="be-content">
          
          
 
          
        <div class="main-content container-fluid">

             <form method="post" enctype="multipart/form-data">

<!--Basic Elements-->
          <div class="row">
            <div class="col-md-12">
              <div class="card card-border-color card-border-color-primary">
                <div class="card-header card-header-divider"><?=$page['h2_title']?><span class="card-subtitle">
                    
                     <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb page-head-nav">
                          <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="/admin/accessories">Options</a></li> 
                          <li class="breadcrumb-item active">Editing Option</li>
                        </ol>
                      </nav>
                    </span>





                    <div class="tools dropdown goupper">
                        <a data-order_id="<?=$order_id?>" data-user_id="<?=$order['user_id']?>" href="/order/printing/<?=$order_id?>" target="_blank" class="print_order j-button  btn ">Print Order</a>
                        <input type="submit" name="save" value="Save Changes" class="btn btn-space btn-primary"  /> 
                        <button class="btn btn-space btn-secondary go-to-link" data-href="/admin/accessories">Cancel</button>                        
                  </div>
                    
                    
                </div>
                <div class="card-body">



                    <div class="order-title-wrap">
                        <div class="j-account__history__code">Order Number: LB-<span><?=$edit['id']?></span></div>
                        <div class="j-account__history__date">Order Date: <?=$orderDate?></div>

                    </div>
                
                      
                    <input type="hidden" maxlength="50" id="item_id" name="id" class="field disabled " style="width: 50px;" value="<?php echo $edit['id']; ?>" readonly="readonly" /> 
                    <input type="hidden" name="edit" value="yes">  
                      


                </div>
              </div>



                <div class="card card-border-color card-border-color-primary">
                    <div class="card-header card-header-divider">Order Billing & Shipping Info<span class="card-subtitle"></span>
                        <div class="tools dropdown goupper2">

                        </div>
                    </div><!-- card-header -->

                    <div class="card-body">

                        <!--Responsive table-->
                        <div class="col-sm-12">
                            <div class="card card-table">

                                <div class="card-body order-addr-wrap ">

                                    <div class="j-account__history__row">
                                        <div class="j-account__history__delivery">
                                            <div class="j-account__history__delivery__title">Billing Address</div>
                                            <div class="j-account__history__delivery__info">
                                                <?=$bill_adr[$order_id]?>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="j-account__history__row">
                                        <div class="j-account__history__delivery">
                                            <div class="j-account__history__delivery__title">Shipping Address</div>
                                            <div class="j-account__history__delivery__info">
                                                <?=$ship_adr[$order_id]?>
                                            </div>

                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>


                    </div><!-- card-body -->
                </div><!-- card -->



                <div class="card card-border-color card-border-color-primary">
                    <div class="card-header card-header-divider">Order Items<span class="card-subtitle"></span>
                        <div class="tools dropdown goupper2">

                        </div>
                    </div><!-- card-header -->

                    <div class="card-body">

                        <!--Responsive table-->
                        <div class="col-sm-12">
                            <div class="card card-table">

                                <div class="card-body">


                                    <?php
                                   // print_r($cart_items);
                                    ?>


                                    <div class="order-details-flex">

                                        <div class="order-details-wrap">

                                            <table>
                                                <thead>
                                                <th colspan="2">
                                                    ITEMS
                                                </th>

                                                <th class="title-left">
                                                    Price
                                                </th>
                                                <th class="">
                                                    QTY
                                                </th>
                                                <th>
                                                    Subtotal
                                                </th>
                                                </thead>


                                                <?php
                                                echo  $cart_items[$order_id];
                                                ?>



                                            </table>



                                            <div class="order-summary-wrap">
                                                <div class="row subtotal">
                                                    <div class="title">Subtotal </div><div class="price currency"><?=$cart_numbers[$order_id]['subtotal']?></div>
                                                </div>


                                                <?php
                                                if( $order['promo_sum']> 0) {
                                                    ?>
                                                    <div class="row">
                                                        <div class="title">Promo Discount: </div><div class="price currency">-<?=$order['promo_sum']?></div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>




                                                <!--<div class="row">
                                                    <div class="title">Promotional Savings </div><div class="price">-$61.30</div>
                                                 </div>-->

                                                <?php
                                                if($cart_numbers[$order['id']]['shipping'] < 1){
                                                    $shipping = 'FREE';
                                                } else {
                                                    $shipping = $cart_numbers[$order_id]['shipping'];
                                                }
                                                $order_total = $cart_numbers[$order_id]['subtotal'] + $cart_numbers[$order_id]['shipping'];
                                                ?>




                                                <div class="row">
                                                    <div class="title">Shipping: </div><div class="price currency"><?=$order['total_ship_cost']?></div>
                                                </div>




                                                <div class="row total">
                                                    <div class=" ">Total: </div><div class="price"><div class="new-price currency"><?=$order['total_sum']?></div></div>
                                                </div>


                                            </div>


                                        </div>



                                        <div class="j-account__history__form" style="display: none">

                                            <div class="j-account__history__title">Order Status</div>
                                            <div class="j-progress">

                                                <div class="j-progress__title active">Created</div>
                                                <div class="j-progress__title ">Processing</div>
                                                <div class="j-progress__title ">Shipped</div>
                                                <div class="j-progress__title ">Completed</div>
                                                <div class="j-progress__line">
                                                    <div class="j-progress__line__filled" style="width: 35%"></div>
                                                    <div class="j-progress__circle">
                                                        <div class="j-progress__circle__item "> <input type="radio" name="status1"  value="0"  <?php if ($edit['status'] == 0) {echo 'checked="checked"'; } ?> class="custom-control-input"></div>
                                                        <div class="j-progress__circle__item "> <input type="radio" name="status1"  value="1"  <?php if ($edit['status'] == 1) {echo 'checked="checked"'; } ?> class="custom-control-input"></div>
                                                        <div class="j-progress__circle__item "> <input type="radio" name="status1"  value="2"  <?php if ($edit['status'] == 2) {echo 'checked="checked"'; } ?> class="custom-control-input"></div>
                                                        <div class="j-progress__circle__item"> <input type="radio" name="status1"  value="3"  <?php if ($edit['status'] == 3) {echo 'checked="checked"'; } ?> class="custom-control-input"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="j-account__history__row">
                                                <div class="j-account__history__delivery">
                                                    <div class="j-account__history__delivery__title">Shipping Address</div>
                                                    <div class="j-account__history__delivery__info">

                                                    </div>

                                                </div>
                                            </div>
                                            <!--
                                                <div class="j-account__history__row">
                                                    <a data-order_id="285" data-user_id="1" href="#j-modal__message" class="j-button  btn ">Add Message</a><br><br><br>
                                                    <a data-order_id="285" data-user_id="1" href="#j-modal__cancel" class="j-button cancel_order btn gray">Cancel Order</a>
                                                </div>
                                                -->
                                        </div>



                                    </div>




                                </div>
                            </div>
                        </div>


                    </div><!-- card-body -->
                </div><!-- card -->




                <div class="card card-border-color card-border-color-primary">
                    <div class="card-header card-header-divider">Order Status Info<span class="card-subtitle"></span>
                        <div class="tools dropdown goupper2">

                        </div>
                    </div><!-- card-header -->

                    <div class="card-body">

                        <!--Responsive table-->
                        <div class="col-sm-12">
                            <div class="card card-table">

                                <div class="card-body">

                                        <div class="form-group row pt-1 pb-1">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Order Status:</label>
                                            <div class="col-12 col-sm-8 col-lg-6 form-check mt-2">
                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="status"  value="0"  <?php if ($edit['status'] == 0) {echo 'checked="checked"'; } ?> class="custom-control-input">
                                                   <span class="custom-control-label">Created</span>
                                                </label>

                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="status"  value="1"  <?php if ($edit['status'] == 1) {echo 'checked="checked"'; } ?> class="custom-control-input"><span class="custom-control-label">Processed</span>
                                                </label>

                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="status"  value="2"  <?php if ($edit['status'] == 2) {echo 'checked="checked"'; } ?> class="custom-control-input"><span class="custom-control-label">Shipped</span>
                                                </label>

                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="status"  value="3"  <?php if ($edit['status'] == 3) {echo 'checked="checked"'; } ?> class="custom-control-input"><span class="custom-control-label">Completed</span>
                                                </label>

                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="status"  value="4"  <?php if ($edit['status'] == 4) {echo 'checked="checked"'; } ?> class="custom-control-input"><span class="custom-control-label">Canceled</span>
                                                </label>


                                            </div>
                                        </div>



                                    <div class="form-group row pt-1 pb-1">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Order Payment Status:</label>
                                        <div class="col-12 col-sm-8 col-lg-6 form-check mt-2">

                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="payment_status"  value="0"  <?php if ($edit['payment_status'] == 0) {echo 'checked="checked"'; } ?> class="custom-control-input">
                                                <span class="custom-control-label">Payment Pending</span>
                                            </label>

                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="payment_status"  value="1"  <?php if ($edit['payment_status'] == 1) {echo 'checked="checked"'; } ?> class="custom-control-input"><span class="custom-control-label">Payment Received</span>
                                            </label>

                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="payment_status"  value="3"  <?php if ($edit['payment_status'] == 3) {echo 'checked="checked"'; } ?> class="custom-control-input"><span class="custom-control-label">Payment Failed</span>
                                            </label>

                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="payment_status"  value="2"  <?php if ($edit['payment_status'] == 2) {echo 'checked="checked"'; } ?> class="custom-control-input"><span class="custom-control-label">Payment Returned</span>
                                            </label>

                                        </div>
                                    </div>



                                    <div class="form-group row pt-1 pb-1">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Transaction Status:</label>
                                        <div class="col-12 col-sm-8 col-lg-6 form-check mt-2">

                                            <?php if($edit['errorCode'] !== '1') { ?>
                                            <p><?=$edit['errorMsg']?></p>
                                            <?php } else { ?>
                                                <p><?=$edit['errorName']?></p>
                                            <?php }   ?>
                                        </div>
                                    </div>




                                    <div class="form-group row">
                                        <label for="subtitle" class="col-12 col-sm-3 col-form-label text-sm-right">Tracking Code<span style="color: red;">*</span>:</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input  id="tracking_code" name="tracking_code" type="text" placeholder="Enter UPS Tracking Code" class="form-control" value="<?php if (!empty($edit['tracking_code'])) { echo $edit['tracking_code']; } ?>"  />
                                        </div>
                                    </div>




                                    <div class="form-group row pt-1 pb-1">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Send to User Email:</label>
                                        <div class="col-12 col-sm-8 col-lg-6 form-check mt-2">

                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="send_email"  value="0"  <?php if ($edit['send_email'] == 0) {echo 'checked="checked"'; } ?> class="custom-control-input">
                                                <span class="custom-control-label">No</span>
                                            </label>

                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="send_email"  value="1"  <?php if ($edit['send_email'] == 1) {echo 'checked="checked"'; } ?> class="custom-control-input"><span class="custom-control-label">Yes, please Send email, when button "Save" clicked</span>
                                            </label>


                                        </div>
                                    </div>






                                    <div class="form-group row">
                                        <label for="description" class="col-12 col-sm-3 col-form-label text-sm-right">Admin Comment<span style="color: red;">*</span>:</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <textarea  name="description"    id="description"   class="form-control summernote"><?php if (!empty($edit['description'])) { echo $edit['description']; } ?></textarea>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>


                    </div><!-- card-body -->
                </div><!-- card -->





                <div class="card card-border-color card-border-color-primary">
                    <div class="card-body">


                        <div class="row ">
                            <hr />
                        </div>




                        <div class="row ">
                            <div class="col-12 col-sm-3 col-form-label ">

                            </div>

                            <div class="col-12 col-sm-8 col-lg-6">
                                <p class="text-left">

                                    <input type="submit" name="save" value="Save Changes" class="btn btn-space btn-primary"  />
                                    <button class="btn btn-space btn-secondary go-to-link" data-href="/admin/products">Cancel</button>
                                </p>
                            </div>
                        </div>



                    </div><!-- card-body -->
                </div><!-- card -->



            </div>
          </div>
          <!--Input File-->
          
             </form>
          
          </div>
          </div>