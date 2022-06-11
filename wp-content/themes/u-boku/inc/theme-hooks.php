<?php
add_action('wp_enqueue_scripts', function () {

    wp_enqueue_style( 'bootstrap', get_template_directory_uri()."/assets/css/bootstrap.min.css");
    wp_enqueue_style( 'slick', get_template_directory_uri()."/assets/css/slick.css");
    wp_enqueue_style( 'style', get_template_directory_uri()."/assets/css/styles.css");
    wp_enqueue_style( 'style-fix', get_template_directory_uri()."/assets/css/fix.css");

    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri()."/assets/js/jquery-1.9.1.min.js", false);
    wp_enqueue_script('jquery');

    wp_enqueue_script('ubk-popper', get_template_directory_uri()."/assets/js/popper.min.js", ['jquery'], null, false);
    wp_enqueue_script('ubk-bootstrap', get_template_directory_uri()."/assets/js/bootstrap.min.js", ['jquery'], null, false);
    wp_enqueue_script('ubk-slick', get_template_directory_uri()."/assets/js/slick.js", ['jquery'], null, false);
    wp_enqueue_script('ubk-svg', get_template_directory_uri()."/assets/js/svg.js", ['jquery'], null, false);
    wp_enqueue_script('ubk-common', get_template_directory_uri()."/assets/js/common.js", ['jquery'], null, false);

});



remove_action('wp_head', 'print_emoji_detection_script', 7);
add_action('get_header', function () {
    ob_start('ubk_send_headers_force');
}, 1000);
remove_action('wp_print_styles', 'print_emoji_styles');



add_filter('wp_update_attachment_metadata', 'ubk_update_alt_image_wppi_empty', 10, 2);
add_filter('wp_lazy_loading_enabled', function () {
    return false;
});
add_filter('max_srcset_image_width', 'ubk_disable_wp_responsive_images');
add_filter('wp_get_attachment_image_attributes', 'ubk_add_data_src_attribute', 10, 3);



remove_action('wp_enqueue_scripts', [WC_Frontend_Scripts::class, 'load_scripts']);
remove_action('wp_print_scripts', [WC_Frontend_Scripts::class, 'localize_printed_scripts'], 5);
remove_action('wp_print_footer_scripts', [WC_Frontend_Scripts::class, 'localize_printed_scripts'], 5);
//add_action( 'wp_enqueue_scripts', 'ubk_remove_wp_block_library_css', 100 );
add_action('wp_footer', 'ubk_dequeue_wp_embed');

add_filter('wpcf7_form_tag', 'ubk_getRefererPage');
add_shortcode('ubk_current_year', 'ubk_current_year');
add_filter('wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2);
add_action('init', 'ubk_register_menu');
add_filter('the_content',function($content){
    return str_replace("<p", "<p class='mt-4'", $content);
});

// post hit
add_action('wp_footer',function(){
    if(is_singular('post')){
        $hit = (int)get_post_meta(get_the_ID(),'hit',true);
        if($hit){
            $hit += 1;        
            update_post_meta( get_the_ID(), 'hit', $hit );
        }else{
            update_post_meta( get_the_ID(), 'hit', 0 );
        }     
    }
});
add_filter('ubk_category_query_args',function($args){
    $args['meta_key'] = 'hit';
    $args['orderby'] = 'meta_value_num';
    $args['meta_type']  = 'NUMERIC';
    return $args;
});