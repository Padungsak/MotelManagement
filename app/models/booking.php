<?php
 class Booking extends AppModel
{
   	var $name = 'Booking';  
   	var $primaryKey ='id';
	
	var $belongsTo = array(
  		'Room' => array(
            'className'    => 'Room',
            'foreignKey'    => 'room_id'
        )  	
  	);
	
	
	var $validate = array(
		'user_id' => array(
			'mustPresent' => array(
				'rule' => 'notEmpty',
				'message' => 'You have lost your user id',				
			)
		),
		'room_id' => array(
			'mustPresent' => array(
				'rule' => 'notEmpty',
				'message' => 'Please select a room'
		)),
		'time' => array(
			'mustOpen'	=>array(
				'rule' => array('isRoomOpen'),
				'message' => 'This room is temporarily unavailable'
			),
			'mustPresent' => array(
				'rule' => 'notEmpty',
				'message' => 'Please select a time slot'
			),
			'mustFree' => array(
				'rule' => array('isRoomFree'),
				'message' => 'This time slot is booked'
			)	
			,
			'mustValid' => array(
				'rule' => array('isValidTime'),
				'message' => 'This time slot is not valid'
			)
			,
			'mustFutrue' => array(
				'rule' => array('isFuture'),
				'message' => 'This time slot is past'
			),
			'mustNotBlocked'=>array(
				'rule' =>'isBlock',
				'message' => 'This slot has been blocked by admin',
			)
		)
	);
	
	/*
	 * validate if this room is open
	 */
	function isRoomOpen(){
		return $this->Room->isRoomOpen($this->data['Booking']['room_id']);
	}
	
	/*
	 * validate if it is a valid time slot
	 */
	function isValidTime(){
		$slots= $this->getSlots();
		
		$timePart =explode(' ',$this->data['Booking']['time']);
		$timePart=$timePart[1];
		
		foreach($slots as $key=>$value){
			if($timePart==$value){
				return true;
			}
		}
		
		return false;
	}
	
	/*
	 * validate if this room is free
	 */
	function isRoomFree( $field=array(), $room_id )   {       
       $records=$this->find('count',
       						array('conditions'=>array('Booking.room_id'=>$this->data['Booking']['room_id'],
														'Booking.time'=>$this->data['Booking']['time'])));
       
       return $records==0;      
    }

	/*
	 * get already booked time slot
	 */
	function getTimeBooked($data){
		$results=array();
		
		$data=$this->find('all',array(
									'contain'=>false,
								   'conditions'=>
									array(
										'Booking.time like'=>$data['Booking']['time'].'%',
										'Booking.room_id'=>$data['Booking']['room_id']
									)));
									
		foreach($data as $dt){
			$ay=explode(' ',$dt['Booking']['time']) ;
			$results[]= $ay[1];
		}
		
		return $results;
	}
	
	/*
	 * booking for future only
	 */
	function isFuture(){
		 $now = date('Y-m-d H:i:s');
		 		
		 return ($this->data['Booking']['time']>=$now);
	}
	
	/*
	 * validate if this timeslot is blocked
	 */
	function isBlock(){
		$records=$this->Room->Block->find('count',
							array('conditions'=>array('Block.room_id'=>$this->data['Booking']['room_id'],
													  'Block.time'=>$this->data['Booking']['time'])));
		return $records==0;      											  
	}
	
	function getSlots(){
		 $time['8:00am - 8:30am']='08:00:00';
		 $time['8:30am - 9:00am']='08:30:00';
		 $time['9:00am - 9:30am']='09:00:00';
		 $time['9:30am - 10:00am']='09:30:00';
		 $time['10:00am - 10:30am']='10:00:00';
		 $time['10:30am - 11:00am']='10:30:00';
		 $time['11:00am - 11:30am']='11:00:00';
		 $time['11:30am - 12:00am']='11:30:00';
		 $time['12:00am - 12:30am']='12:00:00';
		 $time['12:30pm - 1:00pm']='12:30:00';
		 $time['1:00pm - 1:30pm']='13:00:00';
		 $time['1:30pm - 2:00pm']='13:30:00';
		 $time['2:00pm - 2:30pm']='14:00:00';
		 $time['2:30pm - 3:00pm']='14:30:00';
		 $time['3:00pm - 3:30pm']='15:00:00';
		 $time['3:30pm - 4:00pm']='15:30:00';
		 $time['4:00pm - 4:30pm']='16:00:00';
		 $time['4:30pm - 5:00pm']='16:30:00';
		 $time['5:00pm - 5:30pm']='17:00:00';
		 $time['5:30pm - 6:00pm']='17:30:00';
		 
		 return $time;
	}
}
?>