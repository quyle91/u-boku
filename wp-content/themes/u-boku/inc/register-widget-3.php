<?php
 
/**
 * Adds Foo_Widget widget.
 */
class Ubk_Category extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'ubk_category', // Base ID
            'U-boku Category', // Name
            array( 'description' => __( 'Show News Category', 'text_domain' ), ) // Args
        );
    }
 
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );

        if(is_singular('post')){
            
        }else{            
            $title = get_sidebar_title($title);
        }

 
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        // widget content         
        $args = array(
            'post_type'   => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $instance['posts_per_page'],            
        );

        $category_select = $instance['category_select'];
        if(isset($category_select) and $category_select){
            //$args['category__in'] = [$category_select];
            $args['tax_query'] = [
                'relation'=> 'AND',
                [
                    'taxonomy'=>'category',
                    'field'=>'term_id',
                    'terms'=> [$category_select],
                    'include_children'=>true,
                    'operator'=> 'IN'
                ]
            ];
        }

        $args = apply_filters( 'ubk_category_query_args', $args );
        //echo "<pre>";print_r($args);echo "</pre>";
        $query = new WP_Query( $args );        
        if ( $query->have_posts() ) { 
            ?>
            <div class="newExp">
                <ul>
                <?php
                $index = 1; 
                while ( $query->have_posts() ) { 
                    $query->the_post();
                    echo get_template_part('templates/posts/posts','default',['index'=>$index]);                    
                    $index ++;
                }
                ?>
                </ul>
            </div>
            <?php
        }
        wp_reset_postdata();
        echo $after_widget;
    }
 
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'CATEGORY', 'text_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>">
                <?php _e( 'Title:' ); ?>
                </br>
                Leave empty for auto detect current category
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
     	</p>

     	<?php
     	if ( isset( $instance[ 'category_select' ] ) ) {
            $category_select = $instance[ 'category_select' ];
        }
        else {
            $category_select = __( 'New title', 'text_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'category_select' ); ?>"><?php _e( 'Category Select:' ); ?></label>
            <?php 
	            $terms = get_terms('category');
	            if(check_array($terms)){
	            	?>
	            	<select class="widefat" id="<?php echo $this->get_field_id( 'category_select' ); ?>" name="<?php echo $this->get_field_name( 'category_select' ); ?>">
	            		<option value="">No select</option>
	            	<?php
	            	foreach ($terms as $key => $value) {
	            		
	            		if(isset($instance['category_select']) and $instance['category_select'] ==  $value->term_id ){
	            			$selected = "selected";
	            		}else{
	            			$selected = "";
	            		}
	            		?>
	            		<option <?php echo $selected; ?> value="<?php echo $value->term_id; ?>"><?php echo $value->name; ?></option>
	            		<?php
	            	}
	            	?>
	            	</select>
	            	<?php
	            }
         	?>
     	</p>

        <?php if ( isset( $instance[ 'posts_per_page' ] ) ) {
            $posts_per_page = $instance[ 'posts_per_page' ];
        }
        else {
            $posts_per_page = 3;
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'posts_per_page' ); ?>"><?php _e( 'Posts per page:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="number" value="<?php echo esc_attr( $posts_per_page ); ?>" />
        </p>
    <?php
    }
 
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['posts_per_page'] = ( !empty( $new_instance['posts_per_page'] ) ) ? strip_tags( $new_instance['posts_per_page'] ) : '';
        $instance['category_select'] = ( !empty( $new_instance['category_select'] ) ) ? strip_tags( $new_instance['category_select'] ) : '';
        return $instance;
    }
 
} // class Foo_Widget
add_action( 'widgets_init', function () { 
    register_widget( 'Ubk_Category' ); 
});
     

?>