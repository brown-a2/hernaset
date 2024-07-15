<?php

// Function to get the ACF field value for the current post
function get_acf_field_value() {
    $acf_field_value = get_field('travel_date_start');
    return $acf_field_value ? $acf_field_value : '';
}

// Render callback function for displaying the ACF field value
function render_acf_field_block($attributes) {
    $acf_field_value = get_acf_field_value();

    if (!empty($acf_field_value)) {
        return '<div class="acf-field-value wp-block-post-date"><time>' . esc_html($acf_field_value) . '</time></div>';
    }

    return '';
}

// Register the custom block type
// <!-- wp:herrnaset/acf-field-travel-date-start /-->
function register_custom_acf_field_block() {
    register_block_type('herrnaset/acf-field-travel-date-start', [
        'render_callback' => 'render_acf_field_block',
    ]);
}

add_action('init', 'register_custom_acf_field_block');
