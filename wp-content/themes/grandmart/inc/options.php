<?php
/**
 * Options functions
 *
 * @package grandmart
 */

if ( ! function_exists( 'grandmart_show_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function grandmart_show_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'grandmart' ),
            'off'       => esc_html__( 'No', 'grandmart' )
        );
        return apply_filters( 'grandmart_show_options', $arr );
    }
endif;

if ( ! function_exists( 'grandmart_page_choices' ) ) :
    /**
     * List of pages for page choices.
     * @return Array Array of page ids and name.
     */
    function grandmart_page_choices() {
        $pages = get_pages();
        $choices = array();
        $choices[0] = esc_html__( 'None', 'grandmart' );
        foreach ( $pages as $page ) {
            $choices[ $page->ID ] = $page->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'grandmart_post_choices' ) ) :
    /**
     * List of posts for post choices.
     * @return Array Array of post ids and name.
     */
    function grandmart_post_choices() {
        $posts = get_posts( array( 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'grandmart' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'grandmart_category_choices' ) ) :
    /**
     * List of categories for category choices.
     * @return Array Array of category ids and name.
     */
    function grandmart_category_choices() {
        $args = array(
                'type'          => 'post',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => 0,
                'hierarchical'  => 0,
                'taxonomy'      => 'category',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'grandmart' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'grandmart_product_choices' ) ) :
    /**
     * List of products for product choices.
     * @return Array Array of product ids and name.
     */
    function grandmart_product_choices() {
        $posts = get_posts( array( 'post_type' => 'product', 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'grandmart' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;
if ( ! function_exists( 'grandmart_product_category_choices' ) ) :
    /**
     * List of product categories for product category choices.
     * @return Array Array of product category ids and name.
     */
    function grandmart_product_category_choices() {
        $args = array(
                'type'          => 'product',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => 0,
                'hierarchical'  => 0,
                'taxonomy'      => 'product_cat',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'grandmart' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'grandmart_site_layout' ) ) :
    /**
     * site layout
     * @return array site layout
     */
    function grandmart_site_layout() {
        $grandmart_site_layout = array(
            'full'    => esc_url( get_template_directory_uri() ) . '/assets/uploads/full.png',
            'boxed'   => esc_url( get_template_directory_uri() ) . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'grandmart_site_layout', $grandmart_site_layout );

        return $output;
    }
endif;

if ( ! function_exists( 'grandmart_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidebar position
     */
    function grandmart_sidebar_position() {
        $grandmart_sidebar_position = array(
            'right-sidebar' => esc_url( get_template_directory_uri() ) . '/assets/uploads/right.png',
            'no-sidebar'    => esc_url( get_template_directory_uri() ) . '/assets/uploads/full.png',
            'no-sidebar-content'    => esc_url( get_template_directory_uri() ) . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'grandmart_sidebar_position', $grandmart_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'grandmart_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function grandmart_get_spinner_list() {
        $arr = array(
            'spinner-two-way'       => esc_html__( 'Two Way', 'grandmart' ),
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'grandmart' ),
            'spinner-dots'          => esc_html__( 'Dots', 'grandmart' ),
            'spinner-one-way'       => esc_html__( 'One Way', 'grandmart' ),
        );
        return apply_filters( 'grandmart_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'grandmart_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function grandmart_selected_sidebar() {
        $grandmart_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'grandmart' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar', 'grandmart' ),
        );

        $output = apply_filters( 'grandmart_selected_sidebar', $grandmart_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'grandmart_slider_product_choice' ) ) :
    /**
     * product options
     * @return array product
     */
    function grandmart_slider_product_choice() {
        $grandmart_slider_product_choice = array(
            'page'      => esc_html__( 'Page', 'grandmart' ),
        );

        if ( class_exists( 'WooCommerce' ) ) {
            $grandmart_slider_product_choice = array_merge( $grandmart_slider_product_choice, array( 'product' => esc_html__( 'Product', 'grandmart' ) ) );
        }

        $output = apply_filters( 'grandmart_slider_product_choice', $grandmart_slider_product_choice );

        return $output;
    }
endif;

if ( ! function_exists( 'grandmart_service_product_choice' ) ) :
    /**
     * product options
     * @return array product
     */
    function grandmart_service_product_choice() {
        $grandmart_service_product_choice = array(
            'page'      => esc_html__( 'Page', 'grandmart' ),
        );

        if ( class_exists( 'WooCommerce' ) ) {
            $grandmart_service_product_choice = array_merge( $grandmart_service_product_choice, array( 'product' => esc_html__( 'Product', 'grandmart' ) ) );
        }

        $output = apply_filters( 'grandmart_service_product_choice', $grandmart_service_product_choice );

        return $output;
    }
endif;

if ( ! function_exists( 'grandmart_category_product_choice' ) ) :
    /**
     * product options
     * @return array product
     */
    function grandmart_category_product_choice() {
        $grandmart_category_product_choice = array(
            'category'  => esc_html__( 'Category', 'grandmart' ),
        );

        if ( class_exists( 'WooCommerce' ) ) {
            $grandmart_category_product_choice = array_merge( $grandmart_category_product_choice, array( 'product-category' => esc_html__( 'Product Category', 'grandmart' ) ) );
        }

        $output = apply_filters( 'grandmart_category_product_choice', $grandmart_category_product_choice );

        return $output;
    }
endif;

if ( ! function_exists( 'grandmart_sortable_sections' ) ) :
    /**
     * homepage sections
     * @return array sortable sections
     */
    function grandmart_sortable_sections() {
        $output = array( 
            'slider'  => esc_html__( 'Slider Section', 'grandmart' ),
            'service'  => esc_html__( 'Service Section', 'grandmart' ),
            'introduction'  => esc_html__( 'Introduction Section', 'grandmart' ),
            'category'  => esc_html__( 'Category Section', 'grandmart' ),
            'featured'  => esc_html__( 'Featured Section', 'grandmart' ),
            'recent'  => esc_html__( 'Recent Section', 'grandmart' ),
            'cta'  => esc_html__( 'Call to Action Section', 'grandmart' ),
            'features'  => esc_html__( 'Features Section', 'grandmart' ),
        );

        return $output;
    }
endif;
