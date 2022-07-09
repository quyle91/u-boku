<?php if($post->post_content): ?>
<div class="container mb-50-100 <?php echo ubk_get_sub_field('no_margin_bottom')? "no_margin_bottom" : ""; ?>" <?php echo ubk_get_sub_field('section_id_attribute')? 'id="'.ubk_get_sub_field('section_id_attribute').'"' : ""; ?>>
    <div class="default-page">
        <?php
        echo ubk_get_sub_field('include_title')? "<h1>".get_the_title()."</h1>" : "";
        if ( have_posts() ) {
            // Load posts loop.
            while ( have_posts() ) {
                the_post();
                the_content();
            }
        }
        ?>
    </div>
</div>
<?php endif; ?>