<?php
class BaseModulesController extends BaseAppController {

	var $name = 'BaseModules';
	var $uses = array (
		'Base.BaseModule'
	);

	/*
	* before filter	
	*/
	function beforeFilter() {
		parent :: beforeFilter();

		$this->layout = 'back';
		
	}

	/*
	 * admin Index page
	 */
	function adminIndex() {

		/*
		$tops=$this->BaseModule->find('all',array('conditions'=>array('BaseModule.parent_id'=>null)));
		if($tops==null){
			echo 'missing top parent node';
			die;
		}*/

		$modules = $this->BaseModule->find('threaded', array (
			'contain'=>false,
			'order' => 'BaseModule.order DESC'
		));
		$this->set('modules', $modules);
		//debug($modules);
		//die;

	}

	/*
	 * admin Add page
	 */
	function adminAdd($parentId = null) {

		if (!empty ($this->data)) {
			
			$this->BaseModule->set($this->data);
			if ($this->BaseModule->validates()) {
				if ($this->BaseModule->save($this->data)) {
					
					$this->redirect('/base/base_modules/adminIndex');
				}
			}else {
				$this->_setFlash($this->BaseModule->validationErrors,'message-box error');	
			}
		} else {
			$this->data['BaseModule']['parent_id'] = $parentId;
		}

	}

	/*
	 * admin Edit page
	 */
	function adminEdit($moduleId = null) {

		if (!empty ($this->data)) {
			if ($this->BaseModule->save($this->data)) {
				$this->redirect(array (
					'controller' => 'BaseModules',
					'action' => 'adminIndex'
				));
			}
		} else {
			$this->BaseModule->id = $moduleId;
			$this->data = $this->BaseModule->read();
		}

	}

	/*
	 * admin Delete page
	 */
	function adminDelete($moduleId) {		
		if($this->BaseModule->deleteModule($moduleId))	{
			$this->_setFlash('Role(s) has(have) been deleted','message-box ok');	
			$this->redirect('/base/base_modules/adminIndex');
		}	
	}

}
?>
