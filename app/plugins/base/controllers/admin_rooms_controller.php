<?php
class AdminRoomsController extends BaseAppController {

	var $name = 'AdminRooms';
	

	var $paginate = array (
		'contain'=>false,
		'limit' => 5,
		'order' => array (
			'AdminRoom.name' => 'asc'
		)
	);
	
	/*
	* before filter	
	*/
	function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'back';		
	//	$this->Auth->allow('login','logout','accessDeny');
		
	//	$this->AccessController->allow(array('login','logout'));		
		
	}

	
	/*
	 * admin index page
	 */
	function adminIndex(){
		$datas = $this->_search($this->data['AdminRoom']['name'], $this->data['AdminRoom']['des']);
		$this->set('datas', $datas);
	}
	
	
	/*
	 * search function for adminIndex
	 */
	function _search($name = null, $des = null) {
		$conditions = array (
			"AdminRoom.id >" => "0"
		);

		if ($name != null) {
			$conditions['AdminRoom.name like'] = '%' . $name . '%';
		}

		if ($des != null) {
			$conditions['AdminRoom.des like'] = '%' . $des . '%';
		}
				
		
		return $this->paginate('AdminRoom', $conditions);
	}
	
	
	/*
	 * add a room
	 */
	function adminAdd() {
		
		
		if (!empty ($this->data)) {						
			
			 $this->AdminRoom->set($this->data);
			
			 if ($this->AdminRoom->validates()) {				
				
				if ($this->AdminRoom->save($this->data)){
						
					$this->_setFlash($this->data['AdminRoom']['name'] . __('saveRecordsSuc', true),'message-box ok');	
					$this->data = null;
					$this->redirect(array (
						'controller' => 'admin_rooms',
						'action' => 'adminIndex'
					));
				}
				
			 }else {
			 		$this->_setFlash($this->AdminRoom->validationErrors,'message-box error');	
			 }			
			 
		}
		
	
	}



	
	/*
	 * edit a room
	 */
	function adminEdit($id = null) {
		if (empty ($this->data)) {
			$this->AdminRoom->id = $id;
			$this->data = $this->AdminRoom->read();

		} else {						
			
			
			$this->AdminRoom->set($this->data);
			if($this->AdminRoom->validates()){	 
				
				$this->data['AdminRoom']['id']=$id;
				
				if ($this->AdminRoom->save($this->data)) {
						
						
						//get name
						$this->AdminRoom->id = $id;
						$this->data = $this->AdminRoom->read();
						
						
						$this->Session->setFlash($this->data['AdminRoom']['name'] . __('editRecordsSuc', true),'default',array('class'=>'message-box ok'));
						$this->redirect(array (
							'controller' => 'admin_rooms',
							'action' => 'adminIndex'
						));
				}			
				
			}else {
			 		$this->_setFlash($this->AdminRoom->validationErrors,'message-box error');	
			 }
		
		}
	}	


	/*
	 * delete rooms
	 */
	function adminDelete() {
		$this->autoRender = false;
		if (isset ($this->data['AdminRoom']['delete']) && sizeof($this->data['AdminRoom']['delete']) > 0) {
			
			$this->AdminRoom->deleteRoom($this->data);
			
			
			$this->Session->setFlash(__('delRecordsSuc', true),'default',array('class'=>'message-box ok'));
		} else {
			$this->Session->setFlash(__('delRecordsError', true),'default',array('class'=>'message-box error'));
		}
		
		$this->redirect(array (
					'controller' => 'admin_rooms',
					'action' => 'adminIndex'
		));

	}
	
}
?>
