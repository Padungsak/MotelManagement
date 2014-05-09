<?php
App::import('Sanitize');

 class BaseModule extends BaseAppModel
{
   	var $name = 'BaseModule';
   	var $primaryKey ='id';
   	
 	var $hasMany = array(
  		'BaseRoleModuleMapMap' => array(
            'className'    => 'Base.BaseRoleModuleMap',
            'foreignKey'    => 'base_module_id'
        )  	
  	);
   	
   	var $validate = array(
		'name' => array(
			'mustPresent' => array(
				'rule' => 'notEmpty',
				'message' => 'Module name can not be empty'
			),
			'mustUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Module name is already taken.'
			),
		)
	);
	

	function beforeSave(){		
		$this->data['BaseModule']['name']=Sanitize::html($this->data['BaseModule']['name'], true);		
		return true;
	}
	
	
	/*
	 * delete module(s)
	 */
	function deleteModule($moduleId){		
		$children = $this->find('all', array (
			'conditions' => array (
				'BaseModule.parent_id' => $moduleId
			)
		));

		
		if (sizeof($children) != 0) {
			foreach ($children as $child) {
				$this->deleteModule($child['BaseModule']['id']);
			}
		}

		$thisModule = $this->id = $moduleId;
		$this->del($thisModule);

		//delete this module
		$thisModule = $this->id = $moduleId;
		$this->del($thisModule);

		//delete its related permissions
		$thisPermissions = $this->BaseRoleModuleMap->find('all', array (
			'conditions' => array (
				'base_module_id' => $moduleId
			)
		));
		foreach ($thisPermissions as $thisPermission) {
			$this->BaseRoleModuleMap->del($thisPermission);
		}
		
		return true;
	}
 
}
?>