<?php echo $form->create('BaseUser', array('action' => 'changePwd','class'=>'common-fieldset','style'=>'margin-top:40px;')); ?>

 <fieldset>
 	<?php echo $form->label('New Password:'); ?>
	<?php echo $form->password('password',array('div'=>false));?>
	<br/>
	<?php echo $form->label('Confirm Password:'); ?>
	<?php echo $form->password('password2',array('div'=>false));?>	
 </fieldset>
<?php echo $form->end('Submit');?>
