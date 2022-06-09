<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>
<div class="main">
    <?php echo get_template_part( 'templates/single-post/breadcrumb', '' ); ?>
    <div class="wrap">
        <div class="wrapContent">
            <div class="wrapMain">
                <?php
                if (have_posts()) {
                  while (have_posts()) {
                    the_post();
                    ?>

                    <div class="detailBoku">
                        <div class="detailBoku-thumb">
                            <?php echo get_the_post_thumbnail( get_the_ID(),'ubk_thumbnail_slide' ); ?>
                        </div>
                        <div class="detailBoku-info">
                            <h1 class="tlt"><?php echo get_the_title(); ?></h1>
                            <div class="detailBoku-label">
                                <span class="detailBoku-date f-Oswald"><?php echo get_the_date(); ?></span>
                                <span class="detailBoku-txt"><?php echo get_the_author_meta('display_name'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="detailTag">
                        <?php echo ubk_get_tag_list(); ?>
                    </div>
                    <div class="detaiContent">
                        <?php
                            echo ubk_get_field('post_excerpt_content',get_the_ID());
                        ?>                
                    </div>
                    <?php the_content(); ?>

                    <?php echo get_template_part('templates/single-post/matome1','') ?>
                    <?php echo get_template_part('templates/single-post/matome2','') ?>
                    <?php echo get_template_part('templates/single-post/author','') ?>
                    <?php echo get_template_part('templates/single-post/share','') ?>
                    <?php
                  }
                }
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div><!--/.wrapContent-->
    </div>
    
    <?php echo get_template_part( 'templates/single-post/section', 'related' ); ?>
    <?php echo get_template_part( 'templates/single-post/section', 'factory' ); ?>
    <?php echo get_template_part( 'templates/single-post/section', 'cats' ); ?>
</div>
<?php
get_footer();
