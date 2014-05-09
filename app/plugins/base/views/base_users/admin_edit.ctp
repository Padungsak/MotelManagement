<?php echo $form->create('BaseUser', array('action' => 'adminEdit','class'=>'common-fieldset','style'=>'margin-top:40px;')); ?>
  
 <fieldset>
    <legend>Edit User</legend>
    
 <?php echo $form->hidden('id', array('value' => $this->data['BaseUser']['id']));?>
 
 <?php echo $form->label('User Name'); ?>
 <?php echo $form->text('BaseUser.username',array('disabled'=>'disabled'));  ?>

<br>
 <?php 
 //print_R($allRoles);
 //print_R($mappedRoles);
 
 foreach($allRoles as $role) {
 	$check=  (in_array($role['BaseRole']['id'],$mappedRoles))? "checked": "";
 	echo '<INPUT '.$check.' TYPE=CHECKBOX VALUE='.$role['BaseRole']['id'].' NAME="data[BaseRole][check][]"   >'.$role['BaseRole']['name'];
 }
 ?>
 
 </fieldset>
 <?php echo $form->end('Edit');?>
