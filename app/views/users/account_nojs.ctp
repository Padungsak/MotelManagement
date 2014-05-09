<style type="text/css">	
	table.tablesorter{
		
	}
</style>
	

<div>
<h1>
My BOOKINGS
</h1>

</div>

<div class="navi" >
	<?php echo $this->element('navigation_nojs',array('current'=>'account'));?>	
</div>

<hr />

<div class="content" style="width:600px;margin-top:20px;margin-bottom:20px;" align="center">	
	<table width="100%" class="tablesorter" cellpadding="5px" >	
	<thead>
	    <tr>	       
	        <th>Meeting Details</th>
	        <th>Action</th>
        </tr>
    </thead>
    
   
	
	<tbody>			
    <?php 
     
     function findFrom($times,$i_static,$time,$deleteIds){
     	   $from = $times[$i_static]['Booking']['time'];    
     	   if($i_static==(sizeof($times)-1)){
     	   		return $from;
     	   }else if (($time->toUnix($times[$i_static]['Booking']['time'])-$time->toUnix($times[$i_static+1]['Booking']['time']))/3600==0.5){
     	   		$deleteIds = $deleteIds.','.$times[$i_static+1]['Booking']['id'];
     	   		$i_static=$i_static+1;
     	   		$from =findFrom($times,&$i_static,$time,&$deleteIds);
     	   }else {
     	   		return $from;
     	   }    
     	   return $from; 	     		
     }
     
     for ($i_static=0;$i_static<(sizeof($data));$i_static++){
     	 $deleteIds = $data[$i_static]['Booking']['id'];
     	
     	 $to = $data[$i_static]['Booking']['time'];    
     	 $from = findFrom($data,&$i_static,$time,&$deleteIds);
     	 	 	
     	 echo '<tr>';        
         echo '<td>'; 
         
     	 $toStr = strtotime($to);
     	 $later= date('Y-m-d h:i:s', mktime(date('h',$toStr),date('i',$toStr)+30,date('s',$toStr),date('m',$toStr),date('d',$toStr),date('Y',$toStr)));    
     	 echo  $time->format('d-m-Y',$from).' '. $time->format('h:i',$from).' to '.$time->format('h:i',$later).' in '.$data[$i_static]['Room']['name'];    	
     	 echo '<br/>';
       	 echo  '<i>Time To Go: '.$time->relativeTime($from).'</i>';	  
     	 
     	 echo '</td>';
         echo '<td align="center" >'.$html->link('Cancel', '/users/cancel/'.$deleteIds,array('onclick'=>'return confirm("Are you sure to cancel this meeting?")')).'</td>';
         echo '</tr>';
       
    	
    }
     ?>		
	</tbody>	
	
	</table>
</div>





<script type="text/javascript">
	$(function() {		
		$('input[type=submit], a', '.content,.navi').button();		
	});
</script>