
        </form>
    </td>
    
</tr>   

    
    
    
    
    
    
<tr>
    <td id="copy">&nbsp;</td>
</tr>

    
    
</table>



<script>
 
$(document).ready(function () {
    
            
  $('ul.tabs').on('click', 'li:not(.current)', function() {
    $(this)
      .addClass('current').siblings().removeClass('current')
      .closest('div.tabscontainer').find('div.tab-content').removeClass('current').eq($(this).index()).addClass('current');
  });
             
 
 
 
     	$('.changetype').click(function(event) {
		event.preventDefault();
		  var type = $(this).attr('rel'); 
				 $.ajax({
							url: "/admin_functions/admin_lang",
							type:"POST",
							dataType: "html",
							data : "type="+type,
							async: false,
							cache: false,
							success: function(result)
							{ 
								 location.reload();
							}
					});
		});



  $('#nav > li > a').click(function(){
    if ($(this).attr('class') != 'active'){
      $('#nav li ul').slideUp();
      $(this).next().slideToggle();
      $('#nav li a').removeClass('active');
      $(this).addClass('active');
    }
  });
});


</script>
                   
    
</body>
</html>