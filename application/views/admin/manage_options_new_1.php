<?php
 
if (!empty($error)) {
    
		echo '<p class="error">'.$error.'</p>';
	 
}

echo validation_errors();
?>
<?php
	$uri2 = $this->uri->segment(2);
	$uri3 = $this->uri->segment(3);
	$uri4 = $this->uri->segment(4);
	$uri5 = $this->uri->segment(5);

 
?>
<style>
#content table td {padding: 10px 10px;}
</style>

<table cellpadding="0" cellspacing="0" id="agreements">
<thead>
<tr class="thead">
	<td style="width: 140px;"><b>Параметры</b></td>
	<td><b>Значения</b></td>
</tr>
</thead>
<tbody class="tbody">



<?php if (!empty($edit['page'])){ if ($edit['page'] == 'edit') {?>
<tr class="even" style="display: none">
	<td>ID:</td>
	<td><input type="text" maxlength="50" id="item_id"  class="field disabled " style="width: 50px;" value="<?php echo $edit['id']; ?>" readonly="readonly" /></td>
</tr>
<input type="hidden" name="edit" value="yes">
<input type="hidden" id="item_id" name="id" value="<?php echo $edit['id']; ?>"> 
 
 
<?php }} else { ?>


<input type="hidden" name="save" value="yes">
<?php } ?>

 

	<tr class="even">
		<td>
		Название<span style="color: red;">*</span>:
		</td>
		<td>
			<input type="text" name="title" id="title" value="<?php if (!empty($edit['title'])) { echo $edit['title']; } else { echo set_value('title'); }?>" class="validate[required] nice" style="width: 95%" /> 
		</td>
	</tr>
 
   
        
    <tr class="odd">
		<td>
		Сортировка:<span style="color: red;"></span> 
		</td>
		<td>
			<input type="number" min="0" max="10000000" name="priority"  value="<?php if (!empty($edit['priority'])) { echo $edit['priority']; } else { echo set_value('priority'); }?>" class="validate[required] nice" style="width: 20%" /> 
                        <br>                
                <span style="color: gray; font-size: 10px; ">Указываем цифру. Сортируются опции по возрастанию. Опции с большим числом в конце списка.</span>
		</td>
	</tr>
        
          
        <tr class="even">
		<td>
		Совмещение опций (их товаров)<span style="color: red;">*</span>:
		</td>
		<td id="filter_actions"><span style="color: red; font-size: 10px; ">Используем с осторожностью. Действия необратимы.</span><br><br>
			 
                    <label>Выберите фильтр, товары которого надо ДОБАВИТЬ к текущему. <br>Выбранная опция будет УДАЛЕНА, после перемещения товаров.</label><br><br>
                    <select id="option_title_id" name="option_title_id" class="validate[required] nice" >  
                     
                     <option value="" >-- --- --</option>
                            <?php 
                             $group_id = $this->uri->segment(3);   
                              $this->db->where('group_id',   $group_id);    
                              $this->db->where('id !=',   $this->uri->segment(6));   
                              $this->db->order_by("title", "asc");  
                              $q = $this->db->get('option_titles');
                              $option_titles = $q->result_array();  

                              foreach($option_titles as $options ){     ?>

                                 <option value="<?=$options['id']?>"><?=$options['title']?> [id: <?=$options['id']?>]</option>

                             <?php  }  ?>
                                
			</select>
                    
                    
                    <a id="delete_option" class="btn"  >Совместить и удалить</a>
                    
		</td>
	</tr>
 


</tbody>
</table>



<p><input type="submit" name="Save" value="Сохранить" class="button" /> 
 
</p>

 

<!-- http://www.designsandcode.com/261/open-manager-tinymce-file-manager/ -->
 

<script type="text/javascript" charset="utf-8">
                    
                    
$(document).ready(function(){
    
   

 
 

		//set width of the uploading iframe
		var documentWidth = $(document).width();
		documentWidth = parseInt(documentWidth) - parseInt(420);

		//initiate the upoading iframe
 	   var ad_lat = $('#item_id').val();
		   console.log(ad_lat);
		//$('#ifr').html('<iframe id="iframe" src="/external/upl/category_r3t45u56rtu.php?ad_lat=categories/'+ad_lat+'" width="'+documentWidth+'" height="314"   frameborder="0"></iframe>');

		//$('#ifr2').html('<iframe id="iframe2" src="/external/upl/top_shape_r3t45u56rtu.php?ad_lat=product_shapes/'+ad_lat+'" width="'+documentWidth+'" height="314"   frameborder="0"></iframe>');

	 



		//	jQuery("#oprosFrom").validationEngine();

	 $(".nice").uniform();
                
           $( "#delete_option" ).on('click',  function(e) {       
  
           e.preventDefault();  
           
           var option_title_id = $("#option_title_id  option:selected").val();
                if( option_title_id > 0 ) {
           
               var option_title_text = $("#option_title_id option:selected").text();
               
               var title = $("#title").val();
                var item_id = $("#item_id").val();
             var r=confirm("Вы уверены, что хотите  переместить все отмеченные товары c  фильтром: "+option_title_text+ " в текущий фильтр: "+title+ " и затем удалить старый фильтр: "+option_title_text+ "?" );
            if (r==true)   {  
                
                   var url = "/functions/merge_options/" + option_title_id +"/" + item_id; // the script where you handle the form input.
                $.ajax({
                           type: "POST",
                         //  dataType: "json",
                           url: url,
                           data: 'option_title_id='+ option_title_id + '&item_id='+ item_id, // serializes the form's elements.
                           success: function(response)
                           {
                          
                      $("#filter_actions").html('<h5>Было перемещено: '+response + ' товаров. ' );
                                    
                           }
                         });
               
                }
            }         
        });
        
        
});

</script>



