<?php
App::import('Sanitize');

 class BaseUser extends BaseAppModel
{
   	var $name = 'BaseUser';
   	var $primaryKey ='id';
  	
  	var $hasMany = array(
  		'BaseUserRoleMap' => array(
            'className'    => 'Base.BaseUserRoleMap',
            'foreignKey'    => 'base_user_id'
        )  	
  	);
  	
  	
  	var $validate = array(
		'username' => array(
			'mustPresent' => array(
				'rule' => 'notEmpty',
				'message' => 'User name can not be empty',
				
			),
			'mustUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'User name is already taken.'
			),
		),
		'password' => array(
			'mustPresent' => array(
				'rule' => 'notEmpty',
				'message' => 'Passwors can not be empty'
		)),
	);

  
  
	function beforeSave(){		
		if(!empty($this->data['BaseUser']['username'])){
		$this->data['BaseUser']['username']=Sanitize::html($this->data['BaseUser']['username'], true);		
		}
		
		return true;		
	}
	
 	
 	/*
 	 * delete user(s)
 	 */
 	function deleteUser($data) {
 			foreach ($data['BaseUser']['delete'] as $item) {
				$this->del($item);

				//delete its related userRole Map
				$maps = $this->BaseUserRoleMap->find('all', array ('conditions' => array ('BaseUserRoleMap.base_user_id' => $item)));
				foreach ($maps as $map) {
						$this->BaseUserRoleMap->del($map['BaseUserRoleMap']);
				}

			}
			
			return true;
 	}
 	
 	/*
 	 * create a user
 	 */
 	function createUser($data) {
 		
 				$now = date("Y-m-d H:i:s", time()) ;
				$data['BaseUser']['create_date'] = $now;
				$data['BaseUser']['modify_date'] = $now;
			
 				$data['BaseUser']['password'] = Security::hash($data['BaseUser']['password']);
 					
 				if($this->save($data)) {
 					//save user role map
					$newUserId = $this->getLastInsertId();					
					
					
					if(isset($data['BaseRole']['check'])) {
						foreach($data['BaseRole']['check'] as $checkId) {
							$newUserRole['BaseUserRoleMap']['base_user_id'] =  $newUserId;
							$newUserRole['BaseUserRoleMap']['base_role_id'] =  $checkId;
							
							
						    debug($newUserId);
							debug($checkId);
							$this->BaseUserRoleMap->create();
							$this->BaseUserRoleMap->save($newUserRole['BaseUserRoleMap']);
						}
					}
					
					return true;
 				}else {
 					return false;
 				}
 	}


	 /*
	  * update a user
	  */
	function updateUser($data) {
		
		    $data['BaseUser']['modify_date'] = $now = date("Y-m-d H:i:s", time()) ;
		    if($this->save($data,false,array('modify_date'))) {
		    		//delete exsiting user role maps
					$exsitingMaps = $this->BaseUserRoleMap->find('all',array('conditions'=>array('base_user_id'=>$data['BaseUser']['id'])));
					foreach($exsitingMaps as $map) {
						$this->BaseUserRoleMap->del($map['BaseUserRoleMap']);
					}
					
					//save user role map
					foreach($data['BaseRole']['check'] as $checkId) {
						$newUserRole['BaseUserRoleMap']['base_user_id'] =  $data['BaseUser']['id'];
						$newUserRole['BaseUserRoleMap']['base_role_id'] =  $checkId;
						$this->BaseUserRoleMap->create();
						$this->BaseUserRoleMap->save($newUserRole['BaseUserRoleMap']);
					}
		    }			
			return true;
			
	}

}
?>