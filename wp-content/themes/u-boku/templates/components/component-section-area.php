<div class="sectionArea">
    <div class="wrap">
        <div class="area">
            <div class="areaTitle">
                <h2 class="areaTitle-tlt f-Oswald"><?php echo ubk_get_sub_field('section_title'); ?></h2>
                <div class="areaTitle-thumb"><?php echo wp_get_attachment_image( ubk_get_sub_field('section_title_image'), 'full' ); ?></div>
                <p class="areaTitle-text"><?php echo ubk_get_sub_field('section_sub_title'); ?></p>
            </div>
            <div class="areaThumb text-center">
                <?php echo get_template_part("assets/images/data/img-maps",null); ?>
                <?php
                    $map_items = ubk_get_field('map_items');
                    if(isset($map_items[0]) and isset($map_items[0]['category_select'])):
                        $term = get_term($map_items[0]['category_select'],'category');
                        $thumbnail_id = ubk_get_field('category_banner',$term);                        
                        if($thumbnail_id):
                        ?>
                        <div class="areaBox">
                            <div class="areaBox-img thumbScale">
                                <a href="<?php echo get_term_link($term,'category'); ?>">
                                    <?php echo wp_get_attachment_image($thumbnail_id,'ubk_thumbnail') ?>                                    
                                </a>
                            </div>                    
                            <div class="areaBox-info">
                                <h3 class="areaBox-tlt"><?php echo $term->name; ?></h3>
                                <p class="areaBox-text"><?php echo $term->description; ?></p>
                            </div>
                            <div class="btnMore">
                                <a class="more" href="#">
                                    <span class="moreText">この地域の記事一覧</span>
                                    <span class="moreHover">新着記事一覧</span>
                                    <span class="moreItem">
                                        <img class="svg" src="<?php echo get_template_directory_uri()."/assets/"; ?>images/common/icon-arrow-white.svg" alt="">
                                    </span>
                                </a>
                            </div>
                        </div>
                        <?php
                        endif;
                    endif;
                ?>
                <style type="text/css">
                    /*#img-maps g#Group_60 .active,
                    #img-maps g#Group_60 .active path,*/
                    #img-maps g#Group_60 >*:not(#Path_911):hover,
                    #img-maps g#Group_60 >*:not(#Path_911):hover path{
                        fill: #4fbac4;
                        cursor: pointer;
                    }
                    .areaThumb{
                        position: relative;
                    }
                    .areaThumb #icon_maker{
                        width:  32px;
                        position: absolute;
                    }
                </style>
                <script type="text/javascript">
                    const map_desktop = [];
                    <?php
                        //register box info
                        $map_items = ubk_get_field('map_items');
                        if(check_array($map_items)){
                            foreach ($map_items as $key => $value) {
                                if($value['category_select']){
                                    $term = get_term($value['category_select'],'category');                                       
                                    $thumbnail_id = ubk_get_field('category_banner',$term);                                    
                                    ?>
                                    var item = Object.create(null);
                                    <?php
                                    $thumbnail_url_image = wp_get_attachment_image_src($thumbnail_id,'ubk_thumbnail');
                                    $thumbnail_url = "";
                                    if(isset($thumbnail_url_image[0])){
                                        $thumbnail_url = $thumbnail_url_image[0];
                                    }
                                    ?>
                                    item.thumbnail = "<?php echo $thumbnail_url; ?>";
                                    item.title = "<?php echo $term->name; ?>";
                                    item.description = "<?php echo $term->description; ?>";
                                    item.link = "<?php echo get_term_link($term,'category'); ?>";
                                    map_desktop.push(item);
                                    <?php
                                }
                            }
                        }
                    ?>   
                    const icon_maker = '<?php echo get_template_part("assets/images/common/icon-maker",null); ?>';
                    $(".areaThumb #img-maps g#Group_60 >*:not(#Path_911)").on("click",function(event){
                        var id = $(this).attr("id");
                        var is_changed = false;
                        for (var i = map_desktop.length - 1; i >= 0; i--) {
                            if(map_desktop[i].title == id){
                                is_changed = true;
                                $(".areaThumb .areaBox a img").attr("src",map_desktop[i].thumbnail);
                                $(".areaThumb .areaBox .areaBox-info .areaBox-tlt").html(map_desktop[i].title);
                                $(".areaThumb .areaBox .areaBox-info .areaBox-text").html(map_desktop[i].description);
                                $(".areaThumb .areaBox .btnMore .more").attr("href",map_desktop[i].link);
                            }
                        }
                        if(!is_changed){
                            $(".areaThumb .areaBox").fadeOut();
                        }else{
                            $(".areaThumb .areaBox").fadeIn();
                        } 
                        let top = $(this).position().top;
                        let left =  $(this).position().left;

                        let bottom = $(document).height() - ($(document).height() - top - $(this)[0].getBoundingClientRect().height);
                        let right = $(document).width() - ($(document).width() - left - $(this)[0].getBoundingClientRect().width);

                        let centerx = (left+right)/2 ; 
                        let centery = (top+bottom)/2 ;

                        let parent_top = $(".areaThumb").offset().top;
                        let parent_left = $(".areaThumb").offset().left;




                        let need_left = centerx - parent_left;
                        let need_top = centery - parent_top;

                        need_left -= 32/2;
                        need_top -= 40-10;


                        $(".areaThumb #icon_maker").remove();
                        $(".areaThumb").append($(icon_maker)).fadeIn();

                        $(".areaThumb #icon_maker").css("top",need_top + "px");
                        $(".areaThumb #icon_maker").css("left",need_left + "px");
                    });
                    
                </script>
            </div>
            
            <div class="areaThumbSp text-center">
                <a href="#exampleModal" data-toggle="modal">
                    <?php echo get_template_part("assets/images/data/img-maps-sp",null); ?>                    
                </a>
            </div>
        </div>
    </div>
</div>
<!--/.sectionArea-->