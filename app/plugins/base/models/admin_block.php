<?php
 class AdminBlock extends BaseAppModel
{
   	var $name = 'AdminBlock';
   	var $useTable='blocks';
   	var $primaryKey ='id';
   	
   		var $validate = array(
		'room_id' => array(
			'mustPresent' => array(
				'rule' => 'notEmpty',
				'message' => 'Please select a room'
		)),
		'time' => array(
			'mustPresent' => array(
				'rule' => 'notEmpty',
				'message' => 'Please select a time slot'
			),
			'mustFree' => array(
				'rule' => array('isAreadyBlocked'),
				'message' => 'This time slot is already blocked'
			)	
		)
	);
	
	function unBlock($data){
		$record=$this->find('first',array('conditions'=>array(
															'AdminBlock.time'=>$data['AdminBlock']['time'],
															'AdminBlock.room_id'=>$data['AdminBlock']['room_id']
										)));
										
		if($record!=null){
			if($this->delete($record['AdminBlock']['id'])){
				return true;
			}else{
				return false;
			}
		}
		return true;
	}
	
   	function getTimeBlocked($data){
   		$results=array();
		
		
		
		$resultData=$this->find('all',array(
								   'contain'=>false,
								   'conditions'=>
									array(
										'AdminBlock.time like'=>$data['AdminBlock']['time'].'%',
										'AdminBlock.room_id'=>$data['AdminBlock']['room_id']
									)));
									
		foreach($resultData as $dt){
			$ay=explode(' ',$dt['AdminBlock']['time']) ;
			$results[]= $ay[1];
		}
		
		return $results;
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
	
	function isAreadyBlocked( $field=array(), $room_id )   {       
       $records=$this->find('count',
       						array('conditions'=>array('AdminBlock.room_id'=>$this->data['AdminBlock']['room_id'],
														'AdminBlock.time'=>$this->data['AdminBlock']['time'])));
       
       return $records==0;      
    }
}
?>