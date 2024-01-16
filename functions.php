<?php

// Enqueue parent theme styles
function clements_enqueue_parent_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'clements_enqueue_parent_styles');
