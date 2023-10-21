<?php
/**
 * Call to Action Customizer Options
 *
 * @package grandmart
 */

// Add cta section
$wp_customize->add_section( 'grandmart_cta_section', array(
	'title'             => esc_html__( 'Call to Action Section','grandmart' ),
	'description'       => esc_html__( 'Call to Action Setting Options', 'grandmart' ),
	'panel'             => 'grandmart_homepage_sections_panel',
) );

// cta menu enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[enable_cta]', array(
	'default'           => grandmart_theme_option('enable_cta'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[enable_cta]', array(
	'label'             => esc_html__( 'Enable Call to Action', 'grandmart' ),
	'section'           => 'grandmart_cta_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// cta layout type control and setting
$wp_customize->add_setting( 'grandmart_theme_options[cta_layout]', array(
	'default'          	=> grandmart_theme_option('cta_layout'),
	'sanitize_callback' => 'grandmart_sanitize_select',
) );

$wp_customize->add_control( 'grandmart_theme_options[cta_layout]', array(
	'label'             => esc_html__( 'Section Width', 'grandmart' ),
	'section'           => 'grandmart_cta_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'full-width' 		=> esc_html__( 'Full Width', 'grandmart' ),
		'container-width' 	=> esc_html__( 'Container Width', 'grandmart' ),
	),
	'active_callback'	=> 'grandmart_cta_section_enable',
) );

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'grandmart_sanitize_page_post',
) );

$wp_customize->add_control( new GrandMart_Dropdown_Chosen_Control( $wp_customize, 'grandmart_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'grandmart' ),
	'section'           => 'grandmart_cta_section',
	'choices'			=> grandmart_page_choices(),
	'active_callback'	=> 'grandmart_cta_section_enable',
) ) );

// cta btn label chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[cta_btn_label]', array(
	'default'          	=> grandmart_theme_option('cta_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'grandmart_theme_options[cta_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'grandmart' ),
	'section'           => 'grandmart_cta_section',
	'type'				=> 'text',
	'active_callback'	=> 'grandmart_cta_section_enable',
) );
