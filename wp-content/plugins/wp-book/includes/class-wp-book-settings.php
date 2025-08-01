<?php
class Wp_Book_Settings {
    public function __construct() {
        add_action('admin_menu', [$this, 'add_menu']);
        add_action('admin_init', [$this, 'register_settings']);
    }

    public function add_menu() {
        add_submenu_page(
            'edit.php?post_type=book',
            'Book Settings',
            'Settings',
            'manage_options',
            'wp_book-settings',
            [$this, 'settings_page']
        );

    }

    public function register_settings() {
        register_setting('wp_book_settings', 'wp_book_currency');
        register_setting('wp_book_settings', 'wp_book_books_per_page');
    }

    public function settings_page() {
    $currency = esc_attr(get_option('wp_book_currency', '$'));
    $books_per_page = esc_attr(get_option('wp_book_books_per_page', 10));
    ?>
    <div class="wrap">
        <h1>Book Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields('wp_book_settings'); ?>
            <label>Currency:</label>
            <input type="text" name="wp_book_currency" value="<?php echo $currency; ?>"><br><br>

            <label>Books per Page:</label>
            <input type="number" name="wp_book_books_per_page" value="<?php echo $books_per_page; ?>"><br><br>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

}


?>