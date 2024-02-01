<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_action('wp_ajax_nopriv_raccocleaning_handle_booking_form', 'raccocleaning_booking_form_handle');
add_action('wp_ajax_raccocleaning_handle_booking_form', 'raccocleaning_booking_form_handle');

function raccocleaning_booking_form_handle() {
    check_ajax_referer('booking_nonce', 'nonce');

    parse_str($_POST['formData'], $formData);
    $validation_errors = raccocleaning_validate_booking_data($formData);

    if (!empty($validation_errors)) {
        wp_send_json_error($validation_errors);
        wp_die();
    }

    $user_id = raccocleaning_register_new_user($formData['name'], $formData['email'], $formData['tel']);

    if (is_wp_error($user_id)) {
        wp_send_json_error($user_id->get_error_message());
        wp_die();
    }

    $post_id = raccocleaning_create_booking($formData, $user_id);

    if (!$post_id) {
        wp_send_json_error('Failed to create booking');
        wp_die();
    }

    raccocleaning_send_booking_email_to_admin($formData, $post_id);

    wp_send_json_success(['message' => 'Booking created successfully', 'booking_id' => $post_id]);
    wp_die();
}

function raccocleaning_register_new_user($name, $email, $tel) {
    if (email_exists($email) === false) {
        $user_id = wp_insert_user([
            'user_login' => $email,
            'user_pass' => wp_generate_password(),
            'user_email' => $email,
            'first_name' => $name,
            'role' => 'customer'
        ]);

        if (!is_wp_error($user_id)) {
            update_user_meta($user_id, 'phone', $tel);

            return $user_id;
        } else {
            return $user_id;
        }
    } else {
        return new WP_Error('existing_user_email', __('User with this email already exists.', 'raccocleaning'));
    }
}

function raccocleaning_create_booking($formData, $user_id) {
    $post_id = wp_insert_post([
        'post_title' => wp_strip_all_tags('Booking №00'),
        'post_content' => '',
        'post_status' => 'publish',
        'post_type' => 'booking',
    ]);

    if ($post_id) {
        foreach ($formData as $key => $value) {
            update_post_meta($post_id, $key, sanitize_text_field($value));
        }
        update_post_meta($post_id, 'customer_id', $user_id);
        $updated_title = 'Booking №00' . $post_id;
        wp_update_post([
            'ID' => $post_id,
            'post_title' => $updated_title,
        ]);
    }

    return $post_id;
}

function raccocleaning_validate_booking_data($formData) {
    $errors = [];
    $requiredFields = ['name', 'tel', 'address', 'service', 'square', 'bedrooms', 'bathrooms', 'email'];

    foreach ($requiredFields as $field) {
        if (empty($formData[$field])) {
            $errors[$field] = ucfirst($field) . ' is required.';
        }
    }

    if (!empty($formData['email']) && !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Valid email is required.';
    }

    return $errors;
}

function raccocleaning_send_booking_email_to_admin($formData, $booking_id) {
    $admin_email = get_option('admin_email');
    $subject = 'New Booking #' . $booking_id;
    $body = "A new booking has been created. Here are the details:\n\n";

    foreach ($formData as $key => $value) {
        $label = ucfirst($key);
        $body .= "{$label}: {$value}\n";
    }

    $headers = array('Content-Type: text/plain; charset=UTF-8');

    wp_mail($admin_email, $subject, $body, $headers);
}



