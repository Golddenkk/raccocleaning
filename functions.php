<?php
/**
 * raccocleaning functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package raccocleaning
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	$theme = wp_get_theme();
	$theme_version = $theme->get('Version');
	define( '_S_VERSION', $theme_version  );
}

define('TEMPLATE_DIRECTORY_URI', esc_url( get_template_directory_uri() ) );
define('TEMPLATE_DIRECTORY', get_template_directory());

if ( ! function_exists( 'raccocleaning_wp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function raccocleaning_wp_setup() {

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */

		load_theme_textdomain( 'raccocleaning', TEMPLATE_DIRECTORY . '/languages' );
		
		add_theme_support( 'title-tag' );
		add_theme_support('post-thumbnails');
        add_theme_support('custom-logo');
        add_theme_support('widgets');

		add_theme_support(
			'html5',
			array(
		
				'caption',
				'style',
				'script',
			)
		);

		add_image_size('158_50', 158, 50, false);
		add_image_size('40_40', 40, 40, false);
		add_image_size('28_28', 28, 28, false);
		add_image_size('169_135', 169, 135, false);
		add_image_size('521_520', 521, 520, false);
		add_image_size('45_45', 45, 45, false);

        register_nav_menus(
            array(
                'header' => esc_html__('Header Menu', 'raccocleaning'),
                'footer'  => __('Footer Menu', 'raccocleaning'),
            )
        );
	}
endif;
add_action( 'after_setup_theme', 'raccocleaning_wp_setup' );


require TEMPLATE_DIRECTORY . '/inc/acf-setting.php';

require TEMPLATE_DIRECTORY . '/inc/blocks.php';

require TEMPLATE_DIRECTORY . '/inc/enqueue-script-style.php';

require TEMPLATE_DIRECTORY . '/inc/menu.php';

require TEMPLATE_DIRECTORY . '/inc/filters.php';

require TEMPLATE_DIRECTORY . '/inc/user_role-customer.php';

require TEMPLATE_DIRECTORY . '/inc/booking-form-handler.php';

require TEMPLATE_DIRECTORY . '/inc/post_type-booking.php';