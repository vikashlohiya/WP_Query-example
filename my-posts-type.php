<?php
/*
 * Plugin Name:       Custom Post Type
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Plugin Tutorial
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Vikash

 */
new CustomPostType();
class CustomPostType {

    public function __construct() {
       add_action('init', array($this,'create_book_post_type'));

    }
    public function create_book_post_type() {
    register_post_type('book',
        array(
            'labels' => array(    // it takes array
                'name' => __('Books'),
                'singular_name' => __('Book')
            ),
            'public' => true,           
            'has_archive' => true,
            'taxonomies'            => array( 'category','post_tag'),
            'show_ui'               => true,
            'menu_position'         => 2,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        )
    );
}
    
    
}
    
