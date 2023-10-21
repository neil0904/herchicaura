<?php
/**
 * Callbacks functions
 *
 * @package grandmart
 */

if ( ! function_exists( 'grandmart_theme_color_custom_enable' ) ) :
	/**
	 * Check if theme color custom enabled
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_theme_color_custom_enable( $control ) {
		return 'custom' == $control->manager->get_setting( 'grandmart_theme_options[theme_color]' )->value();
	}
endif;

if ( ! function_exists( 'grandmart_has_woocommerce' ) ) :
	/**
	 * Check if woocommerce is enabled enabled
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_has_woocommerce() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
endif;

if ( ! function_exists( 'grandmart_topbar_section_enable' ) ) :
	/**
	 * Check if topbar_section section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_topbar_section_enable( $control ) {
		return $control->manager->get_setting( 'grandmart_theme_options[enable_topbar]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'grandmart_slider_section_enable' ) ) :
	/**
	 * Check if slider_section section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_slider_section_enable( $control ) {
		return $control->manager->get_setting( 'grandmart_theme_options[enable_slider]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'grandmart_slider_content_product_enable' ) ) :
	/**
	 * Check if slider content type is product.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_slider_content_product_enable( $control ) {
		return ( $control->manager->get_setting( 'grandmart_theme_options[enable_slider]' )->value() && 'product' == $control->manager->get_setting( 'grandmart_theme_options[slider_content_type]' )->value() );
	}
endif;

if ( ! function_exists( 'grandmart_slider_content_page_enable' ) ) :
	/**
	 * Check if slider content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_slider_content_page_enable( $control ) {
		return ( $control->manager->get_setting( 'grandmart_theme_options[enable_slider]' )->value() && 'page' == $control->manager->get_setting( 'grandmart_theme_options[slider_content_type]' )->value() );
	}
endif;

if ( ! function_exists( 'grandmart_service_section_enable' ) ) :
	/**
	 * Check if service_section section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_service_section_enable( $control ) {
		return $control->manager->get_setting( 'grandmart_theme_options[enable_service]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'grandmart_service_content_page_enable' ) ) :
	/**
	 * Check if service content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_service_content_page_enable( $control ) {
		return ( $control->manager->get_setting( 'grandmart_theme_options[enable_service]' )->value() && 'page' == $control->manager->get_setting( 'grandmart_theme_options[service_content_type]' )->value() );
	}
endif;

if ( ! function_exists( 'grandmart_service_content_product_enable' ) ) :
	/**
	 * Check if service content type is product.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_service_content_product_enable( $control ) {
		return ( $control->manager->get_setting( 'grandmart_theme_options[enable_service]' )->value() && 'product' == $control->manager->get_setting( 'grandmart_theme_options[service_content_type]' )->value() );
	}
endif;

if ( ! function_exists( 'grandmart_introduction_section_enable' ) ) :
	/**
	 * Check if introduction_section section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_introduction_section_enable( $control ) {
		return $control->manager->get_setting( 'grandmart_theme_options[enable_introduction]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'grandmart_category_section_enable' ) ) :
	/**
	 * Check if category_section section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_category_section_enable( $control ) {
		return $control->manager->get_setting( 'grandmart_theme_options[enable_category]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'grandmart_category_content_category_enable' ) ) :
	/**
	 * Check if category content type is category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_category_content_category_enable( $control ) {
		return ( $control->manager->get_setting( 'grandmart_theme_options[enable_category]' )->value() && 'category' == $control->manager->get_setting( 'grandmart_theme_options[category_content_type]' )->value() );
	}
endif;

if ( ! function_exists( 'grandmart_category_content_product_category_enable' ) ) :
	/**
	 * Check if category content type is product category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_category_content_product_category_enable( $control ) {
		return ( grandmart_has_woocommerce() && $control->manager->get_setting( 'grandmart_theme_options[enable_category]' )->value() && 'product-category' == $control->manager->get_setting( 'grandmart_theme_options[category_content_type]' )->value() );
	}
endif;

if ( ! function_exists( 'grandmart_featured_section_enable' ) ) :
	/**
	 * Check if featured_section section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_featured_section_enable( $control ) {
		return ( grandmart_has_woocommerce() && $control->manager->get_setting( 'grandmart_theme_options[enable_featured]' )->value() );
	}
endif;

if ( ! function_exists( 'grandmart_featured_content_product_category_enable' ) ) :
	/**
	 * Check if featured content type is product category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_featured_content_product_category_enable( $control ) {
		return ( grandmart_has_woocommerce() && $control->manager->get_setting( 'grandmart_theme_options[enable_featured]' )->value() && 'product-category' == $control->manager->get_setting( 'grandmart_theme_options[featured_content_type]' )->value() );
	}
endif;

if ( ! function_exists( 'grandmart_recent_section_enable' ) ) :
	/**
	 * Check if recent_section section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_recent_section_enable( $control ) {
		return $control->manager->get_setting( 'grandmart_theme_options[enable_recent]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'grandmart_recent_content_category_enable' ) ) :
	/**
	 * Check if recent content type is category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_recent_content_category_enable( $control ) {
		return ( $control->manager->get_setting( 'grandmart_theme_options[enable_recent]' )->value() && 'category' == $control->manager->get_setting( 'grandmart_theme_options[recent_content_type]' )->value() );
	}
endif;

if ( ! function_exists( 'grandmart_cta_section_enable' ) ) :
	/**
	 * Check if cta_section section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_cta_section_enable( $control ) {
		return $control->manager->get_setting( 'grandmart_theme_options[enable_cta]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'grandmart_features_section_enable' ) ) :
	/**
	 * Check if features_section section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function grandmart_features_section_enable( $control ) {
		return $control->manager->get_setting( 'grandmart_theme_options[enable_features]' )->value() ? true : false;
	}
endif;
