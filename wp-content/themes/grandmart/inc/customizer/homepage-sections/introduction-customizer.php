<?php
/**
 * Introduction Customizer Options
 *
 * @package grandmart
 */

// Add introduction section
$wp_customize->add_section( 'grandmart_introduction_section', array(
	'title'             => esc_html__( 'Introduction Section','grandmart' ),
	'description'       => esc_html__( 'Introduction Setting Options', 'grandmart' ),
	'panel'             => 'grandmart_homepage_sections_panel',
) );

// introduction menu enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[enable_introduction]', array(
	'default'           => grandmart_theme_option('enable_introduction'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[enable_introduction]', array(
	'label'             => esc_html__( 'Enable Introduction', 'grandmart' ),
	'section'           => 'grandmart_introduction_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// introduction pages drop down chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[introduction_content_page]', array(
	'sanitize_callback' => 'grandmart_sanitize_page_post',
) );

$wp_customize->add_control( new GrandMart_Dropdown_Chosen_Control( $wp_customize, 'grandmart_theme_options[introduction_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'grandmart' ),
	'section'           => 'grandmart_introduction_section',
	'choices'			=> grandmart_page_choices(),
	'active_callback'	=> 'grandmart_introduction_section_enable',
) ) );

// introduction additional image setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[introduction_signature_image]', array(
	'sanitize_callback' => 'grandmart_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'grandmart_theme_options[introduction_signature_image]',
	array(
	'label'       		=> esc_html__( 'Secondary Image', 'grandmart' ),
	'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'grandmart' ), 600, 450 ),
	'section'     		=> 'grandmart_introduction_section',
	'active_callback'	=> 'grandmart_introduction_section_enable',
) ) );
