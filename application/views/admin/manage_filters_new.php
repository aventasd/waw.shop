      
      
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
                          <li class="breadcrumb-item"><a href="/admin/filters">Filters</a></li> 
                          <li class="breadcrumb-item active">Editing filter</li>
                        </ol>
                      </nav>
                    </span>
                
                  <div class="tools dropdown goupper">
                        <input type="submit" name="save" value="Save Changes" class="btn btn-space btn-primary"  /> 
                        <button class="btn btn-space btn-secondary go-to-link" data-href="/admin/filters">Cancel</button>                        
                  </div>
                    
                    
                </div>
                <div class="card-body">
                    
                
                      
                    <input type="hidden" maxlength="50" id="item_id" name="id" class="field disabled " style="width: 50px;" value="<?php echo $edit['id']; ?>" readonly="readonly" /> 
                    <input type="hidden" name="edit" value="yes">  
                      
                    <div class="form-group row">
                      <label for="title" class="col-12 col-sm-3 col-form-label text-sm-right">Filter Title<span style="color: red;">*</span>:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input  id="title" name="title" type="text" placeholder="Enter Category Title" class="form-control" value="<?php if (!empty($edit['title'])) { echo $edit['title']; } ?>" required />
                      </div>
                    </div>
                 
                    <div class="form-group row">
                      <label for="rewrite" class="col-12 col-sm-3 col-form-label text-sm-right">URL<span style="color: red;">*</span>:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input id="rewrite" name="code" type="text" placeholder="Enter Filter Code" class="form-control" value="<?php if (!empty($edit['code'])) { echo $edit['code']; } ?>" required />
                        <span style="color: gray; font-size: 12px; ">Only lowecase, latin characters, no special symbols or spaces. Allowed only - and _<br>The code should be unique. For price filter use code "price"</span><br><br>
                        <a href="#" id="createUrl">Create URL link automaticly</a>
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
                    
                    
                     <div class="form-group row pt-1 pb-1">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right">Design of Filter</label>
                      <div class="col-12 col-sm-8 col-lg-6 form-check mt-2">
                      
                        <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="design" value="0" <?php if ($edit['design'] == 0) {echo 'checked="checked"';} ?> class="custom-control-input"><span class="custom-control-label">Checkbox</span>
                        </label>
                            <label class="custom-control custom-radio custom-control-inline">
                          <input type="radio" name="design"  value="1"  <?php if ($edit['design'] == 1) {echo 'checked="checked"'; } ?> class="custom-control-input"><span class="custom-control-label">Price Inputs</span>
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
                
                
                    
                    <div class="form-group row">
                      
                      <div class="col-12  ">
                         <?php $this->load->view ('admin/manage_options'); ?>
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