<?php
class Wp_Book_Category_Taxonomy_Hierarchal{
    public function __construct(){
        add_action('init', [$this, 'register_taxonomies']);
    }
    public function register_taxonomies(){
        register_taxonomy('book_category', 'book', [
            'label' => __('Book Category', 'wp-book'),
            'hierarchal' =>true,
            'show_in_rest' => true
        ]);
        register_taxonomy('book_tag', 'book', [
            'label' => __('Book Tag', 'wp-book'),
            'hierarchical' => false,
            'show_in_rest' => true
        ]);
    }
}
?>