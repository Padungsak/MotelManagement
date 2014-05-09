<?php
 class Room extends AppModel
{
   	public $name = 'Room';  
   	public $primaryKey ='id';
	
	public $hasMany= array(
			'Block' => array(
	            'className'    => 'Block',
	            'foreignKey'    => 'room_id'
	        )  	
    );
	
	/*
	 * get room open status
	 */
	public function isRoomOpen($roomId){
		$thisRoom=$this->find('first',array('conditions'=>array('Room.id'=>$roomId)));
		return $thisRoom['Room']['status']==1;
	}
	
	public function save($data){
		
	}
	
}
?>