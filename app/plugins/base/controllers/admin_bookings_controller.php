<?php
class AdminBookingsController extends BaseAppController {

	var $name = 'AdminBookings';
	

	var $paginate = array (
		'contain'=>array('AdminRoom','AdminUser'),
		'limit' => 10,
		'order' => array (
			'AdminBooking.time' => 'asc'
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
		$data =  $this->paginate('AdminBooking');
		$this->set(compact('data'));
	}
	
	

	/*
	 * delete bookings
	 */
	function adminDelete() {
		$this->autoRender = false;
		if (isset ($this->data['AdminBooking']['delete']) && sizeof($this->data['AdminBooking']['delete']) > 0) {
			
			foreach($this->data['AdminBooking']['delete'] as $dl){
				$this->AdminBooking->delete($dl);
			}
			
			$this->Session->setFlash(__('delRecordsSuc', true),'default',array('class'=>'message-box ok'));
		} else {
			$this->Session->setFlash(__('delRecordsError', true),'default',array('class'=>'message-box error'));
		}
		
		$this->redirect(array (
					'controller' => 'admin_bookings',
					'action' => 'adminIndex'
		));

	}
	
}
?>
