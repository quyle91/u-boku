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
                <?php echo ubk_get_blog_title(); ?>
                <div class="listLocal">
                    <ul>
                        <?php
                        if (have_posts()) {
                            // Load posts loop.
                            while (have_posts()) {
                                the_post();
                                echo get_template_part('templates/posts/posts','default');
                            }
                        }
                        ?>
                    </ul>
                </div>
                <?php echo ubk_posts_navigation(); ?>
            </div>
            <?php get_sidebar(); ?>
        </div><!--/.wrapContent-->
    </div>
    
    <?php echo get_template_part( 'templates/single-post/section', 'related' ); ?>
    <?php echo get_template_part( 'templates/single-post/section', 'factory' ); ?>
</div>
<?php
get_footer();
