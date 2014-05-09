<?php
if(isset($current)&&'home'!=$current){
	 
	 if(isset($current)&&'calendar'!=$current){
	 	echo (isset($current)&&'calendar'!=$current)?  $html->link('<span class="ui-button-text">Calendar</span>','/homes/index_nojs',
	 																			array( 'class'=>'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only',
																				'role'=>'button',		
																				'escape'=>false)) :'';			
		echo (isset($current)&&'room'!=$current)?  $html->link('<span class="ui-button-text">Room</span>','/rooms/index_nojs',
																				array( 'class'=>'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only',
																						'escape'=>false)):'';
	 }else{
	 	echo (isset($current)&&'room'!=$current)?  $html->link('<span class="ui-button-text">Room</span>','/rooms/index_nojs',
	 																			array( 'class'=>'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only',
																						'escape'=>false)):'';
	 }
	
}
	
			
echo (isset($current)&&'account'!=$current)? $html->link('<span class="ui-button-text">My Bookings</span>','/users/account_nojs',
																			array( 'class'=>'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only',
																						'escape'=>false)):'';
	
echo $html->link('<span class="ui-button-text">Log Out</span>','/users/logout',
													array( 'class'=>'ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only',
																						'escape'=>false));
?>
