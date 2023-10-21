<?php
/**
 * Slider hook
 *
 * @package grandmart
 */

if ( ! function_exists( 'grandmart_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since GrandMart 1.0.0
    */
    function grandmart_add_slider_section() {

        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'grandmart_section_status', 'enable_slider', 'slider_entire_site' );

        if ( ! $slider_enable )
            return false;

        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'grandmart_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render slider section now.
        grandmart_render_slider_section( $section_details );
    }
endif;

if ( ! function_exists( 'grandmart_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since GrandMart 1.0.0
    * @param array $input slider section details.
    */
    function grandmart_get_slider_section_details( $input ) {

        // Content type.
        $slider_content_type  = grandmart_theme_option( 'slider_content_type' );
        $content = array();
        switch ( $slider_content_type ) {

            case 'page':
                $page_ids = array();
                $layout = array();

                for ( $i = 1; $i <= 5; $i++ )  :
                    $page_id = grandmart_theme_option( 'slider_content_page_' . $i );

                    if ( ! empty( $page_id ) ) :
                        $page_ids[] = $page_id;
                        $layout[] = grandmart_theme_option( 'slider_layout_' . $i );
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
                $layout = array();

                for ( $i = 1; $i <= 5; $i++ )  :
                    $post_id = grandmart_theme_option( 'slider_content_product_' . $i );

                    if ( ! empty( $post_id ) ) :
                        $post_ids[] = $post_id;
                        $layout[] = grandmart_theme_option( 'slider_layout_' . $i );
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
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['layout']    = ! empty( $layout[$i] ) ? $layout[$i] : 'center-align';
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// slider section content details.
add_filter( 'grandmart_filter_slider_section_details', 'grandmart_get_slider_section_details' );


if ( ! function_exists( 'grandmart_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since GrandMart 1.0.0
   *
   */
   function grandmart_render_slider_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;
        $slider_content_type  = grandmart_theme_option( 'slider_content_type' );
        $slider_control = grandmart_theme_option( 'slider_arrow' );
        $slider_auto_play = grandmart_theme_option( 'slider_auto_play' );
        $slider_zoom  = grandmart_theme_option( 'slider_zoom' );
        $slider_btn_label = grandmart_theme_option( 'slider_btn_label', esc_html__( 'Learn More', 'grandmart' ) );
        $slider_alt_btn_label = grandmart_theme_option( 'slider_alt_btn_label', esc_html__( 'Contact Us', 'grandmart' ) );
        $slider_alt_btn_link = grandmart_theme_option( 'slider_alt_btn_link', '' );
        ?>
    	<div id="custom-header">
            <div class="section-content banner-slider column-1 <?php echo $slider_zoom ? 'zoom-slider' : ''; ?>" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": false, "arrows":<?php echo $slider_control ? 'true' : 'false'; ?>, "autoplay": <?php echo $slider_auto_play ? 'true' : 'false'; ?>, "fade": true, "draggable": true }'>
                <?php foreach ( $content_details as $content ) : ?>
                    <div class="custom-header-content-wrapper slide-item">
                        <?php if ( ! empty( $content['image'] ) ) : ?>
                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                        <?php endif; ?>
                        <div class="overlay"></div>
                        <div class="wrapper">
                            <div class="custom-header-content <?php echo esc_attr( $content['layout'] ); ?>">

                                <?php if ( in_array( $slider_content_type, array( 'post', 'category' ) ) ) : ?>
                                    <div class="entry-meta">
                                        <span class="cat-links">
                                            <?php the_category( ' ', '', $content['id'] ); ?>
                                        </span>
                                    </div>
                                <?php elseif ( in_array( $slider_content_type, array( 'product', 'product-category' ) ) ) : 
                                    $product_terms = get_the_terms( $content['id'], 'product_cat' ); ?>
                                    <div class="entry-meta">
                                        <span class="cat-links">
                                            <?php foreach ( $product_terms as $product_term ) : ?>
                                                <a href="<?php echo esc_url(get_term_link( $product_term->term_id, 'product_cat' ) ); ?>"><?php echo esc_html( $product_term->name ); ?></a>
                                            <?php endforeach; ?>
                                        </span>
                                    </div>
                                <?php endif; 

                                if ( ! empty( $content['title'] ) ) : ?>
                                    <h2><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                <?php endif; ?>
                                
                                <div class="btn">
                                    <?php if ( ! empty( $slider_btn_label ) ) : ?>
                                        <a class="read-more" href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $slider_btn_label ); ?></a>
                                    <?php endif; 

                                    if ( ! empty( $slider_alt_btn_label ) && ! empty( $slider_alt_btn_link ) ) : ?>
                                        <a class="read-more alt-btn" href="<?php echo esc_url( $slider_alt_btn_link ); ?>"><?php echo esc_html( $slider_alt_btn_label ); ?></a>
                                    <?php endif; ?>
                                </div><!-- .btn -->
                            </div><!-- .custom-header-content -->
                        </div>
                    </div><!-- .custom-header-content-wrapper -->
                <?php endforeach; ?>
            </div><!-- .wrapper -->

        </div><!-- #custom-header -->
    <?php 
    }
endif;