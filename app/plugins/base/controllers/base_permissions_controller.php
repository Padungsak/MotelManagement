<?php
class BasePermissionsController extends BaseAppController {

	var $name = 'BasePermissions';
	var $uses = array (
		'Base.BaseModule',
		'Base.BaseRole',
		'Base.BaseRoleModuleMap',
	);

	/*
	* before filter	
	*/
	function beforeFilter() {
		parent :: beforeFilter();
		$this->layout = 'back';
		//$this->AccessController->allow(array('*'));
	}

	/*
	 * search for roles
	 */
	function adminIndex() {
		
		
		//$this->BaseRoleModuleMap->find('all',array('contain'=>array('BaseRole')));
		//debug($this->BaseRoleModuleMap);
		
		$this->set('datas', $this->BaseRole->find('all', array('contain'=>false)));		
		
	}

	/*
	 * edit permissions
	 */
	function adminEdit($roleId) {

		if (!empty ($this->data)) {
			$this->BaseRoleModuleMap->updatePermission($roleId,$this->data);
		}

		//hidden role
		$this->data['BasePermission']['base_role_id'] = $roleId;

		//for displaying purpose
		$modules = $this->BaseModule->find('threaded', array (
			'order' => 'BaseModule.order DESC'
		));
		$this->set('modules', $modules);

		//for check box	
		$permitModules = $this->BaseRoleModuleMap->find('list', array (
			'conditions' => array (
				'BaseRoleModuleMap.base_role_id' => $roleId
			),
			'fields' => array (
				'BaseRoleModuleMap.base_module_id'
			)
		));
		$this->set('permitModules', $permitModules);

	}

}
?>
