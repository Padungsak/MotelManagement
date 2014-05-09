<style type="text/css">	
	form#form  label{
		font-weight:bold;
		width:100px;
		float:left;
	}
	form#form input[type=text],input[type=password]{
		float:left;
		width:200px;
	}
</style>
	
	
<div>
<h1>Meeting Room Booking System</h1>
</div>


<div align="center" style="width:600px;">
	
	<?php
	 echo $form->create('User',array('url'=>'/users/login','id'=>'form'));
	 echo $form->label('User Name');
	 echo $form->text('username');
	 ?>
	<br/>
	<br/>
	 <?php
	 echo $form->label('Password');
	 echo $form->password('password');
	 ?>
	 <br/>
	 <br/>
	 <?php
	 echo $form->submit('Login',array('div'=>false));
	 echo $form->end();
	?>
</div>


<div align="center" style="width:600px;">
	<p align="left">
		Login with any user name and password, 
		<br/>
		you can use them to retrive your bookings later again. 
	</p>
</div>
<script type="text/javascript">
	$(function() {			
		
	
	});
</script>






