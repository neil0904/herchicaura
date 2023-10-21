<?php
/**
 * Templated sections init
 *
 * @package grandmart
 */

/**
 * Add template hooks defaults.
 */

// slider
require get_template_directory() . '/inc/template-hooks/slider.php';

// service
require get_template_directory() . '/inc/template-hooks/service.php';

// introduction
require get_template_directory() . '/inc/template-hooks/introduction.php';

// category
require get_template_directory() . '/inc/template-hooks/category.php';

// featured
require get_template_directory() . '/inc/template-hooks/featured.php';

// recent
require get_template_directory() . '/inc/template-hooks/recent.php';

// cta
require get_template_directory() . '/inc/template-hooks/cta.php';

// features
require get_template_directory() . '/inc/template-hooks/features.php';
