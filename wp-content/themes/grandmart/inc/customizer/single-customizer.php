<?php
/**
 * Single Post Customizer Options
 *
 * @package grandmart
 */

// Add excerpt section
$wp_customize->add_section( 'grandmart_single_section', array(
	'title'             => esc_html__( 'Single Post Setting','grandmart' ),
	'description'       => esc_html__( 'Single Post Setting Options', 'grandmart' ),
	'panel'             => 'grandmart_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[sidebar_single_layout]', array(
	'sanitize_callback'   => 'grandmart_sanitize_select',
	'default'             => grandmart_theme_option('sidebar_single_layout'),
) );

$wp_customize->add_control(  new GrandMart_Radio_Image_Control ( $wp_customize, 'grandmart_theme_options[sidebar_single_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'grandmart' ),
	'section'             => 'grandmart_single_section',
	'choices'			  => grandmart_sidebar_position(),
) ) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[show_single_date]', array(
	'default'           => grandmart_theme_option( 'show_single_date' ),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[show_single_date]', array(
	'label'             => esc_html__( 'Show Date', 'grandmart' ),
	'section'           => 'grandmart_single_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[show_single_category]', array(
	'default'           => grandmart_theme_option( 'show_single_category' ),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[show_single_category]', array(
	'label'             => esc_html__( 'Show Category', 'grandmart' ),
	'section'           => 'grandmart_single_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[show_single_tags]', array(
	'default'           => grandmart_theme_option( 'show_single_tags' ),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[show_single_tags]', array(
	'label'             => esc_html__( 'Show Tags', 'grandmart' ),
	'section'           => 'grandmart_single_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[show_single_author]', array(
	'default'           => grandmart_theme_option( 'show_single_author' ),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[show_single_author]', array(
	'label'             => esc_html__( 'Show Author', 'grandmart' ),
	'section'           => 'grandmart_single_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );
