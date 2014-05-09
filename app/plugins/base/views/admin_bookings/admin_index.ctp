

<div>
	<p class="message-box info">
	 		This module is for viewing/deleting Bookings.		  
	</p>
</div>





<div id='data'>
<?php echo $form->create('AdminBooking', array('action' => 'adminDelete')); ?>
<table width="100%" class="tablesorter">	
	<thead>
	    <tr>
	        <th class='{sorter: false}'>Select</th>
	        <th>Time</th>
	        <th>User</th>	      
	        <th>Room Name</th>
        </tr>
    </thead>
    
   
	
	<tbody>			
    <?php foreach ($data as $dt): ?>
    <tr>      
      	<td>
      		<input type="checkbox" name=<?php echo 'data[AdminBooking][delete][]';?> value=<?php echo $dt['AdminBooking']['id'];?> />
      	</td>
        <td>
        
        <?php
         $from = $dt['AdminBooking']['time'];    
         $fromStr = strtotime($from);
     	 $later= date('Y-m-d h:i:s', mktime(date('h',$fromStr),date('i',$fromStr)+TIMESLOT,date('s',$fromStr),date('m',$fromStr),date('d',$fromStr),date('Y',$fromStr)));    
     	 echo  $time->format('d-m-Y',$from).' '. $time->format('h:i',$from).' to '.$time->format('h:i',$later);  
     	 ?>
        </td>
        <td><?php echo $dt['AdminUser']['username']; ?></td>
        <td><?php echo $dt['AdminRoom']['name']; ?></td>
    </tr>    
    <?php endforeach; ?>		
	</tbody>
	
	<tfoot>    
    <tr>
    	<td colspan="4">
    		<?php echo $form->submit(__('delete',true), array('type'=>'button','div'=>false,'onclick'=>'return confirm("Are you sure to delete them?");')); ?>
    		
    	</td>
    </tr>
    <tr>
    	<td colspan="4">
    		<?php echo $this->element('pagination'); ?>
    	</td>
    </tr>
    </tfoot>
</table>
 <?php echo $form->end();?>
</div>