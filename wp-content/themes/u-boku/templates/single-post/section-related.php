<div class="sectionArt">
<div class="wrap">
    <div class="titleArt"><h2 class="tlt"><?php echo ubk_get_field('post_related_title') ?></h2></div>
    <div class="lstNew">
        <ul>
            <?php
                $related = ubk_get_related_posts(get_the_ID(),3);
                if($related->have_posts()){
                    while ($related->have_posts()) {                        
                        $related->the_post();
                        echo get_template_part( 'templates/posts/posts', 'default' );
                    }
                }
                wp_reset_postdata();
            ?>
        </ul>
    </div>
    <?php echo ubk_get_btn_view_more_single(get_the_ID()); ?>
</div>
</div>