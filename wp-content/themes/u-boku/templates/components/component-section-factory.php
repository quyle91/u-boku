<div class="sectionFa">
    <div class="faWrap">
        <div class="faContent">
            <div class="titleFa">
                <div class="titleFa-title">
                    <h2 class="titleFa-tlt f-Oswald"><?php echo ubk_get_sub_field('section_title'); ?></h2>
                </div>
                <p class="titleFa-text"><?php echo ubk_get_sub_field('section_sub_title'); ?></p>
            </div>
            
            <div class="title d-block d-md-none">
                <h2 class="title-tlt f-Oswald"><?php echo ubk_get_sub_field('section_title'); ?></h2>
                <p class="title-text"><?php echo ubk_get_sub_field('section_sub_title'); ?></p>
            </div>
            
            <div class="sliderFa">
                <div class="slider sliderFactory">
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
                            echo get_template_part('templates/posts/posts','div');
                        }
                    }
                    wp_reset_postdata();                
                    ?>                    
                </div>
                <div class="faContent-btn">
                    <?php echo ubk_get_btn_next_prev($cat); ?>            
                    <?php echo ubk_get_btn_view_more($cat); ?>                    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.sliderFactory').not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                speed: 300,
                slidesToScroll: 1,
                variableWidth: true,
                prevArrow: $('.btn-prev'),
                nextArrow: $('.btn-next'),
                responsive: [{
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        centerMode: true,
                    }
                }]
            });
        });
      
    </script>
</div><!--/.sectionFa-->