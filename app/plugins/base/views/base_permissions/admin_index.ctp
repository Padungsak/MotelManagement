<div>
	<p class="message-box info">
		  This module is for assigning access rights for Roles.
	</p>
</div>


<table width="100%" class="tablesorter">	
	<thead>
		<tr>
        <th class='{sorter: false}'>Select</th>
        <th>Name</th>
        <th>Created Date</th>
        <th class='{sorter: false}'>Action</th>
        </tr>
    </thead>
    
	<tbody>			
    <?php foreach ($datas as $data): ?>
    <tr>      
      	<td width="5%">
      		<input type="checkbox" name=<?php echo 'data[BaseRole][delete][]';?> value=<?php echo $data['BaseRole']['id'];?> />
      	</td>
        <td align="middle"><?php echo $data['BaseRole']['name']; ?></td>
        <td><?php echo $time->format('d-m-Y',$data['BaseRole']['create_date']); ?></td>
        <td width="10%"> <?php echo $html->link('Edit', '/base/base_permissions/adminEdit/'.$data['BaseRole']['id']);?></td>
    </tr>    
    <?php endforeach; ?>	
	</tbody>
</table>