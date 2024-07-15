<?php

// Render callback function for the combined block
function render_combined_meta_block($attributes) {
    $output = '';

    // Paragraph with the separator
    $output .= '<p class="has-contrast-2-color has-text-color">—</p>';

    // Paragraph with author prefix
    $output .= '<p class="has-small-font-size has-contrast-2-color has-text-color">';
    $output .= esc_html_x('by', 'Prefix for the post author block: By author name', 'twentytwentyfour');
    $output .= '</p>';

    // Post author name
    $author_link = get_author_posts_url(get_the_author_meta('ID'));
    $author_name = get_the_author();
    $output .= '<a href="' . esc_url($author_link) . '">' . esc_html($author_name) . '</a>';

    // Post terms (categories) with prefix
    $categories = get_the_category();
    if (!empty($categories)) {
        $output .= '<p>';
        $output .= esc_html_x('in ', 'Prefix for the post category block: in category name', 'twentytwentyfour');
        foreach ($categories as $category) {
            $category_link = get_category_link($category->term_id);
            $output .= '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>, ';
        }
        $output .= '</p>';
    }

    return $output;
}

// Register the combined meta block
function register_combined_meta_block() {
    register_block_type('herrnaset/combined-meta', array(
        'render_callback' => 'render_combined_meta_block',
    ));
}

add_action('init', 'register_combined_meta_block');
