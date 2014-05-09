<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Meeting Room Booking System (cakephp powered)</title>
	<?php echo $html->charset(); ?>	
	<?php		
		
		echo $javascript->link('jquery-1.4.2.min'); 
		echo $javascript->link('jquery-ui.min'); 
		
		echo $html->css('jui/ui-lightness/jquery-ui');
		echo $html->css('style');
		
		echo $scripts_for_layout;
	?>
	
	
	
		
	<style type="text/css">
	html, body {
		font-family:arial,helvetica,sans-serif;
	}
	
	</style>
	

	
</head>
<body>
	<div id="container">
		<div id="header">
			
		</div>
		<div id="content" align="center">
			
			<div align="center" style="margin-bottom:40px;height:20px;"> <?php $session->flash(); ?></div>
			<div align="center">
				Current time: <?php echo date('m/d/Y h:i:s a');;  ?>
				<?php echo $content_for_layout; ?>			
			</div>

		</div>
		<div id="footer">
			
		</div>
	</div>
</body>
</html>