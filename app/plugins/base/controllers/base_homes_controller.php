<?php
class BaseHomesController extends BaseAppController {

	var $name = 'BaseHomes';
	var $uses = null;


	/*
	* before filter	
	*/
	function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'front';		
		$this->AccessController->allow(array('index'));		
	}

	function index() {
		
	}
	
	
	
	function accessDeny() {
		
	}
	
	function adminIndex() {
		$this->layout = 'back';		
	}
}
?>
