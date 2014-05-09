<div class="search-area">
 <span class="collapse-panel-close">-Search</span>
 <span class="collapse-panel-open">+Search</span>
 <?php  echo $form->create('AdminRoom', array('action' => 'adminIndex','class'=>'common-fieldset')); ?>
  <fieldset>
   
    	<br/>
    	<?php echo $form->label('Name'); ?>
    	<?php echo $form->text('AdminRoom.name', array('size' => '30')); ?>
    	<br/>
    	<br/>
    	<?php echo $form->label('Description'); ?>
    	<?php echo $form->text('AdminRoom.des', array('size' => '30')); ?>
    	
        <?php echo $form->submit('Search'); ?>
    	
    	
  </fieldset>
<?php  echo $form->end(); ?>
</div>


<div>
	<p class="message-box info">
	 		This module is for adding/editing/deleting Rooms.		  
	</p>
</div>





<div id='data'>
<?php echo $form->create('AdminRoom', array('action' => 'adminDelete')); ?>
<table width="100%" class="tablesorter">	
	<thead>
	    <tr>
	        <th class='{sorter: false}'>Select</th>
	        <th>Name</th>
	        <th>Description</th>	      
	        <th class="{sorter: false}">Action</th>
        </tr>
    </thead>
    
   
	
	<tbody>			
    <?php foreach ($datas as $data): ?>
    <tr>      
      	<td>
      		<input type="checkbox" name=<?php echo 'data[AdminRoom][delete][]';?> value=<?php echo $data['AdminRoom']['id'];?> />
      	</td>
        <td><?php echo $data['AdminRoom']['name']; ?></td>
        <td><?php echo $data['AdminRoom']['des']; ?></td>
        <td>
        	<?php echo $html->link('Edit', '/base/admin_rooms/adminEdit/'.$data['AdminRoom']['id']);?>
        	<?php echo $html->link('Unavailability', '/base/admin_blocks/adminIndex/'.$data['AdminRoom']['id']);?>
        </td>
    </tr>    
    <?php endforeach; ?>		
	</tbody>
	
	<tfoot>    
    <tr>
    	<td colspan="5">
    		<?php echo $form->submit(__('delete',true), array('type'=>'button','div'=>false,'onclick'=>'return confirm("Are you sure to delete them?");')); ?>
    		<?php echo $html->link($form->button(__('add',true), array('type'=>'button')),"/base/admin_rooms/adminAdd/",array('style'=>'text-decoration:none'), null, false); ?>
    	</td>
    </tr>
    <tr>
    	<td colspan="5">
    		<?php echo $this->element('pagination'); ?>
    	</td>
    </tr>
    </tfoot>
</table>
 <?php echo $form->end();?>
</div>