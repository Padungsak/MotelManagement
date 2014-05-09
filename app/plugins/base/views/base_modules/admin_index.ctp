<div>
	<p class="message-box info">
		    This module is for adding/editing/deleting Modules in your system.
			<br/>
			<br/>
			<strong>Module Name</strong> - the name of the module you want to call. 
			<br/>
			<br/>
			<strong>Module Url</strong> - Controller/Action
			<br/>
			<br/>
			<strong>Order</strong> - the greater the value, the higher the position.
	
	</p>
</div>


<?php
	echo $html->link($form->button('Add New', array('type'=>'button')),"adminAdd/",array('style'=>'text-decoration:none'), null, false);
		
	foreach($modules as $module ) {
			//debug ($module);
			//die;
			echo '<ul class="module-list">';
			echo '<li>';
			formModules($module);
			echo '</li>';
			echo '</ul>';
	}
	
	function formModules($module) {
	
		echo '<a title="Edit" href="adminEdit/'.$module['BaseModule']['id'].'">'.$module['BaseModule']['name'].'</a>';
		echo '<a onclick="return confirm('."'Are you sure to delete it?'".')" title="Delete" href="adminDelete/'.$module['BaseModule']['id'].'"><img src="../../img/base/delete.png" border="0" alt='.__('delete',true).'/></a>';
		echo '<a title="Add" href="adminAdd/'.$module['BaseModule']['id'].'"><img src="../../img/base/add.png" border="0" alt='.__('add',true).'/></a>';
		
		$children = $module['children'];
		if(sizeof($children)==0){
			return ;
		}else {
			foreach($children as $child) {
				echo '<ul>';
				echo '<li>';
				formModules($child);
				echo '</li>';
				echo '</ul>';
			}
		}
	}
	
	
?>



