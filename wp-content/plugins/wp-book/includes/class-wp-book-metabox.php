<?php
class Wp_Book_Custom_Metabox{
    public function __construct(){
        //Author Name, Price, Publisher, Year, Edition, URL, etc.
        add_action("add_meta_boxes", [$this, "register_book_metabox"]);
        add_action("save_post", [$this, "save_post_metabox_plugin"]);
    }

    public function register_book_metabox(){
        add_meta_box("wp_book_id", "Book metabox", [$this, "create_book_metabox"], "book");
    }
    public function create_book_metabox($post){
        $fields = ["author", "name", "price", "publisher", "year", "edition", "url"];
        $post_id = isset($post->ID) ? $post->ID : '';
        foreach($fields as $field){
            $value = get_post_meta($post_id, "wp_book_$field", true);
            ?>
             <p>
                <label for="wp_book_<?php echo $field; ?>"><strong><?php echo ucfirst(str_replace('_', ' ', $field)); ?></strong></label><br/>
                <input type="text" id="wpbook_<?php echo $field; ?>" name="wpbook_<?php echo $field; ?>" value="<?php echo esc_attr($value); ?>" class="widefat" />
            </p>
            <?php
        }
    }
    public function save_post_metabox_plugin($post_id){
        //check and verify Auto save of wordpress
        if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE){ //--> we do not want to save dataon auto save so return
            return ;
        }
        $fields = ["author", "name", "price", "publisher", "year", "edition", "url"];

        foreach($fields as $field){
            if(isset($_POST["wp_book_{$field}"])){
            update_post_meta($post_id, "wp_book_{$field}", sanitize_text_field($_POST["wp_book_{$field}"]));
        }
      
    }
   
}};
?>