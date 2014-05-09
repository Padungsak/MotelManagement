<?php
/*
 * if using BaseRoleModuleMap as desired Model name, it wont work.
 * to fix when reason is revealed
 */

 class BaseRoleModuleMap extends BaseAppModel
{

   	var $name = 'BaseRoleModuleMap';
   	var $primaryKey ='id';
   
   
     
     /*
	 * Edit permission
	 */
	function updatePermission($roleId,$data) {
		
			//delete all exsiting modules
			
			$exsitingModuleIds = $this->find('all', array (
				'conditions' => array (
					'BaseRoleModuleMap.base_role_id' => $roleId
				)
			));
			foreach ($exsitingModuleIds as $exsit) {
				$this->del($exsit['BaseRoleModuleMap']);
			}

			//add all checked modules

			foreach ($data['BasePermission']['check'] as $moduleId) {
				//echo $moduleId;
				$this->create();
				$permission['BaseRoleModuleMap']['base_role_id'] = $data['BasePermission']['base_role_id'];
				$permission['BaseRoleModuleMap']['base_module_id'] = $moduleId;
				$permission['BaseRoleModuleMap']['status'] = 1;
				$this->save($permission);
			}
	}
}
?>