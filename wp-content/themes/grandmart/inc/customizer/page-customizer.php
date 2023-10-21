<?php
/**
 * Page Customizer Options
 *
 * @package grandmart
 */

// Add excerpt section
$wp_customize->add_section( 'grandmart_page_section', array(
	'title'             => esc_html__( 'Page Setting','grandmart' ),
	'description'       => esc_html__( 'Page Setting Options', 'grandmart' ),
	'panel'             => 'grandmart_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[sidebar_page_layout]', array(
	'sanitize_callback'   => 'grandmart_sanitize_select',
	'default'             => grandmart_theme_option('sidebar_page_layout'),
) );

$wp_customize->add_control(  new GrandMart_Radio_Image_Control ( $wp_customize, 'grandmart_theme_options[sidebar_page_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'grandmart' ),
	'section'             => 'grandmart_page_section',
	'choices'			  => grandmart_sidebar_position(),
) ) );
