<?php
/**
 * Topbar Customizer Options
 *
 * @package grandmart
 */

// Add topbar section
$wp_customize->add_section( 'grandmart_topbar_section', array(
	'title'             => esc_html__( 'Top Bar Section','grandmart' ),
	'description'       => sprintf( '%1$s <a class="menu_locations" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show social menu.', 'grandmart' ), esc_html__( 'Click Here', 'grandmart' ), esc_html__( 'to create menu.', 'grandmart' ) ),
	'panel'             => 'grandmart_homepage_sections_panel',
) );

// topbar enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[enable_topbar]', array(
	'default'           => grandmart_theme_option('enable_topbar'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[enable_topbar]', array(
	'label'             => esc_html__( 'Enable Topbar', 'grandmart' ),
	'section'           => 'grandmart_topbar_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// topbar social menu enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[show_social_menu]', array(
	'default'           => grandmart_theme_option('show_social_menu'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[show_social_menu]', array(
	'label'             => esc_html__( 'Show Social Menu', 'grandmart' ),
	'section'           => 'grandmart_topbar_section',
	'on_off_label' 		=> grandmart_show_options(),
	'active_callback'	=> 'grandmart_topbar_section_enable',
) ) );
