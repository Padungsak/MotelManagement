<div class="search-area">
 <span class="collapse-panel-close">-Search</span>
 <span class="collapse-panel-open">+Search</span>
 <?php  echo $form->create('BaseUser', array('action' => 'adminIndex','class'=>'common-fieldset')); ?>
  <fieldset>
   
    	
    	<?php echo $form->label('User Name'); ?>
    	<?php echo $form->text('BaseUser.username', array('size' => '30')); ?>
    	
        <?php echo $form->submit('Search'); ?>
    	
    	
  </fieldset>
<?php  echo $form->end(); ?>
</div>


<div>
	<p class="message-box info">
	 		This module is for adding/editing/deleting Users as well as assigning Role to User.		  
	</p>
</div>





<div id='data'>
<?php echo $form->create('BaseUser', array('action' => 'adminDelete')); ?>
<table width="100%" class="tablesorter">	
	<thead>
	    <tr>
	        <th class='{sorter: false}'>Select</th>
	        <th>Name</th>
	        <th>Created Date</th>
	        <th>Modified Date</th>
	        <th class="{sorter: false}">Action</th>
        </tr>
    </thead>
    
   
	
	<tbody>			
    <?php foreach ($datas as $data): ?>
    <tr>      
      	<td>
      		<input type="checkbox" name=<?php echo 'data[BaseUser][delete][]';?> value=<?php echo $data['BaseUser']['id'];?> />
      	</td>
        <td><?php echo $data['BaseUser']['username']; ?></td>
        <td><?php echo $time->format('d-m-Y',$data['BaseUser']['create_date']); ?></td>
        <td><?php echo $time->format('d-m-Y',$data['BaseUser']['modify_date']); ?></td>
        <td ><?php echo $html->link('Edit', '/base/base_users/adminEdit/'.$data['BaseUser']['id']);?></td>
    </tr>    
    <?php endforeach; ?>		
	</tbody>
	
	<tfoot>    
    <tr>
    	<td colspan="5">
    		<?php echo $form->submit(__('delete',true), array('type'=>'button','div'=>false,'onclick'=>'return confirm("Are you sure to delete them?");')); ?>
    		<?php echo $html->link($form->button(__('add',true), array('type'=>'button')),"/base/base_users/adminAdd/",array('style'=>'text-decoration:none'), null, false); ?>
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