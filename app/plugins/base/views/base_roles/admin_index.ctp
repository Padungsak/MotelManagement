<div class="search-area">
 <span class="collapse-panel-close">-Search</span>
 <span class="collapse-panel-open">+Search</span>
<?php  echo $form->create('BaseRole', array('action' => 'adminIndex','class'=>'common-fieldset')); ?>
  <fieldset>
  		
    	
    	<?php echo $form->label('Role Name'); ?>
    	<?php echo $form->text('BaseRole.name', array('size' => '30')); ?>
    	
    	
        <?php echo $form->submit('Search'); ?>
    	
    	
  </fieldset>
<?php  echo $form->end(); ?>
</div>


<div>
	<p class="message-box info">
		  This module is for adding/editing/deleting Roles.
	</p>
</div>


<div id='data'>
<?php echo $form->create('BaseRole', array('action' => 'adminDelete')); ?>
<table width="100%" class="tablesorter">
	<thead>
		<tr>
        <th class='{sorter: false}'>Select</th>
        <th>Name</th>
        <th>Created Date</th>
        <th>Modified Date</th>
        <th class='{sorter: false}'>Action</th>
        </tr>
    </thead>
    <tfoot>
    
    <tr>
    	<td colspan="5">
    		<?php echo $form->submit(__('delete',true), array('type'=>'button','div'=>false,'onclick'=>'return confirm("Are you sure to delete them?");')); ?>
    		<?php echo $html->link($form->button(__('add',true), array('type'=>'button')),"/base/base_roles/adminAdd/",array('style'=>'text-decoration:none'), null, false); ?>
    	</td>
    </tr>
    <tr>
    	<td colspan="5">
    		<?php echo $this->element('pagination'); ?>
    	</td>
    </tr>
    </tfoot>
	
	<tbody>			
    <?php foreach ($datas as $data): ?>
    <tr>      
      	<td width="5%">
      		<input type="checkbox" name=<?php echo 'data[BaseRole][delete][]';?> value=<?php echo $data['BaseRole']['id'];?> />
      	</td>
        <td align="middle"><?php echo $data['BaseRole']['name']; ?></td>
        <td><?php echo $time->format ('d-m-Y',$data['BaseRole']['create_date']); ?></td>
        <td><?php echo $time->format ('d-m-Y',$data['BaseRole']['modify_date']); ?></td>
        <td width="10%"> <?php echo $html->link('Edit', '/base/base_roles/adminEdit/'.$data['BaseRole']['id']);?></td>
    </tr>    
    <?php endforeach; ?>	
	
	</tbody>
</table>
 <?php echo $form->end();?>
</div>


