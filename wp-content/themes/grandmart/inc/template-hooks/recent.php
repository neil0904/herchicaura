<?php
/**
 * Recent hook
 *
 * @package grandmart
 */

if ( ! function_exists( 'grandmart_add_recent_section' ) ) :
    /**
    * Add recent section
    *
    *@since GrandMart 1.0.0
    */
    function grandmart_add_recent_section() {

        // Check if recent is enabled on frontpage
        $recent_enable = apply_filters( 'grandmart_section_status', 'enable_recent', '' );

        if ( ! $recent_enable )
            return false;

        // Get recent section details
        $section_details = array();
        $section_details = apply_filters( 'grandmart_filter_recent_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render recent section now.
        grandmart_render_recent_section( $section_details );
    }
endif;

if ( ! function_exists( 'grandmart_get_recent_section_details' ) ) :
    /**
    * recent section details.
    *
    * @since GrandMart 1.0.0
    * @param array $input recent section details.
    */
    function grandmart_get_recent_section_details( $input ) {

        // Content type.
        $recent_content_type  = grandmart_theme_option( 'recent_content_type' );
        $content = array();
        switch ( $recent_content_type ) {

            case 'recent':
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 3,
                    'ignore_sticky_posts' => true,
                    );                   
            break;

            case 'category':
                $cat_id = grandmart_theme_option( 'recent_content_category', '' );
                
                $args = array(
                    'post_type'         => 'post',
                    'cat'               =>  $cat_id,
                    'posts_per_page'    => 3,
                    'ignore_sticky_posts' => true,
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
                $page_post['excerpt']   = grandmart_trim_content( 20 );
                $page_post['author']    = grandmart_get_author();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

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
// recent section content details.
add_filter( 'grandmart_filter_recent_section_details', 'grandmart_get_recent_section_details' );


if ( ! function_exists( 'grandmart_render_recent_section' ) ) :
  /**
   * Start recent section
   *
   * @return string recent content
   * @since GrandMart 1.0.0
   *
   */
   function grandmart_render_recent_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $width = grandmart_theme_option( 'recent_width', 'full-width' );
        $title = grandmart_theme_option( 'recent_title', '' );
        $sub_title = grandmart_theme_option( 'recent_sub_title', '' );

        ?>
    	<div id="popular-posts" class="page-section relative <?php echo esc_attr( $width ); ?>">
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

                <div class="section-content column-3">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry">
                            <div class="post-wrapper">
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                                        </a>
                                    </div><!-- .recent-image -->
                                <?php endif; ?>
            
                                <div class="entry-container">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>
            
                                    <div class="entry-meta">
                                        <?php echo wp_kses_post( $content['author'] ); ?>

                                        <span class="posted-on">
                                            <a href="<?php echo esc_url( $content['url'] ); ?>">
                                                <time><?php echo date_i18n( get_option('date_format'), strtotime ( get_the_date( '', $content['id'] ) ) ); ?></time>
                                            </a>
                                        </span>
                                    </div>
                                    <!-- .entry-meta -->
                                </div>
                                <!-- .entry-container -->
                            </div>
                            <!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #popular-posts -->
    <?php 
    }
endif;