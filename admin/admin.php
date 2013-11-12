<?php
define( 'GTM4WP_ADMINSLUG',               'gtm4wp-settings' );
define( 'GTM4WP_ADMIN_GROUP',             'gtm4wp-admin-group' );

define( 'GTM4WP_ADMIN_GROUP_GENERAL',     'gtm4wp-admin-group-general' );
define( 'GTM4WP_ADMIN_GROUP_GTMID',       'gtm4wp-admin-group-gtm-id' );
define( 'GTM4WP_ADMIN_GROUP_PLACEMENT',   'gtm4wp-admin-code-placement' );
define( 'GTM4WP_ADMIN_GROUP_DATALAYER',   'gtm4wp-admin-group-datalayer-name' );
define( 'GTM4WP_ADMIN_GROUP_INFO',        'gtm4wp-admin-group-datalayer-info' );

define( 'GTM4WP_ADMIN_GROUP_INCLUDES',    'gtm4wp-admin-group-includes' );
define( 'GTM4WP_ADMIN_GROUP_EVENTS',      'gtm4wp-admin-group-events' );
define( 'GTM4WP_ADMIN_GROUP_INTEGRATION', 'gtm4wp-admin-group-integration' );
define( 'GTM4WP_ADMIN_GROUP_ADVANCED',    'gtm4wp-admin-group-advanced' );
define( 'GTM4WP_ADMIN_GROUP_CREDITS',     'gtm4wp-admin-group-credits' );

$GLOBALS["gtm4wp_includefieldtexts"] = array(
	GTM4WP_OPTION_INCLUDE_REMARKETING => array(
		"label"       => __( "Remarketing variable", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Check this option to include a dataLayer variable where all dataLayer values are stored to be included in your AdWords remarketing tag as a custom variable field", GTM4WP_TEXTDOMAIN )
	),
	GTM4WP_OPTION_INCLUDE_LOGGEDIN    => array(
		"label"       => __( "Logged in status", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Check this option to include whether there is a logged in user on your website.", GTM4WP_TEXTDOMAIN )
	),
	GTM4WP_OPTION_INCLUDE_USERROLE    => array(
		"label"       => __( "Logged in user role", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Check this option to include the role of the logged in user.", GTM4WP_TEXTDOMAIN )
	),
	GTM4WP_OPTION_INCLUDE_POSTTYPE    => array(
		"label"       => __( "Posttype of current post/archive", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Check this option to include the type of the current post or archive page (post, page or any custom post type).", GTM4WP_TEXTDOMAIN )
	),
	GTM4WP_OPTION_INCLUDE_CATEGORIES  => array(
		"label"       => __( "Category list of current post/archive", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Check this option to include the category names of the current post or archive page", GTM4WP_TEXTDOMAIN )
	),
	GTM4WP_OPTION_INCLUDE_TAGS        => array(
		"label"       => __( "Tags of current post", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Check this option to include the tags of the current post.", GTM4WP_TEXTDOMAIN )
	),
	GTM4WP_OPTION_INCLUDE_AUTHOR      => array(
		"label"       => __( "Post author name", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Check this option to include the author's name of the current post or author page.", GTM4WP_TEXTDOMAIN )
	),
	GTM4WP_OPTION_INCLUDE_POSTDATE    => array(
		"label"       => __( "Post date", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Check this option to include the date of the current post. This will include 4 dataLayer variables: full date, post year, post month, post date.", GTM4WP_TEXTDOMAIN )
	),
	GTM4WP_OPTION_INCLUDE_POSTTITLE   => array(
		"label"       => __( "Post title", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Check this option to include the title of the current post.", GTM4WP_TEXTDOMAIN )
	),
	GTM4WP_OPTION_INCLUDE_SEARCHDATA  => array(
		"label"       => __( "Search data", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Check this option to include the search term, referring page URL and number of results on the search page.", GTM4WP_TEXTDOMAIN )
	)
);

$GLOBALS["gtm4wp_eventfieldtexts"] = array(
	GTM4WP_OPTION_EVENTS_OUTBOUND    => array(
		"label"       => __( "Outbound link click events (gtm4wp.outboundClick)", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Check this option to include a Tag Manager event when a visitor clicks on a link directing the visitor out of your website.", GTM4WP_TEXTDOMAIN )
	),
	GTM4WP_OPTION_EVENTS_DOWNLOADS   => array(
		"label"       => __( "Download click events (gtm4wp.downloadClick)", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Check this option to include a Tag Manager event when a visitors clicks on a link that leads to a downloadable file on your website.", GTM4WP_TEXTDOMAIN )
	),
	GTM4WP_OPTION_EVENTS_DWLEXT      => array(
		"label"       => __( "Extensions to track", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Enter a comma separated list of extensions to track when 'Include download click events' option is set.", GTM4WP_TEXTDOMAIN )
	),
	GTM4WP_OPTION_EVENTS_EMAILCLICKS => array(
		"label"       => __( "Email click events (gtm4wp.emailClick)", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Check this option to include a Tag Manager event when a visitor clicks on an email link.", GTM4WP_TEXTDOMAIN )
	),
	GTM4WP_OPTION_EVENTS_FORMMOVE => array(
		"label"       => __( "Form fill events (gtm4wp.formElementEnter & gtm4wp.formElementLeave)", GTM4WP_TEXTDOMAIN ),
		"description" => __( "Check this option to include a Tag Manager event when a visitor moves between elements of a form (comment, contact, etc).", GTM4WP_TEXTDOMAIN )
	)
);

$GLOBALS["gtm4wp_integratefieldtexts"] = array(
	GTM4WP_OPTION_INTEGRATE_WPCF7       => array(
		"label"         => __( "Contact Form 7", GTM4WP_TEXTDOMAIN ),
		"description"   => __( "Check this to include a dataLayer event after a successfull form submission.", GTM4WP_TEXTDOMAIN ),
		"plugintocheck" => "contact-form-7/wp-contact-form-7.php"
	),
	GTM4WP_OPTION_INTEGRATE_WOOCOMMERCE => array(
		"label"         => __( "WooCommerce", GTM4WP_TEXTDOMAIN ),
		"description"   => __( "Enable this and you will get:<br /> - Add-to-cart events<br /> - E-commerce transaction data ready to be used with Google Analytics and Universal Analytics tags<br /> - Google AdWords dynamic remarketing tags", GTM4WP_TEXTDOMAIN ),
		"plugintocheck" => "woocommerce/woocommerce.php"
	)
);

function gtm4wp_admin_output_section( $args ) {
	echo '<span class="tabinfo">';

	switch( $args["id"] ) {
		case GTM4WP_ADMIN_GROUP_GENERAL: {
			_e( 'This plugin is intended to be used by IT guys and marketing staff. Please be sure you read the <a href="https://developers.google.com/tag-manager/" target="_blank">Google Tag Manager Help Center</a> before you start using this plugin.<br /><br /><strong>Important:</strong> This plugin is still <strong>beta</strong>. It has not been tested on many websites. There might be issues with some plugins or themes!', GTM4WP_TEXTDOMAIN );

			break;        
		}

		case GTM4WP_ADMIN_GROUP_INCLUDES: {
			_e( "Here you can check what data is needed to be included in the dataLayer to be able to access them in Google Tag Manager", GTM4WP_TEXTDOMAIN );

			break;        
		}
		
		case GTM4WP_ADMIN_GROUP_EVENTS: {
			_e( "Fire tags in Google Tag Manager on special events on your website", GTM4WP_TEXTDOMAIN );
			echo '<p style="font-weight: bold;">';
			_e( 'In October 2013 Google released a new feature called <a href="https://support.google.com/tagmanager/answer/3415369?hl=en" target="_blank">auto event tracking</a>. It is up to you how you use click events either using Google\'s solution or the settings below.', GTM4WP_TEXTDOMAIN );
			echo '</p>';

			break;        
		}
		
		case GTM4WP_ADMIN_GROUP_INTEGRATION: {
			_e( "Google Tag Manager for WordPress can integrate with several popular plugins. Please check the plugins you would like to integrate with:", GTM4WP_TEXTDOMAIN );

			break;        
		}
		
		case GTM4WP_ADMIN_GROUP_ADVANCED: {
			_e( "You usually do not need to modify thoose settings. Please be carefull while hacking here.", GTM4WP_TEXTDOMAIN );

			break;        
		}

		case GTM4WP_ADMIN_GROUP_CREDITS: {
			_e( "Some info about the author of this plugin", GTM4WP_TEXTDOMAIN );

			break;        
		}
	} // end switch
	
	echo '</span>';
}

function gtm4wp_admin_output_field( $args ) {
	global $gtm4wp_options;
	
	switch( $args["label_for"] ) {
		case GTM4WP_ADMIN_GROUP_GTMID: {
			echo '<input type="text" id="' . GTM4WP_OPTIONS . '[' . GTM4WP_OPTION_GTM_CODE . ']" name="' . GTM4WP_OPTIONS . '[' . GTM4WP_OPTION_GTM_CODE . ']" value="' . $gtm4wp_options[GTM4WP_OPTION_GTM_CODE] . '" /><br />' . $args["description"];
			echo '<br /><span class="gtmid_validation_error">' . __( "This does not seems to be a valid Google Tag Manager ID! Please check and try again", GTM4WP_TEXTDOMAIN ) . '</span>';
			
			break;
		}

		case GTM4WP_ADMIN_GROUP_PLACEMENT: {
			echo '<input type="radio" id="' . GTM4WP_OPTIONS . '[' . GTM4WP_OPTION_GTM_PLACEMENT . ']_0" name="' . GTM4WP_OPTIONS . '[' . GTM4WP_OPTION_GTM_PLACEMENT . ']" value="0" ' . ( $gtm4wp_options[GTM4WP_OPTION_GTM_PLACEMENT] == 0 ? 'checked="checked"' : '' ) . '/> ' . __( "Footer of the page (not recommended by Google, no tweak in your template required)", GTM4WP_TEXTDOMAIN ) . '<br />';
			echo '<input type="radio" id="' . GTM4WP_OPTIONS . '[' . GTM4WP_OPTION_GTM_PLACEMENT . ']_1" name="' . GTM4WP_OPTIONS . '[' . GTM4WP_OPTION_GTM_PLACEMENT . ']" value="1" ' . ( $gtm4wp_options[GTM4WP_OPTION_GTM_PLACEMENT] == 1 ? 'checked="checked"' : '' ) . '/> ' . __( "Custom (needs tweak in your template)", GTM4WP_TEXTDOMAIN ) . '<br />' . $args["description"];
			
			break;
		}
		
		case GTM4WP_ADMIN_GROUP_DATALAYER: {
			echo '<input type="text" id="' . GTM4WP_OPTIONS . '[' . GTM4WP_OPTION_DATALAYER_NAME . ']" name="' . GTM4WP_OPTIONS . '[' . GTM4WP_OPTION_DATALAYER_NAME . ']" value="' . $gtm4wp_options[GTM4WP_OPTION_DATALAYER_NAME] . '" /><br />' . $args["description"];
			echo '<br /><span class="datalayername_validation_error">' . __( "This does not seems to be a valid JavaScript variable name! Please check and try again", GTM4WP_TEXTDOMAIN ) . '</span>';
			
			break;
		}

		case GTM4WP_ADMIN_GROUP_INFO: {
			echo $args["description"];

			break;
		}

		default: {
			$optval = $gtm4wp_options[$args["optionfieldid"]];
			
			switch(gettype($optval)) {
				case "boolean": {
					echo '<input type="checkbox" id="' . GTM4WP_OPTIONS . '[' . $args["optionfieldid"] . ']" name="' . GTM4WP_OPTIONS . '[' . $args["optionfieldid"] . ']" value="1" ' . checked( 1, $optval, false ) . ' /><br />' . $args["description"];

					if ( isset( $args["plugintocheck"] ) ) {
						if ( is_plugin_active( $args["plugintocheck"] ) ) {
							echo "<br />" . __( 'This plugin is <strong class="gtm4wp-plugin-active">active</strong>, it is strongly recomment to enable this integration!', GTM4WP_TEXTDOMAIN );
						} else {
							echo "<br />" . __( 'This plugin is <strong class="gtm4wp-plugin-not-active">not active</strong>, enabling this integration could cause issues on frontend!', GTM4WP_TEXTDOMAIN );
						}
					}

					break;
				}
				
				default : {
					echo '<input type="text" id="' . GTM4WP_OPTIONS . '[' . $args["optionfieldid"] . ']" name="' . GTM4WP_OPTIONS . '[' . $args["optionfieldid"] . ']" value="' . esc_attr( $optval ) . '" size="80" /><br />' . $args["description"];
				}
			} // end switch gettype optval
		} 
	} // end switch
}

function gtm4wp_sanitize_options($options) {
	$output = gtm4wp_reload_options();

	foreach($output as $optionname => $optionvalue) {
		if ( isset( $options[$optionname] ) ) {
			$newoptionvalue = $options[$optionname];
		} else {
			$newoptionvalue = "";
		}

		if ( substr($optionname, 0, 8) == "include-" ) {
			$output[$optionname] = (boolean) $newoptionvalue;

		} else if ( $optionname == GTM4WP_OPTION_EVENTS_DWLEXT ) {
			$output[$optionname] = str_replace( " ", "", trim( $newoptionvalue ) );

		} else if ( substr($optionname, 0, 6) == "event-" ) {
			$output[$optionname] = (boolean) $newoptionvalue;

		} else if ( substr($optionname, 0, 10) == "integrate-" ) {
			$output[$optionname] = (boolean) $newoptionvalue;

		} else if ( ( $optionname == GTM4WP_OPTION_GTM_CODE ) || ( $optionname == GTM4WP_OPTION_DATALAYER_NAME ) ) {
			$newoptionvalue = trim($newoptionvalue);
			
			if ( ( $optionname == GTM4WP_OPTION_GTM_CODE ) && ( ! preg_match( "/^GTM-[A-Z0-9]+$/", $newoptionvalue ) ) ) {
				add_settings_error( GTM4WP_ADMIN_GROUP, GTM4WP_OPTIONS . '[' . GTM4WP_OPTION_GTM_CODE . ']', __( "Invalid Google Tag Manager ID. Valid ID format: GTM-XXXXX", GTM4WP_TEXTDOMAIN ) );

			} else if ( ( $optionname == GTM4WP_OPTION_DATALAYER_NAME ) && ( $newoptionvalue != "" ) && ( ! preg_match( "/^[a-zA-Z][a-zA-Z0-9_-]*$/", $newoptionvalue ) ) ) {
				add_settings_error( GTM4WP_ADMIN_GROUP, GTM4WP_OPTIONS . '[' . GTM4WP_OPTION_DATALAYER_NAME . ']', __( "Invalid dataLayer variable name. Please start with a character from a-z or A-Z followed by characters from a-z, A-Z, 0-9 or '_' or '-'!", GTM4WP_TEXTDOMAIN ) );

			} else {
				$output[$optionname] = $newoptionvalue;
			}
		} else if ( $optionname == GTM4WP_ADMIN_GROUP_PLACEMENT ) {
			$output[$optionname] = (int) $newoptionvalue;
			if ( ( $output[$optionname] < 0) || ( $output[$optionname] > 1 ) ) {
				$output[$optionname] = 0;
			}
		} else {
			$output[$optionname] = $newoptionvalue;
		}
	}
	
	return $output;
}

function gtm4wp_admin_init() {
	global $gtm4wp_includefieldtexts, $gtm4wp_eventfieldtexts, $gtm4wp_integratefieldtexts;
	
	register_setting( GTM4WP_ADMIN_GROUP, GTM4WP_OPTIONS, "gtm4wp_sanitize_options" );
	
	add_settings_section(
		GTM4WP_ADMIN_GROUP_GENERAL,
		__( 'General', GTM4WP_TEXTDOMAIN ),
		'gtm4wp_admin_output_section',
		GTM4WP_ADMINSLUG
	);
	
	add_settings_field(
		GTM4WP_ADMIN_GROUP_GTMID,
		__( 'Google Tag Manager ID', GTM4WP_TEXTDOMAIN ),
		'gtm4wp_admin_output_field',
		GTM4WP_ADMINSLUG,
		GTM4WP_ADMIN_GROUP_GENERAL,
		array(
			"label_for" => GTM4WP_ADMIN_GROUP_GTMID,
			"description" => __( "Enter your Google Tag Manager ID here.", GTM4WP_TEXTDOMAIN )
		)
	);

	add_settings_field(
		GTM4WP_ADMIN_GROUP_PLACEMENT,
		__( 'Container code placement', GTM4WP_TEXTDOMAIN ),
		'gtm4wp_admin_output_field',
		GTM4WP_ADMINSLUG,
		GTM4WP_ADMIN_GROUP_GENERAL,
		array(
			"label_for" => GTM4WP_ADMIN_GROUP_PLACEMENT,
			"description" => __( "Select how your container code should be included in your website.<br />If you select 'Custom' you need to edit your template file and add the following line just after the opening &lt;body&gt; tag:<br /><code>&lt;?php gtm4wp_the_gtm_tag(); ?&gt;</code>", GTM4WP_TEXTDOMAIN )
		)
	);

	add_settings_section(
		GTM4WP_ADMIN_GROUP_INCLUDES,
		__( 'Basic data', GTM4WP_TEXTDOMAIN ),
		'gtm4wp_admin_output_section',
		GTM4WP_ADMINSLUG
	);
	
	foreach($gtm4wp_includefieldtexts as $fieldid => $fielddata) {
		add_settings_field(
			"gtm4wp-admin-" . $fieldid . "-id",
			$fielddata["label"],
			'gtm4wp_admin_output_field',
			GTM4WP_ADMINSLUG,
			GTM4WP_ADMIN_GROUP_INCLUDES,
			array(
				"label_for" => "gtm4wp-options[" . $fieldid . "]",
				"description" => $fielddata["description"],
				"optionfieldid" => $fieldid
			)
		);
	}

	add_settings_section(
		GTM4WP_ADMIN_GROUP_EVENTS,
		__( 'Events', GTM4WP_TEXTDOMAIN ),
		'gtm4wp_admin_output_section',
		GTM4WP_ADMINSLUG
	);
	
	foreach($gtm4wp_eventfieldtexts as $fieldid => $fielddata) {
		add_settings_field(
			"gtm4wp-admin-" . $fieldid . "-id",
			$fielddata["label"],
			'gtm4wp_admin_output_field',
			GTM4WP_ADMINSLUG,
			GTM4WP_ADMIN_GROUP_EVENTS,
			array(
				"label_for" => "gtm4wp-options[" . $fieldid . "]",
				"description" => $fielddata["description"],
				"optionfieldid" => $fieldid
			)
		);
	}

	add_settings_section(
		GTM4WP_ADMIN_GROUP_INTEGRATION,
		__( 'Integration', GTM4WP_TEXTDOMAIN ),
		'gtm4wp_admin_output_section',
		GTM4WP_ADMINSLUG
	);

	foreach($gtm4wp_integratefieldtexts as $fieldid => $fielddata) {
		add_settings_field(
			"gtm4wp-admin-" . $fieldid . "-id",
			$fielddata["label"],
			'gtm4wp_admin_output_field',
			GTM4WP_ADMINSLUG,
			GTM4WP_ADMIN_GROUP_INTEGRATION,
			array(
				"label_for" => "gtm4wp-options[" . $fieldid . "]",
				"description" => $fielddata["description"],
				"optionfieldid" => $fieldid,
				"plugintocheck" => $fielddata["plugintocheck"]
			)
		);
	}

	add_settings_section(
		GTM4WP_ADMIN_GROUP_ADVANCED,
		__( 'Advanced', GTM4WP_TEXTDOMAIN ),
		'gtm4wp_admin_output_section',
		GTM4WP_ADMINSLUG
	);

	add_settings_field(
		GTM4WP_ADMIN_GROUP_DATALAYER,
		__( 'dataLayer variable name', GTM4WP_TEXTDOMAIN ),
		'gtm4wp_admin_output_field',
		GTM4WP_ADMINSLUG,
		GTM4WP_ADMIN_GROUP_ADVANCED,
		array(
			"label_for" => GTM4WP_ADMIN_GROUP_DATALAYER,
			"description" => __( "In some cases you need to rename the dataLayer variable. You can enter your name here. Leave black for default name: dataLayer", GTM4WP_TEXTDOMAIN )
		)
	);

	add_settings_section(
		GTM4WP_ADMIN_GROUP_CREDITS,
		__( 'Credits', GTM4WP_TEXTDOMAIN ),
		'gtm4wp_admin_output_section',
		GTM4WP_ADMINSLUG
	);

	add_settings_field(
		GTM4WP_ADMIN_GROUP_INFO,
		__( 'Author', GTM4WP_TEXTDOMAIN ),
		'gtm4wp_admin_output_field',
		GTM4WP_ADMINSLUG,
		GTM4WP_ADMIN_GROUP_CREDITS,
		array(
			"label_for" => GTM4WP_ADMIN_GROUP_INFO,
			"description" => '<strong>Thomas Geiger</strong><br />
			                  Website: <a href="http://www.duracelltomi.com/" target="_blank">duracelltomi.com</a><br />
			                  <a href="https://www.linkedin.com/in/duracelltomi" target="_blank">Me on LinkedIn</a><br />
			                  <a href="http://www.linkedin.com/company/jabjab-online-marketing-ltd-" target="_blank">JabJab Online Marketing on LinkedIn</a>'
		)
	);

}

function gtm4wp_show_admin_page() {
	global $gtp4wp_plugin_url;
?>
<div class="wrap">
	<div id="gtm4wp-icon" class="icon32" style="background-image: url(<?php echo $gtp4wp_plugin_url; ?>admin/images/tag_manager-32.png);"><br /></div>
	<h2><?php _e( 'Google Tag Manager for WordPress options', GTM4WP_TEXTDOMAIN ); ?></h2>
	<form action="options.php" method="post">
<?php settings_fields( GTM4WP_ADMIN_GROUP ); ?>
<?php do_settings_sections( GTM4WP_ADMINSLUG ); ?>
<?php submit_button(); ?>

	</form>
</div>
<?php  
}

function gtm4wp_add_admin_page() {
	add_options_page(
		__( 'Google Tag Manager for WordPress settings', GTM4WP_TEXTDOMAIN ),
		__( 'Google Tag Manager', GTM4WP_TEXTDOMAIN ),
		'manage_options',
		GTM4WP_ADMINSLUG,
		'gtm4wp_show_admin_page'
	);
}

function gtm4wp_add_admin_js($hook) {
	global $gtp4wp_plugin_url;
	
	if ( $hook == "settings_page_" . GTM4WP_ADMINSLUG ) {
		wp_enqueue_script( "admin-tabcreator", $gtp4wp_plugin_url . "/js/admin-tabcreator.js", array( "jquery-core" ), "1.0" );

		wp_enqueue_style( "gtm4wp-validate", $gtp4wp_plugin_url . "/css/admin-gtm4wp.css", array(), "1.0" );
	}
}

function gtm4wp_admin_head() {
	echo '
<style type="text/css">
	.gtmid_validation_error,
	.datalayername_validation_error {
		display: none;
		color: #c00;
		font-weight: bold;
	}
</style>
<script type="text/javascript">
	jQuery(function() {
		jQuery( "#gtm4wp-options\\\\[gtm-code\\\\]" )
			.bind( "blur", function() {
				var gtmid_regex = /^GTM-[A-Z0-9]+$/;
				if ( ! gtmid_regex.test( jQuery( this ).val() ) ) {
					jQuery( ".gtmid_validation_error" )
						.show();
				} else {
					jQuery( ".gtmid_validation_error" )
						.hide();
				}
			});

		jQuery( "#gtm4wp-options\\\\[gtm-datalayer-variable-name\\\\]" )
			.bind( "blur", function() {
				var currentval = jQuery( this ).val();

				jQuery( ".datalayername_validation_error" )
					.hide();

				if ( currentval != "" ) {
					// I know this is not the exact definition for a variable name but I think other kind of variable names should not be used.
					var gtmvarname_regex = /^[a-zA-Z][a-zA-Z0-9_-]*$/;
					if ( ! gtmvarname_regex.test( currentval ) ) {
						jQuery( ".datalayername_validation_error" )
							.show();
					}
				}
			});
	});
</script>';
}

function gtm4wp_show_warning() {
	global $gtm4wp_options, $gtp4wp_plugin_url, $gtm4wp_integratefieldtexts;

	if ( trim( $gtm4wp_options[GTM4WP_OPTION_GTM_CODE] ) == "" ) {
		echo '<div id="message" class="error"><p><strong>' . sprintf( __( 'To start using Google Tag Manager for WordPress, please <a href="%s">enter your GTM ID</a>', GTM4WP_TEXTDOMAIN ), "options-general.php?page=" . GTM4WP_ADMINSLUG ) . '</strong></p></div>';
	}

	if ( $gtm4wp_options[GTM4WP_OPTION_INTEGRATE_WOOCOMMERCE] && is_plugin_active( $gtm4wp_integratefieldtexts[GTM4WP_OPTION_INTEGRATE_WOOCOMMERCE]["plugintocheck"] ) ) {
		$woo_ga_options = get_option( "woocommerce_google_analytics_settings" );
		if ( $woo_ga_options ) {
			if ( "" != $woo_ga_options["ga_id"] ) {
				echo '<div id="message" class="error"><p><strong>' . __( 'Possible duplacate tag issue: you should disable Google Analytics tracking <a href="admin.php?page=woocommerce_settings&tab=integration&section=google_analytics">in WooCommerce settings</a> by leaving Google Analytics ID field empty to prevent any duplicate tags being used on the frontend!', GTM4WP_TEXTDOMAIN ) . '</strong></p></div>';
			}
		}
	}
	
}

function gtm4wp_add_plugin_action_links( $links, $file ) {
	global $gtp4wp_plugin_basename;

	if ( $file != $gtp4wp_plugin_basename )
		return $links;

	$settings_link = '<a href="' . menu_page_url( GTM4WP_ADMINSLUG, false ) . '">' . esc_html( __( 'Settings' ) ) . '</a>';

	array_unshift( $links, $settings_link );

	return $links;
}

add_action( 'admin_init', 'gtm4wp_admin_init' );
add_action( 'admin_menu', 'gtm4wp_add_admin_page' );
add_action( 'admin_enqueue_scripts', 'gtm4wp_add_admin_js' );
add_action( 'admin_notices', 'gtm4wp_show_warning' );
add_action( 'admin_head', 'gtm4wp_admin_head' );
add_filter( 'plugin_action_links', 'gtm4wp_add_plugin_action_links', 10, 2 );
