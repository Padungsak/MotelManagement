<?php
	echo $html->css('jui/ui-lightness/jquery-ui');
	echo $javascript->link('jquery-ui.min');  
?>
<style type="text/css">	
	.full-day{
		background-color:red;		
	}
	.moderate-day{
		background-color:green;		
	}
</style>


<div style="width:600px;margin-top:20px;" align="center">	

	<h4 align="left"> 
		Choose a date:			
	</h4>
</div>
		 
<div id="datepicker"></div>



<?php
 echo $form->create('Room',array('url'=>'/base/admin_blocks/adminDefine/','id'=>'form'));
 echo $form->hidden('submit',array('value'=>0));
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
			$('#form').attr('action',$('#form').attr('action')+dateText);
			$('#form').submit();
		}
		
			
		$('#datepicker').datepicker(
				{				
				minDate: 0,
				beforeShowDay: setFullDays,
				onSelect: checkThisDay,
				dateFormat: 'yy-mm-dd'
				}
		);
		
		$('a', '.navi').button();		
		
	});


	
</script>
