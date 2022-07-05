<?php
/**
 * @package AlexDenPlugin
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die();
}

// Clear Database stored data

// 1 method to remove all
$books = get_posts([
   'post_type' => 'book',
    'numberposts' => -1
]);

foreach ($books as $book) {
    wp_delete_post($book->ID, true);
}

// 2 method to remove all
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type='book'" );
@$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN ( SELECT id from wp_posts )");
@$wpdb->query( "DELETE FROM wp_term_relationship WHERE object_id NOT IN ( SELECT id from wp_posts )");