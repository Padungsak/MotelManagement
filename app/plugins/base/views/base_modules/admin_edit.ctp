<?php echo $form->create('BaseModule',array('action' => 'adminAdd','class'=>'common-fieldset')); ?>
 <fieldset>
<?php echo $form->hidden('BaseModule.id'); ?>


<?php echo $form->label('Module Name');?>
<?php  echo $form->text('BaseModule.name'); ?>

<br/> <br/> 

<?php  echo $form->label('Module Url');?>
<?php  echo $form->text('BaseModule.url'); ?> 

<br/> <br/> 

<?php  echo $form->label('Order');?>
<?php  echo $form->text('BaseModule.order'); ?> 
 </fieldset>
<?php echo $form->end('Edit'); ?>