	jQuery(document).ready(function(){ 
	//Sort table
			
			//alert(actionCell);
			jQuery('.tablesorter').tablesorter({
				//debug: true
			}); 
			
			
	
	
	//Date picker
			
	//Searching BOx		
			if(jQuery.cookie('search_bar')==null) {
				jQuery.cookie('search_bar','open');
			}
			var searchBarStatus = jQuery.cookie('search_bar');
		  	//alert(searchBarStatus);
			if(searchBarStatus=='close') {
				jQuery('.collapse-panel-close').css('display','none');
				jQuery('.collapse-panel-open').css('display','block');
				jQuery('.collapse-panel-open').siblings('form').css('display','none');
			}else {				
				jQuery('.collapse-panel-close').css('display','block');	
				jQuery('.collapse-panel-open').css('display','none');			
				jQuery('.collapse-panel-open').siblings('form').css('display','block');
			}
			 	
		  //search box	
		 	jQuery('.collapse-panel-close, .collapse-panel-open').click(function() {		 		
		 		
		 		if(jQuery('.collapse-panel-close').css('display')=='none') {
		 			jQuery('.collapse-panel-close').css('display','block');
		 			jQuery('.collapse-panel-open').css('display','none');
		 		}else {
		 			jQuery('.collapse-panel-close').css('display','none');
		 			jQuery('.collapse-panel-open').css('display','block');
		 		}
		 		
		 		jQuery(this).siblings('form').slideToggle('slow' );
		 		jQuery.cookie('search_bar')=='open'?jQuery.cookie('search_bar','close'):jQuery.cookie('search_bar','open');
		 		return false;
		 	});
	//Searching BOx			
		
		
			
			
	//Toggle menu
	
			if(jQuery.cookie('toggleMenuStatus')==null) {
				jQuery.cookie('toggleMenuStatus','open');
			}
			var toggleMenuStatus = jQuery.cookie('toggleMenuStatus');
			var widthA='70%';
			var widthB='90%';
					
			if(toggleMenuStatus=='open') {
				jQuery('#main').css('width',widthA);
				jQuery('.hide-menu-open').css('display','block');
				jQuery('.hide-menu-close').css('display','none');
			}else {
				jQuery('#main').css('width',widthB);
				jQuery('.hide-menu-open').css('display','none');
				jQuery('.hide-menu-close').css('display','block');
			}
			
			jQuery('.hide-menu-trigger-close, .hide-menu-trigger-open').click(function() {
					
		 			
				 	if(jQuery('.hide-menu-close').css('display')=='none') {
				 		jQuery('.hide-menu-close').css('display','block');
				 		jQuery('.hide-menu-open').css('display','none');
				 		jQuery('#main').css('width',widthB);
				 	}else {
				 		jQuery('.hide-menu-close').css('display','none');
				 		jQuery('.hide-menu-open').css('display','block');
				 		jQuery('#main').css('width',widthA);
				 	}
				 	
				 	jQuery.cookie('toggleMenuStatus')=='open'?jQuery.cookie('toggleMenuStatus','close'):jQuery.cookie('toggleMenuStatus','open');
		 		
		 	});
	
	//Toggle menu	 	
		 	
		 	
	});
	
