<?php
/**
 * Service hook
 *
 * @package grandmart
 */

if ( ! function_exists( 'grandmart_add_service_section' ) ) :
    /**
    * Add service section
    *
    *@since GrandMart 1.0.0
    */
    function grandmart_add_service_section() {

        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'grandmart_section_status', 'enable_service', '' );

        if ( ! $service_enable )
            return false;

        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'grandmart_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render service section now.
        grandmart_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'grandmart_get_service_section_details' ) ) :
    /**
    * service section details.
    *
    * @since GrandMart 1.0.0
    * @param array $input service section details.
    */
    function grandmart_get_service_section_details( $input ) {

        // Content type.
        $service_content_type  = grandmart_theme_option( 'service_content_type' );
        $content = array();
        switch ( $service_content_type ) {

            case 'page':
                $page_ids = array();
                $sub_title = array();

                for ( $i = 1; $i <= 5; $i++ )  :
                    $page_id = grandmart_theme_option( 'service_content_page_' . $i );

                    if ( ! empty( $page_id ) ) :
                        $page_ids[] = $page_id;
                        $sub_title[] = grandmart_theme_option( 'service_sub_title_' . $i );
                        $layout[]    =  grandmart_theme_option( 'service_layout_' . $i );
                    endif;
                endfor;
                
                $args = array(
                    'post_type'         => 'page',
                    'post__in'          =>  ( array ) $page_ids,
                    'posts_per_page'    => 5,
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'product':
                if ( ! class_exists( 'WooCommerce' ) ) {
                    return;
                }

                $post_ids = array();
                $sub_title = array();

                for ( $i = 1; $i <= 5; $i++ )  :
                    $post_id = grandmart_theme_option( 'service_content_product_' . $i );

                    if ( ! empty( $post_id ) ) :
                        $post_ids[] = $post_id;
                        $sub_title[] = grandmart_theme_option( 'service_sub_title_' . $i );
                        $layout[]    =  grandmart_theme_option( 'service_layout_' . $i );
                    endif;
                endfor;
                
                $args = array(
                    'post_type'         => 'product',
                    'post__in'          =>  ( array ) $post_ids,
                    'posts_per_page'    => 5,
                    'orderby'           => 'post__in',
                    );                    
            break;

            default:
            break;
        }

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 0;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['sub_title'] = ! empty( $sub_title[ $i ] ) ? $sub_title[ $i ] : '';
                $page_post['layout']    = ! empty( $layout[ $i ] ) ? $layout[ $i ] : 'center-align';
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'grandmart-thumbnail' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// service section content details.
add_filter( 'grandmart_filter_service_section_details', 'grandmart_get_service_section_details' );


if ( ! function_exists( 'grandmart_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since GrandMart 1.0.0
   *
   */
   function grandmart_render_service_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $column = grandmart_theme_option( 'service_column', 'column-3' );
        $service_width = grandmart_theme_option( 'service_width', 'full-width' );

        ?>
    	<div class="our-services page-section relative <?php echo esc_attr(  $service_width ); ?>">
            <div class="<?php echo 'container-width' == $service_width ? 'wrapper' : ''; ?>">
                <div class="section-content grid column-4">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry grid-item">
                            <div class="post-wrapper <?php echo esc_attr( $content['layout'] ); ?>">
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                                        </a>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <header class="entry-header">
                                        <?php if ( ! empty( $content['sub_title'] ) ) : ?>
                                            <p class="subtitle"><?php echo grandmart_santize_allow_span( $content['sub_title'] ); ?></p>
                                        <?php endif; 

                                        if ( ! empty( $content['title'] ) ) : ?>
                                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        <?php endif; ?>
                                    </header>
                                </div><!-- .entry-container -->

                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #our-services -->
    <?php 
    }
endif;