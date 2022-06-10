        <div class="footer">
            <div class="backTop">                
                <img src="<?php echo get_template_directory_uri()."/assets/"; ?>images/common/icon-backTop.svg">
            </div>
            <div class="wrap">
                <div class="footerWrap">
                    <div class="footerLogo">
                        <a href="<?php echo get_site_url(); ?>">  
                            <?php echo wp_get_attachment_image(ubk_get_field('footer_logo','options'),'full') ?>
                        </a>
                    </div>
                    <div class="footerNav">
                        <ul>
                            <?php 
                            $footer_navigation = ubk_get_field('footer_navigation','options');                            
                            if(check_array($footer_navigation)){
                                foreach ($footer_navigation as $key => $item) {
                                    if(isset($item['item']) and $item['item']){
                                        echo '<li><a target="'.$item['item']['target'].'" href="'.$item['item']['url'].'">'.$item['item']['title'].'</a></li>';
                                    }                                    
                                }
                            }

                            ?>
                            <li class="footerShare">
                                <?php
                                echo ubk_get_socials('socials','icon_svg','social_link',false);
                                ?>
                            </li>
                            <li class="footerCopyright f-Oswald"><?php echo do_shortcode( ubk_get_field('footer_copyright_text','options') ); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--/.footer-->
    </div> <!-- end wrapper -->
    <div class="smartFix">
        <?php 
        $smart_fixed_banner = ubk_get_field('smart_fixed_banner','options');        
        ?>
        <a href="<?php echo isset($smart_fixed_banner['url'])? $smart_fixed_banner['url'] : ""; ?>">
            <div class="d-none d-md-block">
                <?php echo isset($smart_fixed_banner['image'])? wp_get_attachment_image( $smart_fixed_banner['image'],'full') : ""; ?>
            </div>
            <div class="d-block d-md-none">
                <?php echo isset($smart_fixed_banner['image_medium'])? wp_get_attachment_image( $smart_fixed_banner['image_medium'],'full') : ""; ?>
            </div>
        </a>
    </div>
    <!-- -->
    <?php wp_footer(); ?>
</body>
</html>