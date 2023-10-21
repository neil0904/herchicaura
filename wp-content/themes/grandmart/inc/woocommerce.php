<?php
/**
 * woocommerce functions and definitions
 *
 * @package grandmart
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function grandmart_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'grandmart_woocommerce_setup' );

if ( ! function_exists( 'grandmart_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function grandmart_woocommerce_product_wrapper_open() {
		echo '<div class="single-template-wrapper wrapper page-section">';
	}
}
add_action( 'woocommerce_before_main_content', 'grandmart_woocommerce_product_wrapper_open', 5 );

if ( ! function_exists( 'grandmart_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function grandmart_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_sidebar', 'grandmart_woocommerce_product_columns_wrapper_close', 20 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

if ( ! function_exists( 'grandmart_woocommerce_hide_page_title' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function grandmart_woocommerce_hide_page_title() {
		return false;
	}
}
add_filter( 'woocommerce_show_page_title', 'grandmart_woocommerce_hide_page_title' );

// Change number or products per row to 3
add_filter('loop_shop_columns', 'grandmart_loop_columns');

if ( ! function_exists( 'grandmart_loop_columns' ) ) {
	function grandmart_loop_columns() {
		return ( 'no-sidebar' == grandmart_sidebar_layout() ) ? 5 : 3; // 3 products per row
	}
}

add_filter( 'woocommerce_pagination_args', 'grandmart_woocommerce_pagination' );
if ( ! function_exists( 'grandmart_woocommerce_pagination' ) ) {
	function grandmart_woocommerce_pagination( $args ) {
		$args['prev_text'] = grandmart_get_svg( array( 'icon' => 'angle-left' ) );
		$args['next_text'] = grandmart_get_svg( array( 'icon' => 'angle-right' ) );
		$args['mid_size']  = 4;

		return $args;
	}
}

add_filter( 'get_product_search_form', 'grandmart_product_search' );
if ( ! function_exists( 'grandmart_product_search' ) ) { 
	function grandmart_product_search() { ?>
		<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'grandmart' ); ?></label>
			<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'grandmart' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
			<input type="hidden" name="post_type" value="product" />
			<button type="submit" class="search-submit"><?php echo grandmart_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'grandmart' ); ?></span></button>
		</form>
	<?php }
}

// archive image
add_filter( 'single_product_archive_thumbnail_size', 'grandmart_archive_image_size' );
if ( ! function_exists( 'grandmart_archive_image_size' ) ) {
	function grandmart_archive_image_size() {
		return 'post-thumbnail';
	}
}

if (!function_exists('grandmart_display_yith_quickview')) {
    /**
     * Display YITH Wishlist Buttons at product archive page
     *
     */
    function grandmart_display_yith_quickview()
    {
        if (!function_exists('yith_wcqv_install')) {
            return;
        }

        global $product, $post;
        $product_id = $post->ID;

        if ( ! $product_id ) {
            $product instanceof WC_Product && $product_id = yit_get_prop($product, 'id', true);
        }

        if ( $product_id ) {

	        ob_start(); ?>
	        <a href="#" class="yith-wcqv-button st-quick-view" data-product_id="<?php echo absint( $product_id ); ?>">
	        	<div data-toggle="tooltip" data-placement="top">
	        		<?php esc_html_e( 'Quick View', 'grandmart' ); ?>
	        	</div>
	        </a>
	        <?php echo ob_get_clean();
    	}

    }
}


// add to wishlist
if ( ! function_exists( 'grandmart_add_to_wishlist' ) ) {
	function grandmart_add_to_wishlist() { 
		if ( ! class_exists( 'YITH_WCWL' ) ) {
			return;
		}
		
		echo do_shortcode('[yith_wcwl_add_to_wishlist product_added_text="" already_in_wishslist_text="" ]');
	}
}

// add compare
if ( ! function_exists( 'grandmart_add_compare' ) ) {
	function grandmart_add_compare() { 
		if ( ! class_exists( 'YITH_Woocompare' ) ) {
			return;
		} 

		ob_start();
		?>
		<div class="compare-btn">
			<?php echo do_shortcode('[yith_compare_button type="link" container="no"]'); ?>
		</div>
	<?php echo ob_get_clean(); 
	}
}

// add to wishlist
if ( ! function_exists( 'grandmart_add_icons' ) ) {
	function grandmart_add_icons() {
		echo '<div class="product-icons">';
		grandmart_add_to_wishlist();

		grandmart_display_yith_quickview();	

		grandmart_add_compare();
		echo '</div>';
	}
}
add_action( 'woocommerce_before_shop_loop_item_title', 'grandmart_add_icons', 20 );
add_action( 'grandmart_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

if ( ! function_exists( 'grandmart_product_featured_image' ) ) {
	function grandmart_product_featured_image() {
		echo '<div class="featured-product-image">';
	}
}
add_action( 'woocommerce_before_shop_loop_item_title', 'grandmart_product_featured_image', 5 );

if ( ! function_exists( 'grandmart_product_featured_image_end' ) ) {
	function grandmart_product_featured_image_end() {
		echo '</div>';
	}
}
add_action( 'woocommerce_before_shop_loop_item_title', 'grandmart_product_featured_image_end', 30 );

add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 25 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 10 );

if ( ! function_exists( 'grandmart_remove_single_tab_label' ) ) {
	function grandmart_remove_single_tab_label() {
		return;
	}
}
add_filter( 'woocommerce_product_description_heading', 'grandmart_remove_single_tab_label' );
add_filter( 'woocommerce_product_additional_information_heading', 'grandmart_remove_single_tab_label' );
add_filter( 'woocommerce_reviews_title', 'grandmart_remove_single_tab_label' );

remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
add_action( 'woocommerce_after_shop_loop', 'grandmart_pagination', 10 );
