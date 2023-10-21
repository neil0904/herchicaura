<?php
/**
 * Footer Customizer Options
 *
 * @package grandmart
 */

// Add footer section
$wp_customize->add_section( 'grandmart_footer_section', array(
	'title'             => esc_html__( 'Footer Section','grandmart' ),
	'description'       => esc_html__( 'Footer Setting Options', 'grandmart' ),
	'panel'             => 'grandmart_theme_options_panel',
) );

// slide to top enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[slide_to_top]', array(
	'default'           => grandmart_theme_option('slide_to_top'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[slide_to_top]', array(
	'label'             => esc_html__( 'Show Slide to Top', 'grandmart' ),
	'section'           => 'grandmart_footer_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// copyright text
$wp_customize->add_setting( 'grandmart_theme_options[copyright_text]',
	array(
		'default'       		=> grandmart_theme_option('copyright_text'),
		'sanitize_callback'		=> 'grandmart_santize_allow_tags',
	)
);
$wp_customize->add_control( 'grandmart_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'grandmart' ),
		'section'    			=> 'grandmart_footer_section',
		'type'		 			=> 'textarea',
    )
);

