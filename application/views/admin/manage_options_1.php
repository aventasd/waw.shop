<?php  ?> 
   
<table cellpadding="0" cellspacing="0" class="inline" id="filterTable">
	
	<thead>
		<tr class="thead">
                    <td width="50">Edit</td>
                    <td>Заголовок</td>     
                    <td width="50">Sort</td>  
                    <td width="50">Delete</td>
		</tr>
	</thead>
 
</table>

 <div style="position: relative; float: left;  height: 30px; width: 150px; margin-top: 15px; margin-left: 5px; ">
     <a href="/admin/filters/<?=$this->uri->segment(4)?>/option_titles/new/" style="position: relative; background: #ddd; border-radius: 2px; border: 1px solid gray; padding: 6px 20px; Color: black; font-weight: bold; margin: 30px 0 20px 0px; ">Добавить</a>
</div>
 
 
 
  <input id="group_id" type="hidden" value="<?=$this->uri->segment(4)?>" >
 
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
                    "url": "/admin_functions/get_option_titles",
                    "type": "POST",
                  "data": function ( d ) {
                                   
                                    d.object = $('#group_id').val();
                                    

                             } 
                }, 
                "columns": [

                { "data": "view", "searchable": false, "sortable": false }, 
                { "data": "title" },
        
               { "data": "priority" },
   
                { "data": "delete", "searchable": false, "sortable": false },
                { "data": "id", "visible": false, "searchable": false, "sortable": false }

            ],
            "order": [[2, 'asc']] 

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