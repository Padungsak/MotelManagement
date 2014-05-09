<?php
class HomesController extends AppController {

	var $name = 'Homes';
	var $uses = null;


	/*
	* before filter	
	*/
	function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'home';		
	}

	function index() {
		
	}
	
	
	
	/*
	 * no javascript page
	 */
	function index_nojs($month=null,$year=null){
		$this->layout='home_nojs';
		
		
		
		$year!=null?$this->set('year',$year):$this->set('year',null);
		$month!=null?$this->set('month',$month):$this->set('month',null);
		
	}
	
	
}
?>
