<?php
$gtm4wp_woocommerce_completed_order_id = 0;
$gtp4wp_woocommerce_remarketing_sku_list = array();
$gtp4wp_woocommerce_remarketing_totalvalue = 0;

function gtm4wp_woocommerce_datalayer_filter_order( $dataLayer ) {
	global $gtm4wp_woocommerce_completed_order_id, $woocommerce;

	$order = new WC_Order( $gtm4wp_woocommerce_completed_order_id );

	$dataLayer["transactionId"]             = $order->get_order_number();
	$dataLayer["transactionDate"]           = date("c");
	$dataLayer["transactionType"]           = "sale";
	$dataLayer["transactionAffiliation"]    = get_bloginfo( 'name' );
	$dataLayer["transactionTotal"]          = $order->get_total();
	$dataLayer["transactionShipping"]       = $order->get_shipping();
	$dataLayer["transactionTax"]            = $order->get_total_tax();
	$dataLayer["transactionPaymentType"]    = $order->payment_method_title;
	$dataLayer["transactionCurrency"]       = get_woocommerce_currency();
	$dataLayer["transactionShippingMethod"] = $order->get_shipping_method();
	$dataLayer["transactionPromoCode"]      = implode( ", ", $order->get_used_coupons() );

	$_products = array();

	if ( $order->get_items() ) {
		foreach ( $order->get_items() as $item ) {
			$_product = $order->get_product_from_item( $item );

        		if ( isset( $_product->variation_data ) ) {

				$_category = woocommerce_get_formatted_variation( $_product->variation_data, true );

			} else {
				$out = array();
				$categories = get_the_terms( $_product->id, 'product_cat' );
				if ( $categories ) {
					foreach ( $categories as $category ) {
						$out[] = $category->name;
					}
				}
				
				$_category = implode( " / ", $out );
			}

			$_products[] = array(
			  "id"       => $_product->id,
			  "name"     => $item['name'],
			  "sku"      => $_product->get_sku() ? __( 'SKU:', GTM4WP_TEXTDOMAIN ) . ' ' . $_product->get_sku() : $_product->id,
			  "category" => $_category,
			  "price"    => $order->get_item_total( $item ),
			  "currency" => get_woocommerce_currency(),
			  "quantity" => $item['qty']
			);
		}
	}

	$dataLayer["transactionProducts"] = $_products;

	$dataLayer["event"] = "OrderCompleted";

	return $dataLayer;
}

function gtm4wp_woocommerce_thankyou( $order_id ) {
	global $gtm4wp_woocommerce_completed_order_id;

	if ( 1 == get_post_meta( $order_id, '_ga_tracked', true ) ) {
		return;
	}

	$gtm4wp_woocommerce_completed_order_id = $order_id;
	add_filter( GTM4WP_WPFILTER_COMPILE_DATALAYER, "gtm4wp_woocommerce_datalayer_filter_order" );

	update_post_meta( $order_id, '_ga_tracked', 1 );
}

function gtm4wp_woocommerce_before_shop_loop_item() {
	global $product, $gtp4wp_woocommerce_remarketing_sku_list, $gtp4wp_woocommerce_remarketing_totalvalue;

	if ( is_product() ) {
		return;
	}

	$_sku = $product->get_sku();
	if ( "" == $_sku ) {
		$_sku = $product->id;
	}

	$gtp4wp_woocommerce_remarketing_sku_list[] = $_sku;
	$gtp4wp_woocommerce_remarketing_totalvalue += $product->get_price();
}

function gtm4wp_woocommerce_before_single_product() {
	global $product, $related, $gtp4wp_woocommerce_remarketing_sku_list, $gtp4wp_woocommerce_remarketing_totalvalue;

	if ( ! is_product() ) {
		return;
	}

	$_sku = $product->get_sku();
	if ( "" == $_sku ) {
		$_sku = $product->id;
	}

	$gtp4wp_woocommerce_remarketing_sku_list[] = $_sku;
	$gtp4wp_woocommerce_remarketing_totalvalue += $product->get_price();
}

function gtm4wp_woocommerce_datalayer_filter_items( $dataLayer ) {
	global $gtp4wp_woocommerce_remarketing_sku_list, $gtp4wp_woocommerce_remarketing_totalvalue;

	if ( count ( $gtp4wp_woocommerce_remarketing_sku_list ) > 0 ) {
		if ( count ( $gtp4wp_woocommerce_remarketing_sku_list ) == 1 ) {
			$dataLayer["ecomm_prodid"] = $gtp4wp_woocommerce_remarketing_sku_list[0];
		} else {
			$dataLayer["ecomm_prodid"] = $gtp4wp_woocommerce_remarketing_sku_list;
		}
		$dataLayer["ecomm_totalvalue"] = $gtp4wp_woocommerce_remarketing_totalvalue;

		if ( is_product_category() || is_product_tag() ) {
			$dataLayer["ecomm_pagetype"] = "category";
		} else if ( is_product() ) {
			$dataLayer["ecomm_pagetype"] = "product";
		} else if ( is_cart() ) {
			$dataLayer["ecomm_pagetype"] = "cart";
		} else {
			$dataLayer["ecomm_pagetype"] = "siteview";
		}
	}

	return $dataLayer;
}

add_action( "woocommerce_thankyou", "gtm4wp_woocommerce_thankyou" );
add_action( "woocommerce_before_shop_loop_item", "gtm4wp_woocommerce_before_shop_loop_item" );
add_action( "woocommerce_before_single_product", "gtm4wp_woocommerce_before_single_product" );
add_filter( GTM4WP_WPFILTER_COMPILE_DATALAYER, "gtm4wp_woocommerce_datalayer_filter_items" );
