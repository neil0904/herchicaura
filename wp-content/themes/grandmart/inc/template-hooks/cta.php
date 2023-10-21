<?php
/**
 * Call to action hook
 *
 * @package grandmart
 */

if ( ! function_exists( 'grandmart_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since GrandMart 1.0.0
    */
    function grandmart_add_cta_section() {

        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'grandmart_section_status', 'enable_cta', '' );

        if ( ! $cta_enable )
            return false;

        // Get cta section details
        $section_details = array();
        $section_details = apply_filters( 'grandmart_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render cta section now.
        grandmart_render_cta_section( $section_details );
    }
endif;

if ( ! function_exists( 'grandmart_get_cta_section_details' ) ) :
    /**
    * cta section details.
    *
    * @since GrandMart 1.0.0
    * @param array $input cta section details.
    */
    function grandmart_get_cta_section_details( $input ) {

        // Content type.
        $cta_content_type  = grandmart_theme_option( 'cta_content_type' );
        $content = array();
        $page_id = grandmart_theme_option( 'cta_content_page', '' );
        
        $args = array(
            'post_type' => 'page',
            'page_id' => absint( $page_id ),
            'posts_per_page' => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = get_the_post_thumbnail_url( get_the_id(), 'full' );

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// cta section content details.
add_filter( 'grandmart_filter_cta_section_details', 'grandmart_get_cta_section_details' );


if ( ! function_exists( 'grandmart_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since GrandMart 1.0.0
   *
   */
   function grandmart_render_cta_section( $content_details = array() ) {
        $read_more = grandmart_theme_option( 'cta_btn_label', esc_html__( 'Shop Now', 'grandmart' ) );
        $cta_layout = grandmart_theme_option( 'cta_layout', 'full-width' );

        if ( empty( $content_details ) )
            return;

        foreach ( $content_details as $content ) :  ?>

            <div class="cta-section short-cta-section relative <?php echo ( 'container-width' == $cta_layout ) ? 'wrapper' : ''; ?>" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                <div class="wrapper-content">
                    <?php if ( ! empty( $content['title'] ) ) : ?>
                        <div class="section-header align-center add-separator">
                            <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; ?>

                    <div class="read-more-section">
                        <a class="read-more" href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $read_more ); ?></a>    
                    </div> <!-- .read-more-section -->    
                </div><!-- .wrapper-content --> 
            </div>
        <?php endforeach;
    }
endif;