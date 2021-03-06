<?php 
add_action( 'init',function(){
	$args = array(
		'name'          => '新着記事の右メニュー',
		'id'            => 'ubk_sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div class="bar %d" id="%s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="barTitle">',
		'after_title'   => '</div>',
	);	
	register_sidebar( $args );	
	
	$args = array(
		'name'          => 'カテゴリーの一覧画面の右メニュー',
		'id'            => 'ubk_archive_sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div class="bar %d" id="%s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="barTitle">',
		'after_title'   => '</div>',
	);	
	register_sidebar( $args );	

	$args = array(
		'name'          => '記事詳細画面の右メニュー',
		'id'            => 'ubk_single_sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div class="bar %d" id="%s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="barTitle">',
		'after_title'   => '</div>',
	);	
	register_sidebar( $args );	

	$args = array(
		'name'          => 'タグの一覧画面の右メニュー',
		'id'            => 'ubk_tag_sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div class="bar %d" id="%s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="barTitle">',
		'after_title'   => '</div>',
	);	
	register_sidebar( $args );	

	$args = array(
		'name'          => 'U-bokuとは？の右メニュー',
		'id'            => 'ubk_page_sidebar',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div class="bar %d" id="%s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="barTitle">',
		'after_title'   => '</div>',
	);	
	register_sidebar( $args );	
});

add_filter('dynamic_sidebar_params', function( $params ) {
	// get widget vars
	$widget_name = $params[0]['widget_name'];	
	$widget_id = $params[0]['widget_id'];
	// add color style to before_widget
	$params[0]['before_title'] .= '<h2 class="tlt f-Oswald">';
	$subtitle = get_field('widget_subtitle', 'widget_' . $widget_id);	
	$span = "";

	if($widget_name == 'U-boku Category'){
		$params[0]['before_widget'] = '<div class="bar %d bar--sticky" id="%s">';
		if(!is_admin()){ 
			$subtitle = get_sidebar_subtitle($subtitle);
		}
	}	

	if($subtitle){
		$span = '<span class="span-label">'.strtoupper($subtitle).'</span>';
	}	
	$params[0]['after_title'] = '</h2>'.$span.$params[0]['after_title'];
	// return
	return $params;
});

function get_sidebar_title($title){
	if($title) return $title;
	if(is_home()){
        return  strtoupper(get_the_title(get_option('page_for_posts')));
    }
    $term_obj = get_queried_object();
    if(get_class($term_obj) == 'WP_Term'){
        if($term_obj->taxonomy == 'category'){
            return 'CATEGORY';
        }
        if($term_obj->taxonomy == 'post_tag'){
            return 'KEYWORD';
        }
    }
}
function get_sidebar_subtitle($subtitle){
	if($subtitle) return $subtitle;
	if(is_home()){
        //
    }
    $term_obj = get_queried_object();
    if(get_class($term_obj) == 'WP_Term'){
        if($term_obj->taxonomy == 'category'){
            return $term_obj->name;
        }
        if($term_obj->taxonomy == 'post_tag'){
            return $term_obj->name;
        }
    }
}
