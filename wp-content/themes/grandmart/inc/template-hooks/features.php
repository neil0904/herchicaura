<?php
/**
 * Features hook
 *
 * @package grandmart
 */

if ( ! function_exists( 'grandmart_add_features_section' ) ) :
    /**
    * Add features section
    *
    *@since GrandMart 1.0.0
    */
    function grandmart_add_features_section() {

        // Check if features is enabled on frontpage
        $features_enable = apply_filters( 'grandmart_section_status', 'enable_features', '' );

        if ( ! $features_enable )
            return false;

        // Get features section details
        $section_details = array();
        $section_details = apply_filters( 'grandmart_filter_features_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render features section now.
        grandmart_render_features_section( $section_details );
    }
endif;

if ( ! function_exists( 'grandmart_get_features_section_details' ) ) :
    /**
    * features section details.
    *
    * @since GrandMart 1.0.0
    * @param array $input features section details.
    */
    function grandmart_get_features_section_details( $input ) {

        // Content type.
        $features_content_type  = grandmart_theme_option( 'features_content_type' );
        $content = array();
        $page_ids = array();
        $icons = array();

        for ( $i = 1; $i <= 3; $i++ )  :
            $page_id = grandmart_theme_option( 'features_content_page_' . $i );

            if ( ! empty( $page_id ) ) :
                $page_ids[] = $page_id;
                $icons[] = grandmart_theme_option( 'features_icon_' . $i );
            endif;

        endfor;
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          =>  ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 0;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = grandmart_trim_content( 10 );
                $page_post['icon']      = ! empty( $icons[ $i ] ) ? $icons[ $i ] : 'fa-laptop';

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
// features section content details.
add_filter( 'grandmart_filter_features_section_details', 'grandmart_get_features_section_details' );


if ( ! function_exists( 'grandmart_render_features_section' ) ) :
  /**
   * Start features section
   *
   * @return string features content
   * @since GrandMart 1.0.0
   *
   */
   function grandmart_render_features_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;
        ?>
    	<div class="case-studies page-section relative left-align">
            <div class="wrapper">
                <div class="section-content column-3">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry">
                            <div class="post-wrapper">
                                <?php if ( ! empty( $content['icon'] ) ) : ?>
                                    <div class="service">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <i class="fa <?php echo esc_attr( $content['icon'] ); ?>" ></i>
                                        </a>
                                    </div><!-- .service -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <?php if ( !empty( $content['title'] ) ) : ?>
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>
                                    <?php endif;

                                    if ( !empty( $content['excerpt'] ) ) : ?>
                                        <div class="entry-content">
                                            <?php echo esc_html( $content['excerpt'] ); ?>
                                        </div><!-- .entry-content -->
                                    <?php endif; ?>
                                </div><!-- .entry-container -->

                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #case-studies -->
    <?php 
    }
endif;