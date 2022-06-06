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
    <?php 
        global $wp_query;
        $user = $wp_query->queried_object;
    ?>
    <div class="wrap">
        <div class="wrapContent">
            <div class="wrapMain">
                <div class="detail">
                    <div class="detailThumb">
                        <?php 
                        echo wp_get_attachment_image( ubk_get_field('user_banner','user_'.$user->ID), 'full',false,['class'=>'d-none d-md-block']);
                        echo wp_get_attachment_image( ubk_get_field('user_banner_mobile','user_'.$user->ID), 'full',false,['class'=>'d-block d-md-none']);
                        ?>
                    </div>
                    <?php
                        $title = ubk_get_field('user_title_image', 'user_'.$user->ID);
                        $title_mobile = ubk_get_field('user_title_image_mobile', 'user_'.$user->ID);
                        if($title){
                            ?>
                            <div class="detailTitle text-center">
                                <h2 class="d-none d-md-block">
                                    <?php 
                                        echo wp_get_attachment_image( ubk_get_field('user_title_image','user_'.$user->ID), 'full',false,[]);
                                    ?>
                                </h2>
                                <h2 class="d-block d-md-none">
                                    <?php 
                                        echo wp_get_attachment_image( ubk_get_field('user_title_image_mobile','user_'.$user->ID), 'full',false,[]);
                                    ?>
                                </h2>
                            </div>
                            <?php
                        }
                    ?>
                    <?php
                        echo apply_filters('the_content',ubk_get_field('user_details','user_'.$user->ID));
                    ?>
                    <div class="wiew">
                        <?php echo ubk_get_link(ubk_get_field('user_button_link','user_'.$user->ID)); ?>                        
                    </div>
                </div>
                <div class="lstDetail">
                    <div class="detailTitle-fl text-center">
                        <h2 class="d-none d-md-block"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/data/text-title-detail-pc01.svg" alt=""></h2>
                        <h2 class="d-block d-md-none"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/data/text-title-detail-sp01.svg" alt=""></h2>
                    </div>
                    <?php
                        $more_details = ubk_get_field('user_items','user_'.$user->ID);
                        if(check_array($more_details)){
                            foreach ($more_details as $key => $value) {

                                ?>
                                <div class="detailInfo">
                                    <div class="detailInfo-thumb">
                                        <?php 
                                            if( isset($value['image']) ){
                                                echo wp_get_attachment_image($value['image'],'full');
                                            }
                                        ?>                                        
                                    </div>
                                    <div class="detailInfo-cmt">
                                        <div class="detailInfo-label">
                                            <?php 
                                            echo isset($value['title'])? $value['title'] : "";
                                             ?>
                                        </div>
                                        <div class="detailInfo-text">
                                            <p>
                                                <?php echo isset($value['content']) ? $value['content'] : ""; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div><!--/.wrapContent-->
    </div>
</div>
<?php
get_footer();
