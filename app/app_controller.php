<?php
class AppController extends Controller {
		
		var $helpers = array('Html','Form','Javascript','Ajax','Time','Calendar'); 
     

		function beforeFilter(){
				$this->Session->write('Config.language','en');		
				Security::setHash('md5'); 
				
				$this->_checkAuth();
		}
		
		
			
		function _checkAuth() {
			if($this->params['controller']=='users'&&$this->params['action']=='login') {
						
			}else {
				if(!$this->Session->check('App.uid')){
					$this->redirect('/users/login');	
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