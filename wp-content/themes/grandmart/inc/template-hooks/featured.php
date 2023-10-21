<?php
/**
 * Featured hook
 *
 * @package grandmart
 */

if ( ! function_exists( 'grandmart_add_featured_section' ) ) :
    /**
    * Add featured section
    *
    *@since GrandMart 1.0.0
    */
    function grandmart_add_featured_section() {

        // Check if featured is enabled on frontpage
        $featured_enable = apply_filters( 'grandmart_section_status', 'enable_featured', '' );

        if ( ! $featured_enable )
            return false;

        if ( ! class_exists( 'WooCommerce' ) )
            return;

        // Get featured section details
        $section_details = array();
        $section_details = apply_filters( 'grandmart_filter_featured_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render featured section now.
        grandmart_render_featured_section( $section_details );
    }
endif;

if ( ! function_exists( 'grandmart_get_featured_section_details' ) ) :
    /**
    * featured section details.
    *
    * @since GrandMart 1.0.0
    * @param array $input featured section details.
    */
    function grandmart_get_featured_section_details( $input ) {

        // Content type.
        $featured_content_type  = grandmart_theme_option( 'featured_content_type' );
        $args = array();
        switch ( $featured_content_type ) {

            case 'product-category':
                $cat_id = grandmart_theme_option( 'featured_content_product_category' );

                $args = array(
                    'post_type'         => 'product',
                    'posts_per_page'    => 8,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'id',
                            'terms' => $cat_id,
                        ) ),
                    ); 
            break;

            case 'product-featured':
                $args = array(
                    'post_type'         => 'product',
                    'posts_per_page'    => 8,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'featured',
                            'operator' => 'IN', // or 'NOT IN' to exclude feature products
                        ) ),
                    ); 
            break;

            case 'best-selling':
                $args = array(
                    'post_type'         => 'product',
                    'posts_per_page'    => 8,
                    'meta_key'          => 'total_sales',
                    'orderby'           => 'meta_value_num',
                    ); 
            break;

            default:
            break;
        }
            
        if ( ! empty( $args ) )
            $input = $args;
       
        return $input;
    }
endif;
// featured section content details.
add_filter( 'grandmart_filter_featured_section_details', 'grandmart_get_featured_section_details' );


if ( ! function_exists( 'grandmart_render_featured_section' ) ) :
  /**
   * Start featured section
   *
   * @return string featured content
   * @since GrandMart 1.0.0
   *
   */
   function grandmart_render_featured_section( $args = array() ) {
        if ( empty( $args ) )
            return;

        $query = new WP_Query( $args );
        $width = grandmart_theme_option( 'featured_width', 'full-width' );
        $title = grandmart_theme_option( 'featured_title', '' );
        $sub_title = grandmart_theme_option( 'featured_sub_title', '' );

        if ( $query->have_posts() ) : ?>
        	<div class="featured-products page-section relative woocommerce <?php echo esc_attr( $width ); ?>">
                <div class="wrapper">
                    <?php if ( ! empty( $title ) || ! empty( $sub_title ) ) : ?>
                        <div class="section-header align-center">
                            <?php if ( ! empty( $title ) ) : ?>
                                <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                            <?php endif;
                            
                            if ( ! empty( $sub_title ) ) : ?>
                                <p class="section-description"><?php echo esc_html( $sub_title ); ?></p>
                            <?php endif; ?>

                        </div><!-- .section-header -->
                    <?php endif; ?>

                    <div class="section-content products column-4">
                        <?php while ( $query->have_posts() ) : $query->the_post(); 
                            wc_get_template_part( 'content', 'product' );
                        endwhile; ?>
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #our-featured -->
        <?php endif; 
        wp_reset_postdata();
    }
endif;