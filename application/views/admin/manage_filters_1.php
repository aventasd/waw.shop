<?php  ?> 
   
<table cellpadding="0" cellspacing="0" class="inline" id="filterTable">
	
	<thead>
		<tr class="thead">
                    <td width="50">Edit</td>
                    <td>Заголовок</td> 
                    <td width="50">URL</td> 
                    <td width="50">Sort</td> 
                     <td width="50">Active</td> 
                    <td width="50">Delete</td>
		</tr>
	</thead>
 
</table>

 <div style="position: relative; float: left;  height: 30px; width: 150px; margin-top: 15px; margin-left: 5px; ">
     <a href="/admin/filters/new/" style="position: relative; background: #ddd; border-radius: 2px; border: 1px solid gray; padding: 6px 20px; Color: black; font-weight: bold; margin: 30px 0 20px 0px; ">Добавить</a>
</div>
 <?php
 
             $current_type =  $this->session->userdata('admin_type');
                  
                   if(strlen($current_type) < 1){
                       $current_type = 'tires';
                    }
 
 ?>
<input id="category_id" type="hidden" value="<?=$current_type?>" >
<script type="text/javascript" charset="utf-8">

$(document).ready(function() {          


 $(".create_new").one('click', function (event) {  
           event.preventDefault();
            $(this).parent('div').append('<p style="display: inline; padding-bottom: 10px; font-weight: bold; color: #F75C26;"><img style="display: inline;margin-right: 10px; margin-bottom: -12px;" src="/assets/css/i/loader.gif" alt="loading..."> Please wait...</p>');
            $(this).hide();
           location.href = $(this).attr("href");
           $(this).prop('disabled', true);
     });
     
     
    var counter = 1;

    var filter = [6, 7, 8, 9];
    var count =0;
    var table =  $('#filterTable').DataTable( {
                "pageLength": 25,
                "processing": true,
                "serverSide": true,
                "paging":   false,
                "ordering": true,
                "searching": false,
                "info":     false,
                 "ajax": {
                    "url": "/admin_functions/get_filters",
                    "type": "POST",
                  "data": function ( d ) {
                                   
                                    d.object = $('#category_id').val();
                                    

                             } 
                }, 
                "columns": [

                { "data": "view", "searchable": false, "sortable": false }, 
                { "data": "title" },
                 { "data": "code" },
               { "data": "priority" },
               
                 { "data": "display_text_view"},
         
                { "data": "delete", "searchable": false, "sortable": false },
                 { "data": "display", "visible": false, "searchable": false,   "orderable": false},
                { "data": "id", "visible": false, "searchable": false, "sortable": false }

            ],
            "order": [[3, 'asc']] 

      } );  
  
 
     $('body').on( 'click', '.delete', function (event) {
              event.preventDefault();
            
              var title = $(this).attr('data-title');
              var id = $(this).attr('data-id');
               
            var r=confirm("Вы уверены, что хотите удалить: "+title+ "?" );
            if (r==true)   {  
              
         var id = $(this).attr('data-id');
 
          var url = $(this).attr('href'); 
      
                $.ajax({
                           type: "POST",
                           url: url,
                          
                           success: function(data)
                           {
                          
                                
                                 table
                                .row( $(this).parents('tr') )
                                .remove()
                                .draw();
                           }
                         });
                         
                         
 
 
  }
});




});


</script>