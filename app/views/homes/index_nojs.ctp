<div>
<h1>Meeting Room Booking System</h1>
</div>

<div class="navi" >
	<?php echo $this->element('navigation_nojs',array('current'=>'home'));?>
</div>

<hr />

<div style="width:600px;margin-top:20px;" align="center">	

	<h4 align="left"> 
		Choose a date to make your bookings:			
	</h4>
</div>


<div align="center">
	<div id="datepicker" class="hasDatepicker">
		
		<?php
		 echo $calendar->show($month,$year);
		?>
		</div>
	</div>
</div>


<?php
 echo $form->create('Room',array('url'=>'/rooms/index_nojs','id'=>'form'));
 echo $form->hidden('date',array('id'=>'date'));
 echo $form->end();
?>