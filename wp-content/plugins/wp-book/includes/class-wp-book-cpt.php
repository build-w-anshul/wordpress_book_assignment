<?php
class Wp_custom_post_type{
    public function __construct(){
        add_action("init", [$this, 'register_custom_post_type']);
    }
    public function register_custom_post_type(){
        $post = [
            'label'=>__('Books', 'wp-book'),
            'public' =>true,
            'supports' => ['title', 'editor', 'author', 'thumbnail', 'excerpt'],
            'menu_icon' => 'dashicons-book',
            'show_in_rest'=>true,
        ];
        register_post_type('book', $post);
    }
}
?>