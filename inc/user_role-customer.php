<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function raccocleaning_create_customer_role() {
    add_role('customer', __('Customer', 'raccocleaning'), array(
        'read' => true,
    ));
}

add_action('init', 'raccocleaning_create_customer_role');

function raccocleaning_remove_admin_bar() {
    if (current_user_can('customer')) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'raccocleaning_remove_admin_bar');