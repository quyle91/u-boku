<div class="detail">
    <div class="detailThumb">
        <?php 
        echo wp_get_attachment_image( ubk_get_sub_field('page_detail_thumbnail'), 'full',false,['class'=>'d-none d-md-block']);
        echo wp_get_attachment_image( ubk_get_sub_field('page_detail_thumbnail_mobile'), 'full',false,['class'=>'d-block d-md-none']);
        ?>
    </div>
    <?php
        $title = ubk_get_sub_field('page_title_image', false);
        $title_mobile = ubk_get_sub_field('page_title_image_mobile', false);
        if($title){
            ?>
            <div class="detailTitle text-center">
                <h2 class="d-none d-md-block">
                    <?php 
                        echo wp_get_attachment_image( $title, 'full',false,[]);
                    ?>
                </h2>
                <h2 class="d-block d-md-none">
                    <?php 
                        echo wp_get_attachment_image( $title_mobile, 'full',false,[]);
                    ?>
                </h2>
            </div>
            <?php
        }
    ?>
    <?php
        if (have_posts()) {
            // Load posts loop.
            while (have_posts()) {
                the_post();
                the_content();
            }
        }
    ?>
    <div class="wiew">
        <?php echo ubk_get_link(ubk_get_sub_field('page_button_link',false)); ?>                        
    </div>
</div>