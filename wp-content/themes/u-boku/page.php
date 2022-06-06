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
                if(
                    have_rows('components_default') or 
                    have_rows('components') 
                ){
                    if(have_rows('components_default')){
                        while ( have_rows('components_default') ) : the_row();
                            //echo "<pre>";print_r(get_row_layout());echo "</pre>";
                            get_template_part('templates/components/component-'.str_replace("_", "-", get_row_layout()));
                        endwhile;
                    }
                    if(have_rows('components')){
                        while ( have_rows('components') ) : the_row();
                            //echo "<pre>";print_r(get_row_layout());echo "</pre>";
                            get_template_part('templates/components/component-'.str_replace("_", "-", get_row_layout()));
                        endwhile;
                    }
                }
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div><!--/.wrapContent-->
    </div>
</div>
<?php
get_footer();
