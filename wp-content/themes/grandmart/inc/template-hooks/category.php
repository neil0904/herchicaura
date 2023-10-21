<?php
/**
 * Category hook
 *
 * @package grandmart
 */

if ( ! function_exists( 'grandmart_add_category_section' ) ) :
    /**
    * Add category section
    *
    *@since GrandMart 1.0.0
    */
    function grandmart_add_category_section() {

        // Check if category is enabled on frontpage
        $category_enable = apply_filters( 'grandmart_section_status', 'enable_category', '' );

        if ( ! $category_enable )
            return false;

        // Get category section details
        $section_details = array();
        $section_details = apply_filters( 'grandmart_filter_category_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render category section now.
        grandmart_render_category_section( $section_details );
    }
endif;

if ( ! function_exists( 'grandmart_get_category_section_details' ) ) :
    /**
    * category section details.
    *
    * @since GrandMart 1.0.0
    * @param array $input category section details.
    */
    function grandmart_get_category_section_details( $input ) {

        // Content type.
        $category_content_type  = grandmart_theme_option( 'category_content_type' );
        $content = array();
        switch ( $category_content_type ) {

            case 'category':
                for ( $i = 1; $i <= 4; $i++ )  :
                    $cat_id = grandmart_theme_option( 'category_content_category_' . $i );
                    if ( ! empty( $cat_id ) ) {
                        $cat = get_category($cat_id);
                        $cat_value['id'] = $cat_id;
                        $cat_value['image'] = grandmart_theme_option( 'category_image_' . $i );
                        $cat_value['title'] = get_cat_name( $cat_id );
                        $cat_value['url'] = get_category_link( $cat_id );
                        $cat_value['post_count'] = $cat->category_count;

                        array_push( $content ,  $cat_value );
                    }
                endfor;
            break;

            case 'product-category':
                if ( ! class_exists( 'WooCommerce' ) ) {
                    return;
                }

                for ( $i = 1; $i <= 4; $i++ )  :
                    $cat_id = grandmart_theme_option( 'category_content_product_category_' . $i );
                    if ( ! empty( $cat_id ) ) {
                        $content_term = get_term_by( 'id', $cat_id, 'product_cat');
                        $cat_value['id'] = $cat_id;
                        $cat_value['image'] = grandmart_theme_option( 'category_image_' . $i );
                        $cat_value['title'] = $content_term->name;
                        $cat_value['url'] = get_term_link( $cat_id, 'product_cat' );
                        $cat_value['post_count'] = $content_term->count;

                        array_push( $content ,  $cat_value );
                    }
                endfor;
            break;

            default:
            break;
        }
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// category section content details.
add_filter( 'grandmart_filter_category_section_details', 'grandmart_get_category_section_details' );


if ( ! function_exists( 'grandmart_render_category_section' ) ) :
  /**
   * Start category section
   *
   * @return string category content
   * @since GrandMart 1.0.0
   *
   */
   function grandmart_render_category_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $category_content_type  = grandmart_theme_option( 'category_content_type' );
        $category_control = grandmart_theme_option( 'category_arrow' );
        $category_auto_play = grandmart_theme_option( 'category_auto_play' );
        $title = grandmart_theme_option( 'category_title', '' );
        $sub_title = grandmart_theme_option( 'category_sub_title', '' );
        ?>
    	<div class="category-section page-section relative">
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

            <div class="category-slider section-content" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": false, "arrows":<?php echo $category_control ? 'true' : 'false'; ?>, "autoplay": <?php echo $category_auto_play ? 'true' : 'false'; ?>, "fade": false, "draggable": true }'>
                <?php foreach ( $content_details as $content ) : ?>
                    <article class="hentry">
                        <div class="post-wrapper">
                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <div class="featured-image">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>">
                                        <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                                    </a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>

                            <div class="entry-container">
                                <header class="entry-header">
                                    <?php if ( ! empty( $content['title'] ) ) : ?>
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?> <small>(<?php echo absint( $content['post_count'] ); ?>)</small></a></h2>
                                    <?php endif; ?>
                                </header>
                            </div><!-- .entry-container -->

                        </div><!-- .post-wrapper -->
                    </article>
                <?php endforeach; ?>
            </div><!-- .category-slider -->

        </div><!-- #custom-header -->
    <?php 
    }
endif;