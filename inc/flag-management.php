<?php

// Function to get an array of flag icons and category links based on the current post's categories
function herrnaset_get_country_flags() {
    global $countries_with_flags;
    
    $flags = [];
    
    // Get the current post's categories
    $categories = get_the_category();
    
    // If categories are found and it's not empty
    if ($categories && !empty($categories)) {
        foreach ($categories as $category) {
            $category_name = $category->name;
            
            // Check if the category name exists in the $countries_with_flags array
            if (array_key_exists($category_name, $countries_with_flags)) {
                // Get category archive URL
                $category_link = get_category_link($category);
                
                // Add the flag icon with link to the array
                $flags[] = [
                    'emoji' => $countries_with_flags[$category_name],
                    'link' => $category_link,
                ];
            }
        }
    }
    
    // Return array of flag icons with links
    return $flags;
}

// Render callback function for the dynamic block
function herrnaset_render_country_flag_block($attributes) {

    $flag_data = herrnaset_get_country_flags();

    if (!empty($flag_data)) {
        $output = '<div class="country-flags">';
        
        foreach ($flag_data as $flag) {
            $output .= '<a href="' . esc_url($flag['link']) . '" class="flag-link"><span class="fi ' . esc_attr($flag['emoji']) . '"></span></a> ';
        }
        
        $output .= '</div>';

        return $output;
    }

    return '';
}

// Register the dynamic block
add_action('init', 'herrnaset_register_country_flag_block');

function herrnaset_register_country_flag_block() {
    register_block_type('herrnaset/country-flag', array(
        'render_callback' => 'herrnaset_render_country_flag_block',
    ));
}