      
      
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
                          <li class="breadcrumb-item"><a href="/admin/products">Products</a></li> 
                          <li class="breadcrumb-item active">Editing "<?=$page['h2_title']?>"</li>
                        </ol>
                      </nav>
                    </span>
                
                <div class="tools dropdown goupper">
                    <input type="submit" name="save" value="Save Changes" class="btn btn-space btn-primary"  /> 
                          <button class="btn btn-space btn-secondary go-to-link" data-href="/admin/products">Cancel</button>
                        
                  </div>
                            
                
                </div>
                <div class="card-body">
                    
             
                      
                    <input type="hidden" maxlength="50" id="item_id" name="id" class="field disabled " style="width: 50px;" value="<?php echo $edit['id']; ?>" readonly="readonly" /> 
                    <input type="hidden" name="edit" value="yes">  
                      
                    
                      <div class="form-group row pt-1 pb-1">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right">Product Category Type<span style="color: red;">*</span>:</label>
                      <div class="col-12 col-sm-8 col-lg-6 form-check mt-2 setproducttype">
                        <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="type"  value="0"  <?php if ($edit['type'] == 0) {echo 'checked="checked"'; } ?> class="custom-control-input "><span class="custom-control-label">Bases</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="type" value="1" <?php if ($edit['type'] == 1) {echo 'checked="checked"';} ?> class="custom-control-input  "><span class="custom-control-label">Tops</span>
                        </label>
                          
                          
                        
                      <label class="col-12 col-sm-3 col-form-label text-sm-right">Sale (Clearance):</label>
                      
                      <div class="  col-sm-4  col-form-label " style="display: inline-block;">
                           <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="sale"  value="1"  <?php if ($edit['sale'] == 1) {echo 'checked="checked"'; } ?> class="custom-control-input"><span class="custom-control-label">Yes</span>
                        </label>
                         <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="sale" value="0" <?php if ($edit['sale'] == 0) {echo 'checked="checked"';} ?> class="custom-control-input"><span class="custom-control-label">No</span>
                        </label>
                      </div>










                      </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Free Ground Shipping:</label>
                        <div class="  col-sm-4  col-form-label " style="display: inline-block;">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="free_shipping"  value="1"  <?php if ($edit['free_shipping'] == 1) {echo 'checked="checked"'; } ?> class="custom-control-input"><span class="custom-control-label">Yes</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="free_shipping" value="0" <?php if ($edit['free_shipping'] == 0) {echo 'checked="checked"';} ?> class="custom-control-input"><span class="custom-control-label">No</span>
                            </label>
                        </div>
                    </div>


                    
                
                      <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right">Product Category</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                          
                            <!--  <optgroup label="Alaskan/Hawaiian Time Zone">
                            <option value="AK">Alaska</option>
                            <option value="HI">Hawaii</option>
                          </optgroup>-->
                            
                            
                        <select id="category_id" class="select2 form-control-sm" name="category_id" >
                            <?php
                          //  print_r($categories);
                            foreach($categories as $cat) {
                            ?>
                                                
                            <option value="<?=$cat['id']?>"  <?php          if($cat['id'] == $edit['category_id'] )  { echo "selected='selected'";}                    ?> ><?=$cat['title']?></option>
                              <?php
                                }
                            ?>
                        </select>
                      </div>
                    </div>
                    
                    
                    <div class="form-group row">
                      <label for="title" class="col-12 col-sm-3 col-form-label text-sm-right">Product Title<span style="color: red;">*</span>:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input  id="title" name="title" type="text" placeholder="Enter Product Title" class="form-control form-control-sm" value="<?php if (!empty($edit['title'])) { echo $edit['title']; } ?>" required />
                       <span style="color: gray; font-size: 12px; ">  The title that you see in category list</span>
                      </div>
                    </div>
                    
                      
                    <div class="form-group row">
                      <label for="h1_title" class="col-12 col-sm-3 col-form-label text-sm-right">Long Product Title:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input  id="h1_title" name="h1_title" rewritetype="text" placeholder="Enter H1 Page Title" class="form-control form-control-sm" value="<?php if (!empty($edit['h1_title'])) { echo $edit['h1_title']; } ?>"  />
                        <span style="color: gray; font-size: 12px; ">We will use Category Title if there is no H1 Title.</span>
                      </div>
                    </div>    
                    
                    
                    
                    
                 
                    <div class="form-group row">
                      <label for="rewrite" class="col-12 col-sm-3 col-form-label text-sm-right">URL<span style="color: red;">*</span>:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input id="rewrite" name="rewrite" type="text" placeholder="Enter URL Link" class="form-control form-control-sm" value="<?php if (!empty($edit['rewrite'])) { echo $edit['rewrite']; } ?>" required />
                        <span style="color: gray; font-size: 12px; ">Only lowecase, latin characters, no special symbols or spaces. Allowed only - and _</span><br><br>
                        <a href="#" id="createUrl">Create URL link automaticly</a>
                      </div>
                    </div>
                    
                    
                    
    
                    
          
                            
                   

      
            <!--
                     <div class="form-group row">
                      <label for="file-2" class="col-12 col-sm-3 col-form-label text-sm-right">Image:<p style="color: gray; font-size: 10px;">jpg, jpeg, png & gif<br>max - 5mb.</p></label>
                      <div class="col-12 col-sm-6">
                        <input id="file-2" type="file" name="fileToUpload1" id="fileToUpload1" class="inputfile">
                        <label for="file-2" class="btn-primary"> <i class="mdi mdi-upload"></i><span>Browse files...</span></label>
                        <?php if (strlen($edit['photo'])) { ?><img src="/external/category/<?=$edit['id']?>/220x160/<?=$edit['photo']?>" alt="" style="  margin-bottom: 20px;"/><?php } ?>
                      </div>
                    </div>
        -->
         
        
         
                
           
         
        

        
        
        
                    <div class="form-group row">
                      <label for="priority" class="col-12 col-sm-3 col-form-label text-sm-right">Sort:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input style="width: 100px;" id="priority"  type="number" min="0" max="10000000" name="priority"  placeholder="Set Priority" class="form-control  form-control-sm" value="<?php if (!empty($edit['priority'])) { echo $edit['priority']; } ?>"  />
                             
                        <span style="color: gray; font-size: 12px; ">Only number. We sort products ascendingly. The Product with the biggest number will be the last.</span>
                      </div>
                    </div>  
                
                
           
 
        
        
                 
                    
                    
                 
                </div>
              </div>
                
                
                
                
                 <div class="card card-border-color card-border-color-primary">
                     <div class="card-header card-header-divider">Price & Size Options<span class="card-subtitle"></span>
                          <div class="tools dropdown goupper2">
                     <input id="addNewSize" type="button" class="btn btn-primary" value="Add New Size" >
                  </div>
                       </div><!-- card-header -->
                       
                       <div class="card-body">
                           
                                                   <!--Responsive table-->
            <div class="col-sm-12">
              <div class="card card-table">
           
                <div class="card-body">
                  <div class="table-responsive noSwipe">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th style="width:5%;">
                            <label class="custom-control custom-control-sm custom-checkbox">
                              <input type="checkbox" class="custom-control-input"><span class="custom-control-label"></span>
                            </label>
                          </th>
                          <th style="width:12%;">Part Number<span style="color: red;">*</span></th>
                          <th style="width:7%;">List Price</th>
                          <th style="width:5%;">Discount</th>
                          <th style="width:10%;">Net Price<span style="color: red;">*</span></th>
                          <th style="width:7%;">QTY<span style="color: red;">*</span></th>
                          <th style="width:10%;">Size<span style="color: red;">*</span></th>
                          <th style="width:11%;">Recom. Top Depth/Top Thickness</th>
                          <th style="width:10%;">Column DIA</th>
                           <th style="width:10%;">Weight</th>
                           <th style="width:10%;">Package(s)</th>
                          <th style="width:10%;"></th>
                        </tr>
                      </thead>
                      <tbody id="sizes">
                          <?php 
                                foreach ($product_sizes as $key => $value) {
                          ?>
                        <tr id="size-row-<?=$value['id']?>">
                          <td>
                            <label class="custom-control custom-control-sm custom-checkbox">
                              <input type="checkbox" class="custom-control-input"><span class="custom-control-label"></span>
                            </label>
                          </td>
                          <td class="cell-detail"> 
                              <input data-index="<?=$value['id']?>" name="part_number" type="text" placeholder="Enter Product Part #" class="form-control  form-control-sm ajax-editing" value="<?php if (!empty($value['part_number'])) { echo $value['part_number']; } ?>" required />
                           </td>
                          <td class="cell-detail">
                              <input  data-index="<?=$value['id']?>" type="text"   name="oldprice"  placeholder="Set Old Price" class="form-control  form-control-sm ajax-editing" value="<?php if (!empty($value['oldprice'])) { echo $value['oldprice']; } ?>"  />
                             </td>
                         
                          <td class="cell-detail">
                              <input data-index="<?=$value['id']?>"  type="number" min="0" max="100" name="discount"  placeholder="Set Discount, %" class="form-control  form-control-sm ajax-editing" value="<?php if (!empty($value['discount'])) { echo $value['discount']; } ?>"  />
                              
                          </td>
                          <td class="cell-detail"> 
                              <input  data-index="<?=$value['id']?>"  type="text"   name="cost"  placeholder="Set Cost" class="form-control  form-control-sm ajax-editing" value="<?php if (!empty($value['cost'])) { echo $value['cost']; } ?>"  />
                             
                          </td>
                          <td class="cell-detail">
                              <input  data-index="<?=$value['id']?>"  type="number" min="0" max="10000000" name="qty"  placeholder="Set Quantity Available" class="form-control  form-control-sm ajax-editing" value="<?php if (!empty($value['qty'])) { echo $value['qty']; } ?>"  />
                           
                          </td>
                          
                          <td class="cell-detail"> 
                              <input  data-index="<?=$value['id']?>"  name="base_spread" type="text" placeholder="Enter Base Spread" class="form-control  form-control-sm ajax-editing" value="<?php if (!empty($value['base_spread'])) { echo $value['base_spread']; } ?>"  />
                     
                          </td>
                          <td class="cell-detail"> 
                              <input  data-index="<?=$value['id']?>" name="max_depth" type="text" placeholder="Enter Max Depth" class="form-control  form-control-sm ajax-editing" value="<?php if (!empty($value['max_depth'])) { echo $value['max_depth']; } ?>"  />
                        
                          </td>
                          <td class="cell-detail"> 
                              <input  data-index="<?=$value['id']?>"  name="dia" type="text" placeholder="Enter Column Diametr" class="form-control  form-control-sm ajax-editing" value="<?php if (!empty($value['dia'])) { echo $value['dia']; } ?>"  />
                          </td>
                           <td class="cell-detail"> 
                              <input  data-index="<?=$value['id']?>"  name="weight" type="text" placeholder="Enter Weight" class="form-control  form-control-sm ajax-editing" value="<?php if (!empty($value['weight'])) { echo $value['weight']; } ?>"  />
                          </td>
                          <td class="cell-detail"> 
                              <input  data-index="<?=$value['id']?>"  name="package" type="text" placeholder="Enter Package Qty" class="form-control  form-control-sm ajax-editing" value="<?php if (!empty($value['package'])) { echo $value['package']; } ?>"  />
                          </td>
                          
                          <td class="text-right">
                            <div class="btn-group btn-hspace">
                            <!--<input type="button" class="btn btn-space btn-warning  " value="Clone" >-->
                            <input data-index="<?=$value['id']?>"  type="button" class="btn btn-space  btn-danger ajax-deleting " value="Delete" >
                              
                            </div>
                          </td>
                        </tr>
                        
                                <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                                                   
                                                   
                       </div><!-- card-body -->
                </div><!-- card -->


                 <style>


                    .product_groups li{   background:  #dcdcdc; padding: 5px 10px; list-style: none; width: 165px; margin-bottom: 1px;  border-left: 9px solid   #dcdcdc;
                        margin-right: 0px;}
                    .product_groups li:hover {color: #0185a6; cursor: pointer; border-left: 9px solid  #ebebeb}
                    .option_titles li, .links_titles li {float: left;
                        margin-top: 2px;
                        margin-bottom: 14px;
                        margin-right: 20px;
                        background: #fdf5c9;
                        border-bottom: 1px solid #bcb176;
                        padding: 3px 10px;
                        display: inline-block;
                     
                        width: auto;
                    }
                    
                    .color-options .custom-checkb label {margin-bottom: 2px;}
                      .color-options .custom-checkb  .tmb {width: 60px; height: 40px; display: block}
                    .option_titles li.checked, .links_titles li.checked { background: #24a866; color: white }
                    .product_groups {float: left; width:20%; width: 205px;margin-right: 0px;}
                    .current_content {float: left; width: calc(100% - 220px); background: #fff;  padding: 2%}
                    .product_groups li.active {background: #fff; border-left: 9px solid  #24a866; font-weight: bold}
                    .link_checkbox { width: 20px; margin: 0 auto; margin-top: 5px; }
                    .link_class span {font-size: 11px; color: gray}
                    .link_class  img { width: 70px; margin: 0 auto; margin-top: 5px;}
                    .link_class { width: 90px; }
                    .current_content  li input {cursor: pointer;}
                    .links_titles li {height: 200px;}
                    
                    
                    .color-options .custom-checkb{float: left;
                        margin-top: 2px;
                        margin-bottom: 14px;
                        margin-right: 20px;
             
                        border: 1px solid #d4d4d4;
                        padding: 3px 10px;
                        display: inline-block;
                    
                        width: auto;
                    }
                    .custom-checkb {
    float: left;
    margin-top: 2px;
    margin-bottom: 14px;
    margin-right: 20px;
    border: 1px solid #d4d4d4;
    padding: 3px 10px;
    display: inline-block;
 
    width: auto;
}
                 .product-accessories    .custom-checkb label {display: fl2ex; width: 200px }
                  .product-accessories    .custom-checkb img {
                     width: 159px;display: block; max-height: none; max-width: none;
    margin-left: -27px;
    margin-right: -9px;
    margin-top: 7px;}
                </style>
                
                
                
                      
                 <div class="card card-border-color card-border-color-primary">
                     <div class="card-header card-header-divider">Colors Options<span class="card-subtitle"></span>
                          <div class="tools dropdown goupper2">
                   
                  </div>
                       </div><!-- card-header -->
                       
                       <div class="card-body">
                           
                                <!--Responsive table-->
                                <div class="col-sm-12">
                                  <div class="card card-table">

                                    <div class="card-body">
                                      <div class="table-responsive noSwipe color-options producttype">

                                            <?php 

                                                 foreach ($colors as $key => $color) {

                                                     $checked ="";

                                                     foreach($product_colors as $selected_colors){
                                                         if($selected_colors['color_id'] == $color['id']){
                                                              $checked = 'checked="checked"';

                                                         }
                                                     }
                                              ?>
                                               <div class="custom-checkb <?=$checked?>" data-type="<?=$color['type']?>"> 
                                                <label class="custom-control custom-control-sm custom-checkbox" >

                                                  <span class="tmb" style="background-color: #<?=$color['hex']?>"></span>
                                                  <input <?=$checked?> data-color_id="<?=$color['id']?>" data-producttype="<?=$color['type']?>"  type="checkbox" class="custom-control-input product-color" ><span class="custom-control-label"></span>
                                                  <?=$color['title']?>
                                                </label>
                                              </div>
                                            <?php 
                                                }
                                            ?>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                                                   
                                                   
                       </div><!-- card-body -->
                </div><!-- card -->






<style>
    .select2-result-repository__img {
        height: 50px;
        width: auto;
        margin-right: 20px;
        float: left;
    }
    .items_links {width: 100%; height: 80px}
    .select2-result-repository__img  img {
         max-width: 100%;
         max-height: 100%;
         vertical-align: bottom;
     }
    </style>

                <div class="card card-border-color card-border-color-primary">
                    <div class="card-header card-header-divider">Frequently Bought Together<span class="card-subtitle"></span>
                        <div class="tools dropdown goupper2">

                        </div>
                    </div><!-- card-header -->

                    <div class="card-body">

                        <!--Responsive table-->
                        <div class="col-sm-12">
                            <div class="card card-table">

                                <div class="card-body">
                                    <div class="table-responsive noSwipe color-options producttype">



                                                <select class="j-publication__tags items_links" name="linked[]" multiple="multiple">
                                                    <?php


                                                    $selected_tag = '';
                                                    $selected_products = explode(',',  $edit['linked']);

                                                  //  $this->db->where_in('id',  $selected_products);
                                                    $this->db->where('display',  1);
                                                  //  $this->db->where('status',  1);
                                                  //  $this->db->order_by('title', 'asc');
                                                    $qu = $this->db->get ( 'products' );
                                                    $products = $qu->result_array ();



                                                    foreach($products as $p){
                                                        $selected_tag = '';
                                                         if(in_array($p['id'], $selected_products)) {
                                                             $selected_tag = 'selected="selected"';
                                                         }

                                                        ?>
                                                        <option value="<?=$p['id']?>" <?=$selected_tag?>><?=$p['title']?></option>
                                                    <?php }   ?>

                                                </select>
                                                <br> Select up to 4 different products, that wil be shows in "Frequently Bought Together" section on this product's page.<br>
                                                Search can be done using title or ID. Changes will be saved on click "Save" button down the page.


                                    </div>
                                </div>
                            </div>
                        </div>


                    </div><!-- card-body -->
                </div><!-- card -->







                <div class="card card-border-color card-border-color-primary">
                     <div class="card-header card-header-divider">Product Options<span class="card-subtitle"></span>
                          <div class="tools dropdown goupper2">
                   
                  </div>
                       </div><!-- card-header -->
                       
                       <div class="card-body">
                           
                                <!--Responsive table-->
                                <div class="col-sm-12">
                                  <div class="card card-table">

                                    <div class="card-body">
                                      <div class="table-responsive noSwipe product-accessories producttype">

                                            <?php 

                                                 foreach ($accessories as $key => $accessory) {

                                                     $checked ="";

                                                   
                                                     
                                                     if(in_array($accessory['id'], $product_accessories_arr)) {
                                                          $checked = 'checked="checked"';
                                                     }
                                              ?>
                                               <div class="custom-checkb <?=$checked?>" data-type="<?=$accessory['type']?>"> 
                                                <label class="custom-control custom-control-sm custom-checkbox" >
                                                  <span class="tmb" style=""></span>                                                  
                                                  <input <?=$checked?> data-accessory_id="<?=$accessory['id']?>" data-producttype="<?=$color['type']?>"   type="checkbox" class="custom-control-input product-accessory" ><span class="custom-control-label"></span>
                                                  <?=$accessory['title'].' <b>+$'.$accessory['cost'].'</b>'?>
                                                  
                                                    <img src="/external/accessories/<?=$accessory['id']?>/215x213/<?=$accessory['image']?>" style="  "  alt="<?=$accessory['title']?>"/>  
                                                  
                                                </label>
                                              </div>
                                            <?php 
                                                }
                                            ?>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                                                   
                                                   
                       </div><!-- card-body -->
                </div><!-- card -->
                
                
                
               
                 
                 <div class="card card-border-color card-border-color-primary">
                 
                       <div class="card-body">
                           
             <div class="tab-container">
                  <ul role="tablist" class="nav nav-tabs nav-tabs-success">
                    <li class="nav-item"><a href="#home1" data-toggle="tab" role="tab" class="nav-link active">Images</a></li>
                    <li class="nav-item"><a href="#filters_tab" data-toggle="tab" role="tab" class="nav-link ">Product Filters</a></li>
                    <li class="nav-item"><a href="#details_tab" data-toggle="tab" role="tab" class="nav-link">Product Details</a></li>
                    <li class="nav-item"><a href="#features_tab" data-toggle="tab" role="tab" class="nav-link">Product Features</a></li>
                    <li class="nav-item"><a href="#size_chart_tab" data-toggle="tab" role="tab" class="nav-link">Size Chart Description</a></li>
                    <li class="nav-item"><a href="#seo_tab" data-toggle="tab" role="tab" class="nav-link">SEO</a></li>
                  </ul>
                  <div class="tab-content">
                      
                    <div id="home1" role="tabpanel" class="tab-pane active">
                   
                      
                      <?php 
                      
                       
                    
                    
                       ?>
                      
                          
                <div class="j-upload__top">
                  
                    <div id="upload_area" class="j-upload__top__area  <?php if(count($product_images) > 0) { echo 'j-upload__top__column'; } ?> ">
                        <div class="j-upload__top__block">
                           <!-- The fileinput-button span is used to style the file input field as button -->
                            <span class="  fileinput-button">                                
                                <a><span class="j-button j-upload__button">Load an Image from Your Computer</span></a>
                                <!-- The file input field used as target for the file upload widget -->
                                <input id="fileToUpload" type="file" name="filesToUpload1[]" multiple>
                            </span>

                            <span class="  fileinput-button margin-top-15" style="display: none">                                
                                 <a id="openFilePicker" class="openFilePicker"><span class="j-button j-upload__button">Выбрать <br>на Гугл Диске</span></a>
                            </span>
                            <div class="j-upload__text">Or just drag & drop <br> image files into here</div>
                            <div id="progress_gif"  style="display: none;" ><img src="/assets/css/i/loader.gif" alt="please wait..." /></div>

                            <!-- The global progress bar -->
                            <div id="progress" class="progress " style="display: none;">
                                <div class="progress-bar progress-bar-success"></div>
                            </div>

                            <!-- The container for the uploaded files -->
                            <div id="files" class="files"></div>                
                        </div>
                    </div>
                  
                    <div id="main_uploaded_photo" class="j-upload__top__column j-upload__top__photo" style="display: <?php if(count($product_images) > 0) { echo 'block'; } else { echo 'none'; } ?>;" >
                        <h3 style="position: absolute; font-size: 11px; color: #24a866;margin-top: 4px;    margin-left: 6px;">First Image of the Product</h3>
                        <img  data-image="<?php if(count($product_images) > 0) {
                            echo $product_images[0]['id']; } ?>"
                              class="j-upload__top__photo__img "
                              src="<?php if(count($product_images) > 0) { 
                                  echo '/external/product/'.$edit['id'].'/480x620/'.$product_images[0]['image'];                                   
                              } ?>"
                              alt="<?=$edit['title']?>" />
                        <!-- 
                         <div class="j-edit__check j-edit__check--trash"> j-glass
                             <div class="j-edit__button"><svg class="icon icon--trash"><use xlink:href="#icon--trash"></use></svg></div>
                         </div> 
                        -->
                    </div>
                     <?php
                        if(count($product_images)>1){
                              echo '<h3 style=" float: right; display: none; position: absolute; font-size: 11px; color: #24a866; margin-top: -20px; margin-left: 60px;">Move images around to sort them</h3>';
                          }
                      ?>      
                  
                  <div id="uploaded_files" class="j-upload__top__column j-upload__top__set">
                      
                      <?php if(count($product_images) > 0) { 
                          
                        
                          foreach($product_images as $img) { 
                     
                        ?>
                      <div id="image_<?=$img['id']?>" class="j-upload__top__set__item">
                          <img  src="/external/product/<?=$edit['id']?>/480x620/<?=$img['image']?>" alt="<?=$edit['title']?>">
                            <div class="j-edit__check j-edit__check--trash">
                                <div class="j-edit__button deleteImage"  data-image="<?=$img['id']?>" ><svg class="icon icon--trash"><use xlink:href="#icon--trash"></use></svg></div>
                            </div>
                        </div>
                      <?php  
                            } 
                      
                          }
                      ?>
                      
                  </div>
                    
                </div>
                
                      
                      
                      
                    </div>
                      
                      <style>
                           .option_titles li {cursor: poiter}
                         .option_titles label {     margin-bottom: 0px;   }
                       .option_titles .checked label { color: white;}
                    
                      </style>
                    <div id="filters_tab" role="tabpanel" class="tab-pane">
                        


                        <ul class="product_groups">

                            <?php

                            $first_group = '';
                            $active = '';
                            $this->db->order_by("priority", "asc");
                            $this->db->where('type', $edit['type']);
                            $this->db->where('design', '0');
                            $q = $this->db->get('groups');
                            $groups = $q->result_array();
                            ?>
                            <?php

                          //  print_r($groups);
                            //  echo $edit['category_id'];

                            $kk=0;
                            foreach($groups as $k =>$group)     {
                              ///  if (strpos($group['code'], 'color') === false ) {
                                if ($group['code'] != 'color') {
                                    if($kk == '0') {
                                        $first_group = $group['id'];
                                        $active = 'active';
                                    } else {
                                        // $first_group = '';
                                        $active = '';
                                    }
                                    $kk++;
                                    ?>
                                    <li data-product_id="<?=$edit['id']?>" data-code="<?=$group['id']?>" class="<?=$active?>"><?=$group['title']?></li>
                                    <?php
                                }  }
                            ?>
                        </ul>
                        <div   class="current_content ">

                            <ul class="option_titles">

                                <?php
                                if(!strlen($first_group)) {

                                    echo 'Для данного товара еще не установлена основная категория. Или у выбранной категории товара еще нет фильтров. Чтобы добавить фильтры - перейдите в раздел админки: Категории -> Фильтры.';
                                }
                                //$this->db->order_by("s", "asc");

                                $this->db->where('product_id', $edit['id']);
                                $this->db->where('group_id', $first_group);
                                $q = $this->db->get('options');
                                $options = $q->result_array();
                                ?>
                                <?php
                                $selected_options = array();
                                foreach($options as $option)     {
                                    $selected_options[] = $option['option_title_id'];
                                }
                                ?>


                                <?php
                                //  echo $edit['category_id'];

                                //  $this->db->order_by("priority", "asc");
                                $this->db->where('group_id', $first_group);
                                 $this->db->order_by("priority", "asc");
                                $q = $this->db->get('option_titles');
                                $option_titles = $q->result_array();
                                ?>
                                <?php

                                foreach($option_titles as $title)     {

                                    $this->db->where('id', $title['group_id']);
                                     $this->db->order_by("priority", "asc");
                                    $q = $this->db->get('groups');
                                    $groups = $q->row_array();

                                    if (strpos($groups['code'], 'size') !== false ) {
                                        $input_type= 'checkbox';
                                    } else {
                                        $input_type= 'radio';
                                    }
                                    $input_type= 'checkbox';

                                    if(in_array($title['id'], $selected_options)) {
                                        $checked = 'checked="checked"';
                                        $checked_class = 'checked';
                                    } else{
                                        $checked = '  ';
                                        $checked_class = '  ';
                                    }
                                  //data-subcat_id="<?=$edit['subcat_id']
                                   // if (strpos($groups['code'], 'color') === false ) {
                                        if ($group['code'] != 'color') {
                                        ?>
                                        <li id="option_<?=$title['id']?>"
                                            class="<?=$checked_class?>">
                                            
                                                
                                           <input    name="<?=$groups['code']?>"
                                                     id="option_<?=$title['id']?>_inp"
                                                    data-product_id="<?=$edit['id']?>"
                                                    data-title="<?=$title['title']?>"
                                                    data-option_title_id="<?=$title['id']?>"
                                                    data-category_id="<?=$edit['category_id']?>"
                                           
                                                    data-group_id="<?=$title['group_id']?>"
                                                    class="option_checkbox"
                                                    type="<?=$input_type?>" value="1"  <?=$checked?> >
                                                <label for="option_<?=$title['id']?>_inp" ><?=$title['title']?></label>
                                           </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>


                        </div>
                        <div style="clear: both"></div>
        
                    </div>
                      
                    <div id="details_tab" role="tabpanel" class="tab-pane">
                        
                     <div class="form-group row">                      
                      <div class="col-12 col-sm-12 col-lg-12">
                         <textarea  name="info"    id="info"  placeholder="Enter Product Details"  class="form-control summernote"><?php if (!empty($info['info'])) { echo $info['info']; } ?></textarea>
                       </div>
                    </div>
        
                    </div>
                      
                      
                      
                    <div id="features_tab" role="tabpanel" class="tab-pane">
                        
                     <div class="form-group row">                      
                      <div class="col-12 col-sm-12 col-lg-12">
                        <textarea  name="chartab"    id="chartab"  placeholder="Enter Product Features"  class="form-control summernote"><?php if (!empty($info['chartab'])) { echo $info['chartab']; } ?></textarea>
 
                      </div>
                    </div>
        
                    </div>
                      
                   <div id="size_chart_tab" role="tabpanel" class="tab-pane">
                        
                     <div class="form-group row">                      
                      <div class="col-12 col-sm-12 col-lg-12">
                         <textarea  name="size_chart"    id="size_chart"  placeholder="Enter Size Chart Description [Text in Modal by clicking on Size Chart btn]"  class="form-control summernote"><?php if (!empty($info['size_chart'])) { echo $info['size_chart']; } ?></textarea>
                       </div>
                    </div>
        
                    </div>
                      
                    <div id="seo_tab" role="tabpanel" class="tab-pane">
                         
                               <div class="form-group row">
                                <label for="seo_title" class="col-12 col-sm-3 col-form-label text-sm-right">Meta Page Title<span style="color: red;">*</span>:</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                  <input  id="seo_title" name="seo_title" type="text" placeholder="Enter Meta Page Title" class="form-control" value="<?php if (!empty($info['seo_title'])) { echo $info['seo_title']; } ?>"  />
                                </div>
                              </div>



                              <div class="form-group row">
                                <label for="seo_desc" class="col-12 col-sm-3 col-form-label text-sm-right">Meta Description</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                  <textarea  name="seo_desc"    id="seo_desc"  placeholder="Enter Meta Description"  class="form-control"><?php if (!empty($info['seo_desc'])) { echo $info['seo_desc']; } ?></textarea>
                                </div>
                              </div>



                              <div class="form-group row">
                                <label for="seo_keywords" class="col-12 col-sm-3 col-form-label text-sm-right">Meta Keywords</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                  <textarea  name="seo_keywords"    id="seo_keywords"  placeholder="Enter Meta Keywords"  class="form-control"><?php if (!empty($info['seo_keywords'])) { echo $info['seo_keywords']; } ?></textarea>
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
                    
                    
                            <div class="form-group row pt-1 pb-1">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right">Display on the Website</label>
                      <div class="col-12 col-sm-8 col-lg-6 form-check mt-2">
                        <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="display"  value="1"  <?php if ($edit['display'] == 1) {echo 'checked="checked"'; } ?> class="custom-control-input"><span class="custom-control-label">Yes</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="display" value="0" <?php if ($edit['display'] == 0) {echo 'checked="checked"';} ?> class="custom-control-input"><span class="custom-control-label">No</span>
                        </label>
                      </div>
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

 