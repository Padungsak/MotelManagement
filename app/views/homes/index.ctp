<style type="text/css">	
	.full-day{
		background-color:red;		
	}
	.moderate-day{
		background-color:green;		
	}
</style>
	

<div>
<h1>Meeting Room Booking System</h1>
</div>

<div class="navi" >	
	<?php echo $this->element('navigation',array('current'=>'home'));?>
</div>

<hr />

<div style="width:600px;margin-top:20px;" align="center">	

	<h4 align="left"> 
		Choose a date to make your bookings:
			
	</h4>
</div>
		 
<div id="datepicker"></div>



<?php
 echo $form->create('Room',array('url'=>'/rooms/index','id'=>'form'));
 echo $form->hidden('date',array('id'=>'date'));
 echo $form->end();
?>

<script type="text/javascript">
	$(function() {			
		var fullDays = [];
	
	
	  
	
		function setFullDays(date) {
			for (i = 0; i < fullDays.length; i++) {
		      if (date.getMonth() == fullDays[i][0] - 1
		          && date.getDate() == fullDays[i][1]) {
		        return [true,'full-day','Fully booked'];
		      }
		    }
		  return [true];
		}
		
		
		function checkThisDay(dateText, inst){
			var altFormat = $('#datepicker').datepicker('option', 'altFormat');
			$('#date').val(dateText);
			$('#form').submit();
		}
		
			
		$('#datepicker').datepicker(
				{				
				minDate: 0,
				beforeShowDay: setFullDays,
				onSelect: checkThisDay
				}
		);
		
		$('a', '.navi').button();		
		
	});


	
</script>
