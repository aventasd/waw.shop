<style>
   select {
       border-width: 1px;
       border-top-color: #bdc0c7;
       box-shadow: none;
        height: 37px;
        padding: 2px;
        margin: 0 5px;
    }

</style>


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
                      <!--<a href="/admin/accessories/new" class="btn btn-space btn-success">Create New Option</a>-->
                      
                        
                  </div>
                </div>
                <div class="card-body">

                    <table cellpadding="0" cellspacing="0" class="inlinefilters" style="display: none;" >

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <label>Status Filter:
                                    <select class="form-control form-control-sm column_filter_7" id="type_id"  data-column="7">
                                        <option value="0">1. Created</option>
                                        <option value="1">2. Processing</option>
                                        <option value="2">3. Shipped</option>
                                        <option value="3">4. Completed</option>
                                        <option value="4">Canceled</option>

                                    </select>
                                </label>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>

                    </table>


                    <table id="ordersTable" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>

                        <th style="width: 50px">View</th>
                          <th style="width: 80px">Order Number</th>
                        <th>Order Date</th>
                        <th style="width: 150px">Name</th>
                          <th style="width: 150px">Phone</th>
                          <th style="width: 200px">Email</th>


                        <th style="width: 50px">Sum</th>
                          <th style="width: 150px">Status</th>
                          <th style="width: 50px">Delete</th>
                          <th style="width: 50px">ID</th>
                          <th style="width: 50px">Date</th>



     
                        
                        
                      </tr>
                    </thead>
                    <tbody>
 
                    </tbody>

                      <tfoot>
                      <tr class="thead">

                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>


                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                      </tfoot>


                  </table>
                    
                    
                </div>
              </div>
            </div>
          </div>
          
          
          
          
          
        </div>
      </div>