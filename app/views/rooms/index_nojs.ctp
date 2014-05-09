<style type="text/css">		
	#selectable .ui-selecting { background: #FECA40; }
	#selectable .ui-selected { background: #F39814; color: white; }
	#selectable { list-style-type: none; margin: 0; padding: 0; }
	#selectable li { margin: 3px; padding: 1px; float: left; width: 100px; height: 80px; font-size: 14px; text-align: center; }
</style>
	
	
	

<div>
<h1>BOOKINGS ON <?php echo $thisDay; ?></h1>
</div>

<div class="navi" >
	<?php echo $this->element('navigation_nojs',array('current'=>'room'));?>
</div>

<hr />


<div style="width:600px;margin-top:20px;" align="center">	
		
		<h4 align="left">List of rooms:</h2>
		
		
		<div class="demo">
		
		<ol id="selectable">
			<?php
			foreach($data as $dt){
				?>
				<li class="ui-state-default">				
					<?php
					if(1==$dt['Room']['status']){
					 echo $form->create('Booking',array('url'=>'/bookings/index_nojs','id'=>'form'));
					 echo $form->hidden('room',array('value'=>$dt['Room']['id']));
					 echo $dt['Room']['name'];
					 echo $form->submit('select');
					 echo $form->end();
					}else{
						echo $dt['Room']['name'];
						echo '<i class="closed">unavailable</i>';
					}
					?>

				</li>
			<?php
			}
			?>			
			
		</ol>
		
		</div>
</div>