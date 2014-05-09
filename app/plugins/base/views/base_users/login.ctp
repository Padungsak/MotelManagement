<?php echo $form->create('BaseUser', array('action' => 'login','class'=>'common-fieldset','style'=>'margin-top:40px;')); ?>
 <fieldset>
 <?php echo $form->label('User Name'); ?>
 <?php echo $form->text('username',array('div'=>false));?>
  <br/>
  <?php echo $form->label('Password:'); ?>
  <?php	echo $form->password('password',array('div'=>false));?>	
 </fieldset>
<?php echo $form->end('Login');?>
