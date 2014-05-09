<?php
class BaseUsersController extends BaseAppController {

	var $name = 'BaseUsers';
	var $uses = array (
		'Base.BaseUser',
		'Base.BaseRole',
		'Base.BaseUserRoleMap'
	);

	var $components = array (
		'Email'
	);

	var $paginate = array (
		'contain'=>false,
		'limit' => 5,
		'order' => array (
			'BaseUser.username' => 'asc'
		)
	);

	/*
	* before filter	
	*/
	function beforeFilter() {
		parent::beforeFilter();
		$this->layout = 'back';		
	//	$this->Auth->allow('login','logout','accessDeny');
		
		$this->AccessController->allow(array('login','logout'));		
		
	}

	function login() {
		$this->layout = 'front';		
		
		if(!empty($this->data)) {
			
			$user= $this->BaseUser->findByUsername($this->data['BaseUser']['username']);
			
			if($user==null)	{				
				$this->Session->setFlash(__('loginFail', true),'default',array('class'=>'message-box error'));				
				
			}else {
				$password = Security::hash($this->data['BaseUser']['password']);
							
				if($password == $user['BaseUser']['password']) {
					
					//set some session variables
					$this->Session->write('Base.uid',$user['BaseUser']['id']);					
					$this->redirect('/base/base_homes/adminIndex');	
				}else {
					$this->Session->setFlash(__('loginFail', true),'default',array('class'=>'message-box error'));				
				}
			}
			
			
		}
		
						    	
	}

	function logout() {
		//Leave empty for now.
		 Configure::write('debug', 0);
		 $this->AccessController->logout();
		 $this->log('User logout successfully', LOG_ACTIVITY_MSG);
		 $this->redirect('/base/base_users/login');			
	}
	
	
		
	/*
	 * search for users
	 */
	function adminIndex() {		
		
		$datas = $this->_search($this->data['BaseUser']['username'], $this->data['BaseUser']['create_date']);
		$this->set('datas', $datas);
	}

	/*
	 * search function for adminIndex
	 */
	function _search($username = null, $create_date = null) {
		$conditions = array (
			"BaseUser.id >" => "0"
		);

		if ($create_date != null) {
			$conditions['BaseUser.create_date'] = $create_date;
		}

		if ($username != null) {
			$conditions['BaseUser.username like'] = '%' . $username . '%';
		}
				
		
		return $this->paginate('BaseUser', $conditions);
	}

	/*
	 * delete roles
	 */
	function adminDelete() {
		$this->autoRender = false;
		if (isset ($this->data['BaseUser']['delete']) && sizeof($this->data['BaseUser']['delete']) > 0) {
			
			$this->BaseUser->deleteUser($this->data);
			
			$this->Session->setFlash(__('delRecordsSuc', true),'default',array('class'=>'message-box ok'));
		} else {
			$this->Session->setFlash(__('delRecordsError', true),'default',array('class'=>'message-box error'));
		}
		
		$this->redirect(array (
					'controller' => 'base_users',
					'action' => 'adminIndex'
		));

	}

	/*
	 * add a user
	 */
	function adminAdd() {
		
		
		if (!empty ($this->data)) {						
			
			 $this->BaseUser->set($this->data);
			
			 if ($this->BaseUser->validates()) {				
				
				if ($this->BaseUser->createUser($this->data)){
						
					$this->_setFlash($this->data['BaseUser']['username'] . __('saveRecordsSuc', true),'message-box ok');	
					$this->data = null;
					$this->redirect(array (
						'controller' => 'base_users',
						'action' => 'adminIndex'
					));
				}
				
			 }else {
			 		$this->_setFlash($this->BaseUser->validationErrors,'message-box error');	
			 }			
			 
		}
		
		
		//set all roles
		$this->set('allRoles',$this->BaseRole->find('all',null));
		
	
	}

	/*
	 * edit a user
	 */
	function adminEdit($id = null) {
		if (empty ($this->data)) {
			$this->BaseUser->id = $id;
			$this->data = $this->BaseUser->read();

		} else {
			
			$this->BaseUser->id = $id;
			if ($this->BaseUser->updateUser($this->data)) {
					
					
					//get username
					$this->BaseUser->id = $id;
					$this->data = $this->BaseUser->read();
					
					
					$this->Session->setFlash($this->data['BaseUser']['username'] . __('editRecordsSuc', true),'default',array('class'=>'message-box ok'));
					$this->redirect(array (
						'controller' => 'base_users',
						'action' => 'adminIndex'
					));
			}			
			
		}
		
		//set all roles
		$this->set('allRoles',$this->BaseRole->find('all',array('contain'=>false)));
		//set all roles
		$this->set('mappedRoles',$this->BaseUserRoleMap->find('list',
												             array('conditions'=>array('BaseUserRoleMap.base_user_id'=>$this->BaseUser->id),
														     'fields'=>array('BaseUserRoleMap.base_role_id'))));
		
	}
		
	
	/*
	 * change password
	 */
	function changePwd() {

		if(!empty($this->data)) {
			if(($this->data['BaseUser']['password']!=$this->data['BaseUser']['password2'])||($this->data['BaseUser']['password']==''&&$this->data['BaseUser']['password2']==''))	{
				$this->data=null;
				$this->Session->setFlash(__('changePwdFail', true),'default',array('class'=>'message-box error'));				
			}else {
				$this->upBaseUser['BaseUser']['id']=$this->Session->read('Base.uid');
				$this->upBaseUser['BaseUser']['password']=Security::hash($this->data['BaseUser']['password']);
				if($this->BaseUser->save($this->upBaseUser['BaseUser']) ) {
					$this->data=null;
					$this->Session->setFlash(__('changePwdOk', true),'default',array('class'=>'message-box ok'));									
				}
			}
		}
		
	}
	
		
}
?>
