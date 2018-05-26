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
			<input type="text" name="title" id="title"  value="<?php if (!empty($edit['title'])) { echo $edit['title']; } else { echo set_value('title'); }?>" class="validate[required] nice" style="width: 90%" /> 
		</td>
	</tr>
 
        
 <!--     <tr class="even">
		<td>
		H1 Заголовок:<span style="color: red;">*</span><br>                
                <span style="color: gray; font-size: 10px; ">Будет отображаться вместо названия, если заполнен</span>
		</td>
		<td>
			<input type="text" name="h1_title"  value="<?php if (!empty($edit['h1_title'])) { echo $edit['h1_title']; } else { echo set_value('h1_title'); }?>" class="validate[required] nice" style="width: 90%" /> 
		</td>
	</tr> -->
 
        
            <tr class="odd">
		<td>
		URL Title<span style="color: red;">*</span>
              
		</td>
		<td>
			<input type="text" name="rewrite" id="rewrite"  value="<?php if (!empty($edit['rewrite'])) { echo $edit['rewrite']; } else { echo set_value('rewrite'); }?>" class="validate[required] nice" style="width: 90%" /> 
                        <br>                
                <span style="color: gray; font-size: 10px; ">Только маленькие, латинские буквы, без спец. символов и пробелов. Разрешены: - и _</span><br><br>
                <a href="#" id="createUrl">Сформировать ссылку из названия</a>
		</td>
	</tr>
   
        
        
        
        
<tr class="even">
		<td>
		Картинка
		<p style="color: gray; font-size: 10px;">jpg, jpeg, png & gif<br>max - 5mb.</p>сфеу
		</td>
		<td style="height: 100px;">  
                        <?php if (strlen($edit['photo'])) { ?><img src="/external/category/<?=$edit['id']?>/181x136/<?=$edit['photo']?>" alt="" style="  margin-bottom: 20px;"/><?php } ?>
			<input type="file" name="fileToUpload1" id="fileToUpload1">
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
        
        

    <tr class="odd">
            <td valign="top">SEO Текст<span style="color: red;">*</span>:</td>
            <td><textarea name="description"  class="richarea" id="description" style="width: 100%; height: 450px;"><?php if (isset($edit['description'])) { ?><?php echo $edit['description']; } ?></textarea></td>
    </tr>   
 

  

             
    
        
            
        
        

  <!--                                  
       	<tr class="odd">
		<td>
		Выделить жирным:
		</td>
		<td>
			<select name="highlight" class="validate[required] nice" >
 
				<option value="1" <?php if (isset($edit['highlight'])) { ?> <?php if ($edit['highlight'] == 1) {echo 'selected="selected"'; } }?>>Да</option>
				<option value="0" <?php if (isset($edit['highlight'])) { ?> <?php if ($edit['highlight'] == 0) {echo 'selected="selected"';} }?>>Нет</option>
			</select>

		</td>
	</tr>
 
        -->
        <tr class="odd">
		<td>
		Раздел сайта: <span style="color: red;">*</span>:
		</td>
		<td>
			<select name="type" class="validate[required] nice" >
                                <option value="0" <?php if (isset($edit['type'])) { ?> <?php if ($edit['type'] == 0) {echo 'selected="selected"';} }?>>Унисекс</option>
				<option value="1" <?php if (isset($edit['type'])) { ?> <?php if ($edit['type'] == 1) {echo 'selected="selected"'; } }?>>Женская</option>
				<option value="2" <?php if (isset($edit['type'])) { ?> <?php if ($edit['type'] == 2) {echo 'selected="selected"';} }?>>Мужская</option>
                                <option value="3" <?php if (isset($edit['type'])) { ?> <?php if ($edit['type'] == 3) {echo 'selected="selected"';} }?>>Детская</option>
			</select>
		</td>
	</tr>
         
        
        
   <!-- 
        <tr class="">
		<td>
		Совместить с категорией: <span style="color: red;">*</span>:
		</td>
		<td>
                    <select name="combine[]" multiple="multiple" class="validate[required] nice" style="width: 400px; height: 600px" >                       
                    <option value="" >-- --- --</option>
              <?php 
       // $data['combine'] = implode(',', $this->input->get_post('combine'));
                $this->db->where('display',  1); 
                $this->db->where('type !=',  0); 
                $this->db->where('main',  0); 
                $this->db->order_by("type", "asc");  
                $this->db->order_by("title", "asc");  
                $q = $this->db->get('categories');
                $import = $q->result_array();  
               
                foreach($import as $cats ){   
                    
                        if($cats['type'] == '1') {
                            $catalog_title = lang('common.catalog_for_her');
                            $catalog_link = '[women]';
                        } else if($cats['type'] == '2') {
                            $catalog_title = lang('common.catalog_for_him');
                            $catalog_link = '[men]';
                        } else {
                          $catalog_title = lang('common.catalog_for_all');
                      $catalog_link = 'women';
                        }

    
                    
                    ?>
			
                    <option value="<?=$cats['id']?>" <?php if (strlen($edit['combine'])) {  $combine = explode(',', $edit['combine']); ?> <?php if (in_array($cats['id'], $combine)) {echo 'selected="selected"';} }?>><?=$cats['title']. '  '. $catalog_link?></option>
	 
               <?php  }  ?>
                                
			</select>
		</td>
	</tr> -->
       
        
        
        
       <tr class="even">
		<td>
		SEO H1 Title<span style="color: red;"></span>:
		</td>
		<td>
			<input type="text" name="h1_title"  value="<?php if (!empty($edit['h1_title'])) { echo $edit['h1_title']; } else { echo set_value('h1_title'); }?>" class="nice" style="width: 96%" /> <br>
                        Если не указан, будет использован заголовок категории вместо него.
		</td>
	</tr>
 
        
        
      <tr class="even">
		<td>
		Meta Title<span style="color: red;"></span>:
		</td>
		<td>
			<input type="text" name="seo_title"  value="<?php if (!empty($edit['seo_title'])) { echo $edit['seo_title']; } else { echo set_value('seo_title'); }?>" class="nice" style="width: 96%" /> 
		</td>
	</tr>
 
          <tr class="odd">
		<td>
		Meta Description<span style="color: red;"></span>:
		</td>
		<td>
		     <textarea name="seo_desc"   class="nice" id="seo_desc" style="width: 98%; height: 100px; background: white"><?php if (isset($edit['seo_desc'])) { ?><?php echo $edit['seo_desc']; } ?></textarea>
                </td>
	</tr>
        
        
        
        
         <tr class="even">
		<td>
		Meta Keywords<span style="color: red;"></span>:
		</td>
		<td>
                    <textarea name="seo_keywords"   class="nice" id="seo_keywords" style="width: 98%; height: 100px; background: white"><?php if (isset($edit['seo_keywords'])) { ?><?php echo $edit['seo_keywords']; } ?></textarea>
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
        
     
 
 

</tbody>
</table>



<p><input type="submit" name="Save" value="Сохранить" class="button" /> 
 
</p>
 
 



<!-- http://www.designsandcode.com/261/open-manager-tinymce-file-manager/ -->
 

<script type="text/javascript" charset="utf-8">
                    
                    
$(document).ready(function(){
    
    
        tinymce.init({
        content_css : '/assets/css/tinymce.css', 
        menubar: false,
        
       language: 'ru',
        language_url: '/external/tinymce/js/tinymce/langs/ru.js',
        
        selector:'.richarea', 
                    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor"
 
        
 
    ],
    style_formats : [
      //  {title : 'H1 header', block : 'h1', styles : {color : '#4c813c'}},
      //  {title : 'H2 header', block : 'h2', styles : {color : 'black'}},
       {title : 'Обычный текст абзаца', block : 'p'},
        {title : 'H4 Заголовок принципов', block : 'h4'}
	 
      
    ],
   // image_advtab: true,
    toolbar1: " undo redo | styleselect | bold italic | alignleft aligncenter alignright | removeformat | image code ",
    theme: "modern",
		
file_browser_callback : function(field_name, url, type, win) { 

            var w = window,
            d = document,
            e = d.documentElement,
            g = d.getElementsByTagName('body')[0],
            x = w.innerWidth || e.clientWidth || g.clientWidth,
            y = w.innerHeight|| e.clientHeight|| g.clientHeight;

	    var cmsURL = '/external/pedit/plugins/Filemanager/index.html?&field_name='+field_name+'&lang=en';
	    
	    if(type == 'image') {		    
	    	cmsURL = cmsURL + "&type=images";
	    }
	
	    tinyMCE.activeEditor.windowManager.open({
	        file : cmsURL,
	        title : 'Filemanager',
	        width : x * 0.8,
	        height : y * 0.8,
	        resizable : "yes",
	        close_previous : "no"
	    });		    

	}
 

		});


 

		//set width of the uploading iframe
		var documentWidth = $(document).width();
		documentWidth = parseInt(documentWidth) - parseInt(420);

		//initiate the upoading iframe
 	   var ad_lat = $('#item_id').val();
		   console.log(ad_lat);
 

		$(".nice").uniform();

                    


      
        $( "#createUrl" ).click(function(e) {
            e.preventDefault();      
            
            console.log("OK");
            var title = $("#title").val();
            var url = "/functions/create_url"; // the script where you handle the form input.
                $.ajax({
                           type: "POST",
                           url: url,
                           data: 'title=' + title, // serializes the form's elements.
                           success: function(data)
                           {
                              $("#rewrite").val(data);  
                                            
                           }
                         });           
            });
            
            
            
            

        });


</script>
