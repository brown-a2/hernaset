<?php

// Enqueue parent theme styles
function herrnaset_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

        // Enqueue child theme styles
        wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'), wp_get_theme()->get('Version'));

        // Enqueue the external flag icons stylesheet
        wp_enqueue_style('flag-icons', 'https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css', array(), null);
}

add_action('wp_enqueue_scripts', 'herrnaset_enqueue_styles');


/**
 * Dashboard/backend modifications
 */
require get_stylesheet_directory() . '/inc/dashboard.php';
require get_stylesheet_directory() . '/inc/default-post.php';

/**
 * Disable comments
 */
require get_stylesheet_directory() . '/inc/disable-comments.php';

/**
 * Country and flag array
 */
require get_stylesheet_directory() . '/inc/countries.php';

/**
 * Useful functions
 */
require get_stylesheet_directory() . '/inc/flag-management.php';


/**
 * Replace archive category meta posts from twentytwentyfour theme with my own custom
 * example location: /travel/category/countries/
 */
function herrnaset_custom_pattern_replace() {
    // Unregister the parent theme's pattern
    unregister_block_pattern('twentytwentyfour/hidden-post-meta');

    // Register the child theme's pattern
    register_block_pattern(
        'twentytwentyfour/hidden-post-meta',
        array(
            'title'       => __('Hidden Post Meta', 'twentytwentyfour-child'),
            'description' => _x('Hidden post meta information', 'Block pattern description', 'twentytwentyfour-child'),
            'content'     => file_get_contents(get_stylesheet_directory() . '/patterns/hidden-post-meta.php'),
            'categories'  => array('twentytwentyfour'),
        )
    );
}

add_action('init', 'herrnaset_custom_pattern_replace');