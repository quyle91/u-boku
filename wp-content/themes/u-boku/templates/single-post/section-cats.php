<div class="sectionCate sectionCate--change">
    <div class="wrap">
        <div class="title">
            <h2 class="title-tlt f-Oswald"><?php echo ubk_get_field('post_category_title') ?></h2>
            <p class="title-text"><?php echo ubk_get_field('post_category_subtitle') ?></p>
        </div>
        <?php 
            $cats = ubk_get_field('post_category_select','options');            
        ?>
        <div class="cateTabs">
            <div class="lstTabs">
                <ul class="nav">
                    <?php
                    if(check_array($cats)){
                        foreach ($cats as $key => $value) {
                            ?>
                            <li>
                                <a href="#tabs0<?php echo($key+1) ; ?>" role="tab" data-toggle="tab" class="<?php echo $key? "" : "active"; ?>">
                                    <?php
                                    if(isset($value['items']) and isset($value['items']->name)){
                                        echo $value['items']->name;
                                    }
                                    ?>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <!-- Tab panes -->
            <div class="tab-content">
                <?php
                if(check_array($cats)){
                    foreach ($cats as $key => $value) {                        
                        ?>
                        <div role="tabpanel" class="tab-pane <?php echo $key? "" : "active"; ?>" id="tabs0<?php echo($key+1) ; ?>">
                            <div class="lstNew">
                                <ul>
                                    <?php 
                                    $args = array(
                                        'post_type'   => 'post',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 6             
                                    );                                    
                                    $cat = isset($value['items'])? $value['items'] : false;

                                    if($cat){
                                        $args['category__in'] = [$cat->term_id];
                                    }

                                    $query = new WP_Query( $args );
                                    if ( $query->have_posts() ) {
                                        $index = 1; 
                                        while ( $query->have_posts() ) { 
                                            $query->the_post();
                                            echo get_template_part('templates/posts/posts','default',['index'=>$index]);
                                            $index ++;
                                        }
                                    }
                                    wp_reset_postdata();                
                                    ?>
                                </ul>
                            </div>
                            <?php 

                            echo ubk_get_btn_view_more($cat); ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    </div><!--/.sectionCate-->