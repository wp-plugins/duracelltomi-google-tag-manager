<?php
define( GTM4WP_WPFILTER_COMPILE_DATALAYER, "gtp4wp_compile_datalayer");
define( GTM4WP_WPFILTER_COMPILE_REMARKTING, "gtp4wp_compile_remarkering");

function gtm4wp_is_assoc($arr) {
	// borrowed from
	// http://stackoverflow.com/questions/173400/php-arrays-a-good-way-to-check-if-an-array-is-associative-or-sequential
	return array_keys($arr) !== range(0, count($arr) - 1);
}

function gtm4wp_add_basic_datalayer_data( $dataLayer ) {
	global $current_user, $wp_query, $gtm4wp_options;
	
	if ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_LOGGEDIN] ) {
		if ( is_user_logged_in() ) {
			$dataLayer["visitorLoginState"] = "logged-in";
		} else {
			$dataLayer["visitorLoginState"] = "logged-out";
		}
	}
	
	if ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_USERROLE] ) {
		get_currentuserinfo();
		$dataLayer["visitorType"] = $current_user->roles[0];
	}

	if ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_POSTTITLE] ) {
		$dataLayer["pageTitle"] = wp_title( "|", false, "right" );
	}

	if ( is_singular() ) {
		if ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_POSTTYPE] ) {
			$dataLayer["pagePostType"] = get_post_type();
			$dataLayer["pagePostType2"] = "single-".get_post_type();
		}

		if ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_CATEGORIES] ) {
			$_post_cats = get_the_category();
			if ( $_post_cats ) {
				$dataLayer["pageCategory"] = array();
				foreach( $_post_cats as $_one_cat ) {
					$dataLayer["pageCategory"][] = $_one_cat->slug;
				}
			}
		}

		if ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_TAGS] ) {
			$_post_tags = get_the_tags();
			if ( $_post_tags ) {
				$dataLayer["pageAttributes"] = array();
				foreach( $_post_tags as $_one_tag ) {
					$dataLayer["pageAttributes"][] = $_one_tag->slug;
				}
			}
		}

		if ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_AUTHOR] ) {
			$dataLayer["pagePostAuthor"] = get_the_author();
		}

		if ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_POSTDATE] ) {
			$dataLayer["pagePostDate"] = get_the_date();
			$dataLayer["pagePostDateYear"] = get_the_date( "Y" );
			$dataLayer["pagePostDateMonth"] = get_the_date( "m" );
			$dataLayer["pagePostDateDay"] = get_the_date( "d" );
		}
	}

	if ( is_archive() || is_post_type_archive() ) {
		if ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_POSTTYPE] ) {
			$dataLayer["pagePostType"] = get_post_type();

			if ( is_category() ) {
				$dataLayer["pagePostType2"] = "category-".get_post_type();
			} else if ( is_tag() ) {
				$dataLayer["pagePostType2"] = "tag-".get_post_type();
			} else if ( is_tax() ) {
				$dataLayer["pagePostType2"] = "tax-".get_post_type();
			} else if ( is_author() ) {
				$dataLayer["pagePostType2"] = "author-".get_post_type();
			} else if ( is_year() ) {
				$dataLayer["pagePostType2"] = "year-".get_post_type();

				if ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_POSTDATE] ) {
					$dataLayer["pagePostDateYear"] = get_the_date( "Y" );
				}
			} else if ( is_month() ) {
				$dataLayer["pagePostType2"] = "month-".get_post_type();

				if ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_POSTDATE] ) {
					$dataLayer["pagePostDateYear"] = get_the_date( "Y" );
					$dataLayer["pagePostDateMonth"] = get_the_date( "m" );
				}
			} else if ( is_day() ) {
				$dataLayer["pagePostType2"] = "day-".get_post_type();

				if ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_POSTDATE] ) {
					$dataLayer["pagePostDate"] = get_the_date();
					$dataLayer["pagePostDateYear"] = get_the_date( "Y" );
					$dataLayer["pagePostDateMonth"] = get_the_date( "m" );
					$dataLayer["pagePostDateDay"] = get_the_date( "d" );
				}
			} else if ( is_time() ) {
				$dataLayer["pagePostType2"] = "time-".get_post_type();
			} else if ( is_date() ) {
				$dataLayer["pagePostType2"] = "date-".get_post_type();

				if ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_POSTDATE] ) {
					$dataLayer["pagePostDate"] = get_the_date();
					$dataLayer["pagePostDateYear"] = get_the_date( "Y" );
					$dataLayer["pagePostDateMonth"] = get_the_date( "m" );
					$dataLayer["pagePostDateDay"] = get_the_date( "d" );
				}
			}
		}

		if ( ( is_tax() || is_category() ) && $gtm4wp_options[GTM4WP_OPTION_INCLUDE_CATEGORIES] ) {
			$_post_cats = get_the_category();
			$dataLayer["pageCategory"] = array();
			foreach( $_post_cats as $_one_cat ) {
				$dataLayer["pageCategory"][] = $_one_cat->slug;
			}
		}

		if ( ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_AUTHOR] ) && ( is_author() ) ) {
			$dataLayer["pagePostAuthor"] = get_the_author();
		}
	}
	
	if ( is_search() ) {
		$dataLayer["siteSearchTerm"] = get_search_query();
		$dataLayer["siteSearchFrom"] = $_SERVER["HTTP_REFERER"];
		$dataLayer["siteSearchResults"] = $wp_query->post_count;
	}
	
	if ( is_front_page() && $gtm4wp_options[GTM4WP_OPTION_INCLUDE_POSTTYPE] ) {
		$dataLayer["pagePostType"] = "frontpage";
	}
	
	if ( !is_front_page() && is_home() && $gtm4wp_options[GTM4WP_OPTION_INCLUDE_POSTTYPE] ) {
		$dataLayer["pagePostType"] = "bloghome";
	}
	
	return $dataLayer;
}

function gtm4wp_get_the_gtm_tag() {
	global $gtm4wp_options;
	
	$_gtm_tag = '';
	
	if ( $gtm4wp_options[GTM4WP_OPTION_DATALAYER_NAME] == "" ) {
		$gtm4wp_datalayer_name = "dataLayer";
	} else {
		$gtm4wp_datalayer_name = $gtm4wp_options[GTM4WP_OPTION_DATALAYER_NAME];
	}

	if ( $gtm4wp_options[GTM4WP_OPTION_GTM_CODE] != "" ) {
		$_gtm_tag .= '
<!-- Google Tag Manager for WordPress by DuracellTomi -->
<script type="text/javascript">';

		$gtm4wp_datalayer_data = array();
		$gtm4wp_datalayer_data = (array) apply_filters( GTM4WP_WPFILTER_COMPILE_DATALAYER, $gtm4wp_datalayer_data );
		
		if ( $gtm4wp_options[GTM4WP_OPTION_INCLUDE_REMARKETING] ) {
			// add adwords remarketing tags as suggested here:
			// https://support.google.com/tagmanager/answer/3002580?hl=en

			$gtm4wp_remarketing_tags = (array) apply_filters( GTM4WP_WPFILTER_COMPILE_REMARKTING, $gtm4wp_datalayer_data );

			$_gtm_tag .= '
	var google_tag_params = ' . json_encode( $gtm4wp_remarketing_tags ) . ';';
			$gtm4wp_datalayer_data["google_tag_params"] = "-~-window.google_tag_params-~-";
		}

		$_gtm_tag .= '
	var gtm4wp_datalayer_name = "' . $gtm4wp_datalayer_name . '";';
		
		if ( $gtm4wp_options[GTM4WP_OPTION_EVENTS_DOWNLOADS] ) {
			$_gtm_tag .= '
	jQuery( function() {
		track_downloads( "'.str_replace('"', '', $gtm4wp_options[GTM4WP_OPTION_EVENTS_DWLEXT]).'" );
	});';
		}
		
		$_gtm_tag .= '
	var ' . $gtm4wp_datalayer_name . ' = [' . str_replace(
			array( '"-~-', '-~-"' ),
			array( "", "" ),
			json_encode( $gtm4wp_datalayer_data )
		) . '];
</script>';
	
		$_gtm_tag .= '
<noscript><iframe src="//www.googletagmanager.com/ns.html?id='.$gtm4wp_options[GTM4WP_OPTION_GTM_CODE].'"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':
new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!=\''.$gtm4wp_datalayer_name.'\'?\'&l=\'+l:\'\';j.async=true;j.src=
\'//www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,\'script\',\''.$gtm4wp_datalayer_name.'\',\''.$gtm4wp_options[GTM4WP_OPTION_GTM_CODE].'\');</script>
<!-- End Google Tag Manager -->';
	}
	
	return $_gtm_tag;
}

function gtm4wp_the_gtm_tag() {
	echo gtm4wp_get_the_gtm_tag();
}

function gtm4wp_enqueue_scripts() {
	global $gtm4wp_options, $gtp4wp_plugin_url;
		
	if ( $gtm4wp_options[GTM4WP_OPTION_EVENTS_OUTBOUND] ) {
		wp_enqueue_script( "gtm4wp-outbound-click-tracker", $gtp4wp_plugin_url . "/js/gtm4wp-outbound-click-tracker.js", array( "jquery-core" ), "1.0", false );
	}

	if ( $gtm4wp_options[GTM4WP_OPTION_EVENTS_DOWNLOADS] ) {
		wp_enqueue_script( "gtm4wp-download-tracker", $gtp4wp_plugin_url . "/js/gtm4wp-download-tracker.js", array( "jquery-core" ), "1.0", false );
	}

	if ( $gtm4wp_options[GTM4WP_OPTION_EVENTS_EMAILCLICKS] ) {
		wp_enqueue_script( "gtm4wp-email-link-tracker", $gtp4wp_plugin_url . "/js/gtm4wp-email-link-tracker.js", array( "jquery-core" ), "1.0", false );
	}

	if ( $gtm4wp_options[GTM4WP_OPTION_INTEGRATE_WPCF7] ) {
		wp_enqueue_script( "gtm4wp-contact-form-7-tracker", $gtp4wp_plugin_url . "/js/gtm4wp-contact-form-7-tracker.js", array( "jquery-core" ), "1.0", false );
	}

	if ( $gtm4wp_options[GTM4WP_OPTION_INTEGRATE_WOOCOMMERCE] ) {
		require_once( dirname( __FILE__ ) . "/../integration/woocommerce.php" );
		wp_enqueue_script( "gtm4wp-woocommerce-tracker", $gtp4wp_plugin_url . "/js/gtm4wp-woocommerce-tracker.js", array( "jquery-core" ), "1.0", false );
	}
}

function gtm4wp_wp_footer() {
	gtm4wp_the_gtm_tag();
}

add_action( "wp_enqueue_scripts", "gtm4wp_enqueue_scripts" );
add_action( "wp_footer", "gtm4wp_wp_footer" );
add_filter( GTM4WP_WPFILTER_COMPILE_DATALAYER, "gtm4wp_add_basic_datalayer_data" );
