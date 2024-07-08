<?php

function herrnaset_change_default_post_menu_icon() {
    global $menu;
    foreach ( $menu as $key => $value ) {
        if ( 'edit.php' == $value[2] ) {
            $menu[$key][6] = 'dashicons-airplane';
        }
    }
}
add_action( 'admin_menu', 'herrnaset_change_default_post_menu_icon' );
