<div class="sectionCate sectionCate--change">
    <div class="wrap">
        <div class="title">
            <h2 class="title-tlt f-Oswald"><?php echo ubk_get_field('post_category_title') ?></h2>
            <p class="title-text"><?php echo ubk_get_field('post_category_subtitle') ?></p>
        </div>
        <?php 
            $cats = ubk_get_field('post_category_select','options');     
            echo get_template_part('templates/posts/posts','tab',['cats'=>$cats]);       
        ?>
    </div>
</div><!--/.sectionCate-->