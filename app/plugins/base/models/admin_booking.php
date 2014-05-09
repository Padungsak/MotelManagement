<?php

 class AdminBooking extends BaseAppModel
{
   	var $name = 'AdminBooking';
   	var $useTable='bookings';
   	var $primaryKey ='id';
   	

   	var $belongsTo = array(
  		'AdminRoom' => array(
            'className'    => 'Base.AdminRoom',
            'foreignKey'    => 'room_id'
        ) ,
        'AdminUser' => array(
            'className'    => 'Base.AdminUser',
            'foreignKey'    => 'user_id'
        )  	
  	);
	
	
}
?>