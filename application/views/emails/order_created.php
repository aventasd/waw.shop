<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body style="min-width: 430px;background: #e6e6e6; font: 13px/1.5  Helvetica, Arial, sans-serif">

<style>
    /* Media query for displaying content in mobile email clients */
    @media only screen and (max-device-width: 480px) {
        .hide { max-height: none !important; font-size: 12px !important; display: block !important; }
    }

        /* CSS for hiding content in desktop/webmail clients */
    .hide { max-height: 0px; font-size: 0; display: none; }
</style>


<table width="100%" border="0" cellspacing="0" cellpadding="0"
       style="border-spacing: 0px; border-collapse: collapse; padding-bottom: 20px; ">
    <tr>
        <td align="center" valign="top" bgcolor="#f2f2f2" style="background-color:#f2f2f2;"><br>
            <table width="550" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center" valign="top"
                        style="padding-left:15px; padding-right:15px; background-color:#ffffff; border: 1px solid #eeeded; margin-bottom: 20px; ">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0"
                               style="border-spacing: 0px; border-collapse: collapse; padding-bottom: 00px; ">
                            <tr>
                                <td align="left" valign="top">
                                    <div id="logo" class="grid_5"
                                         style="float: left;margin-top: 23px;margin-bottom: 10px">

                                        <a href="<?php echo base_url(); ?>" title="<?= $company_name ?>"><img
                                                    src="<?php echo base_url(); ?>assets/css/i/logo-m.png"
                                                    alt="<?= $company_name ?>"/></a>
                                    </div>
                                </td>


                                <td align="right" valign="top">

                                    <div style="float: right;margin-top: 30px;color: gray"><p align="right" style="text-align:right;line-height:12.0pt"><span style="color:  #707070;font: normal 17px/14px Helvetica, sans-serif;  ">Order Confirmation<u></u><u></u></span></p>
                                    </div>


                                </td>


                            </tr>
                        </table>

                        <table width="550" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="100%" align="center" valign="top" style="border-top: 3px solid #c8c8c8;">
                                    &nbsp;
                                </td>
                            </tr>
                        </table>


                        <table style="border-collapse: collapse;border-spacing: 0;  width: 100%">
                            <tr>
                                <td>


                                    <?php  if(!$admin) {
                                         $note =  'Thank you for your order';
                                        if($order['status'] == 1){
                                            $note =  'your order has been processed';
                                        } else  if($order['status'] == 2){
                                            $note =  'Your Order has been shipped';
                                        } else  if($order['status'] == 3){
                                            $note =  'Your Order has been completed';
                                        } else if($order['status'] == 4){
                                            $note =  'Your Order has been canceled';
                                        }

                                        ?>
                                        <p class="note"
                                           style="margin-top: 0px; margin-bottom: 5px; color:  #24a866; text-align: left; font: bold 18px Helvetica, sans-serif; text-transform: uppercase; text-align: center; padding-top: 0px;"><?=$note?>
                                            </p>

                                    <?php } ?>


                                    <?php
                                    $gmtTimezone = new DateTimeZone('America/New_York');
                                    $now = new DateTime($order['added'], $gmtTimezone);
                                    $orderDate = $now->format('m/d/Y');

                                    $order_id = $order['id'];
                                    ?>


                                    <h3 style="   display: inline-block; color:  #707070;font: normal 17px/14px Helvetica, sans-serif; text-align: left;
                border-bottom: 1px solid #efefef;padding-bottom: 7px;margin-top: 25px; ">ORDER DETAILS  </h3>

                                    <?php
                                    $tracking_code =  '';
                                    if(strlen($order['tracking_code']) > 1){
                                        $tracking_code =  '<br>UPS Tracking number: <a target="_blank" href="https://www.ups.com/WebTracking/track?trackNums='.$order['tracking_code'].'&track.x=Track">'.$order['tracking_code'].'</a>';
                                    }

                                    ?>
                                    <p style="display: block;  width: 150px; color: #707070;  font: normal 13px/16px Helvetica, sans-serif; ">#LB-<?= $order_id ?> <?= $tracking_code ?></p>

                                    <span  style=" color: #707070;  font: normal 13px/16px Helvetica, sans-serif;  text-align: left;  ">Order Date: <?= $orderDate ?></span>




                                    <table style="border-collapse: collapse;border-spacing: 0; margin-top: 40px; width: 100%">

                                        <thead>
                                        <tr>
                                            <th style="  font-weight: bold;vertical-align: middle;text-align: center; display: table-cell; background: #fff;  color: #707070;border-bottom: 1px solid #c8c8c8;padding: 7px 20px; font-family: Helvetica, Arial, sans-serif;font-size: 12px">
                                                ITEMS
                                            </th>

                                            <th style="font-weight: bold;vertical-align: middle;text-align: center;
                          display: table-cell; background: #fff;  color: #707070;border-bottom: 1px solid #c8c8c8;padding: 7px 20px; font-family: Helvetica, Arial, sans-serif;font-size: 12px">

                                            </th>


                                            <th style="font-weight: bold;vertical-align: middle;text-align: center;
                           display: table-cell; background: #fff;  color: #707070;border-bottom: 1px solid #c8c8c8;
                           padding: 7px 1px; font-family: Helvetica, Arial, sans-serif;font-size: 12px">PRICE
                                            </th>

                                            <th style="font-weight: bold;vertical-align: middle;text-align: center;
                           display: table-cell; background: #fff;  color: #707070;border-bottom: 1px solid #c8c8c8;
                           padding: 7px 1px; font-family: Helvetica, Arial, sans-serif;font-size: 12px">QTY</th>

                                            <th class="price" style="font-weight: bold;vertical-align: middle;text-align: center;
                          display: table-cell; background: #fff;  color: #707070;border-bottom: 1px solid #c8c8c8;
                          padding: 7px 20px; font-family: Helvetica, Arial, sans-serif;font-size: 12px">SUBTOTAL
                                            </th>
                                        </tr>

                                        </thead>


                                        <?= $cart_items ?>

                                    </table>

                                    <p class="note"
                                       style="color: #555; text-align: left; font: normal 11px/16px Helvetica, sans-serif">
                                        &nbsp;</p>

                                    <table class="nothide" style="border-collapse: collapse;border-spacing: 0;  width: 100%">

                                        <tr>
                                            <td style=" width: 200px; font-weight: 400;  vertical-align: top;text-align: left;display: table-cell; padding: 10px 8px;color: #555350;font-size: 14px;  background: white; border-bottom: none"> </td>
                                            <td style="font-weight: 400; vertical-align: top;text-align: left;display: table-cell; padding: 10px 8px;color: #707070;font-size: 13px;  background: white; border-bottom: 1px solid #e5e5e5">
                                                Order Subtotal:
                                            </td>
                                            <td   style="font-weight: 400;vertical-align: top;text-align: right;display: table-cell; padding: 10px 8px;color: #707070;font-size: 15px; background: white; border-bottom: 1px solid #e5e5e5">
                                                $<?= number_format(($order['total_sum']-$order['total_ship_cost']), 2, '.', ',') ?>
                                            </td>

                                        </tr>


                                        <?php
                                        if( $order['promo_sum']> 0) {
                                            ?>


                                        <tr>
                                            <td style=" width: 350px; font-weight: 400;  vertical-align: top;text-align: left;display: table-cell; padding: 10px 8px;color: #555350;font-size: 14px;  background: white; border-bottom: none"> </td>
                                            <td style="font-weight: 400; vertical-align: top;text-align: left;display: table-cell; padding: 10px 8px;color: #707070;font-size: 14px;  background: white; border-bottom: 1px solid #e5e5e5">
                                                Promo Discount:
                                            </td>
                                            <td   style="font-weight: 400;vertical-align: top;text-align: right;display: table-cell; padding: 10px 8px; color: #707070;font-size: 14px; background: white; border-bottom: 1px solid #e5e5e5">
                                                $<?= number_format($order['promo_sum'], 2, '.', ',') ?>
                                            </td>

                                        </tr>

                                            <?php
                                        }
                                        ?>



                                        <tr>
                                            <td style=" width: 350px; font-weight: 400;  vertical-align: top;text-align: left;display: table-cell; padding: 10px 8px;color: #555350;font-size: 14px;  background: white; border-bottom: none"> </td>
                                            <td style="font-weight: 400; vertical-align: top;text-align: left;display: table-cell; padding: 10px 8px;color: #707070;font-size: 14px;  background: white; border-bottom: 1px solid #e5e5e5">
                                                Shipping:
                                            </td>
                                            <td   style="font-weight: 400;vertical-align: top;text-align: right;display: table-cell; padding: 10px 8px; color: #707070;font-size: 14px; background: white; border-bottom: 1px solid #e5e5e5">
                                                $<?= number_format($order['total_ship_cost'], 2, '.', ',') ?>
                                            </td>

                                        </tr>



                                        <tr>
                                            <td style="    font-weight: 400; vertical-align: top;text-align: left;display: table-cell; padding: 10px 8px;color: #707070;font-size: 14px;  background: white;" >  </td>
                                            <td   style="font-weight: 600;vertical-align: top;text-align: left;display: table-cell;padding: 10px 8px;color: #707070; font-size: 18px; background: white;  border-bottom: none">
                                                Order Total:
                                            </td>
                                            <td style="font-weight: 600;vertical-align: top;text-align: right; display: table-cell;padding: 10px 8px;color: #24a866;font-size: 24px; background: white;   ">
                                                $<?= number_format($order['total_sum'], 2, '.', ',') ?>
                                            </td>
                                        </tr>

                                    </table>





                                    <table style="border-collapse: collapse;border-spacing: 0;  width: 100% ; margin-top: -20px;">

                                        <tr>
                                            <td style="">
                                                <p class="note"
                                                   style="margin-top: 30px; color: #707070; text-align: left; font: bold 13px/16px Helvetica, sans-serif;  padding-top: 0px;">
                                                    Shipping Address</p>
                                                <p class="note"
                                                   style="margin-top: 0px; color: #707070; text-align: left; font: normal 13px/16px Helvetica, sans-serif;  padding-top: 0px;"><?= $ship_adr ?></p>
                                            </td>

                                            <td style="">

                                                <p class="note"
                                                   style="margin-top: 30px; color: #707070; text-align: left; font: bold 13px/16px Helvetica, sans-serif;  padding-top: 0px;">
                                                    Billing Address</p>
                                                <p class="note"
                                                   style="margin-top: 0px; color: #707070; text-align: left; font: normal 13px/16px Helvetica, sans-serif;  padding-top: 0px;"><?= $bill_adr ?></p>
                                            </td>



                                        </tr>
                                    </table>






                                    <p class="note" style="border-top: 1px solid #e5e5e5; margin-top: 30px; color: #707070; text-align: left; font: normal 13px/16px Helvetica, sans-serif;  padding-top: 0px;"></p>






                                    <?php  if(!$admin) {  ?>
                                        <p class="note" style="  padding-top: 30px; color: #707070; text-align: left; font: normal 13px/16px Helvetica, sans-serif;  padding-top: 0px;">You can always find out the current status of your order by going to "<a  style="color: #24a866; text-align: left; font: normal 13px/16px Helvetica, sans-serif;"  href="https://www.legsandbases.com/my-account/my-orders">My Orders</a>"</p>
                                       <p class="note" style="margin-top: 0px; color: #707070; text-align: left; font: normal 13px/16px Helvetica, sans-serif;  padding-top: 0px;"> Please DO NOT REPLY to this message. If you have any questions, please contact our Customer Service department at (678) 387-5066.</p>
                                    <?php } ?>


                                </td>
                            </tr>

                        </table>


                        <table>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                        </table>


                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>
</body>
</html>
