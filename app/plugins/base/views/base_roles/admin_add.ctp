<?php echo $form->create('BaseRole', array('action' => 'adminAdd','class'=>'common-fieldset','style'=>'margin-top:40px;')); ?>
  
 <fieldset>
    <legend>Add Role:</legend>
    
 
 <?php echo $form->label('Name'); ?>
 <?php echo $form->text('BaseRole.name');  ?>


 </fieldset>
 <?php echo $form->end('Add');?>
