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
                    <div class="news">
                        <div class="lstNew-thumb thumbScale">
                            <a href="#"><img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/imgThumb05.png" alt=""></a>
                        </div>
                        <div class="lstNew-info">
                            <h3 class="lstNew-title"><a href="#">【長崎県長崎市】異国情緒あふれるまちで観光とワーケーションをしませんか？</a></h3>
                            <div class="lstNew-label">
                                <span class="lstNew-date f-Oswald">2021.12.12</span>
                                <span class="lstNew-span">U-boku編集部</span>
                            </div>
                        </div>
                    </div>
                    <div class="news">
                        <div class="lstNew-thumb thumbScale">
                            <a href="#"><img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/imgThumb05.png" alt=""></a>
                        </div>
                        <div class="lstNew-info">
                            <h3 class="lstNew-title"><a href="#">【長崎県長崎市】異国情緒あふれるまちで観光とワーケーションをしませんか？</a></h3>
                            <div class="lstNew-label">
                                <span class="lstNew-date f-Oswald">2021.12.12</span>
                                <span class="lstNew-span">U-boku編集部</span>
                            </div>
                        </div>
                    </div>
                    <div class="news">
                        <div class="lstNew-thumb thumbScale">
                            <a href="#"><img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/imgThumb05.png" alt=""></a>
                        </div>
                        <div class="lstNew-info">
                            <h3 class="lstNew-title"><a href="#">【長崎県長崎市】異国情緒あふれるまちで観光とワーケーションをしませんか？</a></h3>
                            <div class="lstNew-label">
                                <span class="lstNew-date f-Oswald">2021.12.12</span>
                                <span class="lstNew-span">U-boku編集部</span>
                            </div>
                        </div>
                    </div>
                    <div class="news">
                        <div class="lstNew-thumb thumbScale">
                            <a href="#"><img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/imgThumb05.png" alt=""></a>
                        </div>
                        <div class="lstNew-info">
                            <h3 class="lstNew-title"><a href="#">【長崎県長崎市】異国情緒あふれるまちで観光とワーケーションをしませんか？</a></h3>
                            <div class="lstNew-label">
                                <span class="lstNew-date f-Oswald">2021.12.12</span>
                                <span class="lstNew-span">U-boku編集部</span>
                            </div>
                        </div>
                    </div>
                    <div class="news">
                        <div class="lstNew-thumb thumbScale">
                            <a href="#"><img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/imgThumb05.png" alt=""></a>
                        </div>
                        <div class="lstNew-info">
                            <h3 class="lstNew-title"><a href="#">【長崎県長崎市】異国情緒あふれるまちで観光とワーケーションをしませんか？</a></h3>
                            <div class="lstNew-label">
                                <span class="lstNew-date f-Oswald">2021.12.12</span>
                                <span class="lstNew-span">U-boku編集部</span>
                            </div>
                        </div>
                    </div>
                    <div class="news">
                        <div class="lstNew-thumb thumbScale">
                            <a href="#"><img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/imgThumb05.png" alt=""></a>
                        </div>
                        <div class="lstNew-info">
                            <h3 class="lstNew-title"><a href="#">【長崎県長崎市】異国情緒あふれるまちで観光とワーケーションをしませんか？</a></h3>
                            <div class="lstNew-label">
                                <span class="lstNew-date f-Oswald">2021.12.12</span>
                                <span class="lstNew-span">U-boku編集部</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="faContent-btn">
                    <div class="btnControl">
                        <button class="btn-control btn-prev"><img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/btn-prev01.svg" alt=""></button>
                        <button class="btn-control btn-next"><img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/btn-next01.svg" alt=""></button>
                    </div>
                    <div class="btnMore">
                        <a class="more" href="#">
                            <span class="moreText">もっと見る</span>
                            <span class="moreHover">新着記事一覧</span>
                            <span class="moreItem"><img class="svg" src="<?php echo get_template_directory_uri()."/assets/"; ?>images/common/icon-arrow-white.svg" alt=""></span>
                        </a>
                    </div>
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