<?php 
add_action( 'init',function(){
	$args = array(
		'name'          => __( 'Blog Sidebar', 'text-domain' ),
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
		'name'          => __( 'Single Sidebar', 'text-domain' ),
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
		'name'          => __( 'Tag Sidebar', 'text-domain' ),
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
		'name'          => __( 'Page Sidebar', 'text-domain' ),
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
		$term_obj = get_queried_object();     
		if($term_obj->taxonomy  == 'category'){
			if(!is_admin()){
	            if(get_class($term_obj) == 'WP_Term'){
	            	$subtitle = $term_obj->name;
	            }
	    	}
		}
	}	

	if($subtitle){
		$span = '<span class="span-label">'.strtoupper($subtitle).'</span>';
	}	
	$params[0]['after_title'] = '</h2>'.$span.$params[0]['after_title'];
	// return
	return $params;
});

