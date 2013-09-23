;jQuery( function() {
	var admintabs = [];
  
	jQuery("#wpbody form h3").each(function() {
		admintabs.push('<a class="nav-tab" href="#">' + jQuery(this).text() + '</a>');

		jQuery(this)
			.remove();
	});
  
	jQuery("#wpbody form")
		.prepend('<h2 class="nav-tab-wrapper">' + admintabs.join('') + '</h2>');
  
	jQuery(".nav-tab-wrapper a")
		.bind("click", function() {
			jQuery(".nav-tab-wrapper a.nav-tab-active")
				.removeClass("nav-tab-active");
				
			jQuery("#wpbody form .tabinfo,#wpbody form .form-table")
				.hide();
			
			var tabindex = jQuery(this)
				.addClass("nav-tab-active")
				.index();
			
			jQuery("#wpbody form .tabinfo:eq(" + tabindex + "),#wpbody form .form-table:eq(" + tabindex + ")")
				.show();
				
			return false;
		});
    
	jQuery(".nav-tab-wrapper a:first")
		.trigger("click");
});
