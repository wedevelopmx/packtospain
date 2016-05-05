<?php
/**
* Created: WeDevelop
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

?>

<div class="product-services">
	<ul class="pack-menu">
		<?php 
			$product_attributes = new WC_Product_Attributes($product->id);
			$attributes = $product_attributes->get_attribute_values('services');
		?>
		<?php foreach ( $attributes as $value ) : ?>
			<li>
				<img src="<?php echo PACK2SPAIN_URL . 'assets/img/' . trim($value) . '.png'; ?>">
				<span class="pack-menu-<?php echo $value; ?>"><?php echo $product_attributes->normalize($value); ?></span>	
			</li>
		<?php endforeach; ?>
	</ul>
</div>