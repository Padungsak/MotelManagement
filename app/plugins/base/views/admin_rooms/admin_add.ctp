<?php echo $form->create('AdminRoom', array('action' => 'adminAdd','class'=>'common-fieldset','style'=>'margin-top:40px;')); ?>
  
 <fieldset>
    <legend>Add Room</legend>
    
 
 <?php echo $form->label('Name'); ?>
 <?php echo $form->text('AdminRoom.name');  ?>
 	<br/>
 	<br/>
 <?php echo $form->label('Description'); ?>
 <?php echo $form->text('AdminRoom.des');  ?>
 <br>
 <br>
 <?php echo $form->label('Open'); ?>
 <?php echo $form->input('AdminRoom.status',array('div'=>false,'label'=>false));  ?>

 </fieldset>
 <?php echo $form->end('Add');?>
