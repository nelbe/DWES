<?php //require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="es">
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        <link type="text/css" href="css/styles.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {	
	$('.paginate').live('click', function(){
		
		$('#content').html('<div class="loading"><img src="images/loading.gif" width="70px" height="70px"/></div>');

		var page = $(this).attr('data');		
		var dataString = 'page='+page;
		
		$.ajax({
            type: "GET",
            url: "includes/pagination.php",
            data: dataString,
            success: function(data) {
				$('#content').fadeIn(1000).html(data);
            }
        });
    });              
});    
</script>
        
    </head>
<body>
        <div id="central">
            <div class="service_category">ArtículosBIN</div>
            <div id="content"><?php require('includes/pagination.php'); ?></div>
					
        </div>
        
           

</body>
</html>
