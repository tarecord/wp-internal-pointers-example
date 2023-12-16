<?php declare(strict_types=1);
/**
 * Plugin Name: WP Internal Pointers
 * Description: A plugin to research the new feature introduction system used by WP Core.
 * Author: Tanner Record
 * Author URI: https://www.tannerrecord.com
 */

add_action( 'admin_enqueue_scripts', 'tar_enqueue_pointer', 10, 0 );


function tar_enqueue_pointer() {
    $dismissed = array_filter( explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) ) );

    // Your pointers that should not be shown.
    if ( in_array( 'tar-pointer-1', $dismissed ) ) {
        // Don't show the pointer.
        return;
    }

    wp_enqueue_script( 'tar-pointer',  plugins_url( 'wp-internal-pointers' ) . '/js/pointer.js', ['jquery', 'wp-pointer'] );
    wp_enqueue_style( 'tar-pointer', plugins_url( 'wp-internal-pointers' ) . '/css/pointer.css', ['jquery', 'wp-pointer'] );
}
