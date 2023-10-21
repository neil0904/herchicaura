<?php
/**
 * demo import
 *
 * @package grandmart
 */

/**
 * Imports predefine demos.
 * @return [type] [description]
 */
function grandmart_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Get demo content files for GrandMart Theme.', 'grandmart' ),
    esc_url( 'https://sharkthemes.com/downloads/grandmart' ), esc_html__( 'Click Here', 'grandmart' ) );

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'grandmart_intro_text' );
