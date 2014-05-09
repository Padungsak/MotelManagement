<?php
class BookingsController extends AppController {

	var $name = 'Bookings';
	var $uses = array('Room','Booking');


	/*
	* before filter	
	*/
	function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'home';		
	}

	function index() {
		
		if(!empty($this->data)){
			$this->Session->write('App.room',$this->data['Booking']['room']);
		}
		
		$thisRoom=$this->Room->find('first',array('conditions'=>array('Room.id'=>$this->Session->read('App.room'))));
		
		
		$data['Booking']['room_id']=$this->Session->read('App.room');
		$data['Booking']['time']=$this->dateconvert($this->Session->read('App.date'));
		$timeBooked=$this->Booking->getTimeBooked($data);
		
		$slots=$this->Booking->getSlots();
		
		$data['Block']['room_id']=$data['Booking']['room_id'];
		$data['Block']['time']=$data['Booking']['time'];
		$blocks=$this->Room->Block->getTimeBlocked($data);
		
		$this->set('blocks',$blocks);
		$this->set('slots',$slots);
		$this->set('timeBooked',$timeBooked);
		$this->set('thisRoom',$thisRoom);
		$this->set('thisDay',$this->Session->read('App.date'));
	}
	
	

	function book(){
		
		$slots = explode(',',$this->data['Booking']['time']);	
		
		
		//validation
		if($slots[0]==''||sizeof($slots)==0){
			$this->_setFlash('Please select time slots','message-box error');	
			$this->redirect('/bookings/index');		
		}
		
		//loop validate first
		foreach($slots as $slot){
			$data['Booking']['user_id']=$this->Session->read('App.uid');
			$data['Booking']['room_id']=$this->Session->read('App.room');
			$data['Booking']['time']= $this->dateconvert($this->Session->read('App.date')).' '.$slot;
			
				$this->Booking->set($data);
				if(!$this->Booking->validates()) {
					$this->_setFlash($this->Booking->validationErrors,'message-box error');	
					$this->redirect('/bookings/index');		
					return;
				} 
			
		}
		
		
		//save 
		foreach($slots as $slot){
			$data['Booking']['user_id']=$this->Session->read('App.uid');
			$data['Booking']['room_id']=$this->Session->read('App.room');
			$data['Booking']['time']= $this->dateconvert($this->Session->read('App.date')).' '.$slot;
			
			//echo $data['Booking']['time'];
			$this->Booking->create();
			$this->Booking->save($data);
			
		}
		
		$this->_setFlash('Your booking is completed','message-box ok');					
		$this->redirect('/bookings/index');			
		
	}
	
	
	function dateconvert($date) {
		list($month,$day,$year) = split('[/.-]', $date);
		$date = "$year-$month-$day";
		return $date;
	}
	
	
	
	
	
	
	/*
	 * no js page
	 */
	function index_nojs(){
		$this->layout='home_nojs';
		
		$this->index();
	}
	
	
	function book_nojs(){
		$this->layout='home_nojs';
		
		$slots=array();
		foreach($this->data['Booking']['times'] as $time){
			if($time !=0){
				$slots[]=$time;
			}
		}
		
		
				//validation
		if($slots[0]==''||sizeof($slots)==0){
			$this->_setFlash('Please select time slots','message-box error');	
			$this->redirect('/bookings/index_nojs');		
		}
		
		//loop validate first
		foreach($slots as $slot){
			$data['Booking']['user_id']=$this->Session->read('App.uid');
			$data['Booking']['room_id']=$this->Session->read('App.room');
			$data['Booking']['time']= $this->dateconvert($this->Session->read('App.date')).' '.$slot;
			
			
				$this->Booking->set($data);
				if(!$this->Booking->validates()) {
					$this->_setFlash($this->Booking->validationErrors,'message-box error');	
					$this->redirect('/bookings/index_nojs');		
					return;
				} 
			
		}
		
		
		//save 
		foreach($slots as $slot){
			$data['Booking']['user_id']=$this->Session->read('App.uid');
			$data['Booking']['room_id']=$this->Session->read('App.room');
			$data['Booking']['time']= $this->dateconvert($this->Session->read('App.date')).' '.$slot;
			
			
			 
			$this->Booking->create();
			$this->Booking->save($data);
			
		}
		
		$this->_setFlash('Your booking is completed','message-box ok');					
		$this->redirect('/bookings/index_nojs');	
	}
}
?>
