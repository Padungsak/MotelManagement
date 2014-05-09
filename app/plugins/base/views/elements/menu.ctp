			<div  class="hide-menu-open"  id="menu" style='float:left;' >
				<h3 class="hide-menu-trigger-close">Click To Toggle</h3> 
				<ul id="mylist">				 
				  
			       
			       	<?php echo in_array('base_users/adminIndex',$session->read('Base.urls'))?  '<li>'.$html->link('Manage User', '/base/base_users/adminIndex').'</li>':''; ?>
					<?php echo in_array('base_roles/adminIndex',$session->read('Base.urls'))?  '<li>'.$html->link('Manage Role', '/base/base_roles/adminIndex').'</li>':''; ?>
					<?php echo in_array('base_modules/adminIndex',$session->read('Base.urls'))?  '<li>'.$html->link('Manage Module', '/base/base_modules/adminIndex').'</li>':''; ?>
					<?php echo in_array('base_permissions/adminIndex',$session->read('Base.urls'))?  '<li>'.$html->link('Manage Permission', '/base/base_permissions/adminIndex').'</li>':''; ?>
					
					<?php echo in_array('admin_rooms/adminIndex',$session->read('Base.urls'))?  '<li>'.$html->link('Manage Room', '/base/admin_rooms/adminIndex').'</li>':''; ?>
					<?php echo in_array('admin_bookings/adminIndex',$session->read('Base.urls'))?  '<li>'.$html->link('Manage Bookings', '/base/admin_bookings/adminIndex').'</li>':''; ?>
					
					
					
					<?php echo in_array('base_users/changePwd',$session->read('Base.urls'))?  '<li>'.$html->link('Change Password', '/base/base_users/changePwd').'</li>':''; ?>
					<?php echo in_array('base_users/logout',$session->read('Base.urls'))?  '<li>'.$html->link('Log Out', '/base/base_users/logout').'</li>':''; ?>
								 
	
			    </ul> 
			</div>			
			<div class="hide-menu-close" style='float:left;'>
				<h3 class="hide-menu-trigger-open"> >> </h3>
			</div>