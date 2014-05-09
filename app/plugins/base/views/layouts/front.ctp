<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>	
	<?php
		echo $scripts_for_layout;
		echo $html->css('base/common');
	?>
	
	
		
	<style type="text/css">
	html, body {
		font-family:arial,helvetica,sans-serif;
	}
	
	.hide-menu-trigger-close,.hide-menu-trigger-open,.collapse-panel-open, .collapse-panel-close{
		cursor:pointer;
	}
	
	 div.disabled {
         display: inline;
         float: none;
         clear: none;
         color: #C0C0C0;
     }
     </style>
	
</head>
<body>
	<div id="container">
		<div id="header">
			
		</div>
		<div id="content">

			<div align="center" style="margin-bottom:5px;height:20px;"> <?php $session->flash(); ?></div>
			<?php echo $content_for_layout; ?>
			
			

		</div>
		<div id="footer">
			
		</div>
	</div>
</body>
</html>