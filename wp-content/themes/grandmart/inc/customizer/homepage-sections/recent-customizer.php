<?php
/**
 * Recent Customizer Options
 *
 * @package grandmart
 */

// Add recent section
$wp_customize->add_section( 'grandmart_recent_section', array(
	'title'             => esc_html__( 'Recent Section','grandmart' ),
	'description'       => esc_html__( 'Recent Setting Options', 'grandmart' ),
	'panel'             => 'grandmart_homepage_sections_panel',
) );

// recent enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[enable_recent]', array(
	'default'           => grandmart_theme_option('enable_recent'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[enable_recent]', array(
	'label'             => esc_html__( 'Enable Recent', 'grandmart' ),
	'section'           => 'grandmart_recent_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// recent title chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[recent_title]', array(
	'default'          	=> grandmart_theme_option('recent_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'grandmart_theme_options[recent_title]', array(
	'label'             => esc_html__( 'Title', 'grandmart' ),
	'section'           => 'grandmart_recent_section',
	'type'				=> 'text',
	'active_callback'	=> 'grandmart_recent_section_enable',
) );

// recent sub title chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[recent_sub_title]', array(
	'default'          	=> grandmart_theme_option('recent_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'grandmart_theme_options[recent_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'grandmart' ),
	'section'           => 'grandmart_recent_section',
	'type'				=> 'text',
	'active_callback'	=> 'grandmart_recent_section_enable',
) );

// recent layout type control and setting
$wp_customize->add_setting( 'grandmart_theme_options[recent_width]', array(
	'default'          	=> grandmart_theme_option('recent_width'),
	'sanitize_callback' => 'grandmart_sanitize_select',
) );

$wp_customize->add_control( 'grandmart_theme_options[recent_width]', array(
	'label'             => esc_html__( 'Section Width', 'grandmart' ),
	'section'           => 'grandmart_recent_section',
	'type'				=> 'radio',
	'choices'			=> array( 
        'full-width'  		=> esc_html__( 'Full Width', 'grandmart' ),
		'container-width'  	=> esc_html__( 'Container Width', 'grandmart' ),
	),
	'active_callback'	=> 'grandmart_recent_section_enable',
) );

// recent content type control and setting
$wp_customize->add_setting( 'grandmart_theme_options[recent_content_type]', array(
	'default'          	=> grandmart_theme_option('recent_content_type'),
	'sanitize_callback' => 'grandmart_sanitize_select',
) );

$wp_customize->add_control( 'grandmart_theme_options[recent_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'grandmart' ),
	'section'           => 'grandmart_recent_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'recent' 	=> esc_html__( 'Recent', 'grandmart' ),
		'category' 	=> esc_html__( 'Category', 'grandmart' ),
	),
	'active_callback'	=> 'grandmart_recent_section_enable',
) );

// recent pages drop down chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[recent_content_category]', array(
	'sanitize_callback' => 'grandmart_sanitize_category',
) );

$wp_customize->add_control( new GrandMart_Dropdown_Chosen_Control( $wp_customize, 'grandmart_theme_options[recent_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'grandmart' ),
	'section'           => 'grandmart_recent_section',
	'choices'			=> grandmart_category_choices(),
	'active_callback'	=> 'grandmart_recent_content_category_enable',
) ) );
