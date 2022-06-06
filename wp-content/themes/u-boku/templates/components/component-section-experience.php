<div class="sectionExp">
    <div class="wrap">
        <div class="exp">
            <div class="expTitle text-center"><?php echo wp_get_attachment_image( ubk_get_sub_field('section_title_image'), 'full' ); ?></div>
            <div class="lstNew">
                <ul>
                    <?php 
                    $args = array(
                        'post_type'   => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 3             
                    );

                    $cat = ubk_get_sub_field('category_select');                    
                    if($cat){
                        $args['category__in'] = [$cat->term_id];
                    }


                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) { 
                        while ( $query->have_posts() ) { 
                            $query->the_post();
                            echo get_template_part('templates/posts/posts','default');
                        }
                    }
                    wp_reset_postdata();                
                    ?>
                </ul>
            </div>
            <?php echo ubk_get_btn_view_more($cat); ?>
        </div>
    </div>
    </div><!--/.sectionExp-->