<?php
/**
 * Category Customizer Options
 *
 * @package grandmart
 */

// Add category section
$wp_customize->add_section( 'grandmart_category_section', array(
	'title'             => esc_html__( 'Category Section','grandmart' ),
	'description'       => esc_html__( 'Category Setting Options', 'grandmart' ),
	'panel'             => 'grandmart_homepage_sections_panel',
) );

// category menu enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[enable_category]', array(
	'default'           => grandmart_theme_option('enable_category'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[enable_category]', array(
	'label'             => esc_html__( 'Enable Category', 'grandmart' ),
	'section'           => 'grandmart_category_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// category arrow control enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[category_arrow]', array(
	'default'           => grandmart_theme_option('category_arrow'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[category_arrow]', array(
	'label'             => esc_html__( 'Show Arrow Controller', 'grandmart' ),
	'section'           => 'grandmart_category_section',
	'on_off_label' 		=> grandmart_show_options(),
	'active_callback'	=> 'grandmart_category_section_enable',
) ) );

// category auto play control enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[category_auto_play]', array(
	'default'           => grandmart_theme_option('category_auto_play'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[category_auto_play]', array(
	'label'             => esc_html__( 'Enable Auto Slide', 'grandmart' ),
	'section'           => 'grandmart_category_section',
	'on_off_label' 		=> grandmart_show_options(),
	'active_callback'	=> 'grandmart_category_section_enable',
) ) );

// category title chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[category_title]', array(
	'default'          	=> grandmart_theme_option('category_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'grandmart_theme_options[category_title]', array(
	'label'             => esc_html__( 'Title', 'grandmart' ),
	'section'           => 'grandmart_category_section',
	'type'				=> 'text',
	'active_callback'	=> 'grandmart_category_section_enable',
) );

// category sub title chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[category_sub_title]', array(
	'default'          	=> grandmart_theme_option('category_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'grandmart_theme_options[category_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'grandmart' ),
	'section'           => 'grandmart_category_section',
	'type'				=> 'text',
	'active_callback'	=> 'grandmart_category_section_enable',
) );

// category content type control and setting
$wp_customize->add_setting( 'grandmart_theme_options[category_content_type]', array(
	'default'          	=> grandmart_theme_option('category_content_type'),
	'sanitize_callback' => 'grandmart_sanitize_select',
) );

$wp_customize->add_control( 'grandmart_theme_options[category_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'grandmart' ),
	'section'           => 'grandmart_category_section',
	'type'				=> 'select',
	'choices'			=> grandmart_category_product_choice(),
	'active_callback'	=> 'grandmart_category_section_enable',
) );

for ( $i = 1; $i <= 4; $i++ ) :

	// category additional image setting and control.
	$wp_customize->add_setting( 'grandmart_theme_options[category_image_' . $i . ']', array(
		'sanitize_callback' => 'grandmart_sanitize_image',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'grandmart_theme_options[category_image_' . $i . ']',
		array(
		'label'       		=> sprintf( esc_html__( 'Select Image %d', 'grandmart' ), $i ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'grandmart' ), 400, 600 ),
		'section'     		=> 'grandmart_category_section',
		'active_callback'	=> 'grandmart_category_section_enable',
	) ) );

	// category category drop down chooser control and setting
	$wp_customize->add_setting( 'grandmart_theme_options[category_content_category_' . $i . ']', array(
		'sanitize_callback' => 'grandmart_sanitize_category',
	) );

	$wp_customize->add_control( new GrandMart_Dropdown_Chosen_Control( $wp_customize, 'grandmart_theme_options[category_content_category_' . $i . ']', array(
		'label'       		=> sprintf( esc_html__( 'Select Category %d', 'grandmart' ), $i ),
		'section'           => 'grandmart_category_section',
		'choices'			=> grandmart_category_choices(),
		'active_callback'	=> 'grandmart_category_content_category_enable',
	) ) );

	// category product category drop down chooser control and setting
	$wp_customize->add_setting( 'grandmart_theme_options[category_content_product_category_' . $i . ']', array(
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( new GrandMart_Dropdown_Chosen_Control( $wp_customize, 'grandmart_theme_options[category_content_product_category_' . $i . ']', array(
		'label'       		=> sprintf( esc_html__( 'Select Product Category %d', 'grandmart' ), $i ),
		'section'           => 'grandmart_category_section',
		'choices'			=> grandmart_product_category_choices(),
		'active_callback'	=> 'grandmart_category_content_product_category_enable',
	) ) );

	// category hr control and setting
	$wp_customize->add_setting( 'grandmart_theme_options[category_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new GrandMart_Horizontal_Line( $wp_customize, 'grandmart_theme_options[category_custom_hr_' . $i . ']', array(
		'section'           => 'grandmart_category_section',
		'active_callback'	=> 'grandmart_category_section_enable',
	) ) );

endfor;

