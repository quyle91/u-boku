<div class="bannerTop">
    <div class="bannerWrap">
        <div class="bannerContent">
            <div class="slider sliderBanner">
                <?php                     
                    if( have_rows('post_select') ){                        
                        $key = 1;
                        while( have_rows('post_select') ) : the_row();                            
                            $item = ubk_get_sub_field('items');                            
                            ?>
                            <div class="items">
                                <div class="itemsWrap">
                                    <div class="bannerInfo">
                                        <div class="bannerHead">
                                            <div class="sub-title">
                                                <img class="d-none d-md-block" src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/bannerMain-sub-title.svg" alt="">
                                                <img class="d-block d-md-none" src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/bannerMain-sub-title-sp.svg" alt="">
                                            </div>
                                            <h3 class="bannerHead-title">PICKUP <?php echo !($key == 1)? $key : ""; ?></h3>
                                        </div>
                                        <p class="banner-desc">                                        
                                            <a href="<?php echo get_permalink($item->ID); ?>">
                                                <?php echo $item->post_title; ?>
                                            </a>
                                        </p>
                                        <div class="bannerFooter">
                                            <div class="bannerFooter-time">
                                                <div class="date-time">
                                                    <?php 
                                                    echo get_the_date(false, $item);
                                                    ?>
                                                </div>
                                                <p class="author-post">
                                                    <?php 
                                                    echo get_the_author_meta('display_name',$item->post_author);
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="bannerFooter-control">
                                                <button class="btn-control btn-banner-prev"><img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/btn-prev.svg" alt=""></button>
                                                <button class="btn-control btn-banner-next"><img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/btn-next.svg" alt=""></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bannerThumb">
                                        <span class="bannerThumb-desc">
                                            <img class="d-none d-md-block" src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/bannerMain-text.svg" alt="">
                                            <img class="d-block d-md-none" src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/bannerMain-text-sp.svg" alt="">
                                        </span>
                                        <span>
                                            <a href="<?php echo get_permalink($item->ID); ?>">
                                                <?php echo get_the_post_thumbnail( $item->ID, 'ubk_thumbnail_slide' ); ?>
                                            </a> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $key ++;
                        // End loop.
                        endwhile;
                    }
                ?>                
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".sliderBanner").not('.slick-initialized').slick({
                speed: 500,
                fade: true,
                autoplay: true,
                autoplaySpeed: 5000,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: $('.btn-banner-prev'),
                nextArrow: $('.btn-banner-next')
            });
        });
    </script>
</div>