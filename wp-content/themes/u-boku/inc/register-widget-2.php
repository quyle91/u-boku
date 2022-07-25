<?php
 
/**
 * Adds Foo_Widget widget.
 */
class Ubk_New_Experience extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'ubk_new_experience', // Base ID
            'U-boku Experience', // Name
            array( 'description' => __( 'Show News Experience', 'text_domain' ), ) // Args
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
 
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        // widget content 

        $args = array(
            'post_type'   => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 3            
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

        $query = new WP_Query( $args );        
        if ( $query->have_posts() ) { 
            ?>
            <div class="newExp">
                <ul>
                <?php
                while ( $query->have_posts() ) { 
                    $query->the_post();
                    echo get_template_part('templates/posts/posts','default');
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
            $title = __( 'EXPERIENCE', 'text_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
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
        $instance['category_select'] = ( !empty( $new_instance['category_select'] ) ) ? strip_tags( $new_instance['category_select'] ) : '';
        return $instance;
    }
 
} // class Foo_Widget
add_action( 'widgets_init', function () { 
    register_widget( 'Ubk_New_Experience' ); 
});
     

?>