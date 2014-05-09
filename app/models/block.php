<?php
 class Block extends AppModel
{
   	public $name = 'Block';  
   	public $primaryKey ='id';
	
	
	/*
	 * get blocked slots
	 */
   	function getTimeBlocked($data){
   		$results=array();
		
		$resultData=$this->find('all',array(
								   'contain'=>false,
								   'conditions'=>
									array(
										'Block.time like'=>$data['Block']['time'].'%',
										'Block.room_id'=>$data['Block']['room_id']
									)));
									
		foreach($resultData as $dt){
			$ay=explode(' ',$dt['Block']['time']) ;
			$results[]= $ay[1];
		}
		
		return $results;
   	}
}
?>