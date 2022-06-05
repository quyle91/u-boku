<div class="sectionNews">
    <div class="wrap">
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
                        ?>
                        <li>
                            <div class="news">
                                <div class="lstNew-thumb thumbScale">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo get_the_post_thumbnail( get_the_id(), 'bbk_thumbnail' ); ?>
                                    </a>
                                </div>
                                <div class="lstNew-info">
                                    <h3 class="lstNew-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="lstNew-label">
                                        <span class="lstNew-date f-Oswald">
                                            <?php echo get_the_date(); ?>                                                
                                        </span>
                                        <span class="lstNew-span">
                                            <?php 
                                                echo get_the_author_meta('display_name');
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }
                wp_reset_postdata();                
                ?>
            </ul>
        </div>
        <?php echo ubk_get_btn_view_more(get_permalink(get_option('page_for_posts'))); ?>
    </div>
    </div><!--/.sectionNews-->