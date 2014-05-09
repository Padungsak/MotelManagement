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
	<?php echo $this->element('navigation',array('current'=>'room'));?>
</div>

<hr />


<div style="width:600px;margin-top:20px;" align="center">	
		
		<h4 align="left">List of rooms:</h2>
		
		
		<div class="demo">
		
		<ol id="selectable">
			<?php
			foreach($data as $dt){
				?>
				<li class="ui-state-default <?php echo 1!=$dt['Room']['status']?' ui-state-disabled':''; ?>">
					<?php echo $dt['Room']['name'];  
						   echo 1!=$dt['Room']['status']?'<i class="closed">unavailable</i>':'';  
							echo $form->hidden('rooms',array('value'=>$dt['Room']['id']));?>
				</li>
			<?php
			}
			?>			
			
		</ol>
		
		</div>
</div>



<?php
 echo $form->create('Booking',array('url'=>'/bookings/index','id'=>'form'));
 echo $form->hidden('room',array('id'=>'room'));
 echo $form->end();
?>






<script type="text/javascript">
	$(function() {
		
		function viewSelected(){
				
				$(".ui-selected", this).each(function(){
					var index = $("#selectable li").index(this);					
					var value=$('#selectable input').eq(index).val();
					$('#room').val(value);
					
					if(!$(this).hasClass('ui-state-disabled')){
						$('#form').submit();	
						return true;
					}else{
						return false;
					}			
					
				});
		}
			
		$("#selectable").selectable({selected:viewSelected});
		$(".ui-state-disabled").selectable( 'disable' );
		
		$('a', '.navi').button();		
		
	});
</script>
