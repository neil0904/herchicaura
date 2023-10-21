<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package grandmart
 */

/**
 * grandmart_site_content_ends_action hook
 *
 * @hooked grandmart_site_content_ends -  10
 *
 */
do_action( 'grandmart_site_content_ends_action' );

/**
 * grandmart_footer_start_action hook
 *
 * @hooked grandmart_footer_start -  10
 *
 */
do_action( 'grandmart_footer_start_action' );

/**
 * grandmart_site_info_action hook
 *
 * @hooked grandmart_site_info -  10
 *
 */
do_action( 'grandmart_site_info_action' );

/**
 * grandmart_footer_ends_action hook
 *
 * @hooked grandmart_footer_ends -  10
 * @hooked grandmart_slide_to_top -  20
 *
 */
do_action( 'grandmart_footer_ends_action' );

/**
 * grandmart_page_ends_action hook
 *
 * @hooked grandmart_page_ends -  10
 *
 */
do_action( 'grandmart_page_ends_action' );

wp_footer();

/**
 * grandmart_body_html_ends_action hook
 *
 * @hooked grandmart_body_html_ends -  10
 *
 */
do_action( 'grandmart_body_html_ends_action' );
