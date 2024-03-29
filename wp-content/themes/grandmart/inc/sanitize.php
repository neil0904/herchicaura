<?php
/**
 * sanitization functions
 *
 * @package grandmart
 */

if ( ! function_exists( 'grandmart_sanitize_select' ) ) :
	/**
	 * Sanitize select, radio.
	 *
	 * @param mixed                $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function grandmart_sanitize_select( $input, $setting ) {
		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
endif;


if ( ! function_exists( 'grandmart_sanitize_meta_select' ) ) :
	/**
	 * Sanitize select, radio.
	 *
	 * @param mixed                $input The value to sanitize.
	 * @return mixed Sanitized value.
	 */
	function grandmart_sanitize_meta_select( $input, $choices ) {
		// Get list of choices from the control associated with the setting.
		$choices = ! empty( $choices ) ? ( array ) $choices : array();

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : '' );
	}
endif;


if ( ! function_exists( 'grandmart_sanitize_image' ) ) :
	/**
	 * Image sanitization callback example.
	 *
	 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
	 * send back the filename, otherwise, return the setting default.
	 *
	 * - Sanitization: image file extension
	 * - Control: text, WP_Customize_Image_Control
	 *
	 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
	 *
	 * @param string               $image   Image filename.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return string The image filename if the extension is allowed; otherwise, the setting default.
	 */
	function grandmart_sanitize_image( $image, $setting ) {
		/*
		 * Array of valid image file types.
		 *
		 * The array includes image mime types that are included in wp_get_mime_types()
		 */
	    $mimes = array(
	        'jpg|jpeg|jpe' => 'image/jpeg',
	        'gif'          => 'image/gif',
	        'png'          => 'image/png',
	        'bmp'          => 'image/bmp',
	        'tif|tiff'     => 'image/tiff',
	        'ico'          => 'image/x-icon'
	    );
		// Return an array with file extension and mime_type.
	   $file = wp_check_filetype( $image, $mimes );
		// If $image has a valid mime_type, return it; otherwise, return the default.
	   return ( $file['ext'] ? $image : $setting->default );
	}
endif;


if ( ! function_exists( 'grandmart_sanitize_number_range' ) ) :
	/**
	 * Number Range sanitization callback example.
	 *
	 * - Sanitization: number_range
	 * - Control: number, tel
	 *
	 * Sanitization callback for 'number' or 'tel' type text inputs. This callback sanitizes
	 * `$number` as an absolute integer within a defined min-max range.
	 *
	 * @see absint() https://developer.wordpress.org/reference/functions/absint/
	 *
	 * @param int                  $number  Number to check within the numeric range defined by the setting.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return int|string The number, if it is zero or greater and falls within the defined range; otherwise,
	 *                    the setting default.
	 */
	function grandmart_sanitize_number_range( $number, $setting ) {
		// Ensure input is an absolute integer.
		$number = absint( $number );

		// Get the input attributes associated with the setting.
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;

		// Get minimum number in the range.
		$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

		// Get maximum number in the range.
		$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

		// Get step.
		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

		// If the number is within the valid range, return it; otherwise, return the default
		return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
	}
endif;


if ( ! function_exists( 'grandmart_sanitize_checkbox' ) ) :
	/**
	 * Sanitize checkbox.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function grandmart_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true == $checked ) ? true : false );

	}
endif;


if ( ! function_exists( 'grandmart_sanitize_page_post' ) ) :
	/**
	* Sanitizes page/post
	* @param  $input entered value
	* @return sanitized output
	*/
	function grandmart_sanitize_page_post( $input ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $input );

		// If $page_id is an ID of a published page, return it; otherwise, return false
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : false );
	}
endif;


if( ! function_exists( 'grandmart_sanitize_category' ) ) :
	/**
	 * Sanitizes dropdown single category
	 * @param  $input entered value
	 * @return sanitized output
	 */
	function grandmart_sanitize_category( $input ) {
		if ( $input != '' ) {
			$args = array(
							'type'			=> 'post',
							'child_of'      => 0,
							'parent'        => '',
							'orderby'       => 'name',
							'order'         => 'ASC',
							'hide_empty'    => 0,
							'hierarchical'  => 0,
							'taxonomy'      => 'category',
						);

			$categories = get_categories( $args );

			foreach ( $categories as $category )
				$category_ids[] = $category->term_id;

			if ( in_array( $input, $category_ids ) ) {
		    	return $input;
		    }
		    else {
	    		return '';
	   		}
	    }
	    else {
	    	return '';
	    }
	}
endif;

if ( ! function_exists( 'grandmart_santize_allow_tags' ) ) :
	/**
	 * Textarea field with allowed tags
	 *
	 * @param string  $input  
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return string The input with only allowed tag i.e. anchor
	 */
	function grandmart_santize_allow_tags( $input ) {
		$input = wp_kses( $input, array(
			'h1' => array(),
			'h2' => array(),
			'h3' => array(),
			'h4' => array(),
			'h5' => array(),
			'h6' => array(),
			'span' => array(),
			'p' => array(),
			'a' => array(
				'target' => array(),
				'href' => array(),
				)
			) );

		return $input;
	}
endif;

if ( ! function_exists( 'grandmart_santize_allow_span' ) ) :
	/**
	 * Text field with allowed span
	 *
	 * @param string  $input  
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return string The input with only allowed tag i.e. anchor
	 */
	function grandmart_santize_allow_span( $input ) {
		$input = wp_kses( $input, array(
			'span' => array(),
			) );

		return $input;
	}
endif;

if ( ! function_exists( 'grandmart_sanitize_switch' ) ) :
	/**
	 * Sanitize data from custom Switch Control.
	 * @param  string $input 
	 * @return boolean    
	 */
	function grandmart_sanitize_switch( $input ) {
		$input = sanitize_text_field( $input );
		return ( in_array( $input, array( 'false', NULL ) ) ) ? false : true;
	}
endif;

if ( ! function_exists( 'grandmart_sanitize_multiple_select' ) ) :
	/**
	 * Sanitize data from custom multiple select corntrol
	 * @param  array $input 
	 * @return array    
	 */
	function grandmart_sanitize_multiple_select( $input ) {
		$input = ( array ) $input;
		return array_map( 'sanitize_key',  $input );
	}
endif;