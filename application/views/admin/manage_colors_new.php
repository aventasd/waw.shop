      
      
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
                          <li class="breadcrumb-item"><a href="/admin/colors">Colors</a></li> 
                          <li class="breadcrumb-item active">Editing color</li>
                        </ol>
                      </nav>
                    </span>
                
                  <div class="tools dropdown goupper">
                        <input type="submit" name="save" value="Save Changes" class="btn btn-space btn-primary"  /> 
                        <button class="btn btn-space btn-secondary go-to-link" data-href="/admin/colors">Cancel</button>                        
                  </div>
                    
                    
                </div>
                <div class="card-body">
                    
                
                      
                    <input type="hidden" maxlength="50" id="item_id" name="id" class="field disabled " style="width: 50px;" value="<?php echo $edit['id']; ?>" readonly="readonly" /> 
                    <input type="hidden" name="edit" value="yes">  
                      
                    <div class="form-group row">
                      <label for="title" class="col-12 col-sm-3 col-form-label text-sm-right">Title<span style="color: red;">*</span>:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input  id="title" name="title" type="text" placeholder="Enter Category Title" class="form-control" value="<?php if (!empty($edit['title'])) { echo $edit['title']; } ?>" required />
                      </div>
                    </div>
                 
                    <div class="form-group row">
                      <label for="rewrite" class="col-12 col-sm-3 col-form-label text-sm-right">URL<span style="color: red;">*</span>:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input id="rewrite" name="rewrite" type="text" placeholder="Enter color url" class="form-control" value="<?php if (!empty($edit['rewrite'])) { echo $edit['rewrite']; } ?>" required />
                        <span style="color: gray; font-size: 12px; ">Only lowecase, latin characters, no special symbols or spaces. Allowed only - and _<br>The code should be unique. For price filter use code "price"</span><br><br>
                        <a href="#" id="createUrl">Create URL link automaticly</a>
                      </div>
                    </div>
                    
 
                   <div class="form-group row">
                      <label for="code" class="col-12 col-sm-3 col-form-label text-sm-right">Part Number Code:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input style="width: 20%" id="code"  type="text"   name="code"  placeholder="Set Code" class="form-control" value="<?php if (!empty($edit['code'])) { echo $edit['code']; } ?>"  />
                        <span style="color: gray; font-size: 12px; "> </span>
                      </div>
                    </div>  
                
                  
                    <div class="form-group row">
                      <label for="percent" class="col-12 col-sm-3 col-form-label text-sm-right">Upcharge, %:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input style="width: 20%" id="code"  type="text"   name="percent"  placeholder="Set % Upcharge" class="form-control" value="<?php if (!empty($edit['percent'])) { echo $edit['percent']; } ?>"  />
                        <span style="color: gray; font-size: 12px; "> </span>
                      </div>
                    </div>  
                
                    
                     <div class="form-group row">
                      <label for="hex" class="col-12 col-sm-3 col-form-label text-sm-right">HEX, #:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input style="width: 20%" id="hex"  type="text"   name="hex"  placeholder="Set HEX" class="form-control" value="<?php if (!empty($edit['hex'])) { echo $edit['hex']; } ?>"  />
                        <span style="color: gray; font-size: 12px; "> </span>
                      </div>
                    </div>  
                    
                    <div class="form-group row">
                      <label for="file-2" class="col-12 col-sm-3 col-form-label text-sm-right">Image:<p style="color: gray; font-size: 10px;">jpg, jpeg, png & gif<br>max - 5mb.</p></label>
                      <div class="col-12 col-sm-6">
                        <input id="file-2" type="file" name="fileToUpload1" id="fileToUpload1" class="inputfile">
                        <label for="file-2" class="btn-primary"> <i class="mdi mdi-upload"></i><span>Browse files...</span></label>
                        <?php if (strlen($edit['image'])) { ?><img src="/external/colors/<?=$edit['id']?>/250x350/<?=$edit['image']?>" alt="" style="  margin-bottom: 9px;  margin-left: 20px; width: 150px"/><?php } ?>
                         <br><span style="color: gray; font-size: 12px; ">Image will be used if uploaded, instead of HEX code.</span>
                      </div>
                    </div>
                    
                    
                    
                    
                  <div class="form-group row pt-1 pb-1">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right">Category Type<span style="color: red;">*</span>:</label>
                      <div class="col-12 col-sm-8 col-lg-6 form-check mt-2">
                        <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="type"  value="0"  <?php if ($edit['type'] == 0) {echo 'checked="checked"'; } ?> class="custom-control-input"><span class="custom-control-label">Bases</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="type" value="1" <?php if ($edit['type'] == 1) {echo 'checked="checked"';} ?> class="custom-control-input"><span class="custom-control-label">Tops</span>
                        </label>
                      </div>
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
                    
 
                 
                    
                    
                    
                    <div class="form-group row">
                      <label for="priority" class="col-12 col-sm-3 col-form-label text-sm-right">Sort:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input style="width: 20%" id="priority"  type="number" min="0" max="10000000" name="priority"  placeholder="Set Priority" class="form-control" value="<?php if (!empty($edit['priority'])) { echo $edit['priority']; } ?>"  />
                        <span style="color: gray; font-size: 12px; ">Only number. We sort filters ascendingly. The filter with the biggest number will be the last.</span>
                      </div>
                    </div>  
                
                
 
    
                    
                    
 
  
        
        
                    
                     <div class="row ">
                      <hr />
                    </div>
                    
                    
                    <div class="row ">
                      <div class="col-12 col-sm-3 col-form-label ">
                       
                      </div>
                        
                      <div class="col-12 col-sm-8 col-lg-6">
                        <p class="text-left">
                           
                          <input type="submit" name="save" value="Save Changes" class="btn btn-space btn-primary"  /> 
                          <button class="btn btn-space btn-secondary go-to-link" data-href="/admin/filters">Cancel</button>
                        </p>
                      </div>
                    </div>
                    
                    
               
                </div>
              </div>
            </div>
          </div>
          <!--Input File-->
          
             </form>
          
          </div>
          </div>