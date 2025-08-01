<?php
class Wp_Book_Block {
    public function __construct() {
        add_action('init', [$this, 'register_block']);
    }

    public function register_block() {
        register_block_type(__DIR__ . '/../block', [
            'render_callback' => [$this, 'render_block']
        ]);
    }

    public function render_block($attributes) {
        $id = isset($attributes['bookId']) ? (int) $attributes['bookId'] : 0;
        if (!$id) return '<p>No Book ID Provided.</p>';

        $title = get_the_title($id);
        $author = get_post_meta($id, 'wp_book_author', true);
        $year = get_post_meta($id, 'wp_book_year', true);

        return "<div class='wp-book-block'>
            <strong>Title:</strong> $title<br>
            <strong>Author:</strong> $author<br>
            <strong>Year:</strong> $year
        </div>";
    }
}
