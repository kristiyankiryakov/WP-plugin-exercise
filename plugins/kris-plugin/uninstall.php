<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @package KrisPlugin
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}


// $books = get_posts(array('post_type' => 'book', 'numberposts' => -1));

// foreach ($books as $book) {
    //     wp_delete_post($book->ID, true);
    // }
    
global $wpdb;

$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book' " );
$wpdb->query("DELETE FROM  wp_postmeta WHERE post_id NOT IN (SELECT id from  wp_posts) ");