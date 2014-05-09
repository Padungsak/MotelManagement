<?php
class RoomsController extends AppController {

	var $name = 'Rooms';
	var $uses = array('Room');


	/*
	* before filter	
	*/
	function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'home';		
	}

	function index() {
		
		if(!empty($this->data)){
			$this->Session->write('App.date',$this->data['Room']['date']);
		}		
				
		$this->set('thisDay',$this->Session->read('App.date'));
				
		
		$data = $this->Room->find('all');
		$this->set('data',$data);
	}
	
	
	/*
	 * no js page
	 */
	function index_nojs(){
		$this->layout='home_nojs';
		
		$this->index();
	}
	
	

}
?>
