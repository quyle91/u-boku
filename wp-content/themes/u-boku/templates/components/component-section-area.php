<div class="sectionArea">
      <div class="wrap">
        <code>Not Fix yet</code>
        <div class="area">
          <div class="areaTitle">
            <h2 class="areaTitle-tlt f-Oswald"><?php echo ubk_get_sub_field('section_title'); ?></h2>            
            <div class="areaTitle-thumb"><?php echo wp_get_attachment_image( ubk_get_sub_field('section_title_image'), 'full' ); ?></div>
            <p class="areaTitle-text"><?php echo ubk_get_sub_field('section_sub_title'); ?></p>
          </div>
          <div class="areaThumb text-center">
            <img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/img-maps.svg">
            <div class="areaBox">
              <div class="areaBox-img thumbScale"><a href="#"><img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/imgThumb03.png" alt=""></a></div>
              <div class="areaBox-info">
                <h3 class="areaBox-tlt">宮城</h3>
                <p class="areaBox-text">豊かな漁場と日本三景の一つ松島をはじめとする風光明媚な観光地などに恵まれています。</p>
              </div>
              <div class="btnMore">
                <a class="more" href="#">
                  <span class="moreText">この地域の記事一覧</span>
                  <span class="moreHover">新着記事一覧</span>
                  <span class="moreItem"><img class="svg" src="<?php echo get_template_directory_uri()."/assets/"; ?>images/common/icon-arrow-white.svg" alt=""></span>
                </a>
              </div>
            </div>
          </div>
          <div class="areaThumbSp text-center">
            <a href="#exampleModal" data-toggle="modal"><img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/data/img-maps-sp.svg" alt=""></a>
          </div>
        </div>
      </div>
    </div><!--/.sectionArea-->