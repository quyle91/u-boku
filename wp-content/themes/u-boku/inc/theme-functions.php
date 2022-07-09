<?php

/**
 * hook intermediate_image_sizes_advanced
 */
function ubk_image_sizes($sizes) {
    unset($sizes['medium_large']);
    return $sizes;
}

/**
 * hook max_srcset_image_width
 */
function ubk_disable_wp_responsive_images(): int
{
    return 1;
}

/**
 * hook wp_get_attachment_image_attributes
 */
function ubk_add_data_src_attribute($attr, $attachment, $size) {
    if (
        strpos($attr['class'], 'lazy-image') !== false ||
        strpos($attr['class'], 'swiper-lazy') !== false
    ) {
        $image = wp_get_attachment_image_src($attachment->ID, $size);

        if ($image) {
            $attr['data-src'] = $attr['src'];
            $attr['src'] = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ' . $image[1] . ' ' . $image[2] . '"%3E%3C/svg%3E';
        }
    }

    return $attr;
}

/**
 * Filters the updated attachment meta data.
 *
 * @hook wp_update_attachment_metadata
 *
 * @param array $data          Array of updated attachment meta data.
 * @param int $attachment_id Attachment post ID.
 */
function ubk_update_alt_image_wppi_empty(array $data, int $attachment_id): array
{
    try {
        $attachment = get_post($attachment_id);
        $mime_type = get_post_mime_type($attachment);

        if (preg_match('!^image/!', $mime_type)) {
            if (empty(get_post_meta($attachment_id, '_wp_attachment_image_alt', true))) {
                $alt = pathinfo($attachment->post_title, PATHINFO_FILENAME);
                $alt = str_replace('-', '_', $alt);
                update_post_meta($attachment_id, '_wp_attachment_image_alt', $alt);
            }
        }
    } catch (\Throwable $th) {
    }

    return $data;
}

/**
 * @hook wp_enqueue_scripts
 */
function ubk_remove_wp_block_library_css() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style');
    wp_dequeue_style('wc-blocks-style');
}

/**
 * @hook wp_footer
 */
function ubk_dequeue_wp_embed() {
    wp_deregister_script('wp-embed');
}

/**
 * @param $buffer
 * @return mixed
 */
function ubk_buffer_process($buffer) {
    return ubk_rebuild_buffer($buffer);
}

/**
 * @param $buffer
 * @return array|mixed|string|string[]
 */
function ubk_rebuild_buffer($buffer) {
    // build array for replace html
    $script_body = [];
    $script_head = [];

    // check style and js
    $pattern = <<<END
#class\s*=\s*["']([^"']+)#i
END;
    preg_match_all(
        $pattern,
        $buffer,
        $matches
    );

    if (empty($matches)) return $buffer;

    $matches = $matches[1];
    $matches = implode(' ', $matches);

    ubk_divide_scripts($matches, $script_body, $script_head);

    return str_replace(
        array(
            '<head>',
            '</body>',
        ),
        array(
            implode('', $script_head) . '<head>',
            implode('', $script_body) . '</body>',
        ),
        $buffer
    );
}

/**
 * divide scripts for style and script
 */
function ubk_divide_scripts($matches, &$script_body, &$script_head) {
    $matches = explode(' ', $matches);
    $matches = array_unique($matches);
    $matches = array_flip($matches);
    
    /*if (isset($matches['icon'])) {
        $script_head[] = '<link rel="stylesheet" type="text/css" media="all" href="' . get_template_directory_uri() . '/assets/css/base/icons.css">';
    }

    if (isset($matches['table'])) {
        $script_head[] = '<link rel="stylesheet" type="text/css" media="all" href="' . get_template_directory_uri() . '/assets/css/base/table.css">';
    }*/

    if (isset($matches['userSocials'])) {
        $script_head[] = '<link rel="stylesheet" type="text/css" media="all" href="' . get_template_directory_uri() . '/assets/css/fix-userSocials.css">';
    }

    $list_components = [
        /*'gallery' => [
            'css' => [
                get_template_directory_uri() . '/assets/css/vendors/slick-theme.css',
                get_template_directory_uri() . '/assets/css/vendors/slick.css',
                get_template_directory_uri() . '/assets/css/vendors/magnific-popup.css',
                get_template_directory_uri() . '/assets/css/base/lightbox.css',
                get_template_directory_uri() . '/assets/css/components/block-gallery.css',
            ],
            'js' => [
                get_template_directory_uri() . '/assets/js/functions/slick.min.js',
                get_template_directory_uri() . '/assets/js/functions/jquery.magnific-popup.min.js',
                get_template_directory_uri() . '/assets/js/components/block-gallery.js',
            ]
        ]*/

    ];
    foreach ($list_components as $key => $value) {
        if (isset($matches[$key])) {
            // css to head
            if (isset($value['css'])) {
                $value['css'] = (array) $value['css'];
                if (!empty($value['css']) and is_array($value['css'])) {
                    foreach ($value['css'] as $path) {
                        $fullpath = '<link rel="stylesheet" type="text/css" media="all" href="' . $path . '">';
                        if (!in_array($fullpath, $script_head)) {
                            $script_head[] = $fullpath;
                        }
                    }
                }
            }
            // js to body
            if (isset($value['js'])) {
                $value['js'] = (array) $value['js'];
                if (!empty($value['js']) and is_array($value['js'])) {
                    foreach ($value['js'] as $path) {
                        $fullpath = '<script defer type="text/javascript" src="' . $path . '"></script>';
                        if (!in_array($fullpath, $script_body)) {
                            $script_body[] = $fullpath;
                        }
                    }
                }
            }
        }
    }
}

/**
 * For compatibility with those plugins have 'Bad' logic that forced all buffer output even it is NOT their buffer :(
 *
 * Usually this is called after send_headers() if following original WP process
 *
 * @since 1.1.5
 * @access public
 * @param  string $buffer
 * @return string
 */
function ubk_send_headers_force($buffer) {
    $is_html = ubk_check_html($buffer);

    if (!$is_html) return $buffer;
    if (defined('custom_DID_OPT')) return $buffer;

    define('custom_DID_OPT', TRUE);

    return ubk_buffer_process($buffer);
}

/**
 * @param $buffer
 * @return bool
 */
function ubk_check_html($buffer) {
    // double check to make sure it is a html file
    if (strlen($buffer) > 300) {
        $buffer = substr($buffer, 0, 300);
    }
    if (strstr($buffer, '<!--') !== false) {
        $buffer = preg_replace('/<!--.*?-->/s', '', $buffer);
    }
    $buffer = trim($buffer);

    return stripos($buffer, '<html') === 0 || stripos($buffer, '<!DOCTYPE') === 0;
}


// get field acf for default
function ubk_get_field($key, $option = 'option'){
    if (!function_exists('get_field')) return "Advanced custom field is not actived";
    return get_field($key, $option);
    return;
}
function ubk_get_sub_field($key){
    if (!function_exists('get_sub_field')) return "Advanced custom field is not actived";
    return get_sub_field($key);
    return;
}
// get menu option by id
function ubk_get_option_menu($key, $option = 'option'){
    if (!function_exists('get_field')) return "Advanced custom field is not actived";
    ob_start();
    if (have_rows($key, $option)) {
    ?>
        <ul id="" class="menu">
            <?php
            while (have_rows($key, $option)) :
                the_row();
                $link = (array)get_sub_field('link');
            ?>
                <li class="menu-item">
                    <a target="<?php echo isset($link['target']) ? $link['target'] : ""; ?>" href="<?php echo isset($link['url']) ? $link['url'] : ""; ?>">
                        <?php echo isset($link['title']) ? html_entity_decode($link['title']) : ""; ?>
                    </a>
                </li>
            <?php
            endwhile;
            ?>
        </ul>
    <?php
    }
    return ob_get_clean();
}

// get current year
function ubk_current_year(){
    return date("Y");
}
add_shortcode( 'ubk_current_year', 'ubk_current_year' );

function check_array($array){
    return (!empty($array) and is_array($array));
}

function ubk_get_link($array = array()){
    if(!check_array($array)) return "";
    return '<a target="'.$array['target'].'" href="'.$array['url'].'">'.$array['title'].'</a> ';
}

if(is_user_logged_in()){
    add_action('wp_footer',function(){
        ?>
        <style type="text/css">
            .header{
                margin-top: var(--wp-admin--admin-bar--height);
            }
        </style>
        <?php
    });
}
function ubk_get_tag_list($ulclass="tagLst"){
    ob_start();    
    ?>
    <ul class="<?php echo $ulclass; ?>">
    <?php 
        /*$tags = get_tags(array(
            'hide_empty' => false
        ));
        echo "<pre>";print_r($tags);echo "</pre>";*/
        //echo "<pre>";print_r(ubk_get_field('keyword','options'));echo "</pre>";
        $tags = ubk_get_field('keyword','options');
        if(check_array($tags)){
            foreach ($tags as $tag) {       
                if(isset($tag['items'])){
                    $tag = $tag['items'];
                    echo '<li><a href="'.get_tag_link($tag).'">' . $tag->name . '</a></li>';
                }                
            }
        }        
    ?>
    </ul>
    <?php
    return ob_get_clean();
}

function ubk_get_socials($acfkey = 'navigation_fixed_socials',$key1 = 'icon_svg', $key2 = 'icon_link',$is_li = true){
    ob_start();
    $socials = ubk_get_field($acfkey);    
    if(check_array($socials)){
        foreach ($socials as $key => $value) {
            if(isset($value[$key1]) and $value[$key1]){
                if($is_li) { 
                    echo '<li>';
                }
                echo '<a href="'.$value[$key2].'">
                        <img width="22px" height="auto" src="'.$value[$key1].'" alt="Follow Social">
                    </a>';
                if($is_li) { 
                    echo '</li>';
                }
            }
        }
    }
    return ob_get_clean();
}
function ubk_get_btn_next_prev(){
    ob_start();
    ?>
    <div class="btnControl">
        <button class="btn-control btn-prev"><img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/btn-prev01.svg" alt=""></button>
        <button class="btn-control btn-next"><img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/btn-next01.svg" alt=""></button>
    </div>
    <?php
    return ob_get_clean();
}
function ubk_get_related_posts( $post_id, $related_count, $args = array() ) {

    $args = wp_parse_args( (array) $args, array(
        'orderby' => 'rand',
        'return'  => 'query', // Valid values are: 'query' (WP_Query object), 'array' (the arguments array)
    ) );

    if(is_single()){
        $related_args = array(
            'post_type'      => get_post_type( $post_id ),
            'posts_per_page' => $related_count,
            'post_status'    => 'publish',
            'post__not_in'   => array( $post_id ),
            'orderby'        => $args['orderby'],
            'tax_query'      => array()
        );

        $post       = get_post( $post_id );
        $taxonomies = get_object_taxonomies( $post, 'names' );  

        foreach ( $taxonomies as $taxonomy ) {
            $terms = get_the_terms( $post_id, $taxonomy );            
            if ( empty( $terms ) ) {
                continue;
            }
            $term_list                   = wp_list_pluck( $terms, 'slug' );
            $related_args['tax_query'][] = array(
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $term_list
            );
        }

        if ( count( $related_args['tax_query'] ) > 1 ) {
            $related_args['tax_query']['relation'] = 'OR';
        }
    }else{
        // Get all news if is in category
        $related_args = array(
            'post_type'      => 'post',
            'posts_per_page' => $related_count,
            'post_status'    => 'publish',
            'orderby'        => $args['orderby'],
            'tax_query'      => array()
        );        
    }
    
    if ( $args['return'] == 'query' ) {
        return new WP_Query( $related_args );
    } else {
        return $related_args;
    }
}
function ubk_get_btn_view_more($cat = false, $moretext = 'もっと見る', $morehover = '新着記事一覧'){     
    if($cat){
        $link = get_category_link( $cat );
    }else{
        $link = get_permalink(get_option('page_for_posts'));
    }
    ob_start();
    ?>
    <div class="btnMore btnMore--mw250">
        <a class="more" href="<?php echo $link; ?>">
            <span class="moreText"><?php echo $moretext; ?></span>
            <span class="moreHover"><?php echo $morehover ?></span>
            <span class="moreItem">
                <img class="svg" src="<?php echo get_template_directory_uri()."/assets/"; ?>images/common/icon-arrow-white.svg" alt="">
            </span>
        </a>
    </div>
    <?php
    return ob_get_clean();
}
function ubk_get_btn_view_more_single($post_id){
    $terms = get_the_terms( $post_id, 'category' );
    $cat = false;
    if(isset($terms[0])){
        $cat = $terms[0];        
    }

    return ubk_get_btn_view_more($cat);
}
function ubk_get_blog_title(){
    $tag = "2";
    if ( (is_front_page() && is_home()) || (is_page()) ) {
        $title = get_the_title();
        $tag = "1";

    } elseif ( is_front_page() ) {
        $title = 'static homepage';

    } elseif ( is_home() ) {
        $blog_id = get_option('page_for_posts');
        $page_for_posts_obj = get_post($blog_id);
        $title = $page_for_posts_obj->post_title;

    } elseif ( is_category() ){
        $title = single_cat_title( '', false );

        $term = get_queried_object();        
        $category_banner = get_field('category_banner', $term);
        $category_banner_mobile = get_field('category_banner_copy', $term);
        if($category_banner){
            ?>
            <div class="thumbBanner">
                <?php echo wp_get_attachment_image( $category_banner, 'full', false, ['class'=>'d-none d-md-block'] ); ?>
                <?php echo wp_get_attachment_image( $category_banner_mobile, 'full', false, ['class'=>'d-block d-md-none'] ); ?>
                <div class="thumbCmt">
                    <span class="thumbCmt-label"><?php echo $term->name; ?></span>
                    <div class="thumbCmt-info">
                        <p>
                            <?php echo $term->description; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
            return;
        }

    } elseif ( is_tag() ){
        $title = single_tag_title( '', false );        

    } elseif ( is_search() ){
        $title = get_search_query();

    } elseif ( is_author() ){
        $title = get_the_author();

    } elseif ( is_day() ){
        $title = get_the_date();

    } elseif ( is_month() ){
        $title = get_the_date( 'F Y' );

    } elseif ( is_year() ){
        $title = get_the_date( 'Y' );

    } else {
        $title = 'verything else';
    }
    ?>
    <div class="title">
        <h<?php echo $tag ;?> class="title-tlt f-Oswald"><?php echo $title; ?></h<?php echo $tag ;?>>
        <p class="title-text"><?php echo get_bloginfo( 'description' ); ?></p>
    </div>
    <?php
}
