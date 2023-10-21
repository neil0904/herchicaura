<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package grandmart
 */

/**
 * grandmart_doctype_action hook
 *
 * @hooked grandmart_doctype -  10
 *
 */
do_action( 'grandmart_doctype_action' );

/**
 * grandmart_head_action hook
 *
 * @hooked grandmart_head -  10
 *
 */
do_action( 'grandmart_head_action' );

/**
 * grandmart_body_start_action hook
 *
 * @hooked grandmart_body_start -  10
 *
 */
do_action( 'grandmart_body_start_action' );
 
/**
 * grandmart_page_start_action hook
 *
 * @hooked grandmart_page_start -  10
 * @hooked grandmart_loader -  20
 *
 */
do_action( 'grandmart_page_start_action' );

/**
 * grandmart_header_start_action hook
 *
 * @hooked grandmart_header_start -  10
 *
 */
do_action( 'grandmart_header_start_action' );

/**
 * grandmart_site_branding_action hook
 *
 * @hooked grandmart_site_branding -  10
 *
 */
do_action( 'grandmart_site_branding_action' );

/**
 * grandmart_primary_nav_action hook
 *
 * @hooked grandmart_primary_nav -  10
 *
 */
do_action( 'grandmart_primary_nav_action' );

/**
 * grandmart_header_ends_action hook
 *
 * @hooked grandmart_header_ends -  10
 *
 */
do_action( 'grandmart_header_ends_action' );

/**
 * grandmart_site_content_start_action hook
 *
 * @hooked grandmart_site_content_start -  10
 *
 */
do_action( 'grandmart_site_content_start_action' );

/**
 * grandmart_primary_content_action hook
 *
 */
if ( is_front_page() && ! is_home() ) {
	$sections = grandmart_sortable_sections();
	$sorted = array_keys( $sections );
	$i = 1;
	foreach ( $sorted as $section ) {
		add_action( 'grandmart_primary_content_action', 'grandmart_add_'. $section .'_section', $i . 0 );
		$i++;
	}
	do_action( 'grandmart_primary_content_action' );
}