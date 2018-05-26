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

 

	<tr class="odd">
		<td>
		Название<span style="color: red;">*</span>:
		</td>
		<td>
			<input type="text" name="title"  value="<?php if (!empty($edit['title'])) { echo $edit['title']; } else { echo set_value('title'); }?>" class="validate[required] nice" style="width: 95%" /> 
		</td>
	</tr>
 
         <tr class="odd">
		<td>
		URL Code<span style="color: red;">*</span>
              
		</td>
		<td>
			<input type="text" name="code"  value="<?php if (!empty($edit['code'])) { echo $edit['code']; } else { echo set_value('code'); }?>" class="validate[required] nice" 
                               style="width: 60px" /> 
                                        <br> 
                <span style="color: gray; font-size: 10px; ">Код не должен повторятся внутри категории. Только маленькие, латинские буквы, без спец. символов и пробелов.<br>
                
                Для ползунка с ценой, код должен быть только "price"
                </span>
		</td>
	</tr>
        
        
        <tr class=" ">
		<td>
		Раздел сайта:
		</td>
                <td>    
               
                    <select id="type"  class="validate[required] nice" name="type" >
                        <option value="tires" <?php if (isset($edit['type'])) { ?> <?php if ($edit['type'] == "tires") {echo 'selected="selected"'; } }?>>Шины</option>
                        <option value="disks" <?php if (isset($edit['type'])) { ?> <?php if ($edit['type'] == "disks") {echo 'selected="selected"'; } }?>>Диски</option>
                      </select> 
		</td>
	</tr>  
        
        
   
     <tr class="odd">
		<td>
		Показывать:
		</td>
		<td>
			<select name="display" class="validate[required] nice" >
 
				<option value="1" <?php if (isset($edit['display'])) { ?> <?php if ($edit['display'] == 1) {echo 'selected="selected"'; } }?>>Да</option>
				<option value="0" <?php if (isset($edit['display'])) { ?> <?php if ($edit['display'] == 0) {echo 'selected="selected"';} }?>>Нет</option>
			</select>

		</td>
	</tr>
        
      <tr class="odd">
		<td>
		Тип фильтра:
		</td>
		<td>
			<select name="design" class="validate[required] nice" >
 
				<option value="1" <?php if (isset($edit['design'])) { ?> <?php if ($edit['design'] == 1) {echo 'selected="selected"'; } }?>>Ползунок с ценой</option>
				<option value="0" <?php if (isset($edit['design'])) { ?> <?php if ($edit['design'] == 0) {echo 'selected="selected"';} }?>>Чекбоксы</option>
			</select>
                    <br>                
                <span style="color: gray; font-size: 10px; ">Ползунок с ценой, может быть только один на подкатегорию.</span>
		</td>
    </tr>
        
    <tr class="even">
		<td>
		Сортировка:<span style="color: red;"></span> 
		</td>
		<td>
			<input type="number" min="0" max="10000000" name="priority"  value="<?php if (!empty($edit['priority'])) { echo $edit['priority']; } else { echo set_value('priority'); }?>" class="validate[required] nice" style="width: 20%" /> 
                        <br>                
                <span style="color: gray; font-size: 10px; ">Указываем цифру. Сортируются категории по возрастанию. Категория с большим числом в конце списка.</span>
		</td>
	</tr>
   
        <?php if (isset($edit['design'])) { ?> <?php if ($edit['design'] != 1) { ?>
     <tr class="odd">
		<td colspan="2">
		<b>Опции для фильтра "<?php if (!empty($edit['title'])) { echo $edit['title']; } else { echo set_value('title'); }?>":</b>
		</td>
		 
    </tr>
    
      <tr class="even">
		<td colspan="2">
			 <?php 
                             $this->load->view ( 'admin/manage_options');
                         ?>
		</td>
	</tr>
        
        <?php } } ?>

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

        });


</script>



