<?php
/*
 * Created on Feb 1, 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class BaseAppController extends AppController {
     
     	var $components = array('AccessController','QuickDate'); 
  		var $helpers = array('Html', 'Ajax', 'Javascript','Form','Time');
  
		function beforeFilter() {
			
			$this->Session->write('Config.language','en');		
			Security::setHash('md5'); 
			
			
			$this->_checkAuth();
			
			//$this->AccessController->allow(array('*'));		
			
			
		}
		
		
		
		function _checkAuth() {
			if($this->params['controller']=='base_users'&&$this->params['action']=='login') {
						
			}else {
				if(!$this->Session->check('Base.uid')){
					$this->redirect('/base/base_users/login');	
				}
			}
		}
		
		
		
		function _setFlash($messages,$class) {
			$display='';
			
			if(is_array($messages)){
				foreach($messages as $msg) {
					$display = $msg.'<br/>'.$display;
				}
			}else {
				$display=$messages;
			}
			
			$this->Session->setFlash($display,'default',array('class'=>$class));		
		}
		
 }
 
?>
