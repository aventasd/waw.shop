    </div>
    <script src="/assets/admin/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/admin/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/assets/admin/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
 
      <script src="/assets/admin/js/app.js?<?=time()?>" type="text/javascript"></script>
      
      
    <script src="/assets/admin/lib/datatables/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="/assets/admin/lib/datatables/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
    <script src="/assets/admin/lib/datatables/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="/assets/admin/lib/datatables/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="/assets/admin/lib/datatables/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="/assets/admin/lib/datatables/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
    <script src="/assets/admin/lib/datatables/datatables.net-buttons/js/buttons.colVis.min.js" type="text/javascript"></script>
    <script src="/assets/admin/lib/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
    
    
    <script src="/assets/admin/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        
   <script src="/assets/admin/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
        
        
    <script src="/assets/admin/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="/assets/admin/lib/select2/js/select2.full.min.js" type="text/javascript"></script>

    <script src="/assets/js/jquery.formatCurrency-1.4.0.js"></script>

    <script src="/assets/admin/js/app-tables-datatables.js" type="text/javascript"></script>
    <script src="/assets/admin/js/app-form-elements.js" type="text/javascript"></script>
        <script src="/assets/admin/lib/summernote/summernote-bs4.min.js" type="text/javascript"></script>
    <script src="/assets/admin/lib/summernote/summernote-ext-beagle.js" type="text/javascript"></script>
    <script src="/assets/admin/js/app-form-wysiwyg.js" type="text/javascript"></script>
    
 
       
       
    
    <script type="text/javascript">
        
        
        
 var developerKey = 'AIzaSyCb-vxH0ZcLWMlGW3NyocwUnp5jAg3I4OM';
    // The Client ID obtained from the Google API Console. Replace with your own Client ID.
  //  var clientId = "657317281373-2mvacln9f3upnti01kfgnr0mud8ibg01.apps.googleusercontent.com";
   // var clientId = "657317281373-2mvacln9f3upnti01kfgnr0mud8ibg01.apps.googleusercontent.com";
   // 
   var clientId = "657317281373-62l99uo5lc8fqdc736vs6k9788ui9ksv.apps.googleusercontent.com";
             //      657317281373-2mvacln9f3upnti01kfgnr0mud8ibg01.apps.googleusercontent.com
    // Replace with your own project number from //console.developers.google.com.
    // See "Project number" under "IAM & Admin" > "Settings"
    var appId = "657317281373";

    // Scope to use to access user's Drive items.
    var scope = ['https://www.googleapis.com/auth/drive'];

    var pickerApiLoaded = false;
    var oauthToken;
//https://console.developers.google.com/projectselector/apis/library
    // Use the Google API Loader script to load the google.picker script.
    function loadPicker() {
        //////console.log('loadPicker');
      gapi.load('auth', {'callback': onAuthApiLoad});
      gapi.load('picker', {'callback': onPickerApiLoad});
    }

    function onAuthApiLoad() {
      window.gapi.auth.authorize(
          {
            'client_id': clientId,
            'scope': scope,
            'immediate': false
          },
          handleAuthResult);
    }

    function onPickerApiLoad() {
      pickerApiLoaded = true;
      createPicker();
    }

    function handleAuthResult(authResult) {
      if (authResult && !authResult.error) {
        oauthToken = authResult.access_token;
        createPicker();
      }
    }

function addThumbnail(file) {
            var img_last = '';
            var uploaded_files_html ='';
            uploaded_files_html +='<div id="image_'+ file.id +'" class="j-upload__top__set__item">';
            uploaded_files_html +='<img src="'+ file.url +'" alt="image">';
            uploaded_files_html +='<div data-image="'+ file.id +'" class="j-edit__check j-edit__check--trash">';
            uploaded_files_html +='<div class="j-edit__button"><svg class="icon icon--trash"><use xlink:href="#icon--trash"></use></svg></div>';
            uploaded_files_html +='</div>';
            uploaded_files_html +='</div>';
            img_last = file.url ;

            $(".j-upload__top__area").addClass('j-upload__top__column');
            $("#main_uploaded_photo").show();
            $("#main_uploaded_photo img").attr('src', img_last);
            $('#uploaded_files').prepend(uploaded_files_html);
             $('#progress').hide();
             $("#progress_gif").hide();
}

 function formatProduct(data) {
     var markup = "<div class='select2-result-repository clearfix'>"
     markup += "<div class='select2-result-repository__img'><img src='" + data.img + "' alt='' /></div>";
     markup += "<div class='select2-result-repository__right'><div class='select2-result-repository__title'><b>" + data.text + "</b></div>";

     markup += "<div class='select2-result-repository__description'>" + data.desc + "</div>";
     markup += "<div class='select2-result-repository__description secdec'>Код: " + data.id + "</div>";
     markup +=   "</div></div>";
     if(typeof (data.text) !== 'undefined')
         return markup;
 }

 function formatRepoSelection (repo) {
     console.log(repo);
     return repo.text + '('+ repo.id +')' ;
 }


 $(document).ready(function(){
      	//initialize the javascript
      	App.init();
        App.dataTables();
        App.formElements();
        App.textEditors();



     if( $(".items_links").length) {
         $(".items_links").select2({
             placeholder: "Select item",
             tags: true,
             //   data: selectedProductsData,
             createTag: function (params) {
                 return false;
             },
             ajax: {
                 url: "/functions/get_items",
                 dataType: 'json',
                 delay: 0,

                 placeholder: 'Select an option',
                 data: function (params) {
                     return {
                         q: params.term, // search term
                         page: params.page
                     };
                 },

                 processResults: function (data, params) {
                     // parse the results into the format expected by Select2
                     // since we are using custom formatting functions we do not need to
                     // alter the remote JSON data, except to indicate that infinite
                     // scrolling can be used
                     params.page = params.page || 1;

                     return {
                         results: data.items,
                         pagination: {
                             more: (params.page * 30) < data.total_count
                         }
                     };
                 },
                 cache: false
             },
             escapeMarkup: function (markup) {
                 return markup;
             }, // let our custom formatter work
             minimumInputLength: 1,
             language: "ru",
             templateResult: formatProduct//, // omitted for brevity, see the source of this page
             //   templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
         })

     }


          $( ".openFilePicker" ).click(function(e) {
       e.preventDefault();    
       loadPicker();
  });
//upload_area

 $( ".deleteImage" ).click(function(e) {        
       e.preventDefault();    
 
        var image_id = $(this).data('image');
        var url = "/functions/remove_image"; // the script where you handle the form input.
        $.ajax({
           type: "POST",
           url: url,
           data: "code=" + image_id, // serializes the form's elements.
           success: function(data)
           {
               if(data == '6VOsdfSADFKRgx$') {
                  $("#image_" + image_id).remove();
               } else {
                   //got error
                   $("#errorMessage").html(data);
                   $("#errorMessage").show();

               }

           }
         });  
                               
    });
    
    
  if( $( "#uploaded_files" ).length) {   
    $( "#uploaded_files" ).sortable({
     // placeholder: "ui-state-highlight"
     
        update: function( event, ui ) {
          var data = $(this).sortable('serialize');
           //////console.log(ui.item); 
           //////console.log(data); 
           var url = "/functions/sorting_images";
                   $.ajax({
                        type: "POST",
                        url: url,
                        data:  data, // serializes the form's elements.
                        success: function(data)
                        {
                            var src = $("#image_" + data + ' img').attr('src');
                            
                            $("#main_uploaded_photo img").attr('src', src);
                            $("#main_uploaded_photo img").attr('data-image', data);
                         //   if(data == '6VOsdfSADFKRgx$') {
                              // $("#image_" + image_id).remove();
                           // } else {
                                //got error
                             //   $("#errorMessage").html(data);
                             //   $("#errorMessage").show();

                            //}

                        }
                      }); 
         
         
        }
 
    });
    $( "#uploaded_files" ).disableSelection();
  }
  
        
           // Change this to the location of your server-side upload handler:
    var url = '/functions/load_image';   
    var product_id = $("#item_id").val();
    if($('#fileToUpload').length) {
        var formData = $('form').serializeArray();
        $('#fileToUpload').fileupload({
        type: "POST",    
        url: url,
        dataType: 'json',
        
        done: function (e, data) {
        // ////console.log('asd1');
             var img_last = '';
              var uploaded_files_html ='';
           //////console.log(data.result.files);
              var file = data.result.files;
              
            addThumbnail(file);

        },
        progressall: function (e, data) {
            $('#progress').show();
              //////console.log('progress');
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    });
    }
    
    
        /*
        * Changing Tabs with filter Groups
        */     
        $( ".product_groups" ).on('click', 'li', function(e) {
            e.preventDefault();        
   
            var id = $(this).data('code');
            var product_id = $(this).data('product_id');
             $( ".product_groups li" ).removeClass('active');
             $(this).addClass('active');
               var url = "/admin_functions/load_group"; // the script where you handle the form input.
                $.ajax({
                           type: "POST",
                         //  dataType: "json",
                           url: url,
                           data: 'id='+ id + '&product_id='+ product_id, // serializes the form's elements.
                           success: function(response)
                           {
                               $('.option_titles').html(response);
                         
                           }
                         });
     
           
        });
        
        
        
        /*
         * User clicked (changed) filter's option - let's save data to DB
         * 
         */
                
            $( ".option_titles" ).on('change', '.option_checkbox', function(e) {
            e.preventDefault();        

            var status = $(this).is(":checked");
            var type = $(this).attr('type'); 
            var title = $(this).data('title');


            var option_title_id = $(this).data('option_title_id'); 


            var product_id = $("#item_id").val(); 
            var category_id = $("#category_id").val(); 
            var subcat_id = $("#subcat_id").val(); 
            var display = $("#product_display").val();  
            var group_id = $(this).data('group_id');  

            if(status == true){
                                                                                                                                                                                                                                                                               }else {
            $('#option_' + option_title_id).removeClass('checked');
            }


            var url = "/admin_functions/update_product_option"; // the script where you handle the form input.
            $.ajax({
            type: "POST",
            //  dataType: "json",
            url: url,
            data: 'product_id='+ product_id + '&status='+ status + '&title='+ title+  '&type='+ type+ '&option_title_id='+ option_title_id +  '&category_id='+ category_id+  '&subcat_id='+ subcat_id +  '&group_id='+ group_id+  '&display='+ display, // serializes the form's elements.
            success: function(response)
            {



            }
            });



            });




           $( ".color-options" ).on('change', '.product-color', function(e) {
            e.preventDefault();        

            var status = $(this).is(":checked");
            var type = $(this).attr('type'); 
            var title = $(this).data('title');


            var option_title_id = $(this).data('option_title_id'); 


            var product_id = $("#item_id").val(); 
            var category_id = $("#category_id").val(); 
            var subcat_id = $("#subcat_id").val(); 
            var display = $("#product_display").val();  
            var color_id = $(this).data('color_id');  

            if(status == true){
                                                                                                                                                                                                                                                                               }else {
            $('#option_' + option_title_id).removeClass('checked');
            }


            var url = "/admin_functions/update_product_colors"; // the script where you handle the form input.
            $.ajax({
            type: "POST",
            //  dataType: "json",
            url: url,
            data: 'product_id='+ product_id + '&status='+ status + '&title='+ title+  '&type='+ type+ '&option_title_id='+ option_title_id +  '&category_id='+ category_id+  '&subcat_id='+ subcat_id +  '&color_id='+ color_id+  '&display='+ display, // serializes the form's elements.
            success: function(response) {



            }
            });



            });






           $( ".product-accessories" ).on('change', '.product-accessory', function(e) {
            e.preventDefault();        

            var status = $(this).is(":checked");
            var type = $(this).attr('type'); 
            var title = $(this).data('title');


            var option_title_id = $(this).data('option_title_id'); 


            var product_id = $("#item_id").val(); 
         //   var category_id = $("#category_id").val(); 
          //  var subcat_id = $("#subcat_id").val(); 
          //  var display = $("#product_display").val();  
            var accessory_id = $(this).data('accessory_id');  

            if(status == true){
                                                                                                                                                                                                                                                                               }else {
           // $('#option_' + option_title_id).removeClass('checked');
            }


            var url = "/admin_functions/update_product_accessories"; // the script where you handle the form input.
            $.ajax({
            type: "POST",
            //  dataType: "json",
            url: url,
            data: 'product_id='+ product_id  + '&status='+ status + '&accessory_id='+ accessory_id, // serializes the form's elements.
            success: function(response) {



            }
            });



            });


      checkProductType();      

         $( ".setproducttype" ).on('change', 'input', function(e) {
             
      checkProductType();     
         });


     $('.currency').formatCurrency();

 });
      
      function checkProductType(){
       
          var type =  $('.setproducttype input[name=type]:checked').val();
          console.log(type);
           $('.producttype .custom-checkb').hide();
         // .custom-checkb
          $('.producttype').find('[data-type="'+type+'"]').show();
      }
      
    </script>
  </body>
</html>


 
 
 