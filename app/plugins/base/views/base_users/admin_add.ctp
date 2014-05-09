<?php echo $form->create('BaseUser', array('action' => 'adminAdd','class'=>'common-fieldset','style'=>'margin-top:40px;')); ?>
  
 <fieldset>
    <legend>Add User</legend>
    
 
 <?php echo $form->label('User Name'); ?>
 <?php echo $form->text('BaseUser.username');  ?>
 	<br/>
 <?php echo $form->label('Password'); ?>
 <?php echo $form->text('BaseUser.password');  ?>

<br>
 <?php 
 foreach($allRoles as $role) {
 	$check=null;
 	echo '<INPUT '.$check.' TYPE=CHECKBOX VALUE='.$role['BaseRole']['id'].' NAME="data[BaseRole][check][]"   >'.$role['BaseRole']['name'];
 }
 ?>

 </fieldset>
 <?php echo $form->end('Add');?>
