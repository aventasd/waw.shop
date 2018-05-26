      
      
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
                        <input type="submit" name="save" value="Save Changes" class="btn btn-space btn-primary"  /> 
                        <button class="btn btn-space btn-secondary go-to-link" data-href="/admin/accessories">Cancel</button>                        
                  </div>
                    
                    
                </div>
                <div class="card-body">
                    
                
                      
                    <input type="hidden" maxlength="50" id="item_id" name="id" class="field disabled " style="width: 50px;" value="<?php echo $edit['id']; ?>" readonly="readonly" /> 
                    <input type="hidden" name="edit" value="yes">  
                      
                    <div class="form-group row">
                      <label for="title" class="col-12 col-sm-3 col-form-label text-sm-right">Title<span style="color: red;">*</span>:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input  id="title" name="title" type="text" placeholder="Enter Accessory Title" class="form-control" value="<?php if (!empty($edit['title'])) { echo $edit['title']; } ?>" required />
                      </div>
                    </div>
                 
                       <div class="form-group row">
                      <label for="subtitle" class="col-12 col-sm-3 col-form-label text-sm-right">Sub Title<span style="color: red;">*</span>:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input  id="subtitle" name="subtitle" type="text" placeholder="Enter Sub Title" class="form-control" value="<?php if (!empty($edit['subtitle'])) { echo $edit['subtitle']; } ?>" required />
                      </div>
                    </div>
                    
                    
                  
                    <div class="form-group row">
                      <label for="file-2" class="col-12 col-sm-3 col-form-label text-sm-right">Image:<p style="color: gray; font-size: 10px;">jpg, jpeg, png & gif<br>max - 5mb.</p></label>
                      <div class="col-12 col-sm-6">
                        <input id="file-2" type="file" name="fileToUpload1" id="fileToUpload1" class="inputfile">
                        <label for="file-2" class="btn-primary"> <i class="mdi mdi-upload"></i><span>Browse files...</span></label>
                        <?php if (strlen($edit['image'])) { ?><img src="/external/accessories/<?=$edit['id']?>/215x213/<?=$edit['image']?>" alt="" style="  margin-bottom: 20px;"/><?php } ?>
                      </div>
                    </div>
                    
                     <div class="form-group row">
                      <label for="description" class="col-12 col-sm-3 col-form-label text-sm-right">Description<span style="color: red;">*</span>:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                       <textarea  name="description"    id="description"   class="form-control summernote"><?php if (!empty($edit['description'])) { echo $edit['description']; } ?></textarea>
                      </div>
                    </div>
        
                    
                    <div class="form-group row">
                      <label for="notes" class="col-12 col-sm-3 col-form-label text-sm-right">Notes<span style="color: red;">*</span>:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                       <textarea  name="notes"    id="description"   class="form-control summernote"><?php if (!empty($edit['notes'])) { echo $edit['notes']; } ?></textarea>
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
                      <label for="cost" class="col-12 col-sm-3 col-form-label text-sm-right">Accessory Cost, $:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input style="width: 20%" id="code"  type="text"   name="cost"  placeholder="Add Accessory Cost" class="form-control" value="<?php if (!empty($edit['cost'])) { echo $edit['cost']; } ?>"  />
                        <span style="color: gray; font-size: 12px; "> </span>
                      </div>
                    </div>  
                
                    
 
                    <div class="form-group row">
                      <label for="weight" class="col-12 col-sm-3 col-form-label text-sm-right">Weight, pounds:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input style="width: 30%" id="weight"  type="text"   name="weight"  placeholder="Add Weight, pounds" class="form-control" value="<?php if (!empty($edit['weight'])) { echo $edit['weight']; } ?>"  />
                        <span style="color: gray; font-size: 12px; "> </span>
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