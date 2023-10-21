<?php
/**
 * Blog / Archive / Search Customizer Options
 *
 * @package grandmart
 */

// Add blog section
$wp_customize->add_section( 'grandmart_blog_section', array(
	'title'             => esc_html__( 'Blog/Archive Page Setting','grandmart' ),
	'description'       => esc_html__( 'Blog/Archive/Search Page Setting Options', 'grandmart' ),
	'panel'             => 'grandmart_theme_options_panel',
) );

// latest blog title drop down chooser control and setting
$wp_customize->add_setting( 'grandmart_theme_options[latest_blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> grandmart_theme_option( 'latest_blog_title' ),
) );

$wp_customize->add_control( new GrandMart_Dropdown_Chosen_Control( $wp_customize, 'grandmart_theme_options[latest_blog_title]', array(
	'label'             => esc_html__( 'Latest Blog Title', 'grandmart' ),
	'description'       => esc_html__( 'Note: This title is displayed when your homepage displays option is set to latest posts.', 'grandmart' ),
	'section'           => 'grandmart_blog_section',
	'type'				=> 'text',
) ) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[sidebar_layout]', array(
	'sanitize_callback'   => 'grandmart_sanitize_select',
	'default'             => grandmart_theme_option( 'sidebar_layout' ),
) );

$wp_customize->add_control(  new GrandMart_Radio_Image_Control ( $wp_customize, 'grandmart_theme_options[sidebar_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'grandmart' ),
	'section'             => 'grandmart_blog_section',
	'choices'			  => grandmart_sidebar_position(),
) ) );

// column control and setting
$wp_customize->add_setting( 'grandmart_theme_options[column_type]', array(
	'default'          	=> grandmart_theme_option( 'column_type' ),
	'sanitize_callback' => 'grandmart_sanitize_select',
) );

$wp_customize->add_control( 'grandmart_theme_options[column_type]', array(
	'label'             => esc_html__( 'Column Layout', 'grandmart' ),
	'section'           => 'grandmart_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-1' 		=> esc_html__( 'One Column', 'grandmart' ),
		'column-2' 		=> esc_html__( 'Two Column', 'grandmart' ),
	),
) );

// excerpt count control and setting
$wp_customize->add_setting( 'grandmart_theme_options[excerpt_count]', array(
	'default'          	=> grandmart_theme_option( 'excerpt_count' ),
	'sanitize_callback' => 'grandmart_sanitize_number_range',
	'validate_callback' => 'grandmart_validate_excerpt_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'grandmart_theme_options[excerpt_count]', array(
	'label'             => esc_html__( 'Excerpt Length', 'grandmart' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'grandmart' ),
	'section'           => 'grandmart_blog_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 50,
		),
) );

// pagination control and setting
$wp_customize->add_setting( 'grandmart_theme_options[pagination_type]', array(
	'default'          	=> grandmart_theme_option( 'pagination_type' ),
	'sanitize_callback' => 'grandmart_sanitize_select',
) );

$wp_customize->add_control( 'grandmart_theme_options[pagination_type]', array(
	'label'             => esc_html__( 'Pagination Type', 'grandmart' ),
	'section'           => 'grandmart_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'default' 		=> esc_html__( 'Default', 'grandmart' ),
		'numeric' 		=> esc_html__( 'Numeric', 'grandmart' ),
	),
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[show_date]', array(
	'default'           => grandmart_theme_option( 'show_date' ),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[show_date]', array(
	'label'             => esc_html__( 'Show Date', 'grandmart' ),
	'section'           => 'grandmart_blog_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[show_category]', array(
	'default'           => grandmart_theme_option( 'show_category' ),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[show_category]', array(
	'label'             => esc_html__( 'Show Category', 'grandmart' ),
	'section'           => 'grandmart_blog_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[show_author]', array(
	'default'           => grandmart_theme_option( 'show_author' ),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[show_author]', array(
	'label'             => esc_html__( 'Show Author', 'grandmart' ),
	'section'           => 'grandmart_blog_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );

// Archive comment meta setting and control.
$wp_customize->add_setting( 'grandmart_theme_options[show_comment]', array(
	'default'           => grandmart_theme_option( 'show_comment' ),
	'sanitize_callback' => 'grandmart_sanitize_switch',
) );

$wp_customize->add_control( new GrandMart_Switch_Control( $wp_customize, 'grandmart_theme_options[show_comment]', array(
	'label'             => esc_html__( 'Show Comment', 'grandmart' ),
	'section'           => 'grandmart_blog_section',
	'on_off_label' 		=> grandmart_show_options(),
) ) );