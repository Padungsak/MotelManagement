<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $uses = array('User','Booking');


	/*
	* before filter	
	*/
	function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'home';		
	}


	
	/*
	 * signUp/login 
	 */
	function login(){
		$this->layout='login';
		
		if(!empty($this->data)) {
			
			$user= $this->User->findByUsername($this->data['User']['username']);
			
			if($user==null)	{				
				
				 $this->User->set($this->data);
				 if($this->User->validates()) {				
				 	    $this->data['User']['password'] = Security::hash($this->data['User']['password']);
				 		if($this->User->save($this->data)){				 			
				 			$this->Session->write('App.uid',$this->User->getLastInsertId());	
				 			$this->redirect('/homes/index');			
				 		}
				 }else{
				 	$this->_setFlash($this->User->validationErrors,'message-box error');	
				 }
						
				
			}else {
				$password = Security::hash($this->data['User']['password']);
							
				if($password == $user['User']['password']) {					
					//set some session variables
					$this->Session->write('App.uid',$user['User']['id']);					
					$this->redirect('/homes/index');	
				}else {
					$this->Session->setFlash('Password is wrong','default',array('class'=>'message-box error'));				
				}
			}
			
			
		}
		
		
	}
	
	
	
	/*
	 * log out
	 */
	function logout(){		
		$this->Session->delete('App.uid');
		$this->redirect('/users/login');	
	}



	/*
	 * account
	 */
	function account(){
	 	
	 	 $data=$this->Booking->find('all',array('contain'=>array('Room'),
												'conditions'=>array('Booking.user_id'=>$this->Session->read('App.uid')),
	 	 										'order'=>'Booking.time DESC'));
	 	 
	 	 $this->set('data',$data);
	 	
	 	// debug($data);
		
	}
	 	
	
	/*
	 * cancel
	 */
	function cancel($ids){
		$idArray = explode(',',$ids);
		
		foreach( $idArray as $id){
			if($this->Booking->find('count',array('conditions'=>array('Booking.id'=>$id,'Booking.user_id'=>$this->Session->read('App.uid'))))==0) {
			   $this->_setFlash("This is not your booking !",'message-box error');	
			   $this->redirect('/users/account');
			}
		}
		
		foreach( $idArray as $id){
				$booking['Booking']['id']=$id;
				$this->Booking->del($booking);
		}
		
		$this->_setFlash("Booking is cancelled",'message-box ok');		
		$this->redirect('/users/account');
		
	}



	/*
	 * no js page
	 */
	function account_nojs(){
		$this->layout='home_nojs';
		$this->account();
	}
	
	
	/*
	 * no js page
	 */
		/*
	 * cancel
	 */
	function cancel_nojs($id){
		
		$idArray = explode(',',$ids);
		
		foreach( $idArray as $id){
			if($this->Booking->find('count',array('conditions'=>array('Booking.id'=>$id,'Booking.user_id'=>$this->Session->read('App.uid'))))==0) {
			   $this->_setFlash("This is not your booking !",'message-box error');	
			   $this->redirect('/users/account_nojs');
			}
		}
		
		foreach( $idArray as $id){
				$booking['Booking']['id']=$id;
				$this->Booking->del($booking);
		}
		
		$this->_setFlash("Booking is cancelled",'message-box ok');		
		$this->redirect('/users/account_nojs');
		
	}

}
?>
