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
                      <a href="/admin/filters/new" class="btn btn-space btn-success">Create New Filter</a>
                      
                        
                  </div>
                </div>
                <div class="card-body">
                  <table id="filtersTable" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>
                    
                        <th style="width: 50px">edit</th>
                        <th>title</th>
                        <th style="width: 50px">type</th>
                        <th style="width: 50px">code</th>
                        <th style="width: 50px">display</th>
                        <th style="width: 50px">sort</th>                        
                        <th style="width: 50px">ID</th>
                        <th style="width: 50px">delete</th>
     
                        
                        
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