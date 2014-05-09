<?php
class BaseRolesController extends BaseAppController {

	var $name = 'BaseRoles';
	var $uses = array (
		'Base.BaseRole'
	);

	var $paginate = array (
		'contain'=>false,
		'limit' => 5,
		'order' => array (
			'BaseRole.name' => 'asc'
		)
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

		$this->set('datas', $this->_search($this->data['BaseRole']['create_date'], $this->data['BaseRole']['name']));

	}

	/*
	 * search function for adminIndex
	 */
	function _search($created = null, $name = null) {
		$conditions = array (
			"BaseRole.id >" => "0"
		);

		if ($created != null) {
			$conditions['BaseRole.create_date'] = $created;
		}

		if ($name != null) {
			$conditions['BaseRole.name like'] = '%' . $name . '%';
		}

		return $this->paginate('BaseRole', $conditions);

	}

	/*
	 * edit a role
	 */
	function adminEdit($id = null) {
		if (empty ($this->data)) {
			$this->BaseRole->id = $id;
			$this->data = $this->BaseRole->read();
			
		} else {
			
			$this->BaseRole->set($this->data);
			if($this->BaseRole->validates()){
				$this->data['BaseRole']['modify_date'] = date("Y-m-d H:i:s", time()) ;
			
				if ($this->BaseRole->save($this->data['BaseRole'])) {
	
					$this->Session->setFlash($this->data['BaseRole']['name'] . __('editRecordsSuc', true),'default',array('class'=>'message-box ok'));
					$this->redirect(array (
						'controller' => 'base_roles',
						'action' => 'adminIndex'
					));
				}
			}else{
				$this->_setFlash($this->BaseRole->validationErrors,'message-box error');	
			}
			
		}

	}

	/*
	 * add a role
	 */
	function adminAdd() {
		if (!empty ($this->data)) {


			 $this->BaseRole->set($this->data);
			 
			
			 if($this->BaseRole->validates()){
	
				$now =  date("Y-m-d H:i:s", time()) ;
				$this->data['BaseRole']['create_date'] =$now;
				$this->data['BaseRole']['modify_date'] =$now;
				
				if ($this->BaseRole->save($this->data)) {
		
						$this->Session->setFlash($this->data['BaseRole']['name'] . __('saveRecordsSuc', true),'default',array('class'=>'message-box ok'));
						$this->redirect(array (
							'controller' => 'base_roles',
							'action' => 'adminIndex'
						));
				}
				
			}else {
				$this->_setFlash($this->BaseRole->validationErrors,'message-box error');	
			}
			
		}

	}

	/*
	 * delete roles
	 */
	function adminDelete() {
		$this->autoRender = false;

		if (isset ($this->data['BaseRole']['delete']) && sizeof($this->data['BaseRole']['delete']) > 0) {
			
			$this->BaseRole->deleteRole($this->data);
		
			$this->Session->setFlash(__('delRecordsSuc', true),'default',array('class'=>'message-box ok'));
		} else {
			$this->Session->setFlash(__('delRecordsError', true),'default',array('class'=>'message-box error'));
		}

		$this->redirect(array (
			'controller' => 'base_roles',
			'action' => 'adminIndex'
		));
	}




}
?>
