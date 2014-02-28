<?php
function gtm4wp_woocommerce_datalayer_filter_items( $dataLayer ) {
	global $woocommerce;

	if ( is_front_page() ) {
		$dataLayer["ecomm_prodid"] = "";
		$dataLayer["ecomm_pagetype"] = "home";
		$dataLayer["ecomm_totalvalue"] = 0;
	} else if ( is_product_category() || is_product_tag() ) {
		$sumprice = 0;
		$product_ids = array();
		foreach ( $woocommerce->query->filtered_product_ids as $oneproductid ) {
			$product = get_product( $oneproductid );
			$sumprice += $product->get_price();
			$product_ids[] = "'" . $oneproductid . "'";
		}

		$dataLayer["ecomm_prodid"] = '[' . implode( ", ", $product_ids ) . ']';
		$dataLayer["ecomm_pagetype"] = "category";
		$dataLayer["ecomm_totalvalue"] = $sumprice;
	} else if ( is_product() ) {
		$prodid = get_the_ID();
		$product = get_product( $prodid );
		$product_price = $product->get_price();

		$dataLayer["ecomm_prodid"] = $prodid;
		$dataLayer["ecomm_pagetype"] = "product";
		$dataLayer["ecomm_totalvalue"] = $product_price;
	} else if ( is_cart() ) {
		$products = $woocommerce->cart->get_cart();
		$product_ids = array();
		foreach( $products as $oneproduct ) {
			$product_ids[] = "'" . str_replace( "'", "\\'", $oneproduct['product_id'] ) . "'";
		}

		$dataLayer["ecomm_prodid"] = '[' . implode( ", ", $product_ids ) . ']';
		$dataLayer["ecomm_pagetype"] = "cart";
		$dataLayer["ecomm_totalvalue"] = $woocommerce->cart->cart_contents_total;
	} else if ( is_order_received_page() ) {
		$order_id  = apply_filters( 'woocommerce_thankyou_order_id', empty( $_GET['order'] ) ? ($GLOBALS["wp"]->query_vars["order-received"] ? $GLOBALS["wp"]->query_vars["order-received"] : 0) : absint( $_GET['order'] ) );
		$order_key = apply_filters( 'woocommerce_thankyou_order_key', empty( $_GET['key'] ) ? '' : woocommerce_clean( $_GET['key'] ) );

		if ( $order_id > 0 ) {
			$order = new WC_Order( $order_id );
			if ( $order->order_key != $order_key )
				unset( $order );
		}

		if ( 1 == get_post_meta( $order_id, '_ga_tracked', true ) ) {
//			unset( $order );
		}

		if ( isset( $order ) ) {
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
			$_sumprice = 0;
			$_product_ids = array();

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

					$_prodprice = $order->get_item_total( $item );
					$_products[] = array(
					  "id"       => $_product->id,
					  "name"     => $item['name'],
					  "sku"      => $_product->get_sku() ? __( 'SKU:', GTM4WP_TEXTDOMAIN ) . ' ' . $_product->get_sku() : $_product->id,
					  "category" => $_category,
					  "price"    => $_prodprice,
					  "currency" => get_woocommerce_currency(),
					  "quantity" => $item['qty']
					);
			
					$_sumprice += $_prodprice;
					$_product_ids[] = "'" . $_product->id . "'";
				}
			}

			$dataLayer["transactionProducts"] = $_products;
			$dataLayer["event"] = "gtm4wp.orderCompleted";

			$dataLayer["ecomm_prodid"] = '[' . implode(", ", $_product_ids) . ']';
			$dataLayer["ecomm_pagetype"] = "purchase";
			$dataLayer["ecomm_totalvalue"] = $_sumprice;

//			update_post_meta( $order_id, '_ga_tracked', 1 );
		}
	} else {
		$dataLayer["ecomm_pagetype"] = "siteview";
	}

	return $dataLayer;
}

function gtm4wp_woocommerce_single_add_to_cart_tracking() {
	if ( ! is_single() ) {
		return;
	}

	global $product, $woocommerce, $gtm4wp_datalayer_name;

	$woocommerce->add_inline_js("
		$('.single_add_to_cart_button').click(function() {
			". $gtm4wp_datalayer_name .".push({
				'event': 'gtm4wp.addProductToCart',
				'productName': '". esc_js( $product->post->post_title ) ."',
				'productSKU': '". esc_js( $product->get_sku() ) ."',
				'productID': '". esc_js( $product->id ) ."'
			});
		});
	");
}

function gtm4wp_woocommerce_loop_add_to_cart_tracking() {
	global $woocommerce, $gtm4wp_datalayer_name;

	$woocommerce->add_inline_js("
		$('.add_to_cart_button:not(.product_type_variable, .product_type_grouped)').click(function() {
			". $gtm4wp_datalayer_name .".push({
				'event': 'gtm4wp.addProductToCart',
				'productName': $( this ).parent().find('h3').text(),
				'productSKU': $( this ).data( 'product_sku' ),
				'productID': $( this ).data( 'product_id' ),
			});
		});
	");
}

// do not add filter if someone enabled WooCommerce integration without an activated WooCommerce plugin
if ( isset ( $GLOBALS["woocommerce"] ) ) {
	add_filter( GTM4WP_WPFILTER_COMPILE_DATALAYER, "gtm4wp_woocommerce_datalayer_filter_items" );
	add_action( 'woocommerce_after_add_to_cart_button', "gtm4wp_woocommerce_single_add_to_cart_tracking" );
	add_action( 'wp_footer', "gtm4wp_woocommerce_loop_add_to_cart_tracking" );
}
