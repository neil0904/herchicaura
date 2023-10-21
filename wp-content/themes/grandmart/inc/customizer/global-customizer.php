<?php
/**
 * Global Customizer Options
 *
 * @package grandmart
 */

// Add Global section
$wp_customize->add_section( 'grandmart_global_section', array(
	'title'             => esc_html__( 'Global Setting','grandmart' ),
	'description'       => esc_html__( 'Global Setting Options', 'grandmart' ),
	'panel'             => 'grandmart_theme_options_panel',
) );

// breadcrumb setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[enable_breadcrumb]', array(
	'default'           => grandmart_theme_option( 'enable_breadcrumb' ),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[enable_breadcrumb]', array(
	'label'             => esc_html__( 'Enable Breadcrumb', 'grandmart' ),
	'section'           => 'grandmart_global_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// site layout setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[site_layout]', array(
	'sanitize_callback'   => 'grandmart_sanitize_select',
	'default'             => grandmart_theme_option('site_layout'),
) );

$wp_customize->add_control(  new GrandMart_Radio_Image_Control ( $wp_customize, 'grandmart_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'grandmart' ),
	'section'             => 'grandmart_global_section',
	'choices'			  => grandmart_site_layout(),
) ) );

// loader setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[enable_loader]', array(
	'default'           => grandmart_theme_option( 'enable_loader' ),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[enable_loader]', array(
	'label'             => esc_html__( 'Enable Loader', 'grandmart' ),
	'section'           => 'grandmart_global_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// loader type control and setting
$wp_customize->add_setting( 'grandmart_theme_options[loader_type]', array(
	'default'          	=> grandmart_theme_option('loader_type'),
	'sanitize_callback' => 'grandmart_sanitize_select',
) );

$wp_customize->add_control( 'grandmart_theme_options[loader_type]', array(
	'label'             => esc_html__( 'Loader Type', 'grandmart' ),
	'section'           => 'grandmart_global_section',
	'type'				=> 'select',
	'choices'			=> grandmart_get_spinner_list(),
) );
