<?php
	echo $html->css('jui/ui-lightness/jquery-ui');
	echo $javascript->link('jquery-ui.min');  
?>
<style type="text/css">	
	.block{background:yellow;}
	#selectable .ui-selecting { background: #FECA40; }
	#selectable .ui-selected { background: #F39814; color: white; }
	#selectable { list-style-type: none; margin: 0; padding: 0;}
	#selectable li { margin: 3px; padding: 0.4em; font-size: 12px; height: 10px; width:200px;}
</style>
	

<div>
<h1>
UNAVAILABILITY ON <?php echo $time->format('m-d-y',$session->read('App.date')); ?>
</h1>

</div>


<div style="width:600px;margin-top:20px;margin-bottom:20px;" align="center">	
	<div class="demo">
		<h4 align="left">Select time slots below:</h4>
		
	<ol id="selectable">
		<?php 
			
		
		foreach($slots as $key=>$value){
			?>
		<li class="ui-widget-content   <?php echo in_array($value,$timeBlocked)?' ui-state-disabled block':''; ?>" ><?php echo $key ?><input type="hidden" value="<?php echo $value; ?>"></input></li>
		<?php 
		}
		?>	
	</ol>
	
	</div>
</div>

<div class="navi" align="center" >
	<?php
	 echo $form->create('AdminBlock ',array('url'=>'/base/admin_blocks/adminDefine/'.$session->read('App.date'),'id'=>'form'));
	 echo $form->hidden('AdminBlock.time',array('id'=>'time'));	
	 echo $form->hidden('AdminBlock.submit',array('value'=>1)); 
	 echo $form->hidden('AdminBlock.unblock',array('value'=>0)); 
	 echo $form->submit('Block ',array('div'=>false));
	 echo $form->end();
	?>	
	<?php
	 echo $form->create('AdminBlock ',array('url'=>'/base/admin_blocks/adminDefine/'.$session->read('App.date'),'id'=>'form'));
	 echo $form->hidden('AdminBlock.time',array('id'=>'timeUnblock'));	
	 echo $form->hidden('AdminBlock.submit',array('value'=>1)); 
	 echo $form->hidden('AdminBlock.unblock',array('value'=>1)); 
	 echo $form->submit('Unblock ',array('div'=>false));
	  echo $form->end();
	?>
</div>




<script type="text/javascript">
	$(function() {
			
		function setTime(){
				$('#time').val("");
				$('#timeUnblock').val("");
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
					
					var old = $('#timeUnblock').val();
					if(""===old){
						$('#timeUnblock').val(value);
					}else {
						value=old+","+value;
						$('#timeUnblock').val(value);
					}
					
					
					return true;
				});				
				
				
		}
		
		
		$("#selectable").selectable({stop:setTime});
		//$("#selectable").selectable( 'disable' )
		
		$('input[type=submit], a', '.navi').button();		
	});
</script>