<?php
/**
 * Features Customizer Options
 *
 * @package grandmart
 */

// Add features section
$wp_customize->add_section( 'grandmart_features_section', array(
	'title'             => esc_html__( 'Features Section','grandmart' ),
	'description'       => esc_html__( 'Features Setting Options', 'grandmart' ),
	'panel'             => 'grandmart_homepage_sections_panel',
) );

// features menu enable setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[enable_features]', array(
	'default'           => grandmart_theme_option('enable_features'),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[enable_features]', array(
	'label'             => esc_html__( 'Enable Features', 'grandmart' ),
	'section'           => 'grandmart_features_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

for ( $i = 1; $i <= 3; $i++ ) :

	// features menu enable setting and control.
	$wp_customize->add_setting( 'grandmart_theme_options[features_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new GrandMart_Icon_Picker_Control( $wp_customize, 'grandmart_theme_options[features_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'grandmart' ), $i ),
		'section'           => 'grandmart_features_section',
		'type' 				=> 'icon_picker',
		'active_callback'	=> 'grandmart_features_section_enable',
	) ) );

	// features pages drop down chooser control and setting
	$wp_customize->add_setting( 'grandmart_theme_options[features_content_page_' . $i . ']', array(
		'sanitize_callback' => 'grandmart_sanitize_page_post',
	) );

	$wp_customize->add_control( new GrandMart_Dropdown_Chosen_Control( $wp_customize, 'grandmart_theme_options[features_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'grandmart' ), $i ),
		'section'           => 'grandmart_features_section',
		'choices'			=> grandmart_page_choices(),
		'active_callback'	=> 'grandmart_features_section_enable',
	) ) );

	// features hr control and setting
	$wp_customize->add_setting( 'grandmart_theme_options[features_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new GrandMart_Horizontal_Line( $wp_customize, 'grandmart_theme_options[features_custom_hr_' . $i . ']', array(
		'section'           => 'grandmart_features_section',
		'active_callback'	=> 'grandmart_features_section_enable',
	) ) );

endfor;
