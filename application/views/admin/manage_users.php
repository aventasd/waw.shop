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


                        </div>
                    </div>
                    <div class="card-body">
                        <table id="usersTable" class="table table-striped table-hover table-fw-widget">
                            <thead>
                            <tr>

                                <th style="width: 50px">edit</th>
                                <th style="width: 250px">first name</th>
                                <th style="width: 250px">last name</th>
                                <th >email</th>

                                <th style="width: 50px">status</th>
                                <th style="width: 150px">added</th>
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