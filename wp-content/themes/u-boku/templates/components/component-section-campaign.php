<div class="sectionCamp" <?php echo ubk_get_sub_field('section_id_attribute')? 'id="'.ubk_get_sub_field('section_id_attribute').'"' : ""; ?>>
    <div class="wrap">
        <div class="campContent">
            <div class="title">
                <h2 class="title-tlt f-Oswald"><?php echo ubk_get_sub_field('section_title'); ?></h2>
                <p class="title-text"><?php echo ubk_get_sub_field('section_sub_title'); ?></p>
            </div>
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
        </div>
    </div>
    </div><!--/.sectionCamp-->