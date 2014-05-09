<?php
class AdminBlocksController extends BaseAppController {

	var $name = 'AdminBlocks';
	var $uses = array('Base.AdminBlock');


	/*
	* before filter	
	*/
	function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'back';		
	}

	function adminIndex($roomId=null) {
		$this->Session->write('App.room',$roomId);
	}
	
	function adminDefine($date=null){
		
		//view
			//get date
			$this->Session->write('App.date',$date);
			//get blocked
			$data['AdminBlock']['room_id']=$this->Session->read('App.room');
			$data['AdminBlock']['time']=($this->Session->read('App.date'));
			$timeBlocked=$this->AdminBlock->getTimeBlocked($data);
			//get slots
			$slots=$this->AdminBlock->getSlots();
			//set data
			$this->set('slots',$slots);
			$this->set('timeBlocked',$timeBlocked);			
			//define
			if(!empty($this->data)&&isset($this->data['AdminBlock']['submit'])&&$this->data['AdminBlock']['submit']){
			//debug($this->data);
			
					$slots = explode(',',$this->data['AdminBlock']['time']);	
					
					//validation
					if($slots[0]==''||sizeof($slots)==0){
						$this->_setFlash('Please select time slots','message-box error');	
						$this->redirect('/base/admin_blocks/adminDefine/'.$this->Session->read('App.date'));		
					}
					
					
					if(1==($this->data['AdminBlock']['unblock'])){
						//delete(unblock)
						foreach($slots as $slot){
							$data['AdminBlock']['room_id']=$this->Session->read('App.room');
							$data['AdminBlock']['time']=$this->Session->read('App.date').' '.$slot;
							
							$this->AdminBlock->unBlock($data);
						}
						
						$this->_setFlash('Unblocking is completed','message-box ok');					
						$this->redirect('/base/admin_blocks/adminDefine/'.$this->Session->read('App.date'));		
						
					}else{
						//save(block)
						
						//loop validate first
						foreach($slots as $slot){
							$data['AdminBlock']['room_id']=$this->Session->read('App.room');
							$data['AdminBlock']['time']=$this->Session->read('App.date').' '.$slot;
							
								$this->AdminBlock->set($data);
								if(!$this->AdminBlock->validates()) {
									$this->_setFlash($this->AdminBlock->validationErrors,'message-box error');	
									$this->redirect('/base/admin_blocks/adminDefine/'.$this->Session->read('App.date'));		
									return;
								} 				
						}
						
						
						foreach($slots as $slot){
							$data['AdminBlock']['room_id']=$this->Session->read('App.room');
							$data['AdminBlock']['time']=$this->Session->read('App.date').' '.$slot;
							
							
							$this->AdminBlock->create();
							$this->AdminBlock->save($data);
						}
					
						$this->_setFlash('Blocking is completed','message-box ok');					
						$this->redirect('/base/admin_blocks/adminDefine/'.$this->Session->read('App.date'));		
					}
				
			}
		
	}
	
	
	
	/*
	 * no javascript page
	 */
	function index_nojs($month=null,$year=null){
		$this->layout='AdminBlock_nojs';
		
		
		
		$year!=null?$this->set('year',$year):$this->set('year',null);
		$month!=null?$this->set('month',$month):$this->set('month',null);
		
	}
	
	
}
?>
