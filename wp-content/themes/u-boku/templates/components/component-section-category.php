<div class="sectionCate">
    <div class="wrap">
        <div class="title">
            <h2 class="title-tlt f-Oswald"><?php echo ubk_get_sub_field('section_title'); ?></h2>
            <p class="title-text"><?php echo ubk_get_sub_field('section_sub_title'); ?></p>
        </div>

        <?php 
            $cats = ubk_get_sub_field('category_select');
            echo get_template_part('templates/posts/posts','tab',['cats'=>$cats]);
        ?>
    </div>
</div><!--/.sectionCate-->