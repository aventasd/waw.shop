      
      
      <div class="be-content">
          
          
 
          
        <div class="main-content container-fluid">

           

<!--Basic Elements-->
          <div class="row">
            <div class="col-md-12">
              <div class="card card-border-color card-border-color-primary">
                <div class="card-header card-header-divider"><?=$page['h2_title']?><span class="card-subtitle">
                    
                     <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb page-head-nav">
                          <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="/admin/filters">Filters</a></li> 
                          <li class="breadcrumb-item"><a href="/admin/filters/edit/<?=$this->uri->segment(3)?>">Filter "<?=$page['additional_title']?>"</a></li> 
                          <li class="breadcrumb-item active">Editing Filter's Option</li>
                        </ol>
                      </nav>
                    </span>
                
                    <div class="tools dropdown goupper">
                        <input type="submit" name="save" value="Save Changes" class="btn btn-space btn-primary"  /> 
                        <button class="btn btn-space btn-secondary go-to-link" data-href="/admin/filters/edit/<?=$this->uri->segment(3)?>">Cancel</button>                        
                  </div>
                
                </div>
                <div class="card-body">
                    
                  <form method="post" enctype="multipart/form-data">
                      
                    <input type="hidden" maxlength="50" id="item_id" name="id" class="field disabled " style="width: 50px;" value="<?php echo $edit['id']; ?>" readonly="readonly" /> 
                    <input type="hidden" name="edit" value="yes">  
                      
                    <div class="form-group row">
                      <label for="title" class="col-12 col-sm-3 col-form-label text-sm-right">Option Title<span style="color: red;">*</span>:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input  id="title" name="title" type="text" placeholder="Enter Option Title" class="form-control" value="<?php if (!empty($edit['title'])) { echo $edit['title']; } ?>" required />
                      </div>
                    </div>
                  
                    
                    <div class="form-group row">
                      <label for="priority" class="col-12 col-sm-3 col-form-label text-sm-right">Sort:</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input style="width: 150px" id="priority"  type="number" min="0" max="10000000" name="priority"  placeholder="Set Priority" class="form-control" value="<?php if (!empty($edit['priority'])) { echo $edit['priority']; } ?>"  />
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
                          <button class="btn btn-space btn-secondary go-to-link" data-href="/admin/filters/edit/<?=$this->uri->segment(3)?>">Cancel</button>
                        </p>
                      </div>
                    </div>
                    
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--Input File-->
          
          
          
          </div>
          </div>