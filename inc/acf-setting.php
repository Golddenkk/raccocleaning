<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (current_user_can('administrator')) {
    if (function_exists('acf_add_options_page')) {
        $parent = acf_add_options_page(array(
            'page_title' => 'Theme settings',
            'menu_title' => 'Theme settings',
            'redirect' => true,
            'update_button' => __('Update', 'acf'),
            'position' => 8
        ));
    }
}