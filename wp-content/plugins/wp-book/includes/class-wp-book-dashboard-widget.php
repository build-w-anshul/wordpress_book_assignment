<?php
class Wp_Book_Dashboard_Widget {
    public function __construct() {
        add_action('wp_dashboard_setup', [$this, 'add_widget']);
    }

    public function add_widget() {
        wp_add_dashboard_widget(
            'wp_book_top_categories',
            'Top Book Categories',
            [$this, 'render_widget']
        );
    }

    public function render_widget() {
        $terms = get_terms([
            'taxonomy' => 'book_category',
            'orderby' => 'count',
            'order' => 'DESC',
            'number' => 5,
            'hide_empty' => false,
        ]);

        if (empty($terms) || is_wp_error($terms)) {
            echo '<p>No book categories found.</p>';
            return;
        }

        echo '<ul>';
        foreach ($terms as $term) {
            echo '<li>' . $term->name . ' (' . $term->count . ')</li>';
        }
        echo '</ul>';
    }
}
?>