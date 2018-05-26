var App = (function () {
  'use strict';

  App.dataTables = function( ){

    //We use this to apply style to certain elements
    $.extend( true, $.fn.dataTable.defaults, {
      dom:
        "<'row be-datatable-header'<'col-sm-6'l><'col-sm-6'f>>" +
        "<'row be-datatable-body'<'col-sm-12'tr>>" +
        "<'row be-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
    } );

    $("#table1").dataTable();

    //Remove search & paging dropdown
    $("#table2").dataTable({
      pageLength: 6,
      dom:  "<'row be-datatable-body'<'col-sm-12'tr>>" +
            "<'row be-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
    });

    //Enable toolbar button functions
    $("#table3").dataTable({
      buttons: [
        'copy', 'excel', 'pdf', 'print'
      ],
      "lengthMenu": [[6, 10, 25, 50, -1], [6, 10, 25, 50, "All"]],
      dom:  "<'row be-datatable-header'<'col-sm-6'l><'col-sm-6 text-right'B>>" +
            "<'row be-datatable-body'<'col-sm-12'tr>>" +
            "<'row be-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
    });
    
    
        $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../server_side/scripts/server_processing.php"
    } );
    
    
    
       $('#categoriesTable').dataTable({
               
                "processing": true,
                "serverSide": true,
                
                 "ajax": {
                    "url": "/admin_functions/get_categories_simple",
                    "type": "POST" 
                }, 
            /*    "columns": [
                    
                     { "data": "view" }, 
                     { "data": "title" },
                     { "data": "priority" },
                     { "data": "display" },
                     { "data": "delete" },
                     { "data": "id" }
                     */
              //  { "data": "view", "searchable": false,  "orderable": false }, 
              //  { "data": "blocks", "searchable": false,  "orderable": false}, 
                
              //  { "data": "brands", "searchable": false,  "orderable": false }, 
             //   { "data": "filters", "searchable": false,  "orderable": false }, 
                
              //  { "data": "title" },
                 //{ "data": "title_view" },
                // { "data": "content" },
                
                 //{ "data": "photo", "searchable": false },
          //      { "data": "priority", "searchable": false },
           //        { "data": "display",   "searchable": false},     
               //  { "data": "type_view",  "sType": "numeric", "searchable": false, "orderable": false, "targets": [10] },
               //{ "data": "display_text_view", "searchable": false,  "orderable": false },
           //      { "data": "delete", "searchable": false,  "orderable": false },
             
                // { "data": "type", "visible": false, "searchable": false,  "orderable": false  },
           //     { "data": "id",   "searchable": false }

            //]
            //   ->select( 'categories.id as id, categories.title as title, priority, categories.display as display')
            "order": [[1, 'asc']],
            "columns": [
            { "data": "view", "searchable": false,  "orderable": false },
          
            { "data": "title" },
            
                      
            { "data": "type_view", "searchable": false,  "orderable": false },
            { "data": "display_text_view", "searchable": false,  "orderable": false },
            { "data": "priority" },
            { "data": "delete", "searchable": false,  "orderable": false },
            
            { "data": "type", "visible": false,  "searchable": false,  "orderable": false  },
            { "data": "id", "visible": false,  "searchable": false,  "orderable": false  },
            { "data": "display", "visible": false,  "searchable": false,  "orderable": false },
              
            ]
 

      } );  
      
      
      
      
       $('#productsTable').dataTable({
               
                "processing": true,
                "serverSide": true,
                
                 "ajax": {
                    "url": "/admin_functions/get_products_simple",
                    "type": "POST" 
                }, 
 
            "order": [[5, 'asc']],
            "columns": [
            { "data": "view", "searchable": false,  "orderable": false },
          
            { "data": "h1_title" },
            
                      
            { "data": "type_view", "searchable": false,  "orderable": false },
            { "data": "display_text_view", "searchable": false,  "orderable": false },
            { "data": "cost" },
            { "data": "id" },
            { "data": "delete", "searchable": false,  "orderable": false },
            
            { "data": "type", "visible": false,  "searchable": false,  "orderable": false  },
          
            { "data": "display", "visible": false,  "searchable": false,  "orderable": false },
              
            ]
 

      } );  
      
      
        $('#filtersTable').dataTable({
               
                "processing": true,
                "serverSide": true,
                
                 "ajax": {
                    "url": "/admin_functions/get_filters",
                    "type": "POST" 
                }, 
 
            "order": [[5, 'asc']],
            "columns": [
            { "data": "view", "searchable": false,  "orderable": false },          
            { "data": "title" },   
            
            
            { "data": "category_type_view", "searchable": false,  "orderable": false },
            { "data": "code" },
            { "data": "display_text_view", "searchable": false,  "orderable": false },
          
            { "data": "priority", "searchable": false,  "orderable": false },
            { "data": "id" },
            { "data": "delete", "searchable": false,  "orderable": false },  
            { "data": "type", "visible": false,  "searchable": false,  "orderable": false  },
            { "data": "display", "visible": false,  "searchable": false,  "orderable": false  }
              
            ]
 

      } );



      $('#promoTable').dataTable({

          "processing": true,
          "serverSide": true,

          "ajax": {
              "url": "/admin_functions/get_promo",
              "type": "POST"
          },

          "order": [[5, 'asc']],
          "columns": [

              { "data": "view", "searchable": false },
              { "data": "title" },
              { "data": "added" },
              { "data": "status_view", "searchable": false, "orderable": false, "targets":5 },
              { "data": "delete", "searchable": false },
              { "data": "status", "searchable": false, "visible": false },
              { "data": "id", "visible": false, "searchable": false }

          ]


      } );

      $('#usersTable').dataTable({

          "processing": true,
          "serverSide": true,

          "ajax": {
              "url": "/admin_functions/get_users",
              "type": "POST"
          },

          "order": [[5, 'desc']],
          "columns": [
              { "data": "view", "searchable": false,  "orderable": false },
              { "data": "first_name" },
              { "data": "last_name" },

              { "data": "email" },

              { "data": "status_view_field", "searchable": false },
              { "data": "added", "searchable": false },
              { "data": "id" },
              { "data": "delete", "searchable": false,  "orderable": false },
              { "data": "status", "searchable": false,  "visible": false },
           //   { "data": "type", "visible": false,  "searchable": false,  "orderable": false  },
           //   { "data": "display", "visible": false,  "searchable": false,  "orderable": false  }

          ]


      } );




      $('#colorsTable').dataTable({
               
                "processing": true,
                "serverSide": true,
                
                 "ajax": {
                    "url": "/admin_functions/get_colors",
                    "type": "POST" 
                }, 
 
            "order": [[5, 'asc']],
            "columns": [
            { "data": "view", "searchable": false,  "orderable": false },          
            { "data": "title" },   
            
            
            { "data": "category_type_view", "searchable": false,  "orderable": false },
            { "data": "code" },
            { "data": "display_text_view", "searchable": false,  "orderable": false },
          
            { "data": "priority", "searchable": false,  "orderable": true },
            { "data": "id" },
            { "data": "delete", "searchable": false,  "orderable": false },  
            { "data": "type", "visible": false,  "searchable": false,  "orderable": false  },
            { "data": "display", "visible": false,  "searchable": false,  "orderable": false  }
              
            ]
 

      } );  
      
          
              $('#accessoriesTable').dataTable({
               
                "processing": true,
                "serverSide": true,
                
                 "ajax": {
                    "url": "/admin_functions/get_accessories",
                    "type": "POST" 
                }, 
 
            "order": [[5, 'asc']],
            "columns": [
            { "data": "view", "searchable": false,  "orderable": false },          
            { "data": "title" },   
            
            
            { "data": "category_type_view", "searchable": false,  "orderable": false },
            { "data": "code" },
            { "data": "display_text_view", "searchable": false,  "orderable": false },
          
            { "data": "priority", "searchable": false,  "orderable": true },
            { "data": "id" },
            { "data": "delete", "searchable": false,  "orderable": false },  
            { "data": "type", "visible": false,  "searchable": false,  "orderable": false  },
            { "data": "display", "visible": false,  "searchable": false,  "orderable": false  }
              
            ]
 

      } );

      var counter = 1;
      var filter = [7];
      var count =0;
      $('#ordersTable').dataTable({

          "processing": true,
          "serverSide": true,

          "ajax": {
              "url": "/admin_functions/get_orders",
              "type": "POST"
          },

          "order": [[9, 'desc']],
          "columns": [
              { "data": "view", "searchable": false,  "orderable": false },
              { "data": "order_number_view" },
              { "data": "added" },
              { "data": "first_name", "searchable": false  },
              { "data": "phone"   },
              { "data": "email"   },
              { "data": "total_sum", "searchable": false  },
              { "data": "status_view_field",   "searchable": false, "orderable": false },
              { "data": "delete", "searchable": false },
              { "data": "id"  },
              { "data": "status",    "visible": false  }
          ],

          initComplete: function () {

              console.log('cs3');
              this.api().columns().every( function () {

                  if(filter.indexOf(count) > -1){
                      console.log(count);

                      var column = this;
                      var colname = $(column.footer()).html();

                      console.log(colname);


                      var select = $('<select><option value="">-- '+ colname +' --</option></select>')
                          .appendTo( $(column.footer()).empty() )
                          //  .appendTo( $(column.header()).empty() )
                          .on( 'change', function () {
                              var val = $.fn.dataTable.util.escapeRegex(
                                  $(this).val()
                              );
                              //re-draw table by search value...
                              column
                                  .search( val ? '^'+val+'$' : '', true, false )
                                  .draw();
                          } );

                      var cl_op = '.column_filter_' + count;
                      var option_select = $(cl_op).html();
                      select.append( option_select )


                  }
                  count += 1;
              } );


          }

      });

      var firstHeaderRow = $('#ordersTable thead tr');
      var foot = $('#ordersTable tfoot tr');
      foot.insertAfter( firstHeaderRow );



      $('#filterOptionsTable').dataTable({
               
                "processing": true,
                "serverSide": true,
                
                 "ajax": {
                    "url": "/admin_functions/get_option_titles",
                    "type": "POST",
                    "data": function ( d ) {
                                   
                                    d.object = $('#group_id').val();
                                    

                             } 
                }, 
 
            "order": [[2, 'asc']],
            "columns": [
                
                { "data": "view", "searchable": false, "sortable": false }, 
                { "data": "title" },        
                { "data": "priority" },   
                { "data": "delete", "searchable": false, "sortable": false },
                { "data": "id",   "searchable": false, "sortable": false }
              
            ]
 
      });  
      
      
      

  };

  return App;
})(App || {});
