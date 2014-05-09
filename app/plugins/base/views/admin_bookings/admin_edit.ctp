<?php echo $form->create('AdminRoom', array('action' => 'adminEdit','class'=>'common-fieldset','style'=>'margin-top:40px;')); ?>
  
 <fieldset>
    <legend>Edit Room</legend>
    
 <?php echo $form->hidden('id', array('value' => $this->data['AdminRoom']['id']));?>
 
 <?php echo $form->label('Name'); ?>
 <?php echo $form->text('AdminRoom.name');  ?>
 <br>
 <br>
 <?php echo $form->label('Description'); ?>
 <?php echo $form->text('AdminRoom.des');  ?>
 <br>
 <br>
 <?php echo $form->label('Open'); ?>
 <?php echo $form->input('AdminRoom.status',array('div'=>false,'label'=>false));  ?>

<br>

 </fieldset>
 <?php echo $form->end('Edit');?>
