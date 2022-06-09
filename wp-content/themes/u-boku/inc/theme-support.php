<?php
// Add theme options.
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title'  => 'Theme General Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
}

// Theme support
if (function_exists('add_theme_support')) {
    // Woocommerce support theme.
//       add_theme_support( 'woocommerce' );

    // Add Menu Support
    add_theme_support('menus');

    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support('widgets');

   //add_theme_support('search-form');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    // add_image_size('large', 700, '', true); // Large Thumbnail
    // add_image_size('medium', 250, '', true); // Medium Thumbnail
    // add_image_size('small', 120, '', true); // Small Thumbnail
    //add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

    //add_post_type_support( 'project', 'post-formats' );

}
// remove support
add_action('init',function(){
  remove_post_type_support( 'post', 'excerpt' );
  remove_theme_support( 'widgets-block-editor' );
});

// Allow SVG through WordPress Media Uploader
function ubk_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'ubk_mime_types');

// Remove 'text/css' from our enqueued stylesheet
function ubk_style_remove($tag) {
  return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function ubk_add_slug_to_body_class($classes) {
  global $post;
  if (is_home()) {
      $key = array_search('blog', $classes);
      if ($key > -1) {
          unset($classes[$key]);
      }
  } elseif (is_page()) {
      $classes[] = sanitize_html_class($post->post_name);
  } elseif (is_singular()) {
      $classes[] = sanitize_html_class($post->post_name);
  }

  return $classes;
}

// add pagination
if ( ! function_exists( 'ubk_posts_navigation' ) ) {

  function ubk_posts_navigation() {
	  echo '<div class="pagination f-Oswald">';
    global $wp_query;
    $big = 999999999;

    the_posts_pagination(array(
      'base' => str_replace($big, '%#%', get_pagenum_link($big)),
      'format' => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'total' => $wp_query->max_num_pages,
      'type'=> 'list',
    ));
    echo '</div>';
  }
}


// Filters
add_filter('style_loader_tag', 'ubk_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('body_class', 'ubk_add_slug_to_body_class'); // Add slug to body class (Starkers build)

// register size thumb 

add_action( 'after_setup_theme', function(){
  add_image_size( 'ubk_thumbnail', 366, 207, true );
  add_image_size( 'ubk_thumbnail_slide', 900, 508, true );
});
