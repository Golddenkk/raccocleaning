<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function raccocleaning_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'raccocleaning_mime_types');

function raccocleaning_custom_svg_size($image, $attachment_id, $size, $icon) {
    if ('169_135' === $size && 'image/svg+xml' === get_post_mime_type($attachment_id)) {
        $image[1] = 169;
        $image[2] = 135;
    }
    return $image;
}
add_filter('wp_get_attachment_image_src', 'raccocleaning_custom_svg_size', 10, 4);
