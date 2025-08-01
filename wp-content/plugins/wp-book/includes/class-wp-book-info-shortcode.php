<?php
class WPBook_Shortcode {
    public function __construct() {
        add_shortcode('book', [$this, 'render_shortcode']);
    }

    public function render_shortcode($atts) {
        ob_start();

        $currency = get_option('wpbook_currency', '$');

        $args = [
            'post_type' => 'book',
            'posts_per_page' => get_option('wpbook_books_per_page', 10),
            'post_status' => 'publish'
        ];

        $books = new WP_Query($args);

        if ($books->have_posts()) {
            echo '<div class="wpbook-list" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:20px;">';

            while ($books->have_posts()) {
                $books->the_post();

                $post_id = get_the_ID();
                $author= get_post_meta($post_id, 'wp_book_author', true);
                $name = get_post_meta($post_id, 'wp_book_name', true);
                $price = get_post_meta($post_id, 'wp_book_price', true);
                $publisher = get_post_meta($post_id, 'wp_book_publisher', true);
                $url = get_post_meta($post_id, 'wp_book_url', true);

                echo '<div class="wpbook-card" style="border:1px solid #ddd;padding:15px;border-radius:8px;">';
                echo '<h3>' . esc_html(get_the_title()) . '</h3>';
                echo '<p><strong>Author:</strong> ' . esc_html($author) . '</p>';
                echo '<p><strong>Name:</strong> ' . esc_html($name) . '</p>';
                echo '<p><strong>Price:</strong> ' . esc_html($currency . ' ' . $price) . '</p>';
                echo '<p><strong>Publisher:</strong> ' . esc_html($publisher) . '</p>';
                if (!empty($url)) {
                    echo '<p><a href="' . esc_url($url) . '" target="_blank">Buy/Read</a></p>';
                }
                echo '</div>';
            }

            echo '</div>';
            wp_reset_postdata();
        } else {
            echo '<p>No books found.</p>';
        }

        return ob_get_clean();
    }
}

?>