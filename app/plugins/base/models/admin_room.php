<?php
App::import('Sanitize');

 class AdminRoom extends BaseAppModel
{
   	var $name = 'AdminRoom';
   	var $useTable='rooms';
   	var $primaryKey ='id';
   	
   	var $hasMany = array(
  		'AdminBlock' => array(
            'className'    => 'Base.AdminBlock',
            'foreignKey'    => 'room_id'
        )	
  	);
 	
	var $validate = array(
		'name' => array(
			'mustPresent' => array(
				'rule' => 'notEmpty',
				'message' => 'Name can not be empty',
				
			),
			'mustUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Name is already taken.'
			),
		)
	);

	function beforeSave(){		
		if(!empty($this->data['AdminRoom']['name'])){
			$this->data['AdminRoom']['name']=Sanitize::html($this->data['AdminRoom']['name'], true);		
		}
		
		if(!empty($this->data['AdminRoom']['name'])){
			$this->data['AdminRoom']['des']=Sanitize::html($this->data['AdminRoom']['des'], true);		
		}
		return true;
	}
	
	
	function deleteRoom($data){
			foreach ($data['AdminRoom']['delete'] as $item) {
				$this->del($item);
			}
			return true;
	}
	
}
?>