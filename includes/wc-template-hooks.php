<?php
/**
 * WooCommerce - MultiStep Checout Template Hooks
 *
 * Action/filter hooks used for WooCommerce functions/templates.
 *
 * @author 		WooThemes
 * @category 	Core
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}






/**
 * Customization for checkout process
 */
add_action( 'woocommerce_checkout_order_review_simple', 'woocommerce_order_review', 10 );
add_action( 'woocommerce_checkout_order_review_payment', 'woocommerce_checkout_payment', 10 );

/**
 * Customization Single Product
 */

/**
* woocommerce_before_single_product_summary_title hook. - CUSTOMIZATION
*
* @hooked woocommerce_template_single_title - 5
* @hooked woocommerce_template_single_price - 10
*/
add_action( 'woocommerce_before_single_product_summary_title', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_before_single_product_summary_title', 'woocommerce_template_full_price', 10 );

/**
* woocommerce_before_single_product_summary_menu hook. - CUSTOMIZATION
*
* @hooked woocommerce_template_single_services - 5
* @hooked woocommerce_template_single_add_to_cart - 10
* @hooked woocommerce_template_single_meta - 10
*/
add_action('woocommerce_before_variations_form', 'woocommerce_template_single_services', 5);
//add_action( 'woocommerce_single_product_summary_menu', 'woocommerce_template_single_services', 5 );
add_action( 'woocommerce_single_product_summary_menu', 'woocommerce_template_single_add_to_cart', 10 );
add_action( 'woocommerce_single_product_summary_menu', 'woocommerce_template_single_meta', 20 );

add_action('woocommerce_before_single_variation', 'woocommerce_template_initial_payment', 10);

/**
* woocommerce_before_single_product_summary_body hook. - CUSTOMIZATION
*
* @hooked woocommerce_template_single_rating - 5
* @hooked woocommerce_template_single_excerpt - 10
* @hooked woocommerce_template_single_meta - 10
* @hooked woocommerce_template_single_sharing - 10
*/
add_action( 'woocommerce_single_product_summary_body', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary_body', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary_body', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary_body', 'woocommerce_template_single_sharing', 50 );


/*Adding option for full price*/
add_action( 'woocommerce_product_options_sku', 'wc_full_price_product_field' );
add_action( 'save_post', 'wc_pack_price_save_product' );
