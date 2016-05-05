<?

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! function_exists( 'p2s_get_template' ) ) {

	/**
	 * Output the product services in the single product summary header.
	 *
	 * @subpackage	Product
	 */
	function p2s_get_template($template_name, $args) {
		wc_get_template(
		    $template_name,
		    $args,
		    '',
		    PACK2SPAIN_PATH . 'templates/'
		);
	}
}

if ( ! function_exists( 'woocommerce_template_single_services' ) ) {

	/**
	 * Output the product services in the single product summary header.
	 *
	 * @subpackage	Product
	 */
	function woocommerce_template_single_services() {
		p2s_get_template( 'single-product/product-services.php', array() );
	}
}

if ( ! function_exists( 'woocommerce_template_initial_payment' ) ) {

	/**
	 * Output the product services in the single product summary header.
	 *
	 * @subpackage	Product
	 */
	function woocommerce_template_initial_payment() {
		p2s_get_template('single-product/initial-payment.php', array());
	}

}


if ( ! function_exists( 'wc_full_price_product_field' ) ) {

	function wc_full_price_product_field() {
	    woocommerce_wp_text_input( array( 'id' => 'pack_price', 'class' => 'wc_input_price short', 'label' => __( 'Full Price', 'woocommerce' ) . ' (' . get_woocommerce_currency_symbol() . ')' ) );
	}
}

if ( ! function_exists( 'wc_pack_price_save_product' ) ) {
	function wc_pack_price_save_product( $product_id ) {
	    // If this is a auto save do nothing, we only save when update button is clicked
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;
		if ( isset( $_POST['pack_price'] ) ) {
			if ( is_numeric( $_POST['pack_price'] ) )
				update_post_meta( $product_id, 'pack_price', $_POST['pack_price'] );
		} else {
			delete_post_meta( $product_id, 'pack_price' );
		} 
	}
}



if ( ! function_exists( 'woocommerce_template_full_price' ) ) {
	function woocommerce_template_full_price() {
	    global $product;
		$pack_price = get_post_meta( $product->id, 'pack_price', true );
		if(!empty($pack_price)) {
			echo "<div class='pack-price'>" . wc_price($pack_price) . "</div>";
		} else {
			woocommerce_template_single_price();
		}
		
	}
}
