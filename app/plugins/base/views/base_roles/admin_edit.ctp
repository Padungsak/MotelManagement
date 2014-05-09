<?php echo $form->create('BaseRole', array('action' => 'adminEdit','class'=>'common-fieldset','style'=>'margin-top:40px;')); ?>
  
 <fieldset>
    <legend>Edit Role:</legend>
    
 <?php echo $form->hidden('id', array('value' => $this->data['BaseRole']['id']));?>
 
 <?php echo $form->label('Name'); ?>
 <?php echo $form->text('BaseRole.name');  ?>


 </fieldset>
 <?php echo $form->end('Edit');?>
