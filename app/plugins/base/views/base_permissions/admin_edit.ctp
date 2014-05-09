<div>
	<p class="message-box info">
		   Please tick the modules which are allowed for this Role.	
	</p>
</div>


<?php
	echo $form->create('BasePermission', array('action' => 'adminEdit/'.$this->data['BasePermission']['base_role_id'],'class'=>'common-fieldset'));	
	echo $form->hidden('BasePermission.base_role_id');
	
	foreach($modules as $module ) {
			//debug ($module);
			//die;
			echo '<ul>';
			echo '<li>';
			formModules($module,$permitModules);
			echo '</li>';
			echo '</ul>';
	}
	
	//debug($modules);
	//echo '<br>';
	//debug($permitModules);
	
	echo $form->end(__('edit',true));
	
	function formModules($module,$permitModules) {
		
		
		$check = in_array($module['BaseModule']['id'],$permitModules)?'checked':'';
		
		echo '<INPUT '.$check.' TYPE=CHECKBOX VALUE='.$module['BaseModule']['id'].' NAME="data[BasePermission][check][]"   >'.$module['BaseModule']['name'];
		
		$children = $module['children'];
		if(sizeof($children)==0){
			return ;
		}else {
			foreach($children as $child) {
				echo '<ul>';
				echo '<li>';
				formModules($child,$permitModules);
				echo '</li>';
				echo '</ul>';
			}
		}
	}
	
	
?>



