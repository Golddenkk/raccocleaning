<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function raccocleaning_create_booking_post_type() {
    register_post_type('booking', array(
        'labels' => array(
            'name' => __('Bookings'),
            'singular_name' => __('Booking')
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'custom-fields'),
    ));
}
add_action('init', 'raccocleaning_create_booking_post_type');

function raccocleaning_add_booking_meta_boxes() {
    add_meta_box('booking_details_meta_box', __('Booking Details'), 'raccocleaning_booking_details_meta_box_callback', 'booking', 'normal', 'high');
}
add_action('add_meta_boxes', 'raccocleaning_add_booking_meta_boxes');

function raccocleaning_booking_details_meta_box_callback($post) {
    $fields = ['name', 'tel', 'address', 'service', 'square', 'bedrooms', 'bathrooms', 'email'];
    foreach ($fields as $field) {
        echo '<p><strong>' . ucfirst($field) . ':</strong> ' . get_post_meta($post->ID, $field, true) . '</p>';
    }

    $customer_id = get_post_meta($post->ID, 'customer_id', true);
    if ($customer_id) {
        $user_info = get_userdata($customer_id);
        if ($user_info) {
            echo '<p><strong>Customer:</strong> <a href="' . get_edit_user_link($customer_id) . '">' . esc_html($user_info->user_email) . '</a></p>';
        }
    }
}

function raccocleaning_add_booking_columns($columns) {
    $columns['booking_details'] = __('Booking Details');
    $columns['customer'] = __('Customer');
    $columns['phone'] = __('Phone');
    return $columns;
}
add_filter('manage_booking_posts_columns', 'raccocleaning_add_booking_columns');


function raccocleaning_booking_columns_content($column, $post_id) {
    switch ($column) {
        case 'booking_details':
            // Вывод деталей заказа с названиями полей
            $fields = ['address', 'service', 'square', 'bedrooms', 'bathrooms'];
            $details = [];
            foreach ($fields as $field) {
                $value = get_post_meta($post_id, $field, true);
                if (!empty($value)) {
                    $details[] = ucfirst($field) . ": " . esc_html($value);
                }
            }
            echo implode('<br>', $details);
            break;
        case 'customer':
            // Вывод клиента
            $customer_id = get_post_meta($post_id, 'customer_id', true);
            $user_info = get_userdata($customer_id);
            if ($user_info) {
                echo sprintf('<a href="%s">%s</a>', get_edit_user_link($customer_id), esc_html($user_info->user_email));
            }
            break;
        case 'phone':
            // Вывод телефона
            $phone = get_post_meta($post_id, 'tel', true);
            if (!empty($phone)) {
                echo esc_html($phone);
            }
            break;
    }
}
add_action('manage_booking_posts_custom_column', 'raccocleaning_booking_columns_content', 10, 2);


