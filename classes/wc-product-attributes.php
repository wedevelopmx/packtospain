<?php


class WC_Product_Attributes {
	private $attributes;

	public function __construct ($product_id) {
		$this->attributes = array_filter(get_post_meta($product_id, '_product_attributes'))[0];
	}

	public function get_attribute_values($attribute_name) {
		if(!is_null($this->attributes[$attribute_name]))
			return explode('|', $this->attributes[$attribute_name]['value']);
		return array();
	}

	public function normalize($text) {
		return ucfirst(str_replace('-',' ',trim($text))); 
	}

}
