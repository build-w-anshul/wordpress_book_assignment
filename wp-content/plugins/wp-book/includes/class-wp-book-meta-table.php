<?php
class Wp_book_Meta_Table {
    public function __construct() {
        register_activation_hook(__FILE__, [$this, 'create_table']);
        add_action('save_post_book', [$this, 'store_meta']);
    }

    public function create_table() {
        global $wpdb;
        $table = $wpdb->prefix . 'book_meta';// wp_
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table (
            book_id BIGINT NOT NULL PRIMARY KEY,
            author VARCHAR(255),
            name VARCHAR(255),
            price VARCHAR(100),
            publisher VARCHAR(255),
            year VARCHAR(20),
            edition VARCHAR(50),
            url TEXT
        ) $charset_collate;";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

    public function store_meta($post_id) {
        global $wpdb;
        $table = $wpdb->prefix . 'book_meta';
        $data = [
            'book_id' => $post_id,
            'author' => sanitize_text_field($_POST['wp_book_author'] ?? ''),
            'name' => sanitize_text_field($_POST['wp_book_aname'] ?? ''),
            'price' => sanitize_text_field($_POST['wp_book_price'] ?? ''),
            'publisher' => sanitize_text_field($_POST['wp_book_publisher'] ?? ''),
            'year' => sanitize_text_field($_POST['wp_book_year'] ?? ''),
            'edition' => sanitize_text_field($_POST['wp_book_edition'] ?? ''),
            'url' => esc_url_raw($_POST['wp_book_url'] ?? '')
        ];
        $wpdb->replace($table, $data);
    }
}

?>