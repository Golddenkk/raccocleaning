<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function enqueue_raccocleaning_assets() {

    // Enqueue styles
    wp_enqueue_style('critical-css', TEMPLATE_DIRECTORY_URI . '/styles/critical.css', array(), '1.0', 'all');
    wp_enqueue_style('app-css', TEMPLATE_DIRECTORY_URI . '/styles/app.css', array(), '1.0', 'all');
    wp_enqueue_style('fancybox-css', TEMPLATE_DIRECTORY_URI . '/styles/jquery.fancybox.min.css', array(), '1.0', 'all');

    
    // Enqueue scripts
    wp_enqueue_script('jquery');

    wp_enqueue_script('lottie', 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js', array(), '5.9.6', false);

    wp_enqueue_script('jquery-inputmask', TEMPLATE_DIRECTORY_URI . '/scripts/jquery.inputmask.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-validate', TEMPLATE_DIRECTORY_URI . '/scripts/jquery.validate.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('additional-methods', TEMPLATE_DIRECTORY_URI . '/scripts/additional-methods.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-fancybox', TEMPLATE_DIRECTORY_URI . '/scripts/jquery.fancybox.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('swiper', TEMPLATE_DIRECTORY_URI . '/scripts/swiper.js', array('jquery'), '1.0', true);
    wp_enqueue_script('app-script', TEMPLATE_DIRECTORY_URI . '/scripts/app.js', array('jquery'), '1.0', true);

    wp_localize_script('app-script', 'raccocleaning_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('booking_nonce'),
    ));
}

add_action('wp_enqueue_scripts', 'enqueue_raccocleaning_assets');