<?php
define( 'GTM4WP_OPTIONS',                      'gtm4wp-options' );
define( 'GTM4WP_OPTION_GTM_CODE',              'gtm-code' );
define( 'GTM4WP_OPTION_GTM_PLACEMENT',         'gtm-code-placement' );
define( 'GTM4WP_OPTION_DATALAYER_NAME',        'gtm-datalayer-variable-name' );

define( 'GTM4WP_OPTION_INCLUDE_REMARKETING',   'include-remarketing' );
define( 'GTM4WP_OPTION_INCLUDE_LOGGEDIN',      'include-loggedin' );
define( 'GTM4WP_OPTION_INCLUDE_USERROLE',      'include-userrole' );
define( 'GTM4WP_OPTION_INCLUDE_POSTTYPE',      'include-posttype' );
define( 'GTM4WP_OPTION_INCLUDE_CATEGORIES',    'include-categories' );
define( 'GTM4WP_OPTION_INCLUDE_TAGS',          'include-tags' );
define( 'GTM4WP_OPTION_INCLUDE_AUTHOR',        'include-author' );
define( 'GTM4WP_OPTION_INCLUDE_POSTDATE',      'include-postdate' );
define( 'GTM4WP_OPTION_INCLUDE_POSTTITLE',     'include-posttitle' );
define( 'GTM4WP_OPTION_INCLUDE_POSTCOUNT',     'include-postcount' );
define( 'GTM4WP_OPTION_INCLUDE_SEARCHDATA',    'include-searchdata' );
define( 'GTM4WP_OPTION_INCLUDE_BROWSERDATA',   'include-browserdata' );
define( 'GTM4WP_OPTION_INCLUDE_OSDATA',        'include-osdata' );
define( 'GTM4WP_OPTION_INCLUDE_DEVICEDATA',    'include-devicedata' );

define( 'GTM4WP_OPTION_EVENTS_OUTBOUND',       'event-outbound' );
define( 'GTM4WP_OPTION_EVENTS_DOWNLOADS',      'event-downloads' );
define( 'GTM4WP_OPTION_EVENTS_DWLEXT',         'event-download-extensions' );
define( 'GTM4WP_OPTION_EVENTS_EMAILCLICKS',    'event-email-clicks' );
define( 'GTM4WP_OPTION_EVENTS_FORMMOVE',       'event-form-move' );
define( 'GTM4WP_OPTION_EVENTS_SOCIAL',         'event-social' );

define( 'GTM4WP_OPTION_SCROLLER_ENABLED',      'scroller-enabled' );
define( 'GTM4WP_OPTION_SCROLLER_DEBUGMODE',    'scroller-debug-mode' );
define( 'GTM4WP_OPTION_SCROLLER_CALLBACKTIME', 'scroller-callback-time' );
define( 'GTM4WP_OPTION_SCROLLER_DISTANCE',     'scroller-distance' );
define( 'GTM4WP_OPTION_SCROLLER_CONTENTID',    'scroller-contentid' );
define( 'GTM4WP_OPTION_SCROLLER_READERTIME',   'scroller-readertime' );

define( 'GTM4WP_OPTION_INTEGRATE_WPCF7',       'integrate-wpcf7' );
define( 'GTM4WP_OPTION_INTEGRATE_WOOCOMMERCE', 'integrate-woocommerce' );
define( 'GTM4WP_OPTION_INTEGRATE_WPECOMMERCE', 'integrate-wp-e-commerce' );

define( 'GTM4WP_PLACEMENT_FOOTER',             0 );
define( 'GTM4WP_PLACEMENT_BODYOPEN',           1 );

$gtm4wp_options = array();

$gtm4wp_defaultoptions = array(
	GTM4WP_OPTION_GTM_CODE            => "",
	GTM4WP_OPTION_DATALAYER_NAME      => "",
	GTM4WP_OPTION_GTM_PLACEMENT       => GTM4WP_PLACEMENT_FOOTER,

	GTM4WP_OPTION_INCLUDE_REMARKETING => false,
	GTM4WP_OPTION_INCLUDE_LOGGEDIN    => false,
	GTM4WP_OPTION_INCLUDE_USERROLE    => false,
	GTM4WP_OPTION_INCLUDE_POSTTYPE    => true,
	GTM4WP_OPTION_INCLUDE_CATEGORIES  => true,
	GTM4WP_OPTION_INCLUDE_TAGS        => true,
	GTM4WP_OPTION_INCLUDE_AUTHOR      => true,
	GTM4WP_OPTION_INCLUDE_POSTDATE    => false,
	GTM4WP_OPTION_INCLUDE_POSTTITLE   => false,
	GTM4WP_OPTION_INCLUDE_POSTCOUNT   => false,
	GTM4WP_OPTION_INCLUDE_SEARCHDATA  => false,
	GTM4WP_OPTION_INCLUDE_BROWSERDATA => false,
	GTM4WP_OPTION_INCLUDE_OSDATA      => false,
	GTM4WP_OPTION_INCLUDE_DEVICEDATA  => false,
	
	GTM4WP_OPTION_EVENTS_OUTBOUND    => false,
	GTM4WP_OPTION_EVENTS_DOWNLOADS   => false,
	GTM4WP_OPTION_EVENTS_DWLEXT      => "pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar,gz,tar",
	GTM4WP_OPTION_EVENTS_EMAILCLICKS => false,
	GTM4WP_OPTION_EVENTS_FORMMOVE    => true,
	GTM4WP_OPTION_EVENTS_SOCIAL      => false,
	
	GTM4WP_OPTION_SCROLLER_ENABLED      => false,
	GTM4WP_OPTION_SCROLLER_DEBUGMODE    => false,
	GTM4WP_OPTION_SCROLLER_CALLBACKTIME => 100,
	GTM4WP_OPTION_SCROLLER_DISTANCE     => 150,
	GTM4WP_OPTION_SCROLLER_CONTENTID    => "content",
	GTM4WP_OPTION_SCROLLER_READERTIME   => 60,

	GTM4WP_OPTION_INTEGRATE_WPCF7       => true,
	GTM4WP_OPTION_INTEGRATE_WOOCOMMERCE => false,
	GTM4WP_OPTION_INTEGRATE_WPECOMMERCE => false
);

function gtm4wp_reload_options() {
	global $gtm4wp_defaultoptions;
	
	$storedoptions = (array) get_option( GTM4WP_OPTIONS );
	if ( ! is_array( $gtm4wp_defaultoptions ) ) {
		$gtm4wp_defaultoptions = array();
	}
	
	return array_merge( $gtm4wp_defaultoptions, $storedoptions );
}

function gtp4wp_debug_file( $debug_data ) {
	$fp = fopen( dirname( __FILE__ ) . "/" . date("Y-m-d-H-i-s-u") . ".txt", "w" );
	if ( $fp ) {
		fwrite( $fp, $debug_data );
		fclose( $fp );
	}
}

$gtm4wp_options = gtm4wp_reload_options();
