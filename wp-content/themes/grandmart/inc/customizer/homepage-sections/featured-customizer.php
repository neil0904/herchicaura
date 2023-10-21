<?php
/**
 * Featured Customizer Options
 *
 * @package grandmart
 */

// Add featured section
$wp_customize->add_section( 'grandmart_featured_section', array(
	'title'             => esc_html__( 'Featured Products Section','grandmart' ),
	'description'       => esc_html__( 'Note: You need to install WooCommerce to customize this section.', 'grandmart' ),
	'panel'             => 'grandmart_homepage_sections_panel',
) );

// featured menu enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[enable_featured]', array(
	'default'           => grandmart_theme_option('enable_featured'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[enable_featured]', array(
	'label'             => esc_html__( 'Enable Featured', 'grandmart' ),
	'section'           => 'grandmart_featured_section',
	'on_off_label' 		=> grandmart_show_options(),
	'active_callback'	=> 'grandmart_has_woocommerce',
) ) );

// featured title chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[featured_title]', array(
	'default'          	=> grandmart_theme_option('featured_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'grandmart_theme_options[featured_title]', array(
	'label'             => esc_html__( 'Title', 'grandmart' ),
	'section'           => 'grandmart_featured_section',
	'type'				=> 'text',
	'active_callback'	=> 'grandmart_featured_section_enable',
) );

// featured sub title chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[featured_sub_title]', array(
	'default'          	=> grandmart_theme_option('featured_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'grandmart_theme_options[featured_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'grandmart' ),
	'section'           => 'grandmart_featured_section',
	'type'				=> 'text',
	'active_callback'	=> 'grandmart_featured_section_enable',
) );

// featured layout type control and setting
$wp_customize->add_setting( 'grandmart_theme_options[featured_width]', array(
	'default'          	=> grandmart_theme_option('featured_width'),
	'sanitize_callback' => 'grandmart_sanitize_select',
) );

$wp_customize->add_control( 'grandmart_theme_options[featured_width]', array(
	'label'             => esc_html__( 'Section Width', 'grandmart' ),
	'section'           => 'grandmart_featured_section',
	'type'				=> 'radio',
	'choices'			=> array( 
        'full-width'  		=> esc_html__( 'Full Width', 'grandmart' ),
		'container-width'  	=> esc_html__( 'Container Width', 'grandmart' ),
	),
	'active_callback'	=> 'grandmart_featured_section_enable',
) );

// featured content type control and setting
$wp_customize->add_setting( 'grandmart_theme_options[featured_content_type]', array(
	'default'          	=> grandmart_theme_option('featured_content_type'),
	'sanitize_callback' => 'grandmart_sanitize_select',
) );

$wp_customize->add_control( 'grandmart_theme_options[featured_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'grandmart' ),
	'section'           => 'grandmart_featured_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'product-category' 	=> esc_html__( 'Product Category', 'grandmart' ),
		'product-featured' 	=> esc_html__( 'Featured Products', 'grandmart' ),
		'best-selling' 		=> esc_html__( 'Best Selling', 'grandmart' ),
	),
	'active_callback'	=> 'grandmart_featured_section_enable',
) );

// featured product category drop down chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[featured_content_product_category]', array(
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new GrandMart_Dropdown_Chosen_Control( $wp_customize, 'grandmart_theme_options[featured_content_product_category]', array(
	'label'             => esc_html__( 'Select Product Category', 'grandmart' ),
	'section'           => 'grandmart_featured_section',
	'choices'			=> grandmart_product_category_choices(),
	'active_callback'	=> 'grandmart_featured_content_product_category_enable',
) ) );
