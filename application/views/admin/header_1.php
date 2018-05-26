<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
    
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php if(! empty ($page['title'])) { echo $page['title']; } if (!empty($page['additional_title'])) echo $page['additional_title'];?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">

<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
    
    
<link type="text/css" rel="stylesheet" href="/assets/admin/demo_page.css"/>
<link type="text/css" rel="stylesheet" href="/assets/admin/demo_table_jui.css"/>

<link href="/assets/admin/admin-style.css" media="screen" rel="stylesheet" type="text/css" />
<!--
<link rel="manifest" href="/manifest.json">
<script type="text/javascript" charset="utf-8" src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<script type="text/javascript" src="/assets/js/jquery-3.0.0.min.js"></script>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>   

<!-- //datatable --> 
<link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script> 

<link rel="stylesheet" href="/assets/admin/uniform/css/uniform.default.css" media="screen" />
<script src="/assets/admin/uniform/jquery.uniform.min.js"></script>
 

<!-- tinymce -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    
    
 


</head>

<body id="<?php print $page['id']; ?>">

    
 

<table cellpadding="0" cellspacing="0" id="page">
    
<tr id="header">
    <td> <h3 style="margin-left: 20px;"><a class="" href="/">LB</a></h3></td>
    <td>
        
    
        
        	<?php if ($page['id'] != 'login') {                      
                $current_type =  $this->session->userdata('admin_type');
              //  echo 'cc'.$current_type;
                $current_lang =  $this->session->userdata('admin_lang');
                 $this->data['user_id'] =  $this->session->userdata ( 'user_id' );
              //   echo '777'. $this->data['user_id'];
                ?>
	 
                    <div style="display: none;" class="langs">
                        <ul>
			 <li <?php if($current_type =='her' ||  $current_type =='') {	echo 'class="active"'; $current_type_title = 'для неё';	$current_type_title2 = 'для неё'; } ?>><a href="#" rel="velosport" class="changetype">Для неё</a></li>
                         <li <?php if($current_type =='him' ) {	echo 'class="active"';	$current_type_title = 'для него'; $current_type_title2 = 'для него';  } ?>><a href="#" rel="zimnie_vidy_sporta" class="changetype">Для него</a></li>  
                        </ul>
                    </div>
        
        
                     <div class="langs">
                        <ul>
			 <li <?php 	if($current_lang =='ru' ||  $current_lang =='') {	echo 'class="active"';	} ?>><a href="#" rel="ru" class="changelang changetype">RU</a></li>
                         <li <?php 	if($current_lang =='uk' ) {	echo 'class="active"';	} ?>><a href="#" rel="uk" class="changelang changetype">UK</a></li>  
                         <li <?php 	if($current_lang =='en' ) {	echo 'class="active"';	} ?>><a href="#" rel="en" class="changelang changetype">EN</a></li>
                       
                        </ul>
                    </div>
            
             <?php             
                }
             ?>
        <div>
            <?php             
             //   echo '<b>'.$cmail[0]['first_name'].' '.$cmail[0]['last_name'].'</b>';  
                echo '<a href="/ru/login/logout">Выйти</a>'; 
             ?>
        </div> 
        
        
    </td>
</tr>   


    
<tr>
    <td  id="menu">
            <ul id="nav">                
                <li <?php if ($page['id'] == 'categories') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/categories">Категории</a></li>
                <li <?php if ($page['id'] == 'products') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/products">Товары</a></li>
                
                <li <?php if ($page['id'] == 'colors') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/colors">Цвета товаров</a></li>
                
                
                
                
                <!--    <li <?php if ($page['id'] == 'products') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/products">Товары <?=$current_type_title?></a></li>
              <li 
                  <li <?php if ($page['id'] == 'brands') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/brands">Бренды</a></li>
                       <li <?php if ($page['id'] == 'articles') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/articles">Помощь в выборе</a></li>
                   <li <?php if ($page['id'] == 'slides') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/slides">Слайды на главной</a></li>
                   
                   <li <?php if ($page['id'] == 'inform') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/inform">Сообщите, когда появятся</a></li>
                
                  <li <?php if ($page['id'] == 'marketing') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/marketing">Маркетинг</a></li>
                
                
                <li <?php if ($page['id'] == 'import') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/import">Импорт товаров</a></li>
                <li <?php if ($page['id'] == 'export') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/export">Экспорт товаров</a></li>
                 
                -->
                   <li <?php if ($page['id'] == 'pages') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/pages">Статичные страницы</a></li>
                    <li <?php if ($page['id'] == 'help') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/help">Помощь</a></li>
                    
                    
                   <li  <?php if ($page['id'] == 'orders') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/orders">Заказы</a></li> 
                   <li  <?php if ($page['id'] == 'returns') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/returns">Возвраты товаров</a></li> 
                   
                   
                   <li <?php if ($page['id'] == 'promo') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/promo">Акции и промокоды</a></li>
                     <li <?php if ($page['id'] == 'shipping_time') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/shipping_time">Время доставки</a></li>
                   <li <?php if ($page['id'] == 'blogs') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/blogs">Публикации</a></li>
                   <li <?php if ($page['id'] == 'blocks') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/blocks">Блоки пространства</a></li>
                   <li <?php if ($page['id'] == 'slidertop') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/slidertop">Cлайдер верхний</a></li> 
                   <li <?php if ($page['id'] == 'sliderbot') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/sliderbot">Cлайдер нижний</a></li> 
                     
        <!--   <li <?php if ($page['id'] == 'models') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/products">Товары <?=$current_type_title?></a></li>
        
                    
                 <li <?php if ($page['id'] == 'gallery') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/gallery">Галерея на главной</a></li>
               <li <?php if ($page['id'] == 'messages') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/messages">Сообщения с контактов</a></li> -->
                <li <?php if ($page['id'] == 'settings') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/settings">Общие настройки</a></li>
                    <li <?php if ($page['id'] == 'redirects') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/redirects">SEO Redirects</a></li>
                <li <?php if ($page['id'] == 'langs') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/langs">Мультиязычность</a></li>
                <li <?php if ($page['id'] == 'users') { ?> class="active"<?php } ?>><a href="<?php echo base_url(); ?>admin/users">Пользователи</a></li>
                  <li <?php if ($page['id'] == 'salerep') { ?> class="active"<?php } ?>><a href="<?php echo base_url(); ?>admin/salerep">Продавцы</a></li>
                   <li <?php if ($page['id'] == 'feedback') { ?> class="active"<?php } ?>><a href="<?php echo base_url(); ?>admin/feedback">Отзывы</a></li>
                    <li <?php if ($page['id'] == 'subscribers') { ?> class="active"<?php } ?>><a href="<?php echo base_url(); ?>admin/subscribers">Подписчики</a></li>
            </ul>      

    </td>    
    
    
    <td rowspan="2" id="content">

        <h2 style="margin-top: 0px;"><?php if (!empty($page['h2_title'])) echo $page['h2_title']; ?></h2>
        <?php if (!empty($page['bread'])) echo $page['bread']; ?>
        
        <form  action="" method="post" enctype="multipart/form-data">



