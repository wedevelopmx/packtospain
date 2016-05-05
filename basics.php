<?php
/**
 * Plugin Name: Pack To Spain Plugin
 * Plugin URI: http://wedevelop.mx
 * Description: This plugin add custom fields to checkout
 * Version: 1.0.0
 * Author: Cristian Colorado
 * Author URI: http://wedevelop.mx
 * License: GPL2
 */

define( 'PACK2SPAIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PACK2SPAIN_URL', plugin_dir_url( __FILE__ ) );

include_once( 'includes/wc-template-functions.php' );
include_once( 'includes/wc-template-hooks.php' );
include_once( 'classes/wc-product-attributes.php' );

add_action( 'wp_enqueue_scripts', 'my_enqueued_assets' );

function my_enqueued_assets() {
	wp_enqueue_script( 'jquery', plugin_dir_url( __FILE__ ) . '/assets/js/jquery.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'checkout', plugin_dir_url( __FILE__ ) . '/assets/js/checkout.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_style( 'p2s_checkout_css', plugin_dir_url( __FILE__ ) . '/assets/css/checkout.css' );
	wp_enqueue_style( 'p2s_single_css', plugin_dir_url( __FILE__ ) . '/assets/css/content-single-product.css' );
}
