<div class="sectionKey">
      <div class="wrap">
        <div class="campContent">
          <div class="title">
            <h2 class="title-tlt f-Oswald"><?php echo ubk_get_sub_field('section_title'); ?></h2>
            <p class="title-text"><?php echo ubk_get_sub_field('section_sub_title'); ?></p>
          </div>
          <div class="keyList">
            <?php echo ubk_get_tag_list(); ?>
          </div>
          <div class="btnMore">
            <a class="more" href="javacript:void(0)">
              <span class="moreText">もっと見る</span>
              <span class="moreHover">新着記事一覧</span>
              <span class="moreItem"><img class="svg" src="<?php echo get_template_directory_uri()."/assets/"; ?>images/common/icon-arrow-white.svg" alt=""></span>
            </a>
          </div>
          <script type="text/javascript">
            $(".sectionKey .more").on("click",function(){
              $(".sectionKey .keyList .tagLst").toggleClass("toggled");
            });
          </script>
          <style type="text/css">
            @media (max-width:  991px){
              .sectionKey .keyList .tagLst{
                max-height: 10em;
                overflow: hidden;
              }
              .sectionKey .keyList .tagLst.toggled{
                max-height: unset;
                overflow: unset;
              }
              .sectionKey .keyList .tagLst.toggled::after{
                visibility: hidden;
              }
            }
          </style>
        </div>
      </div>
    </div><!--/.sectionKey-->