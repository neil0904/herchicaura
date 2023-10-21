<?php
/**
 * Service Customizer Options
 *
 * @package grandmart
 */

// Add service section
$wp_customize->add_section( 'grandmart_service_section', array(
	'title'             => esc_html__( 'Service Section','grandmart' ),
	'description'       => esc_html__( 'Service Setting Options', 'grandmart' ),
	'panel'             => 'grandmart_homepage_sections_panel',
) );

// service menu enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[enable_service]', array(
	'default'           => grandmart_theme_option('enable_service'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[enable_service]', array(
	'label'             => esc_html__( 'Enable Service', 'grandmart' ),
	'section'           => 'grandmart_service_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// service layout type control and setting
$wp_customize->add_setting( 'grandmart_theme_options[service_width]', array(
	'default'          	=> grandmart_theme_option('service_width'),
	'sanitize_callback' => 'grandmart_sanitize_select',
) );

$wp_customize->add_control( 'grandmart_theme_options[service_width]', array(
	'label'             => esc_html__( 'Section Width', 'grandmart' ),
	'section'           => 'grandmart_service_section',
	'type'				=> 'radio',
	'choices'			=> array( 
        'full-width'  		=> esc_html__( 'Full Width', 'grandmart' ),
		'container-width'  	=> esc_html__( 'Container Width', 'grandmart' ),
	),
	'active_callback'	=> 'grandmart_service_section_enable',
) );

// service content type control and setting
$wp_customize->add_setting( 'grandmart_theme_options[service_content_type]', array(
	'default'          	=> grandmart_theme_option('service_content_type'),
	'sanitize_callback' => 'grandmart_sanitize_select',
) );

$wp_customize->add_control( 'grandmart_theme_options[service_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'grandmart' ),
	'section'           => 'grandmart_service_section',
	'type'				=> 'select',
	'choices'			=> grandmart_service_product_choice(),
	'active_callback'	=> 'grandmart_service_section_enable',
) );

for ( $i = 1; $i <= 5; $i++ ) :

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'grandmart_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'grandmart_sanitize_page_post',
	) );

	$wp_customize->add_control( new GrandMart_Dropdown_Chosen_Control( $wp_customize, 'grandmart_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'grandmart' ), $i ),
		'section'           => 'grandmart_service_section',
		'choices'			=> grandmart_page_choices(),
		'active_callback'	=> 'grandmart_service_content_page_enable',
	) ) );

	// service products drop down chooser control and setting
	$wp_customize->add_setting( 'grandmart_theme_options[service_content_product_' . $i . ']', array(
		'sanitize_callback' => 'grandmart_sanitize_page_post',
	) );

	$wp_customize->add_control( new GrandMart_Dropdown_Chosen_Control( $wp_customize, 'grandmart_theme_options[service_content_product_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Product %d', 'grandmart' ), $i ),
		'section'           => 'grandmart_service_section',
		'choices'			=> grandmart_product_choices(),
		'active_callback'	=> 'grandmart_service_content_product_enable',
	) ) );

	// service title drop down chooser control and setting
	$wp_customize->add_setting( 'grandmart_theme_options[service_sub_title_' . $i . ']', array(
		'sanitize_callback' => 'grandmart_santize_allow_span',
	) );

	$wp_customize->add_control( 'grandmart_theme_options[service_sub_title_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Input Sub Title %d', 'grandmart' ), $i ),
		'description'       => esc_html__( 'Note: Add "<span>" tag to higlight portion', 'grandmart' ),
		'section'           => 'grandmart_service_section',
		'type'				=> 'text',
		'active_callback'	=> 'grandmart_service_section_enable',
	) );

	// service content type control and setting
	$wp_customize->add_setting( 'grandmart_theme_options[service_layout_' . $i . ']', array(
		'default'          	=> 'center-align',
		'sanitize_callback' => 'grandmart_sanitize_select',
	) );

	$wp_customize->add_control( 'grandmart_theme_options[service_layout_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Content Layout %d', 'grandmart' ), $i ),
		'section'           => 'grandmart_service_section',
		'type'				=> 'select',
		'choices'			=> array( 
			'center-align' 	=> esc_html__( 'Center Align', 'grandmart' ),
			'left-align' 	=> esc_html__( 'Left Align', 'grandmart' ),
			'right-align' 	=> esc_html__( 'Right Align', 'grandmart' ),
		),
		'active_callback'	=> 'grandmart_service_section_enable',
	) );

	// service hr control and setting
	$wp_customize->add_setting( 'grandmart_theme_options[service_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new GrandMart_Horizontal_Line( $wp_customize, 'grandmart_theme_options[service_custom_hr_' . $i . ']', array(
		'section'           => 'grandmart_service_section',
		'active_callback'	=> 'grandmart_service_section_enable',
	) ) );

endfor;
