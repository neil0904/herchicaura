<?php
/**
 * theme color
 *
 * @package grandmart
 */

/**
 * Generate the CSS for the current custom color.
 */
function grandmart_custom_colors_css() {
    $color_value = grandmart_theme_option('colorscheme');
    
    $css = '
    /* Color ' . esc_attr( $color_value ) . ' */
    .our-services article.hentry .fa,
    .loader-container svg, 
    .blog-loader svg,
    .widget .tagcloud a:hover,
    .contact_widget .contact-details svg,
    ul.trail-items li a:hover,
    span.tags-links a:hover, span.tags-links a:focus, 
    .single-post .entry-meta span.tags-links a:hover, 
    .single-post .entry-meta span.tags-links a:focus,
    .main-navigation ul.nav-menu li.current-menu-item a,
    .main-navigation ul.nav-menu li:hover > a,
    .main-navigation ul.sub-menu li:hover > a, 
    .main-navigation ul.sub-menu li:focus > a,
    .custom-header-content .read-more:nth-child(1),
    .case-studies article .fa,
    .short-cta-section a.read-more:hover,
    .entry-header h2.entry-title a:hover, 
    .entry-header h2.entry-title a:focus,
    .category-section article h2.entry-title:hover a,
    .custom-header-content span.cat-links a,
    .inner-header-image .entry-meta span.cat-links a,
    .main-navigation ul.nav-menu li.menu-item-has-children:hover > a svg, 
    .main-navigation ul.nav-menu li.menu-item-has-children.focus > a svg,
    .main-navigation ul.nav-menu li:hover:before, 
    .main-navigation ul.nav-menu li.focus:before, 
    .main-navigation ul.nav-menu li.current-menu-item:before, 
    .main-navigation ul.nav-menu li.current-menu-item > a,
    .main-navigation ul.nav-menu li:hover > a, 
    .main-navigation ul.nav-menu li.focus > a
    {
        color: ' . esc_attr( $color_value ) . ';
        fill: ' . esc_attr( $color_value ) . ';

    }
    .navigation.pagination svg,
    .pagination a.page-numbers:hover svg, 
    .pagination a.page-numbers:focus svg,
    .post-navigation a:hover svg, 
    .posts-navigation a:hover svg,
    a.more-btn:hover svg
    {
        fill: #262626;
        color: #262626;
    }
    .pagination a.page-numbers:hover, 
    .pagination a.page-numbers:focus,
    #secondary .widget-title, 
    #secondary .widgettitle,
    article .entry-title a:hover,
    {
        color: #262626;
    }
    .counter-widget .section-title,
    .counter .counter-value,
    .counter h5.counter-label,
    .secondary-menu ul li svg,
    .custom-header-content h2 a,
    #top-menu ul li,
    .secondary-menu a,
    .social-menu ul li a svg,
    #top-menu svg.icon-up,
    #top-menu svg.icon-down,
    #colophon .entry-content, 
    .footer-widgets-area .widget, 
    .footer-widgets-area a, 
    .footer-widgets-area p,
    #colophon .widget_latest_post .entry-meta, 
    #colophon .widget_latest_post .post-content .entry-meta > span.posted-on,
    #colophon article .entry-title a, 
    #colophon .widget_recent_entries span.post-date,
    .main-navigation ul.nav-menu > li.highlight:hover > a,
    .main-navigation ul.nav-menu > li.highlight:hover > a > svg
    {
        color: #fff;
        fill: #fff;
    }

    /* Background */
    .team-section .team-image .overlay,
    .cta-section .overlay,
    #portfolio .gallery .featured-image .overlay
    {
        background: rgba(0,0,0,0.8);
    }
    .counter-widget .overlay
    {
        background: rgba(0,0,0,0.2);
    }
    a.more-btn:hover,
    #top-menu,
    .custom-header-content .read-more:nth-child(2),
    .pagination .page-numbers.current,
    .reply a,
    .backtotop,
    .read-more,
    .featured-tab ul.tab-header li.active, 
    .featured-tab ul.tab-header li:hover,
    input[type="submit"],
    .woocommerce div.product form.cart .button,
    .counter-section .wrapper .counter-container .read-more,
    .widget_search form.search-form button.search-submit,
    .main-navigation ul.nav-menu > li.highlight,
    #top-menu ul li.mini-cart .mini-cart-items
    {
        background-color: ' . esc_attr( $color_value ) . ';
    }
    .hero-section .read-more:hover,
    .custom-header-content-wrapper.slide-item .custom-header-content .read-more:hover,
    .team-section article .entry-header .separator,
    .backtotop:hover,
    #respond input[type="submit"]:hover, 
    #respond input[type="submit"]:focus,
    #top-menu ul li.mini-cart .mini-cart-items .button.wc-forward:hover, 
    #top-menu ul li.mini-cart .mini-cart-items .button.wc-forward:focus
    {
        background-color: #262626;
    }
    #colophon, 
    .site-info,
    .cta-section
    {
        background-color: #111;
    }
    .testimonial-slider .separator,
    .counter-widget .section-header .separator,
    .counter .separator {
        background-color: #fff;
    }
    .slick-prev, .slick-next
    {
        background-color: rgba( 0,0,0,0.1 );
    }
    /* Border */
    .read-more:hover,
    .hero-section .read-more:hover,
    .pagination a.page-numbers:hover, 
    .pagination a.page-numbers:focus,
    .custom-header-content-wrapper.slide-item .custom-header-content .read-more:hover,
    #search.search-open,
    .our-services article.hentry .fa,
    .post-navigation, 
    .posts-navigation, 
    .post-navigation, 
    .posts-navigation,
    #respond input[type="submit"]:hover, 
    #respond input[type="submit"]:focus,
    #top-menu ul li.mini-cart .mini-cart-items .button.wc-forward:hover, 
    #top-menu ul li.mini-cart .mini-cart-items .button.wc-forward:focus
    {
        border-color: #262626;
    }
    a.more-btn,
    #portfolio .gallery,
    #portfolio .gallery .featured-image .overlay .read-more:hover,
    span.tags-links a:hover, span.tags-links a:focus, 
    .single-post .entry-meta span.tags-links a:hover, 
    .single-post .entry-meta span.tags-links a:focus,
    .site-footer .widget-title,
    .read-more,
    .featured-tab ul.tab-header li.active, 
    .featured-tab ul.tab-header li:hover,
    .widget .tagcloud a:hover,
    .case-studies article .fa,
    #respond input[type="submit"]
    {
        border-color: ' . esc_attr( $color_value ) . ';
    }

    /* Responsive */

    @media screen and (max-width: 1023px) {
        #masthead.site-header.sticky-header.nav-shrink .site-title a, 
        .site-title a, 
        #masthead.site-header.sticky-header .site-title a
        {
            color: ' . esc_attr( $color_value ) . ';
        }
        #masthead.site-header.sticky-header.nav-shrink {
            background-color: #fff; 
        }
    }

    /* Woocommerce */

    .woocommerce #respond input#submit, 
    .woocommerce a.button, 
    .woocommerce button.button, 
    .woocommerce input.button,
    .woocommerce #respond input#submit.alt, 
    .woocommerce a.button.alt, 
    .woocommerce button.button.alt, 
    .woocommerce input.button.alt,
    .woocommerce .widget_price_filter .price_slider_amount .button,
    .woocommerce ul.products li.product .button
    {
        color: #fff;
        background-color: #262626;
    }
    .woocommerce #respond input#submit:hover, 
    .woocommerce a.button:hover, 
    .woocommerce button.button:hover, 
    .woocommerce input.button:hover,
    .woocommerce #respond input#submit.alt:hover, 
    .woocommerce a.button.alt:hover, 
    .woocommerce button.button.alt:hover, 
    .woocommerce input.button.alt:hover,
    .woocommerce .widget_price_filter .price_slider_amount .button:hover,
    .woocommerce ul.products li.product .button:hover 
    {
        background-color: ' . esc_attr( $color_value ) . ';
        color: #fff;
    }
    .woocommerce div.product p.price, .woocommerce div.product span.price,
    .woocommerce ul.products li.product .woocommerce-loop-category__title:hover, 
    .woocommerce ul.products li.product .woocommerce-loop-product__title:hover, 
    .woocommerce ul.products li.product h3:hover 
    {
        color: #262626;
    }
    .woocommerce nav.woocommerce-pagination ul li span.current,
    .woocommerce .widget_price_filter .ui-slider .ui-slider-range
    {
        background-color: ' . esc_attr( $color_value ) . ';
    }
    .woocommerce nav.woocommerce-pagination ul li a:focus svg, 
    .woocommerce nav.woocommerce-pagination ul li a:focus, 
    .woocommerce nav.woocommerce-pagination ul li a:hover,
    .woocommerce nav.woocommerce-pagination ul li a:hover svg
    {
        border-color: #262626;
        color: #262626;
        fill: #262626;
    }';

    return apply_filters( 'grandmart_custom_colors_css', $css );
}