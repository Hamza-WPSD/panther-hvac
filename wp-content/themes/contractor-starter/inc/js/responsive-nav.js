jQuery(document).ready(function(){
	const page = document.querySelector('.page');
	const menu_toggle = document.querySelector('.menu-toggle');
	const menu_panel = document.querySelector('#mobile-navigation');
	
	var contractor_starter_nav = {
		menu_nav_selector: menu_panel,
		init: function(){
			jQuery(menu_toggle).click( function(e) {
				jQuery(page).toggleClass('menu-active');
				jQuery(this).toggleClass('toggle');
				e.preventDefault();
				e.stopPropagation();
				contractor_starter_nav.update_nav_state();
			});
			jQuery(menu_toggle).on('touchend', function(e) {
				jQuery(page).toggleClass('menu-active');
				jQuery(this).toggleClass('toggle');
				e.preventDefault();
				e.stopPropagation();
				contractor_starter_nav.update_nav_state();
			});
		},
		update_nav_state: function(e){
			var menu_current_state = jQuery(this.menu_nav_selector).toggleClass('active');
			
			// Toggle aria-expanded with menu panel
			if ( menu_panel.getAttribute('aria-expanded') === 'true') {
				menu_panel.setAttribute('aria-expanded', 'false');
			} else {
				menu_panel.setAttribute('aria-expanded', 'true');
			}	
		}
	}
	
	// Add sub-menu 'a' to tabindex
	jQuery('ul.menu-panel__nav li.menu-item-has-children a').attr('tabindex','0');
		
	// Toggle '.sub-menu' on click
	jQuery('ul.menu-panel__nav li.menu-item-has-children a').click(function(e) {
	  e.preventDefault();
	  e.stopPropagation();
	  
	  jQuery(this).next('.sub-menu').slideToggle(300);
	  jQuery(this).toggleClass('toggled');
	});
	
	// Toggle '.sub-menu on touchend
	jQuery('ul.menu-panel__nav li.menu-item-has-children a').on('touchend', function(e) {
	  e.preventDefault();
	  e.stopPropagation();
	  
	  jQuery(this).next('.sub-menu').slideToggle(300);
	  jQuery(this).toggleClass('toggled');
	});
	
	// Enable href attribute on sub-menu links 
	jQuery("ul.menu-panel__nav ul.sub-menu a").click(function(){
		var hr = jQuery(this).attr('href');
		window.location.href=hr;
	});
	jQuery("ul.menu-panel__nav ul.sub-menu a").on('touchend', function(e){
		var hr = jQuery(this).attr('href');
		window.location.href=hr;
	});
	
	// Remove '.toggle' and '.active' classes and set aria-expanded to 'false' when the user clicks outside the navigation.
	document.addEventListener('click', function(event) {
		const click_inside = menu_panel.contains( event.target );
	
		if (!click_inside) {
			page.classList.remove('menu-active');
			menu_toggle.classList.remove('toggle');
			menu_panel.setAttribute('aria-expanded', 'false');
			menu_panel.classList.remove('active' );
		}
	});
	
	// Remove '.toggle' and '.active' classes and set aria-expanded to 'false' when ESC is pressed
	jQuery(document).on('keydown', function(event) {
		if (event.key == "Escape") {
			page.classList.remove('menu-active');
			menu_toggle.classList.remove('toggle');
			menu_panel.setAttribute('aria-expanded', 'false');
			menu_panel.classList.remove('active');
		}
	});
	
	// Toggle submenus with 'Enter' key
	jQuery('ul.menu-panel__nav li.menu-item-has-children :not(.sub-menu li)').keyup(function(e){ 
		var keyCode = e.keyCode ? e.keyCode : e.which;   
		if(keyCode==13){
			jQuery(this).next('.sub-menu').slideToggle(300);
			jQuery(this).find('.sub-menu').toggleClass('collapse');
		}
	});
	
	
	// Initialize 'contractor_starter_nav' function
	jQuery('document').ready(function(e){
	contractor_starter_nav.init();
	});
});