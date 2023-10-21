<?php
/**
 * Default Theme Customizer Values
 *
 * @package grandmart
 */

function grandmart_get_default_theme_options() {
	$grandmart_default_options = array(
		// default options

		/* Homepage Sections */

		// Top Bar
		'enable_topbar'			=> false,
		'show_social_menu'		=> false,

		// Slider
		'enable_slider'			=> false,
		'slider_entire_site'	=> false,
		'slider_auto_play'		=> false,
		'slider_arrow'			=> true,
		'slider_zoom'			=> true,
		'slider_btn_label'		=> esc_html__( 'Shop Now', 'grandmart' ),
		'slider_alt_btn_label'	=> esc_html__( 'Contact Us', 'grandmart' ),
		'slider_alt_btn_url'	=> '#',
		'slider_content_type'	=> 'page',

		// Service
		'enable_service'		=> false,
		'service_content_type'	=> 'page',
		'service_width'			=> 'full-width',

		// Introduction
		'enable_introduction'		=> false,
		'introduction_align'		=> 'left-align',

		// Category
		'enable_category'			=> false,
		'category_auto_play'		=> false,
		'category_arrow'			=> true,
		'category_content_type'		=> 'category',
		'category_title'			=> esc_html__( 'Shop by collections', 'grandmart' ),
		'category_sub_title'		=> esc_html__( 'Browse the huge variety of our products', 'grandmart' ),

		// Featured
		'enable_featured'		=> false,
		'featured_content_type'	=> 'product-category',
		'featured_width'		=> 'full-width',
		'featured_title'		=> esc_html__( 'Featured Products', 'grandmart' ),
		'featured_sub_title'	=> esc_html__( 'All Styles in This Spring', 'grandmart' ),

		// Recent
		'enable_recent'			=> false,
		'recent_title'			=> esc_html__( 'Latest Blogs', 'grandmart' ),
		'recent_sub_title'		=> esc_html__( 'Read all the stories from journal', 'grandmart' ),
		'recent_content_type'	=> 'recent',
		'recent_width'			=> 'full-width',

		// Call to action
		'enable_cta'			=> false,
		'cta_btn_label'			=> esc_html__( 'Shop Now', 'grandmart' ),
		'cta_layout'			=> 'full-width',

		// Features
		'enable_features'		=> false,

		// Header
		'header_layout'			=> 'center-align',

		// Footer
		'slide_to_top'			=> true,
		'copyright_text'		=> esc_html__( 'Copyright &copy; 2020 | All Rights Reserved.', 'grandmart' ),

		/* Theme Options */

		// blog / archive
		'latest_blog_title'		=> esc_html__( 'Blogs', 'grandmart' ),
		'excerpt_count'			=> 25,
		'pagination_type'		=> 'numeric',
		'sidebar_layout'		=> 'right-sidebar',
		'column_type'			=> 'column-2',
		'show_date'				=> true,
		'show_category'			=> true,
		'show_author'			=> true,
		'show_comment'			=> true,

		// single post
		'sidebar_single_layout'	=> 'right-sidebar',
		'show_single_date'		=> true,
		'show_single_category'	=> true,
		'show_single_tags'		=> true,
		'show_single_author'	=> true,

		// page
		'sidebar_page_layout'	=> 'right-sidebar',

		// global
		'enable_loader'			=> true,
		'enable_breadcrumb'		=> true,
		'enable_sticky_header'	=> false,
		'loader_type'			=> 'spinner-dots',
		'site_layout'			=> 'full',
	);

	$output = apply_filters( 'grandmart_default_theme_options', $grandmart_default_options );
	return $output;
}