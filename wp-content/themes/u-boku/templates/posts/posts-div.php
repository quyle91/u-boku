<div class="news">
    <div class="lstNew-thumb thumbScale">
        <a href="<?php the_permalink(); ?>">
            <?php echo get_the_post_thumbnail( get_the_id(), 'ubk_thumbnail' ); ?>
        </a>
    </div>
    <div class="lstNew-info">
        <h3 class="lstNew-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="lstNew-label">
            <span class="lstNew-date f-Oswald">
                <?php echo get_the_date(); ?>                                                
            </span>
            <span class="lstNew-span">
                <?php echo get_the_author_meta('display_name'); ?>
            </span>
        </div>
    </div>
</div>