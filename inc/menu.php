<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if ( ! function_exists( 'raccocleaning_header_menu' ) ) {
    function raccocleaning_header_menu() {
        wp_nav_menu(
            array(
                'theme_location' => 'header',
                'container' => false,
                'items_wrap' => '<ul>%3$s</ul>'
            )
        );
    }
}

if ( ! function_exists( 'raccocleaning_footer_menu' ) ) {
    function raccocleaning_footer_menu() {
        wp_nav_menu(
            array(
                'theme_location' => 'footer',
                'container' => false,
                'items_wrap' => '<ul>%3$s</ul>'
            )
        );
    }
}


