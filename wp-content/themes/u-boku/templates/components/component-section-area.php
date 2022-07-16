<div class="sectionArea" <?php echo ubk_get_sub_field('section_id_attribute')? 'id="'.ubk_get_sub_field('section_id_attribute').'"' : ""; ?>>
    <div class="wrap">
        <div class="area">
            <div class="areaTitle">
                <h2 class="areaTitle-tlt f-Oswald"><?php echo ubk_get_sub_field('section_title'); ?></h2>
                <div class="areaTitle-thumb"><?php echo wp_get_attachment_image( ubk_get_sub_field('section_title_image'), 'full' ); ?></div>
                <p class="areaTitle-text"><?php echo ubk_get_sub_field('section_sub_title'); ?></p>
            </div>
            <div class="areaThumb text-center">
                <?php echo get_template_part("assets/images/data/img-maps",null); ?>
            </div>
            <div class="areaThumbSp text-center">
                <?php echo get_template_part("assets/images/data/img-maps-sp",null); ?>
                <!-- <a href="#exampleModal" data-toggle="modal"></a> -->
            </div>
        </div>
    </div>
</div>
<!--/.sectionArea-->