      <div class="be-content">  
          
        <div class="page-head" style="display: none;">
          <h2 class="page-head-title"><?=$page['h2_title']?></h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <!--<li class="breadcrumb-item"><a href="#">Pages</a></li>-->
              <li class="breadcrumb-item active"><?=$page['h2_title']?></li>
            </ol>
          </nav>
        </div>          
          
        <div class="main-content container-fluid">
          
            <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-header"><?=$page['h2_title']?>
                  <div class="tools dropdown"  >
                      <a href="/admin/<?=$this->uri->segment(2)?>/new" class="btn btn-space btn-success">Create New</a>
                      
                        
                  </div>
                </div>
                <div class="card-body">
                  <table id="promoTable" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>

                          <td width="50">Edit</td>
                          <td>Title</td>
                          <td  width="150">Date Added</td>
                          <td width="120">Status</td>
                          <td width="60"></td>
                          <td width="80">ID</td>

                      </tr>
                    </thead>
                    <tbody>
 
                    </tbody>
                  </table>
                    
                    
                </div>
              </div>
            </div>
          </div>
          
          
          
          
          
        </div>
      </div>