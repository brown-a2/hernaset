<?php

// Enqueue parent theme styles
function herrnaset_enqueue_parent_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'herrnaset_enqueue_parent_styles');


/**
 * Dashboard/backend modifications
 */
require get_stylesheet_directory() . '/inc/dashboard.php';
//require get_stylesheet_directory() . '/inc/remove-default-post-type.php';
