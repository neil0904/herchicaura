<?php
/**
 * Slider Customizer Options
 *
 * @package grandmart
 */

// Add slider section
$wp_customize->add_section( 'grandmart_slider_section', array(
	'title'             => esc_html__( 'Slider Section','grandmart' ),
	'description'       => esc_html__( 'Slider Setting Options', 'grandmart' ),
	'panel'             => 'grandmart_homepage_sections_panel',
) );

// slider menu enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[enable_slider]', array(
	'default'           => grandmart_theme_option('enable_slider'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[enable_slider]', array(
	'label'             => esc_html__( 'Enable Slider', 'grandmart' ),
	'section'           => 'grandmart_slider_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// slider social menu enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[slider_entire_site]', array(
	'default'           => grandmart_theme_option('slider_entire_site'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[slider_entire_site]', array(
	'label'             => esc_html__( 'Show Entire Site', 'grandmart' ),
	'section'           => 'grandmart_slider_section',
	'on_off_label' 		=> grandmart_show_options(),
	'active_callback'	=> 'grandmart_slider_section_enable',
) ) );

// slider arrow control enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[slider_arrow]', array(
	'default'           => grandmart_theme_option('slider_arrow'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[slider_arrow]', array(
	'label'             => esc_html__( 'Show Arrow Controller', 'grandmart' ),
	'section'           => 'grandmart_slider_section',
	'on_off_label' 		=> grandmart_show_options(),
	'active_callback'	=> 'grandmart_slider_section_enable',
) ) );

// slider auto play control enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[slider_auto_play]', array(
	'default'           => grandmart_theme_option('slider_auto_play'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[slider_auto_play]', array(
	'label'             => esc_html__( 'Enable Auto Slide', 'grandmart' ),
	'section'           => 'grandmart_slider_section',
	'on_off_label' 		=> grandmart_show_options(),
	'active_callback'	=> 'grandmart_slider_section_enable',
) ) );

// slider auto play control enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[slider_zoom]', array(
	'default'           => grandmart_theme_option('slider_zoom'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[slider_zoom]', array(
	'label'             => esc_html__( 'Enable Zoom Effect', 'grandmart' ),
	'section'           => 'grandmart_slider_section',
	'on_off_label' 		=> grandmart_show_options(),
	'active_callback'	=> 'grandmart_slider_section_enable',
) ) );

// slider btn label chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[slider_btn_label]', array(
	'default'          	=> grandmart_theme_option('slider_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'grandmart_theme_options[slider_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'grandmart' ),
	'section'           => 'grandmart_slider_section',
	'type'				=> 'text',
	'active_callback'	=> 'grandmart_slider_section_enable',
) );

// slider alt btn label chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[slider_alt_btn_label]', array(
	'default'          	=> grandmart_theme_option('slider_alt_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'grandmart_theme_options[slider_alt_btn_label]', array(
	'label'             => esc_html__( 'Alt Button Label', 'grandmart' ),
	'section'           => 'grandmart_slider_section',
	'type'				=> 'text',
	'active_callback'	=> 'grandmart_slider_section_enable',
) );

// slider alt btn link chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[slider_alt_btn_link]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'grandmart_theme_options[slider_alt_btn_link]', array(
	'label'             => esc_html__( 'Alt Button Link', 'grandmart' ),
	'section'           => 'grandmart_slider_section',
	'type'				=> 'url',
	'active_callback'	=> 'grandmart_slider_section_enable',
) );

// slider content type control and setting
$wp_customize->add_setting( 'grandmart_theme_options[slider_content_type]', array(
	'default'          	=> grandmart_theme_option('slider_content_type'),
	'sanitize_callback' => 'grandmart_sanitize_select',
) );

$wp_customize->add_control( 'grandmart_theme_options[slider_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'grandmart' ),
	'section'           => 'grandmart_slider_section',
	'type'				=> 'select',
	'choices'			=> grandmart_slider_product_choice(),
	'active_callback'	=> 'grandmart_slider_section_enable',
) );

for ( $i = 1; $i <= 5; $i++ ) :

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'grandmart_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'grandmart_sanitize_page_post',
	) );

	$wp_customize->add_control( new GrandMart_Dropdown_Chosen_Control( $wp_customize, 'grandmart_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'grandmart' ), $i ),
		'section'           => 'grandmart_slider_section',
		'choices'			=> grandmart_page_choices(),
		'active_callback'	=> 'grandmart_slider_content_page_enable',
	) ) );

	// slider products drop down chooser control and setting
	$wp_customize->add_setting( 'grandmart_theme_options[slider_content_product_' . $i . ']', array(
		'sanitize_callback' => 'grandmart_sanitize_page_post',
	) );

	$wp_customize->add_control( new GrandMart_Dropdown_Chosen_Control( $wp_customize, 'grandmart_theme_options[slider_content_product_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Product %d', 'grandmart' ), $i ),
		'section'           => 'grandmart_slider_section',
		'choices'			=> grandmart_product_choices(),
		'active_callback'	=> 'grandmart_slider_content_product_enable',
	) ) );

	// slider content type control and setting
	$wp_customize->add_setting( 'grandmart_theme_options[slider_layout_' . $i . ']', array(
		'default'          	=> 'center-align',
		'sanitize_callback' => 'grandmart_sanitize_select',
	) );

	$wp_customize->add_control( 'grandmart_theme_options[slider_layout_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Content Layout %d', 'grandmart' ), $i ),
		'section'           => 'grandmart_slider_section',
		'type'				=> 'select',
		'choices'			=> array( 
			'center-align' 			=> esc_html__( 'Center View / Center Align', 'grandmart' ),
			'left-align-left' 		=> esc_html__( 'Left View / Left Align', 'grandmart' ),
			'right-align-left' 		=> esc_html__( 'Right View / Left Align', 'grandmart' ),
		),
		'active_callback'	=> 'grandmart_slider_section_enable',
	) );

	// slider hr control and setting
	$wp_customize->add_setting( 'grandmart_theme_options[slider_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new GrandMart_Horizontal_Line( $wp_customize, 'grandmart_theme_options[slider_custom_hr_' . $i . ']', array(
		'section'           => 'grandmart_slider_section',
		'active_callback'	=> 'grandmart_slider_section_enable',
	) ) );

endfor;

