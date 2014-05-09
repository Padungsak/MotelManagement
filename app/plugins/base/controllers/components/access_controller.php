<?php
class AccessControllerComponent extends Object {
	
	public $components = array('Session'); 
	
	
	//called before Controller::beforeFilter()
	function initialize(&$controller, $settings = array()) {
		// saving the controller reference for later use
		$this->controller =& $controller;
		$this->settings['allow']=array();
	}

	//called after Controller::beforeFilter()
	function startup(&$controller) {
		$this->_setAccess();
		$this->_checkAccess();
		
	}
	
	//set allowed action
	function allow($allowAction) {
		$this->settings['allow']=$allowAction;
	}
	
	
	
		//check access rights  based on controller
		/*
	function _checkAccess() {
			 
		//check against Base sessions	
		//check access rights when only there is one	 
		if($this->Session->check('Base.isBrowser')) {
			if($this->settings['allow']!=array('*')) {
			 	$goToUrl = $this->controller->params['controller'].'/'.$this->controller->params['action'];
			 	$goToController = $this->controller->params['controller'];
			 	
			 	$allowUrls = array();
			 	foreach($this->settings['allow'] as $allow) {
			 		$allowUrl= $this->controller->params['controller'].'/'.$allow;
			 		array_push($allowUrls,$allowUrl);
			 	}
			 	
			 	
			 	//pr($goToUrl);
			 	//pr($allowUrls);
			 	//pr($goToController);
			 	//pr($this->Session->read('Base.urls'));
			 
			 	
			 	if($this->controller->params['action']!='accessDeny'
			    	&&!in_array($goToController,$this->Session->read('Base.urls'))
			    	&&!in_array($goToUrl,$allowUrls)  ) {
			    	    $this->controller->redirect(array('controller' => 'base_homes', 'action' => 'accessDeny'));
			    }
			 }
		}	    
			   
	}*/
		
	//check access rights  based On action
	function _checkAccess() {
			 
		//check against Base sessions	
		//check access rights when only there is one	 
		if($this->Session->check('Base.isBrowser')) {
			if($this->settings['allow']!=array('*')) {
			 	$goToUrl = $this->controller->params['controller'].'/'.$this->controller->params['action'];
			 	
			 	$allowUrls = array();
			 	foreach($this->settings['allow'] as $allow) {
			 		$allowUrl= $this->controller->params['controller'].'/'.$allow;
			 		array_push($allowUrls,$allowUrl);
			 	}
			 	
			 	//debug($this->settings['allow']);
			 	//debug($goToUrl);
			 	//debug($allowUrls);
			 	//pr($this->Session->read('Base.urls'));
			 
			 	
			 	if($this->controller->params['action']!='accessDeny'
			    	&&!in_array($goToUrl,$this->Session->read('Base.urls'))
			    	&&!in_array($goToUrl,$allowUrls)  ) {
			    	    $this->controller->redirect(array('controller' => 'base_homes', 'action' => 'accessDeny'));
			    }
			 }else {
				// debug('It is set to global allow');
			 }
		}else {
			    // debug('Base.isBrowser = false');
		}    
			   
	}
	
	
	//set access rights
	function _setAccess() {
				//only set Session once and only set when user login
		  		//!$this->Session->check('Base.isBrowser')&&$this->Session->check('Base.uid')
			if (!$this->Session->check('Base.isBrowser')&&$this->Session->check('Base.uid')) {
				 //setUpAll Accessed Module
				  $url =array();
				  $this->controller->loadModel('BaseUserRoleMap');
				// pr($this->controller->BaseUserRoleMap);
				  $userRoleMaps = $this->controller->BaseUserRoleMap->find('all',
				  					array('contain'=>false,'conditions'=>array('base_user_id'=>$this->Session->read('Base.uid'))));
				  
					   foreach($userRoleMaps as $map) {
					   	 $this->controller->loadModel('BaseRoleModuleMap');
					   	 $roleModuleMaps = $this->controller->BaseRoleModuleMap->find('all',array('contain'=>false,'conditions'=>array('BaseRoleModuleMap.base_role_id'=>$map['BaseUserRoleMap']['base_role_id'])));
					   	  //pr($map['BaseUserRoleMap']['base_role_id']);
					   	  //pr($roleModuleMaps);
					   	 	foreach($roleModuleMaps as $mapM) {
					   	 		  $this->controller->loadModel('BaseModule');
					   	 		  $module = $this->controller->BaseModule->find('first',array('conditions'=>array('BaseModule.id'=>$mapM['BaseRoleModuleMap']['base_module_id'])));
					   	 		  //pr($module);
					   	 		  array_push($url, $module['BaseModule']['url']);
					   	 		 // pr($url);
					   	 	}
					   	 
					   }
					    //pr($url);
				 $this->Session->write('Base.isBrowser',true);
				 $this->Session->write('Base.urls', $url);
				 //pr($this->Session->read());
			}else {
				// debug('Base.isBrowser has already been set'); 
			}
			 	
	}
	
	//clear sessions
	function logout() {				
				$this->Session->delete('Base');
	}
}
?>