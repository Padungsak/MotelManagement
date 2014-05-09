<style type="text/css">	
	.full{background:red;}
	.block{background:yellow;}
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
	<?php echo $this->element('navigation',array('current'=>'booking'));?>	
</div>

<hr />


<div style="width:600px;margin-top:20px;margin-bottom:20px;" align="center">	
	<div class="demo">
		<h4 align="left">
		Select time slots below:
		</h4>
		<h6>
				Red: slot has been booked<br/>
		   Yellow: slot has been blocked
		
		
		</h6>
		
	<ol id="selectable">
		<?php 		
		foreach($slots as $key=>$value){
			
			?>
		<li class="ui-widget-content <?php if(in_array($value,$timeBooked)){echo' ui-state-disabled full';}else if(in_array($value,$blocks)){echo ' ui-state-disabled block';}else{ echo '';} ?>" >
		
		<?php echo $key ?><input type="hidden" value="<?php echo $value; ?>"></input></li>
		<?php 
		}
		?>	
	</ol>
	
	</div>
</div>

<div class="navi" align="center" >
	<?php
	 echo $form->create('Booking',array('url'=>'/bookings/book','id'=>'form'));
	 echo $form->hidden('time',array('id'=>'time'));	 
	 echo $form->submit('Book',array('div'=>false));
	?>
</div>




<script type="text/javascript">
	$(function() {
			
		function setTime(){
				$('#time').val("");
				$(".ui-selected", this).each(function(){
					var index = $("#selectable li").index(this);					
					var value=$('#selectable input').eq(index).val();
					
					var old = $('#time').val();
					if(""===old){
						$('#time').val(value);
					}else {
						value=old+","+value;
						$('#time').val(value);
					}
					
					return true;
				});				
		}
		
		
		$("#selectable").selectable({stop:setTime});
		//$("#selectable").selectable( 'disable' )
		
		$('input[type=submit], a', '.navi').button();		
	});
</script>