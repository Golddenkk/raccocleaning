<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_filter('block_categories', 'custom_block_categories', 10, 2);

function custom_block_categories($categories, $post) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'raccocleaning',
                'title' => __('Home Page Blocks', 'raccocleaning'),
                'icon'  => 'wordpress'
            ]
        ]
    );
}

function raccocleaning_load_blocks() {
    if (function_exists('register_block_type')) {
        register_block_type( get_template_directory() . '/template-parts/blocks/home-page/promo-block/block.json' );
        register_block_type( get_template_directory() . '/template-parts/blocks/home-page/services-block/block.json' );
        register_block_type( get_template_directory() . '/template-parts/blocks/home-page/reasons-block/block.json' );
        register_block_type( get_template_directory() . '/template-parts/blocks/home-page/how-it-works-block/block.json' );
        register_block_type( get_template_directory() . '/template-parts/blocks/home-page/reviews-block/block.json' );
        register_block_type( get_template_directory() . '/template-parts/blocks/home-page/faq-block/block.json' );
    }
}

add_action( 'init', 'raccocleaning_load_blocks' );
