jQuery( function() {
        var gtm4wp_localdomain = window.location.hostname.replace( "www.", "" );
	
	jQuery( "a[href^=http]" )
		.each( function() {
			var gtm4wp_linkhref = jQuery( this ).attr( "href" );

			if ( gtm4wp_linkhref.indexOf( gtm4wp_localdomain ) == -1 ) {
				jQuery( this )
					.bind( "click", function() {
						window[ gtm4wp_datalayer_name ].push({
							'event': 'OutboundClick',
							'linkhref': jQuery( this ).attr( "href" )
						});
					})
					.attr( "target", "_blank" );
			}
		});
});
