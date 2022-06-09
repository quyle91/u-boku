<?php 
add_action( 'init',function(){
	$args = array(
		'name'          => __( 'Sidebar', 'text-domain' ),
		'id'            => 'ubk_sidebar',
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
	if($subtitle){
		$span = '<span class="span-label">'.$subtitle.'</span>';
	}	
	$params[0]['after_title'] = '</h2>'.$span.$params[0]['after_title'];
	// return
	return $params;
});

