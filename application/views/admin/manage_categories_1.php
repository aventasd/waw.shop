<?php  ?> 
<table cellpadding="0" cellspacing="0" class="inlinefilters" style="display: none;" >
    
                    
	
		<tr>
                   
                    
                     
                    <td></td>
                    <td></td>
                    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                   
                    <td>
                      <label>Status Filter:
                        <select class="column_filter_7" id="type_id"  data-column="7">
                             <option value="0">M+W</option>
                             <option value="1">Women</option>
                             <option value="2">Men</option>
                             <option value="3">Kids</option>
                        </select>
                    </label>
                    </td> 
                       <td></td>
                      <td></td>
               <td></td>
               <td></td>
		</tr>

 </table>  
<table cellpadding="0" cellspacing="0" class="inline" id="filterTable">
	
	<thead>
		<tr class="thead">
                    <td width="40">Edit</td>
                    <td width="40">Sub</td>
                    <td width="40">Params</td>
                    <td width="40">Filters</td>
                    
                    <td>Заголовок</td> 
                    
                    <td width="50">Товары</td> 
                    <td width="50">Сорт</td> 
                    <td width="70">Type</td> 
                     <td width="60">Website</td> 
                
                     <td width="30"></td>
                     <td  width="30"></td> 
                    <td  width="30"></td>
                    <td  width="30">ID</td>
		</tr>
	</thead>
 
                
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
                    
                    <td></td> <td></td>
                    <td></td>
		</tr>
	</tfoot>
        
        

</table>

 <div style="position: relative; float: left;  height: 30px; width: 150px; margin-top: 15px; margin-left: 5px; ">
     <a href="/admin/<?=$this->uri->segment(2)?>/new/" style="position: relative; background: #ddd; border-radius: 2px; border: 1px solid gray; padding: 6px 20px; Color: black; font-weight: bold; margin: 30px 0 20px 0px; ">Добавить</a>
</div>



<?php 
                $current_lang =  $this->session->userdata('admin_lang');
                if($current_lang =='en' ) {
                    $lang = 'en';
                } else if($current_lang =='uk' ) {
                    $lang = 'uk';
                } else {
                    $lang = 'ru';
                }
  ?>
 <input type="hidden" value="<?=$current_lang?>" id="current_type">

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

    var filter = [7];
    var count =0;
    var table =  $('#filterTable').DataTable( {
                "pageLength": 10,
                "processing": true,
                "serverSide": true,
                "paging":   false,
                "ordering": true,
                "searching": true,
                "info":     true,
                 "ajax": {
                    "url": "/admin_functions/get_categories",
                    "type": "POST",
                    "data": function ( d ) {                                   
                                    d.current_type = $('#current_type').val(); 
                                   // d.type = $('#type_id').val();

                             }
                }, 
                "columns": [

                { "data": "view", "searchable": false,  "orderable": false }, 
                { "data": "blocks", "searchable": false,  "orderable": false}, 
                
                { "data": "brands", "searchable": false,  "orderable": false }, 
                { "data": "filters", "searchable": false,  "orderable": false }, 
                
                { "data": "title" },
                 //{ "data": "title_view" },
                // { "data": "content" },
                
                   { "data": "photo", "searchable": false },
                { "data": "priority", "searchable": false },
                
                 { "data": "type_view",  "sType": "numeric", "searchable": false, "orderable": false, "targets": [10] },
               { "data": "display_text_view", "searchable": false,  "orderable": false },
                 { "data": "delete", "searchable": false,  "orderable": false },
                 { "data": "display", "visible": false, "searchable": false},
                 { "data": "type", "visible": false, "searchable": false,  "orderable": false  },
                { "data": "id", "visible": true, "searchable": false }

            ],
            "order": [[4, 'asc']],
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

      } );  
  
  
    var firstHeaderRow = $('tr', table.table().header() );
  var foot = $('tr', table.table().footer() );
   foot.insertAfter( firstHeaderRow );  
 // console.log(foot);
  //  console.log(firstHeaderRow);
   /* 
   firstHeaderRow.after('<tr> <td colspan="6"></td><td> \n\
   <input class="select_all" type="checkbox" name="select_all" data-code="display" value="1" /></td><td ></td> \n\
<td  ><input class="delete_all" type="checkbox" name="delete_all" value="1" data-code="delete" /></td><td  ></td></tr>');*/
  $('.thead').eq(1).css('background', 'white');
  $('.thead').eq(1).find('td').css('height', '20px').css('background', 'white').css('padding', '3px');
  
  
  
  
     $('body').on( 'click', '.delete', function (event) {
              event.preventDefault();
            
              var title = $(this).attr('data-title');
              var id = $(this).attr('data-id');
               
            var r=confirm("Вы уверены, что хотите удалить эту категорию: "+title+ " (#"+ id+" )?" );
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