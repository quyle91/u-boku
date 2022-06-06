<div class="lstDetail">
    <div class="detailTitle-fl text-center">
        <h2 class="d-none d-md-block"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/data/text-title-detail-pc01.svg" alt=""></h2>
        <h2 class="d-block d-md-none"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/data/text-title-detail-sp01.svg" alt=""></h2>
    </div>
    <?php
        $page_list_details = ubk_get_sub_field('page_list_details');
        if(check_array($page_list_details)){
            foreach ($page_list_details as $key => $value) {

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