<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  </head>
  <body style="min-width: 430px;background: #e6e6e6; font: 13px/1.5  Helvetica, Arial, sans-serif">
  
  
 
 
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-spacing: 0px; border-collapse: collapse; padding-bottom: 20px; ">
  <tr>
    <td align="center" valign="top" bgcolor="#f2f2f2" style="background-color:#f2f2f2;"><br>
    <table width="650" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td align="center" valign="top" style="padding-left:15px; padding-right:15px; background-color:#ffffff; border: 1px solid #eeeded; margin-bottom: 20px; ">



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

                        <div style="float: right;margin-top: 30px;color: gray"><p align="right" style="text-align:right;line-height:12.0pt"><span style="font-size:9.0pt;font-family:&quot;Helvetica&quot;,sans-serif;color:#555555">Phone: (678) 387-5066<u></u><u></u></span></p>
                        </div>


                    </td>


                </tr>
            </table>

             <table width="650" border="0" cellspacing="0" cellpadding="0" >
     <tr>
         <td width="100%"  align="center" valign="top" style="border-top:  1px solid #d2d2d7;">&nbsp;</td>
     </tr>
 </table>

 <table><tr>
  <td>
            <p class="note" style="margin-top: 30px; color: #555; text-align: left; font: normal 12px/16px Helvetica, sans-serif;  padding-top: 0px;">
                <?=$l_password_help_text1?><br /><br />
                <b><?=$activation_code?></b><br /><br />
                <?php

                $l_password_help_text2 = str_replace('[email]', $user_email, $l_password_help_text2);
                $l_password_help_text2 = str_replace('[password]', $activation_code, $l_password_help_text2);

                ?>

            <?=$l_password_help_text2?>
            
            
            </p>








      <p class="note" style="  padding-top: 30px; color: #707070; text-align: left; font: normal 13px/16px Helvetica, sans-serif; border-top: 1px solid #efefef;  padding-top: 0px;"></p>



      <p class="note" style="margin-top: 0px; color: #707070; text-align: left; font: normal 13px/16px Helvetica, sans-serif;  padding-top: 0px;"> If you have any questions, please <a href="mailto:sales@legsandbases.com">email us</a> or contact our Customer Service department at (678) 387-5066.</p>



        </td>
 </tr></table>
 <table><tr><td>&nbsp;</td></tr></table>

 
 </td>
  </tr>
</table>

     </td>
   </tr>
 </table>
 </body>
</html>
