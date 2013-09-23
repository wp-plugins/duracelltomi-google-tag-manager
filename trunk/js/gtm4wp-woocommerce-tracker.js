jQuery( function() {
	jQuery( "body" )
		.on( "added_to_cart", function() {
			window[ gtm4wp_datalayer_name ].push({
				'event': 'AddProductToCart'
			});
		});

	if ( window.location.search.indexOf( "added-to-cart" ) > -1 ) {
		window[ gtm4wp_datalayer_name ].push({
			'event': 'AddProductToCart'
		});
	}
});

