<?php
App::import('Sanitize');

 class BaseRole extends BaseAppModel
{
   	var $name = 'BaseRole';
   	var $primaryKey ='id';
   	
   	
   	var $hasMany = array(
  		'BaseUserRoleMap' => array(
            'className'    => 'Base.BaseUserRoleMap',
            'foreignKey'    => 'base_role_id'
        ),
        'BaseRoleModuleMap' => array(
            'className'    => 'Base.BaseRoleModuleMap',
            'foreignKey'    => 'base_role_id'
        )  	
  	);
  	
  	
  	
	var $validate = array(
		'name' => array(
			'mustPresent' => array(
				'rule' => 'notEmpty',
				'message' => 'Role name can not be empty'
			),
			'mustUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Role name is already taken.'
			),
		)
	);
	

	
	function beforeSave(){		
		$this->data['BaseRole']['name']=Sanitize::html($this->data['BaseRole']['name'], true);		
		return true;
	}
	
	
	/*
	 * delete role(s)
	 */
	function deleteRole($data) {
			foreach ($data['BaseRole']['delete'] as $item) {
				$this->del($item);

				//delete its related permission
				$thisPermissions = $this->BaseRoleModuleMap->find('all', array (
					'conditions' => array (
						'base_role_id' => $item
					)
				));
				foreach ($thisPermissions as $thisPermission) {
					$this->BaseRoleModuleMap->del($thisPermission);
				}

				//delete its related userRole Map
				$maps = $this->BaseUserRoleMap->find('all', array (
					'conditions' => array (
						'BaseUserRoleMap.base_role_id' => $item
					)
				));
				foreach ($maps as $map) {
					$this->BaseUserRoleMap->del($map['BaseUserRoleMap']);
				}

			}
			
			return true;
	}
 
}
?>