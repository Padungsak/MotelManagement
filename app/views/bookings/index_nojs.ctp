<style type="text/css">	
	.full{background:red;}
	#selectable .ui-selecting { background: #FECA40; }
	#selectable .ui-selected { background: #F39814; color: white; }
	#selectable { list-style-type: none; margin: 0; padding: 0;}
	#selectable li { margin: 3px; padding: 0.4em; font-size: 12px; height: 10px; width:200px;}
</style>
	

<div>
<h1>
BOOKINGS ON <?php echo $thisDay; ?>
<br/> 
FOR ROOM <?php echo $thisRoom['Room']['name']; ?>
</h1>

</div>

<div class="navi" >
	<?php echo $this->element('navigation_nojs',array('current'=>'booking'));?>	
</div>

<hr />


<div style="width:600px;margin-top:20px;margin-bottom:20px;" align="center">	
	<div class="demo">
		<h4 align="left">Select time slots below:</h4>
	
	<?php  echo $form->create('Booking',array('url'=>'/bookings/book_nojs','id'=>'form'));?>	
	<ol id="selectable">
		<?php 		
		
		foreach($slots as $key=>$value){	
		?>
				<li class="ui-widget-content   <?php echo in_array($value,$timeBooked)?' ui-state-disabled full':''; ?>" >
					<?php echo !in_array($value,$timeBooked)?$form->checkbox('times',array('value'=> $value,'name'=>'data[Booking][times][]')):''; ?> <?php echo $key ?>
				</li>
		<?php 
		}
		?>	
	</ol>
	
	<br/>
	<br/>
	<?php  echo $form->submit('Book',array('div'=>false));?>
	</div>
</div>