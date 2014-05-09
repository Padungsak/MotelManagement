<?php
if(isset($current)&&'home'!=$current){
	 
	 if(isset($current)&&'calendar'!=$current){
	 	echo (isset($current)&&'calendar'!=$current)?  $html->link('Calendar','/homes/index') :'';			
		echo (isset($current)&&'room'!=$current)?  $html->link('Room','/rooms/index'):'';
	 }else{
	 	echo (isset($current)&&'room'!=$current)?  $html->link('Room','/rooms/index'):'';
	 }
	
}
	
			
echo (isset($current)&&'account'!=$current)? $html->link('My Bookings','/users/account'):'';
	
echo $html->link('Log Out','/users/logout');
?>
