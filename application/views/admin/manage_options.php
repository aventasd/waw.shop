 
   <input id="group_id" type="hidden" value="<?=$this->uri->segment(4)?>" >
            <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-header">Filter Options
                  <div class="tools dropdown"  >
                      <a href="/admin/filters/<?=$this->uri->segment(4)?>/option_titles/new/" class="btn btn-space btn-success">Create New Filter Options</a>
                      
                        
                  </div>
                </div>
                <div class="card-body">
                  <table id="filterOptionsTable" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>
                    
                        <th style="width: 50px">edit</th>
                        <th>title</th>
                                        
                        <th style="width: 50px">sort</th> 
                        <th style="width: 50px">delete</th>
                        <th style="width: 50px">ID</th>
 
                        
                      </tr>
                    </thead>
                    <tbody>
 
                    </tbody>
                  </table>
                    
                    
                </div>
              </div>
            </div>
          </div>
          
          
          
          
 