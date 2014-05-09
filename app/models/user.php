<?php
 class User extends AppModel
{
   	var $name = 'User';  
   	var $primaryKey ='id';
	
	

	var $validate = array(
		'username' => array(
			'mustPresent' => array(
				'rule' => 'notEmpty',
				'message' => 'User name can not be empty',				
			),
			'mustUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'This User is taken'
			)
		),
		'password' => array(
			'mustPresent' => array(
				'rule' => 'notEmpty',
				'message' => 'Password can not be empty'
		))
	);
}
?>